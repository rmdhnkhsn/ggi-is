@extends("layouts.app")
@section("title","Safety Complience")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">
@endpush

@section("content")

    <section class="content">
        <button class="legend-button" id="btn-legend">
            <img src="{{url('images/iconmaps/circle-question-solid 1.svg')}}" alt="">
        </button>
        <div class="floating-legend fade-Out">
            <div class="floating-header">
                <h2>Symbol & Information</h2>
                <p>Everything about this Map</p>
            </div>
            <div class="floating-content">
                <div class="content">
                    <div class="item">
                        <div class="icon">
                        <!-- {{url('images/iconpack/plan.svg')}} -->
                            <img src="{{url('images/iconmaps/Alarm.svg')}}" alt="">
                        </div>
                        <img src="{{url('images/iconmaps/divider.svg')}}" alt="">
                        <p>Alarm Button</p>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{url('images/iconmaps/Emergency Exit Light.svg')}}" alt="">
                        </div>
                        <img src="{{url('images/iconmaps/divider.svg')}}" alt="">
                        <p>Emergency Exit Light</p>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{url('images/iconmaps/Emergency Light.svg')}}" alt="">
                        </div>
                        <img src="{{url('images/iconmaps/divider.svg')}}" alt="">
                        <p>Emergency Light</p>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{url('images/iconmaps/Smoke Detector.svg')}}" alt="">
                        </div>
                        <img src="{{url('images/iconmaps/divider.svg')}}" alt="">
                        <p>Smoke Detector</p>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{url('images/iconmaps/APAR.svg')}}" alt="">
                        </div>
                        <img src="{{url('images/iconmaps/divider.svg')}}" alt="">
                        <p>APAR</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid maps" >
            <div class="background">
                <h1>Second Floor Sample Room</h1>
                <div id="window" class="magnify" data-magnified-zone=".mg_zone">
                    <div class="magnify_glass">
                        <div class="mg_ring">
                            <div class="sniper" style="z-index: 500;">
                                <img src="{{ url('/sniper.png') }}" alt="">
                            </div>
                        </div>
                        <div class="sniper">
                            <img src="sniper.png" alt="">
                        </div>
                        <div class="pm_btn plus">
                            <h2>+</h2>
                        </div>
                        <div class="pm_btn minus">
                            <h2>-</h2>
                        </div>
                        <div class="mg_zone"></div>
                    </div>
                    <div class="element_to_magnify d-flex justify-content-center">
                    <svg width="1300" height="1000" viewBox="0 0 3178 2046" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1195.43 413.67H1206.37V367.974L1226.82 413.67H1234.4L1254.75 367.974V413.67H1265.7V346.95H1253.99L1230.66 399.27L1207.23 346.95H1195.43V413.67ZM1276.43 386.982C1276.43 403.302 1287.47 414.534 1301.2 414.534C1310.03 414.534 1316.37 410.31 1319.73 405.798V413.67H1330.77V360.774H1319.73V368.454C1316.47 364.134 1310.32 359.91 1301.39 359.91C1287.47 359.91 1276.43 370.662 1276.43 386.982ZM1319.73 387.174C1319.73 398.598 1311.95 405.03 1303.7 405.03C1295.54 405.03 1287.67 398.406 1287.67 386.982C1287.67 375.558 1295.54 369.414 1303.7 369.414C1311.95 369.414 1319.73 375.846 1319.73 387.174ZM1356.09 385.83C1356.09 374.598 1361.08 371.238 1369.15 371.238H1371.93V359.91C1364.44 359.91 1359.16 363.174 1356.09 368.454V360.774H1345.15V413.67H1356.09V385.83ZM1381.99 413.67L1392.93 413.67V390.918L1412.52 413.67H1427.3L1402.92 387.27L1427.3 360.774H1412.13L1392.93 383.91V342.63H1381.99V413.67ZM1457.42 369.126C1465.58 369.126 1472.01 374.31 1472.2 382.47H1442.92C1444.07 374.118 1450.03 369.126 1457.42 369.126ZM1482.19 397.926H1470.38C1468.36 402.054 1464.62 405.318 1457.9 405.318C1449.83 405.318 1443.59 400.038 1442.83 391.302H1483.24C1483.53 389.478 1483.63 387.75 1483.63 385.926C1483.63 370.374 1472.97 359.91 1457.9 359.91C1442.25 359.91 1431.5 370.566 1431.5 387.174C1431.5 403.782 1442.73 414.534 1457.9 414.534C1470.86 414.534 1479.21 407.142 1482.19 397.926ZM1496.12 398.982C1496.12 409.734 1501.98 413.67 1511.39 413.67H1520.03V404.55H1513.31C1508.7 404.55 1507.16 402.918 1507.16 398.982V369.702H1520.03V360.774H1507.16V347.622H1496.12V360.774H1489.88V369.702H1496.12V398.982ZM1530.11 413.67H1541.06V360.774H1530.11V413.67ZM1535.68 353.766C1539.52 353.766 1542.59 350.694 1542.59 346.758C1542.59 342.822 1539.52 339.75 1535.68 339.75C1531.75 339.75 1528.67 342.822 1528.67 346.758C1528.67 350.694 1531.75 353.766 1535.68 353.766ZM1592.96 413.67H1603.81V382.47C1603.81 367.686 1594.5 359.91 1582.11 359.91C1575.78 359.91 1569.92 362.502 1566.37 366.822V360.774H1555.43V413.67H1566.37V384.102C1566.37 374.406 1571.65 369.414 1579.71 369.414C1587.68 369.414 1592.96 374.406 1592.96 384.102V413.67ZM1614.12 386.982C1614.12 403.302 1625.16 414.534 1639.08 414.534C1647.72 414.534 1654.06 410.214 1657.42 405.702V414.534C1657.42 425.094 1651.08 430.278 1642.63 430.278C1635.05 430.278 1629.19 426.534 1627.56 421.062H1616.71C1618.06 432.774 1628.52 439.782 1642.63 439.782C1659.15 439.782 1668.46 428.934 1668.46 414.534V360.774H1657.42V368.454C1654.15 363.942 1647.72 359.91 1639.08 359.91C1625.16 359.91 1614.12 370.662 1614.12 386.982ZM1657.42 387.174C1657.42 398.598 1649.64 405.03 1641.39 405.03C1633.23 405.03 1625.35 398.406 1625.35 386.982C1625.35 375.558 1633.23 369.414 1641.39 369.414C1649.64 369.414 1657.42 375.846 1657.42 387.174ZM1743.19 366.918C1743.19 373.542 1739.35 378.246 1730.81 378.246H1718.71V355.878H1730.81C1739.35 355.878 1743.19 360.198 1743.19 366.918ZM1707.77 346.95V413.67H1718.71V386.982H1727.07L1742.43 413.67H1755.48L1738.97 386.022C1750.2 383.238 1754.43 374.79 1754.43 366.918C1754.43 356.07 1746.65 346.95 1730.81 346.95H1707.77ZM1818.83 387.174C1818.83 370.566 1806.92 359.91 1791.85 359.91C1776.78 359.91 1764.87 370.566 1764.87 387.174C1764.87 403.782 1776.3 414.534 1791.37 414.534C1806.54 414.534 1818.83 403.782 1818.83 387.174ZM1776.01 387.174C1776.01 375.174 1783.4 369.414 1791.66 369.414C1799.82 369.414 1807.59 375.174 1807.59 387.174C1807.59 399.174 1799.53 405.03 1791.37 405.03C1783.11 405.03 1776.01 399.174 1776.01 387.174ZM1880.05 387.174C1880.05 370.566 1868.14 359.91 1853.07 359.91C1838 359.91 1826.09 370.566 1826.09 387.174C1826.09 403.782 1837.52 414.534 1852.59 414.534C1867.76 414.534 1880.05 403.782 1880.05 387.174ZM1837.23 387.174C1837.23 375.174 1844.62 369.414 1852.88 369.414C1861.04 369.414 1868.81 375.174 1868.81 387.174C1868.81 399.174 1860.75 405.03 1852.59 405.03C1844.33 405.03 1837.23 399.174 1837.23 387.174ZM1965.84 413.67H1976.69V382.47C1976.69 367.686 1967.28 359.91 1954.9 359.91C1947.22 359.91 1939.73 363.942 1936.46 370.374C1932.82 363.462 1925.81 359.91 1917.46 359.91C1911.12 359.91 1905.36 362.502 1901.81 366.822V360.774H1890.86V413.67H1901.81V384.102C1901.81 374.406 1907.09 369.414 1915.15 369.414C1923.12 369.414 1928.4 374.406 1928.4 384.102V413.67H1939.25V384.102C1939.25 374.406 1944.53 369.414 1952.59 369.414C1960.56 369.414 1965.84 374.406 1965.84 384.102V413.67Z" fill="#F4F4F4"/>
                        <rect x="124.031" y="55.8818" width="2923.58" height="715.575" stroke="white" stroke-width="20"/>
                        <path d="M297.264 1168.29H114.031V1903.87H688.771V1168.29H485.86" stroke="white" stroke-width="20"/>
                        <path d="M872.006 1168.29H688.773V1903.87H1263.51V1168.29H1060.6" stroke="white" stroke-width="20"/>
                        <path d="M1446.74 1168.29H1263.51V1903.87H1838.25V1168.29H1635.34" stroke="white" stroke-width="20"/>
                        <path d="M2021.48 1168.29H1838.25V1903.87H2412.99V1168.29H2210.08" stroke="white" stroke-width="20"/>
                        <path d="M2619.96 1168.29H2412.99V1903.87H2828.56V1168.29H2796.07" stroke="white" stroke-width="20"/>
                        <rect x="2838.56" y="1178.29" width="214.572" height="715.575" stroke="white" stroke-width="20"/>

                        <!-- Apar -->
                        @foreach($MapsApar as  $key=>$value)
                            @if($value['kode_lokasi']=='AP-0094')
                                @if($value['status_cek']=='1')
                                <path d="M2429.7 207.091C2429.7 202.822 2433.16 199.362 2437.42 199.362H2471.97C2476.24 199.362 2479.7 202.822 2479.7 207.091V340.544H2429.7V207.091Z" 
                                fill="#007BFF" />
                                <!-- AP-0094 -->
                                @else
                                <path d="M2429.7 207.091C2429.7 202.822 2433.16 199.362 2437.42 199.362H2471.97C2476.24 199.362 2479.7 202.822 2479.7 207.091V340.544H2429.7V207.091Z"
                                fill="#007BFF" class="animation"/>
                                <!-- AP-0094 -->
                                @endif
                            @endif
                        @endforeach
                    </svg>

                    </div>  
                </div>
            </div>
        </div>
    </section>


