<?php

namespace App\Http\Controllers\MainLayouting\SettingDashboard;

use App\Http\Controllers\Controller;
use App\Models\Main\SeetingDashboard\Caraosel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CaraoselController extends Controller
{

    public function show($uuid)
    {
        abort_if(Gate::denies('main-layouting-setting-read'), 403);

        $data = Caraosel::where('uuid', $uuid)->first();

        $data->image = getStorageImage('media/caraosel', $data->image, 'assets/media/avatars/logo-none.jpg');
        return response()->json($data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('main-layouting-setting-create'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'isActive' => 'required',
                'image.*' => [
                    'mimes:jpg,png,jpeg',
                    'max:5120',
                ],
            ], [
                'isActive.required' => 'Status Caraosel Belum Terbaca, Silahkan Ulangi Kembali.',
                'image.*.mimes' => 'Type Gambar salah, type file harus .jpg / .jpeg / .png.',
                'image.*.max' => 'Ukuran File terlalu besar, Max File 5 MB.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            if ($request->file()) {
                $image = $request->file('imageCaraosel');
                $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                if (!in_array($image->getMimeType(), $allowedMimeTypes)) {
                    toast('Type Gambar Salah, Gambar Harus JPG / JPEG / PNG', 'warning')->autoClose(5000)->timerProgressBar();
                    return redirect()->back();
                }

                $imageInstance = Image::make($image);
                $imageInstance->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $directoryPath = 'media/caraosel';
                $imageName = md5($request->nama . "-" . round(microtime(true) * 1000)) . '.' . $image->getClientOriginalExtension();
                $fullPath = $directoryPath . '/' . $imageName;
                Storage::disk('public')->put($fullPath, (string) $imageInstance->encode());
            }

            $paramCaraosel = [
                'uuid' => getUuid(),
                'title' => $request->judul ?? '',
                'deskripsi' => $request->deskripsi ?? '',
                'slogan' => $request->slogan ?? '',
                'image' => $imageName ?? '',
                'userId' => getUserId(),
                'isActive' => $request->isActive
            ];

            $dataCaraosel = Caraosel::caraoselUpdateField('', $paramCaraosel);
            if ($dataCaraosel['status'] != 'success') {
                toast('Data Caraosel Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back()->withInput();
            }

            DB::commit();
            toast('Data Caraosel Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Create Caraosel', [
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
                'isActive' => 'required',
                'image.*' => [
                    'mimes:jpg,png,jpeg',
                    'max:5120',
                ],
            ], [
                'isActive.required' => 'Status Caraosel Belum Terbaca, Silahkan Ulangi Kembali.',
                'image.*.mimes' => 'Type Gambar salah, type file harus .jpg / .jpeg / .png.',
                'image.*.max' => 'Ukuran File terlalu besar, Max File 5 MB.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $imageCaraosel = Caraosel::where('uuid', $uuid)->first();
            $imageName = $imageCaraosel->image;

            if ($request->file()) {
                $image = $request->file('imageCaraosel');
                $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                if (!in_array($image->getMimeType(), $allowedMimeTypes)) {
                    toast('Type Gambar Salah, Gambar Harus JPG / JPEG / PNG', 'warning')->autoClose(5000)->timerProgressBar();
                    return redirect()->back();
                }

                $logoPath = 'media/caraosel/' . $imageName;
                if (!empty($imageName) && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }

                $imageInstance = Image::make($image);
                $imageInstance->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $directoryPath = 'media/caraosel';
                $imageName = md5($request->nama . "-" . round(microtime(true) * 1000)) . '.' . $image->getClientOriginalExtension();
                $fullPath = $directoryPath . '/' . $imageName;
                Storage::disk('public')->put($fullPath, (string) $imageInstance->encode());
            }

            $paramCaraosel = [
                'uuid' => getUuid(),
                'title' => $request->judul ?? '',
                'deskripsi' => $request->deskripsi ?? '',
                'slogan' => $request->slogan ?? '',
                'image' => $imageName,
                'userId' => getUserId(),
                'isActive' => $request->isActive
            ];

            $dataCaraosel = Caraosel::caraoselUpdateField($uuid, $paramCaraosel);
            if ($dataCaraosel['status'] != 'success') {
                toast('Data Caraosel Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back()->withInput();
            }

            DB::commit();
            toast('Data Caraosel Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Update Caraosel', [
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

            $data = Caraosel::where('uuid', $uuid)->first();

            if ($data->delete()) {
                DB::commit();
                toast('Data Caraosel Berhasil Di Hapus', 'success')->autoClose(5000)->timerProgressBar();
            } else {
                toast('Data Caraosel Gagal Di Hapus', 'warning')->autoClose(5000)->timerProgressBar();
            }

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('[ Setting Dashboard ] - Delete Caraosel', [
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
