<?php //xdebug_break(); ?>
@extends('layouts.master')

@section('content')

    <div id="mainDisplay" class="box">
        <div class="contactGrid">
            @foreach($contents as $content)
                @include('content.contactCard', ["content" => $content->getAttributes(), 'color' => $content->tag->color])
            @endforeach
        </div>
    </div>

@endsection
