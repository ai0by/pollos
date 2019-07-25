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
                    <span class="text-secondary text-small">用户ID: {{ $userId+10000 }}</span>
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
        @foreach($navList as $navItem)
            <li class="nav-item">
                @if($navItem['size']>0)
                <a class="nav-link" data-toggle="collapse" href="#{{ $navItem['menu_url'] }}" aria-expanded="false" aria-controls="{{ $navItem['menu_url'] }}">
                @else
                <a class="nav-link" href="{{ $navItem['menu_url'] }}">
                @endif
                    <span class="menu-title">{{ $navItem['menu_name'] }}</span>
                    @if($navItem['size']>0)
                    <i class="menu-arrow"></i>
                    @endif
                    <i class="mdi {{ $navItem['menu_icon'] }} menu-icon"></i>
                </a>
                @if($navItem['size']>0)
                <div class="collapse" id="{{ $navItem['menu_url'] }}">
                    <ul class="nav flex-column sub-menu">
                        @for($navElement = 0;$navElement<$navItem['size'];$navElement++)
                        <li class="nav-item"> <a class="nav-link" href="{{ $navItem[$navElement]['menu_url'] }}"> {{ $navItem[$navElement]['menu_name'] }} </a></li>
                        @endfor
                    </ul>
                </div>
                @endif
            </li>
        @endforeach
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