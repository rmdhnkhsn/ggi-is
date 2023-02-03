@extends("CommandCenter2.production.layouts.app")
@section("title","Production Monitoring")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('/common/css/plugins/owl-carousel/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/plugins/owl-carousel/owl-theme-default.css')}}">
@endpush

<style>
    .owl-dots {
        display: none;
    }
    table th:first-child{
        border-radius: 10px 0 0 0;
        border: none
    }
    table th:last-child{
        border-radius: 0 10px 0 0;
        border: none
    }
</style>

@section("content")
<section class="content prdMonitoring">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 justify-sb mb-4">
            <div class="titleHead">
                <div class="title-28">Production Monitoring</div>
                <div class="title-14-dark mt-2">See production performance from various indicators</div>
            </div>
            <a href="" class="btn-blue no-wrap" data-toggle="modal" data-target="#filter">Filter By<i class="fs-18 ml-2 fas fa-filter"></i></a>
            @include('CommandCenter2.production.monitoring.partials.modal-filter')
        </div>

    </div>
    <div class="row">
        <div class="column-5">
            <a href="{{route('prod.prgs.index')}}">
                <div class="navCard">
                    <div class="icons">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="judul">Progress Output</div>
                    <div class="sub-judul">View average hourly output data</div>
                    <div class="footer">
                        <div class="text">Learn More</div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="column-5">
            <a href="{{route('eff.product.index')}}">
                <div class="navCard">
                    <div class="icons">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="judul">Eff & Productivity</div>
                    <div class="sub-judul">Work efficiency and productivity</div>
                    <div class="footer">
                        <div class="text">Learn More</div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="column-5">
            <a href="{{route('operatorperformance.hourly')}}">
                <div class="navCard">
                    <div class="icons">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <div class="judul">Time Data</div>
                    <div class="sub-judul">Data Daily event indicator</div>
                    <div class="footer">
                        <div class="text">Learn More</div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="column-5">
            <a href="{{route('prod.cm.index')}}">
                <div class="navCard">
                    <div class="icons">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="judul">CM Earning</div>
                    <div class="sub-judul">Revenue target and realization</div>
                    <div class="footer">
                        <div class="text">Learn More</div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="column-5">
            <a href="#">
                <div class="navCard">
                    <div class="icons">
                        <i class="fas fa-chart-area"></i>
                    </div>
                    <div class="judul">Performance</div>
                    <div class="sub-judul">Data Operator performance</div>
                    <div class="footer">
                        <div class="text">Learn More</div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="title-issue">TODAY ISSUE</div>
        </div>
        <div class="col-12 mt-4 mb-5 justify-center">
            <div id="recipeCarousel" class="carousel slide position-static" style="width : 97%" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="number">{{$today_issue['t_downtime']}}</div>
                                <img src="{{url('images/iconpack/production/issue_1.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Downtime Machine</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="warning">
                                    <div class="number-warning">{{$today_issue['t_lost']}}</div>
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <img src="{{url('images/iconpack/production/issue_2.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Lost Time</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="warning">
                                    <div class="number-warning">{{$today_issue['t_overload']}}</div>
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <img src="{{url('images/iconpack/production/issue_3.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Overload</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="number">{{$today_issue['t_coach']}}</div>
                                <img src="{{url('images/iconpack/production/issue_4.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Bantuan Teknis</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="warning">
                                    <div class="number-warning">{{$today_issue['t_problem']}}</div>
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <img src="{{url('images/iconpack/production/issue_5.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Supply Problem</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="number">{{$today_issue['t_rework']}}</div>
                                <img src="{{url('images/iconpack/production/issue_6.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Rework</div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCards">
                            <div class="justify-sb mb-2">
                                <div class="number">{{$today_issue['t_change']}}</div>
                                <img src="{{url('images/iconpack/production/issue_6.svg')}}" width="35px">
                            </div>
                            <div class="txt-total">Hour Total</div>
                            <div class="txt-judul">Change Layout</div>
                        </a>
                    </div>
                </div>
                <a class="carouselPrev" href="#recipeCarousel" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carouselNext" href="#recipeCarousel" role="button" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="navCards" style="padding:1.8rem;border-radius:20px;height:375px">
                <div class="loop owl-carousel owl-theme">
                    @foreach($progress as $key=>$value)
                    <div class="item">
                        <div class="chartContainer">
                            <div class="justify-sb">
                                <div class="chartHeader">
                                    <div class="txt1">{{$value['line']}} {{$value['style']}}</div> 
                                    <div class="txt2">Chart  average hourly <span class="fw-5">output & Productivity</span></div>
                                </div>
                                <div class="badge">{{$value['branch']}}</div>
                            </div>
                            <?php
                                $tanggal_line=[];
                                $average=[];
                                $Productivity=[];
                            ?>
                            @foreach($tanggal as $key2=>$value2)
                                <?php
                                    $collect=collect($data);
                                    $check=$collect->where('fasilitas',$value['branch'])->where('line',$value['line'])
                                            ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->count();
                                    if($check>0){
                                        $a=collect($get_data)->where('tanggal',$value2['tanggal'])->where('line',$value['line'])
                                        ->where('fasilitas',$value['branch'])->where('style',$value['style'])->first();
                                            $sum=collect($get_data)->where('tanggal',$value2['tanggal'])->where('line',$value['line'])
                                            ->where('fasilitas',$value['branch'])
                                            ->where('style',$value['style'])
                                            ->sum('act_line');
                                            $count=collect($get_data)->where('tanggal',$value2['tanggal'])->where('line',$value['line'])
                                            ->where('fasilitas',$value['branch'])->where('style',$value['style'])->count();
                                            $jumlah_op=$op_hadir->where('branchdetail',$value['branch'])->where('line',$value['line'])
                                                ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->first();
                                            $avg=''.$sum/$count/$a['jam_kerja'].'';
                                            if($jumlah_op!=null){
                                                $produktif=round($sum/$count/$jumlah_op['total_operator']);
                                            }
                                            else{
                                                $produktif='0';
                                            }
                                    }
                                    else{
                                        $avg='0';
                                        $produktif='0';

                                    }
                                    $tanggal_line[]=date('d',strtotime($value2['tanggal']));
                                    $average[]=round($avg);
                                    $Productivity[]=$produktif;

                                ?>
                            @endforeach
                            <div class="barContainer">
                                <canvas id="barChartGM1{{$value['id']}}"></canvas>
                                <script>
                                    $( document ).ready(function() {
                                        var barChartGM1 = document.getElementById('barChartGM1{{$value['id']}}').getContext('2d');
                                        var mybarChartGM1 = new Chart(barChartGM1, {
                                            type: 'bar',
                                            data: {
                                                labels: <?php echo json_encode($tanggal_line); ?>,
                                                datasets : [
                                                    {
                                                        label: "avg output hourly",
                                                        data: <?php echo json_encode($average); ?>,
                                                        backgroundColor: '#007bff',
                                                    },
                                                    {
                                                        label: "Productivity",
                                                        data: <?php echo json_encode($Productivity); ?>,
                                                        backgroundColor: '#00db78',
                                                    }
                                                ],
                                            },
                                        
                                            options: {
                                                responsive: true, 
                                                maintainAspectRatio: false,
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true,
                                                            // stepSize: 20,
                                                            // min: 0,
                                                            // max: 100,
                                                        }
                                                    }],
                                                    xAxes: [{
                                                        gridLines: {
                                                            display: false,
                                                        }
                                                    }]
                                                },
                                                legend: {
                                                    display: false
                                                },
                                            }
                                        });
                                    });
                                    
                                </script>   
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="hour">Hour</div>
                <div class="justify-sb mx-3">
                    <div class="date">{{$nama_bulan}}</div>
                    <div class="legend">
                        <div class="justify-center" style="gap:.3rem">
                            <div class="circleBlue"></div>
                            <div class="txt">Avg output hourly</div>
                        </div>
                        <div class="justify-center" style="gap:.3rem">
                            <div class="circleGreen"></div>
                            <div class="txt">Productivity</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="navCards" style="padding:1.8rem;border-radius:20px;height:375px">
                <div class="loop owl-carousel owl-theme">
                @foreach($progress as $key=>$value)
                    <div class="item">
                        <div class="chartContainer">
                            <div class="justify-sb">
                                <div class="chartHeader">
                                    <div class="txt1">{{$value['line']}} {{$value['style']}}</div> 
                                    <div class="txt2">Chart<span class="fw-5"> Efficiency and Effectivity</span></div>
                                </div>
                                <div class="badge">{{$value['branch']}}</div>
                            </div>
                            <?php
                                $tanggal_line=[];
                                $efficien=[];
                                $efektif=[];
                            ?>
                            @foreach($tanggal as $key2=>$value2)
                            <?php
                                $collect=collect($data);
                                $check=$collect->where('fasilitas',$value['branch'])->where('line',$value['line'])
                                        ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->count();
                                if($check>0){
                                    $sum=collect($get_data)->where('tanggal',$value2['tanggal'])->where('line',$value['line'])
                                    ->where('fasilitas',$value['branch'])
                                    ->where('style',$value['style'])
                                    ->sum('act_line');
                                    $count=collect($get_data)->where('tanggal',$value2['tanggal'])->where('line',$value['line'])
                                    ->where('fasilitas',$value['branch'])->where('style',$value['style'])->count();
                                    $jumlah_op=$op_hadir->where('branchdetail',$value['branch'])->where('line',$value['line'])
                                            ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->first();
                                    $nilai_smv=collect($smv)->where('style',$value['style'])->where('fasilitas',$value['branch'])->where('buyer',$value['buyer'])->first();
                                        if($jumlah_op!=null && $nilai_smv!=null){
                                            $average=($sum/$count*$nilai_smv['smv_total']*100)/($jumlah_op['total_operator']*$jumlah_op['waktu_smv']);
                                            $efficien_avg=round($average);
                                            $efektiv_avg=round($sum/$count/$a['jam_kerja']/$nilai_smv['target']*100);
                                        }
                                        elseif($nilai_smv!=null){
                                            $efektiv_avg=round($sum/$count/$a['jam_kerja']/$nilai_smv['target']*100);
                                            $efficien_avg='0';
                                        }
                                        else{
                                            $efficien_avg='0';
                                            $efektiv_avg='0';
                                        }
                                }
                                else{
                                    $efficien_avg='0';
                                    $efektiv_avg='0';

                                }
                                $tanggal_line[]=date('d',strtotime($value2['tanggal']));
                                $efficien[]=$efficien_avg;
                                $efektif[]=$efektiv_avg;
                            ?>
                            @endforeach
                            <div class="barContainer">
                                <canvas id="lineChartGM1{{$value['id']}}"></canvas>  
                                <script>
                                    $( document ).ready(function() {
                                        var lineChartGM1 = document.getElementById('lineChartGM1{{$value['id']}}').getContext('2d');
                                        var mylineChartGM1 = new Chart(lineChartGM1, {
                                            type: 'line',
                                            data: {
                                                labels: <?php echo json_encode($tanggal_line); ?>,
                                                datasets : [
                                                    {
                                                        label: "Effectivity Actual",
                                                        data:  <?php echo json_encode($efektif); ?>,
                                                        borderColor: '#007BFF',
                                                        fill: false,
                                                        borderWidth: 2
                                                    },
                                                    {
                                                        label: "Efficiency Smv",
                                                        data:  <?php echo json_encode($efficien); ?>,
                                                        borderColor: '#FB5B5B',
                                                        fill: false,
                                                        borderWidth: 2
                                                    }
                                                ],
                                            },

                                            options: {
                                                responsive: true, 
                                                maintainAspectRatio: false,
                                                tension: 0.4,
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true,
                                                            // stepSize: 20,
                                                            // min: 0,
                                                            // max: 1000,
                                                            callback: function(value) {
                                                                return value + "%"
                                                            }
                                                        }
                                                    }],
                                                    xAxes: [{
                                                        gridLines: {
                                                            display: false,
                                                        }
                                                    }]
                                                },
                                                legend: {
                                                    display: false
                                                },
                                                elements: {
                                                    point:{
                                                        radius: 0
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>  
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="hour">Percent</div>
                <div class="justify-sb mx-3">
                    <div class="date">{{$nama_bulan}}</div>
                    <div class="legend">
                        <div class="justify-center" style="gap:.3rem">
                            <div class="circleBlue"></div>
                            <div class="txt">Effectivity Actual</div>
                        </div>
                        <div class="justify-center" style="gap:.3rem">
                            <div class="circlePink"></div>
                            <div class="txt">Efficiency Smv</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="navCards" style="padding:1.8rem;border-radius:20px;height:375px">
                <div class="loop owl-carousel owl-theme">
                    @foreach($progress as $key=>$value)
                    <div class="item">
                        <div class="chartContainer">
                            <div class="justify-sb">
                                <div class="chartHeader">
                                    <div class="txt1">{{$value['line']}} {{$value['style']}} / {{$value['id']}}</div> 
                                    <div class="txt2">Chart  average hourly <span class="fw-5">CM Earning</span></div>
                                </div>
                                <div class="badge">{{$value['branch']}}</div>
                            </div>
                            <?php
                                $earning=[];
                                $tanggal_cm=[];
                            ?>
                            @foreach($tanggal as $key2=>$value2)
                                <?php
                                    $collect=collect($cm_earning);
                                    $check=$collect->where('fasilitas',$value['branch'])->where('line',$value['line'])
                                            ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->count();
                                    if($check>0){
                                        $cm=$collect->where('fasilitas',$value['branch'])->where('line',$value['line'])
                                            ->where('style',$value['style'])->where('tanggal',$value2['tanggal'])->first();
                                        $persentase=''.$cm['persentase'].'';    
                                    }
                                    else{
                                        $persentase='0';
                                    }
                                    $earning[]=$persentase;
                                    $tanggal_cm[]=date('d',strtotime($value2['tanggal']));
                                ?>
                            @endforeach
                            <div class="barContainer">
                                <canvas id="singleBarGM1{{$value['id']}}"></canvas> 
                                <script>
                                    $( document ).ready(function() {
                                    var singleBarGM1 = document.getElementById('singleBarGM1{{$value['id']}}').getContext('2d');
                                    var mysingleBarGM1 = new Chart(singleBarGM1, {
                                        type: 'bar',
                                        data: {
                                            labels: <?php echo json_encode($tanggal_cm); ?>,
                                            datasets : [
                                                {
                                                    label: "Persentase cm earning",
                                                    data:  <?php echo json_encode($earning); ?>,
                                                    backgroundColor: '#007bff',
                                                }
                                            ],
                                        },
                                    
                                        options: {
                                            responsive: true, 
                                            maintainAspectRatio: false,
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        // stepSize: 20,
                                                        // min: 0,
                                                        // max: 100,
                                                        callback: function(value) {
                                                            return value + "%"
                                                        }
                                                    }
                                                }],
                                                xAxes: [{
                                                    gridLines: {
                                                        display: false,
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            },
                                        }
                                    });
                                    });
                                </script>   
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="hour">Percent</div>
                <div class="justify-sb mx-3">
                    <div class="date">{{$nama_bulan}}</div>
                    <div class="legend">
                        <div class="justify-center" style="gap:.3rem">
                            <div class="circleBlue"></div>
                            <div class="txt">CM Earning</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="navCards" style="padding:1.8rem;border-radius:20px;height:375px">
                <div class="loop owl-carousel owl-theme">
                @foreach($group_style as $key=>$value)
                    <div class="item">
                        <div class="chartContainer">
                            <div class="justify-sb">
                                <div class="chartHeader">
                                    <div class="txt1">Top 4 Best Oprator Performance</div> 
                                    <div class="txt2"><span class="fw-5">{{$value['buyer']}} {{$value['style']}} / {{$value['id']}}</span></div>
                                </div>
                                <div class="badge">{{$value['fasilitas']}}</div>
                            </div>
                            <div class="col-12 px-3 mt-4">
                                <?php
                                $best_op=collect($daftar_op)->where('fasilitas',$value['fasilitas'])->where('buyer',$value['buyer'])->where('style',$value['style'])->sortByDesc('act_target')->take(4);
                                ?>
                                <table class="table tbl-content headerRadiusBlue">
                                    <thead>
                                        <tr>
                                            <th width="55%">Nama Operator</th>
                                            <th width="15%">TARGET</th>
                                            <th width="15%">AVG</th>
                                            <th width="15%">%TARGET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($best_op as $key1=>$value1)
                                        <tr>
                                            <td>
                                                <div style="max-width:300px">
                                                    <div class="text-truncate">
                                                        {{$value1['nama']}}
                                                    </div> 
                                                </div>
                                            </td>
                                            <td>{{$value1['target']}}</td>
                                            <td>{{$value1['act_target']}}</td>
                                            <td>{{$value1['persentase']}}%</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach




                    
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('/common/js/owl-carousel/owl-carousel.js')}}"></script>
<!-- <script src="{{asset('assets/js/chart.js')}}"></script> -->

