<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('roles-read'), 403);

        $datas = Role::paginate(25);

        $noPage = ($datas->currentPage() - 1) * $datas->perPage() + 1;
        foreach ($datas as $data) {
            $data->noPage = $noPage++;
        }

        return view('settings.roles.index', compact('datas'));
    }

    public function search(Request $request)
    {
        abort_if(Gate::denies('roles-read'), 403);

        $keyword = $request->keyword;
        $roles = Role::where('name', 'like', '%' . $keyword . '%')->paginate(10);

        return view('settings.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('roles-create'), 403);

        $parent = [];
        $child = [];
        $i = 0;
        $permissions = Permission::orderBy('name', 'ASC')->get();
        foreach ($permissions as $permission) {
            $permissionName = explode("-", $permission->name);
            $name = '';
            for ($p = 0; $p < (count($permissionName) - 1); $p++) {
                $name = $name . ' ' . $permissionName[$p];
            }

            if (in_array($name, $parent)) {
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            } else {
                $i = 0;
                array_push($parent, $name);
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            }
            $i++;
        }

        $data['pageTitle'] = 'Tambah Data Role';
        $data['permissions'] = [$parent, $child];

        return view('settings.roles.create', $data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('roles-create'), 403);
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'permissions' => 'required'
            ], [
                'name.required' => 'Nama Permission Tidak Boleh Kosong !!',
                'permissions.required' => 'Permission Tidak Boleh Kosong !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }

            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            DB::commit();
            toast('Data berhasil disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect('/roles');
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Create Role', [
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


    public function show($id)
    {
        abort_if(Gate::denies('roles-read'), 403);

        $parent = [];
        $child = [];
        $i = 0;
        $permissions = Permission::orderBy('name', 'ASC')->get();
        foreach ($permissions as $permission) {
            $permissionName = explode("-", $permission->name);
            $name = '';
            for ($p = 0; $p < (count($permissionName) - 1); $p++) {
                $name = $name . ' ' . $permissionName[$p];
            }

            if (in_array($name, $parent)) {
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            } else {
                $i = 0;
                array_push($parent, $name);
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            }
            $i++;
        }

        $data['pageTitle'] = 'Roles Detail';
        $data['roles'] = Role::find($id);
        $data['permissions'] = [$parent, $child];
        $data['rolePermissions'] = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('settings.roles.detail', $data);
    }


    public function edit($id)
    {
        abort_if(Gate::denies('roles-update'), 403);

        $parent = [];
        $child = [];
        $i = 0;
        $permissions = Permission::orderBy('name', 'ASC')->get();
        foreach ($permissions as $permission) {
            $permissionName = explode("-", $permission->name);
            $name = '';
            for ($p = 0; $p < (count($permissionName) - 1); $p++) {
                $name = $name . ' ' . $permissionName[$p];
            }

            if (in_array($name, $parent)) {
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            } else {
                $i = 0;
                array_push($parent, $name);
                $child[$name][$i][0] = $permission->id;
                $child[$name][$i][1] = $permissionName[count($permissionName) - 1];
            }
            $i++;
        }

        $data['pageTitle'] = 'Ubah Data Role';
        $data['roles'] = Role::find($id);
        $data['permissions'] = [$parent, $child];
        $data['rolePermissions'] = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('settings.roles.update', $data);
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('roles-update'), 403);
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'permissions' => 'required'
            ], [
                'name.required' => 'Nama Permission Tidak Boleh Kosong !!',
                'permissions.required' => 'Permission Tidak Boleh Kosong !!',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    toast($error, 'warning')->autoClose(5000)->timerProgressBar();
                }
                return redirect()->back();
            }


            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();

            $role->syncPermissions($request->permissions);

            DB::commit();
            toast('Data berhasil disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect('/roles');
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Update Role', [
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


    public function destroy(Role $role)
    {
        abort_if(Gate::denies('roles-delete'), 403);
        try {
            DB::beginTransaction();

            Role::destroy($role->id);

            DB::commit();
            toast('Data berhasil disimpan', 'success')->autoClose(5000)->timerProgressBar();
            return redirect('/roles');
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Delete Role', [
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
