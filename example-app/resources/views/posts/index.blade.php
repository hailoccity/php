@extends('layouts.app')

@section('content')
    <div class="container">
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
                                </select>
                                <label for="keyword">&nbsp;&nbsp;</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword">
                                    <span>&nbsp;</span>
                                     <button type="button" class="btn btn-primary">Search</button>
                                      <a class="btn btn-success" href="#">Clear</a>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Created By</th>
                                    <th>Category</th>
                                    <th>Total Comments
                                        <a href=""><i class="fa fa-sort-down"></i></a>
                                        <a href=""><i class="fa fa-sort-up"></i></a>
                                        <a href=""><i class="fa fa-sort"></i></a>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td style="width: 35%">Title</td>
                                    <td>LE HIEU</td>
                                    <td>Science</td>
                                    <td class="text-center">2</td>
                                    <td style="width: 100%;" class="d-flex">
                                        <a href="#" class="btn btn-primary me-1">View</a>
                                        <a href="#" class="btn btn-success me-1">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
