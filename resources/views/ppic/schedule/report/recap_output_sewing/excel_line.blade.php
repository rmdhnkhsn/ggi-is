<table id="tabelReject" class="table table-sm table-border">

  @php
    $i=0;
    $curr_period=0;
    $curr_line=0;
    $period_month='';

    $totalperiod_qty=0;
    $totalperiod_jkj=0;
    $totalperiod_ltm=0;
    $totalperiod_ovt=0;
    $totalperiod_sls=0;
  @endphp


  @foreach($data as $d)
    @php
      $i+=1;

      $totalperiod_qty+=$d->qty;
      $totalperiod_jkj+=$d->jamker;
      $totalperiod_ltm+=$d->losstime;
      $totalperiod_ovt+=$d->overtime;
      $totalperiod_sls+=$d->sales;

      switch ($d->period_input) {
        case "1":
          $period_month='Januari';
          break;
        case "2":
          $period_month='Februari';
          break;
        case "3":
          $period_month='Maret';
          break;
        case "4":
          $period_month='April';
          break;
        case "5":
          $period_month='Mei';
          break;
        case "6":
          $period_month='Juni';
          break;
        case "7":
          $period_month='Juli';
          break;
        case "8":
          $period_month='Agustus';
          break;
        case "9":
          $period_month='September';
          break;
        case "10":
          $period_month='Oktober';
          break;
        case "11":
          $period_month='November';
          break;
        case "12":
          $period_month='Desember';
          break;
      }
    @endphp
    <tbody>
      @if($curr_period!==$d->period_input)
        @if($curr_period!==$d->period_input&&$curr_period>0)
        <tr>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;" colspan="3">Total Periode :</th>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_qty,2)}}</th>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_jkj,2)}}</th>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_ltm,2)}}</th>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_ovt,2)}}</th>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_sls,2)}}</th>
        </tr>
          @php
            $totalperiod_qty=0;
            $totalperiod_jkj=0;
            $totalperiod_ltm=0;
            $totalperiod_ovt=0;
            $totalperiod_sls=0;
          @endphp
        @endif

        <tr>
          <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;" colspan="8">Periode : {{$period_month." ".$d->year_input}}</th>
        </tr>
        <!-- <thead> -->
          <tr>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">No</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Line</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Buyer</th>

            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Qty.Output</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Jam.Kerja</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Lost.Time</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Over.Time</th>
            <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">Sales</th>
          </tr>
        <!-- </thead> -->
      @endif

      <tr>
        <td>{{$i}}</td>
        <td>{{$d->branchdetail.'-'.$d->line}}</td> 
        <td>{{$d->buyer}}</td> 

        <td>{{round($d->qty,2)}}</td>
        <td>{{round($d->jamker,2)}}</td>
        <td>{{round($d->losstime,2)}}</td>
        <td>{{round($d->overtime,2)}}</td>
        <td>{{round($d->sales,2)}}</td>
      </tr>
    </tbody>

    @php
      $curr_period=$d->period_input;
      $curr_line=$d->line;
    @endphp
  @endforeach

  <tr>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;" colspan="3">Total Periode :</th>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_qty,2)}}</th>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_jkj,2)}}</th>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_ltm,2)}}</th>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_ovt,2)}}</th>
    <th style="font-weight:bold;text-align:center;width:80px;background-color:#CFD8DC;">{{round($totalperiod_sls,2)}}</th>
  </tr>
    @php
      $totalperiod_qty=0;
      $totalperiod_jkj=0;
      $totalperiod_ltm=0;
      $totalperiod_ovt=0;
      $totalperiod_sls=0;
    @endphp

 

</table>