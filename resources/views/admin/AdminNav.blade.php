<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ $avatar }}" alt="profile">
                    <span class="login-status online"></span> <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ $username }}</span>
                    <span class="text-secondary text-small">{{ $userId }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/indexone">
                <span class="menu-title">仪表盘</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-basic" aria-expanded="false" aria-controls="category-basic">
                <span class="menu-title">分类管理</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="category-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/category"> 查看分类 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/category/add"> 添加分类 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#links-basic" aria-expanded="false" aria-controls="links-basic">
                <span class="menu-title">链接管理</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="links-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/links"> 所有链接 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/links/add"> 添加链接 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="user-basic">
                <span class="menu-title">用户管理</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="user-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/user"> 所有用户 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/user/add"> 添加用户 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#right-basic" aria-expanded="false" aria-controls="right-basic">
                <span class="menu-title">权限管理</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-nature-people menu-icon"></i>
            </a>
            <div class="collapse" id="right-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/right"> 权限对照 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/roght/add"> 权限分配(开发者) </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/roght/role"> 查看 用户组/角色 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/roght/role/add"> 添加 用户组/角色 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/">
                <span class="menu-title">排名统计</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/me/links">
                <span class="menu-title">我的链接</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting-basic" aria-expanded="false" aria-controls="setting-basic">
                <span class="menu-title">网站设置</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
            <div class="collapse" id="setting-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/setting/basic"> 基本设置 </a></li>
                </ul>
            </div>
        </li>
        <div class="tlinks">Collect from <a href="#" >pollos 开源网址导航</a></div>
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">管理</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">Tending ({{ $is_tending }})</button>
            </span>
        </li>
    </ul>
</nav>
<!-- partial -->