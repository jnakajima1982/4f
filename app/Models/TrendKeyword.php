<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DateTime;
use App\Models\TrendKeywordChild;

class TrendKeyword extends Model
{
    use HasFactory;
    protected $fillable =   [
                                'keyword',
                                'uuid',    
                            ];

    //キーワードをDBに入力する//
    public static function addKeyword($trends){

        foreach($trends as $trend){
            $keyword = $trend->name;
            $result = TrendKeyword::firstOrCreate([
                'keyword' => $keyword
            ],[
                'uuid' => Str::uuid()->toString(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);

            // dd($result);
            if($result->wasRecentlyCreated){
                $id = $result->id;
                echo "Creating TrendKeywordChild for ".$keyword."<br>";
                //TrendKeywordChild作成
                TrendKeywordChild::addKeywordTweet($id,$keyword);
            }
        }
    }

    public function getChildren(){
        return $this->hasMany('App\Models\TrendKeywordChild');
    }

}
