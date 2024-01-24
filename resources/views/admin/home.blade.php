@extends('admin.layouts.admin')
@section('title', 'الرئيسية')
@section('content')
    <section class="">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-3">
                <li href="" class="breadcrumb-item" aria-current="page">
                    الرئيسية
                </li>
            </ol>
        </nav>
        <div class="section_content">
            <div class="status_section mb-4">
                <div class="row g-2">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="status_box blue-box">
                            <div class="data">
                                <h3>{{ \App\Models\Cart::count() }}</h3>
                                <p class="mb-3">كل الطلبات</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-chart-column blue-icon"></i>
                            </div>
                            <a href="{{ route('admin.carts.index') }}" class="more">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                                المزيد من المعلومات
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="status_box success-box">
                            <div class="data">
                                <h3>{{ \App\Models\User::where('type', 'user')->count() }}</h3>
                                <p class="mb-3">كل العملاء</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-people-roof success-icon"></i>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="more">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                                المزيد  من المعلومات
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="status_box danger-box">
                            <div class="data">
                                <h3>{{ \App\Models\User::vendors()->count() }}</h3>
                                <p class="mb-3"> مزودي الخدمات</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-shield danger-icon"></i>
                            </div>
                            <a href="{{ route('admin.vendors.index') }}" class="more">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                                المزيد من المعلومات
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="status_box warning-box">
                            <div class="data">
                                <h3>
                                    {{ \App\Models\Product::count() }}
                                </h3>
                                <p class="mb-3">كل المنتجات</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-users-line warning-icon"></i>
                            </div>
                            <a href="{{ route('admin.products.index') }}" class="more">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                                المزيد من المعلومات
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-white d-flex align-items-center justify-content-end">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-pie"></i>
                                المبيعات
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas class="h" id="myChartDate" height="130"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row row-gap-24 boxes-info">
                        <div class="col-md-6">
                            <div class="box-info blue">
                                <i class="fa-solid fa-user-group bg-icon"></i>
                                <div class="num">
                                    {{ \App\Models\User::clients()->count() }}
                                </div>
                                <a href="{{ route('admin.users.index') }}" class="text"> كل العملاء</a>
                            </div>
                        </div>
                        <!-- <div class="col-xs-12 col-md-6">
                            <div class="box-info green">
                                <i class="fas fa-note-sticky bg-icon"></i>
                                <div class="num">
                                    0
                                </div>
                                <a href="#" class="text">المستحقات المالية
                                </a>
                            </div>
                        </div> -->
                        <div class="col-xs-12 col-md-6">
                            <div class="box-info pur">
                                <i class="fa-solid fa-money-bills bg-icon"></i>
                                <div class="num">
                                    {{ \App\Models\Cart::count() }}
                                </div>
                                <a href="#" class="text"> الفواتير</a>
                            </div>
                        </div>
                        <!-- <div class="col-xs-12 col-md-6">
                            <div class="box-info red">
                                <i class="fas fa-clock bg-icon"></i>
                                <div class="num">0</div>
                                <a href="#" class="text">المشتريات</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <!-- map chart -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Chart Js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script>
            // Wave Chart
            let xValues = ["January", "February", "March", "April", "may", "June", "July"];
            new Chart("myChartDate", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        data: [860, 1140, 1060, 1060, 1070, 1070, 1070],
                        borderWidth: "1px",
                        pointRadius: 0,
                        borderColor: "#4B94BF",
                        backgroundColor: "rgba(75, 148, 191, 0.7)",
                        fill: true
                    }, {
                        data: [1600, 1700, 1700, 1900, 2000, 2700, 4000],
                        borderColor: "rgba(210 ,214, 223, 1)",
                        borderWidth: "1px",
                        backgroundColor: "rgba(210 ,214, 223, 0.7)",
                        pointRadius: 0,

                        fill: true
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });

            // Doughnut Chart
            new Chart("myChartDot", {
                type: "doughnut",
                data: {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [30, 20, 12],
                        backgroundColor: [
                            '#f56954',
                            '#f39c12',
                            '#00a65a'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });

            // map chart code
            var root = am5.Root.new("chartdiv");


            // Set themes
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create the map chart
            var chart = root.container.children.push(am5map.MapChart.new(root, {
                panX: "rotateX",
                panY: "translateY",
                projection: am5map.geoNaturalEarth1()
            }));


            // Create main polygon series for countries
            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_worldLow,
                exclude: ["AQ"]
            }));

            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: root.interfaceColors.get("primaryButtonHover")
            });

            polygonSeries.mapPolygons.template.states.create("active", {
                fill: root.interfaceColors.get("primaryButtonActive")
            });

            // Set clicking on "water" to zoom out
            chart.chartContainer.get("background").events.on("click", function() {
                chart.goHome();
            })

            // Add zoom control
            var zoomControl = chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
            var homeButton = zoomControl.children.moveValue(am5.Button.new(root, {
                paddingTop: 10,
                paddingBottom: 10,
                icon: am5.Graphics.new(root, {
                    svgPath: "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8",
                    fill: am5.color(0xffffff)
                })
            }), 0)

            homeButton.events.on("click", function() {
                chart.goHome();
            })

            chart.appear(1000, 100);
        </script>
    @endpush
@stop
