<?php
$comment = collect($master_data->comment)->count('id');
?>
@if($comment != 0)
<div class="col-12">
    <div class="card-close p-3 mb-4">
        <div class="justify-sb">
            <div class="title-orange">Revision History</div>
            <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
        </div>
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table class="table tbl-content no-wrap mt-3">
                <thead>
                    <tr class="bg-oren">
                        <th width="60px">NO</th>
                        <th width="260px">USER</th>
                        <th width="160px" class="no-wrap">ENTERED ON</th>
                        <th>COMMENTS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @foreach($master_data->comment as $key => $value)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>
                            <div style="width:260px" class="text-truncate">
                                {{$value->user_name}}
                            </div> 
                        </td>
                        <td>{{ date('d F Y', strtotime($value->entered_on)) }}</td>
                        <td>[ {{$value->revision_for}} ] {{$value->description}}</td>
                    </tr>
                    <?php $no++ ;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif