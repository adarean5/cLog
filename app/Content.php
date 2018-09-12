<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'tag_id',
        'name',
        'lastname',
        'email',
        'phone',
        'organization',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tag(){
        $tag = $this->belongsTo(Tag::class);
        return $this->belongsTo(Tag::class);
    }
}
