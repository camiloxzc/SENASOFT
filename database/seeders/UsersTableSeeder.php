<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Camilo Orozco',
            'email' => 'corozco083@misena.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('careers')->insert(
            [
            'career' => 'Especialista',
            'created_at' => now(),
            'updated_at' => now()],
    );
        DB::table('careers')->insert(
        [
            'career' => 'Medico',
            'created_at' => now(),
            'updated_at' => now()],
        );
        DB::table('careers')->insert(
        [
            'career' => 'Enfermero/a',
            'created_at' => now(),
            'updated_at' => now()],
        );
    }
}
