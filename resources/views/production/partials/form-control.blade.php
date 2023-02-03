<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="buyer" name="buyer" value="" placeholder="Insert Buyer">
</div>
<div class="form-group">
    <label for="roll">Style</label>
    <input type="text" class="form-control" id="style" name="style" value="" placeholder="Insert Style">
</div>
<div class="form-group">
    <label for="roll">Image</label>
            @if($errors->has('image'))
                <small class="error">{{ $errors->first('image') }}</small>
            @endif
    <input type="file" class="form-control" id="image" name="image" value="" placeholder="Insert image">
</div>
<div class="form-group">
    <label for="roll">smv</label>
    <input type="file" class="form-control" id="smv" name="smv" value="" placeholder="Insert smv">
</div>
<div class="form-group">
    <label for="roll">ppm</label>
    <input type="file" class="form-control" id="ppm" name="ppm" value="" placeholder="Insert ppm">
</div>
<div class="form-group">
    <label for="roll">work</label>
    <input type="file" class="form-control" id="work" name="work" value="" placeholder="Insert work">
</div>
<div class="form-group">
    <label for="roll">trimCard</label>
    <input type="file" class="form-control" id="trimCard" name="trimCard" value="" placeholder="Insert trimCard">
</div>
<div class="form-group">
    <label for="roll">techSpech</label>
    <input type="file" class="form-control" id="techSpech" name="techSpech" value="" placeholder="Insert techSpech">
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
@endif
