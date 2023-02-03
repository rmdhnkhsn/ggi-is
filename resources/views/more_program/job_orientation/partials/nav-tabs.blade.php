
@foreach($departemen as $key => $value)
    <li class="nav-item">
        <a class="navBar" data-toggle="pill" href="#{{str_replace([' & ', ' '], '_', $value['departemen'])}}" role="tab">
            <span class="name text-truncate">{{$value['departemen']}}</span>
        </a>
    </li>
@endforeach
<li class="nav-item">
    <a href="{{route('job.public')}}" class="navBar" role="tab">
        <span class="name text-truncate">PUBLIC</span>
    </a>
</li>
