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
action="{{isset($product) ? route('product.update',$product->id) : route('product.store')}}"
method="POST"
enctype="multipart/form-data"
>
@csrf  
@method($rq_method)
<div class='form-group'>
    <label for="">Name</label>
    <input type="text" autocomplete="off" name='name' class='form-control' value="{{isset($product) ? $product->name : ''}}">
</div>
<div class='form-group'>
    <label for="">Price</label>
    <input type="number" name='price' class='form-control' value="{{isset($product) ? $product->price : ''}}" >
</div>
<div class='form-group'>
    <label for="">Desc</label>
  <textarea name="description" id="" cols="30" rows="10">{{isset($product) ? $product->description : ''}}</textarea>
</div>
<div class='form-group'>
    <label for="">Image</label>
    <input type="file" name='img' class='form-control'>
    @if (isset($product->img))
      <img width="100px" height="100px" src="{{asset($product->img)}}" alt="">
    @endif
</div>
<div>
    <button class='btn btn-primary'>Submit</button>
    <button type="reset" class='btn btn-warning'>Nhập lại</button>
</div>
@endsection