<div class="row">
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{$data->category}}" placeholder="Insert Category" readonly>
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">Buyer</label>
            <input type="hidden" class="form-control" id="buyer" name="buyer" value="{{$data->buyer}}" placeholder="Insert Buyer" readonly>
            <input type="text" class="form-control" id="buyer_name" name="buyer_name" value="{{$data->buyer_name}}" placeholder="Insert Buyer" readonly>
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">Item</label>
            <input type="text" class="form-control" id="item" name="item" value="{{$data->item}}" placeholder="Insert Item" readonly>
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">Size</label>
            <input type="text" class="form-control" id="size" name="size" value="{{$data->size}}" placeholder="Insert Size">
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <div class="form-group">
            <label for="roll">Style</label>
            <input type="text" class="form-control" id="style" name="style" value="{{$data->style}}" placeholder="Insert Style">
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{$data->status}}" placeholder="Insert Status">
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label>Date</label>
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                <input type="date" value="{{$data->date}}" class="form-control" name="date" placeholder="Select Date"/>
            </div>
        </div>
    </div>
    @if($data->file == null)
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">File</label><br>
            <input accept="image/*"  type="file" name="file" id="file">
        </div>
    </div>
    @endif
    @if($data->file2 == null)
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">File 2</label><br>
            <input accept="image/*"  type="file" name="file2" id="file2">
        </div>
    </div>
    @endif
    @if($data->file3 == null)
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">File 3</label><br>
            <input accept="image/*"  type="file" name="file3" id="file3">
        </div>
    </div>
    @endif
    @if($data->file4 == null)
    <div class="col-lg-3 col-3">
        <div class="form-group">
            <label for="roll">File 4</label><br>
            <input accept="image/*"  type="file" name="file4" id="file4">
        </div>
    </div>
    @endif
    <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
</div>
<div class="row">
    <div class="col-12 justify-end">
        <button type="submit" class="btn-blue-md title-navigate-next px-4">{{$submit}}</button>
    </div>
</div>
