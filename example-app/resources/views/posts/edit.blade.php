@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Edit Post</div>
                            <div><a href="{{route('posts.index')}}" class="btn btn-success">Back</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('posts.update',$posts->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group required">
                                <label for="title" typeof="">Title :</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                       name="title" value="{{$posts->title}}">
                                @if($errors->any('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="title">Description :</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Enter Description"
                                          name="description" value="{{$posts->description}}"></textarea>
                                @if($errors->any('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                            <div class="form-group required mt-2 mb-2">
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#demo"
                                        class="btn btn-success">View Image
                                </button>
                                <div id="demo" class="collapse text-center">
                                    <img src="{{asset('post_image/'.$posts->image)}}"
                                         style="width: 200px; height: 300px"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="image">Image :</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($errors->any('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="category">Category :</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    @if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                            @if($posts->category_id == $category->id)
                                                {{'selected'}}
                                                @endif
                                            >{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->any('category'))
                                    <span class="text-danger">{{$errors->first('category')}}</span>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="tags">Tags :</label>
                                <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                                    <option value="">Select Tags</option>
                                    @if(count($tags))
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}"
                                            @if(old('tags') && in_array($tag->id, old('tags')))
                                                {{'selected'}}
                                                @elseif(in_array($tag->id, $posts->getTagsArray()))
                                                {{'selected'}}
                                                @endif
                                            >{{$tag->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->any('tags'))
                                    <span class="text-danger">{{$errors->first('tags')}}</span>
                                @endif
                            </div>
                            <button class="btn btn-primary mt-1" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .form-group.required label:after {
        color: #e32;
        content: '*';
        display: inline;
        font-weight: bold;
    }
</style>

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#category').select2({
                placeholder: "Select a category",
                allowClear: true
            });
        });
        $(document).ready(function () {
            $('#tags').select2({
                placeholder: "Select tags",
                allowClear: true
            });
        });
    </script>
@endsection
