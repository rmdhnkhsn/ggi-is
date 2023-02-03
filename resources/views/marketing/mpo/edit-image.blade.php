@include('marketing.layouts.header')
@include('marketing.layouts.navbar2')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1 mb-3">
                    <a href="{{ route('marketing.masterpo')}}" class="btn btn-block btn-secondary btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-long-arrow-alt-left"></i>   Back</a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Image</h3>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('update-image', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf 
                                        @include('marketing.mpo.partials.form-edit-image',['submit' => 'Update'])
                        </form>  
                        <div class="row">
                            <div class="col-3"> 
                            </div>
                            <div class="col-6"> 
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block mt-2" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <center>    
                                        <strong>{{ $message }}</strong>
                                        </center>
                                    </div>
                                @endif
                            </div>
                            <div class="col-3"> 
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>
<!-- /.Content Wrapper. Contains page content -->
@include('marketing.layouts.footer')