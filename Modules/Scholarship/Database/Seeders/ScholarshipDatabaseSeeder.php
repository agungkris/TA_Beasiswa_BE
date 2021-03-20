<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ScholarshipDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PeriodTableSeeder::class);
        $this->call(AnnouncementTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        $this->call(SubmissionTableSeeder::class);
    }
}
