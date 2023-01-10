@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/email.css')}}">
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
                        <div>
                            <input type="text" name="recipient" placeholder="Người nhận"/>
                        </div>
                        <div>
                            <input type="text" name="subject" placeholder="Chủ đề"/>
                        </div>
                        <div class="form-control">
                            <textarea type="" class="form-control" style="width: 100%; height: 300px" id="contents" placeholder="Write Content" name="contents"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Send</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
