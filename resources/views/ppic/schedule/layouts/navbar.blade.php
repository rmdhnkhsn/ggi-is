

          <li class="nav-item">
            <a href="{{route('ppic.schedule.index')}}" class="nav-link <?php if($page=='production schedule'){echo 'active';}?>">
              <i class="nav-icon fas fa-chart-bar "></i>
              <p class="">
               Schedule
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{route('ppic.schedule.upship.index')}}" class="nav-link <?php if($page=='Shipment Update'){echo 'active';}?>">
              <i class="nav-icon fas fa-calendar-alt "></i>
              <p class="">
               Update Shipment Date
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{route('ppic.schedule.prodline.index')}}" class="nav-link <?php if($page=='production line'){echo 'active';}?>">
              <i class="nav-icon fas fa-vector-square"></i>
              <p class="">
               Production Line
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="{{route('ppic.schedule.workday.index')}}" class="nav-link <?php if($page=='branch work day'){echo 'active';}?>">
              <i class="nav-icon fas fa-network-wired"></i>
              <p class="">
               Branch Workday
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ppic.schedule.overtime.index')}}" class="nav-link <?php if($page=='branch overtime'){echo 'active';}?>">
              <i class="nav-icon fas fa-stopwatch"></i>
              <p class="">
               Overtime Day
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ppic.schedule.overtimehour.index')}}" class="nav-link <?php if($page=='branch overtime hour'){echo 'active';}?>">
              <i class="nav-icon fas fa-clock"></i>
              <p class="">
               Overtime Hour
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ppic.schedule.holiday.index')}}" class="nav-link <?php if($page=='daftar'){echo 'active';}?>">
              <i class="nav-icon fas fa-calendar-day"></i>
              <p class="">
               National Holiday
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book "></i>
              <p class="">
                Reporting
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_report_actual_scheduling_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Actual Scheduling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_facility_monthly_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Facility Qty Monthly</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_facility_buyer_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Facility PerBuyer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_loading_capacity_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Loading capacity</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_kapasitas_from_sales_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Kapasitas From Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_pending_or_show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Pending OR</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_summary_order_show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Summary Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_smv_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Data SMV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_capabilityline_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Capability Line</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_plancutting_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Plan Cutting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_ekspor_plan_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Ekspor Plan</p>
                </a>
              </li>
              @if(Auth::user()->nik=='350008')
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_outputsewing_monthly_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">1. Output Monthly</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_outputsewing_facility_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">1. Output by Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_outputsewing_recap_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">1. Output Recap</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_recap_buyer_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">2. Rekap per Buyer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_recap_line_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">2. Rekap per Line</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ppic.schedule.report_loading_capacity_perline_get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">4. Loading Capacity</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          
