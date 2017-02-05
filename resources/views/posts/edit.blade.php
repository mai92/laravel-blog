@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Buat Post</div>

                    <div class="panel-body">

                        @include('layouts.partials.alert')

                        <form action="{{ route('posts.edit', $post->slug) }}" method="post" class="">
                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" id="" rows="5" class="form-control">{{ $post->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Edit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
