<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Miswanto User',
            'email' => 'miswanto@fic20.com',
            'password' => Hash::make('12345678'),
        ]);

        //create other user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@fic20.com',
            'password' => Hash::make('12345678'),
        ]);

        //create other user
        User::factory()->create([
            'name' => 'HR User',
            'email' => 'hr@fic20.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            ShiftSeeder::class,
            BasicSalarySeeder::class,
            RoleUserSeeder::class,
            HolidaySeeder::class,
            LeaveTypeSeeder::class,
            LeaveSeeder::class,
            AttendanceSeeder::class,
            PayrollSeeder::class,
        ]);
    }
}
