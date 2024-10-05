<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BackupDataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setting-backup-read'), 403);

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $files = $disk->files(config('backup.backup.name'));

        $backups = collect($files)->filter(function ($file) {
            return strpos($file, '.zip') !== false;
        })->map(function ($file) use ($disk) {
            return [
                'file_path' => $file,
                'file_name' => str_replace(config('backup.backup.name') . '/', '', $file),
                'file_size' => $disk->size($file),
                'last_modified' => $disk->lastModified($file),
            ];
        })->sortByDesc('last_modified')->toArray();

        $page = request()->input('page', 1);
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $datas = new LengthAwarePaginator(
            array_slice($backups, $offset, $perPage),
            count($backups),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('settings.backupData.index', compact('datas'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting-backup-create'), 403);

        try {
            Artisan::call('backup:run --only-db');

            $output = Artisan::output();

            if (strpos($output, 'Backup completed!') !== false) {
                Log::info('Backup database berhasil pada ' . now());
                toast('Backup Data Berhasil !!', 'success')->autoClose(5000)->timerProgressBar();
            } else {
                Log::error('Backup database gagal pada ' . now());
                toast('Backup Data Gagal !!', 'warning')->autoClose(5000)->timerProgressBar();
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Backup database gagal dengan error: ' . $e->getMessage());

            toast('Terdapat Kesalahan Pada Sistem !!', 'warning')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
    }

    public function download($file_name)
    {
        abort_if(Gate::denies('setting-backup-download'), 403);

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $file = config('backup.backup.name') . '/' . $file_name;

        if ($disk->exists($file)) {
            Log::info('Download Backup database Oleh ', [
                'role Id' => getRolesId(),
                'tanggal' => now()
            ]);

            return $disk->download($file);
        } else {
            Log::error('Download Backup database gagal pada ' . now());

            toast('Terdapat Kesalahan Pada Sistem !!', 'warning')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('setting-backup-delete'), 403);
        try {
            DB::beginTransaction();

            $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
            $file = config('backup.backup.name') . '/' . $id;

            if (!$disk->exists($file)) {
                Log::error('Download Backup database gagal pada ' . now());
                toast('Terdapat Kesalahan Pada Sistem !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            $disk->delete($file);
            DB::commit();
            Log::info('Delete Backup database Oleh ', [
                'role Id' => getRolesId(),
                'tanggal' => now()
            ]);

            toast('Data Backup Berhasil Dihapus !!', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Delete Backup Database', [
                'Error' => $th->getMessage(),
                'Exception' => $th,
                'Stacktrace' => $th->getTraceAsString()
            ]);

            if (env('APP_ENV') != 'production') {
                dd($th);
            } else {
                toast('Terjadi Kesalahan !!!', 'warning')->autoClose(5000)->timerProgressBar();
            }
            return redirect()->back();
        }
    }
}
