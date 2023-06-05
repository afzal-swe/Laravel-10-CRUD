@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}
                    <a href="{{ route('create.class') }}" class="btn tbn-sm btn-primary" style='float:right;'>Add New Class</a>
                </div>
                   
                <div class="card-body">
                    
                    <table class="table table-responsive table-strioe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Class</td>
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->class}}</td>
                                <td>{{$row->class_name}}</td>
                                <td>
                                    <a href="{{ route('edit',$row->id) }}" class="btn btn-sm btn-info">edit</a>
                                    <a href="{{ route('class.delete',$row->id) }}" class="btn btn-sm btn-danger">delete</a>
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
