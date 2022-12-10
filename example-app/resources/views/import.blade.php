<!DOCTYPE html>
<html>
<head>
    <title>Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Le Doan Hieu
        </div>
        <div class="card-body">
            <div class="d-flex">
                <form action="{{ url('api/import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control w-75">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                </form>
                <form class="d-flex h-25 ms-auto">
                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        Search
                    </button>
                </form>
            </div>

            <div class="d-flex pt-3">
                <div class="">Show </div>
                <div class="d-flex">
                    <select class="ms-2">
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                    <p class="ms-2">Items</p>
                </div>
            </div>
            <div>
                <p>Filter Data</p>
                <input type="text" class="w-50">
            </div>
            <table class="table table-bordered mt-4">
                <tr>
                    <th colspan="3">
                        List Of Users
                        <a class="btn btn-success float-end" href="/api/export">Export User Data</a>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td class="d-flex" >
                            <form action="{{url('/api/admin/'.$user->id)}}">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button class="btn btn-danger mx-2" type="submit">Delete</button>
                            </form>
{{--                            <a href="{{url('/api/admin-delete', $user->id)}}" class="btn btn-danger">Delete</a>--}}
                            <a href="#" class="btn btn-warning ">Update</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

</body>
</html>
