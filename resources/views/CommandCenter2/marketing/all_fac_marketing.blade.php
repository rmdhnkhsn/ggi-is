@extends("layouts.app")
@section("title","Marketing")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush

@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="prc-analytics">Analytics</span>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-6 col-md-6 col-sm-6">
            <div class="cards bg-card">
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>2022 Monthly Order Recap</center></span>
              </div>
              <div class="col-lg-12 col-12 mt-0">
                <div class="card-block">
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-md-6 col-sm-6">
            <div class="cards bg-card">
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>This Month Top 5 Order</center></span>
              </div>
              <div class="col-lg-12 col-12 mt-0">
                <div class="card-block">
                  <canvas id="TopFiveChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-12">
          <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-header">
              <h3 class="card-title">Data Recap</h3>
            </div>
            <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped no-wrap">
                    <thead>
                          <tr>
                              <th>Ex Factory</th>
                              <th>Buyer</th>
                              <th>No PO</th>
                              <th>Contract</th>
                              <th>Originator</th>
                              <th>Article</th>
                              <th>Style</th>
                              <th>Colorway</th>
                              <th>Product Name</th>
                              <th>Standard</th>
                              <th>Nilai</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $i=>$d)
                      <tr>
                          <td>{{$d->ex_fact}}</td>
                          <td>{{$d->buyer}}</td>
                          <td>{{$d->no_po}}</td>
                          <td>{{$d->contract}}</td>
                          <td>{{$d->created_by}}</td>
                          <td>{{$d->article}}</td>
                          <td>{{$d->style}}</td>
                          <td>{{$d->colorway}}</td>
                          <td>{{$d->product_name}}</td>
                          <td>{{$d->standar}}</td>
                          <td><span>&#36;</span> {{number_format($d->nilai,2)}}</td>
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
    </section>
@endsection

@push("scripts")
<script type="text/javascript">
  $(function () {
    var dtable=$("#example1").DataTable({
      "order": [[ 0, "desc" ]]
    });
  });
</script>
<script>
		var barChart = document.getElementById('barChart').getContext('2d');
		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($labelChartYear); ?>,
				datasets : [{
					label: "Amount Overall",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: <?php echo json_encode($dataChartYear); ?>,
				}],
			},
      
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});
</script>
<script>
		var barChart = document.getElementById('TopFiveChart').getContext('2d');
		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($labelChartFive); ?>,
				datasets : [{
					label: "Amount Overall",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: <?php echo json_encode($dataChartFive); ?>,
				}],
			},
      
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});
</script>
@endpush