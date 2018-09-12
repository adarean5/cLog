<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);

        $tag = new Tag([
           'name' => $request->get('name'),
           'color' => '#18ffff'
        ]);

        auth()->user()->publishTag($tag);

        $response = array(
            'status' => 'success',
        );

        return response()->json($response);
    }
}
