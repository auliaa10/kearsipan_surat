<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
class RbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ========================
        // PERMISSIONS
        // ========================
        $permissions = [
            'dashboard.view',

            'surat_masuk.view',
            'surat_masuk.create',
            'surat_masuk.update',
            'surat_masuk.delete',
            'surat_masuk.disposisi',

            'surat_keluar.view',
            'surat_keluar.create',
            'surat_keluar.update',
            'surat_keluar.delete',
            'surat_keluar.submit',
            'surat_keluar.approve',

            'surat_manual.view',
            'surat_manual.create',
            'surat_manual.update',
            'surat_manual.delete',

            'sk.view',
            'sk.create',
            'sk.update',
            'sk.delete',
            'sk.submit',
            'sk.approve',

            'report.view',
            'master.manage',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // ========================
        // ROLES
        // ========================
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $tu = Role::firstOrCreate(['name' => 'tu']);
        $pimpinan = Role::firstOrCreate(['name' => 'pimpinan']);
        $staf = Role::firstOrCreate(['name' => 'staf']);

        // ========================
        // ROLE PERMISSION MAPPING
        // ========================

        // Admin = semua permission
        $admin->syncPermissions(Permission::all());

        // TU
        $tu->syncPermissions([
            'dashboard.view',

            'surat_masuk.view',
            'surat_masuk.create',
            'surat_masuk.update',
            'surat_masuk.disposisi',

            'surat_keluar.view',
            'surat_keluar.create',
            'surat_keluar.update',
            'surat_keluar.submit',

            'surat_manual.view',
            'surat_manual.create',
            'surat_manual.update',

            'sk.view',
            'sk.create',
            'sk.update',
            'sk.submit',

            'report.view',
        ]);

        // Pimpinan
        $pimpinan->syncPermissions([
            'dashboard.view',
            'surat_masuk.view',
            'surat_keluar.view',
            'surat_keluar.approve',
            'sk.view',
            'sk.approve',
            'report.view',
        ]);

        // Staf
        $staf->syncPermissions([
            'dashboard.view',
            'surat_masuk.view',
        ]);
    }
}
