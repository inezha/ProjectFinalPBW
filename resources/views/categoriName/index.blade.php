@extends('layouts.master')

@section('title')
    Question
@endsection

@push('style')
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
    
    <div class="col-lg-12 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <a href="/category_name/create" class="btn btn-inverse-primary btn-fw">Add</a>
          <div class="d-flex flex-wrap justify-content-between mt-3">
            <h4 class="card-title mb-3">Category</h4>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="d-sm-flex justify-content-between">
                <div>
                    <a href=""></a>
                </div>
              </div>

              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Category</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($category_name as $key => $item)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$item->category}}</td>
                        <td>{{Str::limit(strip_tags($item->description), 30)}}</td>
                        <td>
                          <form action="/category_name/{{$item->id}}" method="POST">
                            <a href="/category_name/{{$item->id}}" class="btn btn-outline-info btn-fw">Detail</a>
                            <a href="/category_name/{{$item->id}}/edit" class="btn btn-outline-warning btn-fw">Edit</a>
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-outline-danger btn-fw" value="delete" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" >
                            </form>     
                        </td>
                    </tr>
                  @empty
                      
                  @endforelse
                </tbody>
                <tfoot>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Category</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                    </tr>
                </tfoot>
              </table>

              <div class="chart-container mt-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="ecommerceAnalytic" style="display: block; width: 722px; height: 361px;" class="chartjs-render-monitor" width="722" height="361"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection

@push('script')
  <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
@endpush
