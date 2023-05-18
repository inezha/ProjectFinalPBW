@extends('layouts.master')

@section('title')
    Edit Answer
@endsection

@section('content')
    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action='/answer/{{$answer->id}}' method='POST'>
                    @csrf
                    @method('PUT')
                    <textarea name='answer' placeholder="isi jawabanmu...." id="" class="form-control" cols="30" row="20">{{$answer->answer}}</textarea> <br>
                    <input type='submit' class="btn btn-primary btn-sm" value="Simpan Jawaban">
                    <a href="/question/{{$answer->question_id}}" class="btn btn-secondary btn-sm">Batal</a>
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
