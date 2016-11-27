<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['body', 'user_id'];

    /**
     * ユーザを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * ハッシュタグを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hash_tags()
    {
        return $this->belongsToMany('App\HashTag');
    }
}
