@extends('layout.client')
@section('content')

<div class="container" style="width: 100%; ">
    <main>
<!-- Pills content -->
<div class="tab-content m-auto " style="width: 400px; padding-top: 100px" >
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="{{route('auth.login')}}" method="POST">
      @csrf
      <div class="text-center mb-3">
        <p>Đăng nhập bằng:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">Hoặc:</p>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="email" id="loginName" class="form-control" />
        <label class="form-label" for="loginName">Nhập Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="password" id="loginPassword" class="form-control" />
        <label class="form-label" for="loginPassword">Nhập mật khẩu</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Ghi nhớ </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Quên mật khẩu?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Dăng nhập</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Bạn chưa có tài khoản ?<a href="{{Route('auth.register')}}">Đăng ký</a></p>
      </div>
    </form>
  </div>
</div>
    </main>
</div>

@endsection