<div class="form-group">
    <label for="roll">Select Employee</label>
    <select class="form-control select2bs4" style="width: 100%;" name="nik" id="nik">
        <option value=""></option>
        @foreach($user as $a)
            <option value="{{$a->nik}}">{{$a->nik}} | {{$a->nama}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="roll">Select Day</label>
    <select class="form-control" style="width: 100%;" name="hari" id="hari">
        <option value=""></option>
        @foreach($hari as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
        @endforeach
    </select>
</div>
<input type="hidden" class="form-control" id="branch" name="branch" value="{{ Auth::user()->branch }}" placeholder="Insert Branch Detail">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{ Auth::user()->branchdetail }}" placeholder="Insert Branch Detail">

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
