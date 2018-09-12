<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contents(){
        return $this->hasMany(Content::class)->latest();
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function publish(Content $content){
        $this->contents()->save($content);
    }

    public function publishTag(Tag $tag){
        $this->tags()->save($tag);
    }

    public function edit(Request $request){
        $this->contents()->where('id', $request->get('id'))->update([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'organization' => $request->get('organization'),
            'description' => $request->get('description'),
        ]);
    }
}
