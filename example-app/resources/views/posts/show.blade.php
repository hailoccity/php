@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Detail Post</h2>
                            <div><a href="{{route('posts.index')}}" class="btn btn-success">Back</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        Edit id {{$posts->id}}
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 30%">Field Name</th>
                                <th>Value</th>
                            </tr>
                            <tr>
                                <td>Id</td>
                                <td>{{$posts->id}}</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{$posts->title}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{$posts->description}}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img src="{{asset('post_image/'.$posts->image)}}" style="width: 50%; height: 50%"/></td>
                            </tr>
                            <tr>
                                <td>Create By</td>
                                <td>{{$posts->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Created Time</td>
                                <td>{{$posts->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{$posts->category->name}} -  {{date('Y-m-d H:i:s', '1671441982000')}}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
