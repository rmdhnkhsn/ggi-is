<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
<input type="hidden" class="form-control" id="day" name="nik" value="{{$data->day}}">
<input type="text" class="form-control" id="hari" name="nama" value="{{$data->hari}}"readonly>


        <div class="form-group">
                <label  class="col-form-label">Person 1</label>
                <select class="form-control select2bs4" name="petugas1" id="petugas1" class="form-control" style="width: 95%;" placeholder="Select Petugas">
                        <option value="{{ $data['petugas1'] }}">{{ $data['nama1'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="petugas1" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>

        <div class="form-group">
                <label  class="col-form-label">Person 2</label>
                <select class="form-control select2bs4" name="petugas2" id="petugas2" class="form-control" style="width: 95%;" placeholder="Select Petugas">
                        <option value="{{ $data['petugas2'] }}">{{ $data['nama2'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="petugas2" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>

        <div class="form-group">
                <label  class="col-form-label">Person 3</label>
                <select class="form-control select2bs4" name="petugas3" id="petugas3" class="form-control" style="width: 95%;" placeholder="Select Petugas">
                        <option value="{{ $data['petugas3'] }}">{{ $data['nama3'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>

        <div class="form-group">
                <label  class="col-form-label">Person 4</label>
                <select class="form-control select2bs4" name="petugas4" id="petugas4" class="form-control" style="width: 95%;" placeholder="Select Petugas">
                <option value="{{ $data['petugas4'] }}">{{ $data['nama4'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>

        <div class="form-group">
                <label  class="col-form-label">Person 5</label>
                <select class="form-control select2bs4" name="petugas5" id="petugas5" class="form-control" style="width: 95%;" placeholder="Select Petugas5">
                        <option value="{{ $data['petugas5'] }}">{{ $data['nama5'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
        <div class="form-group">
                <label  class="col-form-label">Person 6</label>
                <select class="form-control select2bs4" name="petugas6" id="petugas6" class="form-control" style="width: 95%;" placeholder="Select Petugas6">
                        <option value="{{ $data['petugas6'] }}">{{ $data['nama6'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
        <div class="form-group">
                <label  class="col-form-label">Person 7</label>
                <select class="form-control select2bs4" name="petugas7" id="petugas7" class="form-control" style="width: 95%;" placeholder="Select Petugas2">
                        <option value="{{ $data['petugas7'] }}">{{ $data['nama7'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
        <div class="form-group">
                <label  class="col-form-label">Person 8</label>
                <select class="form-control select2bs4" name="petugas8" id="petugas8" class="form-control" style="width: 95%;" placeholder="Select Petugas2">
                        <option value="{{ $data['petugas8'] }}">{{ $data['nama8'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
        <div class="form-group">
                <label  class="col-form-label">Person 9</label>
                <select class="form-control select2bs4" name="petugas9" id="petugas9" class="form-control" style="width: 95%;" placeholder="Select Petugas2">
                        <option value="{{ $data['petugas9'] }}">{{ $data['nama9'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>
        <div class="form-group">
                <label  class="col-form-label">Person 10</label>
                <select class="form-control select2bs4" name="petugas10" id="petugas10" class="form-control" style="width: 95%;" placeholder="Select Petugas2">
                        <option value="{{ $data['petugas10'] }}">{{ $data['nama10'] }} </option>
                        <option value="">Null</option>
                        @foreach($satgas as $row)
                        <option name="nik" value="{{ $row['nik'] }}">{{ $row['nama'] }}</option>
                        @endforeach
                </select>                                          
        </div>


<div>
    <label> </label>
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
