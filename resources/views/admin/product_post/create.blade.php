@extends('layouts.app')

@section('content')              
    <div class="container mt-4">
      <div class="row justify-content-center">
        <!-- left column -->
            <div class="col-md-8">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Post Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Post Title" value="{{old('title')}}" required>
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
                                    <option value="{{ $row->id }}">
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
                                        <option value="{{ $sub->id }}">---{{$sub->subcategory_name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Post Date <span class="text-danger">*</span></label>
                                <input type="date" name="post_date" class="form-control @error('post_date') is-invalid @enderror" required value="{{old('post_date')}}">

                                @error('post_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Tages <span class="text-danger">*</span></label>
                                <input type="text" name="tags" class="form-control @error('tages') is-invalid @enderror " placeholder="tages" value="{{old('tages')}}" required>

                                @error('tages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="summernote" cols="30" rows="4"></textarea>

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
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1">
                            <label class="form-check-label" for="exampleCheck1">Published Now</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
@endsection
{{-- <div class="container">
  
                                    
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                                                            

        
</div> --}}
