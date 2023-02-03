@include('marketing.layouts.header')
@include('marketing.layouts.navbar2')

<!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<div class="box">
<div class="box-header">
    <h3 class="box-title">Detail</h3>
</div>
<div class="box-header">
<a href="{{ route('masterpo.store')}}" class="btn btn-danger">Kembali</a>
</div>
    <div class="box-body">
        <table class="table table-striped">
            @foreach ($data as $dt)
             <tr>
                 <th>PO Number</th>
                <td>{{ $dt->po_number }}</td>
            </tr>
            <tr>
                <th>Buyer</th>
                <td>{{ $dt->buyer }}</td>
            </tr>
            <tr>
                <th>Oreder Date</th>
                <td>{{ $dt->order_date }}</td>
            </tr>
            <tr>
                <th>MD User</th>
                <td>{{$dt->md_user }}</td>
            </tr>
           
                <th>Foto</th>
                <td>
                    @if (isset($dt->foto))
                        <img src="{{ asset('marketing/img/' . $dt->foto) }}">
                    @else
                       
                            <img src="{{ asset('marketing/img/dummyfemale.jpg') }}">
                      
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@include('marketing.layouts.footer')