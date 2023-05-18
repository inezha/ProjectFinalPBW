@extends('layouts.master')

@section('title')
    List Category
@endsection

@section('content')

<div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <form method="POST" action="/category" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Question</label>
                <select name="question_id" class="form-control" id="">
                    @forelse ($catogory_name as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        <option value="">Data Empty</option>
                    @endforelse
                </select>
            </div>
            @error('question_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Category</label>
                <select name="category_name_id" class="form-control" id="">
                    @forelse ($category_name_id as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        <option value="">Data Empty</option>
                    @endforelse
                </select>
            </div>
            @error('category_name_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
    
    
@endsection