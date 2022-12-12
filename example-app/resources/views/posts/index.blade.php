@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Posts</div>
                            <div><a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <form class="form-check-inline" action="">
                                <label for="category_filter">Filter By Category &nbsp;</label>
                                <select class="form-control" id="category_filter" name="category">
                                    <option value="">Select Category</option>
                                </select>
                                <label for="keyword">&nbsp;&nbsp;</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword">
                                    <span>&nbsp;</span>
                                     <button type="button" class="btn btn-primary">Search</button>
                                      <a class="btn btn-success" href="#">Clear</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
