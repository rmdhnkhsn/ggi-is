
<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
</div>
<div class="row">
    <div class="col-12">
        <div class="title-20-blue">Measurement</div>
    </div>
    <div class="col-12 my-2">     
        <div class="cards-scroll scrollX" id="scroll-bar">   
            <table class="table tbl-content">
                <thead>
                    <tr class="bg-thead">
                        <th>POM</th>
                        <th>Description</th>
                        <th>Tol(+)</th>
                        <th>Tol(-)</th>
                        @foreach ($master_data->rekap_size->toArray() as $column => $field)
                            @if (str_contains($column,'size')&&($field!==null))
                            <th>{{$field}}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($master_data->measurement->where('tipe','SPEC')->toArray() as $key => $value)
                    @php($i=1)
                    <tr class="font-td"> 
                        <td>{{$value['pom']}}</td>
                        <td>{{$value['description']}}</td>
                        <td>{{$value['tol_positif']}}</td>
                        <td>{{$value['tol_negatif']}}</td>
                        @foreach ($master_data->rekap_size->toArray() as $column => $field)
                            @if (str_contains($column,'size')&&($field!==null))
                            <td>{{$value['size'.$i]}}</td>
                            @php($i+=1)
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    $file_measurement1="";
    $file_measurement2="";
    $file_measurement3="";
    $file_measurement4="";
    $file_measurement5="";
    $file_measurement6="";
    if ($master_data!==null) {
        $master_data->file_measurement==null?:$file_measurement1=asset('/marketing/worksheet/measurement/'.$master_data->file_measurement);
        $master_data->file1==null?:$file_measurement2=asset('/marketing/worksheet/measurement/'.$master_data->file1);
        $master_data->file2==null?:$file_measurement3=asset('/marketing/worksheet/measurement/'.$master_data->file2);
        $master_data->file3==null?:$file_measurement4=asset('/marketing/worksheet/measurement/'.$master_data->file3);
        $master_data->file4==null?:$file_measurement5=asset('/marketing/worksheet/measurement/'.$master_data->file4);
        $master_data->file5==null?:$file_measurement6=asset('/marketing/worksheet/measurement/'.$master_data->file5);
    }
?>
<div class="row">
    @if($file_measurement1 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file_measurement}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement1" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement1" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement1}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($file_measurement2 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file1}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement2" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement2" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement2}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($file_measurement3 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file2}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement3" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement3" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement3}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($file_measurement4 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file3}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement4" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement4" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement4}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($file_measurement5 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file4}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement5" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement5" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement5}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($file_measurement6 != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->file5}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#measurement6" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="measurement6" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$file_measurement6}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
