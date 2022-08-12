@extends('layout.master')

@section('title', 'Danh sach san pham')
@section('content-title','Danh sách nguoi dung')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_list as $item) 
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><img width="50px" src="{{$item->avt}}" alt=""></td>
                    @if ($item->role ===1)
                    <td>User</td>
                    @else
                     <td>Admin</td>   
                    @endif
                    <td><a href="{{route('user.edit',$item->id)}}">
                     Update
                </a>

                <form action="{{route('user.delete',$item->id)}}" method="POST">
                @csrf
                <input type="text" name="id" value="{{$item->id}}" hidden>

                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
@endsection
