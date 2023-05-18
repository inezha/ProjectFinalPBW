@extends('layouts.master')

@section('title')
    Question
@endsection

@section('content')
    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="">
                <h5 class="card-title mb-3">Detail Question</h5>
                @forelse ($question->category as $item)
                    <span class="badge badge-info mb-3">{{ $item->category_name->category }}</span>
                @empty
                    
                @endforelse
            </div>
            <div class="row">
            <div class="col-lg-9">
                <div class="d-sm-flex justify-content-between">
                    <p>{{strip_tags($question->question)}}</p> 
                </div>
                @if ($question->image != "")
                    <div class="d-sm-flex justify-content-between">
                        <img src="{{asset('/image/' . $question->image)}}" height= "250" alt="">
                    </div>
                @endif
                <div class="d-sm-flex justify-content-between">
                    <p>Question by : {{$question->user->name}}</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    {{-- fitur ketik jawaban dan daftar jawaban --}}

    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <hr>
                <h3> Jawaban yang sudah ada</h3>
                @forelse ($question ->answer as $item)
                <div class="card m-2">
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="mr-auto p-2 bd-highlight"> {{$item->user->name}}</div>
                            @if ($item->user_id == Auth::id())
                                <form action='/answer/{{$item->id}}/edit'class="p-1 bd-highlight">
                                    <button type="submit" class="btn btn-sm btn-light"><i class="fa fa-edit"></i></button>
                                </form>
                                
                                <form action='/answer/{{$item->id}}' method="POST" class="p-1 bd-highlight" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                      <p class="card-text">{{strip_tags($item->answer)}}</p>
                    </div>
                </div>
                    
                @empty
                    <h5>Tidak ada Jawaban</h5>
                @endforelse
                <hr>
            </div>
        </div>
    </div>



    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action='/answer/{{$question->id}}' method='POST'>
                    @csrf
                    <textarea name='answer' placeholder="isi jawabanmu...." id="" class="form-control" cols="30" row="20"></textarea> <br>
                    <input type='submit' class="btn btn-inverse-primary btn-fw" value="Bantu Jawab">
                </form>
            </div>
            <div class="card-body">
                <a href="/question" class="btn btn-inverse-dark btn-fw">Back</a>
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