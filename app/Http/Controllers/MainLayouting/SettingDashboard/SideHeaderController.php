<?php

namespace App\Http\Controllers\MainLayouting\SettingDashboard;

use App\Http\Controllers\Controller;
use App\Models\Main\SeetingDashboard\SideHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SideHeaderController extends Controller
{
    public function show($uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-read'), 403);

        $data = SideHeader::where('uuid', $uuid)->first();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('main-layouting-setting-create'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'deskripsi' => 'required',
                'isActive' => 'required',
            ], [
                'title.required' => 'Title Tidak Boleh Kosong !!',
                'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong !!',
                'isActive.required' => 'Status Side Header Belum Terbaca, Silahkan Ulangi Kembali.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $paramHeader = [
                'uuid' => getUuid(),
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'userId' => getUserId(),
                'isActive' => $request->isActive
            ];

            $dataHeader = SideHeader::dashHeaderUpdateField('', $paramHeader);
            if ($dataHeader['status'] != 'success') {
                toast('Data Header Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back()->withInput();
            }

            DB::commit();
            toast('Data Header Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Create Header', [
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

    public function update(Request $request, $uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-update'), 403);

        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'deskripsi' => 'required',
                'isActive' => 'required',
            ], [
                'title.required' => 'Title Tidak Boleh Kosong !!',
                'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong !!',
                'isActive.required' => 'Status Side Header Belum Terbaca, Silahkan Ulangi Kembali.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $paramHeader = [
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'userId' => getUserId(),
                'isActive' => $request->isActive
            ];

            $dataHeader = SideHeader::dashHeaderUpdateField($uuid, $paramHeader);
            if ($dataHeader['status'] != 'success') {
                toast('Data Header Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back()->withInput();
            }

            DB::commit();
            toast('Data Header Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Update Side Header', [
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

    public function destroy($uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-update'), 403);

        try {
            DB::beginTransaction();

            $data = SideHeader::where('uuid', $uuid)->first();

            if ($data->delete()) {
                DB::commit();
                toast('Data Side Header Berhasil Di Hapus', 'success')->autoClose(5000)->timerProgressBar();
            } else {
                toast('Data Side Header Gagal Di Hapus', 'warning')->autoClose(5000)->timerProgressBar();
            }

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Delete Side Header', [
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
