<form action="{{route('spv.sampleapp')}}" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$row['id']}}">
    <input type="hidden" name="spv_app" id="spv_app" value="1">
    <input type="hidden" name="spv_name" id="spv_name" value="{{auth()->user()->nama}}">
    <button class="btn btn-primary btn-sm" title="Approve ?"><i class="fas fa-check"></i></button>
</form>