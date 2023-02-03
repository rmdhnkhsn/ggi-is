<li class="nav-item">
    <a href="{{ route('prod.prgs.index')}}" class="nav-link <?php if($page=='po'){echo 'active';}?>">
        <i class="nav-icon far fa-id-card"></i>
        <p>Progress Output</p>
    </a>
  </li>
 <li class="nav-item">
    <a href="{{ route('op.hadir.index')}}" class="nav-link <?php if($page=='op'){echo 'active';}?>">
        <i class="nav-icon far fa-id-card"></i>
        <p>Operator Hadir</p>
    </a>
  </li>