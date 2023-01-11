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
                    <div>
                        Bạn không có quyền thực hiện chức năng này
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
