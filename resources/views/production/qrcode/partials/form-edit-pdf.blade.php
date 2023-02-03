<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="roll"> PDF smv</label>
            <input type="file" class="form-control" id="smv" name="smv" value="{{$data->smv}}" placeholder="">
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
      </div>
    </div>
  </div>
</div>