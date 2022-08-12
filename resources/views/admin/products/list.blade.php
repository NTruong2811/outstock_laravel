@extends('layout.master')

@section('title', 'Danh sach san pham')
@section('content-title','Danh sách san pham')
@section('content')
    <div class="container">
        <a href="{{route('product.create')}}"> <button class="btn-primary">New Product </button></a>

        <form action="{{route('product.search')}}" method="GET">
            <input type="text" autocomplete="off" name="search">
            <button type="submit" class="btn btn-danger">Search</button>
            
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_list as $item) 
                 <tr>
                    <td>{{$item->id}}</td>
                 <td>{{$item->name}}</td>
                 <td>{{$item->price}}</td>
                 <td><img width="100px" height="100px" src="{{ asset($item->img)}}" alt=""></td>
                 <td>
                  @if ($item->status===0)
                  <form action="{{route('product.changestatus',$item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Kích Hoạt</button>
                </form>
                  @else
                  <form action="{{route('product.changestatus',$item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Không Kích Hoạt</button>
                </form>
                  @endif            
                   </td>
                 <th>
                    <a href="{{route('product.edit',$item->id)}}">
                         <button type="submit" class="btn btn-primary">Update</button>
                    </a>
                    <form action="{{route('product.delete',$item->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></th>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
@endsection
