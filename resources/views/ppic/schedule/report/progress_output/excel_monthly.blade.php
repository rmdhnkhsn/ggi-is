<table id="tabelReject" class="table table-sm table-border">
  <thead>
    <tr>
      <th style="font-weight:bold;text-align:center;width:50px;background-color:#66a3ff;">No</th>
      <th style="font-weight:bold;text-align:center;width:250px;background-color:#66a3ff;">Buyer</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Jan</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Feb</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Mar</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Apr</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Mei</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Jun</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Jul</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Agu</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Sep</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Okt</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Nov</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Des</th>
      <th style="font-weight:bold;text-align:center;width:80px;background-color:#66a3ff;">Total</th>
    </tr>
  </thead>
  @php
    $i=1;
    $totaljan=0;
    $totalfeb=0;
    $totalmar=0;
    $totalapr=0;
    $totalmei=0;
    $totaljun=0;
    $totaljul=0;
    $totalaug=0;
    $totalsep=0;
    $totalokt=0;
    $totalnov=0;
    $totaldes=0;
    $totalgrand=0;
  @endphp
  <tbody>
    @foreach($data as $d)
    @php
      $total=$d->jan+$d->feb+$d->mar+$d->apr+$d->mei+$d->jun+$d->jul+$d->aug+$d->sep+$d->okt+$d->nov+$d->des;

      $totaljan+=$d->jan;
      $totalfeb+=$d->feb;
      $totalmar+=$d->mar;
      $totalapr+=$d->apr;
      $totalmei+=$d->mei;
      $totaljun+=$d->jun;
      $totaljul+=$d->jul;
      $totalaug+=$d->aug;
      $totalsep+=$d->sep;
      $totalokt+=$d->okt;
      $totalnov+=$d->nov;
      $totaldes+=$d->des;
      $totalgrand+=$total;
    @endphp
    <tr>
      <td>{{$i}}</td>
      <td>{{$d->buyer}}</td>
      <td>{{$d->jan}}</td>
      <td>{{$d->feb}}</td>
      <td>{{$d->mar}}</td>
      <td>{{$d->apr}}</td>
      <td>{{$d->mei}}</td>
      <td>{{$d->jun}}</td>
      <td>{{$d->jul}}</td>
      <td>{{$d->aug}}</td>
      <td>{{$d->sep}}</td>
      <td>{{$d->okt}}</td>
      <td>{{$d->nov}}</td>
      <td>{{$d->des}}</td>
      <td>{{$total}}</td>
    </tr>
    @php
    $i+=1;
    @endphp
    @endforeach
    <tr>
      <td></td>
      <td>TOTAL</td>
      <td>{{$totaljan}}</td>
      <td>{{$totalfeb}}</td>
      <td>{{$totalmar}}</td>
      <td>{{$totalapr}}</td>
      <td>{{$totalmei}}</td>
      <td>{{$totaljun}}</td>
      <td>{{$totaljul}}</td>
      <td>{{$totalaug}}</td>
      <td>{{$totalsep}}</td>
      <td>{{$totalokt}}</td>
      <td>{{$totalnov}}</td>
      <td>{{$totaldes}}</td>
      <td>{{$totalgrand}}</td>
    </tr>
  </tbody>
  <!-- <tfoot>
  </tfoot> -->
</table>