@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new info') }}
                    <a href="{{ route('about') }}" class="btn tbn-sm btn-primary" style='float:right;'>All About Section</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">
                            {{ session()->get('success') }}
                        </strong>
                    @endif
                    
                    <form action="{{ route('store') }}" method="post">
                        @csrf

                        <div>
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="name"  required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " placeholder="email"  required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="">Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror " placeholder="address"  required>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="">Number <span class="text-danger">*</span></label>
                            <input type="number" name="number" class="form-control @error('number') is-invalid @enderror " placeholder="number"  required>

                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Add New Info</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
