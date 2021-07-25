<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Config;

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
        // dd($this->t);
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
            'count' => 3,
        ]);
        
        dd($d);
        // return $d->statuses;
    }
}
