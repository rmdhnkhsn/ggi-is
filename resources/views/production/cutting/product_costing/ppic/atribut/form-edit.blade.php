<div class="row mt-3">
    <input type="hidden" name="id" id="id" value="{{$wo->wo_detail->id}}">
    <div class="col-12 text-left">
        <span class="title-sm">Select Factory</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group-prepend">
                <span class="input-group-select" for="F0101_ALPH">Factory</span>
            </div>
            <select class="form-control input-data-fa" id="factory" name="factory">
                <option  selected> </option>
                @foreach($address as $key2 => $value2)
                <option {{ $wo->wo_detail->factory == $value2->kode_jde ? 'selected' : ''}} value="{{ $value2->kode_jde }}">{{$value2->nama_branch}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 text-left">
        <span class="title-sm">Start Date</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group date" id="start_date" data-target-input="nearest">
                <div class="input-group-append " data-target="#start_date" data-toggle="datetimepicker">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                </div>
                <input type="text" value="{{$wo->wo_detail->production_date}}" class="form-control datetimepicker-input input-data-fa" data-target="#start_date" name="production_date"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 text-left">
        <span class="title-sm">Estimated Date Completed</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group date" id="estimate_date" data-target-input="nearest">
                <div class="input-group-append " data-target="#estimate_date" data-toggle="datetimepicker">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                </div>
                <input type="text" value="{{$wo->wo_detail->estimation_complete}}" class="form-control datetimepicker-input input-data-fa" data-target="#estimate_date" name="estimation_complete"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
            </div>
        </div>
    </div>
    <div class="col-12 text-right py-4">
        <button type="submit" class="btn pic-btn-save">Save<i class="ml-3 fs-20 fas fa-download"></i></button>
    </div>
</div>
