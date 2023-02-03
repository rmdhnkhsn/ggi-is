<table id="tabelReject" class="table table-sm table-border">
<thead>
  <tr style="background:#007bff25">
      <th>No</th>
      <th>Target.Date</th>
      <th>Branch</th>
      <th>Line</th>
      <th>WO</th>
      <th>Total Output</th>
  </tr>
</thead>
<tbody>
  @foreach($data->where('total_output',0) as $k=>$v)
  <tr>
      <td>{{$k+1}}</td>
      <td>{{$v->target_date}}</td>
      <td>{{$v->sub}}</td>
      <td>{{$v->line}}</td>
      <td>{{$v->wo_no}}</td>
      <td>{{$v->total_output}}</td>
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
      <th>No</th>
      <th>Target.Date</th>
      <th>Branch</th>
      <th>Line</th>
      <th>WO</th>
      <th>Total Output</th>
  </tr>
</tfoot>
</table>