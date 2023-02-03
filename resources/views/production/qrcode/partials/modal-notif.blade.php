<div class="modal fade" id="qr-notif" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                         @foreach ($dataPO as $item)
                            @if($item['ppm_date'] == null )
                                @elseif($item['ppm'] == null)
                                <div class="notif-gcc">
                                    <div class="alertt alert-qr">
                                        <div class="icon-notification bg-merah">
                                            <i class="icon-alert fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="qr-desc-notif">
                                            <div class="deskripsi truncate">
                                                Style <b>{{ $item['style'] }}</b> buyer <b>{{ $item['buyer'] }}</b> progress <b>{{ $item['percentData'] }}% - PPM </b> due date : {{ $item['ppm_date'] }} <b>{{ $item['datawaktu'] }}</b> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif($item['ppm'] == null)
                                <div class="notif-gcc">
                                    <div class="alertt alert-qr">
                                        <div class="icon-notification bg-merah">
                                            <i class="icon-alert fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="qr-desc-notif">
                                            <div class="deskripsi truncate">
                                                Style <b>{{ $item['style'] }}</b> buyer <b>{{ $item['buyer'] }}</b> progress <b>80% - PPM </b> due date : {{ $item['ppm_date'] }} <b>{{ $item['now'] }}</b> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>  
                </div> 
                <div class="row">
                    <div class="col-12 justify-center">
                        <!-- <a href="#" class="btn-see-all">See All Notification</a> -->
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>