<?php

namespace App\Http\Controllers\MainLayouting\SettingDashboard;

use App\Http\Controllers\Controller;
use App\Models\Main\Logos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class LogosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-read'), 403);

        $data = Logos::where('uuid', $uuid)->first();

        $data->logo = getStorageImage('media/logo', $data->logo, 'assets/media/avatars/logo-none.jpg');
        return response()->json($data);
    }

    public function update(Request $request, $uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-update'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->files->all(), [
                'imageLogo' => [
                    'required',
                    'mimes:jpg,png,jpeg',
                    'max:2048',
                ]
            ], [
                'imageLogo.required' => 'Gambar Logo Tidak Boleh Kosong',
                'imageLogo.mimes' => 'Type Gambar logo utama salah, type file harus .jpg / .jpeg / .png.',
                'imageLogo.max' => 'Ukuran File logo utama terlalu besar, Max File 2 MB.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $data = Logos::where('uuid', $uuid)->first();
            $imageName = $data->logo;
            if ($request->hasFile('imageLogo')) {

                $file = $request->file('imageLogo');
                $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                    toast('Type Gambar Salah, Gambar Harus JPG / JPEG / PNG', 'warning')->autoClose(5000)->timerProgressBar();
                    return redirect()->back();
                }

                $logoPath = 'media/logo/' . $data->logo;
                if ($data->logo && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }

                $imageInstance = Image::make($file);
                $imageInstance->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $directoryPath = 'media/logo';
                $imageName = md5($request->nama . "-" . round(microtime(true) * 1000)) . '.' . $file->getClientOriginalExtension();
                $fullPath = $directoryPath . '/' . $imageName;
                Storage::disk('public')->put($fullPath, (string) $imageInstance->encode());
            }

            $paramLogos = [
                'logo' => $imageName,
                'userId' => getUserId()
            ];

            $dataLogos = Logos::logosUpdateField($uuid, $paramLogos);
            if ($dataLogos['status'] != 'success') {
                toast('Data Logo Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back()->withInput();
            }

            DB::commit();
            toast('Data Logo Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Update Logos', [
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
