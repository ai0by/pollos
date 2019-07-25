<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <title>{{ $siteName }} - 注册</title>
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
              <h4>一分钟完成注册！</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="text-muted">申请收录请选择流量主，广告投放请选择广告主</label>
                  <select class="form-control form-control-lg" id="group">
                    <option selected value="1">默认用户组</option>
                    <option value="2">流量主</option>
                    <option value="3">广告主</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
                <div class="mb-4">
                  <a href="">《{{ $siteName }} 注册免责条款TOS》</a>
                </div>
                <div class="">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" id="isread">
                      我已阅读并同意以上条款！
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="#" onclick="reg()">立即注册</a>
                </div>
                <div class="text-center mt-4 font-weight-light" id="GGG">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  已有账户?  <a href="/login" class="text-primary">立刻登录</a>
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
      function reg() {
          if (!($("#isread").get(0).checked)) {
              $('#GGG').text("请先阅读并同意网站免责条款后再注册!");
              return;
          }
          $.ajax({
              type: 'POST',
              url:"{{url('vregister')}}",
              data: {
                  "username": $('#username').val(),
                  "email": $('#email').val(),
                  "group": $('#group').val(),
                  "password": $('#password').val(),
                  "_token": "{{ csrf_token() }}",
              },
              success: function (data) {
                  if (data == 'success') {
                      $('#GGG').text("注册成功,正在转入到登录页 . . .");
                      window.location.href = '/login';
                  }
                  else $('#GGG').text(data);
              },
              error: function (reject) {
                  console.log(reject);
              }
          });
      }
  </script>
</body>

</html>
