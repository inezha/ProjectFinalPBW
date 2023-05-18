@extends('layouts.master')

@section('content')
<h1>Edit Pertanyaan</h1>
<div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        
        <form method="POST" action="/question/{{ $question->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Question</label>
                <textarea id="question" cols="30" rows="10" class="form-control @error('question') is-invalid @enderror" name="question">{{ $question->question }}</textarea>
            </div>
            @error('question')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" id="">
                    @forelse ($question->category as $item)
                        <option value="{{ $item->category_name->id }}" hidden>{{ $item->category_name->category }}</option>
                    @empty
                        
                    @endforelse
                    @forelse ($category_name as $item)
                        <option value="{{$item->id}}">{{$item->category}}</option>
                    @empty
                        <option value="">Data Empty</option>
                    @endforelse
                </select>
            </div>
            @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-inverse-primary btn-fw">Save</button>
        </form>
    </div>
    </div>
</div>
 
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
    
@endsection