<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function search(Request $request)
    {
        abort_if(Gate::denies('permissions-read'), 403);

        $keyword = $request->keyword;
        $permissions = Permission::where('name', 'like', '%' . $keyword . '%')->paginate(10);

        return view('settings.permissions.index', compact('permissions'));
    }

    public function index()
    {
        abort_if(Gate::denies('permissions-read'), 403);

        $datas = Permission::paginate(50);
        $noPage = ($datas->currentPage() - 1) * $datas->perPage() + 1;
        foreach ($datas as $data) {
            $data->noPage = $noPage++;
        }

        return view('settings.permissions.index', compact('datas'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('permissions-create'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'guard_name' => 'required|in:web'
            ], [
                'name.required' => 'Nama Permission Tidak Boleh Kosong !!',
                'guard_name.required' => 'Guard Name Tidak Boleh Kosong !!',
                'guard_name.in' => 'Guard Name harus bernilai "web" !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $data = Permission::create([
                'name' => Str::lower($request->name),
                'guard_name' => Str::lower($request->guard_name),
            ]);

            if (!$data) {
                toast('Data Gagal Disimpan !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            activity('create permissions')
                ->performedOn($data)
                ->withProperties($request->except('_token'))
                ->log('create permissions by ' . getNamaUser());

            toast('Data Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Create Permission', [
                'Error' => $th->getMessage(),
                'Exception' => $th,
                'Stacktrace' => $th->getTraceAsString()
            ]);

            if (env('APP_ENV') != 'production') {
                dd($th);
            } else {
                toast('Terjadi Kesalahan Pada Sistem !!!', 'warning')->autoClose(5000)->timerProgressBar();
            }
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return response()->json([
            'permission' => $permission,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        abort_if(Gate::denies('permissions-update'), 403);

        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'guard_name' => 'required|in:web'
            ], [
                'name.required' => 'Nama Permission Tidak Boleh Kosong !!',
                'guard_name.required' => 'Guard Name Tidak Boleh Kosong !!',
                'guard_name.in' => 'Guard Name harus bernilai "web" !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $permission->update([
                'name' => Str::lower($request->name),
                'guard_name' => Str::lower($request->guard_name),
            ]);

            if (!$permission) {
                toast('Data Gagal Disimpan !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            activity('Update Permissions')
                ->performedOn($permission)
                ->withProperties($request->except('_token', '_method'))
                ->log('update permissions by ' . getNamaUser());

            toast('Data Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Update Permission', [
                'Error' => $th->getMessage(),
                'Exception' => $th,
                'Stacktrace' => $th->getTraceAsString()
            ]);

            if (env('APP_ENV') != 'production') {
                dd($th);
            } else {
                toast('Terjadi Kesalahan Pada Sistem !!!', 'warning')->autoClose(5000)->timerProgressBar();
            }
            return redirect()->back();
        }
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permissions-delete'), 403);
        try {
            DB::beginTransaction();

            if (!$permission->delete()) {
                DB::rollBack();
                toast('Data Gagal Dihapus !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            activity('Delete Permissions')
                ->performedOn($permission)
                ->log('Delete permissions by ' . getNamaUser());

            toast('Data Berhasil Dihapus', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Delete Permission', [
                'Error' => $th->getMessage(),
                'Exception' => $th,
                'Stacktrace' => $th->getTraceAsString()
            ]);

            if (env('APP_ENV') != 'production') {
                dd($th);
            } else {
                toast('Terjadi Kesalahan Pada Sistem !!!', 'warning')->autoClose(5000)->timerProgressBar();
            }
            return redirect()->back();
        }
    }
}
