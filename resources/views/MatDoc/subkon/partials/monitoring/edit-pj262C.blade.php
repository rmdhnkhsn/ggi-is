@extends("layouts.app")
@section("title","Edit PJ")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon2.css')}}">
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
                
                
                
        @endphp
      <form  action="{{route('subkon.update.pj261')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-4" id="ScrollUp">
            <div class="col-12 justify-sb">
              <span class="title-24">Tambah data partrial</span>
              <div class="input-group-prepend">
                <div class="container-form">
                  <!-- <form method="get" action="" class="form">
                    <input type="text" class="search-subkon" placeholder="Cari berdasarkan item, jenis barang..." style="font-size:14px" required>
                    <button type="button" class="btn-subkon-submit"><i class="icon-search fas fa-search"></i></button>
                  </form> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <span class="title-sm">Nomor AJU SJ</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_aju" name="no_aju" value="{{$collect_aju->no_aju}}" required>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Dokumen AJU SJ</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="dok_aju" name="dok_aju" value="{{$collect_aju->dok_aju}}" required>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Nomor Daftar</span>
              <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="no_daftar" name="no_daftar" value="{{$collect_aju->no_daftar}}" required>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="general-identity-title">Tanggal</span>
              <div class="input-group mt-1 mb-3">
                <div class="input-group date">
                  <div class="input-group-append ">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</div>
                  </div>
                  <input type="date" class="form-control input-data-fa" name="tanggal" value="{{$collect_aju->tanggal}}" required />
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">BM</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="bm" name="bm"value="{{$collect_aju->bm}}" onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPN</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="ppn" name="ppn" value="{{$collect_aju->ppn}}" onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">PPH</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="pph" name="pph" value="{{$collect_aju->pph}}"  onkeyup="jumlah()" value="0" required >
              </div>
            </div>
            <div class="col-lg-3">
              <span class="title-sm">Total Jaminan</span>
              <div class="input-group mt-1 mb-3">
                  <input type="number" class="form-control border-input" id="total_jaminan" name="total_jaminan" value="{{$collect_aju->total_jaminan}}"  readonly >
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="cards p-4">
                <table class="table table-borderless tbl-ctg no-wrap">
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
                    @foreach($record as $key =>$value)
                    <?php $no++;?>
                    <tr>
                      <input type="hidden" id="id[]" name="id[]" value="{{$value['id']}}" required>
                      <td>{{$no}}</td>
                      <td>{{$value['item_number']}}</td>
                      <td>{{$value['deskripsi']}}</td>
                      <td><input type="text" class="form-control border-input" id="qty[]" name="qty[]" value="{{$value['qty']}}" style="height:37px;margin:-7px 0"></td>
                      <td>{{$value['satuan']}}</td>
                      <td>{{$value['tersisa']}}</td>
                    </tr>
                   
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <span class="title-22">Add Documents</span>
            </div>
            <input type="hidden" id="id_dok" name="id_dok" value="{{$dok->id}}" required>
            <input type="hidden" id="no_kontrak" name="no_kontrak" value="{{$dok->id_no_kontrak}}" required>

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
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file1}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf2" name="pdf2" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file2}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf3" name="pdf3" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file3}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf4" name="pdf4" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file4}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf5" name="pdf5" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file5}}</span></label>
              </div>
            </div>
            <div class="col-12">
              <div class="custom-file my-2">
                <input type="file" class="custom-file-input" id="pdf6" name="pdf6" accept=".pdf" >
                <label class="custom-file-labels" for="customFile"><span class="choose-file">{{$dok->file6}}</span></label>
              </div>
            </div>
          </div>
          <div class="col-12 mt-4">
              <button type="submit" class="btn btn-blue ml-auto">Save<i class="ml-3 fas fa-download"></i></button>
            </div>
        </form>
        <a href="#ScrollUp" class="ScrollToBundling"><i class="fas fa-arrow-up"></i></a>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('/common/js/create-pj.js')}}"></script>
  <script type="text/javascript">
		function jumlah(){
 
			var bm = document.getElementById('bm').value; 
			var ppn = document.getElementById('ppn').value;
			var pph = document.getElementById('pph').value;

			var total = parseInt(bm) + parseInt(ppn) + parseInt(pph);
			document.getElementById('total_jaminan').value = total;
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