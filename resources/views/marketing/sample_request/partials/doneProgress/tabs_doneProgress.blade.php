    <div class="row">
        <div class="col-12 customSR">
            <span class="title-22 title-hide">Data Request Sample</span>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable3" class="table hrd-tbl-content no-wrap py-2">
                <thead>
                    <tr>
                        <th>Style</th>
                        <th>Qty</th>
                        <th>Due Date</th>
                        <th>Image</th>
                        <th width="450px">Progress</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSampleDoneProgress as $key =>$value)
                        <tr>
                            <td>{{ $value['style'] }}</td>
                            <td>{{ $value['total_size'] }}</td>
                            <td>{{ $value['tanggal'] }}</td>
                            <td>
                                 @if ( $value['foto'] != null)
                                    <div class="container-tbl-btn">
                                        <a href="{{url('storage/'.$value['foto'])}}" data-toggle="lightbox" data-gallery="gallery">
                                            <img src="{{url('storage/'.$value['foto'])}}" class="img-sr"/>
                                        </a>
                                    </div>
                                @else
                                 <div class="container-tbl-btn">
                                    <a href="{{url('images/ads.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                                        <img src="{{url('images/ads.jpg')}}" class="img-sr"/>
                                    </a>
                                </div>
                                @endif
                               
                            </td>
                            <td>     
                            <div class="sr-percent">
                                @if (($value['departement_trecking'] == 'PATTERN'))
                                    20% 
                                @elseif(($value['departement_trecking'] == 'DEV'))
                                    40%
                                @elseif(($value['departement_trecking'] == 'CUTTING'))
                                    60%
                                @elseif(($value['departement_trecking'] == 'SEWING'))
                                   80%
                                @elseif(($value['departement_trecking'] == 'FINISH'))
                                   100%
                                @else
                                0%
                                @endif

                            </div>
                            <div class="sample-progress">
                               @if (($value['departement_trecking'] == 'PATTERN'))
                                    <div class="progress-bar bg-1" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Accepting & Pattern"></div> 
                                @elseif(($value['departement_trecking'] == 'DEV'))
                                    <div class="progress-bar bg-1" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Accepting & Pattern"></div> 
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Development"></div>
                                @elseif(($value['departement_trecking'] == 'CUTTING'))
                                    <div class="progress-bar bg-1" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Accepting & Pattern"></div> 
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Development"></div>
                                    <div class="progress-bar bg-2" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Cutting"></div>
                                @elseif(($value['departement_trecking'] == 'SEWING'))
                                    <div class="progress-bar bg-1" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Accepting & Pattern"></div> 
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Development"></div>
                                    <div class="progress-bar bg-2" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Cutting"></div>
                                    <div class="progress-bar bg-3" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Sewing"></div>
                                @elseif(($value['departement_trecking'] == 'FINISH'))
                                    <div class="progress-bar bg-1" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Accepting & Pattern"></div> 
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Development"></div>
                                    <div class="progress-bar bg-2" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Cutting"></div>
                                    <div class="progress-bar bg-3" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Sewing"></div>
                                    <div class="progress-bar bg-4" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Finish"></div>

                                @endif
                                
                            </div>
                            </td>
                            <td>
                                @include('marketing.sample_request.partials.doneProgress.btn_action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>