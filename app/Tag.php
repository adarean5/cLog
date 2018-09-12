<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function content(){
        return $this->hasMany(Content::class);
    }
}
