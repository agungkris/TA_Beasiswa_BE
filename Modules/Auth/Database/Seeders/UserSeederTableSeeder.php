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
            'password' => '$2y$10$1XuYgHjJjiVkT.fxq24V/elsksEialt27ZOg.WujwmVl2qyMdwbO6',
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
            'password' => '$2y$10$mHZ.a3uOPtkzg0ByF5w0veVCK7KYk/n83keBrZF6QdkMhQcjpQHjG',
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
            'password' => '$2y$10$cn2TH2Tk9tsYk2eR.udjB.L476PO6VLM8fS01XvRSDziPsiDgWWHu',
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
            'password' => '$2y$10$1IqXPqBytLnKqRDBNQnBG.uOYTcaEZKdUvzqasgn.188T07xw8jI2',
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
            'password' => '$2y$10$RE6svoR2lAMu7pwYfSvoPeO9XwamGyCAmOCko3jnoASFQ7bD5z8CW',
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
            'password' => '$2y$10$4u1cS8ZHENOWHHAO3jGV3OUNdT6zVgUogcN5yBMGvZsFecBprRl8m',
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
            'password' => '$2y$10$vzhDcLBIMB8krJQgVI9GTurT3HqKioXSNSGohIv1sXyN9HAFfFoai',
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
            'password' => '$2y$10$cAqDpWh/XxtkXCtm51iAHeUO004p/YFbtaMHGsZOAgL7ZlZf5D40i',
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
            'password' => '$2y$10$Ob5nQLsy.MpAmDzQvonlXeH8PC3GYc3yUwscUAZg8ZQEzvMKDrAsm',
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
            'password' => '$2y$10$PRFA.l7YQlLGIzJFpjy.leOo9MQ4cDp.PZzAd1Wnqus2vO9tXsYL.',
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
            'password' => '$2y$10$VF7Q9q9.SU.NpxeSSi7EzesMIGgXb96quQnS6krirBMHvNBva1V8S',
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
            'password' => '$2y$10$PS5uUWyP/2Va5DwdiksMsukyR3i.9/OXkbvUOs3opPjpouD80mZPy',
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
            'password' => '$2y$10$deKMqgwvERvjW5Cy4VYuzOcWGPOiig9o8vUmPuByEDDgqhpH63gnu',
            'remember_token' => NULL,
            'created_at' => '2021-01-31 07:21:32',
            'updated_at' => '2021-03-10 04:07:56',
            'is_achievement' => 1
        ]);





        // $this->call("OthersTableSeeder");
    }
}
