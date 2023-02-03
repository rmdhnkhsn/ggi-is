@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<style>
    .div1 {
        border: 1px solid black;
        text-align:center;
    }
    .div2 {
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black
    }
    .title {
        font-size:15px;
        text-align:left;
    }

    .data {
        font-size:15px;
        text-align:left;
    }
</style>
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
                        <div class="card-body">
                            <div class="container div1">
                                <div class="container">
                                    <h5>SAMPLE QUALITY REPORT</h5>
                                    <h5>PT GISTEX GARMENT</h5>
                                </div>
                            </div>
                            <div class="container div2">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-3 col-2 title">
                                                BUYER 
                                            </div>
                                            <div class="col-lg-1 col-1 title">
                                                :
                                            </div>
                                            <div class="col-lg-8 col-4 data">
                                                {{$data->buyer}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-3 col-2 title">
                                                STYLE
                                            </div>
                                            <div class="col-lg-1 col-1 title">
                                                :
                                            </div>
                                            <div class="col-lg-8 col-4 data">
                                                {{$data->style}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-4 col-2 title">
                                                STATUS 
                                            </div>
                                            <div class="col-lg-1 col-1 title">
                                                :
                                            </div>
                                            <div class="col-lg-7 col-6 data">
                                                {{$data->status}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-3 col-2 title">
                                                DATE :
                                            </div>
                                            <div class="col-lg-1 col-1 title">
                                                :
                                            </div>
                                            <div class="col-lg-8 col-4 data">
                                                {{$data->date}}
                                            </div>
                                        </div>
                                    </div>
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
@include('qc.sample.layouts.footer')
