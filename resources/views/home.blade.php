@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content homeV2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="#" class="btn-quick-access">Quick Access<i class="fab fa-searchengin"></i></a>
        <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100 p-3">
          <div class="headerCanvas">
            <div class="title-20-dark-blue">Quick Access</div>
            <button type="button" class="bs-canvas-close" aria-label="Close"><i class="fas fa-times"></i></button>
          </div>
          <div class="borderlight2 mt-1 mb-3"></div>
          <div class="contentCanvas">
            <div class="relative">
              <input type="text" class="form-control borderInput" id="filter" placeholder="Search Module" />
              <i class="srch fas fa-search"></i>
            </div>
            <div class="cards-scroll mt-3 scrollY mh-70vh" id="scroll-bar-sm">
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '110067' || auth()->user()->nik == '332100286' || auth()->user()->nik == '92200244')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">IT & DT</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=it')}}">Ticketing</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '110067' || auth()->user()->nik == '332100286' || auth()->user()->nik == '92200244')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('workplan.index')}}">Workplan</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rating.index')}}">Rating Program</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('framework.index')}}">Framework</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rpa.index')}}">RPA</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_SPV' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_DEPT' || auth()->user()->role == 'QCS_SPV')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Quality Control</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_SPV')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rework.index')}}">QC Rework</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_DEPT' || auth()->user()->role == 'QCS_SPV')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample.index')}}">QC Sample</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qc-cutting')}}">QC Cutting</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qa.inline.index')}}">Quality Assurance</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rgarment.index')}}">Reject Garment</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('RejectCutting.dashboard')}}">Reject Cutting</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == "SMQC_USER")
                <li><i class="fas fa-folder-open"></i><a href="{{ route('smqc.index')}}">SMQC</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Approval Manager</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('cc.approval') }}">Overtime Approval</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="#">Permit Approval</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('request-approval-acc')}}">Cash Request Approval</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->nik == '210009' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022' || auth()->user()->role == 'PPIC_PLANNER')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Marketing</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rekap.dashboard')}}">Rekap Order</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('trimcard.dashboard')}}">Trim Card</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qrcode.index')}}">QR Code Sample</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('worksheet.index')}}">Worksheet</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->nik == '210009' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample.room.index')}}">Sample Request</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->departemensubsub == 'MANAGEMENT' || auth()->user()->nik == 'GISCA' || auth()->user()->departemensubsub == 'RECRUITMENT' || auth()->user()->role == 'ADMIN_HRD' || auth()->user()->role == 'PETUGAS_APAR' || auth()->user()->nik == '300047')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">HR & GA</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD'|| auth()->user()->role == 'PETUGAS_APAR'|| auth()->user()->nik == '300047')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('hrga.index_auditbuyer')}}">Safety Compliance</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=hr')}}">Ticketing</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->departemensubsub == 'RECRUITMENT')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('employee-tracking')}}">Job Vacancy</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN') 
                <li><i class="fas fa-folder-open"></i><a href="{{ route('question.draft')}}">Orientation Question</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN') 
                <li><i class="fas fa-folder-open"></i><a href="{{ route('to-index')}}">Daily Turn Over</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rekap-index')}}">Abscence Recap</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->jabatan == 'MANAGER'|| auth()->user()->departemensubsub == 'MANAGEMENT'||auth()->user()->nik == 'GISCA')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('absen-index')}}">Daily Abscence</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('permit.request.pengajuan')}}">Permit Request</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('report.permit.request')}}">Report Permit Request</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Purchasing</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('vendorportal.index')}}">Vendor Portal</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PURCHASING')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('savingCost.dashboard')}}">Saving Cost</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('requestIR.index')}}">Request Issue IR</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT') 
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Internal Audit</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('audit.index')}}">Uji True/False</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('icr.tarikan.index')}}">Tarik Data</a></li>
              </ul> 
              @endif
              <ul class="liveSearchBar">
                  <li><div class="title-16-dark-blue mb-2">GGI INDAH</div></li>
                  <li><i class="fas fa-folder-open"></i><a href="{{ route('indah.index')}}">Social Credit Score</a></li>
                  <li><i class="fas fa-folder-open"></i><a href="{{ route('temuan.index')}}">Task For Findings</a></li>
              </ul> 
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Warehouse</div></li>
                <li><i class="fas fa-folder-open"></i><a href="#">Warehouse Mechanic</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-expedition') }}">Warehouse Expedition</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-material') }}">Warehouse Material</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI' )
                <li><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('Warehouse.requestIR.index')}}">Request Issue IR</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'KABAG'||auth()->user()->jabatan == 'MANAGER' || auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA' || auth()->user()->branch == 'GK')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">More Program</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('gistube-leaderboard') }}">Gistube</a></li>
                <li><i class="fas fa-folder-open"></i><a href="#">Assignment & Appointment</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('overtime-request') }}">Overtime Request</a></li>
                @if(auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA' || auth()->user()->branch == 'GK')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('job.index') }}">Job Orientation</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'KABAG'||auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('traffic-index') }}">GCC Traffic</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rating.index') }}">User Feedback</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('barcode.security.index') }}">Barcode Security</a></li>
                @endif
              </ul> 
              @endif
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Production</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.index')}}">Tower Light</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('cutting.dashboard')}}">Cutting</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.sewing.index')}}">Sewing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('finishing.index')}}">Finishing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('operatorperformance.index')}}">Operator Performance</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('databasesmv.index')}}">Database SMV</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('capabilityline.index')}}">Capability Line</a></li>
                @if(str_contains(auth()->user()->departemensubsub,'MEKANIK') || auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('asset.dashboard.index')}}">Asset Management</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.prdstatus.index')}}">Production Status</a></li>
              </ul> 
              @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Acc & Finance</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactory.index')}}">Cost Factory</a></li>
                @endif  
                <li><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactoryrpt.index')}}">Cost Factory Report</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=acc')}}">Ticketing</a></li>
                @endif  
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('acc.budget.monitoring')}}">Blocking Budget</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' ||  auth()->user()->nik == 'GC110085'||  auth()->user()->nik == '300009'||  auth()->user()->nik == '380133')
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Sample Room</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample-request') }}">Status Sample</a></li>
              </ul>
              @endif
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">Mat & Document</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PPIC'|| auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'INTERNAL CONTROL' || auth()->user()->nik == 'GISCA')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('subkon.index')}}">Monitoring Subkon</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('partial.index')}}">Partial 262</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=doc')}}">Ticketing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('contractwo.index')}}">Contract WO</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('invoice.index')}}">Invoice</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('documentStorage.in')}}">Document Storage</a></li>
                @endif
              </ul> 
              <ul class="liveSearchBar">
                <li><div class="title-16-dark-blue mb-2">PPIC</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('form_return.index')}}">Master Form Return</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.schedule.index')}}">Production Schedule</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.standard.cost.index')}}">Standard Cost WO</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.issue_mr.index')}}">Request Issue MR</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row pdt">
      <div class="col-lg-9">
        <div class="row">
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->comcen == 'TRUE')
          <a href="{{ route('commandCenter2')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-cc">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Command Center</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">12 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('it_dt.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-it">
                    <i class="fas fa-desktop"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">IT & DT</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">6 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' ||
          auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || 
          auth()->user()->role == 'QCR_SPV' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'SMQC_USER' ||
          auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_SPV' || auth()->user()->role == 'QCR_DEPT' || auth()->user()->nik == '340552')
          <a href="{{ route('qc.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-qc">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Quality Control</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">11 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('approval-home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-approval">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Approval Manager</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">3 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' ||
          auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PPIC'||  auth()->user()->role == 'ADMIN_SAMPLE'|| auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022')
          <a href="{{ route('marketing.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-mkt">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Marketing</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">5 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('hrga.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-hr">
                    <i class="fas fa-users"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">HR & GA</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">9 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          <a href="{{ route('purchasing.dashboard')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-prc">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Purchasing</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">3 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT')
          <a href="{{ route('icr.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-ia">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Internal Audit</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">2 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('indah.temuan')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-ggi">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">GGI INDAH</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">1 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @if(str_contains(auth()->user()->departemensubsub,'WAREHOUSE')||auth()->user()->departemensubsub == 'EXIM'||auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemensubsub == 'EXPEDISI'|| auth()->user()->nik == 'GK20000249'|| auth()->user()->nik == '930232'|| auth()->user()->nik == '200300'|| auth()->user()->nik == 'CGA000065'|| auth()->user()->nik == '950071'|| auth()->user()->nik == 'GK20000214' || auth()->user()->nik == 'GISCA' || auth()->user()->departemen == 'PRODUCTION'|| auth()->user()->nik == 'GC110082'|| auth()->user()->nik == '380249')
          <a href="{{ route('warehouse-home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-wh">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Warehouse</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">5 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('mp-home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-mrp">
                    <i class="fas fa-angle-double-right"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">More Program</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">5 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          <a href="{{ route('prd.home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-prd">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Production</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">9 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          <a href="{{ route('acc_fin.home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-acc">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Acc & Finance</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">4 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          <!-- @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER') -->
          <!-- @endif -->
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{ route('sample-home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-slr">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Sample Room</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">1 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PPIC'|| 
          auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT' || 
          auth()->user()->departemensubsub == 'INTERNAL CONTROL'|| auth()->user()->nik == 'GISCA'||
          auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->nik == '980317' || auth()->user()->nik == '92200106')
          <a href="{{ route('matdoc-home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-prd">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Mat & Documents</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">7 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ route('form_return.home')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-ppic">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">PPIC</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">4 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{ route('error404') }}" class="col-lg-3 col-md-4 col-sm-6">
          <!-- <a href="{{ route('error401') }}" class="col-lg-3 col-md-4 col-sm-6"> -->
          <!-- <a href="{{ route('error419') }}" class="col-lg-3 col-md-4 col-sm-6"> -->
          <!-- <a href="{{ route('error500') }}" class="col-lg-3 col-md-4 col-sm-6"> -->
            <div class="cardHome pd hover">
              <div class="contentIcon bg-err">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <div class="textDept">
                <div class="text-11">Department</div>
                <div class="text-14">Error Code</div>
              </div>
              <div class="bottomLane">
                <div class="text-module">4 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{ route('admin.index')}}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-prd">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Sys Admin</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">4 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
          @endif
          <a href="{{ url('password') }}" class="col-lg-3 col-md-4 col-sm-6">
            <div class="cardHome pd hover">
                <div class="contentIcon bg-prd">
                    <i class="fas fa-user-lock"></i>
                </div>
                <div class="textDept">
                    <div class="text-11">Department</div>
                    <div class="text-14">Change Password</div>
                </div>
              <div class="bottomLane">
                <div class="text-module">1 Module</div>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="cardHome QuickAccess">
          <div class="headerQuick">
            <div class="title-20-dark-blue">Quick Access</div>
            <div class="relative mt-2">
              <input type="text" class="form-control borderInput" id="filter2" placeholder="Search Module" />
              <i class="srch fas fa-search"></i>
            </div>
          </div>
          <div class="bodyQuick">
            <div class="cards-scroll scrollY mt-scroll mh-58vh" id="scroll-bar-sm">
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '110067' || auth()->user()->nik == '332100286' || auth()->user()->nik == '92200244')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">IT & DT</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=it')}}">Ticketing</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '110067' || auth()->user()->nik == '332100286' || auth()->user()->nik == '92200244')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('workplan.index')}}">Workplan</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rating.index')}}">Rating Program</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('framework.index')}}">Framework</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rpa.index')}}">RPA</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_SPV' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_DEPT' || auth()->user()->role == 'QCS_SPV')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Quality Control</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_SPV')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rework.index')}}">QC Rework</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_DEPT' || auth()->user()->role == 'QCS_SPV')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample.index')}}">QC Sample</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qc-cutting')}}">QC Cutting</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qa.inline.index')}}">Quality Assurance</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rgarment.index')}}">Reject Garment</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('RejectCutting.dashboard')}}">Reject Cutting</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == "SMQC_USER")
                <li><i class="fas fa-folder-open"></i><a href="{{ route('smqc.index')}}">SMQC</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Approval Manager</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('cc.approval') }}">Overtime Approval</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="#">Permit Approval</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('request-approval-acc')}}">Cash Request Approval</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->nik == '210009' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022' || auth()->user()->role == 'PPIC_PLANNER')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Marketing</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rekap.dashboard')}}">Rekap Order</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('trimcard.dashboard')}}">Trim Card</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('qrcode.index')}}">QR Code Sample</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('worksheet.index')}}">Worksheet</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->nik == '210009' || auth()->user()->role == 'PPIC_PLANNER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample.room.index')}}">Sample Request</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->departemensubsub == 'MANAGEMENT' || auth()->user()->nik == 'GISCA' || auth()->user()->departemensubsub == 'RECRUITMENT' || auth()->user()->role == 'ADMIN_HRD' || auth()->user()->role == 'PETUGAS_APAR' || auth()->user()->nik == '300047')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">HR & GA</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD'|| auth()->user()->role == 'PETUGAS_APAR'|| auth()->user()->nik == '300047')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('hrga.index_auditbuyer')}}">Safety Compliance</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=hr')}}">Ticketing</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->departemensubsub == 'RECRUITMENT')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('employee-tracking')}}">Job Vacancy</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN') 
                <li><i class="fas fa-folder-open"></i><a href="{{ route('question.draft')}}">Orientation Question</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN') 
                <li><i class="fas fa-folder-open"></i><a href="{{ route('to-index')}}">Daily Turn Over</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rekap-index')}}">Abscence Recap</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->jabatan == 'MANAGER'|| auth()->user()->departemensubsub == 'MANAGEMENT'||auth()->user()->nik == 'GISCA')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('absen-index')}}">Daily Abscence</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('permit.request.pengajuan')}}">Permit Request</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('report.permit.request')}}">Report Permit Request</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Purchasing</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('vendorportal.index')}}">Vendor Portal</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PURCHASING')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('savingCost.dashboard')}}">Saving Cost</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('requestIR.index')}}">Request Issue IR</a></li>
                @endif
              </ul>
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT') 
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Internal Audit</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('audit.index')}}">Uji True/False</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('icr.tarikan.index')}}">Tarik Data</a></li>
              </ul> 
              @endif
              <ul class="liveSearchBar2">
                  <li><div class="title-16-dark-blue mb-2">GGI INDAH</div></li>
                  <li><i class="fas fa-folder-open"></i><a href="{{ route('indah.index')}}">Social Credit Score</a></li>
                  <li><i class="fas fa-folder-open"></i><a href="{{ route('temuan.index')}}">Task For Findings</a></li>
              </ul> 
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI' )
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Warehouse</div></li>
                <li><i class="fas fa-folder-open"></i><a href="#">Warehouse Mechanic</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-expedition') }}">Warehouse Expedition</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-material') }}">Warehouse Material</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI' )
                <li><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('Warehouse.requestIR.index')}}">Request Issue IR</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'KABAG'||auth()->user()->jabatan == 'MANAGER' || auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA' || auth()->user()->branch == 'GK')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">More Program</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('gistube-leaderboard') }}">Gistube</a></li>
                <li><i class="fas fa-folder-open"></i><a href="#">Assignment & Appointment</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('overtime-request') }}">Overtime Request</a></li>
                @if(auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA' || auth()->user()->branch == 'GK')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('job.index') }}">Job Orientation</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'KABAG'||auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('traffic-index') }}">GCC Traffic</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('rating.index') }}">User Feedback</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('barcode.security.index') }}">Barcode Security</a></li>
                @endif
              </ul> 
              @endif
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Production</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.index')}}">Tower Light</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('cutting.dashboard')}}">Cutting</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.sewing.index')}}">Sewing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('finishing.index')}}">Finishing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('operatorperformance.index')}}">Operator Performance</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('databasesmv.index')}}">Database SMV</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('capabilityline.index')}}">Capability Line</a></li>
                @if(str_contains(auth()->user()->departemensubsub,'MEKANIK') || auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('asset.dashboard.index')}}">Asset Management</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('prd.prdstatus.index')}}">Production Status</a></li>
              </ul> 
              @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Acc & Finance</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactory.index')}}">Cost Factory</a></li>
                @endif  
                <li><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactoryrpt.index')}}">Cost Factory Report</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=acc')}}">Ticketing</a></li>
                @endif  
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('acc.budget.monitoring')}}">Blocking Budget</a></li>
                @endif
              </ul> 
              @endif
              @if(auth()->user()->role == 'SYS_ADMIN' ||  auth()->user()->nik == 'GC110085'||  auth()->user()->nik == '300009'||  auth()->user()->nik == '380133')
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Sample Room</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('sample-request') }}">Status Sample</a></li>
              </ul>
              @endif
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">Mat & Document</div></li>
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PPIC'|| auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'INTERNAL CONTROL' || auth()->user()->nik == 'GISCA')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('subkon.index')}}">Monitoring Subkon</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('partial.index')}}">Partial 262</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
                @endif
                <li><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=doc')}}">Ticketing</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('contractwo.index')}}">Contract WO</a></li>
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('invoice.index')}}">Invoice</a></li>
                @endif
                @if(auth()->user()->role == 'SYS_ADMIN')
                <li><i class="fas fa-folder-open"></i><a href="{{ route('documentStorage.in')}}">Document Storage</a></li>
                @endif
              </ul> 
              <ul class="liveSearchBar2">
                <li><div class="title-16-dark-blue mb-2">PPIC</div></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('form_return.index')}}">Master Form Return</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.schedule.index')}}">Production Schedule</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.standard.cost.index')}}">Standard Cost WO</a></li>
                <li><i class="fas fa-folder-open"></i><a href="{{ route('ppic.issue_mr.index')}}">Request Issue MR</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img src="{{url('images/iconpack/home/geometric.svg')}}" class="geometricImg">
</section>
@endsection
@push("scripts")
<script>
  $(document).ready(function(){
    $("body").addClass("sidebar-collapse").addClass("sidebar-closed");
  });
</script>
<script>
	$(document).ready(function($){
		$(document).on('click', '.btn-quick-access', function(){
			$('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100" style="overflow:hidden"></div>');
			if($(this).hasClass('pull-bs-canvas-right'))
				$('.bs-canvas-right').addClass('mr-0');
			else
				$('.bs-canvas-left').addClass('ml-0');
			return false;
		});
		
		$(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){ 
			var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $('.bs-canvas');
			elm.removeClass('mr-0 ml-0');
			$('.bs-canvas-overlay').remove();
			return false;
		});
	});
</script>
<script>
  $(document).ready(function(){
    $("#filter").keyup(function(){
      var filter = $(this).val(), count = 0;
      $(".liveSearchBar li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).fadeOut();
        } else {
          $(this).show();
          count++;
        }
      });
    });
  });
  $(document).ready(function(){
    $("#filter2").keyup(function(){
      var filter = $(this).val(), count = 0;
      $(".liveSearchBar2 li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).fadeOut();
        } else {
          $(this).show();
          count++;
        }
      });
    });
  });
</script>

@endpush