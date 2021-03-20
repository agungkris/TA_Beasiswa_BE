<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(ProfileTableSeeder::class);
        // $this->call(ProfileTableSeeder::class);

        Profile::updateOrCreate(
            [
                'id' => 1,
                'user_id' => 2,
                // 'prodi_id' => 7,
            ],
            [
                'id' => 1,
                'user_id' => 2,
                'prodi_id' => 7,
                'generation' => 2017,
                'created_at' => '2021-01-31 05:42:30',
                'updated_at' => '2021-01-31 05:42:30'
            ]
        );

        Profile::updateOrCreate([
            'id' => 2,
            'user_id' => 6,
            // 'prodi_id' => 1,
        ], [
            'id' => 2,
            'user_id' => 6,
            'prodi_id' => 1,
            'generation' => 2017,
            'created_at' => '2021-01-31 07:04:25',
            'updated_at' => '2021-01-31 07:04:25'
        ]);

        Profile::updateOrCreate(
            [
                'id' => 3,
                'user_id' => 7,
                // 'prodi_id' => 1,
            ],
            [
                'id' => 3,
                'user_id' => 7,
                'prodi_id' => 1,
                'generation' => 2018,
                'created_at' => '2021-01-31 07:05:35',
                'updated_at' => '2021-01-31 07:05:35'
            ]
        );



        Profile::updateOrCreate([
            'id' => 4,
            'user_id' => 8,
            // 'prodi_id' => 2,
        ], [
            'id' => 4,
            'user_id' => 8,
            'prodi_id' => 2,
            'generation' => 2017,
            'created_at' => '2021-01-31 07:06:31',
            'updated_at' => '2021-01-31 07:06:31'
        ]);



        Profile::updateOrCreate([
            'id' => 5,
            'user_id' => 9,
            // 'prodi_id' => 3,
        ], [
            'id' => 5,
            'user_id' => 9,
            'prodi_id' => 3,
            'generation' => 2017,
            'created_at' => '2021-01-31 07:07:18',
            'updated_at' => '2021-01-31 07:07:18'
        ]);



        Profile::updateOrCreate([
            'id' => 6,
            'user_id' => 10,
            // 'prodi_id' => 4,
        ], [
            'id' => 6,
            'user_id' => 10,
            'prodi_id' => 4,
            'generation' => 2018,
            'created_at' => '2021-01-31 07:08:02',
            'updated_at' => '2021-01-31 07:08:02'
        ]);



        Profile::updateOrCreate(
            [
                'id' => 7,
                'user_id' => 11,
                // 'prodi_id' => 5,
            ],
            [
                'id' => 7,
                'user_id' => 11,
                'prodi_id' => 5,
                'generation' => 2018,
                'created_at' => '2021-01-31 07:09:22',
                'updated_at' => '2021-01-31 07:09:22'
            ]
        );



        Profile::updateOrCreate(
            [
                'id' => 8,
                'user_id' => 12,
                // 'prodi_id' => 6,
            ],
            [
                'id' => 8,
                'user_id' => 12,
                'prodi_id' => 6,
                'generation' => 2018,
                'created_at' => '2021-01-31 07:13:51',
                'updated_at' => '2021-01-31 07:13:51'
            ]
        );



        Profile::updateOrCreate(
            [
                'id' => 9,
                'user_id' => 13,
                // 'prodi_id' => 7,
            ],
            [
                'id' => 9,
                'user_id' => 13,
                'prodi_id' => 7,
                'generation' => 2018,
                'created_at' => '2021-01-31 07:21:32',
                'updated_at' => '2021-01-31 07:21:32'
            ]
        );
    }
}
