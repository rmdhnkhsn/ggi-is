@foreach($dataBranch as $db)
@if($row['branch'] == $db['kode_branch'] && $row['branch_detail'] == $db['branchdetail'])
{{$db['nama_branch']}}
@endif
@endforeach