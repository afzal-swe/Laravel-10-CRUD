@extends('layouts.app')

@section('content')              
    <div class="container mt-4">
      <div class="row justify-content-center">
        <!-- left column -->
            <div class="col-md-8">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('post.update',$product_post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{$product_post->id}}"> --}}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Post Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Post Title" value="{{$product_post->title}}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($category as $row)
                                    <option value="{{ $row->id }}" @if ($row->id==$product_post->category_id) selected @endif>
                                        {{$row->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select name="subcategory_id" id="" class="form-control">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($category as $row)
                                        @php
                                            $subcategory = DB::table('subcategories')->where('category_id', $row->id)->get();   
                                        @endphp
                                        <option disabled class="text-info" >{{$row->name}}</option>
                                        @foreach ($subcategory as $sub)
                                        <option value="{{ $sub->id }}" @if ($sub->id==$product_post->subcategory_id) selected @endif>---{{$sub->subcategory_name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Post Date <span class="text-danger">*</span></label>
                                <input type="date" name="post_date" class="form-control @error('post_date') is-invalid @enderror" required value="{{$product_post->post_date}}">

                                @error('post_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Tages <span class="text-danger">*</span></label>
                                <input type="text" name="tags" class="form-control @error('tages') is-invalid @enderror " placeholder="tages" value="{{$product_post->tags}}" required>

                                @error('tages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="summernote" cols="30" rows="4">{{$product_post->description}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" @if ($product_post->status==0) checked @endif>
                            <label class="form-check-label" for="exampleCheck1">Published Now</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
@endsection

