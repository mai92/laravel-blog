@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.partials.alert')
        
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $post->title }}
                            oleh {{ $post->user->name }}
                            <span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="panel-body">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
