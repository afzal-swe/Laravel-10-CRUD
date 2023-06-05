@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update info') }}
                    <a href="{{ route('about') }}" class="btn tbn-sm btn-primary" style='float:right;'>All About Section</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">
                            {{ session()->get('success') }}
                        </strong>
                    @endif
                    
                    <form action="{{ route('about.update',$about->id) }}" method="post">
                        @csrf

                        <div>
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" value="{{ $about->name }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " value="{{ $about->email }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror " value="{{ $about->address }}" required>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="">Number</label>
                            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ $about->number }}" required>

                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Update</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
