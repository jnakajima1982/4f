<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth;
use App\Models\TwitterAPI;
class TrendKeywordChild extends Model
{
    use HasFactory;
    protected $fillable =   [
                            'trend_keyword_id',
                            'tweet_id',
                            'tweet_user',    
    ];


    public static function addKeywordTweet($id, String $keyword){
        $t = new TwitterAPI();
        $KeywordInfo = $t->serachTweets($keyword);
        print '<h1>'.$keyword.'</h1>';
        echo "<pre>";
        var_dump($KeywordInfo);
        echo "</pre>";

        foreach($KeywordInfo as $k){
            $TweetUser = $k->user->screen_name;
            $TweetId = $k->id_str;

            //TweetKeywordChildとしてDB登録//
            $TweetKeywordChild = new TrendKeywordChild();
            $TweetKeywordChild->fill([
                                        'trend_keyword_id' => $id,
                                        'tweet_id' => $TweetId,
                                        'tweet_user' => $TweetUser,

            ]);
            $TweetKeywordChild->save();
        }
    }
}
