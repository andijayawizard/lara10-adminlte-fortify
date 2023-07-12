@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="pull-right mb-2">
                  <a class="btn btn-success" href="{{ route('customers.create') }}"> Create Company</a>
              </div>
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="container" style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center">LARAVEL CRUD AJAX - <a href="https://santrikoding.com">WWW.SANTRIKODING.COM</a></h4>
                            <div class="card border-0 shadow-sm rounded-md mt-4">
                                <div class="card-body">

                                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-posts">
                                            @foreach($posts as $post)
                                            <tr id="index_{{ $post->id }}">
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $post->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $post->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        {!! $posts->links() !!}
                </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@include('posts.modal-create')
