@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}
                    <a href="{{ route('all_class') }}" class="btn tbn-sm btn-primary" style='float:right;'>All Class</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    
                    <form action="{{ route('store.class') }}" method="post">
                        @csrf

                        <div>
                            <label for="">Class</label>
                            <input type="text" name="class" class="form-control @error('class') is-invalid @enderror " placeholder="class" required>

                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="">Class Name</label>
                            <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror " placeholder="class name" required>

                            @error('class_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Add Class</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
