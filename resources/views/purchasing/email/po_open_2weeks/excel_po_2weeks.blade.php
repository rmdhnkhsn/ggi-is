<table id="tabelReject" class="table table-sm table-border">
  <thead>
    <tr>
      <th style="font-weight:bold;text-align:center;width:50px;background-color:#66a3ff;">No</th>
      <th style="font-weight:bold;text-align:center;width:250px;background-color:#66a3ff;">Date.Order</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Date.SO.ExFactory</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Date.Promised</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Date.Today</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Order.Due</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">ExFactory.Due</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Status</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">PO</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Originator</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Tipe</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Line</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Short.Item</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Deskripsi</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Qty.Order</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Qty.Open</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Last.Status</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Next.Status</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">OR.No</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">OR.Tipe</th>
    </tr>
  </thead>

  <!-- untuk item searchnya selain "ELASTIC"
  - Urgent (Lewat dari H-30 dari Ex-Fty Date)
  - Important (Lewat 3 minggu dari Order Date PO, >21 hari dari order date),  
  - Normal (Lewat 2 minggu dari Order Date PO, >14 hari dari order date).

  untuk item searchnya "ELASTIC"
  - Urgent (Lewat dari H-30 dari Ex-Fty Date)
  - Important (Lewat 6 minggu dari Order Date PO, >42 hari dari order date),  
  - Normal (Lewat 5 minggu dari Order Date PO, >35 hari dari order date).

  - [OK] 0-14 gak perlu muncul -->

  <tbody>
    @php
      $i=1;
      $status='';
    @endphp

    @foreach($data as $d)
      @php
        $status='';
        $dt_trans_1=date_create($d->date_transaction);
        $dt_trans_2=date_create($d->date_today);
        $due_transaction_date=date_diff($dt_trans_1,$dt_trans_2);
        $due_transaction_date=(int)$due_transaction_date->format("%R%a");

        if ($due_transaction_date>=21) {
          $status='Important';
        } else if ($due_transaction_date>=14) {
          $status='Normal';
        }

        $due_exfact_date=0;
        if ($d->date_exfact_sales!=='') {
          $dt_exfact_1=date_create($d->date_today);
          $dt_exfact_2=date_create($d->date_exfact_sales);
          $due_exfact_date=date_diff($dt_exfact_1,$dt_exfact_2);
          $due_exfact_date=(int)$due_exfact_date->format("%R%a");

          if ($due_exfact_date<=30) {
            $status='Urgent';
          }
        }
      @endphp

      @if($due_transaction_date>=14)
        <tr>
            <td>{{$i}}</td>
            <td>{{$d->date_transaction}}</td>
            <td>{{$d->date_exfact_sales}}</td>
            <td>{{$d->date_promise}}</td>
            <td>{{$d->date_today}}</td>
            <td>
              <!-- @if($d->due_receipt_days>=0)
                <span class="badge badge-warning">Due {{$d->due_receipt_days}}</span>
              @else 
                <span class="badge badge-danger">Delay {{$d->due_receipt_days}}</span>
              @endif -->

              {{$due_transaction_date}}
            </td>
            <td>{{$due_exfact_date}}</td>


            @if($status=='Urgent')
            <td style="background-color:#FF5733;">{{$status}}</td>
            @elseif ($status=='Important') 
            <td style="background-color:#FFBD33;">{{$status}}</td>
            @else
            <td style="background-color:#33FF57;">{{$status}}</td>
            @endif

            <td>{{$d->f4311_doco.'/'.$d->f4311_dcto.'/'.$d->f4311_kcoo}}</td>
            <td>{{$d->f4311_torg}}</td>
            <td>{{$d->tipe}}</td>
            <td>{{$d->f4311_lnid}}</td>
            <td>{{$d->f4311_itm}}</td>
            <td>{{$d->f4311_dsc1}}</td>
            <td>{{$d->f4311_uorg}}</td>
            <td>{{$d->f4311_uopn}}</td>
            <td>{{$d->f4311_lttr}}</td>
            <td>{{$d->f4311_nxtr}}</td>

            <td>{{$d->f4311_oorn}}</td>
            <td>{{$d->f4311_octo}}</td>
        </tr>
      @endif

      @php
      $i+=1;
      @endphp
    @endforeach

    
  </tbody>
  <!-- <tfoot>
  </tfoot> -->
</table>