
<div class="row">
    <div class="col-12 mb-4">
        <div class="container-form">
            <input type="text" class="searchText search" placeholder="Search..." required>
            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @foreach($data as $key => $value)
    <div class="col-md-6 cobarequest" id="request{{$value['ers_id']}}" nomor="{{$value['ers_id']}}">
        <div class="cardEmployee">
            <div class="containerContent">
                <div class="content">
                    <div class="judul text-truncate nama_dokumen">{{ Str::upper($value['nama_ers']) }}</div> 
                    @if($value['approve3'] != null)
                    <div class="approved-green">Approved 3</div>
                    @else
                    <div class="approved-blue">Approved 2</div>
                    @endif
                    <div class="footerEmployee text-truncate">
                        <div class="department">
                            <i class="c-blue fas fa-city"></i>
                            <span class="title-14 ml-2 text-truncate" style="max-width:120px">{{ Str::upper($value['string4']) }}</span>
                        </div>
                        <div class="people justify-start">
                            <i class="c-blue fas fa-users"></i>
                            <span class="title-14 ml-2 text-truncate">{{ Str::upper($value['string3']) }} People</span>
                        </div>
                        <div class="waktu justify-start">
                            <i class="c-blue fas fa-clock"></i>
                            <span class="title-14 ml-2 text-truncate">{{ Str::upper($value['tglinput']) }}</span>
                        </div>
                    </div>
                </div>
                <div class="btnEmployee">
                    <a href="{{ route('request-description', $value['ers_id'])}}" class="btn-simple-edit" style="width:37px;height:37px"><i class=" fs-18 fas fa-pencil-alt"></i></a>
                    <?php
                    $cek = collect($vacancy)->where('ers_id', $value['ers_id'])->count('id');
                    ?>
                    <!-- {{$cek}} -->
                    @if($value['approve3'] != null && $cek == 1)
                    <form action="{{ route('request-publish_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="num2" name="num2" value="1">
                        <input type="hidden" id="ers_id" name="ers_id" value="{{$value['ers_id']}}">
                        <button type="submit" class="btn-green-md">Publish</button>
                    </form>
                    @else
                    <button class="btn-blue-md" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Belum Approve 3">Publish</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>