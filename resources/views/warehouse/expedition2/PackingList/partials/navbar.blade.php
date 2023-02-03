@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
    <a href="{{route('packinglist.report_wo')}}" class="nav-link <?php if($page=='RekapWo'){echo 'active';}?>">
    <i class="nav-icon fas fa-folder"></i>
        <p class="">
            Report
        </p>
    </a>
</li>
@endif