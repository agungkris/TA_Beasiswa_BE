<?php

namespace Modules\Auth\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();




        User::updateOrCreate([
            'id' => 1
        ], [
            'id' => 1,
            'level' => 'admin',
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('admin'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 05:38:36',
            'updated_at' => '2021-01-31 05:38:36',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 2
        ], [
            'id' => 2,
            'level' => 'student',
            'username' => '2017071022',
            'name' => 'Anak Agung Ngurah Krisnanda Putra',
            'email' => 'agung@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('agung'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 05:42:30',
            'updated_at' => '2021-03-08 09:52:58',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 3
        ], [
            'id' => 3,
            'level' => 'juri',
            'username' => '12345678',
            'name' => 'Budi Dermawan',
            'email' => 'budi@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('budi'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 06:03:42',
            'updated_at' => '2021-01-31 06:03:42',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 4
        ], [
            'id' => 4,
            'level' => 'juri',
            'username' => '11223344',
            'name' => 'Syifa Andara',
            'email' => 'syifa@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('syifa'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 06:04:21',
            'updated_at' => '2021-03-03 06:44:57',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 5
        ], [
            'id' => 5,
            'level' => 'juri',
            'username' => '87654321',
            'name' => 'Dewi Ayu',
            'email' => 'dewi@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('dewi'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 06:04:47',
            'updated_at' => '2021-01-31 06:04:47',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 6
        ], [
            'id' => 6,
            'level' => 'student',
            'username' => '2017011020',
            'name' => 'Alifa Nur Sakinah',
            'email' => 'alifa@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('alifa'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:04:25',
            'updated_at' => '2021-03-03 05:54:03',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 7
        ], [
            'id' => 7,
            'level' => 'student',
            'username' => '2018011010',
            'name' => 'Indah Puspita',
            'email' => 'indah@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('indah'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:05:35',
            'updated_at' => '2021-01-31 07:05:35',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 8
        ], [
            'id' => 8,
            'level' => 'student',
            'username' => '2017021012',
            'name' => 'Ratu Ayu',
            'email' => 'ratu@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('ratu'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:06:31',
            'updated_at' => '2021-01-31 07:06:31',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 9
        ], [
            'id' => 9,
            'level' => 'student',
            'username' => '2017031020',
            'name' => 'Reyhan Yazid',
            'email' => 'reyhan@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('reyhan'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:07:18',
            'updated_at' => '2021-01-31 07:07:18',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 10
        ], [
            'id' => 10,
            'level' => 'student',
            'username' => '2018031022',
            'name' => 'Ika Norma',
            'email' => 'ika@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('ika'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:08:02',
            'updated_at' => '2021-01-31 07:08:02',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 11
        ], [
            'id' => 11,
            'level' => 'student',
            'username' => '2018051022',
            'name' => 'Fathan Andra',
            'email' => 'fathan@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('fathan'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:09:22',
            'updated_at' => '2021-01-31 07:09:22',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 12
        ], [
            'id' => 12,
            'level' => 'student',
            'username' => '2018061030',
            'name' => 'Dina Novia',
            'email' => 'dina@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('dina'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:13:51',
            'updated_at' => '2021-01-31 07:13:51',
            'is_achievement' => 0
        ]);



        User::updateOrCreate([
            'id' => 13
        ], [
            'id' => 13,
            'level' => 'student',
            'username' => '2018071050',
            'name' => 'Made Dewantara',
            'email' => 'made@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('made'),
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:21:32',
            'updated_at' => '2021-03-10 04:07:56',
            'is_achievement' => 1
        ]);





        // $this->call("OthersTableSeeder");
    }
}
