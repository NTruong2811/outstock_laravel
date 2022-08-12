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
action="{{route('categories.store')}}"
method="POST"
enctype="multipart/form-data"
>
@csrf  
@method($rq_method)
<div class='form-group'>
    <label for="">Name</label>
    <input type="text" autocomplete="off" name='name' class='form-control' value="">
</div>
<div>
    <button class='btn btn-primary'>Submit</button>
    <button type="reset" class='btn btn-warning'>Nhập lại</button>
</div>
@endsection