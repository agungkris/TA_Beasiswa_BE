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
            'username' => 'admin',
            'level' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        // $this->call("OthersTableSeeder");
    }
}
