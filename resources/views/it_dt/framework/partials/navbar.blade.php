
  <li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='components'){echo 'active';}?>">
      <i class="nav-icon fas fa-code"></i>
      <p class="">
        Components
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('components.button')}}" class="nav-link <?php if($subPage=='button'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Button</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.form')}}" class="nav-link <?php if($subPage=='form'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Form</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.select')}}" class="nav-link <?php if($subPage=='select'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Select</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.cardNav')}}" class="nav-link <?php if($subPage=='cardNav'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Card Navigation</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.accordion')}}" class="nav-link <?php if($subPage=='accordion'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Accordion</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.upload')}}" class="nav-link <?php if($subPage=='upload'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Upload</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('components.modal')}}" class="nav-link <?php if($subPage=='modal'){echo 'active';}?>">
          <i class="nav-icon far fa-circle"></i>
          <p>Modal</p>
        </a>
      </li>
    </ul>
  </li>