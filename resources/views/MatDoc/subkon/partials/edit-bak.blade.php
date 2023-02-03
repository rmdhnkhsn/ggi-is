<div class="modal fade" id="edit{{$value['no_kontrak']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form name="custForm" action="{{route('subkon.update')}}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="row px-4">
                    <div class="col-md-6">
                        <span class="general-identity-title">NO Surat Persetujuan-SKEP </span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_skep" name="no_skep" value="{{$value['no_skep']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Tanggal Surat Persetujuan</span>
                        <div class="input-group my-2">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt"></i></span></div>
                                </div>
                                <input type="date" class="form-control input-data-fa"  name="tgl_persetujuan" value="{{$value['tgl_persetujuan']}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">NO BPJ</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_bpj" name="no_bpj" value="{{$value['no_bpj']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Tanggal BPJ</span>
                        <div class="input-group my-2">
                            <div class="input-group date" >
                                <div class="input-group-append">
                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt"></i></span></div>
                                </div>
                                <input type="date" class="form-control input-data-fa" name="tgl_bpj" value="{{$value['tgl_bpj']}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title mb-2 d-inline-block">Supplier</span>
                        <select class="form-control borderInput2 select2bs_supplier" name="supplier" style="cursor:pointer">
                            <option value="" selected>Pilih Supplier</option>
                            <option value="{{$value['supplier']}}" selected>{{$value['supplier']}}</option>
                            @foreach($ListSupplier as $key5 => $value5)
                                <option name="supplier" value="{{$value5['text']}}">{{$value5['text']}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Jatuh Tempo</span>
                        <div class="input-group my-2">
                            <div class="input-group date" >
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt"></i></span></div>
                                </div>
                                <input type="date" class="form-control input-data-fa"  name="jatuh_tempo" value="{{$value['jatuh_tempo']}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Kontrak Kerja</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_kontrak" name="no_kontrak" value="{{$value['sub_no_kontrak']}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Tanggal Kontrak</span>
                        <div class="input-group my-2">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control input-data-fa" name="tgl_kontrak" value="{{$value['tgl_kontrak']}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Customer BOND NO</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_bound" name="no_bound" value="{{$value['no_bound']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Bisnis Unit</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                            <span class="input-group-select  px-3" for="" ><i class="fas fa-building" style="font-size : 18px"></i></span>
                            </div>
                            <select class="form-control borderInput-grey" id="branch" name="branch" value="{{$value['branch']}}" style="cursor:pointer" required>
                            <option value="{{$value['branch']}}" selected>{{$value['branch']}}</option>
                            <option value="1201" name="branch">1201</option>    
                            <option value="1205" name="branch">1205</option>    
                            <option value="1204" name="branch">1204</option>
                            <option value="1206" name="branch">1206</option>    

                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Tarik CB Asli </span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="tarik_cb" name="tarik_cb" value="{{$value['tarik_cb']}}" >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">BC 262</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="bc_262" name="bc_262" value="{{$value['bc_262']}}" >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">JDE</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="jde" name="jde" value="{{$value['jde']}}" >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">Premi</span>
                        <div class="input-group my-2">
                            <input type="number" class="form-control borderInput" id="premi" name="premi" value="{{$value['premi']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Nilai Jaminan</span>
                        <div class="input-group my-2">
                            <input type="number" class="form-control borderInput" id="nilai_jaminan" name="nilai_jaminan" value="{{$value['nilai_jaminan']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Kurs US</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control borderInput" id="kurs" name="kurs" value="{{$value['kurs']}}" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <span class="general-identity-title">NOMOR SURAT IZIN TPB </span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="izintpb" name="izintpb" value="{{$value['izintpb']}}" placeholder="Masukan Nomor Surat Izin TPB..." >
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Amount</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="amount" name="amount" value="{{$value['amount']}}" >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">NPWP</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="npwp" name="npwp" value="{{$value['npwp']}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Pengusaha TPB</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="pengusaha_tpb" name="pengusaha_tpb" value="{{$value['pengusaha_tpb']}}" >
                        </div>
                    </div>

                    <!-- <div class="col-6">
                        <span class="general-identity-title">Nomor Surat Izin TPB</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_tpb" name="no_tpb" value="{{$value['no_tpb']}}" >
                        </div>
                    </div> -->
                    <div class="col-12">
                        <span class="title-sm">Jenis Pekerjaan</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="jenis_pekerjaan" name="jenis_pekerjaan" value="{{$value['jenis_pekerjaan']}}" >
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Nama PPIC</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="nama" name="nama" value="{{$value['nama']}}" readonly>
                            <input type="hidden" class="form-control borderInput" id="nik_pic" name="nik_pic" value="{{$value['nik']}}" readonly>
                        
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="general-identity-title">Keterangan</span>
                        <div class="fa-message my-2">
                            <textarea placeholder="Masukkan Keterangan.." name="ket" class="remark-name" id="ket">{{$value['ket']}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="custom-control custom-switch">
                            @if($value['status_kontrak']=='Close')
                            <input type="checkbox" class="custom-control-input" id="closed{{$value['no_kontrak']}}"  value="{{$value['status_kontrak']}}" name="status_kontrak" checked>
                            @else
                            <input type="checkbox" class="custom-control-input" id="closed{{$value['no_kontrak']}}"  value="Close" name="status_kontrak">
                            @endif
                            <label class="custom-control-label pointer" for="closed{{$value['no_kontrak']}}">Close Kontrak</label>
                        </div>
                    </div>

                    <input type="hidden" class="coba" id="status{{$value['no_kontrak']}}" name="status" Value="1">
                    <input type="hidden" id="file_jaminan" name="file_jaminan" Value="{{$value['file_jaminan']}}">
                    <input type="hidden" id="file_barang" name="file_barang" Value="{{$value['file_barang']}}">

                    <div class="col-12 my-3">
                        <button type="button" class="btn-yellow btn-block" id="delete">Edit Dokumen<i class="wp-icon-btn fas fa-pencil-alt"></i></button>
                    </div>
                    
                    <div class="col-12 d-none document">
                        <div class="title-sm">Dokumen Perhitungan Jaminan</div>
                        <div class="custom-file mt-1 mb-3">
                            <input type="file" class="custom-file-input" id="file1" name="file1"  accept=".xlsx, .xls, .csv">
                            <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                        </div>
                    </div>
                    <div class="col-12  d-none document">
                        <div class="title-sm">Dokumen Barang Jadi</div>
                        <div class="custom-file mt-1 mb-3">
                            <input type="file" class="custom-file-input" id="file2" name="file2" accept=".xlsx, .xls, .csv" >
                            <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                        </div>
                    </div>

                </div>
                <div class="row px-4 pb-3">
                    <div class="col-12">
                        <button type="submit" class="btn-blue btn-block">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    <script>
        $(document).on('click', '#delete', function(){
            var status = document.getElementById('status{{$value['no_kontrak']}}').value;       
            // console.log(status);  
            
            if( status == '1' ) {
            var result = 2; 
            const documents = document.getElementsByClassName('document');
                Array.from(documents).forEach(function (element) {
                element.classList.replace('d-none','d-block');
            });
            document.getElementById('status{{$value['no_kontrak']}}').value = result;
            } else
            {
            var result = 1; 
            const documents = document.getElementsByClassName('document');
                Array.from(documents).forEach(function (element) {
                element.classList.replace('d-block','d-none');
            });
            document.getElementById('status{{$value['no_kontrak']}}').value = result;
            }
        }); 
    </script>
</div>