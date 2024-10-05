<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        // abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.passwords.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {

        $user = auth()->user();

        $request->validated($request,[
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->name  = $request->name;
        $user->email = $request->email;
        // $user->no_hp = $request->no_hp;
    
        $user->save();

        toast('Data berhasil disimpan','success')->autoClose(3000)->timerProgressBar();

        return redirect()->route('password.edit');
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
