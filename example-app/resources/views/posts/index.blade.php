@extends('layouts.app')

@section('content')
    <div class="container" xmlns="">
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
                            <form class="d-flex align-items-center d-inline-flex" action="">
                                <label class="me-3" for="category_filter">Filter By Category</label>
                                <select class="form-control" id="category_filter" name="category">
                                    <option value="" selected="">Select Category</option>
                                    @if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}" selected> {{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label for="keyword">&nbsp;&nbsp;</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword">
                                    <span>&nbsp;</span>
                                     <button type="button" onclick="search_post()" class="btn btn-primary">Search</button>
                                @if(Request::query('category') || Request::query('keyword'))
                                      <a class="btn btn-success" href="{{route('posts.index')}}">Clear</a>
                                @endif
                            </form>
                        </div>
                        <div class="d-flex">
                            <label for="optionselect" class="me-3">Chose Items</label>
                            <select class=" text-center" style="width: 10%" id="optionselect" name="optionselect">
                                <option value=""> </option>
                                <option  value="3" {{Request::query('size') == 3 ? 'selected': ''}}>3</option>
                                <option  value="5" {{Request::query('size') == 5 ? 'selected': ''}}>5</option>
                                <option  value="7" {{Request::query('size') == 7 ? 'selected': ''}}>7</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Created By</th>
                                    <th>Category</th>
                                    <th>Total Comments
                                        @if(Request::query('sortByComments') && Request::query('sortByComments') == 'desc')
                                        <a href="javascript:sort_post('asc') "><i class="fa fa-sort-down"></i></a>
                                        @elseif(Request::query('sortByComments') && Request::query('sortByComments') == 'asc')
                                            <a href="javascript:sort_post('desc')"><i class="fa fa-sort-up"></i></a>
                                        @else
                                            <a href="javascript:sort_post('asc')"><i class="fa fa-sort"></i></a>
                                        @endif
                                    </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($posts))
                                    @foreach($posts as $key=>$post)
{{--                                        @if($post->is_deleted == 0 ? $key : $key+1)--}}
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td style="width: 35%">{{$post->title}}</td>
                                            <td ><img src="{{ URL::to('/') }}/post_image/{{$post->image}}" width="50" alt="ars"/></td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td class="text-center">{{$post->comments_count}}</td>
                                            <td  class="d-flex w-100 h-auto">
{{--                                                @can('view', $post)--}}
{{--                                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary me-1">View</a>--}}
{{--                                                @endcan--}}
                                                @if(Auth::user()->can('view', $post))
                                                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary me-1">View</a>
                                                @else
                                                    <a href="#" class="btn btn-primary me-1 disabled" >View</a>
                                                @endif
                                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success me-1">Edit</a>
{{--                                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button class="btn btn-danger mx-2" type="submit" onclick="return confirm('Do you really want to delete post !')">Delete</button>--}}
{{--                                                </form>--}}
                                                <a href="javascript:delete_post('{{route('posts.destroy', $post->id)}}')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
{{--                                        @endif--}}
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">No posts found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $posts->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<form id="post_delete" method="POST" action="">
    @csrf
    @method('delete')
</form>
@section("javascript")
<script type="text/javascript">
    var query = <?php use Illuminate\Http\Request;echo json_encode((object)(new Illuminate\Http\Request)->query()); ?>;
    function sort_post(value) {
        Object.assign(query, {"sortByComments": value});
        window.location.href= "{{route('posts.index')}}?"+$.param(query);
    }
    function search_post(){
        Object.assign(query, {"category": $('#category_filter').val()});
        Object.assign(query, {"keyword": $('#keyword').val()});
        Object.assign(query, {"size": $('#optionselect').val()});
        window.location.href= "{{route('posts.index')}}?"+$.param(query);
    }
    function delete_post(url){
        swal({
            title: 'Are you sure?',
            text: "Are you really want to post !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $('#post_delete').attr('action',url);
                $('#post_delete').submit();
            }
        });
    }

    {{--document.getElementById('pagination').onchange = function() {--}}
    {{--    console.log('aaa')--}}
    {{--    window.location = "{{ $posts->url(1) }}&sizes=" + this.value;--}}
    {{--};--}}
    {{--function filter_item() {--}}
    {{--    console.log('aaa');--}}
    {{--    Object.assign(query, {"size": $('#pagination').val()});--}}
    {{--    window.location.href= "{{route('posts.index')}}?"+$.param(query);--}}
    {{--}--}}
    $(document) .ready(function() {
        $("#optionselect").change(function () {
            var values = $("#optionselect option:selected").val();
            Object.assign(query, {"size": values});
            window.location.href = "{{route('posts.index')}}?" + $.param(query);
        });
    });

</script>
@endsection
