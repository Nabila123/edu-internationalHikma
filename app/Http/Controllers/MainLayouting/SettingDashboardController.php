<?php

namespace App\Http\Controllers\MainLayouting;

use App\Http\Controllers\Controller;
use App\Models\Main\SettingDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-setting-read'), 403);

        return view('MainLayouting.SettingDashboard.index');
    }

    public function updateLogo(Request $request)
    {
        abort_if(Gate::denies('main-layouting-setting-update'), 403);
        try {
            DB::beginTransaction();

            if (empty($request->file())) {
                toast('Tidak Ada File Yang Perlu Diupdate !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            $validator = Validator::make($request->files->all(), [
                'logoUtama' => [
                    'nullable',
                    'mimes:jpg,png,jpeg',
                    'max:2048',
                ],
                'headerLogo' => [
                    'nullable',
                    'mimes:jpg,png,jpeg',
                    'max:5120',
                ],
                'componentLogo' => [
                    'nullable',
                    'mimes:jpg,png,jpeg',
                    'max:2048',
                ],
            ], [
                'logoUtama.mimes' => 'Type Gambar logo utama salah, type file harus .jpg / .jpeg / .png.',
                'logoUtama.max' => 'Ukuran File logo utama terlalu besar, Max File 2 MB.',
                'headerLogo.mimes' => 'Type Gambar header salah, type file harus .jpg / .jpeg / .png.',
                'headerLogo.max' => 'Ukuran File header terlalu besar, Max File 5 MB.',
                'componentLogo.mimes' => 'Type Gambar komponen salah, type file harus .jpg / .jpeg / .png.',
                'componentLogo.max' => 'Ukuran File komponen terlalu besar, Max File 2 MB.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $dataImage = SettingDashboard::first();
            $uploadedImages = [
                "logo" => '',
                "header" => '',
                "component" => ''
            ];

            if ($request->file()) {
                $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                foreach ($request->file() as $key => $image) {
                    if (!in_array($image->getMimeType(), $allowedMimeTypes)) {
                        toast('Type Gambar Salah, Gambar Harus JPG / JPEG / PNG', 'warning')->autoClose(5000)->timerProgressBar();
                        return redirect()->back();
                    }

                    if ($uploadedImages[$key]) {
                        $imageLogo = $key == 'image' ? $dataImage->foto : $dataImage->ktp;
                        $filePath = 'media/logo/' . $key . '/' . $imageLogo;

                        if (Storage::disk('public')->exists($filePath)) {
                            Storage::disk('public')->delete($filePath);
                        }
                    }

                    // $imageInstance = Image::make($image);
                    // $imageInstance->resize(800, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    //     $constraint->upsize();
                    // });

                    // $directoryPath = 'media/penghuni/' . $key;

                    // $imageName = md5($request->nama . "-" . round(microtime(true) * 1000)) . '.' . $image->getClientOriginalExtension();
                    // $fullPath = $directoryPath . '/' . $imageName;
                    // Storage::disk('public')->put($fullPath, (string) $imageInstance->encode());

                    // $uploadedImages[$key] = $imageName;
                }
            }
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Logos', [
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
