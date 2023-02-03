
    <div class="modal fade" id="myModal{{$value->id}}">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:530px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-22">Detail Question</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="containerDetail">
                            <div class="judul">Program Module</div>
                            <div class="sub-judul">{{$value->sistem}}</div>
                        </div>
                        <div class="containerDetail">
                            <div class="judul">Route Name</div>
                            <div class="sub-judul">{{$value->url}}</div>
                        </div>
                        <div class="containerDetail">
                            <div class="judul">Survey</div>
                            @foreach($value->question as $key2=>$value2)
                            <ul class="list-group">
                                <li style="font-size : 14px; color : #494849 " class="mt-1 list-group-item d-flex justify-content-between align-items-center position-relative py-3">
                                    {{$value2->question}}
                                    @if($value2->isaktif ==1)
                                    <span class="badge badge-primary badge-pill position-absolute" style="font-weight : normal !important; top : 0; right : 0">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill position-absolute" style="font-weight : normal !important; top : 0; right : 0">Nonactive</span>
                                    @endif
                                </li>
                                
                            </ul>
                            @endforeach
                        
                        </div>
                        
                    </div>
                    <div class="col-12 flex" style="gap:.8rem">
                        <a href="{{route('userfeedback.edit',$value->id)}}" class="btn-yellow-md w-100">Edit <i class="fs-18 ml-2 fas fa-pencil-alt ml-3"></i></a>
                        @if($value->answer->count())
                            @if($value->isaktif == '1')
                            <a href="{{route('userfeedback.updatemaster',$value->id)}}" class="btn-yellow-md w-100 mr-3">Non Aktif <i class="fas fa-exclamation-triangle ml-3"></i></a>
                            @else
                            <a href="{{route('userfeedback.updatemaster',$value->id)}}" class="btn-green-md w-100 mr-3">Aktif <i class="fas fa-check-circle ml-3"></i></a>
                            @endif
                        @else
                        <a href="{{route('userfeedback.deletemaster',$value->id)}}" class="btn-red-md w-100 delete mr-3">Delete <i class="fs-18 ml-2 fas fa-trash ml-3"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>