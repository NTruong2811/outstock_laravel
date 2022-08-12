@extends('layout.client')
@section('content')

<link rel="stylesheet" href="{{ asset('client/css/product_detail.css')}}">

<div class="main">

    <div class="top">
        <div class="img">
            <img src="{{asset($product_detail->img)}}" alt="">
        </div>
        <div class="text">
            <h3>{{$product_detail->name}}</h3>
            <input type="number" value="1"> <br>
            <span> Giá:{{$product_detail->price}}$</span> <br>
       <button class="button-6" role="button">Mua Ngay</button>
       <div class="desc">
        Mô tả: <br>
        {{$product_detail->description}}
      </div>
    </div>
    </div>
  <div class="comment">
     <h3>Bình luận</h3>
      @if (Auth::check())
     <form action="{{Route('client.PostComment')}}" method="post">
        @csrf
        <textarea name="content" id="" cols="150" rows="5"></textarea>
        <input type="text" name="product_id" value="{{$product_detail->id}}" hidden>
        <button type="submit" class="btn btn-danger">Gửi</button>
     </form>
      @endif
     <ul>
        @foreach ($comment as $item)
        <hr>
        <li> {{$item->name}} : {{$item->content}}</li>
        <hr>
        @endforeach
     </ul>
  </div>
    <div class="same_product">
        <h3>Sản phẩm liên quan</h3>
        <div class="list">
            @foreach ($same_product as $item)
            <a href="{{Route('client.product_detail',$item->id)}}">
                <div class="item">
                    <div class="img">
                        <img  src="{{ asset($item->img)}}" alt="">
                    </div>
                    <div class="text">
                        <h3>{{$item->name}}</h3>
                        <span>{{$item->price}}$</span>
                    </div>
                   </div>
            </a>
            @endforeach
        </div>
    </div>

</div>


@endsection