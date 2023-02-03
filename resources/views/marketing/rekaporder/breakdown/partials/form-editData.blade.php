<input type="hidden" class="form-control"  id="dd" name="id" value="">
<input type="hidden" class="form-control"  id="det" name="detail" value="">
<div class="row">
    <div class="col-lg-4">
        <label>Color Code</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control"  id="color_code" name="color_code" value="">
        </div>
    </div>
    <div class="col-lg-4">
        <label>Color Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control"  id="color_name" name="color_name" value="">
        </div>
    </div>
    <div class="col-lg-4">
        <label>Country Code</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-flag"></i></span>
            </div>
            <input type="text" class="form-control"  id="country_code" name="country_code" value="">
        </div>
    </div>
</div>
@if($detail->detail_exist != 0)
<div class="row">
    @if($master->rekap_size->size1 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size1}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d1" name="size1" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size2 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size2}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d2" name="size2" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size3 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size3}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d3" name="size3" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size4 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size4}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d4" name="size4" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size5 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size5}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d5" name="size5" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size6 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size6}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d6" name="size6" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size7 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size7}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d7" name="size7" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size8 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size8}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d8" name="size8" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size9 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size9}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d9" name="size9" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size10 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size10}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d10" name="size10" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size11 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size11}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d11" name="size11" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size12 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size12}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d12" name="size12" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size13 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size13}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d13" name="size13" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size14 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size14}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d14" name="size14" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size15 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size15}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d15" name="size15" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size16 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size16}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d16" name="size16" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size17 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size17}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d17" name="size17" value="">
        </div>
    </div>
    @endif
    @if($master->rekap_size->size18 != null)
    <div class="col-lg-4">
        <label>Size {{$master->rekap_size->size18}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
            </div>
            <input type="number" class="form-control"  id="d18" name="size18" value="">
        </div>
    </div>
    @endif
</div>
@endif
<br>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>