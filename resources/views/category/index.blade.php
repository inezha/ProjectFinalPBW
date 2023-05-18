@extends('layouts.master')

@section('title')
    Category
@endsection

@section('content')
    
    <div class="col-lg-12 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <h4 class="card-title mb-3">Category</h4>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="d-sm-flex justify-content-between">
                <div>
                    <a href=""></a>
                </div>
              </div>
              <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Question</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($category as $key => $item)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$item->category}}</td>
                            <td>{{$item->category}}</td>
                            <td>
                              <form action="/category/{{$item->id}}" method="POST">
                                <a href="/category/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger btn-sm" value="delete">
                                </form>                                
                            </td>
                        </tr>
                    @empty
                        <p>Empty Data</p>
                    @endforelse
                </tbody>
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
