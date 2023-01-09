@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>Write Email</h2>
                        <div><a href="{{route('posts.index')}}" class="btn btn-success">Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('emails.demoMail')}}">
                        <div class="form-control">
                            <label class="me-2">Người Nhận</label>
                            <input type="text" name="recipient" class="rounded-2"/>
                        </div>
                        <div class="form-control">
                            <label class="me-2">Chủ Đề</label>
                            <input type="text" name="subject" class="rounded-2"/>
                        </div>
                        <div class="form-control">
                            <label>Chủ Đề</label>
                            <textarea type="" class="form-control" style="width: 100%; height: 300px" id="contents" placeholder="Write Content" name="contents"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
