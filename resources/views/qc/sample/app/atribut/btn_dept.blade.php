<form action="{{route('dept.app')}}" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$row['id']}}">
    <input type="hidden" name="dept_app" id="dept_app" value="1">
    <input type="hidden" name="dept_name" id="dept_name" value="{{auth()->user()->nama}}">
    <button class="btn btn-primary btn-sm" title="Approve ?"><i class="fas fa-check"></i></button>
</form>