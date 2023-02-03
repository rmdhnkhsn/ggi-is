@extends("layouts.app")
@section("title","Notification Detail")
@push("styles")
  <!-- <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
@endpush

@section("content")
<section class="content">
      <div class="container-fluid">
      <!-- <div class="row">
        <div class="col-12">
          <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-header">
              <h3 class="card-title">Filter</h3>
            </div>

            <div class="card-body">
              <form class="form-inline" action="{{route('cpurchasing.po_delayed_detail')}}" method="get" name="frmFilter" id="frmFilter" enctype="multipart/form-data">
                  <div class="form-group row ml-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Originator</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control ml-3" name="originator" id="originator" value="{{is_null(Request::get('originator')) ?'':Request::get('originator')}}" placeholder="Originator">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Find</button>
              </form>
            </div>

          </div>
        </div>
      </div> -->

      <div class="row">
        <div class="col-12">
          <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-header">
              <h3 class="card-title">All Notification</h3>
            </div>
            <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped no-wrap">
                    <thead>
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Level</th>
                          <th>Read</th>
                          <th>Approve</th>
                          <th>Disapprove</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $i=>$d)
                      <tr>
                          <td>{{$d->title}}</td>
                          <td>
                            <a href="{{route('notif.update', ['id'=>$d->id,'approve_act'=>-1])}}">
                              {{$d->desc}}
                            </a>
                          </td>
                          <td>
                            @if($d->alert_level=='DANGER')
                              <span class="badge badge-danger">Danger</span>
                            @elseif($d->alert_level=='SUCCESS')
                              <span class="badge badge-success">Success</span>
                            @elseif($d->alert_level=='WARNING')
                              <span class="badge badge-warning">Warning</span>
                            @else 
                              <span class="badge badge-info">Info</span>
                            @endif
                          </td>
                          <td>
                            @if($d->is_read==1)
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                              </svg>
                            @endif
                          </td>
                          <td>
                            @if($d->is_approval==1)
                              <a href="{{$d->url_approve}}">
                                <span class="badge badge-success">Approve</span>
                              </a>
                            @endif
                          </td>
                          <td>
                            @if($d->is_approval==1)
                              <a href="{{$d->url_reject}}">
                                <span class="badge badge-danger">Disapprove</span>
                              </a>
                            @endif
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <!-- <tfoot>
                          <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                    </tfoot> -->
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

    // $('#originator').on( 'keyup', function () {
    //   dtable.search( this.value ).draw();
    // } );

    // var table = $('#example1').DataTable({
    //     "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
    //     scrollCollapse: true,
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('cpurchasing.po_delayed_detail') }}",
    //     columns: [
    //         {data: 'po_number', name: 'po_number'},
    //         {data: 'f4311_torg', name: 'f4311_torg'},
    //         {data: 'tipe', name: 'tipe'},
    //         {data: 'f4311_lnid', name: 'f4311_lnid'},
    //         {data: 'f4311_itm', name: 'f4311_itm'},
    //         {data: 'f4311_dsc1', name: 'f4311_dsc1'},
    //         {data: 'f4311_uorg', name: 'f4311_uorg'},

    //         {data: 'f4311_uopn', name: 'f4311_uopn'},
    //         {data: 'f4311_lttr', name: 'f4311_lttr'},
    //         {data: 'f4311_nxtr', name: 'f4311_nxtr'},
    //         {data: 'date_promise', name: 'date_promise'},
    //         {data: 'date_today', name: 'date_today'},
    //         {data: 'days', name: 'days'}
    //     ]
    // });
  });

  // $(document).ready(function() {

  //   // Setup - add a text input to each footer cell
  //   $('#example1 tfoot th').each( function () {
  //       var title = $('#example1 thead th').eq( $(this).index() ).text();
  //       $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  //   });
 
  //   // DataTable
  //   var table = $('#example1').DataTable();
 
  //   // Apply the search
  //   table.columns().every( function () {
  //       var that = this;
 
  //       $( 'input', this.footer() ).on( 'keyup change', function () {
  //           that
  //               .search( this.value )
  //               .draw();
  //       });
  //   });
  // });

</script>
<script>
  // $(function () {
  //   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
  //     event.preventDefault();
  //     $(this).ekkoLightbox({
  //       alwaysShowClose: true
  //     });
  //   });

  //   // $('.filter-container').filterizr({gutterPixels: 3});
  //   $('.btn[data-filter]').on('click', function() {
  //     $('.btn[data-filter]').removeClass('active');
  //     $(this).addClass('active');
  //   });
  // })
</script>
@endpush