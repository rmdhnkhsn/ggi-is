<form action="{{route('spl.app')}}" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$row['id']}}">
    <input type="hidden" name="spl_app" id="spl_app" value="1">
    <input type="hidden" name="spl_name" id="spl_name" value="{{auth()->user()->nama}}">
    <button class="btn btn-primary btn-sm" title="Approve ?"><i class="fas fa-check"></i></button>
</form>