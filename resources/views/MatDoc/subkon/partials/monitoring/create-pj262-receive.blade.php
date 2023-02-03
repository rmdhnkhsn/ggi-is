@extends("layouts.app")
@section("title","Create PJ")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 ml-auto mr-auto mb-5">
      <!-- class="d-none" -->
      <div id="calculator" class="d-none">
        <div class="row">
            <div class="col-lg-3">
              <span class="title-sm">Rate BM</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="rate_bm" placeholder="Masukan BM..." value="{{$rate_bm}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Rate PPN</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="rate_ppn" placeholder="Masukan PPN..." value="{{$rate_ppn}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Rate PPH</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="rate_pph" placeholder="Masukan PPH..."  value="{{$rate_pph}}" required >
              </div>
            </div>
        </div>
      </div>
        <?php
          $qty_receive=collect($akan_receive)->sum('qty_receive');
        ?>
      <form id="myForm1" action="{{route('subkon.receive.262.insert')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="form-control border-input" id="no_kontrak" name="no_kontrak" value="{{$data_kontrak->no_kontrak}}">
          <div class="row mb-4">
            <div class="col-12">
              <span class="title-24">Tambah data partrial</span>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-lg-3">
              <span class="title-sm">Nomor AJU SJ</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_aju" name="no_aju" maxlength="6" placeholder="Masukan Nomor AJU SJ..." required>
              </div>
            </div> -->
            <div class="col-lg-4">
              <span class="title-sm">Nomor AJU Dokumen</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="dok_aju" name="dok_aju" maxlength="6" placeholder="Masukan Dokumen AJU SJ..." >
              </div>
            </div>
            <div class="col-lg-4">
              <span class="title-sm">Nomor Daftar</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_daftar" name="no_daftar" maxlength="6" placeholder="Masukan Nomor Daftar..." required >
              </div>
            </div>
            <div class="col-lg-4">
              <span class="general-identity-title">Tanggal</span>
              <div class="input-group mt-1 mb-3">
                <div class="input-group date">
                  <div class="input-group-append ">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</div>
                  </div>
                  <input type="date" class="form-control input-data-fa" id="tanggal" name="tanggal" placeholder="Select Date..."  />
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">BM</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="bm" name="bm" placeholder="Masukan BM..." onkeyup="jumlah()" value="{{round($qty_receive*$rate_bm)}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPN</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="ppn" name="ppn" placeholder="Masukan PPN..." onkeyup="jumlah()" value="{{round($qty_receive*$rate_ppn)}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPH</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="pph" name="pph" placeholder="Masukan PPH..."  onkeyup="jumlah()" value="{{round($qty_receive*$rate_pph)}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Total Jaminan</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="total_jaminan" name="total_jaminan" placeholder="Masukan Total Jaminan..."  value="{{round($qty_receive*$rate_bm)+round($qty_receive*$rate_ppn)+round($qty_receive*$rate_pph)}}" readonly >
              </div>
            </div>
          </div>
          @foreach($sj_groupBySj as $k=>$v)
            <input type="hidden" name="id_sj[]" value="{{$k}}">
            <div class="badges bg-softBlue text-blue d-inline-flex fs-16 fw-500 mr-1">SJ : {{$v->first()->no_surat_jalan}}</div> 
          @endforeach
          <div class="row mt-2">
            <div class="col-12">
              <div class="cards p-4">
                <div class="justify-sb3">
                  <div class="title-20 text-left">Data 262</div>
                  <div class="containerSearch">
                    <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                  </div>
                </div>
                <div class="cards-scroll mh-530 scrollY" id="scroll-bar">
                  <table id="DTtable_StickyHeader" class="table tbl-ctg no-wrap pt-1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Jenis Barang</th>
                        <th>GL PT</th>

                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Tersisa</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0;?>
                      @foreach($akan_receive as $key =>$value)
                        @if($value['qty_receive']>0)
                        <?php $no++;?>
                          <tr>
                            <td>{{$no}}</td>
                            <td>{{$value['item_no']}}</td>
                            <td>{{$value['deskripsi']}}</td>
                            <td>{{$value['glpt']}}</td>
                            <td>
                              <input type="number" class="form-control border-input" id="" name="qty[]" value="{{$value['qty_receive']}}" style="height:37px;margin:-7px 0" readonly>
                            </td>
                            <td>{{$value['satuan']}}</td>
                            <td>
                                <input type="text" class="form-control border-input tersisa" id=""  value="{{$value['qty_sisa'] }}" style="height:37px;margin:-7px 0" readonly>
                            </td>
              
                          </tr>
                        @endif
                      @endforeach

                    </tbody>
                  </table>
                  <div id="newRow"></div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <span class="title-22">Add Documents</span>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap1">
                  <i class="icon-upload1 fas fa-upload"></i>
                  <button class="file-upload-btn1" type="button" id="" onclick="$('.file-upload-input1').trigger('click')">Select Image</button>
                  <input class="file-upload-input1" type='file' id="gbr1" name="gbr1" onchange="readURL1(this);" accept="image/*" />
                  <div class="drag-text">
                    <h5>Or Drop Images Here</h5>
                  </div>
                </div>
                <div class="file-upload-content1">
                  <img class="file-upload-image1" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload1()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap2">
                  <button class="file-upload-btn2" type="button" id="gbr2" name="gbr2" onclick="$('.file-upload-input2').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input2" type='file' id="gbr2" name="gbr2" value="" onchange="readURL2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content2">
                  <img class="file-upload-image2" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload2()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap3">
                  <button class="file-upload-btn3" type="button" id="gbr3" name="gbr3" onclick="$('.file-upload-input3').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input3" type='file' id="" name="gbr3" value="gbr3" onchange="readURL3(this);" accept="image/*" />
                </div>
                <div class="file-upload-content3">
                  <img class="file-upload-image3" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload3()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap4">
                  <button class="file-upload-btn4" type="button" id="gbr4" name="gbr4" onclick="$('.file-upload-input4').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input4" type='file' id="gbr4" name="gbr4" value="" onchange="readURL4(this);" accept="image/*" />
                </div>
                <div class="file-upload-content4">
                  <img class="file-upload-image4" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload4()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap5">
                  <button class="file-upload-btn5" type="button" id="gbr5" name="gbr5" onclick="$('.file-upload-input5').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input5" type='file' id="gbr5" name="gbr5" value="" onchange="readURL5(this);" accept="image/*" />
                </div>
                <div class="file-upload-content5">
                  <img class="file-upload-image5" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload5()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap6">
                  <button class="file-upload-btn6" type="button" id="gbr6" name="gbr6" onclick="$('.file-upload-input6').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input6" type='file' id="gbr6" name="gbr6" value="" onchange="readURL6(this);" accept="image/*" />
                </div>
                <div class="file-upload-content6">
                  <img class="file-upload-image6" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload6()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap7">
                  <button class="file-upload-btn7" type="button" id="gbr7" name="gbr7" onclick="$('.file-upload-input7').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input7" type='file' id="gbr7" name="gbr7" value="" onchange="readURL7(this);" accept="image/*" />
                </div>
                <div class="file-upload-content7">
                  <img class="file-upload-image7" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload7()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap8">
                  <button class="file-upload-btn8" type="button" id="gbr8" name="gbr8" onclick="$('.file-upload-input8').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input8" type='file' id="gbr8" name="gbr8" value="" onchange="readURL8(this);" accept="image/*" />
                </div>
                <div class="file-upload-content8">
                  <img class="file-upload-image8" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload8()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap9">
                  <button class="file-upload-btn9" type="button" id="gbr9" name="gbr9" onclick="$('.file-upload-input9').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input9" type='file' id="gbr9" name="gbr9" value="" onchange="readURL9(this);" accept="image/*" />
                </div>
                <div class="file-upload-content9">
                  <img class="file-upload-image9" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload9()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap10">
                  <button class="file-upload-btn10" type="button" id="gbr10" name="gbr10" onclick="$('.file-upload-input10').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input10" type='file' id="gbr10" name="gbr10" value="" onchange="readURL10(this);" accept="image/*" />
                </div>
                <div class="file-upload-content10">
                  <img class="file-upload-image10" src="" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload10()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf1" name="pdf1" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf2" name="pdf2" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf3" name="pdf3" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf4" name="pdf4" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf5" name="pdf5" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf6" name="pdf6" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
              </div>
            </div>
          </div>
          <div class="col-12 mt-4">
             <button type="submit" class="btn btn-blue ml-auto" id="btn-save">Save<i class="ml-3 fas fa-download"></i></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('/common/js/create-pj.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>


<script type="text/javascript">       

  $(document).ready( function () {  
    var table = $('#DTtable_StickyHeader').DataTable({
    // scrollY : '100%',
    "pageLength": 1000,
    "dom": '<"search"f><"top">rt<"bottom"><"clear">'
    });
  });

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('#DTtable_StickyHeader_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });

  function jumlah(){

    var bm = document.getElementById('bm').value; 
    var ppn = document.getElementById('ppn').value;
    var pph = document.getElementById('pph').value;

    var total = parseInt(bm) + parseInt(ppn) + parseInt(pph);
    document.getElementById('total_jaminan').value = total;
  }
		
</script>

<!-- <script>
      const sisa = document.getElementsByClassName('tersisa');
    Array.from(sisa).forEach((s) => {
        if (s.value < 0 ) {
          s.style.color = "red";
        }
    })

    const save = document.getElementById('btn-save');
    save.addEventListener('click', function() {

    const sisa = document.getElementsByClassName('tersisa');
    let count = 0;
    Array.from(sisa).forEach((s) => {
        if (s.value < 0 ) {
            count += parseInt(s.value);
            s.style.color = "red";
          }
      })

        var no_aju = document.getElementById('no_aju').value;
        var tanggal = document.getElementById('tanggal').value;
        // var dok_aju = document.getElementById('dok_aju').value;
        // var no_daftar = document.getElementById('no_daftar').value;
        var gambar= document.getElementById('gbr1').value;
        var dok=document.getElementById('pdf1').value
        if((no_aju=='') || (tanggal=='')){
          Swal.fire({
            icon: 'error',
            title: 'Periksa Kembali..!!',
            text: 'Pastika Kolom Ini di isi No Aju, Dokumen Aju, No Daftar & Tanggal,foto atau dok',
          })
        } else if (count < 0) {
          Swal.fire({
            icon: 'error',
            title: 'Quantity Melebihi Kontrak',
            text: 'Periksa Kembali, Terdapat Kolom Yang Minus',
          })
        }else{
          document.getElementById('myForm1').submit();
        }
      
    })
</script> -->
@endpush