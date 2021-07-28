<?php

namespace App\Http\Controllers;

use App\Models\TrendKeyword;
use Illuminate\Http\Request;
use App\Models\TwitterAPI;
class TrendKeywordController extends Controller
{
    private $t,$d;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = TrendKeyword::orderBy('id','desc')->first();
        $prev_id = $tweets->id - 1;
        $next_id = NULL;
        $keyword = $tweets->keyword;
        $tweets = $tweets->getChildren;
        return view('twitter',['tweets'=>$tweets,'keyword'=>$keyword,'prev_id'=>$prev_id,'next_id'=>$next_id]);

    }

    public function show($trend_id){
        $tweets = TrendKeyword::find($trend_id);
        if($tweets){
            $prev_id = $tweets->id - 1;
            $next_id = $tweets->id + 1;
            $keyword = $tweets->keyword;
            $tweets = $tweets->getChildren;
            return view('twitter',['tweets'=>$tweets,'keyword'=>$keyword,'prev_id'=>$prev_id,'next_id'=>$next_id]);
        }
        else{
            return redirect('/');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //TrendKeywordを作成//
    public function createTrendKeyword()
    {
        $t = new TwitterAPI();
        $d = $t->searchTrends("1110809");
        $r = TrendKeyword::addKeyword($d);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrendKeyword  $trendKeyword
     * @return \Illuminate\Http\Response
     */
    public function edit(TrendKeyword $trendKeyword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrendKeyword  $trendKeyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrendKeyword $trendKeyword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrendKeyword  $trendKeyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrendKeyword $trendKeyword)
    {
        //
    }
}
