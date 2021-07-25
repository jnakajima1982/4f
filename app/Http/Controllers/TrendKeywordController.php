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
        $t = new TwitterAPI();
        $d = $t->searchTrends("1110809");
        // $d = $t->serachTweets("金メダル");
        return view('twitter',['twitter'=>$d]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrendKeyword  $trendKeyword
     * @return \Illuminate\Http\Response
     */
    public function show(TrendKeyword $trendKeyword)
    {
        //
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
