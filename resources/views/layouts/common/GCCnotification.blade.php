<button type="button" class="navbarNotif" data-toggle="modal" data-target="#notif">
    <i class="iconNotif far fa-bell"></i>
    @if ($notification->where('is_read',0)->count()>=1)
        <div class="notifCount">{{$notification->where('is_read',0)->count()}}</div>
    @endif
</button>

<div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="notif-gcc">
                            @if ($notification->count()==0)
                                <p style="color:black">Nothing new notification yet</p>
                            @endif
                            @foreach ($notification as $d)
                                @php
                                    $bg_read_status='alert-hijau';
                                    $bg_level='bg-kuning';
                                    if ($d->is_read=='1') {
                                        $bg_read_status='alert-read';
                                    }

                                    if ($d->alert_level=='DANGER') {
                                        $bg_level='bg-merah';
                                    }
                                    if ($d->alert_level=='SUCCESS') {
                                        $bg_level='bg-hijau';
                                    }
                                    if ($d->alert_level=='INFO') {
                                        $bg_level='bg-biru';
                                    }
                                @endphp

                                <a href="{{route('notif.update', ['id'=>$d->id,'approve_act'=>99])}}">
                                    <div class="alertt {{$bg_read_status}}">
                                        <div class="icon-notification {{$bg_level}}">
                                            <i class="icon-alert fas fa-desktop"></i>
                                        </div>
                                        <div class="desc-notiff">
                                            <div class="deskripsi truncate">
                                                <b>{{$d->title}}</b> {{$d->desc}}  
                                            </div>
                                        </div>
                                        @if ($d->is_approval==1&&$d->is_approval_click==0)
                                            <a href="{{route('notif.update', ['id'=>$d->id,'approve_act'=>1])}}" class="btn-notif-approve">Approve</a>
                                            <a href="{{route('notif.update', ['id'=>$d->id,'approve_act'=>0])}}" class="btn-notif-reject">Reject</a>
                                        @endif
                                    </div>
                                </a>

                            @endforeach
                        </div>
                    </div>  
                </div> 
                <div class="row">
                    <div class="col-12 justify-center">
                        <a href="{{route('notif.all')}}" class="btn-see-all">See All Notification</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>