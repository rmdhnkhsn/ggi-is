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
  @php
    $gbr1="";
    $gbr2="";
    $gbr3="";
    $gbr4="";
    $gbr5="";
    $gbr6="";
    $gbr7="";
    $gbr8="";
    $gbr9="";
    $gbr10="";
    $file1="";
    $file2="";
    $file3="";
    $file4="";
    $file5="";
    $file6="";
      if($dok!=null){
        $dok->gbr1==null?:$gbr1=asset('/matdok/subkon/'.$dok->gbr1);
        $dok->gbr2==null?:$gbr2=asset('/matdok/subkon/'.$dok->gbr2);
        $dok->gbr3==null?:$gbr3=asset('/matdok/subkon/'.$dok->gbr3);
        $dok->gbr4==null?:$gbr4=asset('/matdok/subkon/'.$dok->gbr4);
        $dok->gbr5==null?:$gbr5=asset('/matdok/subkon/'.$dok->gbr5);
        $dok->gbr6==null?:$gbr6=asset('/matdok/subkon/'.$dok->gbr6);
        $dok->gbr7==null?:$gbr7=asset('/matdok/subkon/'.$dok->gbr7);
        $dok->gbr8==null?:$gbr8=asset('/matdok/subkon/'.$dok->gbr8);
        $dok->gbr9==null?:$gbr9=asset('/matdok/subkon/'.$dok->gbr9);
        $dok->gbr10==null?:$gbr10=asset('/matdok/subkon/'.$dok->gbr10);
        $dok->file1==null?:$file1=$dok->file1;
        $dok->file2==null?:$file2=$dok->file2;
        $dok->file3==null?:$file3=$dok->file3;
        $dok->file4==null?:$file4=$dok->file4;
        $dok->file5==null?:$file5=$dok->file5;
        $dok->file6==null?:$file6=$dok->file6;
      }
    
    $bm=0;
    $ppn=0;
    $pph=0;
    $total_jaminan=0;
    $dok_aju=null;
    $no_daftar=null;
      if($cekPartial!=null){
        $cekPartial->bm==null?:$bm=$cekPartial->bm;
        $cekPartial->ppn==null?:$ppn=$cekPartial->ppn;
        $cekPartial->pph==null?:$pph=$cekPartial->pph;
        $cekPartial->total_jaminan==null?:$total_jaminan=$cekPartial->total_jaminan;

        $cekPartial->dok_aju==null?:$dok_aju=$cekPartial->dok_aju;
        $cekPartial->no_daftar==null?:$no_daftar=$cekPartial->no_daftar;

      }
  @endphp
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 ml-auto mr-auto mb-5">
      <form  action="{{route('subkon.insert.pj')}}" id="myForm" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="form-control border-input" id="no_kontrak" name="no_kontrak" value="{{$no_kontrak}}" required>
          <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center ">
              <span class="title-24">Tambah data partrial </span> 
              <input type="hidden" id="alert" value="{{$bpbBlok}}">
              <div class="d-flex">
                  <div class="alert py-1 mr-2 " style="background : #CEE6FF; color :#007BFF " role="alert" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="BPB Yang sudah dipartrial Sebelumnya">
                      <span class="font-weight-bold">BPB : </span>
                      {{$bpbSudahPartial}}
                  </div>

                  <div class="alert py-1" style="background : #D2FFEA; color :#00DB76 " role="alert" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="BPB Yang akan di partrial">
                  <span class="font-weight-bold">BPB : </span>
                      {{$bpbAkanPartial}}
                  </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <span class="title-sm">Nomor AJU SJ</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_aju" name="no_aju" maxlength="6" value="{{$no_aju}}" placeholder="Masukan Nomor AJU SJ..." readonly>
                  <input type="hidden" class="form-control border-input" id="no_bpb" name="no_bpb" value="{{$no_bpb}}" required>
                  <input type="hidden" class="form-control border-input" id="tipe_partial" name="tipe_partial" value="{{$tipe_partial}}" required>

              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Nomor AJU Dokumen</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="dok_aju" name="dok_aju" maxlength="6" value="{{$dok_aju}}" placeholder="Masukan Dokumen AJU SJ...">
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Nomor Daftar</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_daftar" name="no_daftar" maxlength="6" value="{{$no_daftar}}" placeholder="Masukan Nomor Daftar...">
              </div>
            </div>
            <div class="col-lg-3">
              <span class="general-identity-title">Tanggal</span>
              <div class="input-group mt-1 mb-3">
                <div class="input-group date">
                  <div class="input-group-append ">
                    <div class="custom-calendar px-3" ><i class="far fa-calendar-alt mr-2"></i> <span class="tgl">Date</div>
                  </div>
                  <input type="date" class="form-control input-data-fa" id="tanggal" name="tanggal" value="{{$tanggal}}" placeholder="Select Date..." required />
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">BM</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="bm" name="bm" placeholder="Masukan BM..." onkeyup="jumlah()" value="{{$bm}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPN</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="ppn" name="ppn" placeholder="Masukan PPN..." onkeyup="jumlah()" value="{{$ppn}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPH</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="pph" name="pph" placeholder="Masukan PPH..."  onkeyup="jumlah()" value="{{$pph}}" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Total Jaminan</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="total_jaminan" name="total_jaminan" placeholder="Masukan Total Jaminan..."  value="{{$total_jaminan}}" readonly >
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="cards p-4">
              <div class="title-20 text-left">Data 261</div>
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll mh-530 scrollY" id="scroll-bar">
                  <table id="DTtable_StickyHeader" class="table tbl-content-left no-wrap pr-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Jenis Barang</th>
                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Tersisa</th>
                        <th>INFA</th>
                        <th>HANCA</th>
                      </tr>
                    </thead>
                   
                    <tbody> 
                      <?php $no=0;?>
                      @foreach($data_material as $key =>$value)
                      @if($value['qty']!= null)
                      <?php $no++;?>
                      <tr>
                          <input type="hidden"  id="id_material[]" name="id_material[]" value="{{$value['id']}}" required>
                          <input type="hidden"  id="item_number[]" name="item_number[]" value="{{$value['item_number']}}" required>
                        <td>{{$no}}</td>
                        <td>{{$value['item_number']}}</td>
                        <td>{{$value['deskripsi']}}</td>
                     
                       
                        <td><input type="number" class="form-control border-input" id="qty{{$value['id']}}" name="qty[]" value="{{$value['qty']}}" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()"></td>
                         <input type="hidden" class="form-control border-input" id="tersisa{{$value['id']}}"  value="{{$value['tersisa']}}" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()">
                        <td>{{$value['satuan']}}</td>
                       
                        <td><input type="number" class="form-control border-input tersisa" id="tampil{{$value['id']}}"  value="{{$value['tampil_sisa']}}" style="height:37px;margin:-7px 0" onkeyup="sisa{{$value['id']}}()" readonly></td>
                        
                        <td>
                          <input type="hidden" class="check1" id="gl_class{{$value['id']}}" name="gl_class[]" value="{{$value['gl_class']}}">
                          @if($value['gl_class']!=null)
                          <input type="checkbox" class="check1" id="check1{{$value['id']}}" checked >
                          @else
                          <input type="checkbox" class="check1" id="check1{{$value['id']}}">
                          @endif
                        </td>

                        <td>
                          <input type="hidden" class="check1" id="hanca{{$value['id']}}" name="hanca[]" value="{{$value['hanca']}}">
                          @if($value['hanca']!=null)
                          <input type="checkbox" class="check1" id="check2{{$value['id']}}" checked >
                          @else
                          <input type="checkbox" class="check1" id="check2{{$value['id']}}">
                          @endif
                        </td>
                      </tr>
                      <script>
                        
  
                          function sisa{{$value['id']}}(){
                            
                            var qty = document.getElementById('qty{{$value['id']}}').value; 
                            var sisa = document.getElementById('tersisa{{$value['id']}}').value;
                            var tampil = document.getElementById('tampil{{$value['id']}}').value;
                            // console.log(tampil);
  
                            var total = parseInt(sisa) - parseInt(qty);
                            if( total < '0'){
                            // console.log(total);
                              // total.style.color = "red";
                              document.getElementById('tampil{{$value['id']}}').style.color = "red";
                              document.getElementById('tampil{{$value['id']}}').value = total;
                            } else {
                              // total.style.color = "black";
                              document.getElementById('tampil{{$value['id']}}').value = total;
                              document.getElementById('tampil{{$value['id']}}').style.color = "black";
  
                            }
  
                           
                          }
  
                          $(document).on('click', '#check1{{$value['id']}}', function(){
                            var status = document.getElementById('check1{{$value['id']}}').value;
                            if(document.getElementById('check1{{$value['id']}}').checked){
                              var result = 'INFA'; 
                              document.getElementById('gl_class{{$value['id']}}').value = result;
                            }
                            else{
                              var result = null; 
                              document.getElementById('gl_class{{$value['id']}}').value = result;
                            }    
                              
                          }); 
                          $(document).on('click', '#check2{{$value['id']}}', function(){
                            var status = document.getElementById('check2{{$value['id']}}').value;
                            if(document.getElementById('check2{{$value['id']}}').checked){
                              var result = 'HANCA'; 
                              document.getElementById('hanca{{$value['id']}}').value = result;
                            }
                            else{
                              var result = null; 
                              document.getElementById('hanca{{$value['id']}}').value = result;
                            }    
                              
                          }); 
                      </script>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <span class="title-22">Add Documents</span>
            </div>
            @if($dok!=null)
            <input type="hidden" id="id_dok" name="id_dok" value="{{$dok->id}}" required>
            <input type="hidden" id="no_kontrak" name="no_kontrak" value="{{$dok->id_no_kontrak}}" required>
            @endif
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap1">
                  <i class="icon-upload1 fas fa-upload"></i>
                  <button class="file-upload-btn1" type="button" id="gbr1" onclick="$('.file-upload-input1').trigger('click')">Select Image</button>
                  <input class="file-upload-input1" type='file' id="gbr1" name="gbr1" onchange="readURL1(this);" accept="image/*" />
                  <div class="drag-text">
                    <h5>Or Drop Images Here</h5>
                  </div>
                </div>
                <div class="file-upload-content1">
                  <img class="file-upload-image1" src="{{$gbr1}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload1()" class="remove-image"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-qty">
              <div class="image-upload">
                <div class="image-upload-wrap2">
                  <button class="file-upload-btn2" type="button" id="gbr2" name="gbr2" 
                      onclick="$('.file-upload-input2').trigger( 'click' )"><i 
                          class="fas fa-plus"></i></button>
                  <input class="file-upload-input2" type='file' id="gbr2" name="gbr2" value="" 
                      onchange="readURL2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content2">
                  <img class="file-upload-image2" 
                      src="{{$gbr2}}" alt=" Image Format Only" 
                      data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload2()" class="remove-image"><i 
                        class="fas fa-times"></i></button>
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
                  <img class="file-upload-image3" src="{{$gbr3}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image4" src="{{$gbr4}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image5" src="{{$gbr5}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image6" src="{{$gbr6}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image7" src="{{$gbr7}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image8" src="{{$gbr8}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image9" src="{{$gbr9}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                  <img class="file-upload-image10" src="{{$gbr10}}" alt=" Image Format Only" data-toggle="lightbox" />
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
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file1}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf2" name="pdf2" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file2}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf3" name="pdf3" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file3}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf4" name="pdf4" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file4}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf5" name="pdf5" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file5}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf6" name="pdf6" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$file6}}</span></label>
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
    $('[data-toggle="popover"]').popover();

    let checking = document.getElementById('alert');
    if (checking.value == '') {
      // kondisi jika Aman
    } else if (checking.value == 'A') {
      // Kondisi jika BPB tidak ditemukan 
      notiferror('BPB Tidak Ditemukan', 'Periksa kembali, Harap Masukan NO BPB yang terdaftar & dengan benar.');
    } else {
      // Kondisi jika BPB ditemukan tapi sudah di inputkan sebelumnya
      notiferror('BPB Sudah Ada', `No BPB Berikut ${checking.value} sudah di Inputkan Sebelumnya.`);

    }

    function notiferror(title, text) {
      Swal.fire({
        icon: 'warning',
        title: title,
        text: text,
      })
    }
  });


  $(document).ready( function () {
    var table = $('#DTtable_StickyHeader').DataTable({
    // scrollY : '100%',
    "pageLength": 1000,
    "dom": '<"search"f><"top">rt<"bottom"><"clear">'
    });
  });

    const sisa = document.getElementsByClassName('tersisa');
    // let count = 0;
    Array.from(sisa).forEach((s) => {
        // console.log(s.value);
        if (s.value < 0 ) {
          s.style.color = "red";
          // count += parseInt(s.value);
          // console.log(count);
        }
    })

    const save = document.getElementById('btn-save');
    save.addEventListener('click', function() {

    const sisa = document.getElementsByClassName('tersisa');
    let count = 0;
    Array.from(sisa).forEach((s) => {
        if (s.value < 0 ) {
            count += parseInt(s.value);
            // alert("data minus");
            s.style.color = "red";
          }
      })
      if (count < 0 ) {
          Swal.fire({
          icon: 'error',
          title: 'Quantity Melebihi Kontrak',
          text: 'Periksa Kembali, Terdapat Kolom Yang Minus',
        })
      } else {
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
          text: 'Pastika Kolom Ini di isi No Aju, Dokumen Aju, No Daftar & Tanggal',
        })
        }
        else{
          document.getElementById('myForm').submit();
          
          showLoading()
        }
      }
    })
    
                      
		function jumlah(){
 
			var bm = document.getElementById('bm').value; 
			var ppn = document.getElementById('ppn').value;
			var pph = document.getElementById('pph').value;

			var total = parseInt(bm) + parseInt(ppn) + parseInt(pph);
			document.getElementById('total_jaminan').value = total;
		}
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }
	</script>

  
  @if ($gbr1!=="")
  <script>
      $(".file-upload-content1").show();
      $('.image-upload-wrap1').hide();
  </script>
  @endif

  @if ($gbr2!=="")
  <script>
      $(".file-upload-content2").show();
      $('.image-upload-wrap2').hide();
  </script>
  @endif
  @if ($gbr3!=="")
  <script>
      $(".file-upload-content3").show();
      $('.image-upload-wrap3').hide();
  </script>
  @endif
  @if ($gbr4!=="")
  <script>
      $(".file-upload-content4").show();
      $('.image-upload-wrap4').hide();
  </script>
  @endif
  @if ($gbr5!=="")
  <script>
      $(".file-upload-content5").show();
      $('.image-upload-wrap5').hide();
  </script>
  @endif
  @if ($gbr6!=="")
  <script>
      $(".file-upload-content6").show();
      $('.image-upload-wrap6').hide();
  </script>
  @endif
  @if ($gbr7!=="")
  <script>
      $(".file-upload-content7").show();
      $('.image-upload-wrap7').hide();
  </script>
  @endif
  @if ($gbr8!=="")
  <script>
      $(".file-upload-content8").show();
      $('.image-upload-wrap8').hide();
  </script>
  @endif
  @if ($gbr9!=="")
  <script>
      $(".file-upload-content9").show();
      $('.image-upload-wrap9').hide();
  </script>
  @endif
  @if ($gbr10!=="")
  <script>
      $(".file-upload-content10").show();
      $('.image-upload-wrap10').hide();
  </script>
  @endif



@endpush