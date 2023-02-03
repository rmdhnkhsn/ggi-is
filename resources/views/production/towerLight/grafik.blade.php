@extends("layouts.app")
@section("title","Production")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
<style>
.btn_abu {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #DBDBDB;
}
.btn_ijo {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #67C965;
}
.label_ijo{
    font-size: 18px;
    color: #67C965;
    text-align:center;
    font-weight:bold;
}
.label_abu{
    font-size: 18px;
    color: #DBDBDB;
    text-align:center;
    font-weight:bold;
}
</style>

@endpush

@push("sidebar")
  @include('production.layouts.navbar')
@endpush

@section("content")
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="container col-12" style="padding-top:20px;">
                <div class="row" style="padding-bottom:30px;">
                  <a href="{{route('prd.grafik')}}" class="col-lg-6 col-6">
                      <div>
                          <div class="label_ijo"> CHART PARAMETER WAKTU SYSTEM SIGNAL TOWER</div>
                          <div class="container btn_ijo"></div>
                      </div>
                  </a>
                  <a href="{{route('prd.grafikBatang')}}" class="col-lg-6 col-6">
                      <div>
                          <div class="label_abu"> CHART  PARAMETER QUANTITY SYSTEM SIGNAL TOWER</div>
                          <div class="container btn_abu"></div>
                      </div>
                  </a>
                </div>
              </div>
                <div class="card-body">
                  <div id="chart">
                      <div id="responsive-chart">

                      </div>

                    </div>

                </div>

            </div>
            
          </div>

        </div>

      </div>
  
    </section>
@endsection

@push("scripts")

<script>
let dataRequest = null;
  console.log("{{ route('prd.grafik.getData')}}") ;
    fetch("{{ route('prd.grafik.getData') }}")
      .then(response => {
        return response.json();
      })
      .then(response => {
        console.log('response', response);
        dateResultResponse = response.dateResult;
        avgAllDataPerLineAndDate = response.avgAllDataPerLineAndDate;
        sumAllDataPerLineAndDate = response.sumAllDataPerLineAndDate;
        console.log('dateResultResponse', dateResultResponse); 
        console.log('avgAllDataPerLineAndDate', avgAllDataPerLineAndDate);
        console.log('sumAllDataPerLineAndDate', sumAllDataPerLineAndDate);
        
          var rowNumber = []
          var dateResult = []
          var totalRequest = []
          var avgResponTime = []
          var avgDeliveryTime = []
          var avgTotalDeliveryTime = []
    
        for (let i = 0; i < avgAllDataPerLineAndDate.length; ++i) {
            console.log(i);
            rowNumber.push(i + 1);
            dateResult.push(dateResultResponse[i]);
            totalRequest.push(sumAllDataPerLineAndDate[i].sumTotalRequest);
            var num = Number(avgAllDataPerLineAndDate[i].avgAvgDeliveryTime);
            var roundedString = num.toFixed(2);
            var rounded = Number(roundedString);

            avgDeliveryTime.push(rounded);        
              
            var num = Number(avgAllDataPerLineAndDate[i].avgAvgResponTime);
            var roundedString = num.toFixed(2);
            var rounded = Number(roundedString);
            avgResponTime.push(rounded);

            var num = Number(avgAllDataPerLineAndDate[i].avgTotalDeliveryTime);
            var roundedString = num.toFixed(2);
            var rounded = Number(roundedString);
            
            avgTotalDeliveryTime.push(rounded);
          
        }
        var options = {
          series: [{
            name: 'Total Delivery Time (Min)',
            type: 'line',
            data: avgTotalDeliveryTime
          }, {
            name: 'Avr Delivery Time',
            type: 'line',
            data: avgDeliveryTime
          }, {
            name: 'Avr Respon Time (Min)',
            type: 'line',
            data: avgResponTime
            }, ],
          chart: {
            width: "90%",
            height: 650,
            type: 'line',
            stacked: false
        },
          chart: {
            width: "90%",
            height: 650,
            type: 'line',
            stacked: false
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            width: [1,3,3,3],
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 2,
            dashArray: 0, 
        },
        
        title: {
            text: 'Chart Parameter Waktu System Signal Tower',
            align: 'center',
            margin: 90,
            offsetX: 0,
            offsetY: 0,
            floating: false,
            style: {
            fontSize:  '25px',
            fontWeight: 'normal',
            fontFamily:  undefined,
            color: '#373d3f',
            shadeTo: 'light',
      }
          },
        xaxis: {
            categories:dateResult,
        },
        
        yaxis: [
        {
          axisTicks: {
            show: true,
          },
          axisBorder: {
            show: true,
            color: '#546E7A'
          },
            axisBorder: {
            show: true,
            color: '#546E7A'
          },
          labels: {
            style: {
            colors: '#008FFB',
            }
          },
          title: {
            text: "Total Waktu Delivery (Min)",
            style: {
            color: '#008FFB',
            }
          },
          tooltip: {
            enabled: true
          }
        },
        {
        seriesName: 'Total Waktu Delivery (Min)',
          opposite: true,
          axisTicks: {
          show: true,
          },
        axisBorder: {
          show: true,
          color: '#00E396'
          },
        labels: {
          style: {
          colors: '#00E396',
          }
        },
        title: {
          text: "Avr Delivery Time",
          style: {
          color: '#00E396',
          }
        },
      },
      {
        seriesName: 'Total Waktu Delivery (Min)',
          opposite: true,
          axisTicks: {
          show: true,
          },
        axisBorder: {
          show: true,
          color: '#FEB019'
        },
          axisBorder: {
          show: true,
          color: '#FEB019'
        },
        
        labels: {
          style: {
          colors: '#FEB019',
          },
        },
          labels: {
          style: {
          colors: '#FEB019',
          },
        },
        title: {
          text: "Total Waktu Delivery (Min)",
          style: {
          color: '#FEB019',
          },
        },
        title: {
          text: "Avr Respon Time (Min)	",
          style: {
          color: '#FEB019',
          }
        }
      },
    ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
          horizontalAlign: 'left',
          offsetX: 40
        }        
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    })
    .catch(error => {
        console.log(error);
    });
</script>
@endpush

