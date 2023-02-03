<div class="modal fade" id="form-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
    <div class="modal-content p-4" style="border-radius:10px">
      <div class="row">
        <div class="col-12 justify-sb">
          <div class="title-16-dark2">FORM - CLN230110-{{$value->id}}</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="col-12 mt-1 mb-3">
          <div class="borderlight2"></div>
        </div>
        @if($value->gelaran_wo != null)
        <div class="col-12">
          <table class="tables3 tbl-content-cost">
            <thead>
              <tr class="bg-thead2">
                <th class="text-center">WO</th>
                <th class="text-center">COLOR</th>
                <th class="text-center">QTY</th>
              </tr>
            </thead>
            <tbody>
              @foreach($value->gelaran_wo as $key2 => $value2)
              <tr>
                <td>{{$value2->no_wo}}</td>
                <td>{{$value2->color}}</td>
                <td>{{$value2->total_qty}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>