    
    
    <ul class="nav nav-tabs blue-sm-tabs3 justify-start" role="tablist">
      <li class="nav-item-show">
        <a href="{{ route('admin.cutting.gelaran')}}" class="nav-link <?php if($ActiveMenu=='gelaran'){echo 'active';}?>"></i>Form Gelaran</a>
        <div class="blue-sm-slide3"></div>
      </li>
      <li class="nav-item-show">
        <a href="{{ route('admin.cutting.proses')}}" class="nav-link <?php if($ActiveMenu=='proses'){echo 'active';}?>"></i>Form Dalam Proses</a>
        <div class="blue-sm-slide3"></div>
      </li>
      <li class="nav-item-show">
        <a href="{{ route('admin.cutting.data')}}" class="nav-link <?php if($ActiveMenu=='data'){echo 'active';}?>"></i>Data Cutting</a>
        <div class="blue-sm-slide3"></div>
      </li>
    </ul>