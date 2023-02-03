@extends("layouts.app")
@section("title","Work Plan")

@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")

<section class="content">
    <div class="container-fluid">
        <div class="row mt-2">
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
                                            Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity
                                        </span>
                                    </div>
                                    <div class="col-12 wp-due-date text-truncate">
                                        <span class="start-date">Start Date : </span>
                                        <span> 01 January 2022</span>
                                        <span class="finish-date">Target Finish : </span>
                                        <span> 03 January 2022</span>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="wp-done-check">
                                <i class="wp-icon-done fas fa-check"></i>
                                <div class="wp-done">
                                    Done
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 ml-auto">
                <div class="card-it h-80 bg-wp-task">
                    <span class="wp-content-task">
                        <b class="fs-34"> 0 </b> of
                        <b class="fs-34"> 0 </b> task
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
                    <div class="wp-accordion__item">
                        <header class="wp-accordion__header">
                            <div class="row px-2">
                                <div class="wp-badge bg-bl">
                                    <span class="wp-count">01</span>
                                </div>
                                <div class="wp-desc-accordion">
                                    <div class="col-12 text-truncate">
                                        Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity
                                    </div>
                                </div>
                                <div class="wp-date-accordion">
                                    <span class="wp-date text-merah">05 January 2021</span>
                                </div>
                                <div class="wp-icon-accordion">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        <div class="wp-accordion__content">
                          <table class="wp-table title-content">
                            <tr>
                                <td width="40%" style="font-weight:600">No</td>
                                <td width="60%">1</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Task</td>
                                <td width="60%">Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Duration (Day)</td>
                                <td width="60%">3</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Start Date</td>
                                <td width="60%">20 January 2022</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Target Finish Date</td>
                                <td width="60%">23 January 2022</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Actualy Finish Date</td>
                                <td width="60%">-</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Status</td>
                                <td width="60%">Up Comming Task</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Departement</td>
                                <td width="60%">Marketing</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Action</td>
                                <td width="60%">
                                    <div class="row">
                                        <div class="col-12 justify-center">
                                            <a href="" class="btn wp-btn-done mr-2">Done<i class="wp-icon-btn fas fa-check"></i></a>
                                            <button type="button" class="btn wp-btn-pending mr-2" data-toggle="modal" data-target="#wp-pending">Pending
                                                <i class="wp-icon-btn fas fa-times"></i>
                                            </button>
                                            <div class="modal fade" id="wp-pending" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                        <div class="row px-4 py-3">
                                                            <div class="col-12">
                                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                    <div class="input-group-append " data-target="#reservationdate" data-toggle="datetimepicker">
                                                                        <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Tanggal</span><i class="ml-2 fas fa-caret-down"></i></div>
                                                                    </div>
                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="masa_berlaku" placeholder="Pilih Tanggal" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row px-4 pb-4">
                                                            <div class="col-12 text-right">
                                                                <a href="" class="btn wp-btn-pending">Pending<i class="wp-icon-btn fas fa-times"></i></a>
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
                    <div class="wp-accordion__item">
                        <header class="wp-accordion__header">
                            <div class="row px-2">
                                <div class="wp-badge bg-yl">
                                    <span class="wp-count">02</span>
                                </div>
                                <div class="wp-desc-accordion">
                                    <div class="col-12 text-truncate">
                                        Membuat MD Worksheet - Menu Measurment Report & Packaging
                                    </div>
                                </div>
                                <div class="wp-date-accordion">
                                    <span class="wp-date text-biru">05 January 2021</span>
                                </div>
                                <div class="wp-icon-accordion">
                                    <i class="fas fa-plus accordion__iconIT"></i>
                                </div>
                            </div>

                        </header>
                        <div class="wp-accordion__content">
                          <table class="wp-table title-content">
                            <tr>
                                <td width="40%" style="font-weight:600">No</td>
                                <td width="60%">1</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Task</td>
                                <td width="60%">Membuat MD Worksheet - Menu Measurment Report & Packaging</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Duration (Day)</td>
                                <td width="60%">3</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Start Date</td>
                                <td width="60%">20 January 2022</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Target Finish Date</td>
                                <td width="60%">23 January 2022</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Actualy Finish Date</td>
                                <td width="60%">-</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Status</td>
                                <td width="60%">Up Comming Task</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Departement</td>
                                <td width="60%">Marketing</td>
                            </tr>
                            <tr>
                                <td width="40%" style="font-weight:600">Action</td>
                                <td width="60%">
                                    <div class="row">
                                        <div class="col-12 justify-center">
                                            <a href="" class="btn wp-btn-start mr-2">Start<i class="wp-icon-btn fas fa-check"></i></a>
                                            <a href="" class="btn wp-btn-pending mr-2">Pending<i class="wp-icon-btn fas fa-times"></i></a>
                                            <a href="" class="btn wp-btn-edit mr-2" data-toggle="modal" data-target="#WPEdit">Edit<i class="wp-icon-btn fas fa-pencil-alt"></i></a>
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
                                        <tr>
                                            <td class="text-left text-truncate" style="max-width: 100px;">
                                                Marketing
                                            </td>
                                            <td class="text-left text-truncate" style="max-width: 120px;">
                                                Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity
                                            </td>
                                            <td>
                                                <a href="" class="btn wp-btn-action" data-toggle="modal" data-target="#WPAction"><i class="fas fa-info"></i></a>
                                                <div class="modal fade" id="WPAction" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width:600px">
                                                        <div class="modal-content rounded-10">
                                                            <div class="row">
                                                                <div class="col-12 py-3 px-4">
                                                                    <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                    </button>

                                                                    <table class="wp-table title-content2 text-left">
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">No</td>
                                                                            <td width="60%" class="fw-4">1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Task</td>
                                                                            <td width="60%" class="fw-4">Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Estimate Duration </td>
                                                                            <td width="60%" class="fw-4">5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Actual Duration</td>
                                                                            <td width="60%" class="fw-4">2 Day 1 Hour 3 Minute</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Pending Status</td>
                                                                            <td width="60%" class="fw-4">Pending 2 Day Ago..</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Start Date</td>
                                                                            <td width="60%" class="fw-4">1 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Pending Date</td>
                                                                            <td width="60%" class="fw-4">2 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Target Finish Date</td>
                                                                            <td width="60%" class="fw-4">5 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Actualy Finish Date</td>
                                                                            <td width="60%" class="fw-4">-</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Status</td>
                                                                            <td width="60%" class="fw-4">Pending</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Departement</td>
                                                                            <td width="60%" class="fw-4">Marketing</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="40%" class="fw-6">Action</td>
                                                                            <td width="60%" class="fw-4">
                                                                                <div class="row">
                                                                                    <div class="col-12 justify-center">
                                                                                        <a href="" class="btn wp-btn-start mr-2">Start<i class="wp-icon-btn fas fa-check"></i></a>
                                                                                        <a href="" class="btn wp-btn-edit mr-2" data-toggle="modal" data-target="#WPEdit">Edit<i class="wp-icon-btn fas fa-pencil-alt"></i></a>
                                                                                    </div>
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
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="wp-title-pending">
                            Project Done
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
                                        <tr>
                                            <td class="text-left text-truncate" style="max-width: 100px;">
                                                Marketing
                                            </td>
                                            <td class="text-left text-truncate" style="max-width: 120px;">
                                                Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity
                                            </td>
                                            <td>
                                                <a href="" class="btn wp-btn-action" data-toggle="modal" data-target="#WPActionDone"><i class="fas fa-info"></i></a>
                                                <div class="modal fade" id="WPActionDone" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                                            <td width="55%" class="fw-4">1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Task</td>
                                                                            <td width="55%" class="fw-4">Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Estimate Duration </td>
                                                                            <td width="55%" class="fw-4">5 Day</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Actual Duration</td>
                                                                            <td width="55%" class="fw-4">2 Day 1 Hour 3 Minute</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Pending Status</td>
                                                                            <td width="55%" class="fw-4">Not Pending  || Pending 1 Days</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Start Date</td>
                                                                            <td width="55%" class="fw-4">1 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Pending Date</td>
                                                                            <td width="55%" class="fw-4">-</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Target Finish Date</td>
                                                                            <td width="55%" class="fw-4">5 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Actualy Finish Date</td>
                                                                            <td width="55%" class="fw-4">5 January 2022</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Status</td>
                                                                            <td width="55%" class="fw-4">Task done</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Departement</td>
                                                                            <td width="55%" class="fw-4">Marketing</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="45%" class="fw-6">Beneficiary</td>
                                                                            <td width="55%" class="fw-4">-</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
</script>

@endpush