@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}
                    <a href="{{ route('students.index') }}" class="btn tbn-sm btn-primary" style='float:right;'>All Students</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    
                    <form action="{{ route('students.store') }}" method="post">
                        @csrf

                        <div>
                            <label for="" class="form-label">Class Name <span class="text-danger">*</span> </label>
                            <select name="class_id"  class="form-control" id="">
                                @foreach ($data as $row)
                                    <option value="{{$row->id}}">{{ $row->class_name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div>
                            <label for="" class="form-label">Student Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="name" value="{{old('name')}}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="" class="form-label">Roll No <span class="text-danger">*</span> </label>
                            <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror " placeholder="roll" value="{{old('roll')}}" required>

                            @error('roll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="" class="form-label">Phone <span class="text-danger">*</span> </label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror " placeholder="phone number" value="{{old('phone')}}" required>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="" class="form-label">Email <span class="text-danger">*</span> </label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " placeholder="example@gmail.com" value="{{old('email')}}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Add Student</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
