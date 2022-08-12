@extends('layout.client')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img" src="{{asset('images/bn1.jpg')}}" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Thiết kế nội thất</h5>
          <p>Quý khách có thể gặp đội ngũ tư vấn thiết kế chuyên nghiệp để được hướng dẫn hay tư vấn giúp quý khách hàng thực hiện trọn vẹn ý thích của mình.</p>
        </div>
      </div>
      <div class="carousel-item ">
        <img class="img" src="{{asset('images/bn2.jpg')}}" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Thiết kế nội thất</h5>
            <p>Quý khách có thể gặp đội ngũ tư vấn thiết kế chuyên nghiệp để được hướng dẫn hay tư vấn giúp quý khách hàng thực hiện trọn vẹn ý thích của mình.</p>
        </div>
      </div>
      <div class="carousel-item ">
        <img class="img" src="{{asset('images/bn3.jpg')}}" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Thiết kế nội thất</h5>
            <p>Quý khách có thể gặp đội ngũ tư vấn thiết kế chuyên nghiệp để được hướng dẫn hay tư vấn giúp quý khách hàng thực hiện trọn vẹn ý thích của mình.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<div class="new_product">
    <div class="text">
        <h1>Sản phẩm mới</h1>
        <p>Những mẫu mới nhất, bộ sưu tập hoàn <br> hảo dành cho bạn</p>
    </div>
    <div class="list">
        @foreach ($new_products as $item)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" height="350px" src="{{$item->img}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <a href="">${{$item->price}}</a> <br>
              <button type="button" class="btn btn-light"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ</button>

            </div>
          </div>
        @endforeach
    </div>
</div>


<style>
    
.carousel{
    width: 100%;
    height: 500px;
}
.carousel img{
    width: 100%;
    height: 500px;
}
.new_product{
    margin: 100px 0px;
    display: grid;
    grid-template-columns: 300px 1fr;
}
.new_product .list{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 20px;
}
.new_product .list .card{
    text-align: center;
}
</style>
@endsection