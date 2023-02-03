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
        <div class="row mt-2">
            @if($proses_projek!= null)
            <div class="col-xl-8 col-lg-12">
                <div class="card-it h-80">
                    <div class="row">
                        <div class="col-12 flex">
                            <div class="wp-onProgress">
                                On Progress
                            </div>
                            <div class="wp-work-desc">
                                <div class="row">
                                    <div class="col-12 text-truncate">
                                        <span class="wp-description">
                                            {{$proses_projek->nama_projek}}
                                        </span>
                                    </div>
                                    <div class="col-12 wp-due-date text-truncate">
                                        <span class="start-date">Start Date : </span>
                                        <span> {{$proses_projek->tgl_mulai}}</span>
                                        <span class="finish-date">Target Finish : </span>
                                        <span> {{$proses_projek->estimasi_tgl_selsai}}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="wp-done-check" data-toggle="modal" data-target="#wp-done1{{$proses_projek->id}}">
                                <i class="wp-icon-done fas fa-check"></i>
                                <div class="wp-done">
                                    Done
                                </div>
                            </a>
                            
                            <div class="modal fade" id="wp-done1{{$proses_projek->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                                    <div class="modal-content" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 py-3 px-4">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="wp-modal-title">Completing The Task</div>
                                            </div>
                                        </div>
                                        <form name="form" action="{{route('done.workplan.it')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row px-4 py-3">
                                                <div class="col-12">
                                                    <span class="wp-subtitle-modal">Start Date</span>
                                                    <div class="input-group date mt-1" data-target-input="nearest">
                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_startDone" id="tgl_mulai" name="tgl_mulai" value="{{$proses_projek->tgl_mulai}}"  readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <span class="wp-subtitle-modal">Pending Date</span>
                                                    <div class="input-group date mt-1" data-target-input="nearest">
                                                        <div class="input-group-append" data-target="#wp_pendingDone" data-toggle="datetimepicker">
                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                        </div>
                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_pendingDone" id="tgl_pending" name="tgl_pending" value="{{$proses_projek->tgl_pending}}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <span class="wp-subtitle-modal">Duration (Day)</span>
                                                    <div class="wp-field-number">
                                                        <input type="number" class="px-4" id="estimasi_durasi" name="estimasi_durasi" value="{{$proses_projek->estimasi_durasi}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <span class="wp-subtitle-modal">Estimate Finish Date</span>
                                                    <div class="input-group date mt-1" data-target-input="nearest">
                                                        <div class="input-group-append" data-target="#wp_estimateFDone" data-toggle="datetimepicker">
                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                        </div>
                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_estimateFDone" id="estimasi_tgl_selsai" name="estimasi_tgl_selsai" value="{{$proses_projek->estimasi_tgl_selsai}}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <span class="wp-subtitle-modal">Actual Finish Date</span>
                                                    <div class="input-group date mt-1" id="wp_actualFDone" data-target-input="nearest">
                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_actualFDone" id="aktual_tgl_selesai" name="aktual_tgl_selesai" placeholder="Select Date" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$proses_projek->id}}" >
                                            <input type="hidden" class="form-control" id="status_work" name="status_work" value="Done" >
                                            <input type="hidden" class="form-control" id="nama_projek" name="nama_projek" value="{{$proses_projek->nama_projek}}">
                                            <input type="hidden" class="form-control" id="nama_programmer" name="nama_programmer" value="{{$proses_projek->nama_programmer}}" >
                                            <div class="row px-4 pb-4">
                                                <div class="col-12 text-right">
                                                    <button type="submit" class="btn wp-btn-done">Done<i class="wp-icon-btn fas fa-check"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($proses_projek == null)
            <div class="col-xl-8 col-lg-12">
                <div class="card-it h-80">
                    <div class="row">
                        <div class="col-12 flex">
                            <div class="wp-onProgress">
                                On Progress
                            </div>
                            <div class="wp-work-desc">
                                <div class="row">
                                    <div class="col-12 text-truncate">
                                        <span class="wp-description">
                                        You haven't started the task yet
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <a  class="wp-done-check">
                                <i class="wp-icon-done fas fa-check"></i>
                                <div class="wp-done">
                                    Done
                                </div>
                            </a>
                           
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 ml-auto">
                <div class="card-it h-80 bg-wp-task">
                    <span class="wp-content-task">
                        <b class="fs-34"> {{$count_task['progress']}} </b> of
                        <b class="fs-34"> {{$count_task['task']}} </b> task
                    </span>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 mr-auto">
                <a href="{{route('create.index')}}">
                    <div class="card-it h-80 bg-wp-Newtask">
                        Add New Task
                        <i class="wp-icon-addTask fas fa-plus"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="wp-title">Activity</div>
            </div>
        </div>

        <!-- <div class="wp-no-task-yet">
            <img src="{{url('images/iconpack/no-task-yet.svg')}}"><br>
            <span class="no-task-yet">No Task Yet</span>
        </div> -->

        <div class="row mt-3">
            <div class="col-xl-8">
                <div class="cards p-3">
                    <div class="ytl mb-2">Your Task List</div>
                    <?php $no=0;?>
                    @foreach($list_projek as $key=>$value)
                    <?php $no++;?>

                    @if($value->status_work=='On Going')
                    <div class="wp-accordion__item">
                        <header class="wp-accordion__header">
                            <div class="row px-2">
                                <div class="wp-badge bg-bl">
                                    <span class="wp-count">{{$no}}</span>
                                </div>
                                <div class="wp-desc-accordion">
                                    <div class="col-12 text-truncate">
                                        {{$value->nama_projek}}
                                    </div>
                                </div>
                                <div class="wp-date-accordion">
                                    <span class="wp-date text-merah">{{$value->estimasi_tgl_selsai}}</span>
                                </div>
                                <div class="wp-icon-accordion">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        <div class="wp-accordion__content">
                          <table class="table title-content">
                            <tr>
                                <td width="40%" style="font-weight:600">No</td>
                                <td width="60%">{{$no}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Task</td>
                                <td width="60%">{{$value->nama_projek}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Duration (Day)</td>
                                <td width="60%">{{$value->estimasi_durasi}} Day</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Start Date</td>
                                <td width="60%">{{$value->tgl_mulai}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Target Finish Date</td>
                                <td width="60%">{{$value->estimasi_tgl_selsai}}</td>
                            </tr>
                            @if($value->tgl_pending != null)
                            <tr>
                                <td width="40%" style="font-weight:600">Pending Date</td>
                                <td width="60%">{{$value->tgl_pending}} s/d {{$value->tgl_mulai_pending}} </td>
                            </tr>
                            @endif
                            <!-- <tr>
                                <td width="40%" style="font-weight:600">Actualy Finish Date</td>
                                <td width="60%">{{$value->aktual_tgl_selesai}}</td>
                            </tr> -->
                            <tr>
                                <td width="40%" style="font-weight:600">Status</td>
                                <td width="60%">{{$value->status_work}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Category</td>
                                <td width="60%">{{$value->kategori}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Departement</td>
                                <td width="60%">{{$value->dept}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Beneficary</td>
                                <td width="60%">{{$value->benefit}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Remark</td>
                                <td width="60%">{{$value->remark}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Action</td>
                                <td width="60%">
                                    <div class="row">
                                        <div class="col-12 justify-center">
                                            <button type="button" class="btn wp-btn-done mr-2" data-toggle="modal" data-target="#wp-done{{$value->id}}">Done
                                                <i class="wp-icon-btn fas fa-check"></i>
                                            </button>
                                            <div class="modal fade" id="wp-done{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                                                    <div class="modal-content" style="border-radius:10px">
                                                        <div class="row">
                                                            <div class="col-12 py-3 px-4">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="wp-modal-title">Completing The Task</div>
                                                            </div>
                                                        </div>
                                                        <form name="form" action="{{route('done.workplan.it')}}" method="post" enctype="multipart/form-data">
                                                           @csrf
                                                            <div class="row px-4 py-3">
                                                                <div class="col-12">
                                                                    <span class="wp-subtitle-modal">Start Date</span>
                                                                    <div class="input-group date mt-1"  data-target-input="nearest">
                                                                        <div class="input-group-append">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_startDone" id="tgl_mulai" name="tgl_mulai" value="{{$value->tgl_mulai}}"  readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Pending Date</span>
                                                                    <div class="input-group date mt-1"  data-target-input="nearest">
                                                                        <div class="input-group-append" data-target="#wp_pendingDone" data-toggle="datetimepicker">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_pendingDone" id="tgl_pending" name="tgl_pending" value="{{$value->tgl_pending}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Duration (Day)</span>
                                                                    <div class="wp-field-number">
                                                                        <input type="number" class="px-4" id="estimasi_durasi" name="estimasi_durasi" value="{{$value->estimasi_durasi}}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Estimate Finish Date</span>
                                                                    <div class="input-group date mt-1"  data-target-input="nearest">
                                                                        <div class="input-group-append" data-target="#wp_estimateFDone" data-toggle="datetimepicker">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_estimateFDone" id="estimasi_tgl_selsai" name="estimasi_tgl_selsai" value="{{$value->estimasi_tgl_selsai}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Actual Finish Date</span>
                                                                    <div class="input-group date mt-1" id="wp_actualFDone" data-target-input="nearest">
                                                                        <div class="input-group-append" data-target="#wp_actualFDone" data-toggle="datetimepicker">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_actualFDone" id="aktual_tgl_selesai" name="aktual_tgl_selesai" placeholder="Select Date" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" >
                                                            <input type="hidden" class="form-control" id="status_work" name="status_work" value="Done" >
                                                            <input type="hidden" class="form-control" id="nama_projek" name="nama_projek" value="{{$proses_projek->nama_projek}}" >
                                                            <input type="hidden" class="form-control" id="nama_programmer" name="nama_programmer" value="{{$proses_projek->nama_programmer}}" >
                                                            <div class="row px-4 pb-4">
                                                                <div class="col-12 text-right">
                                                                    <button type="submit" class="btn wp-btn-done">Done<i class="wp-icon-btn fas fa-check"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn wp-btn-pending mr-2" data-toggle="modal" data-target="#wp-pending{{$value->id}}">Pending
                                                <i class="wp-icon-btn fas fa-times"></i>
                                            </button>
                                            <div class="modal fade" id="wp-pending{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                                                    <div class="modal-content" style="border-radius:10px">
                                                        <div class="row">
                                                            <div class="col-12 py-3 px-4">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="wp-modal-title">Pending The Task</div>
                                                            </div>
                                                        </div>
                                                        <form name="form" action="{{route('pending.workplan.it')}}" method="post" enctype="multipart/form-data">
                                                           @csrf
                                                            <div class="row px-4 py-3">
                                                                <div class="col-12">
                                                                    <span class="wp-subtitle-modal">Start Date</span>
                                                                    <div class="input-group date mt-1"  data-target-input="nearest">
                                                                        <div class="input-group-append">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" id="tgl_mulai" name="tgl_mulai" value="{{$value->tgl_mulai}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Pending Date</span>
                                                                    <div class="input-group date mt-1" id="wp_pending" data-target-input="nearest">
                                                                        <div class="input-group-append">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_pending"  id="tgl_pending" name="tgl_pending" placeholder="Select Date" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" >
                                                            <input type="hidden" class="form-control" id="status_work" name="status_work" value="Pending" >
                                                            <div class="row px-4 pb-4">
                                                                <div class="col-12 text-right">
                                                                    <button type="submit" class="btn wp-btn-pending">Pending<i class="wp-icon-btn fas fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          </table>

                        </div>
                    </div>
                    @elseif($value->status_work=='Up Comming Task')
                    <div class="wp-accordion__item">
                        <header class="wp-accordion__header">
                            <div class="row px-2">
                                <div class="wp-badge bg-yl">
                                    <span class="wp-count">{{$no}}</span>
                                </div>
                                <div class="wp-desc-accordion">
                                    <div class="col-12 text-truncate">
                                        {{$value->nama_projek}}
                                    </div>
                                </div>
                                <div class="wp-date-accordion">
                                    <span class="wp-date text-biru">{{$value->estimasi_durasi}} Day</span>
                                </div>
                                <div class="wp-icon-accordion">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        <div class="wp-accordion__content">
                          <table class="table title-content">
                            <tr>
                                <td width="40%" style="font-weight:600">No</td>
                                <td width="60%">{{$no}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Task</td>
                                <td width="60%">{{$value->nama_projek}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Duration (Day)</td>
                                <td width="60%">{{$value->estimasi_durasi}} Day</td>
                            </tr>
                            <!-- <tr>
                                <td width="40%" style="font-weight:600">Start Date</td>
                                <td width="60%">{{$value->tgl_mulai}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Target Finish Date</td>
                                <td width="60%">{{$value->estimasi_tgl_selsai}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Actualy Finish Date</td>
                                <td width="60%">{{$value->aktual_tgl_selesai}}</td>
                            </tr> -->
                            <tr>
                                <td width="40%" style="font-weight:600">Status</td>
                                <td width="60%">{{$value->status_work}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Departement</td>
                                <td width="60%">{{$value->dept}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Category</td>
                                <td width="60%">{{$value->kategori}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Beneficary</td>
                                <td width="60%">{{$value->benefit}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Remark</td>
                                <td width="60%">{{$value->remark}}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Action</td>
                                <td width="60%">
                                    <div class="row">
                                        <div class="col-12 justify-center">
                                            <button type="button" class="btn wp-btn-start mr-2" data-toggle="modal" data-target="#wp-start{{$value->id}}">Start
                                                <i class="wp-icon-btn fas fa-check"></i>
                                            </button>
                                            <div class="modal fade" id="wp-start{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                                                    <div class="modal-content" style="border-radius:10px">
                                                        <div class="row">
                                                            <div class="col-12 py-3 px-4">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="wp-modal-title">Let's Start the Task</div>
                                                            </div>
                                                        </div>
                                                        <form name="form" action="{{route('start.workplan.it')}}" method="post" enctype="multipart/form-data">
                                                           @csrf
                                                            <div class="row px-4 py-3">
                                                            
                                                                <div class="col-12">
                                                                    <span class="wp-subtitle-modal">Start Date</span>
                                                                    <div class="input-group date mt-1" id="wp_startS" data-target-input="nearest">
                                                                        <div class="input-group-append">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_startS" id="tgl_mulai{{$value['id']}}" name="tgl_mulai" placeholder="Select Date" required onchange="estimasi{{$value['id']}}();"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Duration (Day)</span>
                                                                    <div class="wp-field-number">
                                                                        <input type="number" class="px-4" name="estimasi_durasi" id="estimasi_durasi{{$value['id']}}" disabled value="{{$value->estimasi_durasi}}" placeholder="Days" onchange="estimasi{{$value['id']}}();">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Remark</span>
                                                                    <div class="input-group-prepend">
                                                                        <span class="wp-input-group-remark" for="libur">Remark</span>
                                                                        <select required class="custom-select select2bs4" name="libur" id="libur{{$value['id']}}" onchange="estimasi{{$value['id']}}();" >
                                                                            <option disabled selected>Select Remark</option>
                                                                            <option value="0">Weekday</option>
                                                                            <option value="2">Weekend</option>
                                                                            <option value="1">Holiday</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Estimate Finish Date</span>
                                                                    <div class="input-group date mt-1" id="wp_estimateFS" data-target-input="nearest">
                                                                        <div class="input-group-append">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="date" class="form-control datetimepicker-input input-date-wp"  data-target="#wp_estimateFS"  id="estimasi_tgl_selsai{{$value['id']}}" name="estimasi_tgl_selsai" onchange="estimasi{{$value['id']}}();" required />
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-12 mt-3">
                                                                    <span class="wp-subtitle-modal">Remark</span>
                                                                    <div class="input-group date mt-1" id="wp_remark" data-target-input="nearest">
                                                                        <div class="input-group-append" data-target="#wp_remark" data-toggle="datetimepicker">
                                                                            <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                        </div>
                                                                        <input type="text" class="form-control datetimepicker-input input-date-wp" data-target="#wp_remark"  id="estimasi_tgl_selsai" name="estimasi_tgl_selsai" onchange="estimasi();" readonly />
                                                                    </div>
                                                                </div> -->
                                                                
                                                            </div>
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$value->id}}" required>
                                                            <input type="hidden" class="form-control" id="status_work" name="status_work" value="On Going" required>
                                                            <div class="row px-4 pb-4">
                                                                <div class="col-12 text-right">
                                                                    <button type="submit" class="btn wp-btn-start">Start<i class="wp-icon-btn fas fa-check"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <script>
                                                    function estimasi{{$value['id']}}() {
                                                        var start= document.getElementById('tgl_mulai{{$value['id']}}').value;
                                                        var durasi= document.getElementById('estimasi_durasi{{$value['id']}}').value;
                                                        var libur= document.getElementById('libur{{$value['id']}}').value;
                                                        var a= parseInt(durasi)+parseInt(libur);
                                                        var msec = Date.parse(start);
                                                        var d = new Date(msec);
                                                        var hariKedepan = new Date(d.getTime()+(a*24*60*60*1000)); 
                                                        var result = hariKedepan.toISOString().slice(0, 10);
                                                        
                                                            document.getElementById('estimasi_tgl_selsai{{$value['id']}}').value = result;
                                                        
                                                        }
                                                </script>
                                            </div>
                                            <!-- <a href="" class="btn wp-btn-pending mr-2">Pending<i class="wp-icon-btn fas fa-times"></i></a> -->
                                            <a href="{{route ('edit.workplan.it', $value->id)}}" class="btn wp-btn-edit mr-2" >Edit<i class="wp-icon-btn fas fa-pencil-alt"></i></a>
                                            
                                            <!-- Modal proses -->
                                            <div class="modal fade" id="WPEdit" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content rounded-10">
                                                        <div class="row">
                                                            <div class="col-12 justify-sb py-3 px-4">
                                                                <span class="f-18">Edit Your Task</span>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          </table>

                        </div>
                    </div>
                    @endif

                    
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wp-title-pending">
                            Pending Project
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
                                        @foreach($pending_project as $key=>$value)
                                        <?php $no++;?>
                                        <tr>
                                            <td class="text-left text-truncate" style="max-width: 100px;">
                                            {{$value['dept']}}
                                            </td>
                                            <td class="text-left text-truncate" style="max-width: 120px;">
                                            {{$value['nama_projek']}}
                                            </td>
                                            <td>
                                                <a href="" class="btn wp-btn-action" data-toggle="modal" data-target="#WPAction{{$value['id']}}"><i class="fas fa-info"></i></a>
                                                <div class="modal fade" id="WPAction{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width:600px">
                                                        <div class="modal-content rounded-10">
                                                            <div class="row">
                                                                <div class="col-12 py-3 px-4">
                                                                    <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                    </button>

                                                                    <table class="table title-content2 text-left">
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">No</td>
                                                                            <td width="60%" class="fw-4">{{$no}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Task</td>
                                                                            <td width="60%" class="fw-4">{{$value['nama_projek']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Estimate Duration </td>
                                                                            <td width="60%" class="fw-4">{{$value['estimasi_durasi']}} Day</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Pending Status</td>
                                                                            <td width="60%" class="fw-4">Pending {{$value['durasi_pending']}} Day Ago..</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Start Date</td>
                                                                            <td width="60%" class="fw-4">{{$value['tgl_mulai']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Pending Date</td>
                                                                            <td width="60%" class="fw-4">{{$value['tgl_pending']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Target Finish Date</td>
                                                                            <td width="60%" class="fw-4">{{$value['estimasi_tgl_selsai']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Status</td>
                                                                            <td width="60%" class="fw-4">{{$value['status_work']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Departement</td>
                                                                            <td width="60%" class="fw-4">{{$value['dept']}}</td>
                                                                        </tr>
                                                                            <td width="40%" class="fw-6">Category</td>
                                                                            <td width="60%" class="fw-4">{{$value['kategori']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" style="font-weight:600">Beneficary</td>
                                                                            <td width="60%">{{$value['benefit']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" style="font-weight:600">Remark</td>
                                                                            <td width="60%">{{$value['remark']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Action</td>
                                                                            <td width="60%" class="fw-4">
                                                                                <div class="row">
                                                                                    <button type="button" class="btn wp-btn-start mr-2" data-toggle="modal" data-target="#wp-start2{{$value['id']}}">Start
                                                                                        <i class="wp-icon-btn fas fa-check"></i>
                                                                                    </button>
                                                                                    <div class="modal fade" id="wp-start2{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                                                                                            <div class="modal-content" style="border-radius:10px">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 py-3 px-4">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                    <div class="wp-modal-title">Let's Start the Task</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <form name="form" action="{{route('start.workplan.it')}}" method="post" enctype="multipart/form-data">
                                                                                                    @csrf
                                                                                                    <div class="row px-4 py-3" >
                                                                                                        <div class="col-12 mt-3">
                                                                                                            <span class="wp-subtitle-modal">Start Date</span>
                                                                                                            <div class="input-group date mt-1 datebutton" id="wp_pending_start" data-target-input="nearest">
                                                                                                                <div class="input-group-append">
                                                                                                                    <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Date</span></div>
                                                                                                                </div>
                                                                                                                <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#wp_pending_start" id="tgl_mulai_pending" name="tgl_mulai_pending" placeholder="Select Date" required/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}" required>
                                                                                                    <input type="hidden" class="form-control" id="status_work" name="status_work" value="On Going" required>
                                                                                                    <input type="hidden" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{$value['tgl_mulai']}}">
                                                                                                    <input type="hidden" class="form-control" id="id" name="estimasi_tgl_selsai" value="{{$value['estimasi_tgl_selsai']}}">
                                                                                                    <div class="row px-4 pb-4">
                                                                                                        <div class="col-12 text-right">
                                                                                                        <button type="submit" class="btn wp-btn-start">Start<i class="wp-icon-btn fas fa-check"></i></button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                        <a href="{{route ('edit.workplan.it', $value['id'])}}" class="btn wp-btn-edit mr-2">Edit<i class="wp-icon-btn fas fa-pencil-alt"></i></a>
                                                                                </div>
                                                                            </td>
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
                    <div class="col-12">
                        <div class="wp-title-pending">Project Done</div>
                    </div>
                    <div class="col-12">
                        <div class="cards p-3">
                            <div class="cards-scroll pr-1 scrollY" id="scroll-bar" style="max-height:310px">
                                <table class="wp-table title-content2">
                                    <thead class="stickyHeader2">
                                        <tr>
                                            <th width="30%" class="text-left">Dept</th>
                                            <th width="60%" class="text-left">Task</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0;?>
                                        @foreach($project_done as $key=>$value)
                                        <?php $no++;?>
                                        <tr>
                                            <td class="text-left text-truncate" style="max-width: 100px;">
                                                {{$value['dept']}}
                                            </td>
                                            <td class="text-left text-truncate" style="max-width: 120px;">
                                            {{$value['nama_projek']}}
                                            </td>
                                            <td>
                                                <a href="" class="btn wp-btn-action" data-toggle="modal" data-target="#WPActionDone{{$value['id']}}"><i class="fas fa-info"></i></a>
                                                <div class="modal fade" id="WPActionDone{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                                            <td width="55%" class="fw-4">{{$value['nama_projek']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Estimate Duration </td>
                                                                            <td width="55%" class="fw-4">{{$value['estimasi_durasi']}} Day</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Actual Duration</td>
                                                                            <td width="55%" class="fw-4">{{$value['durasi']}} Day</td>
                                                                        </tr>
                                                                        @if($value['tgl_pending']==null)
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Pending Status</td>
                                                                            <td width="55%" class="fw-4">Not Pending</td>
                                                                        </tr>
                                                                        @elseif($value['tgl_pending']!=null)
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Pending Status</td>
                                                                            <td width="55%" class="fw-4">Pending {{$value['durasi_pending']}} Days</td>
                                                                        </tr>
                                                                        @endif
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Start Date</td>
                                                                            <td width="55%" class="fw-4">{{$value['tgl_mulai']}}</td>
                                                                        </tr>
                                                                        @if($value['tgl_pending']!=null)
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Pending Date</td>
                                                                            <td width="55%" class="fw-4">{{$value['tgl_pending']}} s/d {{$value['tgl_mulai_pending']}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Target Finish Date</td>
                                                                            <td width="55%" class="fw-4">{{$value['estimasi_tgl_selsai']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Actualy Finish Date</td>
                                                                            <td width="55%" class="fw-4">{{$value['aktual_tgl_selesai']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Status</td>
                                                                            <td width="55%" class="fw-4">{{$value['status_work']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Departement</td>
                                                                            <td width="55%" class="fw-4">{{$value['dept']}}</td>
                                                                        </tr>
                                                                        </tr>
                                                                            <td width="40%" class="fw-6">Category</td>
                                                                            <td width="60%" class="fw-4">{{$value['kategori']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Beneficiary</td>
                                                                            <td width="55%" class="fw-4">{{$value['benefit']}}</td>
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
</section>

@endsection

@push("scripts")

<script>

    $('#wp_startS').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_estimateFS').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_remark').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });


    // $('#wp_pendingDone').datetimepicker({
    //     format: 'Y-MM-DD',
    //     showButtonPanel: true
    // });
    $('#wp_actualFDone').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    // $('#wp_estimateFDone').datetimepicker({
    //     format: 'Y-MM-DD',
    //     showButtonPanel: true
    // });

    $('#wp_start').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_pending').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $('#wp_pending_start').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
</script>


<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.wp-accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.wp-accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.wp-accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

<script>
    $('#wp_startS').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_estimateFS').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_remark').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $('#wp_startDone').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_pendingDone').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_actualFDone').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_estimateFDone').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $('#wp_start').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#wp_pending').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
</script>

@endpush