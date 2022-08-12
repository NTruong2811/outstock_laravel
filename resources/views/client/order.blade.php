@extends('layout.client')
@section('content')

<style>

main{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    width: 500px;
    margin: auto;
    height: auto;
}

</style>

<div class="main">
    <h1>Hóa đơn</h1>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cart_list as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>${{$item->quantity * $item->price}}</td>     
            </tr>
                   @endforeach
          <tr>
        </tbody>
      </table>
      <div class="bot" style="padding: 50px 20px 20px 20xp">
        <form action="{{route('client.order.cf_order')}}" method="POST">
            @csrf  
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Address</label>
              <input type="text" class="form-control" name="address" id="exampleInputPassword1" placeholder="Nhập địa chỉ">
            </div>
            <div class="total">
                <h3 >Tổng tiền thanh toán: ${{$total}}</h3>
              </div>
             <button type="submit" class="btn btn-primary">Thanh toán</button>
                     </form>
      </div>
</div>


@endsection