@extends('layouts.app')

@section('content')
    <div class="row">

            <img src="{{asset("storage/".$article->picture)  }}" alt="{{$article->title}}" class="img-fluid"/>

    </div>
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <h1 class="text-center" style="margin-bottom:-10px;">{{$article->title}}</h1>
            </div>
            <div class="col-md-12">
                {!! $article->body !!}
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #5a6268;min-height:40px;">
        <div class="container">
            <h5 class="text-center">Author:{{$article->user->name}}</h5>
        </div>
    </div>

@endsection
