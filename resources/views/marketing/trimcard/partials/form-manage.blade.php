<div class="row">
    <div class="col-lg-4">
        <label>Agent</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
            </div>
            <input type="text" class="form-control"  id="agent" name="agent" value=""  placeholder="Insert Agent">
        </div><br>
        <label>Destination</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
            </div>
            <input type="text" class="form-control" id="destination" name="destination" value="" placeholder="Insert Destination">
        </div><br>
        <label>Colorway 1</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway1" name="colorway1" value="" placeholder="Insert Colorway 1">
        </div><br>
        <label>Colorway 4</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway4" name="colorway4" value="" placeholder="Insert Colorway 1">
        </div>
    </div>
    <div class="col-lg-4">
        <label>Style</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control" id="style" name="style" value="" placeholder="Insert Style">
       </div><br>
       <label>Art</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-artstation"></i></span>
            </div>
            <input type="text" class="form-control" id="art" name="art" value="" placeholder="Insert Art">
        </div><br>
        <label>Colorway 2</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway2" name="colorway2" value="" placeholder="Insert Colorway 1">
        </div><br>
        <label>Colorway 6</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway6" name="colorway6" value="" placeholder="Insert Colorway 1">
        </div>
    </div>
    <div class="col-lg-4">
        <label>Buyer</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
            </div>
            <input type="text" class="form-control" id="buyer" name="buyer" value="{{$buyer->F0101_ALPH}}" placeholder="Insert Buyer">
        </div><br>
        @if($item != null)
        <label>Prod Description</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="prod_desc" name="prod_desc" value="{{$item->F4101_DSC2}}" placeholder="Insert Destination">    
        </div><br>
        @else
        <label>Prod Description</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="prod_desc" name="prod_desc" value="" placeholder="Insert Destination">   
        </div><br>
        @endif
        <label>Colorway 3</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway3" name="colorway3" value="" placeholder="Insert Colorway 1">
        </div><br>
        <label>Colorway 5</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway5" name="colorway5" value="" placeholder="Insert Colorway 1">
        </div><br>
    </div>
</div>
<input type="hidden" class="form-control" id="no_wo" name="no_wo" value="{{$dataWo->F4801_DOCO}}">
<input type="hidden" class="form-control" id="created_by" name="created_by" value="{{auth()->user()->nik}}">
<input type="hidden" class="form-control" id="branch" name="branch" value="{{auth()->user()->branch}}">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}">

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
