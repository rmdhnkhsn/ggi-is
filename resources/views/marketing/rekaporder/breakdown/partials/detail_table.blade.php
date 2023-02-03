@foreach($master->rekap_breakdown as $key => $value)
@if($value->rekap_detail_id == $detail->id)
    <tr style="text-align:center;">
        <td>{{ $value->color_code }}</td>
        <td>{{ $value->color_name }}</td>
        <td>{{ $value->country_code }}</td>
        @if($master->rekap_size->size1 != null)
        <td>{{ $value->size1 }}</td>
        @endif
        @if($master->rekap_size->size2 != null)
        <td>{{ $value->size2 }}</td>
        @endif
        @if($master->rekap_size->size3 != null)
        <td>{{ $value->size3 }}</td>
        @endif
        @if($master->rekap_size->size4 != null)
        <td>{{ $value->size4 }}</td>
        @endif
        @if($master->rekap_size->size5 != null)
        <td>{{ $value->size5 }}</td>
        @endif
        @if($master->rekap_size->size6 != null)
        <td>{{ $value->size6 }}</td>
        @endif
        @if($master->rekap_size->size7 != null)
        <td>{{ $value->size7 }}</td>
        @endif
        @if($master->rekap_size->size8 != null)
        <td>{{ $value->size8 }}</td>
        @endif
        @if($master->rekap_size->size9 != null)
        <td>{{ $value->size9 }}</td>
        @endif
        @if($master->rekap_size->size10 != null)
        <td>{{ $value->size10 }}</td>
        @endif
        @if($master->rekap_size->size11 != null)
        <td>{{ $value->size11 }}</td>
        @endif
        @if($master->rekap_size->size12 != null)
        <td>{{ $value->size12 }}</td>
        @endif
        @if($master->rekap_size->size13 != null)
        <td>{{ $value->size13 }}</td>
        @endif
        @if($master->rekap_size->size14 != null)
        <td>{{ $value->size14 }}</td>
        @endif
        @if($master->rekap_size->size15 != null)
        <td>{{ $value->size15 }}</td>
        @endif
        @if($master->rekap_size->size16 != null)
        <td>{{ $value->size16 }}</td>
        @endif
        @if($master->rekap_size->size17 != null)
        <td>{{ $value->size17 }}</td>
        @endif
        @if($master->rekap_size->size18 != null)
        <td>{{ $value->size18 }}</td>
        @endif
        <td>{{$value->total_size}}</td>
        <td>
        <a href="javascript:void(0)" class="btn btn-warning btn-sm editData" data-id="{{ $value->id }}" title="Edit" data-toggle="modal" data-target="#modal-editData"><i class="fas fa-edit"></i></a>
        <a href="{{ route('breakdown.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
@endif
@endforeach
    <tr style="text-align:center;">
        <td colspan="3">TOTAL</td>
        @if($master->rekap_size->size1 != null)
        <td>{{$jumlah['size1']}}</td>
        @endif
        @if($master->rekap_size->size2 != null)
        <td>{{$jumlah['size2']}}</td>
        @endif
        @if($master->rekap_size->size3 != null)
        <td>{{$jumlah['size3']}}</td>
        @endif
        @if($master->rekap_size->size4 != null)
        <td>{{$jumlah['size4']}}</td>
        @endif
        @if($master->rekap_size->size5 != null)
        <td>{{$jumlah['size5']}}</td>
        @endif
        @if($master->rekap_size->size6 != null)
        <td>{{$jumlah['size6']}}</td>
        @endif
        @if($master->rekap_size->size7 != null)
        <td>{{$jumlah['size7']}}</td>
        @endif
        @if($master->rekap_size->size8 != null)
        <td>{{$jumlah['size8']}}</td>
        @endif
        @if($master->rekap_size->size9 != null)
        <td>{{$jumlah['size9']}}</td>
        @endif
        @if($master->rekap_size->size10 != null)
        <td>{{$jumlah['size10']}}</td>
        @endif
        @if($master->rekap_size->size11 != null)
        <td>{{$jumlah['size11']}}</td>
        @endif
        @if($master->rekap_size->size12 != null)
        <td>{{$jumlah['size12']}}</td>
        @endif
        @if($master->rekap_size->size13 != null)
        <td>{{$jumlah['size13']}}</td>
        @endif
        @if($master->rekap_size->size14 != null)
        <td>{{$jumlah['size14']}}</td>
        @endif
        @if($master->rekap_size->size15 != null)
        <td>{{$jumlah['size15']}}</td>
        @endif
        @if($master->rekap_size->size16 != null)
        <td>{{$jumlah['size16']}}</td>
        @endif
        @if($master->rekap_size->size17 != null)
        <td>{{$jumlah['size17']}}</td>
        @endif
        @if($master->rekap_size->size18 != null)
        <td>{{$jumlah['size18']}}</td>
        @endif
        <td>{{$jumlah['total_size']}}</td>
    </tr>