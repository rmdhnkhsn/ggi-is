@include('marketing.trimcard.layouts.header')
@include('marketing.trimcard.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">NO WO - {{$dataWo->F4801_DOCO}}</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('trimcard.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                      @include('marketing.trimcard.partials.form-manage', ['submit' => 'Save'])
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('marketing.trimcard.layouts.footer')