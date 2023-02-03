<div class="row">
    <div class="col-12 flexx mb-4">
        <div class="container-form">
            <input type="text" class="searchText search_publish" placeholder="Search..." required>
            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
        <div class="checkAll">
            <input type="checkbox" id="checkAll2" class="check1 checkAll2" />
            <label for="checkAll2" class="title-14">Select All</label>
        </div>
        <div class="buttonDelete">
            <button type="submit" class="btn-merah-md no-wrap delete_all"  data-url="{{ url('publish-update_all') }}" >Delete Selected<i class="ml-2 fas fa-trash"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @foreach($data_publish as $key => $value)
        <div class="col-md-6 cobapublish" id="publish{{$value['ers_id']}}" nomor="{{$value['ers_id']}}">
            <div class="cardEmployee2">
                <input type="checkbox" id="publish1" data-id="{{$value['ers_id']}}" class="check1 subCheck checked2 sub_chk">
                <div class="containerContent">
                    <div class="content">
                        <div class="judul text-truncate dokumen_publish">{{ $value['nama_ers'] }}</div> 
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
                            <div class="people">
                                <i class="c-blue fas fa-users"></i>
                                <span class="title-14 ml-2 text-truncate">{{ Str::upper($value['string3']) }} People</span>
                            </div>
                            <div class="waktu">
                                <i class="c-blue fas fa-clock"></i>
                                <span class="title-14 ml-2 text-truncate">{{ Str::upper($value['tglinput']) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="btnEmployee">
                        <a href="{{ route('publish-description', $value['ers_id'])}}" class="btn-simple-edit" style="width:37px;height:37px"><i class="fs-18 fas fa-pencil-alt"></i></a>
                        <a href="{{route('public-delete', $value['ers_id'])}}" class="btn-simple-delete" style="width:37px;height:37px"><i class="fs-18 fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>