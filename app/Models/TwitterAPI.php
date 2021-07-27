<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Config;
use App\Models\TrendKeyword;


class TwitterAPI extends Model
{
    use HasFactory;
    private $t;
    
    public function __construct()
    {
        // dd(Config::get('twitter.API_KEY'));
        $this->t = new TwitterOAuth(
            Config::get('twitter.API_KEY'),
            Config::get('twitter.API_SECRET'),
            Config::get('twitter.TOKEN'),
            Config::get('twitter.TOKEN_SECRET')
        );
    }
    
    //ツイートトレンド取得
    public function searchTrends(String $woeid){
        $d = $this->t->get('trends/place',[
            'id' => $woeid,
        ]);

        return $d[0]->trends;
    }

    // ツイート検索
    public function serachTweets(String $searchWord)
    {
        $d = $this->t->get("search/tweets", [
            'q' => $searchWord,
            'count' => 4,
            'lang' => 'ja',
            'result_type' => 'mixed',
            'min_faves' => 10,
        ]);
        return $d->statuses;
    }
}
