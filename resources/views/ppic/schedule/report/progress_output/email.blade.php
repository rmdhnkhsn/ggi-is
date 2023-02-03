@php
$today=date('d F Y');
$first_date=date('d F Y', strtotime('first day of january this year'));;
@endphp
<p>Terlampir laporan progress output sewing per buyer dari tiap facility. periode {{$first_date}} s.d {{$today}}, <br>
  yang disajikan dalam beberapa format yaitu :
</p>
<table class="primary">
  <tr>
    <th>No</th>
    <th>Report</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Output Monthly</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Output per Facility</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Recap Output</td>
  </tr>
</table>