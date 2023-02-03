    <div class="row">
        <div class="col-12 customSR">
            <span class="title-22 title-hide">Data Request Sample</span>
            <form action="{{ route('sample.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-blue" data-toggle="modal" data-target="#create" style="margin-right:255px">Create Request<i class="ml-2 fs-20 fas fa-plus"></i></button>
                    @include('marketing.sample_request.partials.request.add_request',['submit' => 'Submit'])
            </form>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="table hrd-tbl-content no-wrap py-2">
                <thead>
                    <tr>
                        <th width="14%">Buyer</th>
                        <th width="26%">Style</th>
                        <th width="10%">Qty</th>
                        <th width="10%">Due Date</th>
                        <th width="10%">SR</th>
                        <th width="10%">Techpack</th>
                        <th width="10%">Image</th>
                        <th width="12%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPO as $key =>$value)
                        <tr>
                            <td>{{ $value['buyer'] }}</td>
                            <td>{{ $value['style'] }}</td>  
                            <td>
                                <button class="modal-qty" data-toggle="modal" data-target="#qty{{$value['id']}}">{{ $value['total_size'] }}</button>
                                @include('marketing.sample_request.partials.request.modal_qty')
                            </td>
                            <td>{{ $value['tanggal'] }}</td>
                            <td>
                                @if ( $value['sample_doc'] != null)
                                <div class="container-tbl-btn">
                                    <img src="{{url('images/iconpack/file-circle-check.svg')}}">
                                   {{-- <img src="{{url('images/iconpack/file-circle-exclamation.svg')}}">  --}}
                                </div>
                                @else
                                <div class="container-tbl-btn">
                                    {{-- <img src="{{url('images/iconpack/file-circle-check.svg')}}"> --}}
                                   <img src="{{url('images/iconpack/file-circle-exclamation.svg')}}"> 
                                </div>
                                @endif
                            </td>
                            <td>
                               @if ( $value['techpack_doc'] != null)
                                <div class="container-tbl-btn">
                                    <img src="{{url('images/iconpack/file-circle-check.svg')}}">
                                   {{-- <img src="{{url('images/iconpack/file-circle-exclamation.svg')}}">  --}}
                                </div>
                                @else
                                <div class="container-tbl-btn">
                                    {{-- <img src="{{url('images/iconpack/file-circle-check.svg')}}"> --}}
                                   <img src="{{url('images/iconpack/file-circle-exclamation.svg')}}"> 
                                </div>
                                @endif
                            </td>
                            <td>
                                @if ( $value['foto'] != null)
                                    <div class="container-tbl-btn">
                                        <a href="{{url('storage/'.$value['foto'])}}" data-toggle="lightbox" data-gallery="gallery">
                                            <img src="{{url('storage/'.$value['foto'])}}" class="img-sr"/>
                                        </a>
                                    </div>
                                @else
                                @endif
                               
                            </td>
                            <td>
                                    @include('marketing.sample_request.partials.request.btn_action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>

 