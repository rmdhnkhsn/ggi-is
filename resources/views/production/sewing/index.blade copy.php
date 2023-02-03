@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">


<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <span class="main-title">Dashboard</span>
                </div>
            </div>
            <div class="row mt-3">
                <div >
                    <form id="upload" name="custForm" action="{{route ('prd.sewing.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-3">
                                <span class="wp-subtitle-modal">file</span>
                                <div class="wp-field-number">
                                    <input type="file"   name="file" id="file"  value="" accept=".xlsx, .xls, .csv" required >
                                </div>
                            </div>
                            </br>
                            <div class="col-12 mt-3">
                                <button type="submit" class=" btn btn-block btn-primary btn-sm" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="factory-date ml-auto">
              <div class="input-group date" id="report_date" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#report_date"
                    data-toggle="datetimepicker">
                    <div class="fa-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Annual</span><i class="ml-2 fas fa-caret-down"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input input-date-fa"
                  data-target="#report_date" placeholder="Select Month" />
              </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>WO</th>
                            <th>Output</th>
                            <th>Total</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=0;?>
                        @foreach ($Qty_Output as $key => $value)
                        <?php $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value['tanggal'] }}</td>
                            <td>{{ $value['wo'] }}</td>
                            <td>{{ $value['output_day'] }}</td>
                            <td>{{ $value['total_output'] }}</td>
                            <td>{{ $value['qty_order'] }}</td>
                        </tr>          
                        @endforeach  
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Output</th>
                            <th>Total</th>
                            <th>Qty</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <input type="hidden" id="month" type="text" value="{{$bulan}}" />

    </section>
    @endsection
    
    @push("scripts")
    <script>
    $(document).ready(function() {
        $('#example1').DataTable(
            {
                "pageLength": 10,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable();
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
    </script>
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('upload').addEventListener('submit', function() {
        showLoading();
    });
    function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }

</script>

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        location.replace("{{ url('prd/sewing/-') }}"+month) 
      }
      filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month)
  });
</script>
    


@endpush