<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = getUserId();
        $profile = User::where('id', $userId)->first();

        return view('management.profile.index', compact('profile'));
    }

    public function uploadImage($avatar, $username)
    {
        $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $username . '.' . $avatar->getClientOriginalExtension());
        $avatar->move(public_path('assets/media/avatars'), $filename);

        return $filename;
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $paramUser = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'noHp' => preg_replace('/\D/', '', $request->noHp),
            ];

            $data = User::userUpdateField($id, $paramUser);
            if ($data['status'] != "success") {
                toast('Data Profile Gagal Diubah !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            toast('Data Profile Berhasil diubah', 'success')->autoClose(3000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Data Profile', [
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

    public function updatePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            $paramUser = [
                'password' => bcrypt($request->password)
            ];

            $data = User::userUpdateField($request->id, $paramUser);
            if ($data['status'] != "success") {
                toast('Password Gagal Diubah !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            toast('Password berhasil diubah', 'success')->autoClose(3000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Ubah Password', [
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
