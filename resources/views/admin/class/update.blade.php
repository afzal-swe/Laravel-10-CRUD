@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Class') }}
                    <a href="{{ route('all_class') }}" class="btn tbn-sm btn-primary" style='float:right;'>All Class</a>
                </div>
                   
                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    
                    <form action="update.class" method="post">
                        @csrf

                        <div>
                            <label for="">Class</label>
                            <input type="text" name="class" class="form-control" placeholder="class"  required>
                        </div><br>
                        <div>
                            <label for="">Class Name</label>
                            <input type="text" name="class_name" class="form-control" placeholder="class name" required>
                        </div><br>
                      
                       
                        <button type="submit" class="btn btn-primary">Add Class</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
