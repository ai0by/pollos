<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <title>{{ $siteName }} - 注册</title>
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
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="text-muted">申请收录请选择流量主，广告投放请选择广告主</label>
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option selected>默认用户组</option>
                    <option>流量主</option>
                    <option>广告主</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mb-4">
                  <a href="">《{{ $siteName }} 注册免责条款TOS》</a>
                </div>
                <div class="">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      我已阅读并同意以上条款！
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="#">立即注册</a>
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
</body>

</html>
