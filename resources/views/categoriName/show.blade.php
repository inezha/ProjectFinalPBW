@extends('layouts.master')

@section('title')
    Category Name
@endsection

@section('content')
    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between">
            <h1 class="card-title mb-3">Category Name</h1>
            </div>
            <div class="row mt-3">
            <div class="col-lg-9">
                <div class="">
                    <h3>{{$category_name->category}}</h3>
                    <p>{{ strip_tags($category_name->description) }}</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div> 
@endsection