@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://ssl.gstatic.com/onebox/media/sports/logos/4us2nCgl6kgZc0t3hpW75Q_96x96.png">
        </div>
        <div class="col-8">
            <div><h1>Arsenal</h1></div>
            <div>
                <a href="/test">Edit Profile</a>
            </div>
            <div class="d-flex pe-lg-3">
                <div class="pe-4"><strong>100</strong> posts</div>
                <div class="pe-4"><strong>100k</strong> followers</div>
                <div class="pe-4"><strong>100k</strong> following</div>
            </div>
            <div class="pt-3">
                <div>Arsenal.com</div>
                <div>Our skipper struck twice after the restart to ensure we claimed the victory we fully deserved for a dominant display at Molineux, which means we have now won three consecutive league games without conceding for the first time since July 2020</div>
                <div><a href="Arsenal.com" style="color: red">Arsenal.com</a></div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-4">
                <a href="#">
                    <img src="https://nld.mediacdn.vn/291774122806476800/2022/8/24/arsenal-1661303494810541174633.jpeg" class="w-100">
                </a>
            </div>
            <div class="col-4">
                <img src="https://nld.mediacdn.vn/2020/8/2/cup-1-15963257701421371049489.jpg" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://nld.mediacdn.vn/291774122806476800/2022/8/24/arsenal-1661303494810541174633.jpeg" class="w-100">
            </div>
        </div>

    </div>
</div>
@endsection
