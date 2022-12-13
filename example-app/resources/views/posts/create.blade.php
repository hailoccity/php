@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Create Post</div>
                        <div><a href="{{route('posts.index')}}" class="btn btn-success">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="title">Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
