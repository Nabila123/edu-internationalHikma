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
            'main-layouting-setting-read',
            'main-layouting-setting-create',
            'main-layouting-setting-update',
            'main-layouting-setting-delete',
            'main-layouting-profile-tentang-sekolah-read',
            'main-layouting-profile-tentang-sekolah-create',
            'main-layouting-profile-tentang-sekolah-update',
            'main-layouting-profile-tentang-sekolah-delete',
            'main-layouting-profile-sejarah-sekolah-read',
            'main-layouting-profile-sejarah-sekolah-create',
            'main-layouting-profile-sejarah-sekolah-update',
            'main-layouting-profile-sejarah-sekolah-delete',
            'main-layouting-profile-profile-yayasan-read',
            'main-layouting-profile-profile-yayasan-create',
            'main-layouting-profile-profile-yayasan-update',
            'main-layouting-profile-profile-yayasan-delete',
            'main-layouting-profile-profile-pengajar-read',
            'main-layouting-profile-profile-pengajar-create',
            'main-layouting-profile-profile-pengajar-update',
            'main-layouting-profile-profile-pengajar-delete',
            'main-layouting-profile-visi-misi-read',
            'main-layouting-profile-visi-misi-create',
            'main-layouting-profile-visi-misi-update',
            'main-layouting-profile-visi-misi-delete',
            'main-layouting-profile-standart-kompetensi-read',
            'main-layouting-profile-standart-kompetensi-create',
            'main-layouting-profile-standart-kompetensi-update',
            'main-layouting-profile-standart-kompetensi-delete',
            'main-layouting-akademik-program-unggulan-read',
            'main-layouting-akademik-program-unggulan-create',
            'main-layouting-akademik-program-unggulan-update',
            'main-layouting-akademik-program-unggulan-delete',
            'main-layouting-akademik-asrama-read',
            'main-layouting-akademik-asrama-create',
            'main-layouting-akademik-asrama-update',
            'main-layouting-akademik-asrama-delete',
            'main-layouting-prestasi-read',
            'main-layouting-prestasi-create',
            'main-layouting-prestasi-update',
            'main-layouting-prestasi-delete',
            'main-layouting-galeri-read',
            'main-layouting-galeri-create',
            'main-layouting-galeri-update',
            'main-layouting-galeri-delete',
            'main-layouting-berita-kabar-read',
            'main-layouting-berita-kabar-create',
            'main-layouting-berita-kabar-update',
            'main-layouting-berita-kabar-delete',
            'main-layouting-berita-blog-read',
            'main-layouting-berita-blog-create',
            'main-layouting-berita-blog-update',
            'main-layouting-berita-blog-delete',
            'main-layouting-kontak-read',
            'main-layouting-kontak-create',
            'main-layouting-kontak-update',
            'main-layouting-kontak-delete',
            'main-layouting-karier-read',
            'main-layouting-karier-create',
            'main-layouting-karier-update',
            'main-layouting-karier-delete',
            'main-layouting-karier-applicant',
            'main-layouting-karier-approve',
            'main-layouting-testimoni-read',
            'main-layouting-testimoni-create',
            'main-layouting-testimoni-update',
            'main-layouting-testimoni-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
