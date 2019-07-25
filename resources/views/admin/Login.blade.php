<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <title>{{ $siteName }} - 登录</title>
  <style>
    #GGG{
      color: #ff0000;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="admin/images/logo.svg">
              </div>
              <h4>登录 - {{ $siteName }}</h4>
              <form class="pt-3" action="/login/check">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="#" onclick="is_login()">登录</a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      保持登录
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">忘记密码</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light" id="GGG">

                </div>
                <div class="text-center mt-4 font-weight-light">
                  还没有账号? <a href="/register" class="text-primary">立即注册</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@include('admin.foot')
<script>
    function is_login() {
        $.ajax({
            type: 'POST',
            url:"{{url('vlogin')}}",
            data: {
                "username": $('#username').val(),
                "password": $('#password').val(),
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                if (data == 'success') {
                    $('#GGG').text('登录成功,正在转入到仪表盘 . . .');
                    window.location.href="/indexone";
                }
                else $('#GGG').text('用户名或密码错误');
            },
            error: function (reject) {
                console.log(reject);
            }
        });
    }
</script>
</body>

</html>
