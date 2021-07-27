<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class TrendKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trend_keywords')->insert([
            'uuid' => Str::uuid()->toString(),
            'keyword' => "test",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
