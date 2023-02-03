@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @include('qc.sample.layouts.stepbar')
                            </div>
                            <div class="card-body WSDetail">
                                @include('qc.sample.report.partials.index_detail')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
