<div class="container-tbl-btn flex">
    <a class="btn btn-simple-info" href="{{ route('sample.detail',$value['id'])}}"><i class="fas fa-info"></i></a>
    @include('marketing.sample_request.partials.request.info')
    
    <form action="{{ route('sample.update', $value['id'])}}" method="post" enctype="multipart/form-data">
        <button type="button" class="btn btn-simple-edit ml-1" data-toggle="modal" data-target="#edit{{$value['id']}}" data-id="{{ $value['id'] }}"><i class="fas fa-pencil-alt"></i></button>
        @csrf
            @include('marketing.sample_request.partials.request.edit',['submit' => 'Submit'])
    </form>
     <a href="{{route('sample.delete', $value['id'])}}" class="btn btn-simple-delete ml-1"  title="Delete">
        <i class="fas fa-trash"></i>
     </a>
    {{-- <a class="btn btn-simple-delete ml-1" href=""><i class="fas fa-trash"></i></a> --}}
</div>