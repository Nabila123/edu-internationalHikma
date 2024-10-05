<?php
  
namespace Database\Seeders;
  
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
  
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Saya Administrator', 
            'username'  => 'admin',
            'noHp'  => '08880808080',
            'email'     => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'   => bcrypt('admin'),     
            'photo'      => 'assets/media/avatars/blank.png',
            'uuid'       => getUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        $role = Role::create([
            'name'          => 'administrator',
            'guard_name'    => 'web',
        ]);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}