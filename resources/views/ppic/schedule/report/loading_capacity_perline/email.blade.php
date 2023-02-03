@php
$today=date('d F Y');
$first_date=date('d F Y', strtotime('first day of january this year'));;
@endphp
<p>Terlampir laporan rekap output sewing. periode {{$first_date}} s.d {{$today}}, <br>
  yang disajikan dalam beberapa format yaitu :
</p>
<table class="primary">
  <tr>
    <th>No</th>
    <th>Report</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Recap per Buyer</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Recap per Line</td>
  </tr>
</table>