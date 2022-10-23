<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::create([
            'nama_perusahaan' => 'Default',
            'alamat' => 'Default',
            'telepon' => 'Default',
        ]);
    }
}
