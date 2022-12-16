@extends('layouts.app')

@section('content')
    <div class="container" xmlns="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Posts</div>
                            <div><a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <form class="d-flex align-items-center d-inline-flex" action="">
                                <label class="me-3" for="category_filter">Filter By Category</label>
                                <select class="form-control" id="category_filter" name="category">
                                    <option value="">Select Category</option>
                                    @if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label for="keyword">&nbsp;&nbsp;</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword">
                                    <span>&nbsp;</span>
                                     <button type="button" onclick="search_post()" class="btn btn-primary">Search</button>
                                @if(\Illuminate\Http\Request::query('category'))
                                      <a class="btn btn-success" href="#">Clear</a>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Created By</th>
                                    <th>Category</th>
                                    <th>Total Comments
                                        <a href="javascript:sort('desc')"><i class="fa fa-sort"></i></a>
{{--                                        <a href=""><i class="fa fa-sort-up"></i></a>--}}
{{--                                        <a href=""><i class="fa fa-sort"></i></a>--}}
                                    </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($posts))
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td style="width: 35%">{{$post->title}}</td>
                                            <td ><img src="https://www.w3schools.com/html/img_chania.jpg" width="50" alt="ars"/></td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td class="text-center">2</td>
                                            <td  class="d-flex w-100 h-auto">
                                                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary me-1">View</a>
                                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success me-1">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">No posts found</td>
                                    </tr>
                                @endif

{{--                                <tr>--}}
{{--                                    <td>2</td>--}}
{{--                                    <td style="width: 35%">Title 2</td>--}}
{{--                                    <td style="width: 10%"><img src="https://www.w3schools.com/html/img_chania.jpg" height="50" width="50" alt="ars"/></td>--}}
{{--                                    <td>Ominext</td>--}}
{{--                                    <td>Science</td>--}}
{{--                                    <td class="text-center">4</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="#" class="btn btn-primary me-1">View</a>--}}
{{--                                        <a href="#" class="btn btn-success me-1">Edit</a>--}}
{{--                                        <a href="#" class="btn btn-danger">Delete</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section("javascript")
<script type="text/javascript">
    var query = <?php use Illuminate\Http\Request;echo json_encode((object)(new Illuminate\Http\Request)->query()); ?>;
    function sort(value) {
        Object.assign(query, {"sortByComments": value});
        window.location.href= "{{route('posts.index')}}?"+$.param(query);
    }
    function search_post(){
        Object.assign(query, {"category": $('#category_filter').val()});
        Object.assign(query, {"keyword": $('#keyword').val()});
        window.location.href= "{{route('posts.index')}}?"+$.param(query);
    }
</script>
@endsection
