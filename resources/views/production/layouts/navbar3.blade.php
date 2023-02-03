
  <li class="nav-item">
    <a href="{{route('marketing.index')}}" class="nav-link">
      <i id="nav-icon" class="nav-icon fas fa-home "></i>
      <p id="nav-name">
        Dashboard
      </p>
    </a>
  </li>

  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022')
  <li class="nav-item">
    <a href="{{route('qrcode.index')}}" class="nav-link <?php if($page=='index'){echo 'active';}?>">
      <i id="nav-icon" class="nav-icon fas fa-edit"></i>
      <p id="nav-name">
        Input Sample
      </p>
    </a>
  </li>

  @endif
  {{-- @if(auth()->user()->role == 'SYS_ADMIN' ) --}}
    <li class="nav-item">
      <a href="" class="nav-link <?php if($page=='show'){echo 'active';}?>">
        <i id="nav-icon" class="nav-icon fas fa-list-ul"></i>
        <p id="nav-name">
          Detail Sample
        </p>
      </a>
    </li>
  {{-- @endif --}}
