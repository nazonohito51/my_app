<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = \App\Tweet::all();
        return view('tweet.index', [
            'tweets' => $tweets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション処理を行うオブジェクト
        $validator = Validator::make($request->all(), [
            'body' => ['required', 'max:255']
        ]);
        // バリデーション結果の取得はpasses/fails
        if ($validator->fails()) {
            return redirect()               // リダイレクトをする
                ->back()                    // リダイレクト先は一つ前のURL
                ->withErrors($validator)    // エラーメッセージをフラッシュデータとして残す
                ->withInput();              // パラメータをフラッシュデータとして残す
        }

        $tweet = new \App\Tweet();
        $tweet->body = $request->input('body');
        $tweet->save();

        return redirect('tweet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
