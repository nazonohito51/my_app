<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Tweet;
use App\HashTag;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
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
        // ex:
        //   preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
        //   == ['tag1', 'tag2, 'tag3', 'tag4'];
        $inputs = [
            'body' => $request->input('body'),
            'hash_tags' => preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY),
        ];

        $rule = [
            'body' => ['required', 'max:255'],
            'hash_tags' => 'array',
        ];
        foreach (range(0, count($inputs['hash_tags'])) as $num) {
            $rule['hash_tags.' . $num] = ['required', 'string', 'max:255'];
        }

        $validator = Validator::make($inputs, $rule);
        if ($validator->failed()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->authorize('create-tweet');

        $tweet = new \App\Tweet();
        $tweet->body = $inputs['body'];
        $tweet->user_id = Auth::user()->id;
        $tweet->save();

        $hash_tag_ids = [];
        foreach ($inputs['hash_tags'] as $name) {
            $hash_tag = HashTag::firstOrCreate([
                'name' => $name,
            ]);
            $hash_tag_ids[] = $hash_tag->id;
        }

        $tweet->hash_tags()->sync($hash_tag_ids);

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
        // ex:
        //   preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
        //   == ['tag1', 'tag2, 'tag3', 'tag4'];
        $inputs = [
            'body' => $request->input('body'),
            'hash_tags' => preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY),
        ];

        $rule = [
            'body' => ['required', 'max:255'],
            'hash_tags' => 'array',
        ];
        foreach (range(0, count($inputs['hash_tags'])) as $num) {
            $rule['hash_tags.' . $num] = ['required', 'string', 'max:255'];
        }

        $validator = Validator::make($inputs, $rule);
        if ($validator->failed()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tweet = Tweet::findOrFail($id);
        $this->authorize('update-tweet', $tweet);

        $tweet->body = $inputs['body'];
        $tweet->save();

        $hash_tag_ids = [];
        foreach ($inputs['hash_tags'] as $name) {
            $hash_tag = HashTag::firstOrCreate([
                'name' => $name,
            ]);
            $hash_tag_ids[] = $hash_tag->id;
        }

        $tweet->hash_tags()->sync($hash_tag_ids);

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

    public function getUser($user_id)
    {
        $tweets = Tweet::where(['user_id' => $user_id])->orderBy('created_at', 'desc')->paginate(10);
        return view('tweet.index', [
            'tweets' => $tweets,
        ]);
    }

    public function getHashTag($hash_tag_id)
    {
        $tweets = Tweet::whereHas('hash_tags', function ($query) use ($hash_tag_id) {
            $query->where('hash_tag_id', $hash_tag_id);
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('tweet.index', [
            'tweets' => $tweets,
        ]);
    }
}
