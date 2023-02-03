
<div class="cardFlat p-4">
  <div class="row">
    <div class="col-12 justify-sb mb-3">
      <div class="title-20-dark2">LEMBUR KUALITATIF</div> 
      <button id="addRowKualitatif" type="button" class="btn-blue-md"><span class="title-none">Tambah Buyer</span><i class="fs-20 object-show fas fa-plus-circle"></i></button>
    </div>
  </div>
  <div class="cardFlat p-4">
    <div class="row">
      <div class="col-md-4">
        <div class="title-sm">Buyer</div>
        <div class="input-group mt-1 mb-3">
          <div class="input-group-append">
              <div class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></div>
          </div>
          <select class="form-control borderInput select2bs4" id="buyer2" name="buyer2[]" style="cursor:pointer">
            <option value="" selected>Pilih Buyer</option>
            <option value="ALL BUYER" >ALL BUYER</option>
            @foreach($ListBuyer as $key => $value)
              <option name="buyer2" value="{{$value['text']}}">{{$value['text']}}</option>    
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="title-sm">Target</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="target2" name="target2[]" placeholder="Masukkan Target...">
      </div>
      <div class="col-md-4">
        <div class="title-sm">Alasan</div>
        <input type="text" class="form-control borderInput mt-1 mb-3" id="what" name="alasan1[]" placeholder="Masukkan alasan...">
      </div>
      <div class="col-12 accordionFlat">
        <div class="accordionItems" id="accordion">
          <div class="accordionHeaders" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
            <div class="title-16-dark3">ALASAN LAINNYA</div>
            <div class="icons">
              <div class="chevron">
                <i class="fas fa-angle-left"></i>
              </div>
            </div>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="bodyContents">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-sm">Alasan 2</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" id="who" name="alasan2[]" placeholder="masukkan alasan...">
                </div>
                <div class="col-md-6">
                  <div class="title-sm">Alasan 3</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" id="why" name="alasan3[]" placeholder="masukkan alasan...">
                </div>
                <div class="col-md-6">
                  <div class="title-sm">Alasan 4</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" id="when" name="alasan4[]" placeholder="masukkan alasan...">
                </div>
                <div class="col-md-6">
                  <div class="title-sm">Alasan 5</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" id="where" name="alasan5[]" placeholder="masukkan alasan...">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="newRowKualitatif"></div>
</div>

<script>
  var swing = document.getElementsByClassName("accordionItems");

  for (var i = 0; i < swing.length; i++) {
      swing[i].addEventListener("click", myFunction);
  }

  function myFunction() {
      var parentElement = this.parentElement;

      if (this.classList.length <= 1) {
      this.classList.add("accordion-open");

    } else {
      this.classList.remove("accordion-open");

    }
  }
</script>