<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan permission-nya ada
        $permission = Permission::firstOrCreate(['name' => 'create-mahasiswa']);

        // Ubah sesuai email user yang mau dikasih akses
        $user = User::where('email', 'dimasanggara@adminbaak.com')->first();

        if ($user) {
            $user->givePermissionTo($permission);
            echo "✅ Permission 'create-mahasiswa' diberikan ke {$user->name}.\n";
        } else {
            echo "⚠️  User tidak ditemukan.\n";
        }
    }
}