@endsection

@push("scripts")

<script src="{{asset('common/js/magnify.js')}}"></script>
<script>
    const buttontoggle = document.getElementById("btn-legend");
    const legend = document.getElementsByClassName("floating-legend")[0];
    buttontoggle.addEventListener('click', function () {
        legend.classList.toggle('fade-in');
        legend.classList.toggle('fade-Out');
        console.log('ok');
    });
    
    $(".magnify").jfMagnify();
    // the jfMagnify plugin and other demo files can be found
    // https://github.com/fonstok/jfMagnify
    $(document).ready(function () {
        var scaleNum = 2;
        $(".magnify").jfMagnify();
        $('.plus').click(function () {
            scaleNum += 1;
            if (scaleNum >= 10) {
                scaleNum = 10;
            };
            $(".magnify").data("jfMagnify").scaleMe(scaleNum);
        });
        $('.minus').click(function () {
            scaleNum -= 1;
            if (scaleNum <= 1) {
                scaleNum = 1;
            };
            $(".magnify").data("jfMagnify").scaleMe(scaleNum);
        });
        $('.magnify_glass').animate({
            'top': '60%',
            'left': '60%'
        }, {
            duration: 2000,
            progress: function () {
                $(".magnify").data("jfMagnify").update();
            },
            easing: "easeOutElastic"
        });
    });
</script>

<script>
  console.log('ok');
  const apar = document.getElementsByClassName('apar');
  console.log(apar);
  console.log(apar[0])
  function apar() {
    apar.classList.add('animation');
  }

</script>
@endpush