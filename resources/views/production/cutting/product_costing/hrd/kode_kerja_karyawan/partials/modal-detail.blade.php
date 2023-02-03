<!-- Modal -->
<div class="modal fade" id="details-{{$row['id']}}"role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered text-left">
                            <tr>
                                <td width="50%" style="font-weight:600">NIK</td>
                                <td width="50%" style="font-weight:400" id="part2">{{$row['nik']}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">NAMA</td>
                                <td width="50%" style="font-weight:400">{{$row['nama']}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Kode Kerja</td>
                                <td width="50%" style="font-weight:400">{{$row['kode_kerja']}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Jam Kerja</td>
                                <td width="50%" style="font-weight:400">{{$row['jam_kerja']}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Istirahat</td>
                                <td width="50%" style="font-weight:400">{{$row['istirahat']}}</td>
                            </tr>
                        </table>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</div>

<form action="{{ route('kode_kerja_karyawan.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$row['id']}}">
    <div class="modal fade" id="edit_detail-{{$row['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align:left;">
        <div class="modal-dialog" role="document" style="max-width:800px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Periode</span>
                            <div class="field mt-2">
                                <input type="text" id="periode" name="periode" value="{{$row['periode']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Tahun</span>
                            <div class="field mt-2">
                                <input type="text" id="tahun" name="tahun" value="{{$row['tahun']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Hari Kerja</span>
                            <div class="field mt-2">
                                <input type="text" id="hari_kerja" name="hari_kerja" value="{{$row['hari_kerja']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Gedung</span>
                            <div class="field mt-2">
                                <input type="text" id="gedung" name="gedung" value="{{$row['gedung']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Group</span>
                            <div class="field mt-2">
                                <input type="text" id="group" name="group" value="{{$row['group']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Kategory</span>
                            <div class="field mt-2">
                                <input type="text" id="kategory" name="kategory" value="{{$row['kategory']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Gaji Pokok</span>
                            <div class="field mt-2">
                                <input type="text" id="gaji_pokok" name="gaji_pokok" value="{{$row['gaji_pokok']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Prem. KRJ</span>
                            <div class="field mt-2">
                                <input type="text" id="prem_krj" name="prem_krj" value="{{$row['prem_krj']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Tun. Tetap</span>
                            <div class="field mt-2">
                                <input type="text" id="tun_tetap" name="tun_tetap" value="{{$row['tun_tetap']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">THP</span>
                            <div class="field mt-2">
                                <input type="text" id="thp" name="thp" value="{{$row['thp']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">GP + TJ</span>
                            <div class="field mt-2">
                                <input type="text" id="gp_tun" name="gp_tun" value="{{$row['gp_tun']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Gaji/Hari</span>
                            <div class="field mt-2">
                                <input type="text" id="gaji_per_hari" name="gaji_per_hari" value="{{$row['gaji_per_hari']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Gaji/Jam</span>
                            <div class="field mt-2">
                                <input type="text" id="gaji_per_jam" name="gaji_per_jam" value="{{$row['gaji_per_jam']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">BPJamsostek</span>
                            <div class="field mt-2">
                                <input type="text" id="bpjamsostek" name="bpjamsostek" value="{{$row['bpjamsostek']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">BPJS KS</span>
                            <div class="field mt-2">
                                <input type="text" id="bpjs_ks" name="bpjs_ks" value="{{$row['bpjs_ks']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Uang Makan</span>
                            <div class="field mt-2">
                                <input type="text" id="uang_makan" name="uang_makan" value="{{$row['uang_makan']}}">
                            </div>
                        </div>
                        <div class="col-4 mt-min">
                            <span class="general-identity-title">Kode Kerja</span>
                            <div class="field mt-2">
                                <select class="custom-select select2bs_packing2" name="kode_kerja" required>
                                    <option disabled selected>Masukan Kode Kerja</option>
                                    @foreach($kode_kerja as $key => $value)
                                    <option {{ $row['kode_kerja'] == $value->kode_kerja ? 'selected' : ''}} value="{{  $value->kode_kerja }}">Kode - {{ $value->kode_kerja}} | Jam Kerja - {{ $value->jam_kerja}} | Istirahat {{ $value->istirahat}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 justify-end pb-2">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>



