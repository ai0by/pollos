<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pollos 网址导航 蜘蛛池 - 后台管理系统</title>
    @include('admin.Head')
</head>
<body>
<div class="container-scroller">
    @include('admin.AdminNavLeft')
    <div class="container-fluid page-body-wrapper">
        @include('admin.AdminNav')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-table-edit"></i>
              </span>
                        添加权限菜单
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>添加
                                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>权限菜单名称</label>
                                    <input type="text" class="form-control cls-text" id="menu_name" placeholder="此处填写权限名">
                                </div>
                                <div class="form-group">
                                    <label>上级分类(最多支持2级)</label>
                                    <select class="form-control cls-text" id="menu_cat_id">
                                        <option value="1">主分类(无父级)</option>
                                        @foreach ($rightCatList as $rightCatItem)
                                        <option value="{{ $rightCatItem['id'] }}">{{ $rightCatItem['menu_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>菜单控制器地址</label>
                                    <input type="text" class="form-control cls-text" id="menu_url" placeholder="/admin">
                                </div>
                                <div class="form-group">
                                    <label>主分类样式Class(可空,无需加.)</label>
                                    <input type="text" class="form-control cls-text" id="menu_icon" placeholder="mdi-contacts">
                                </div>
                                    <button class="btn btn-gradient-primary mr-2" onclick="post_menu_data()">添加</button>
                                <div class="text-center mt-4 font-weight-light" id="GGG">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('admin.Footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script>
    function post_menu_data() {
        $.ajax({
            type: 'POST',
            url:"{{url('admin/menu/add/v')}}",
            data: {
                "menu_name": $('#menu_name').val(),
                "menu_icon": $('#menu_icon').val(),
                "menu_url": $('#menu_url').val(),
                "menu_cat_id": $('#menu_cat_id').val(),
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                if (data == 'success') {
                    $('#GGG').text('添加成功,请稍后...');
                    window.location.href="/admin/right/menuadd";
                }
                else {
                    $('#GGG').text('添加失败:'+data);
                }
            },
            error: function (reject) {
                console.log(reject);
            }
        });
    }
</script>
@include('admin.Foot')
</body>

</html>
