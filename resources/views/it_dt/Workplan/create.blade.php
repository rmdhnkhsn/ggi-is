@extends("layouts.app")
@section("title","Work Plan")

@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.Workplan.layouts.navbar')
@endpush

@section("content")

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="cards p-4">
                    <div class="wp-title-create mb-3">
                        Create New Project
                    </div>
                    <form action="{{route('store.workplan.it')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" class="form-control" id="nama_programmer" name="nama_programmer" value="{{ Auth::user()->nama }}" >
                        <input type="hidden" class="form-control" id="nik_programmer" name="nik_programmer" value="{{ Auth::user()->nik }}" >
                        <input type="hidden" class="form-control" id="kode_branch" name="kode_branch" value="{{ Auth::user()->branch }}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{ Auth::user()->branchdetail }}" >
                        <input type="hidden" class="form-control" id="status_work" name="status_work" value="Up Comming Task" >
                        <div class="row">
                            <div class="col-12">
                                <span class="wp-sub-title">Project Name</span>
                                <!-- <div class="wp-field2 mt-1">
                                    <input type="text" id="" value="" name="" placeholder="Your Project..." required>
                                </div> -->
                                <div class="wp-field mt-1">
                                    <input type="text" id="nama_projek" value="" name="nama_projek" placeholder="Your Project..." required>
                                </div>
                                <span class="wp-required">*Project name is required</span>
                            </div>
                            <div class="col-sm-6">
                                <span class="wp-sub-title">Duration</span>
                                <div class="wp-field mt-1">
                                    <input type="text" name="estimasi_durasi" id="estimasi_durasi" value="" placeholder="Days" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="wp-sub-title">Departement</span>
                                <div class="input-group mb-3 mt-1">
                                    <div class="input-group-prepend">
                                        <span class="wp-input-group-select" for="inputGroupSelect01">Department</span>
                                    </div>
                                    <select class="custom-select select2bs4" id="inputGroupSelect01" name="dept" required>
                                        <option value="" selected>Select Category</option>
                                        @foreach($dept as $key => $value)
                                            <option name="dept" value="{{$key}}">{{$value}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="wp-sub-title">Beneficary</span>
                                <div class="wp-field mt-1">
                                    <input type="text" id="benefit" value="" name="benefit" placeholder="benificiary name...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="wp-sub-title">Category</span>
                                <div class="input-group mb-3 mt-1">
                                    <div class="input-group-prepend">
                                        <span class="wp-input-group-select" for="inputGroupSelect01">Category</span>
                                    </div>
                                    <select class="custom-select select2bs4" id="inputGroupSelect01" name="kategori" required>
                                        <option value="" selected>Select Category</option>
                                        @foreach($kategori as $key => $value)
                                            <option name="kategori" value="{{$key}}" >{{$value}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <span class="wp-sub-title">Remark</span>
                                <div class="wp-message mt-1">
                                    <textarea placeholder="Write Something (Optional)..." name="remark" id="remark" value=""></textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-2 mb-4">
                                <button type="submit" class="btn wp-btn-save">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


            <div class="col-xl-4">
                <div class="row">
                    @if($proses_projek!= null)
                    <div class="col-12 mb-2">
                        <div class="wp-title-onProgress">
                            On Progress
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card-blue p-3">
                            <div class="wp-onProgress-blue">
                                {{$proses_projek->nama_projek}}
                            </div>
                        </div>
                        <div class="card-white p-3">
                            <div class="wp-target-finish">
                                <span class="c-pink">Target Finish :</span> {{$proses_projek->estimasi_tgl_selsai}}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-12 mb-2 mt-4">
                        <div class="wp-title-onProgress">
                            Upcomming Project
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="cards p-3 scrollXY maxh-300" id="scroll-bar">
                            <div class="row">
                                <div class="col-12">
                                  <table class="wp-table title-content2">
                                    <thead>
                                        <tr>
                                            <th width="30%" class="text-left">Dept</th>
                                            <th width="60%" class="text-left">Task</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0;?>
                                        @foreach($upcomming_project as $key=>$value)
                                        <?php $no++;?>
                                        <tr>
                                            <td class="text-left text-truncate" style="max-width: 100px;">
                                                {{$value->dept}}
                                            </td>
                                            <td class="text-left text-truncate" style="max-width: 120px;">
                                                {{$value->nama_projek}}
                                            </td>
                                            <td>
                                                <a href="" class="btn wp-btn-action" data-toggle="modal" data-target="#WPActionUp{{$value->id}}"><i class="fas fa-info"></i></a>
                                                <div class="modal fade" id="WPActionUp{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width:600px">
                                                        <div class="modal-content rounded-10">
                                                            <div class="row">
                                                                <div class="col-12 py-3 px-4">
                                                                    <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                    </button>

                                                                    <table class="wp-table title-content2 text-left">
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">No</td>
                                                                            <td width="55%" class="fw-4">{{$no}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Task</td>
                                                                            <td width="55%" class="fw-4">{{$value->nama_projek}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Estimate Duration </td>
                                                                            <td width="55%" class="fw-4">{{$value->estimasi_durasi}} Day</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Status</td>
                                                                            <td width="55%" class="fw-4">{{$value->status_work}} </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" style="font-weight:600">Departement</td>
                                                                            <td width="60%">{{$value->dept}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" style="font-weight:600">Beneficary</td>
                                                                            <td width="60%">{{$value->benefit}}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
        </div>
    </div>
</section>

@endsection

@push("scripts")

<script>
    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
</script>

@endpush