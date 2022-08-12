@extends('layout.master')
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
    <h2>Quản lý đơn hàng</h2>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chi tiết đơn hàng</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($list as $item )
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->id}}</td>
                 <td>${{$item->order_total}}</td>
                 <td>

                    
                    @if ($item->role===0)
                    <form action="{{route('order.change',$item->orderid)}}" method="POST">
                      @csrf
                      @method('PUT')
                      {{-- <input type="text" name="id" value="{{}"> --}}
                      <button type="submit" class="btn btn-danger">Xác nhận đơn hàng</button>
                  </form>
                  @elseif ($item->role===1)
                    <button type="button" class="btn btn-danger">Đang giao hàng</button>
                </form>
                    @else
                      <button type="button" class="btn btn-danger">Giao thành công</button>
                    @endif            
                     </td>
                 <td><a href="">xem chi tiết</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>


@endsection