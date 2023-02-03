@extends("layouts.app")
@section("title","Create PJ")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 ml-auto mr-auto mb-5">
      <form id="myForm1" action="{{route('subkon.insert.262')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="form-control border-input" id="no_kontrak" name="no_kontrak" value="{{$no_kontrak}}" required>
          <div class="row mb-4">
            <div class="col-12">
              <span class="title-24">Tambah data partrial</span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <span class="title-sm">Nomor AJU SJ</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_aju" name="no_aju" maxlength="6" placeholder="Masukan Nomor AJU SJ..." required>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Nomor AJU Dokumen</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="dok_aju" name="dok_aju" maxlength="6" placeholder="Masukan Dokumen AJU SJ..." >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Nomor Daftar</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_daftar" name="no_daftar" maxlength="6" placeholder="Masukan Nomor Daftar..." >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="general-identity-title">Tanggal</span>
              <div class="input-group mt-1 mb-3">
                <div class="input-group date">
                  <div class="input-group-append ">
                    <div class="custom-calendar px-3" ><i class="far fa-calendar-alt mr-2"></i> <span class="tgl">Date</div>
                  </div>
                  <input type="date" class="form-control input-data-fa" id="tanggal" name="tanggal" placeholder="Select Date..." required />
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">BM</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="bm" name="bm" placeholder="Masukan BM..." onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPN</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="ppn" name="ppn" placeholder="Masukan PPN..." onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPH</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="pph" name="pph" placeholder="Masukan PPH..."  onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Total Jaminan</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="total_jaminan" name="total_jaminan" placeholder="Masukan Total Jaminan..."  value="0" readonly >
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="cards p-4">
              <div class="title-20 text-left">Data 262</div>
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll mh-530 scrollY" id="scroll-bar">
                  <table id="DTtable_StickyHeader" class="table tbl-ctg no-wrap pt-1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Jenis Barang</th>
                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Tersisa</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0;?>
                      @foreach($patrial_pemasukan as $key =>$value)
                      <?php $no++;?>
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$value['kode_barang']}}</td>
                        <td>{{$value['nama_barang']}}</td>
                        <td><input type="number" class="form-control border-input" id="qty{{$value['id']}}" name="qty[]" value="" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()">
                            <input type="hidden"  id="id_barangjadi" name="id_barangjadi[]" value="{{$value['id']}}" required>
                            <input type="hidden"  id="kode_barang" name="kode_barang[]" value="{{$value['kode_barang']}}" required>
                        </td>
                        <td>{{$value['satuan']}}</td>
                        <td><input type="number" class="form-control border-input tersisa" id="tersisa{{$value['id']}}"  value="{{$value['tersisa']}}" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()" readonly>
                            <input type="hidden" class="form-control border-input tersisa" id="x{{$value['id']}}"  value="{{$value['tersisa']}}" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()" readonly></td>
          
                      </tr>
                      <script>
                        function sisa{{$value['id']}}(){
                          var qty = document.getElementById('qty{{$value['id']}}').value; 
                          var tesisa = document.getElementById('tersisa{{$value['id']}}').value;
                          var x = document.getElementById('x{{$value['id']}}').value;
                          var total = parseInt(x) - parseInt(qty);

                          if( total < '0'){
                            document.getElementById('tersisa{{$value['id']}}').style.color = "red";
                            document.getElementById('tersisa{{$value['id']}}').value = total;
                          } else {
                            document.getElementById('tersisa{{$value['id']}}').value = total;
                            document.getElementById('tersisa{{$value['id']}}').style.color = "black";

                          }
                        }
                    </script>
                      @endforeach

                    </tbody>
                  </table>
                  <div id="newRow"></div>

                </div>
                <!-- <div class="row">
                    <div class="col-12 my-3">
                        <button id="addRow" type="button" class="btn-blue">Return <i class="fs-18 ml-3 fas fa-plus"></i> </button>
                    </div>
                </div> -->

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
             <button type="button" class="btn btn-blue ml-auto" id="btn-save">Save<i class="ml-3 fas fa-download"></i></button>
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

  function jumlah(){

    var bm = document.getElementById('bm').value; 
    var ppn = document.getElementById('ppn').value;
    var pph = document.getElementById('pph').value;

    var total = parseInt(bm) + parseInt(ppn) + parseInt(pph);
    document.getElementById('total_jaminan').value = total;
  }
		
</script>

<script>
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
</script>
<!-- <script>
  $("#addRow").click(function () {
    var html = '';
    html += '<div class="row" id="inputFormRow">';
    html += '<div class="col-md-2 mb-2">';
    html += '<span class="title-sm">Item Code </span>';
    html += '<div class="relative mt-1">';
    html += '<input type="text" class="form-control border-input2" id="kode_barang" name="kode_barangreturn[]">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-2 mb-2">';
    html += '<span class="title-sm">Jenis Barang</span>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control border-input2 mt-1" id="nama_barang" name="nama_barang[]">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-2 mb-2">';
    html += '<span class="title-sm">Quantity</span>';
    html += '<div class="flex">';
    html += '<input type="number" class="form-control border-input2 mt-1" id="qty_masuk" name="qty_masuk[]">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-2 mb-2">';
    html += '<span class="title-sm">Satuan</span>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control border-input2 mt-1" id="satuan" name="satuan[]" >';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-2 mb-2">';
    html += '<span class="title-sm">Quantity Kontrak</span>';
    html += '<div class="flex">';
    html += '<input type="number" class="form-control border-input2 mt-1" id="qty_return" name="qty_return[]" value="0">';
    html += '<button id="removeRow" type="button" class="btn-delete-row ml-2"><i class="fs-20 fas fa-times"></i></button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('#newRow').append(html);
  });

  $(document).on('click', '#removeRow', function () {
      $(this).closest('#inputFormRow').remove();
  });

</script> -->
<!-- <script>
  function validateMyForm() {
    var gambar=($('#gbr1').val());
    var dok=($('#pdf1').val());

    if(gambar==''&& dok=='') {
        alert("Buyer tidak boleh kosong");
        return false;
    }
    // showLoading();
    return true;
  }
</script> -->
@endpush