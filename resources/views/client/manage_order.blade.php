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
    <h2>Quản lý đơn hàng</h2>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">mã đơn hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chi tiết</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>${{$item->order_total}}</td>
            <td>

                    
              @if ($item->role===0)
                <button type="Button" class="btn btn-danger">Chờ Xác nhận đơn hàng</button>
            @elseif ($item->role===1)
            <form action="{{route('client.order.changeStatusUser',$item->id)}}" method="POST">
              @csrf
              @method('PUT')
              {{-- <input type="text" name="id" value="{{}"> --}}
              <button type="submit" class="btn btn-danger">Đã nhận hàng</button>
          </form>
          </form>
              @else
                <button type="button" class="btn btn-danger">Giao thành công</button>
              @endif            
               </td>
            <td><a href="">Chi tiết</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>


@endsection