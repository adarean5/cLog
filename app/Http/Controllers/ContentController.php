<?php

namespace App\Http\Controllers;

use App\Content;
use DB;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email',
        ]);

        $content = new Content(
            [
                'tag_id' => DB::table('tags')->where('name', $request->get('folder'))->value('id') ,
                'name' => $request->get('name'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'organization' => $request->get('organization'),
                'description' => $request->get('description'),
            ]
        );

        auth()->user()->publish($content);

        $response = array(
            'status' => 'success',
            'id' => $content->id,
            'color' => $content->tag->color,
        );

        return response()->json($response);
    }

    public function destroy(Request $request){
        Content::find($request->get('id'))->delete();

        $response = array(
            'status' => 'success',
        );

        return response()->json($response);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email',
        ]);

        auth()->user()->edit($request);

        $response = array(
            'status' => 'success',
        );

        return response()->json($response);
    }
}
