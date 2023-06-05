@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Student Data') }}
                    <a href="{{ route('students.index') }}" class="btn tbn-sm btn-primary" style='float:right;'>All Students</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    
                    <form action="{{ route('students.update',$students->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div>
                            <label for="" class="form-label">Class Name <span class="text-danger">*</span> </label>
                            <select name="class_id"  class="form-control" id="">
                                @foreach ($data as $row)
                                    <option value="{{$row->id}}" @if ($row->id == $students->class_id) selected @endif>{{ $row->class_name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div>
                            <label for="" class="form-label">Student Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control" value="{{$students->name}}" required>
                        </div><br>
                        <div>
                            <label for="" class="form-label">Roll No <span class="text-danger">*</span> </label>
                            <input type="text" name="roll" class="form-control" value="{{$students->roll}}" required>
                        </div><br>
                        <div>
                            <label for="" class="form-label">Phone <span class="text-danger">*</span> </label>
                            <input type="number" name="phone" class="form-control" value="{{$students->phone}}" required>
                        </div><br>
                        <div>
                            <label for="" class="form-label">Email <span class="text-danger">*</span> </label>
                            <input type="email" name="email" class="form-control" value="{{$students->email}}" required>
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Update Data</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
