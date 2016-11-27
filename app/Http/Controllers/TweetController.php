<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Tweet;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

        // 各配列要素が文字列であることを確認するバリデーション
        Validator::extend('hash_tag_array', function ($attribute, $value, $parameters, $validator) {
            // arrayでなければバリデーションエラー
            if (!is_array($value)) {
                return false;
            }
            
            // $valueにはPOSTされたパラメータが入っている。今回の場合はこんな中身。
            // array (size=3)
            //   0 => string '1234567890' (length=10)
            //   1 => string '' (length=0)
            //   2 => string 'a' (length=1)
            foreach ($value as $string) {
                // 255文字以下の文字列以外の配列要素があればバリデーションエラー
                if (!(is_string($string) && mb_strlen($string) <= 255)) {
                    return false;
                }
            }

            // 全ての配列要素が文字列だと分かったのでバリデーションエラー無し
            return true;
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);
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
        $this->validate($request, [
            'body' => ['required', 'max:255'],
            'hash_tag' => ['required', 'array', 'hash_tag_array'],    // 全て空でもformのサイズ分のarrayとして必ず来る
        ]);
        $this->authorize('create-tweet');

        $tweet = new \App\Tweet();
        $tweet->body = $request->input('body');
        $tweet->user_id = Auth::user()->id;
        $tweet->save();

        return redirect()->route('tweet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('tweet.show', [
            'tweet' => $tweet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('tweet.edit', [
            'tweet' => $tweet,
        ]);
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
        $this->validate($request, [
            'body' => ['required', 'max:255'],
            'hash_tag' => ['required', 'array', 'hash_tag_array'],    // 全て空でもformのサイズ分のarrayとして必ず来る
        ]);

        $tweet = Tweet::findOrFail($id);
        $this->authorize('update-tweet', $tweet);

        $tweet->body = $request->input('body');
        $tweet->save();

        return redirect()->route('tweet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $this->authorize('delete-tweet', $tweet);

        $tweet->delete();

        return redirect()->route('tweet.index');
    }
}
