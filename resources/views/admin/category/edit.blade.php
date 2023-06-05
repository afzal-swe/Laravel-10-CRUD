@extends('layouts.app')

@section('content')              
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}
                        <a href="{{ route('category.index') }}" class="btn tbn-sm btn-primary" style='float:right;'>All Category</a>
                    </div>
                                        
                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                                                
                        <form action="{{ route('cagegory.update',$edit->id) }}" method="post">
                            @csrf

                            <div>
                                <label for="">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{$edit->name}}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>
                                                                
                            <button type="submit" class="btn btn-primary">Update Category</button><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
