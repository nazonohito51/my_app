<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    protected $fillable = ['name'];
    
    /**
     * ツイートを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tweets()
    {
        return $this->belongsToMany('App\Tweet');
    }
}
