<?php

namespace App\Http\Controllers;

use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('users-read'), 403);

        $roleId = getRolesId();
        $datas = User::select('users.*', 'roles.name as roleName', 'roles.id as roleId')
            ->join('model_has_roles', 'model_has_roles.model_id', 'users.id')
            ->join('roles', 'roles.id', 'model_has_roles.role_id')
            ->when($roleId > 1, function ($q) use ($roleId) {
                return $q->where('users.id', '!=', getUserId())
                    ->where('roles.id', '>', $roleId);
            })
            ->orderBy('users.created_at', 'Desc')
            ->orderBy('roles.name', 'ASC')
            ->paginate(25);

        $noPage = ($datas->currentPage() - 1) * $datas->perPage() + 1;
        foreach ($datas as $user) {
            $user->noPage = $noPage++;
            $user->approve = $user->approvedBy != null ? getNamaUser($user->approvedBy) : ' - ';
            $user->roles = $user->getRole->role->name;
            $user->status = $user->deleted_at == null ? 'Aktif' : 'Tidak Aktif';
        }


        return view('management.users-manage.index', compact('datas'));
    }

    public function search(Request $request)
    {
        abort_if(Gate::denies('users-read'), 403);

        $keyword = $request->keyword;
        $data = User::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        $roles = Role::all();

        return view('management.users-manage.index', compact('data', 'roles'));
    }

    public function checkUsername(Request $request)
    {
        abort_if(Gate::denies('users-create'), 403);

        $data = User::where('username', $request->username)->first();
        if ($data == null) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkEmail(Request $request)
    {
        abort_if(Gate::denies('users-create'), 403);

        $data = User::where('email', $request->email)->first();
        if ($data == null) {
            return 1;
        } else {
            return 0;
        }
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('users-create'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'roleId' => 'required',
                'name' => 'required',
                'password' => 'required',
                'username' => [
                    'required',
                    Rule::unique('users')->whereNull('deleted_at'),
                ],
                'noHp' => [
                    'required',
                    Rule::unique('users')->whereNull('deleted_at'),
                ],
                'email' => [
                    'nullable',
                    'email',
                    Rule::unique('users')->whereNull('deleted_at'),
                ],
            ], [
                'roleId.required' => 'Pilihan Role Tidak Boleh Kosong !!',
                'name.required' => 'Nama User Tidak Boleh Kosong !!',
                'username' => 'Username Tidak Boleh Kosong !!',
                'username' => 'Username Sudah Digunakan !!',
                'password' => 'Password Tidak Boleh Kosong !!',
                'noHp' => 'Nomor Hp (WA) Tidak Boleh Kosong !!',
                'noHp' => 'Nomor Hp (WA) Sudah Digunakan !!',
                'email' => 'Type Email Salah !!',
                'email' => 'Email Sudah Digunakan !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back()->withInput();
            }

            $paramUser = [
                'uuid' => getUuid(),
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'noHp' => preg_replace('/\D/', '', $request->noHp),
                'password' => bcrypt($request->password),
                'approvedBy' => getUserId(),
            ];
            $data = User::userUpdateField('', $paramUser);
            if ($data['status'] != "success") {
                toast('Data Gagal Disimpan !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            $paramModelHasRole = [
                'role_id' => $request->roleId,
                'model_type' => 'App\Models\User',
                'model_id' => $data['data']->id,
            ];
            $dataModel = ModelHasRole::modelHasRoleUpdateField('', $paramModelHasRole);
            if ($dataModel['status'] != "success") {
                toast('Data Gagal Disimpan !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            toast('Data User Berhasil Disimpan !!', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Create Data User Login', [
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

    public function edit($id)
    {

        $user = User::find($id);
        $role = ModelHasRole::where('model_id', $id)->first();

        return response()->json([
            'user' => $user,
            'role' => $role,
        ]);
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('users-update'), 403);

        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'noHp' => 'required|unique:users,noHp',
                'email' => [
                    'nullable',
                    'email',
                    Rule::unique('users')->whereNull('deleted_at'),
                ],
            ], [
                'name.required' => 'Nama User Tidak Boleh Kosong !!',
                'noHp' => 'Nomor Hp (WA) Tidak Boleh Kosong !!',
                'noHp' => 'Nomor Hp (WA) Sudah Digunakan !!',
                'email' => 'Type Email Salah !!',
                'email' => 'Email Sudah Digunakan !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back()->withInput();
            }

            $paramUser = [
                'uuid' => getUuid(),
                'name' => $request->name,
                'email' => $request->email,
                'noHp' => preg_replace('/\D/', '', $request->noHp),
                'approvedBy' => getUserId(),
            ];
            $data = User::userUpdateField($user->id, $paramUser);
            if ($data['status'] != "success") {
                toast('Data Gagal Disimpan !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            toast('Data User Berhasil Disimpan !!', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Update Data User Login', [
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

    public function destroy(User $user)
    {
        abort_if(Gate::denies('users-delete'), 403);

        try {
            DB::beginTransaction();

            $user = User::find($user->id);

            if ($user->delete()) {
                DB::commit();
                toast('Data Berhasil Di Hapus', 'success')->autoClose(5000)->timerProgressBar();
            } else {
                toast('Data Gagal Di Hapus', 'warning')->autoClose(5000)->timerProgressBar();
            }

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Delete Data User Login', [
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

    //OTHER
    public function resetAkun($id)
    {
        abort_if(Gate::denies('users-delete'), 403);
        try {
            DB::beginTransaction();

            $data = User::find($id);
            if ($data->noHp == null || $data->noHp == '') {
                toast('Nomor Hp (WA) User Belum Disetting !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            $username = generateRandomString(6, 'username');
            $password = generateRandomString(8, 'password');
            $param = [
                'username' => $username,
                'password' => bcrypt($password),
            ];
            $data = User::userUpdateField($id, $param);
            if ($data['status'] != "success") {
                toast('Data User Gagal Di Reset !!!', 'warning')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }

            DB::commit();
            toast('Data User Berhasil Di Reset !!', 'success')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Reset Akun User Login', [
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
