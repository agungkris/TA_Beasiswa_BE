<?php

namespace Modules\Auth\Database\Seeders;

use Modules\Auth\Entities\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        prodi::updateOrCreate([
            'id' => 1
        ], [
            'id' => 1,
            'name' => 'Akuntansi',
            'created_at' => '2021-01-31 05:40:50',
            'updated_at' => '2021-01-31 05:40:50'
        ]);



        Prodi::updateOrCreate([
            'id' => 2
        ], [
            'id' => 2,
            'name' => 'Manajemen',
            'created_at' => '2021-01-31 05:40:57',
            'updated_at' => '2021-01-31 05:40:57'
        ]);



        Prodi::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Ilmu Komunikasi',
                'created_at' => '2021-01-31 05:41:11',
                'updated_at' => '2021-01-31 05:41:11'
            ]
        );



        Prodi::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Psikologi',
                'created_at' => '2021-01-31 05:41:18',
                'updated_at' => '2021-01-31 05:41:18'
            ]
        );



        Prodi::updateOrCreate([
            'id' => 5
        ], [
            'id' => 5,
            'name' => 'Desain Komunikasi Visual',
            'created_at' => '2021-01-31 05:41:34',
            'updated_at' => '2021-01-31 05:41:34'
        ]);



        Prodi::updateOrCreate([
            'id' => 6
        ], [
            'id' => 6,
            'name' => 'Desain Produk',
            'created_at' => '2021-01-31 05:41:40',
            'updated_at' => '2021-01-31 05:41:40'
        ]);



        Prodi::updateOrCreate([
            'id' => 7
        ], [
            'id' => 7,
            'name' => 'Informatika',
            'created_at' => '2021-01-31 05:41:46',
            'updated_at' => '2021-01-31 05:41:46'
        ]);



        Prodi::updateOrCreate([
            'id' => 8
        ], [
            'id' => 8,
            'name' => 'Sistem Informasi',
            'created_at' => '2021-01-31 05:41:53',
            'updated_at' => '2021-01-31 05:41:53'
        ]);



        Prodi::updateOrCreate([
            'id' => 9
        ], [
            'id' => 9,
            'name' => 'Teknik Sipil',
            'created_at' => '2021-01-31 05:42:04',
            'updated_at' => '2021-01-31 05:42:04'
        ]);



        Prodi::updateOrCreate([
            'id' => 10
        ], [
            'id' => 10,
            'name' => 'Arsitektur',
            'created_at' => '2021-01-31 05:42:09',
            'updated_at' => '2021-01-31 05:42:09'
        ]);




        // $this->call("OthersTableSeeder");
    }
}
