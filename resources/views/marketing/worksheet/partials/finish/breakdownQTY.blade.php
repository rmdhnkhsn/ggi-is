
<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
    <div class="col-12">
        <div class="title-20-blue">Breakdown Qty PO : 223165465</div>
    </div>
    @foreach($master_data->rekap_detail as $key => $value)
        <?php
        $alamat = collect($address)->where('F0101_AN8',$value->shipment_to)->first();
        ?>
        <div class="col-12 mt-3">
            <div class="title-16-dark2">#OR {{$value->no_or}} Shipment to {{ $alamat->F0101_ALPH }} </div>
        </div>
        <div class="col-12 my-2">       
            <div class="cards-scroll scrollX" id="scroll-bar">
                <table class="table tbl-content">
                    <thead>
                        <tr class="bg-thead">
                            <th rowspan="2" style="padding-bottom:2rem">NO</th>
                            <th rowspan="2" style="padding-bottom:2rem">ARTICLE</th>
                            <th rowspan="2" style="padding-bottom:2rem">COLOR CODE</th>
                            <th rowspan="2" style="padding-bottom:2rem">COLOR NAME</th>
                            <th rowspan="2" style="padding-bottom:2rem">COUNTRY CODE</th>
                            <?php
                                $jumlah_datanya = count($ukuran);
                            ?>
                            <th colspan="{{$jumlah_datanya+1}}" class="text-center">QTY BREAKDOWN</th>
                        </tr>
                        <tr class="bg-thead">
                            @foreach($ukuran as $key3 => $value3)
                            <th>{{$value3}}</th>
                            @endforeach
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $no=0;?>
                        @foreach($master_data->rekap_breakdown as $key2 => $value2)
                        @if($value->id == $value2->rekap_detail_id)
                        <?php $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value->article}}</td>
                            <td>{{$value2->color_code}}</td>
                            <td>{{$value2->color_name}}</td>
                            <td>{{$value2->country_code}}</td>
                            @if($master_data->rekap_size->size1 != null)
                            <td style="text-align:center;">{{$value2->size1}}</td>
                            @endif
                            @if($master_data->rekap_size->size2 != null)
                            <td style="text-align:center;">{{$value2->size2}}</td>
                            @endif
                            @if($master_data->rekap_size->size3 != null)
                            <td style="text-align:center;">{{$value2->size3}}</td>
                            @endif
                            @if($master_data->rekap_size->size4 != null)
                            <td style="text-align:center;">{{$value2->size4}}</td>
                            @endif
                            @if($master_data->rekap_size->size5 != null)
                            <td style="text-align:center;">{{$value2->size5}}</td>
                            @endif
                            @if($master_data->rekap_size->size6 != null)
                            <td style="text-align:center;">{{$value2->size6}}</td>
                            @endif
                            @if($master_data->rekap_size->size7 != null)
                            <td style="text-align:center;">{{$value2->size7}}</td>
                            @endif
                            @if($master_data->rekap_size->size8 != null)
                            <td style="text-align:center;">{{$value2->size8}}</td>
                            @endif
                            @if($master_data->rekap_size->size9 != null)
                            <td style="text-align:center;">{{$value2->size9}}</td>
                            @endif
                            @if($master_data->rekap_size->size10 != null)
                            <td style="text-align:center;">{{$value2->size10}}</td>
                            @endif
                            @if($master_data->rekap_size->size11 != null)
                            <td style="text-align:center;">{{$value2->size11}}</td>
                            @endif
                            @if($master_data->rekap_size->size12 != null)
                            <td style="text-align:center;">{{$value2->size12}}</td>
                            @endif
                            @if($master_data->rekap_size->size13 != null)
                            <td style="text-align:center;">{{$value2->size13}}</td>
                            @endif
                            @if($master_data->rekap_size->size14 != null)
                            <td style="text-align:center;">{{$value2->size14}}</td>
                            @endif
                            @if($master_data->rekap_size->size15 != null)
                            <td style="text-align:center;">{{$value2->size15}}</td>
                            @endif
                            <td style="text-align:center;">{{$value2->total_size}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    @endforeach
</div>

