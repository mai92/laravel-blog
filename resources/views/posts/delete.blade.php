@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Delete Post</div>

                    <div class="panel-body">

                        @include('layouts.partials.alert')

                        <form action="{{ route('posts.delete', $post->slug) }}" method="post" class="">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <div class="form-group">
                                <h5>Apakah kamu yakin menghapus post {{ $post->title }} ?</h5>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Hapus" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
