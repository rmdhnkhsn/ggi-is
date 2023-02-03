<table id="tabelReject" class="table table-sm table-border">
  <thead>
    <tr>
      <th style="font-weight:bold;text-align:center;width:50px;background-color:#66a3ff;">No</th>
      <th style="font-weight:bold;text-align:center;width:250px;background-color:#66a3ff;">Buyer</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">CLN</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">CLN.JAP</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">MAJA1</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">MAJA2</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">CNJ2</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">KRAPYAK</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">CBA</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">KALIBENDA</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">CHAWAN</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">TOTAL</th>
    </tr>
  </thead>
  @php
    $i=1;

    $totalcln=0;
    $totalcjl=0;
    $totalmj1=0;
    $totalmj2=0;
    $totalcnj2=0;
    $totalcva=0;
    $totalcba=0;
    $totalklb=0;
    $totalchw=0;
    $totalgrand=0;
  @endphp
  <tbody>
    @foreach($data as $d)
    @php
      $total=$d->cln+$d->cjl+$d->mj1+$d->mj2+$d->cnj2+$d->cva+$d->cba+$d->klb+$d->chw;

      $totalcln+=$d->cln;
      $totalcjl+=$d->cjl;
      $totalmj1+=$d->mj1;
      $totalmj2+=$d->mj2;
      $totalcnj2+=$d->cnj2;
      $totalcva+=$d->cva;
      $totalcba+=$d->cba;
      $totalklb+=$d->klb;
      $totalchw+=$d->chw;
      $totalgrand+=$total;
    @endphp
    <tr>
      <td>{{$i}}</td>
      <td>{{$d->buyer}}</td>
      <td>{{$d->cln}}</td>
      <td>{{$d->cjl}}</td>
      <td>{{$d->mj1}}</td>
      <td>{{$d->mj2}}</td>
      <td>{{$d->cnj2}}</td>
      <td>{{$d->cva}}</td>
      <td>{{$d->cba}}</td>
      <td>{{$d->klb}}</td>
      <td>{{$d->chw}}</td>
      <td>{{$total}}</td>
    </tr>
    @php
    $i+=1;
    @endphp
    @endforeach
    <tr>
      <td></td>
      <td>TOTAL</td>
      <td>{{$totalcln}}</td>
      <td>{{$totalcjl}}</td>
      <td>{{$totalmj1}}</td>
      <td>{{$totalmj2}}</td>
      <td>{{$totalcnj2}}</td>
      <td>{{$totalcva}}</td>
      <td>{{$totalcba}}</td>
      <td>{{$totalklb}}</td>
      <td>{{$totalchw}}</td>
      <td>{{$totalgrand}}</td>
    </tr>
  </tbody>
  <!-- <tfoot>
  </tfoot> -->
</table>