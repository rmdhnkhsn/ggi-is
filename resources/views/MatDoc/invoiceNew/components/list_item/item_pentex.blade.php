@if ($data->buyer == 'PENTEX LTD')
<table id="DTtable" class="tables3 tbl-content-cost no-wrap">
    <thead>
        <tr class="bg-thead2">
            <th>NO</th> 
            <th>HS Code</th>
            <th>Style No</th>
            <th>Docket No.</th>
            <th>Destination No.</th>
            <th>Kimball No</th>
            <th>Description of Goods </th>
            <th>Color</th>
            <th>Carton Qty</th>
            <th>No of Units</th>
            <th>No of Sets</th>
            <th>CM</th>
            <th>FABRIC</th>
            <th>TRIMS</th>
            <th>L&P</th>
            <th>Sub</th>
            <th>Unit Pricein US$</th>
            <th>Amount in US$</th>         
        </tr>
    </thead>
    <tbody>
        @foreach ($data2 as $key =>$value)
        <tr>
            <!-- po, wo, style, descOfGood,hsCode,qty,unit,unitPrice,amount -->
            <td>{{ $loop->iteration }}</td>
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="hsCode[]" value="{{ $value['hsCode'] }}" placeholder="-" required>
                </div>
            </td>
            <td>
                @if($is_edit == 1)
                    <input type="hidden" name="id[]" id="id" value="{{$value->id}}">
                @endif   
                <input type="text" class="form-control border-input" id="style" name="style[]" value="{{ $value['style'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
            </td>
            <td> <input type="text" class="form-control borderInput" id="" name="docket_no[]" value="{{$value['docket_no']}}" placeholder="-" style="min-width:250px" required></td>
         
            <td> <input type="text" class="form-control borderInput" id="" name="destination_no[]" value="{{ $value['destination_no'] }}" placeholder="-" style="min-width:250px" ></td>
            <td> <input type="text" class="form-control borderInput" id="" name="kimball_no[]" value="{{ $value['kimball_no'] }}"  placeholder="-" style="min-width:250px" ></td>
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="descOfGood[]" list="fabric" value="{{ $value['descOfGood'] }}" placeholder="-" style="min-width:250px" required>
                </div>
            </td>
            <td>
                <input type="text" class="form-control borderInput" id="" name="color[]" value="{{ $value['colour']??$value['color'] }}" placeholder="-" style="min-width:250px" required>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="carton_qty[]" value="{{ $value['carton_qty'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="no_of_units[]" value="{{ $value['no_of_units'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="no_of_set[]" value="{{ $value['no_of_set'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="cm[]" value="{{ $value['cm'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="fabric[]" value="{{ $value['fabrics'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="trims[]" value="{{ $value['trims'] }}" placeholder="-" style="min-width:250px">
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="lp[]" value="{{ $value['lp'] }}" placeholder="-" style="min-width:250px" required>
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="number" step="0.01" class="form-control borderInput" id="" name="sub[]" placeholder="-" value="{{ $value['sub'] }}" style="min-width:250px" required>
                </div>
            </td>
            <!-- <td><input type="text" class="form-control border-input qty" id="qty" name="qty[]" value="{{ $value['qty'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <td><input type="text" class="form-control border-input" id="unit" name="unit[]" value="{{ strtoupper($value['unit']) }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td> -->
            <td>
                <div class="container-tbl-btn">
                    <input type="hidden" class="form-control border-input" id="unit" name="unit[]" value="{{ strtoupper($value['unit']) }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                    <input type="hidden" class="form-control border-input qty" id="qty" name="qty[]" value="{{ $value['qty'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                    <input type="number" step="0.01" class="form-control borderInput unitPrice" name="unitPrice[]" value="{{ $value['unitPrice'] }}"placeholder="-" required>
                </div>
            </td>
            <td><input type="text" class="form-control border-input amount" name="amount[]" value="{{$value['amount']}}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
        </tr>
        @endforeach
        <?php
            $data_unit = collect($data2)->first();
            if ($data_unit != null) {
                $unit = strtoupper($data_unit['unit']);
            }else {
                $unit = null;
            }

            // Terbilang 
            $data_terbilang = collect($data2)->first();
            $totalPack = collect($data2)->sum('qty');
            // dd($data_terbilang);
        ?>
        <tr>
            <th colspan="4">INVOICE TOTAL</th>
            <td colspan="" class="flex">
                <input type="text" class="form-control borderInput totalPack" name="totalPack" value="{{ $totalPack }}" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
            </td> 
            <td>{{$unit}}</td>
            <td></td>
            <td><input type="text" class="form-control borderInput totalInvoice" name="totalInvoice" id="totalInvoice" value="{{ $data_terbilang['totalInvoice'] }}" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
        </tr>
        <tr>
            <td colspan="10">
                <div class="container-tbl-btn">
                    <input type="text" class="form-control readOnlyForm" id="terbilang" name="terbilang"  value="{{ $data_terbilang['terbilang'] }}" style="font-style: italic" readonly>
                </div>
            </td>
        </tr>
        <datalist id="fabric"></datalist> 
    </tbody>
</table>
@endif
                                                
