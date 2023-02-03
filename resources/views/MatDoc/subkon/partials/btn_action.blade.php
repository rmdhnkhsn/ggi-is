<div class="container-tbl-btn" >
    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu">
        <a href="" class="dropdown-item" data-toggle="modal" data-target="#info{{$value['no_kontrak']}}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Info</a>
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PPIC'|| auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->nik == 'GISCA')
            @if($value['status_kontrak']==null ||auth()->user()->role == 'SYS_ADMIN'||auth()->user()->nik == '210043' ||auth()->user()->nik == '220047')
                <a href="" class="dropdown-item" data-toggle="modal" data-target="#edit{{$value['no_kontrak']}}"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit</a>
            @endif
        @endif
        <a href="{{ route('subkon.monitoring',$value['no_kontrak'])}}" class="dropdown-item"><i class="mr-2 fs-18 fas fa-desktop"></i>Monitoring</a>
        @if($value['status']==0 || auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == 'GISCA')
        <a href="{{ route('subkon.delet',$value['no_kontrak'])}}" style="color:#FB5B5B" class="dropdown-item ml-1 deleteFile"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
        @endif
    </div>
</div>
@include('MatDoc.subkon.partials.info')
@include('MatDoc.subkon.partials.edit')

