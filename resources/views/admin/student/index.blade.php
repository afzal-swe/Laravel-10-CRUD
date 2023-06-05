@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Students') }}
                    <a href="{{route('students.create')}}" class="btn tbn-sm btn-primary" style='float:right;'>Add New Student</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    
                    <table class="table table-responsive table-strioe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Class ID</td>
                                <td>Name</td>
                                <td>Roll</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->class_name}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->roll}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <a href="{{ route('students.show',$row->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('students.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('students.destroy',$row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
