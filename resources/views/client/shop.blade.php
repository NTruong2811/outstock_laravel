@extends('layout.client')
@section('content')

<link rel="stylesheet" href="{{ asset('client/css/shop.css')}}">

<div class="main">
<div class="filter">
   <h3>Bộ Lọc</h3>
   <form action="{{Route('client.shop_search')}}" method="Get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="sản phẩm..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
      </div>
   </form>
   <form action="{{Route('client.shop_filter')}}" method="get">
    <div class="categories">
        @foreach ($category_list as $item)
        <div class="form-check">
            <input class="form-check-input" name="{{$item->name}}" type="checkbox" value="{{$item->id}}" id="{{$item->name}}">
            <label class="form-check-label" for="{{$item->name}}">
              {{$item->name}}
            </label>
          </div>
        @endforeach
        <button  style="margin-top: 20px" type="submit" class="btn  btn-primary btn-l btn-block">Lọc</button>
   </form>
   <form action="{{Route('client.shop')}}" method="get">
        <button  style="margin-top: 20px" type="submit" class="btn  btn-primary btn-l btn-block">Hoàn tác</button>
   </form>
</div>
</div>
<div class="products">
    <div class="title">
        <h2>Sản Phẩm</h2>
    </div>
    <div class="list">
        @foreach ($product_list as $item)
            <div class="item">
                <a href="{{Route('client.product_detail',$item->id)}}">
                <div class="img">
                    <img  src="{{ asset($item->img)}}" alt="">
                </div>
            </a>
                <div class="text">
                    <div class="">
                        <h3>{{$item->name}}</h3>
                        <span>{{$item->price}}$</span>
                    </div>
                 <a href="{{Route('client.cart.add_to_cart',$item->id)}}">
                     <button type="button" class="btn btn-light"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ</button>
                    </a>  
                </div>
               </div>
        @endforeach
        <div class="pg mt-3" >
            {{$product_list->links()}}
        </div>
    </div>
</div>

</div>

@endsection