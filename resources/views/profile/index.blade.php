@extends('layouts.master')

@section('content')

  <div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between">
          <h4 class="card-title mb-3">User Profile</h4>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <img src="https://img.freepik.com/free-photo/psychedelic-paper-shapes-with-copy-space_23-2149378246.jpg?w=740&t=st=1683257631~exp=1683258231~hmac=239eb8014f7806c35858906c8dc834b05783b0cd41cabb8226cfd312b98b3f8d" class="card-img d-block text-center" style="height: 200px">
            <div class="row">
              <div class="col-1/3 ml-3">
                <img src="https://images.tokopedia.net/img/cache/300/tPxBYm/2023/1/20/0c372e2a-77da-496f-96c9-a453b449f85d.jpg" class="rounded-circle rounded-sm m-3 align-self-center" style="width:150px">
              </div>
              <div class="col m-3">
                <h3>{{ $profile->user->name }}</h3>
                <h5>Age : {{ $profile->age }} y.o</h5>
                <h5>Address : {{ $profile->address }}</h5>
              </div>
            </div> 
            

            <div class="col-lg-12 mt-3" >
              <form action="/profile/{{ $profile->user_id }}" method="POST" >
                <a href="/profile/{{ $profile->user_id }}/edit" class="btn btn-outline-warning btn-fw">Edit</a> 
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-outline-danger btn-fw" value="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
              </form>
            </div>

           
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection