@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
@endpush

@section("content")
<section class="content-header">
    </section>

<section class="content">
      <div class="container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-2 col-lg-3" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <center> 
                <strong>{{ $message }}</strong>
                </center>
            </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                    <form action="{{ route('password.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            @include('partials.form-password', ['submit' => 'Save'])
                    </form>
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach 
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
@endsection

@push("scripts")
<script>
    $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#current");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>
<script>
    $(document).on('click', '.toggle-password2', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#new");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>
<script>
    $(document).on('click', '.toggle-password3', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#confrim");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>

@endpush