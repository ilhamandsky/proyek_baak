<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role
        $adminBaak = Role::firstOrCreate(['name' => 'admin-baak', 'guard_name' => 'web']);
        $adminKeuangan = Role::firstOrCreate(['name' => 'admin-keuangan', 'guard_name' => 'web']);
        $mahasiswa = Role::firstOrCreate(['name' => 'mahasiswa', 'guard_name' => 'web']);

        // Assign Permissions ke Role
        $adminBaak->syncPermissions([
            'create-mahasiswa',
            'edit-mahasiswa',
            'delete-mahasiswa',
            'show-mahasiswa'
        ]);

        $adminKeuangan->syncPermissions([
            'show-mahasiswa'
        ]);

        $mahasiswa->syncPermissions([
            'edit-mahasiswa',
            'show-mahasiswa'
        ]);

        // Contoh assign role ke user
        $user1 = User::firstOrCreate(['email' => 'dimasanggara@adminbaak.com'], [
            'name' => 'Dimas Anggara',
            'password' => Hash::make('dimas12345')
        ]);
        $user1->assignRole('admin-baak');

        $user2 = User::firstOrCreate(['email' => 'steviaaudrey@adminkeuangan.com'], [
            'name' => 'Stevia Audrey Patricia Nainggolan',
            'password' => Hash::make('seblakfav211')
        ]);
        $user2->assignRole('admin-keuangan');

        $user3 = User::firstOrCreate(['email' => 'h1201231044@gmail.com'], [
            'name' => 'Tan Sagara Juliandhika',
            'password' => Hash::make('tansgr123')
        ]);
        $user3->assignRole('mahasiswa');
    }
}
