@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>SubCategory</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">SubCategory Tables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">All SubCategories</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <td>SL</td>
                            <td>Category</td>
                            <td>Subategory</td>
                            <td>Author</td>
                            <td>Title</td>
                            <td>Slug</td>
                            <td>Published</td>
                            {{-- <td>Image</td> --}}
                            {{-- <td>Discription</td> --}}
                            {{-- <td>Tags</td> --}}
                            <td>Status</td>
                             <td>Action</td>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach ($product_post as $key=>$row)
                              <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->category->name }}</td>
                                    <td>{{$row->subcategory->subcategory_name}}</td>
                                    <td>{{$row->user->name }}</td>
                                    {{-- <td>{{$row->Auth::user()->name }}</td> --}}
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>{{$row->post_date}}</td>
                                    {{-- <td>{{$row->image}}</td> --}}
                                    {{-- <td>{{$row->description}}</td> --}}
                                    {{-- <td>{{$row->tags}}</td> --}}
                                    <td>
                                      @if ($row->status==0)
                                        <span class="badge badge-success">Active</span>
                                      @else
                                      <span class="badge badge-danger">Inactive</span>
                                      @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('post.delete',$row->id) }}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
              </div>
          </div>
      </div>
  </section>
@endsection
