@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change your password Page') }}</div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif
                    @if (session()->has('error'))
                        <strong class="text-danger">{{ session()->get('error') }}</strong>
                    @endif
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf

                        <div>
                            <label for="">Current Password</label>
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror " placeholder="Current Password" required>

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div>
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
                            
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                        </div><br>
                        <button type="submit" class="btn btn-primary">Change Password</button><br>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
