@if ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
<table id="DTtable" class="tables3 tbl-content-cost no-wrap">
    <thead>
        <tr class="bg-thead2">
            <th>NO</th>
            <th>PO NO</th>
            <th>WORK NO</th>
            <th>CONTRACT NUMBER</th>
            <th>STYLE</th>
            <!-- <th>SIZE</th> -->
            <th>DESCRIPTION OF GOODS</th>
            <th>HS CODE</th>
            <th>QUANTITY</th>
            <th>UNIT</th>
            <th>UNIT PRICE ($)</th>
            <th>AMOUNT ($)</th>              
       
        </tr>
    </thead>
    <tbody>
        @foreach ($data2 as $key =>$value)
        <tr>
            <!-- po, wo,contract, style,size, descOfGood,hsCode,qty,unit,unitPrice,amount -->
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($is_edit == 1)
                <input type="hidden" name="id[]" id="id" value="{{$value->id}}">
                @endif
                <input type="text" class="form-control border-input" id="po" name="po[]" value="{{ $value['po'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
            </td>
            <td><input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <td><input type="text" class="form-control border-input" id="contract" name="contract[]" value="{{ $value['contract'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <td><input type="text" class="form-control border-input" id="style" name="style[]" value="{{ $value['style'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <!-- <td><input type="text" class="form-control border-input" id="size" name="size[]" value="{{ $value['size'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td> -->
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="descOfGood[]" list="fabric" value="{{ $value['descOfGood'] }}" placeholder="-" style="min-width:250px" required>
                </div>
            </td>
            <td>
                <div class="container-tbl-btn">
                    <input type="text" class="form-control borderInput" id="" name="hsCode[]" value="{{ $value['hsCode'] }}" placeholder="-" required>
                </div>
            </td>
            <td><input type="text" class="form-control border-input qty" id="qty" name="qty[]" value="{{ $value['qty'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <td><input type="text" class="form-control border-input" id="unit" name="unit[]" value="{{ strtoupper($value['unit']) }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
            <td>
                <div class="container-tbl-btn">
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
            <th colspan="8">INVOICE TOTAL</th>
            <td colspan="" class="flex">
                <input type="text" class="form-control borderInput totalPack" name="totalPack" value="{{ $totalPack }}" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
            </td> 
            <td>{{$unit}}</td>
            <td></td>
            <td><input type="text" class="form-control borderInput totalInvoice" name="totalInvoice" id="totalInvoice" value="{{ $data_terbilang['totalInvoice'] }}" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
        </tr>
        <tr>
            <td colspan="12">
                <div class="container-tbl-btn">
                    <input type="text" class="form-control readOnlyForm" id="terbilang" name="terbilang"  value="{{ $data_terbilang['terbilang'] }}" style="font-style: italic" readonly>
                </div>
            </td>
        </tr>
        <datalist id="fabric"></datalist> 
    </tbody>
</table>
@endif
                                                
