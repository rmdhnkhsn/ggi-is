
<div class="container col-lg-12">
    <table class="table table-bordered text-center">
        <tr>
            <th>COLOR</th>
            <th>PACK</th>
            <th>ACTION</th>
        </tr>
        @foreach($data->color as $key => $value)
        <tr>
            <td>{{$value->color}}</td>
            <td>{{$value->pack}}</td>
            <td>
                <a href="{{ route('sample_color.edit', $value->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="{{ route('sample_color.delete', $value->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

