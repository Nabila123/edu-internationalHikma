<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permissions-create',
            'permissions-read',
            'permissions-update',
            'permissions-delete',
            'roles-create',
            'roles-read',
            'roles-update',
            'roles-delete',
            'users-create',
            'users-read',
            'users-update',
            'users-delete',
            'setting-backup-read',
            'setting-backup-create',
            'setting-backup-download',
            'setting-backup-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
