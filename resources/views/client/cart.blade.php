@extends('layout.client')
@section('content')


<style>
    .main{
        margin-top: 50px
    }
    .main h2{
        margin: 20px 0px 40px 20px;
    }
    h3{
      margin-top: 50px;
      margin-right: 100px
    }
    .total{
      text-align: right
    }
    .btn-primary{
      margin-right: 100px;
      width: 200px;
      margin-top: 20px;
    }
</style>
<div class="main">
    <h2>Giỏ hàng <i class="fa-solid fa-cart-shopping"></i></h2>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cart_list as $item )
            <tr>
                <td><img width="50px" src="{{$item->img}}" alt="">  {{$item->name}}</td>
                <td><input type="text" value="{{$item->quantity}}"></td>
                <td>${{$item->price}}</td>
                <td>${{$item->quantity * $item->price}}</td>
                <td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <div class="total">
        <h3 >Tổng tiền thanh toán: ${{$total}}</h3>
        <a href="{{Route('client.order.order')}}"><button type="button" class="btn btn-primary">Thanh toán</button></a>
      </div>
</div>


@endsection