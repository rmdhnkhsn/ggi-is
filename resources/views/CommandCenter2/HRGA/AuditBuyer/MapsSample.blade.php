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
                        <svg width="1300" height="900" viewBox="0 0 3011 2103" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1607.71 492.494V559.214H1641.21V550.382H1618.65V492.494H1607.71ZM1687.23 492.398H1650.36V559.214H1687.23V550.286H1661.31V529.838H1684.35V520.91H1661.31V501.326H1687.23V492.398ZM1697.06 525.71C1697.06 545.774 1712.32 559.79 1731.14 559.79C1745.06 559.79 1757.06 552.878 1762.15 539.822H1749C1745.44 546.926 1739.11 550.286 1731.14 550.286C1717.89 550.286 1708.29 540.782 1708.29 525.71C1708.29 510.638 1717.89 501.23 1731.14 501.23C1739.11 501.23 1745.44 504.59 1749 511.694H1762.15C1757.06 498.638 1745.06 491.63 1731.14 491.63C1712.32 491.63 1697.06 505.742 1697.06 525.71ZM1771.5 501.422L1789.36 501.422V559.214H1800.3V501.422H1818.06V492.494L1771.5 492.494V501.422ZM1864.57 512.462C1864.57 519.086 1860.73 523.79 1852.19 523.79H1840.09V501.422H1852.19C1860.73 501.422 1864.57 505.742 1864.57 512.462ZM1829.15 492.494V559.214H1840.09V532.526H1848.44L1863.8 559.214H1876.86L1860.35 531.566C1871.58 528.782 1875.8 520.334 1875.8 512.462C1875.8 501.614 1868.03 492.494 1852.19 492.494H1829.15ZM1934.83 559.214H1946.35L1922.44 492.398H1909.77L1885.87 559.214H1897.29L1902.09 545.582H1930.03L1934.83 559.214ZM1926.95 536.654H1905.16L1916.11 505.646L1926.95 536.654ZM2017.1 512.462C2017.1 519.086 2013.26 523.79 2004.72 523.79H1992.62V501.422H2004.72C2013.26 501.422 2017.1 505.742 2017.1 512.462ZM1981.68 492.494V559.214H1992.62V532.526H2000.97L2016.33 559.214H2029.39L2012.88 531.566C2024.11 528.782 2028.33 520.334 2028.33 512.462C2028.33 501.614 2020.56 492.494 2004.72 492.494H1981.68ZM2106.84 525.71C2106.84 505.742 2091.77 491.63 2072.76 491.63C2053.95 491.63 2038.68 505.742 2038.68 525.71C2038.68 545.774 2053.95 559.886 2072.76 559.886C2091.77 559.886 2106.84 545.774 2106.84 525.71ZM2049.92 525.71C2049.92 510.638 2059.52 501.23 2072.76 501.23C2086.01 501.23 2095.61 510.638 2095.61 525.71C2095.61 540.782 2086.01 550.382 2072.76 550.382C2059.52 550.382 2049.92 540.782 2049.92 525.71ZM2182.13 525.71C2182.13 505.742 2167.05 491.63 2148.05 491.63C2129.23 491.63 2113.97 505.742 2113.97 525.71C2113.97 545.774 2129.23 559.886 2148.05 559.886C2167.05 559.886 2182.13 545.774 2182.13 525.71ZM2125.2 525.71C2125.2 510.638 2134.8 501.23 2148.05 501.23C2161.29 501.23 2170.89 510.638 2170.89 525.71C2170.89 540.782 2161.29 550.382 2148.05 550.382C2134.8 550.382 2125.2 540.782 2125.2 525.71ZM2192.9 559.214H2203.84V513.518L2224.29 559.214H2231.87L2252.22 513.518V559.214H2263.17V492.494H2251.46L2228.13 544.814L2204.7 492.494H2192.9V559.214Z" fill="#F4F4F4"/>
                            <path d="M888.427 502.214H899.371V435.494H888.427V502.214ZM910.283 444.422H928.139V502.214H939.083V444.422H956.843V435.494H910.283V444.422ZM1035.3 450.374C1035.97 441.254 1029.73 433.958 1018.11 433.958C1006.69 433.958 999.584 440.582 999.584 449.318C999.584 454.022 1000.93 457.574 1004.67 462.086C994.112 466.406 989.024 473.99 989.024 483.014C989.024 495.494 998.624 503.462 1013.02 503.462C1022.34 503.462 1029.73 500.39 1036.16 493.958L1044.42 502.214H1058.72L1042.5 486.086C1043.26 484.838 1044.13 483.494 1044.9 482.15L1053.54 467.366H1041.73L1034.91 478.598L1017.25 461.03C1012.54 455.942 1010.53 452.966 1010.53 449.318C1010.53 445.766 1013.31 442.886 1017.63 442.886C1021.76 442.886 1024.54 445.478 1024.35 450.374H1035.3ZM1013.02 494.15C1005.15 494.15 999.968 489.062 999.968 482.63C999.968 476.678 1003.52 472.07 1011.3 468.998L1028.96 486.758C1024.35 491.654 1019.26 494.15 1013.02 494.15ZM1112.62 435.494H1090.83V502.214L1112.62 502.214C1134.03 502.214 1148.05 489.638 1148.05 469.094C1148.05 448.454 1134.03 435.494 1112.62 435.494ZM1101.78 493.286V444.422H1112.62C1128.37 444.422 1136.82 453.83 1136.82 469.094C1136.82 484.262 1128.37 493.286 1112.62 493.286L1101.78 493.286ZM1155.44 444.422H1173.3V502.214H1184.24V444.422H1202V435.494H1155.44V444.422ZM938.241 551.462C938.241 558.086 934.401 562.79 925.857 562.79H913.761V540.422H925.857C934.401 540.422 938.241 544.742 938.241 551.462ZM902.817 531.494V598.214H913.761V571.526H922.113L937.473 598.214H950.529L934.017 570.566C945.249 567.782 949.473 559.334 949.473 551.462C949.473 540.614 941.697 531.494 925.857 531.494H902.817ZM1027.99 564.71C1027.99 544.742 1012.91 530.63 993.905 530.63C975.089 530.63 959.825 544.742 959.825 564.71C959.825 584.774 975.089 598.886 993.905 598.886C1012.91 598.886 1027.99 584.774 1027.99 564.71ZM971.057 564.71C971.057 549.638 980.657 540.23 993.905 540.23C1007.15 540.23 1016.75 549.638 1016.75 564.71C1016.75 579.782 1007.15 589.382 993.905 589.382C980.657 589.382 971.057 579.782 971.057 564.71ZM1103.27 564.71C1103.27 544.742 1088.19 530.63 1069.19 530.63C1050.37 530.63 1035.11 544.742 1035.11 564.71C1035.11 584.774 1050.37 598.886 1069.19 598.886C1088.19 598.886 1103.27 584.774 1103.27 564.71ZM1046.34 564.71C1046.34 549.638 1055.94 540.23 1069.19 540.23C1082.43 540.23 1092.03 549.638 1092.03 564.71C1092.03 579.782 1082.43 589.382 1069.19 589.382C1055.94 589.382 1046.34 579.782 1046.34 564.71ZM1114.04 598.214H1124.98V552.518L1145.43 598.214H1153.01L1173.36 552.518V598.214H1184.31V531.494H1172.6L1149.27 583.814L1125.84 531.494H1114.04V598.214Z" fill="#F4F4F4"/>
                            <path d="M335.758 1551.65L313.966 1551.65L313.966 1539.55C313.966 1531.01 317.998 1527.17 324.91 1527.17C331.63 1527.17 335.758 1531.01 335.758 1539.55L335.758 1551.65ZM324.91 1515.94C314.062 1515.94 305.038 1523.71 305.038 1539.55L305.038 1562.59L371.758 1562.59L371.758 1551.65L344.686 1551.65L344.686 1539.55C344.686 1522.18 334.414 1515.94 324.91 1515.94ZM325.006 1470.07C331.63 1470.07 336.334 1473.91 336.334 1482.46L336.334 1494.55L313.966 1494.55L313.966 1482.46C313.966 1473.91 318.286 1470.07 325.006 1470.07ZM305.038 1505.5L371.758 1505.5L371.758 1494.55L345.07 1494.55L345.07 1486.2L371.758 1470.84L371.758 1457.79L344.11 1474.3C341.326 1463.07 332.878 1458.84 325.006 1458.84C314.158 1458.84 305.038 1466.62 305.038 1482.46L305.038 1505.5ZM338.254 1380.33C318.286 1380.33 304.174 1395.4 304.174 1414.41C304.174 1433.23 318.286 1448.49 338.254 1448.49C358.318 1448.49 372.43 1433.23 372.43 1414.41C372.43 1395.4 358.318 1380.33 338.254 1380.33ZM338.254 1437.26C323.182 1437.26 313.774 1427.66 313.774 1414.41C313.774 1401.16 323.182 1391.56 338.254 1391.56C353.326 1391.56 362.926 1401.16 362.926 1414.41C362.926 1427.66 353.326 1437.26 338.254 1437.26ZM305.038 1347.77L305.038 1369.56L371.758 1369.56L371.758 1347.77C371.758 1326.36 359.182 1312.34 338.638 1312.34C317.998 1312.34 305.038 1326.36 305.038 1347.77ZM362.83 1358.62L313.966 1358.62L313.966 1347.77C313.966 1332.02 323.374 1323.58 338.638 1323.58C353.806 1323.58 362.83 1332.02 362.83 1347.77L362.83 1358.62ZM347.374 1301.59C364.366 1301.59 372.43 1289.69 372.43 1275.67C372.43 1261.75 364.366 1249.47 347.374 1249.47L305.038 1249.47L305.038 1260.41L347.566 1260.41C357.934 1260.41 362.83 1266.27 362.83 1275.58C362.83 1284.79 357.934 1290.65 347.566 1290.65L305.038 1290.65L305.038 1301.59L347.374 1301.59ZM338.254 1238.86C358.318 1238.86 372.334 1223.6 372.334 1204.78C372.334 1190.86 365.422 1178.86 352.366 1173.78L352.366 1186.93C359.47 1190.48 362.83 1196.82 362.83 1204.78C362.83 1218.03 353.326 1227.63 338.254 1227.63C323.182 1227.63 313.774 1218.03 313.774 1204.78C313.774 1196.82 317.134 1190.48 324.238 1186.93L324.238 1173.78C311.182 1178.86 304.174 1190.86 304.174 1204.78C304.174 1223.6 318.286 1238.86 338.254 1238.86ZM313.966 1164.42L313.966 1146.57L371.758 1146.57L371.758 1135.62L313.966 1135.62L313.966 1117.86L305.038 1117.86L305.038 1164.42L313.966 1164.42ZM371.758 1106.78L371.758 1095.84L305.038 1095.84L305.038 1106.78L371.758 1106.78ZM338.254 1016.95C318.286 1016.95 304.174 1032.03 304.174 1051.03C304.174 1069.85 318.286 1085.11 338.254 1085.11C358.318 1085.11 372.43 1069.85 372.43 1051.03C372.43 1032.03 358.318 1016.95 338.254 1016.95ZM338.254 1073.88C323.182 1073.88 313.774 1064.28 313.774 1051.03C313.774 1037.79 323.182 1028.19 338.254 1028.19C353.326 1028.19 362.926 1037.79 362.926 1051.03C362.926 1064.28 353.326 1073.88 338.254 1073.88ZM304.942 962.314L354.67 962.314L304.942 995.242L304.942 1006.19L371.758 1006.19L371.758 995.242L321.934 995.242L371.758 962.314L371.758 951.37L304.942 951.37L304.942 962.314ZM352.846 867.037C328.462 867.037 337.87 902.365 322.798 902.365C316.366 902.365 313.294 897.469 313.486 891.133C313.678 884.221 317.806 880.285 322.318 879.901L322.318 867.805C310.894 868.765 304.174 877.789 304.174 890.557C304.174 904.189 311.47 913.501 323.182 913.501C347.758 913.501 337.294 878.077 353.422 878.077C359.086 878.077 363.214 882.397 363.214 890.077C363.214 897.661 358.798 901.501 353.326 901.981L353.326 913.693C365.134 913.693 372.43 903.421 372.43 890.077C372.43 875.197 362.83 867.037 352.846 867.037ZM371.758 809.099L371.758 797.579L304.942 821.483L304.942 834.155L371.758 858.059L371.758 846.635L358.126 841.835L358.126 813.899L371.758 809.099ZM349.198 816.971L349.198 838.763L318.19 827.819L349.198 816.971ZM371.758 787.186L371.758 776.242L326.062 776.242L371.758 755.794L371.758 748.21L326.062 727.858L371.758 727.858L371.758 716.914L305.038 716.914L305.038 728.626L357.358 751.954L305.038 775.378L305.038 787.186L371.758 787.186ZM335.758 691.585L313.966 691.585L313.966 679.489C313.966 670.945 317.998 667.105 324.91 667.105C331.63 667.105 335.758 670.945 335.758 679.489L335.758 691.585ZM324.91 655.873C314.062 655.873 305.038 663.649 305.038 679.489L305.038 702.529L371.758 702.529L371.758 691.585L344.686 691.585L344.686 679.489C344.686 662.113 334.414 655.873 324.91 655.873ZM305.038 645.436L371.758 645.436L371.758 611.932L362.926 611.932L362.926 634.492L305.038 634.492L305.038 645.436ZM304.942 565.915L304.942 602.779L371.758 602.779L371.758 565.915L362.83 565.915L362.83 591.835L342.382 591.835L342.382 568.795L333.454 568.795L333.454 591.835L313.87 591.835L313.87 565.915L304.942 565.915ZM421.006 1170.03C427.63 1170.03 432.334 1173.87 432.334 1182.41L432.334 1194.51L409.966 1194.51L409.966 1182.41C409.966 1173.87 414.286 1170.03 421.006 1170.03ZM401.038 1205.45L467.758 1205.45L467.758 1194.51L441.07 1194.51L441.07 1186.16L467.758 1170.8L467.758 1157.74L440.11 1174.25C437.326 1163.02 428.878 1158.8 421.006 1158.8C410.158 1158.8 401.038 1166.57 401.038 1182.41L401.038 1205.45ZM434.254 1080.28C414.286 1080.28 400.174 1095.36 400.174 1114.36C400.174 1133.18 414.286 1148.44 434.254 1148.44C454.318 1148.44 468.43 1133.18 468.43 1114.36C468.43 1095.36 454.318 1080.28 434.254 1080.28ZM434.254 1137.21C419.182 1137.21 409.774 1127.61 409.774 1114.36C409.774 1101.12 419.182 1091.52 434.254 1091.52C449.326 1091.52 458.926 1101.12 458.926 1114.36C458.926 1127.61 449.326 1137.21 434.254 1137.21ZM434.254 1005C414.286 1005 400.174 1020.07 400.174 1039.08C400.174 1057.9 414.286 1073.16 434.254 1073.16C454.318 1073.16 468.43 1057.9 468.43 1039.08C468.43 1020.07 454.318 1005 434.254 1005ZM434.254 1061.93C419.182 1061.93 409.774 1052.33 409.774 1039.08C409.774 1025.83 419.182 1016.23 434.254 1016.23C449.326 1016.23 458.926 1025.83 458.926 1039.08C458.926 1052.33 449.326 1061.93 434.254 1061.93ZM467.758 994.233L467.758 983.289L422.062 983.289L467.758 962.841L467.758 955.257L422.062 934.905L467.758 934.905L467.758 923.961L401.038 923.961L401.038 935.673L453.358 959.001L401.038 982.425L401.038 994.233L467.758 994.233Z" fill="#F4F4F4"/>
                            <path d="M1673.65 1661H1691.51V1718.79H1702.45V1661H1720.21V1652.07H1673.65V1661ZM1776.32 1718.79H1787.84L1763.94 1651.97H1751.27L1727.36 1718.79H1738.79L1743.59 1705.16H1771.52L1776.32 1718.79ZM1768.45 1696.23H1746.66L1757.6 1665.22L1768.45 1696.23ZM1835.87 1699.69C1835.87 1706.12 1831.36 1709.86 1823.96 1709.86H1809.18V1689.03H1823.58C1830.88 1689.03 1835.87 1693.06 1835.87 1699.69ZM1834.14 1670.6C1834.14 1676.74 1829.82 1680.1 1822.72 1680.1H1809.18V1661H1822.72C1829.82 1661 1834.14 1664.55 1834.14 1670.6ZM1846.81 1700.84C1846.81 1692.87 1841.05 1685.77 1833.95 1684.52C1840.38 1682.21 1845.28 1677.32 1845.28 1669.25C1845.28 1659.85 1837.79 1652.07 1823.68 1652.07H1798.24V1718.79H1824.92C1838.56 1718.79 1846.81 1711.01 1846.81 1700.84ZM1858.7 1652.07V1718.79H1892.21V1709.96H1869.65V1652.07H1858.7ZM1938.22 1651.97H1901.36V1718.79H1938.22V1709.86H1912.3V1689.41H1935.34V1680.49H1912.3V1660.9H1938.22V1651.97ZM1972.99 1685.29C1972.99 1705.35 1988.26 1719.37 2007.07 1719.37C2020.99 1719.37 2032.99 1712.45 2038.08 1699.4H2024.93C2021.38 1706.5 2015.04 1709.86 2007.07 1709.86C1993.83 1709.86 1984.23 1700.36 1984.23 1685.29C1984.23 1670.21 1993.83 1660.81 2007.07 1660.81C2015.04 1660.81 2021.38 1664.17 2024.93 1671.27H2038.08C2032.99 1658.21 2020.99 1651.21 2007.07 1651.21C1988.26 1651.21 1972.99 1665.32 1972.99 1685.29ZM2050.8 1694.41C2050.8 1711.4 2062.7 1719.46 2076.72 1719.46C2090.64 1719.46 2102.92 1711.4 2102.92 1694.41V1652.07H2091.98V1694.6C2091.98 1704.97 2086.12 1709.86 2076.81 1709.86C2067.6 1709.86 2061.74 1704.97 2061.74 1694.6V1652.07H2050.8V1694.41ZM2113.72 1661H2131.57V1718.79H2142.52V1661H2160.28V1652.07H2113.72V1661ZM2167.9 1661H2185.76V1718.79H2196.7V1661H2214.46V1652.07H2167.9V1661ZM2225.55 1718.79H2236.49V1652.07H2225.55V1718.79ZM2294.73 1651.97V1701.7L2261.8 1651.97H2250.86V1718.79H2261.8V1668.97L2294.73 1718.79H2305.68V1651.97H2294.73ZM2350.48 1651.21C2331.66 1651.21 2316.4 1665.32 2316.4 1685.29C2316.4 1705.35 2331.66 1719.37 2350.48 1719.37C2368.43 1719.37 2381.49 1706.21 2383.5 1690.76V1682.21H2346.74V1690.95H2371.79C2370.16 1702.18 2362.58 1709.48 2350.48 1709.48C2337.23 1709.48 2327.63 1699.97 2327.63 1685.29C2327.63 1670.6 2337.23 1661.19 2350.48 1661.19C2358.45 1661.19 2364.78 1664.55 2368.34 1671.27H2381.49C2376.4 1658.21 2364.4 1651.21 2350.48 1651.21ZM2464.26 1699.88C2464.26 1675.49 2428.93 1684.9 2428.93 1669.83C2428.93 1663.4 2433.83 1660.33 2440.16 1660.52C2447.08 1660.71 2451.01 1664.84 2451.4 1669.35H2463.49C2462.53 1657.93 2453.51 1651.21 2440.74 1651.21C2427.11 1651.21 2417.8 1658.5 2417.8 1670.21C2417.8 1694.79 2453.22 1684.33 2453.22 1700.45C2453.22 1706.12 2448.9 1710.25 2441.22 1710.25C2433.64 1710.25 2429.8 1705.83 2429.32 1700.36H2417.6C2417.6 1712.17 2427.88 1719.46 2441.22 1719.46C2456.1 1719.46 2464.26 1709.86 2464.26 1699.88ZM2522.2 1718.79H2533.72L2509.81 1651.97H2497.14L2473.24 1718.79H2484.66L2489.46 1705.16H2517.4L2522.2 1718.79ZM2514.32 1696.23H2492.53L2503.48 1665.22L2514.32 1696.23ZM2544.11 1718.79H2555.05V1673.09L2575.5 1718.79H2583.09L2603.44 1673.09V1718.79H2614.38V1652.07H2602.67L2579.34 1704.39L2555.92 1652.07H2544.11V1718.79ZM2639.71 1682.79V1661H2651.81C2660.35 1661 2664.19 1665.03 2664.19 1671.94C2664.19 1678.66 2660.35 1682.79 2651.81 1682.79H2639.71ZM2675.42 1671.94C2675.42 1661.09 2667.65 1652.07 2651.81 1652.07H2628.77V1718.79H2639.71V1691.72H2651.81C2669.18 1691.72 2675.42 1681.45 2675.42 1671.94ZM2685.86 1652.07V1718.79H2719.36V1709.96H2696.8V1652.07H2685.86ZM2765.38 1651.97H2728.52V1718.79H2765.38V1709.86H2739.46V1689.41H2762.5V1680.49H2739.46V1660.9H2765.38V1651.97Z" fill="#F4F4F4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M771.482 197.135H36.9805V2043.92H771.482V197.135ZM36.9805 194.135H33.9805V197.135V2043.92V2046.92H36.9805H771.482H774.482V2046.84H1205.39V2046.92H1208.39H1489.1H1492.1H1492.1H1495.1H2974.02H2977.02V2043.92V1313.2V1310.2H2974.02H1495.1H1492.1H1492.1H1492.1H1489.1H1489.1H1437.64H1434.64H1434.64H1431.64H1380.17H1377.17H1377.17H1374.17H1322.71H1319.71H1319.71H1316.71H1265.24H1262.24H1262.24H1259.24H1208.39H1207.78H1205.39H1204.78V1313.2V1677.79V1680.79H1205.39V2043.84H774.482V930.85H777.48H1294.74H1297.74H1300.74H2523.23H2526.23V927.85V197.135V194.135H2523.23H1300.74H1297.74H1294.74H777.48H774.482H774.48H771.482H36.9805ZM1208.39 1313.2H1259.24V1677.79H1208.39V1313.2ZM1259.24 1680.79H1208.39V2043.92H1489.1V1680.79H1437.64H1434.64V1677.79V1313.2H1434.64V1677.79V1680.79H1431.64H1380.17H1377.17V1677.79V1313.2H1377.17V1677.79V1680.79H1374.17H1322.71H1319.71V1677.79V1313.2H1319.71V1677.79V1680.79H1316.71H1265.24H1262.24V1677.79V1313.2H1262.24V1677.79V1680.79H1259.24ZM1316.71 1313.2H1265.24V1677.79H1316.71V1313.2ZM1322.71 1313.2H1374.17V1677.79H1322.71V1313.2ZM1431.64 1313.2H1380.17V1677.79H1431.64V1313.2ZM1437.64 1313.2H1489.1V1677.79H1437.64V1313.2ZM777.48 197.135H1294.74V927.85H777.48V197.135ZM2523.23 197.135H1300.74V927.85H2523.23V197.135ZM2692.7 197.135H2974.02V927.85H2692.7V197.135ZM2689.7 194.135H2692.7H2974.02H2977.02V197.135V927.85V930.85H2974.02H2692.7H2689.7V927.85V197.135V194.135ZM2974.02 1313.2H1495.1V2043.92H2974.02V1313.2ZM2922.55 942.612H2974.02V1307.2H2922.55V942.612ZM2919.55 939.612H2922.55H2974.02H2977.02V942.612V1307.2V1310.2H2974.02H2922.55H2919.55V1307.2V942.612V939.612ZM2916.55 942.612H2865.09V1307.2H2916.55V942.612ZM2865.09 939.612H2862.09V942.612V1307.2V1310.2H2865.09H2916.55H2919.55V1307.2V942.612V939.612H2916.55H2865.09ZM2807.62 942.612H2859.09V1307.2H2807.62V942.612ZM2804.62 939.612H2807.62H2859.09H2862.09V942.612V1307.2V1310.2H2859.09H2807.62H2804.62V1307.2V942.612V939.612ZM2801.62 942.612H2750.16V1307.2H2801.62V942.612ZM2750.16 939.612H2747.16V942.612V1307.2V1310.2H2750.16H2801.62H2804.62V1307.2V942.612V939.612H2801.62H2750.16ZM2692.7 942.612H2744.16V1307.2H2692.7V942.612ZM2689.7 939.612H2692.7H2744.16H2747.16V942.612V1307.2V1310.2H2744.16H2692.7H2689.7V1307.2V942.612V939.612Z" fill="white"/>
                            <path d="M1046.39 110.633C1046.39 92.3454 1019.89 99.4014 1019.89 88.0974C1019.89 83.2734 1023.57 80.9694 1028.32 81.1134C1033.5 81.2574 1036.45 84.3534 1036.74 87.7374H1045.81C1045.09 79.1694 1038.33 74.1294 1028.75 74.1294C1018.53 74.1294 1011.54 79.6014 1011.54 88.3854C1011.54 106.817 1038.11 98.9694 1038.11 111.065C1038.11 115.313 1034.87 118.409 1029.11 118.409C1023.42 118.409 1020.54 115.097 1020.18 110.993H1011.4C1011.4 119.849 1019.1 125.321 1029.11 125.321C1040.27 125.321 1046.39 118.121 1046.39 110.633ZM1072.78 91.4094C1078.9 91.4094 1083.72 95.2974 1083.87 101.417H1061.91C1062.77 95.1534 1067.24 91.4094 1072.78 91.4094ZM1091.36 113.009H1082.5C1080.99 116.105 1078.18 118.553 1073.14 118.553C1067.09 118.553 1062.41 114.593 1061.84 108.041H1092.15C1092.36 106.673 1092.44 105.377 1092.44 104.009C1092.44 92.3454 1084.44 84.4974 1073.14 84.4974C1061.4 84.4974 1053.34 92.4894 1053.34 104.945C1053.34 117.401 1061.76 125.465 1073.14 125.465C1082.86 125.465 1089.12 119.921 1091.36 113.009ZM1097.78 104.945C1097.78 117.401 1105.84 125.465 1117.22 125.465C1126.94 125.465 1133.27 120.065 1135.51 112.289H1126.65C1125.14 116.393 1122.11 118.553 1117.22 118.553C1110.59 118.553 1106.2 113.657 1106.2 104.945C1106.2 96.3054 1110.59 91.4094 1117.22 91.4094C1122.11 91.4094 1125.28 93.8574 1126.65 97.6734H1135.51C1133.27 89.3214 1126.94 84.4974 1117.22 84.4974C1105.84 84.4974 1097.78 92.5614 1097.78 104.945ZM1181.49 104.945C1181.49 92.4894 1172.56 84.4974 1161.25 84.4974C1149.95 84.4974 1141.02 92.4894 1141.02 104.945C1141.02 117.401 1149.59 125.465 1160.89 125.465C1172.27 125.465 1181.49 117.401 1181.49 104.945ZM1149.37 104.945C1149.37 95.9454 1154.92 91.6254 1161.11 91.6254C1167.23 91.6254 1173.06 95.9454 1173.06 104.945C1173.06 113.945 1167.01 118.337 1160.89 118.337C1154.7 118.337 1149.37 113.945 1149.37 104.945ZM1217.75 124.817H1225.89V101.417C1225.89 90.3294 1218.9 84.4974 1209.62 84.4974C1204.86 84.4974 1200.47 86.4414 1197.81 89.6814V85.1454H1189.6V124.817H1197.81V102.641C1197.81 95.3694 1201.77 91.6254 1207.82 91.6254C1213.79 91.6254 1217.75 95.3694 1217.75 102.641V124.817ZM1233.62 104.801C1233.62 117.041 1241.9 125.465 1252.34 125.465C1258.82 125.465 1263.57 122.441 1266.09 118.841V124.817H1274.37V71.5374H1266.09V90.6894C1263.07 86.9454 1257.6 84.4974 1252.41 84.4974C1241.9 84.4974 1233.62 92.5614 1233.62 104.801ZM1266.09 104.945C1266.09 113.513 1260.26 118.337 1254.07 118.337C1247.95 118.337 1242.05 113.369 1242.05 104.801C1242.05 96.2334 1247.95 91.6254 1254.07 91.6254C1260.26 91.6254 1266.09 96.4494 1266.09 104.945ZM1303.86 124.817H1312.07V102.929H1328.63V96.2334H1312.07V81.4734H1333.31V74.7774H1303.86V124.817ZM1340.91 124.817H1349.12V71.5374H1340.91V124.817ZM1397.7 104.945C1397.7 92.4894 1388.77 84.4974 1377.46 84.4974C1366.16 84.4974 1357.23 92.4894 1357.23 104.945C1357.23 117.401 1365.8 125.465 1377.1 125.465C1388.48 125.465 1397.7 117.401 1397.7 104.945ZM1365.58 104.945C1365.58 95.9454 1371.13 91.6254 1377.32 91.6254C1383.44 91.6254 1389.27 95.9454 1389.27 104.945C1389.27 113.945 1383.22 118.337 1377.1 118.337C1370.91 118.337 1365.58 113.945 1365.58 104.945ZM1443.61 104.945C1443.61 92.4894 1434.68 84.4974 1423.38 84.4974C1412.07 84.4974 1403.15 92.4894 1403.15 104.945C1403.15 117.401 1411.71 125.465 1423.02 125.465C1434.39 125.465 1443.61 117.401 1443.61 104.945ZM1411.5 104.945C1411.5 95.9454 1417.04 91.6254 1423.23 91.6254C1429.35 91.6254 1435.19 95.9454 1435.19 104.945C1435.19 113.945 1429.14 118.337 1423.02 118.337C1416.83 118.337 1411.5 113.945 1411.5 104.945ZM1459.93 103.937C1459.93 95.5134 1463.68 92.9934 1469.72 92.9934H1471.81V84.4974C1466.2 84.4974 1462.24 86.9454 1459.93 90.9054V85.1454H1451.72V124.817H1459.93V103.937ZM1531.83 110.633C1531.83 92.3454 1505.33 99.4014 1505.33 88.0974C1505.33 83.2734 1509 80.9694 1513.76 81.1134C1518.94 81.2574 1521.89 84.3534 1522.18 87.7374H1531.25C1530.53 79.1694 1523.76 74.1294 1514.19 74.1294C1503.96 74.1294 1496.98 79.6014 1496.98 88.3854C1496.98 106.817 1523.55 98.9694 1523.55 111.065C1523.55 115.313 1520.31 118.409 1514.55 118.409C1508.86 118.409 1505.98 115.097 1505.62 110.993H1496.84C1496.84 119.849 1504.54 125.321 1514.55 125.321C1525.71 125.321 1531.83 118.121 1531.83 110.633ZM1538.78 104.801C1538.78 117.041 1547.06 125.465 1557.35 125.465C1563.98 125.465 1568.73 122.297 1571.25 118.913V124.817H1579.53V85.1454H1571.25V90.9054C1568.8 87.6654 1564.19 84.4974 1557.5 84.4974C1547.06 84.4974 1538.78 92.5614 1538.78 104.801ZM1571.25 104.945C1571.25 113.513 1565.42 118.337 1559.23 118.337C1553.11 118.337 1547.2 113.369 1547.2 104.801C1547.2 96.2334 1553.11 91.6254 1559.23 91.6254C1565.42 91.6254 1571.25 96.4494 1571.25 104.945ZM1646.54 124.817H1654.68V101.417C1654.68 90.3294 1647.62 84.4974 1638.33 84.4974C1632.57 84.4974 1626.96 87.5214 1624.51 92.3454C1621.77 87.1614 1616.52 84.4974 1610.25 84.4974C1605.5 84.4974 1601.18 86.4414 1598.52 89.6814V85.1454H1590.31V124.817H1598.52V102.641C1598.52 95.3694 1602.48 91.6254 1608.53 91.6254C1614.5 91.6254 1618.46 95.3694 1618.46 102.641V124.817H1626.6V102.641C1626.6 95.3694 1630.56 91.6254 1636.61 91.6254C1642.58 91.6254 1646.54 95.3694 1646.54 102.641V124.817ZM1673.33 90.9774V85.1454H1665.12V143.681H1673.33V119.057C1675.92 122.153 1680.6 125.465 1687.15 125.465C1697.59 125.465 1705.8 117.041 1705.8 104.801C1705.8 92.5614 1697.59 84.4974 1687.15 84.4974C1680.67 84.4974 1675.85 87.6654 1673.33 90.9774ZM1697.45 104.801C1697.45 113.369 1691.55 118.337 1685.35 118.337C1679.23 118.337 1673.33 113.513 1673.33 104.945C1673.33 96.4494 1679.23 91.6254 1685.35 91.6254C1691.55 91.6254 1697.45 96.2334 1697.45 104.801ZM1713.92 124.817H1722.13V71.5374H1713.92V124.817ZM1749.61 91.4094C1755.73 91.4094 1760.55 95.2974 1760.7 101.417H1738.74C1739.6 95.1534 1744.06 91.4094 1749.61 91.4094ZM1768.18 113.009H1759.33C1757.82 116.105 1755.01 118.553 1749.97 118.553C1743.92 118.553 1739.24 114.593 1738.66 108.041H1768.98C1769.19 106.673 1769.26 105.377 1769.26 104.009C1769.26 92.3454 1761.27 84.4974 1749.97 84.4974C1738.23 84.4974 1730.17 92.4894 1730.17 104.945C1730.17 117.401 1738.59 125.465 1749.97 125.465C1759.69 125.465 1765.95 119.921 1768.18 113.009ZM1822.61 89.7534C1822.61 94.7214 1819.73 98.2494 1813.32 98.2494H1804.25V81.4734H1813.32C1819.73 81.4734 1822.61 84.7134 1822.61 89.7534ZM1796.04 74.7774V124.817H1804.25V104.801H1810.52L1822.04 124.817H1831.83L1819.44 104.081C1827.87 101.993 1831.04 95.6574 1831.04 89.7534C1831.04 81.6174 1825.2 74.7774 1813.32 74.7774H1796.04ZM1879.34 104.945C1879.34 92.4894 1870.41 84.4974 1859.1 84.4974C1847.8 84.4974 1838.87 92.4894 1838.87 104.945C1838.87 117.401 1847.44 125.465 1858.74 125.465C1870.12 125.465 1879.34 117.401 1879.34 104.945ZM1847.22 104.945C1847.22 95.9454 1852.77 91.6254 1858.96 91.6254C1865.08 91.6254 1870.91 95.9454 1870.91 104.945C1870.91 113.945 1864.86 118.337 1858.74 118.337C1852.55 118.337 1847.22 113.945 1847.22 104.945ZM1925.25 104.945C1925.25 92.4894 1916.32 84.4974 1905.02 84.4974C1893.71 84.4974 1884.79 92.4894 1884.79 104.945C1884.79 117.401 1893.35 125.465 1904.66 125.465C1916.03 125.465 1925.25 117.401 1925.25 104.945ZM1893.14 104.945C1893.14 95.9454 1898.68 91.6254 1904.87 91.6254C1910.99 91.6254 1916.83 95.9454 1916.83 104.945C1916.83 113.945 1910.78 118.337 1904.66 118.337C1898.47 118.337 1893.14 113.945 1893.14 104.945ZM1989.6 124.817H1997.73V101.417C1997.73 90.3294 1990.68 84.4974 1981.39 84.4974C1975.63 84.4974 1970.01 87.5214 1967.56 92.3454C1964.83 87.1614 1959.57 84.4974 1953.31 84.4974C1948.56 84.4974 1944.24 86.4414 1941.57 89.6814V85.1454H1933.36V124.817H1941.57V102.641C1941.57 95.3694 1945.53 91.6254 1951.58 91.6254C1957.56 91.6254 1961.52 95.3694 1961.52 102.641V124.817H1969.65V102.641C1969.65 95.3694 1973.61 91.6254 1979.66 91.6254C1985.64 91.6254 1989.6 95.3694 1989.6 102.641V124.817Z" fill="#F4F4F4"/>

                            <!-- Appar -->
                            @foreach($MapsApar as  $key=>$value)
                            @if($value['kode_lokasi']=='AP-0095')
                                @if($value['status_cek']=='1')
                                <path d="M123.367 1835.03C123.367 1823.98 132.321 1815.03 143.367 1815.03H153.367C164.413 1815.03 173.367 1823.98 173.367 1835.03L173.367 1956.21H123.367L123.367 1835.03Z" 
                                fill="#007BFF"/>
                                <!-- AP-0095 -->
                                @else
                                <path d="M123.367 1835.03C123.367 1823.98 132.321 1815.03 143.367 1815.03H153.367C164.413 1815.03 173.367 1823.98 173.367 1835.03L173.367 1956.21H123.367L123.367 1835.03Z" 
                                fill="#007BFF" class="animation"/>
                                <!-- AP-0095 -->
                                @endif
                            @elseif($value['kode_lokasi']=='AP-0096')
                                @if($value['status_cek']=='1')
                                <path d="M2610.8 236.854C2610.8 226.085 2619.53 217.354 2630.3 217.354H2640.3C2651.07 217.354 2659.8 226.085 2659.8 236.854V357.536H2610.8V236.854Z" 
                                fill="#007BFF" stroke="#F4F4F4"/>
                                <!-- AP-0096 -->
                                @else
                                <path d="M2610.8 236.854C2610.8 226.085 2619.53 217.354 2630.3 217.354H2640.3C2651.07 217.354 2659.8 226.085 2659.8 236.854V357.536H2610.8V236.854Z" 
                                fill="#007BFF" stroke="#F4F4F4" class="animation"/>
                                <!-- AP-0096 -->
                                @endif
                            @endif
                            @endforeach
                            <!-- Alaram Button -->
                            @foreach($MapsAlarm as  $key=>$value)
                            @if($value['kode_lokasi']=='AB-0011')
                                @if($value['status_cek']=='1')
                                    <circle cx="1139.46" cy="1920.52" r="35.6934" fill="#FB5B5B"/>
                                    <!-- AB-0011 -->
                                @else
                                    <circle cx="1139.46" cy="1920.52" r="35.6934" fill="#FB5B5B" class="animation"/>
                                    <!-- AB-0011 -->
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