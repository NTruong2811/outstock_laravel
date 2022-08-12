@extends('layout.master')
@section('title' , $FormName )
    
@section('content-title',  $FormName)
@section('content')

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form
action="{{ isset($user) ? route('user.update',$user->id) : route('user.store') }}"
method="POST"
enctype="multipart/form-data"
>
@csrf  
@method($rq_method)
<div class='form-group'>
    <label for="">Name</label>
    <input type="text" autocomplete="off" name='name' class='form-control' value="{{isset($user) ? $user->name : ''}}">
</div>
<div class='form-group'>
    <label for="">Email</label>
    <input type="email" autocomplete="off" name='email' class='form-control' value="{{isset($user) ? $user->email : ''}}">
</div>

<div class='form-group'>
    <label for="">Avt</label>
    <input type="file" name='avt' class='form-control'>
    @if (isset($user->avt))
      <img width="100px" height="100px" src="{{$user->avt}}" alt="">
    @endif
</div>

<div>
    <button class='btn btn-primary'>Submit</button>
    <button type="reset" class='btn btn-warning'>Nhập lại</button>
</div>
@endsection