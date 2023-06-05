@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All About') }}
                    <a href="{{ route('create') }}" class="btn tbn-sm btn-primary" style='float:right;'>Add New Info</a>
                </div>
                   
                <div class="card-body">
                    
                    <table class="table table-responsive table-strioe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>Number</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($about as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->number}}</td>
                                <td>
                                    <a href="{{ route('about.edit',$row->id )}}" class="btn btn-sm btn-info">edit</a>
                                    <a href="{{ route('delete.info',$row->id )}}" class="btn btn-sm btn-info">Delete</a>
                                    {{-- <form action="{{ route('delete.info',$row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form> --}}
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
