@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Students Details') }}
                    <a href="{{route('students.index')}}" class="btn tbn-sm btn-primary" style='float:right;'>All Students</a>
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
                                {{-- <td>Action</td> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>{{1}}</td>
                                <td>{{$students->class_id}}</td>
                                <td>{{$students->name}}</td>
                                <td>{{$students->roll}}</td>
                                <td>{{$students->phone}}</td>
                                <td>{{$students->email}}</td>
                                {{-- <td>
                                    <a href="{{ route('students.show') }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('students.edit') }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('students.destroy') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
