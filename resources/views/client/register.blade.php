@extends('layout.client')
@section('content')


<div class="main_register">
    <main>
        <div class="tab-content m-auto " style="width: 400px; padding-top: 100px" >
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="{{route('auth.register')}}" method="POST">
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
              
                    <p class="text-center">hoặc:</p>
              
                    <!-- Name input -->
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="name" id="registerUsername" class="form-control" />
                      <label class="form-label" for="registerUsername">Nhập tên</label>
                    </div>
              
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="registerEmail" class="form-control" />
                      <label class="form-label" for="registerEmail">Email</label>
                    </div>
              
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="registerPassword" class="form-control" />
                      <label class="form-label" for="registerPassword">Mật khẩu</label>
                    </div>
              
                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="cfpassword" id="registerRepeatPassword" class="form-control" />
                      <label class="form-label" for="registerRepeatPassword">Nhập lại mật khẩu</label>
                    </div>
              
              
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Đăng ký</button>
                    <div class="text-center">
                        <p>Bạn đã có tài khoản ?<a href="{{Route('auth.login')}}">Đăng nhập</a></p>
                      </div>  
                </form>
            </div>
          </div>
    </main>
</div>

@endsection