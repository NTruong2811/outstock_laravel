@extends('layout.master')

@section('title', 'Danh sach san pham')
@section('content-title','Danh sách Loại')
@section('content')
    <div class="container">
        <a href="{{route('categories.create')}}"> <button class="btn-primary">New Categories</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_cate as $item) 
                 <tr>
                    <td>{{$item->id}}</td>
                 <td>{{$item->name}}</td>
                 <th>
                    <a href="{{route('product.edit',$item->id)}}">
                         <button type="submit" class="btn btn-primary">Update</button>
                    </a>
                    <form action="{{route('categories.delete',$item->id)}}" method="POST">
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
