<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\code;
class codeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        code::create([
            'name'=>'V4L1D',
            'value'=>0.2,
            'valid'=>1,
        ]);
        code::create([
            'name'=>'B4D',
            'value'=>0.2,
            'valid'=>0,
        ]);
    }
}