<script>
    $(document).ready(function ($) {
        $('.loop').owlCarousel({
            items: 1,
            // autoplay: true,
            autoplayTimeout: 5000,
            // autoWidth: true,
            nav: true,
            loop: true,
            margin: 30,
        });
    });
</script>

<script>
    $('#recipeCarousel').carousel({
        interval: 4000
    })

    $(document).ready( function () {
        const carouselcount = document.getElementsByClassName('carousel-item').length;
        // console.log(carouselcount);

        $('.carousel .carousel-item').each(function(){
            if ( carouselcount < 6 ) {
                var minPerSlide = carouselcount - 2;
            } else {
                var minPerSlide = 4;
            }
            // var minPerSlide = 0;
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    
    });
</script>



<!-- TWO BAR CHART -->
<!-- <script>
    // var barChartGM1 = document.getElementById('barChartGM1').getContext('2d');
    // var mybarChartGM1 = new Chart(barChartGM1, {
    //     type: 'bar',
    //     data: {
    //         labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
    //         datasets : [
    //             {
    //                 label: "avg output hourly",
    //                 data:  [120, 70, 80, 90, 50, 70, 80, 90, 80, 90],
    //                 backgroundColor: '#007bff',
    //             },
    //             {
    //                 label: "Productivity",
    //                 data:  [20, 40, 52, 28, 20, 40, 52, 28, 52, 28],
    //                 backgroundColor: '#00db78',
    //             }
    //         ],
    //     },
    
    //     options: {
    //         responsive: true, 
    //         maintainAspectRatio: false,
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true,
    //                     stepSize: 20,
    //                     // min: 0,
    //                     // max: 100,
    //                 }
    //             }],
    //             xAxes: [{
    //                 gridLines: {
    //                     display: false,
    //                 }
    //             }]
    //         },
    //         legend: {
    //             display: false
    //         },
    //     }
    // });

    var barChartGM2 = document.getElementById('barChartGM2').getContext('2d');
    var mybarChartGM2 = new Chart(barChartGM2, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "avg output hourly",
                    data:  [60, 20, 80, 56, 50, 70, 55, 90, 80, 90],
                    backgroundColor: '#007bff',
                },
                {
                    label: "Productivity",
                    data:  [50, 60, 86, 28, 20, 40, 30, 28, 52, 28],
                    backgroundColor: '#00db78',
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        // min: 0,
                        // max: 100,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });

    var barChartCLN = document.getElementById('barChartCLN').getContext('2d');
    var mybarChartCLN = new Chart(barChartCLN, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            datasets : [
                {
                    label: "avg output hourly",
                    data:  [23, 35, 40, 45, 56, 70, 80, 90, 95, 98, 70, 50],
                    backgroundColor: '#007bff',
                },
                {
                    label: "Productivity",
                    data:  [30, 44, 56, 60, 65, 56, 70, 85, 98, 55, 60, 86],
                    backgroundColor: '#00db78',
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        // min: 0,
                        // max: 100,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script> -->

<!-- TWO LINE CHART -->
<!-- <script>
    var lineChartGM1 = document.getElementById('lineChartGM1').getContext('2d');
    var mylineChartGM1 = new Chart(lineChartGM1, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "Effectivity Actual",
                    data:  [23, 15, 40, 30, 56, 40, 80, 60, 95, 98],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "Efficiency Smv",
                    data:  [50, 30, 55, 60, 25, 40, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });

    var lineChartGM2 = document.getElementById('lineChartGM2').getContext('2d');
    var mylineChartGM2 = new Chart(lineChartGM2, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "Effectivity Actual",
                    data:  [50, 60, 40, 40, 50, 80, 60, 20, 30, 70],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "Efficiency Smv",
                    data:  [50, 30, 70, 20, 15, 54, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });

    var lineChartCLN = document.getElementById('lineChartCLN').getContext('2d');
    var mylineChartCLN = new Chart(lineChartCLN, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "Effectivity Actual",
                    data:  [10, 20, 30, 40, 50, 60, 75, 80, 85, 90],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "Efficiency Smv",
                    data:  [15, 30, 50, 40, 20, 54, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
</script> -->

<!-- SINGLE BAR CHART -->
<!-- <script>
    // var singleBarGM1 = document.getElementById('singleBarGM1').getContext('2d');
    // var mysingleBarGM1 = new Chart(singleBarGM1, {
    //     type: 'bar',
    //     data: {
    //         labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
    //         datasets : [
    //             {
    //                 label: "avg output hourly",
    //                 data:  [98, 70, 80, 90, 50, 70, 80, 90, 80, 90],
    //                 backgroundColor: '#007bff',
    //             }
    //         ],
    //     },
    
    //     options: {
    //         responsive: true, 
    //         maintainAspectRatio: false,
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true,
    //                     stepSize: 20,
    //                     min: 0,
    //                     max: 100,
    //                     callback: function(value) {
    //                         return value + "%"
    //                     }
    //                 }
    //             }],
    //             xAxes: [{
    //                 gridLines: {
    //                     display: false,
    //                 }
    //             }]
    //         },
    //         legend: {
    //             display: false
    //         },
    //     }
    // });

    var singleBarGM2 = document.getElementById('singleBarGM2').getContext('2d');
    var mysingleBarGM2 = new Chart(singleBarGM2, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "avg output hourly",
                    data:  [12, 20, 30, 50, 60, 70, 80, 90, 80, 90],
                    backgroundColor: '#007bff',
                }
            ],
        },
    
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });

    var singleBarCLN = document.getElementById('singleBarCLN').getContext('2d');
    var mysingleBarCLN = new Chart(singleBarCLN, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "avg output hourly",
                    data:  [60, 75, 70, 80, 85, 88, 90, 40, 60, 90],
                    backgroundColor: '#007bff',
                }
            ],
        },
    
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script> -->

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 120000);
    })
</script>

<!-- filter -->
<script>
    
</script>

@endpush