@extends('layouts.master')

@section('title')
    List Category Namde
@endsection

@section('content')

<div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <form method="POST" action="/category_name/{{$category_name->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{$category_name->category}}" name="category">
            </div>
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{$category_name->description}}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
    
    
@endsection

@push('script')
    <script src="https://cdn.tiny.cloud/1/58id1g5egyl2gf98nbldh7q3zub3ci964t4ezaniurgnx5rh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ]
        });
    </script>
@endpush