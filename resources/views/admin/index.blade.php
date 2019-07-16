<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pollos 网址导航 蜘蛛池 - 后台管理系统</title>
    @include('admin.head')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/indexone"><img src="admin/images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/indexone"><img src="admin/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ $avatar }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ $username }}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached mr-2 text-success"></i>
                            信息修改
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/loginout">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            退出登录
                        </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-warning"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">消息通知</h6>
                        @foreach ($messageList as $messageItem)
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href='/message/{{ $messageItem['id'] }}'>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">{{ $messageItem['title'] }}</h6>
                                    <p class="text-gray mb-0">
                                        {{ $messageItem['create_time'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">{{ $messageNum }} new messages</h6>
                    </div>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="/loginout">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
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
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <span class="menu-title">排名统计</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
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
                            <li class="nav-item"> <a class="nav-link" href="admin/setting/basic"> 基本设置 </a></li>
                        </ul>
                    </div>
                </li>
                <div class="tlinks">Collect from <a href="#" >pollos 开源网址导航</a></div>
                <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">管理</h6>                
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">待审核 {{ $is_tending }}</button>
            </span>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
                        仪表盘
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview
                                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                                <h4 class="font-weight-normal mb-3">流量统计
                                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5">{{ $pvCount }}</h2>
                                <h6 class="card-text">PV,数据可能有浮动</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                                <h4 class="font-weight-normal mb-3">蜘蛛池
                                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5">{{ $linksCount }}</h2>
                                <h6 class="card-text">链接数量</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                                <h4 class="font-weight-normal mb-3">最大流量
                                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5">{{ $maxVisit }}</h2>
                                <h6 class="card-text">流量最多的站点</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix">
                                    <h4 class="card-title float-left">统计</h4>
                                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                </div>
                                <canvas id="visit-sale-chart" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">数据概览</h4>
                                <canvas id="traffic-chart"></canvas>
                                <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">TOP 5</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                用户
                                            </th>
                                            <th>
                                                网站名
                                            </th>
                                            <th>
                                                地址
                                            </th>
                                            <th>
                                                状态
                                            </th>
                                            <th>
                                                访问量
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($userList as $userItem)
                                            <tr>
                                                <td>
                                                    <img src="{{ $userItem['avatar'] }}" class="mr-2" alt="image">
                                                    {{ $userItem['username'] }}
                                                </td>
                                                <td>
                                                    {{ $userItem['name'] }}
                                                </td>
                                                <td>
                                                    {{ $userItem['url'] }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-{{ $userItem['status'] }}">{{ $userItem['status'] }}</label>
                                                    <!-- done -->
                                                </td>
                                                <td>
                                                    {{ $userItem['visit'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
<!-- container-scroller -->

@include('admin.foot')

<script>
    (function($) {
        'use strict';
        $(function() {
            Chart.defaults.global.legend.labels.usePointStyle = true;

            if ($("#serviceSaleProgress").length) {
                var bar = new ProgressBar.Circle(serviceSaleProgress, {
                    color: 'url(#gradient)',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 8,
                    trailWidth: 8,
                    easing: 'easeInOut',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: { color: '#aaa', width: 6 },
                    to: { color: '#57c7d4', width: 6 }
                });

                bar.animate(.65);  // Number from 0.0 to 1.0
                bar.path.style.strokeLinecap = 'round';
                let linearGradient = '<defs><linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="20%" stop-color="#da8cff"/><stop offset="50%" stop-color="#9a55ff"/></linearGradient></defs>';
                bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
            }
            if ($("#productSaleProgress").length) {
                var bar = new ProgressBar.Circle(productSaleProgress, {
                    color: 'url(#productGradient)',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 8,
                    trailWidth: 8,
                    easing: 'easeInOut',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: { color: '#aaa', width: 6 },
                    to: { color: '#57c7d4', width: 6 }
                });

                bar.animate(.6);  // Number from 0.0 to 1.0
                bar.path.style.strokeLinecap = 'round';
                let linearGradient = '<defs><linearGradient id="productGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="40%" stop-color="#36d7e8"/><stop offset="70%" stop-color="#b194fa"/></linearGradient></defs>';
                bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
            }
            if ($("#visit-sale-chart").length) {
                Chart.defaults.global.legend.labels.usePointStyle = true;
                var ctx = document.getElementById('visit-sale-chart').getContext("2d");

                var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
                gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Sun', 'Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat'],
                        datasets: [
                            {
                                label: "新增链接",
                                borderColor: gradientStrokeViolet,
                                backgroundColor: gradientStrokeViolet,
                                hoverBackgroundColor: gradientStrokeViolet,
                                legendColor: gradientLegendViolet,
                                pointRadius: 0,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [20, 40, 15, 35, 25, 50, 30]
                            },
                            {
                                label: "新增人数",
                                borderColor: gradientStrokeRed,
                                backgroundColor: gradientStrokeRed,
                                hoverBackgroundColor: gradientStrokeRed,
                                legendColor: gradientLegendRed,
                                pointRadius: 0,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [40, 30, 20, 10, 50, 15, 35]
                            },
                            {
                                label: "当日流量",
                                borderColor: gradientStrokeBlue,
                                backgroundColor: gradientStrokeBlue,
                                hoverBackgroundColor: gradientStrokeBlue,
                                legendColor: gradientLegendBlue,
                                pointRadius: 0,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [70, 10, 30, 40, 25, 50, 15]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul>');
                            for (var i = 0; i < chart.data.datasets.length; i++) {
                                text.push('<li><span class="legend-dots" style="background:' +
                                    chart.data.datasets[i].legendColor +
                                    '"></span>');
                                if (chart.data.datasets[i].label) {
                                    text.push(chart.data.datasets[i].label);
                                }
                                text.push('</li>');
                            }
                            text.push('</ul>');
                            return text.join('');
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    display: false,
                                    min: 0,
                                    stepSize: 20,
                                    max: 80
                                },
                                gridLines: {
                                    drawBorder: false,
                                    color: 'rgba(235,237,242,1)',
                                    zeroLineColor: 'rgba(235,237,242,1)'
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display:false,
                                    drawBorder: false,
                                    color: 'rgba(0,0,0,1)',
                                    zeroLineColor: 'rgba(235,237,242,1)'
                                },
                                ticks: {
                                    padding: 20,
                                    fontColor: "#9c9fa6",
                                    autoSkip: true,
                                },
                                categoryPercentage: 0.5,
                                barPercentage: 0.5
                            }]
                        }
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }
                })
                $("#visit-sale-chart-legend").html(myChart.generateLegend());
            }
            if ($("#traffic-chart").length) {
                var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';

                var trafficChartData = {
                    datasets: [{
                        data: [{{ $userDefault }}, {{ $userFlow }}, {{ $userAd }}],
                        backgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed
                        ],
                        hoverBackgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed
                        ],
                        borderColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed
                        ],
                        legendColor: [
                            gradientLegendBlue,
                            gradientLegendGreen,
                            gradientLegendRed
                        ]
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '默认组',
                        '流量主',
                        '广告主',
                    ]
                };
                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] +
                                '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };
                var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
                var trafficChart = new Chart(trafficChartCanvas, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                $("#traffic-chart-legend").html(trafficChart.generateLegend());
            }
            if ($("#inline-datepicker").length) {
                $('#inline-datepicker').datepicker({
                    enableOnReadonly: true,
                    todayHighlight: true,
                });
            }
        });
    })(jQuery);
</script>

</body>

</html>
