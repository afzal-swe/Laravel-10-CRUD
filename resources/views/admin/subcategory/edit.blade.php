@extends('layouts.app')

@section('content')              
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit SubCategory') }}
                        <a href="{{ route('subcategory.index') }}" class="btn tbn-sm btn-primary" style='float:right;'>All SubCategory</a>
                    </div>
                                        
                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                                                
                        <form action="{{ route('subcategory.update',$subcategories->id) }}" method="post">
                            @csrf

                            <div>
                                <label for="">Choose Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($category as $row)
                                    <option value="{{ $row->id }}" @if($row->id==$subcategories->category_id) selected @endif> {{ $row->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">SubCategory Name <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror " placeholder="Subcategory Name" value="{{$subcategories->subcategory_name}}">

                                @error('subcategory_name')
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
