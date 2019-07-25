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
                        查看权限菜单
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>查看
                                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            菜单ID
                                        </th>
                                        <th>
                                            权限名
                                        </th>
                                        <th>
                                            上级分类
                                        </th>
                                        <th>
                                            菜单地址
                                        </th>
                                        <th>
                                            ICON样式
                                        </th>
                                        <th>
                                            操作
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menuList as $menuItem)
                                    <tr>
                                        <td>
                                            {{ $menuItem->id+10000 }}
                                        </td>
                                        <td>
                                            @if($menuItem->menu_cat_id == 1)
                                            <a class="badge btn-dark btn" href="/admin/right/view/{{ $menuItem->id }}">{{ $menuItem->menu_name }}</a>
                                            @else
                                            <label class="badge badge-dark">{{ $menuItem->menu_name }}</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="badge btn-success btn" href="/admin/right/view/{{ $menuItem->menu_cat_id }}">{{ $menuItem->menu_cat_name }}</a>
                                        </td>
                                        <td>
                                            <label class="badge badge-primary">{{ $menuItem->menu_url }}</label>
                                        </td>
                                        <td>
                                            <i class="mdi {{ $menuItem->menu_icon }}"> </i>
                                        </td>
                                        <td>
                                            <a class="btn btn-info badge" href="/admin/right/edit/{{ $menuItem->id }}">编辑</a>
                                            <a class="btn btn-outline-danger badge" href="/admin/right/delete/{{ $menuItem->id }}">删除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $menuList->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('admin.footer')
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
@include('admin.foot')
</body>

</html>
