<!-- User Management -->
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='User Management'){echo 'active';}?>">
        <i class="nav-icon fas fa-user-cog"></i>
        <p class="">
        User Management
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('kategori.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Kategori</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Role</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Index</p>
            </a>
        </li>
    </ul>
</li>
@endif
<!-- End User Management  -->

<!-- Report Kain -->
<!-- 1. Untuk QC Gudang  -->
@if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == 'QC_GD')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Report Kain'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p class="">
        Report Kain
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('kain.dashboard')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('kain.final')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Final Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('listbuyer.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">List Buyer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('listsupplier.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">List Supplier</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('fabric_standar.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Standar Fabric Table</p>
            </a>
        </li>
    </ul>
</li>
@elseif($cek_user->role == 'MD_KAIN')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Report Kain'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p class="">
        Report Kain
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('md_kain.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('md_final.report')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Final Report</p>
            </a>
        </li>
    </ul>
</li>
@elseif($cek_user->role == 'PRC_KAIN')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Report Kain'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p class="">
        Report Kain
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('prc_index.report')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('prc_final.report')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Final Report</p>
            </a>
        </li>
    </ul>
</li>
@endif
<!-- End Report Kain  -->

<!-- Report Aksesoris -->
<!-- 1. Untuk QC Gudang  -->
@if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == 'QC_GD')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Report Aksesoris'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p class="">
        Report Accessories
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('aksesoris.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Create Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('aksesoris.check')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Check Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('aksesoris.final')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Final Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('aksesoris.done')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Done Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('accessories_standar.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Standar Table</p>
            </a>
        </li>
    </ul>
</li>

<!-- 2. Untuk Purchasing  -->
@endif
<?php 
$test = collect($cek_user)->count('id');
?>
@if($test != 0)
@if($cek_user->role == 'PRC_ACC')
<li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Purchasing Aksesoris'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p class="">
        Report Accessories
        <i class="fas fa-angle-left right "></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('accessories_prc.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Report</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{route('accessories_prc.final')}}" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p class="">Final Report</p>
            </a>
        </li> -->
    </ul>
</li>
@endif
@endif
<!-- End Untuk Purchasing  -->