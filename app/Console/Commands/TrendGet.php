<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TrendKeyword;
use App\Models\TwitterAPI;

class TrendGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trendget';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'トレンド取得';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $t = new TwitterAPI();
        $d = $t->searchTrends("1110809");
        $r = TrendKeyword::addKeyword($d);

    }
}
