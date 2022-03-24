<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::create([
            'name_ar' => 'NaserCity',
            'who_we_are_ar' => 'who_we_are',
            'what_we_do_ar' => 'what_we_do',
            'ploicy_ar' => 'ploicy',
            'active' => 1,

        ]);

    }
}
