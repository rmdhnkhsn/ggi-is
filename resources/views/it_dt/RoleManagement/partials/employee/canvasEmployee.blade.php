  <div class="bs-canvas3 bs-canvas-right3 position-fixed bg-light h-100 homeV2">
    <div class="headerCanvas2 p-3">
      <div class="title-20-dark-blue">Set Access</div>
      <div class="relative w-100">
        <input type="text" class="form-control borderInput" id="filter" placeholder="Search Module" />
        <i class="srch fas fa-search"></i>
      </div>
    </div>
    <div class="contentCanvas px-3">
      <form action="">
        <div class="cards-scroll mt-3 scrollY mh-73vh" id="scroll-bar-sm">
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">IT & DT</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=it')}}">Ticketing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('workplan.index')}}">Workplan</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rating.index')}}">Rating Program</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('framework.index')}}">Framework</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rpa.index')}}">RPA</a></li>
          </ul>
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Quality Control</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rework.index')}}">QC Rework</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('sample.index')}}">QC Sample</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('qc-cutting')}}">QC Cutting</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('qa.inline.index')}}">Quality Assurance</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rgarment.index')}}">Reject Garment</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('RejectCutting.dashboard')}}">Reject Cutting</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('smqc.index')}}">SMQC</a></li>
          </ul>
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Approval Manager</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('cc.approval') }}">Overtime Approval</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="#">Permit Approval</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('request-approval-acc')}}">Cash Request Approval</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Marketing</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rekap.dashboard')}}">Rekap Order</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('trimcard.dashboard')}}">Trim Card</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('qrcode.index')}}">QR Code Sample</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('worksheet.index')}}">Worksheet</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('sample.room.index')}}">Sample Request</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">HR & GA</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('hrga.index_auditbuyer')}}">Safety Compliance</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=hr')}}">Ticketing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('employee-tracking')}}">Job Vacancy</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('question.draft')}}">Orientation Question</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('to-index')}}">Daily Turn Over</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rekap-index')}}">Abscence Recap</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('absen-index')}}">Daily Abscence</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('permit.request.pengajuan')}}">Permit Request</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('report.permit.request')}}">Report Permit Request</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Purchasing</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('vendorportal.index')}}">Vendor Portal</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('savingCost.dashboard')}}">Saving Cost</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('requestIR.index')}}">Request Issue IR</a></li>
          </ul>
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Internal Audit</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('audit.index')}}">Uji True/False</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('icr.tarikan.index')}}">Tarik Data</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">GGI INDAH</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('indah.index')}}">Social Credit Score</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('temuan.index')}}">Task For Findings</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Warehouse</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="#">Warehouse Mechanic</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-expedition') }}">Warehouse Expedition</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('warehouse-material') }}">Warehouse Material</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('Warehouse.requestIR.index')}}">Request Issue IR</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">More Program</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('gistube-leaderboard') }}">Gistube</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="#">Assignment & Appointment</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('overtime-request') }}">Overtime Request</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('job.index') }}">Job Orientation</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('traffic-index') }}">GCC Traffic</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('rating.index') }}">User Feedback</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('barcode.security.index') }}">Barcode Security</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Production</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('prd.index')}}">Tower Light</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('cutting.dashboard')}}">Cutting</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('prd.sewing.index')}}">Sewing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('finishing.index')}}">Finishing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('operatorperformance.index')}}">Operator Performance</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('databasesmv.index')}}">Database SMV</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('capabilityline.index')}}">Capability Line</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('asset.dashboard.index')}}">Asset Management</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('prd.prdstatus.index')}}">Production Status</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Acc & Finance</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactory.index')}}">Cost Factory</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('accfin.costfactoryrpt.index')}}">Cost Factory Report</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=acc')}}">Ticketing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('acc.budget.monitoring')}}">Blocking Budget</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Sample Room</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('sample-request') }}">Status Sample</a></li>
          </ul>
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">Mat & Document</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('subkon.index')}}">Monitoring Subkon</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('partial.index')}}">Partial 262</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('in-out.index')}}">Analisa Pengeluaran Barang</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('tiket-index','v_mode=doc')}}">Ticketing</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('contractwo.index')}}">Contract WO</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('invoice.index')}}">Invoice</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('documentStorage.in')}}">Document Storage</a></li>
          </ul> 
          <ul class="liveSearchBar">
            <li><div class="title-16-dark-blue mb-2">PPIC</div></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('form_return.index')}}">Master Form Return</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('ppic.schedule.index')}}">Production Schedule</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('ppic.standard.cost.index')}}">Standard Cost WO</a></li>
            <li><input type="checkbox" class="check2 ml-1" id="" name=""><i class="fas fa-folder-open"></i><a href="{{ route('ppic.issue_mr.index')}}">Request Issue MR</a></li>
          </ul>
        </div>
        <div class="btnCanvas">
          <a href="" class="btn-red-md w-100">Delete</a>
          <a href="" class="btn-blue-md w-100">Set Access</a>
        </div>
      </form>
    </div>
  </div>