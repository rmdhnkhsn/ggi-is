<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form  action="{{route('kode_kerja_karyawan.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row px-4">
                    <div class="col-12">
                        <span class="title-sm">Import Document</span>
                        <div class="custom-file mt-1">
                            <input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                            <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span class="title-sm">Periode</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-GI" for="" style="width: 93px">Periode</span>
                            </div>
                            <select class="form-control select2bs4 border-input" id="periode" name="periode">
                                <option selected disabled>Input Periode</option>
                                <option value="21 Januari - 20 Februari">21 Januari - 20 Februari</option>
                                <option value="21 Februari - 20 Maret">21 Februari - 20 Maret</option>
                                <option value="21 Maret - 20 April">21 Maret - 20 April</option>
                                <option value="21 April - 20 Mei">21 April - 20 Mei</option>
                                <option value="21 Mei - 20 Juni">21 Mei - 20 Juni</option>
                                <option value="21 Juni - 20 Juli">21 Juni - 20 Juli</option>
                                <option value="21 Juli - 20 Agustus">21 Juli - 20 Agustus</option>
                                <option value="21 Agustus - 20 September">21 Agustus - 20 September</option>
                                <option value="21 September - 20 Oktober">21 September - 20 Oktober</option>
                                <option value="21 Oktober - 20 November">21 Oktober - 20 November</option>
                                <option value="21 November - 20 Desember">21 November - 20 Desember</option>
                                <option value="21 Desember - 20 Januari">21 Desember - 20 Januari</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span class="title-sm">Tahun</span>
                        <div class="input-group date mt-1" id="year" data-target-input="nearest">
                            <div class="input-group-append datepiker" data-target="#year" data-toggle="datetimepicker">
                                <div class="custom-calendar"><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Tahun</span><i class="ml-2 fas fa-caret-down"></i>
                                </div>
                            </div>
                            <input type="text" name="tahun" id="tahun" class="form-control datetimepicker-input border-input" data-target="#year" placeholder="Pilih Tahun" />
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <span class="general-identity-title">Kode Kerja</span>
                        <div class="mt-2">
                            <select class="custom-select border-input select2bs7" name="kode_kerja" required>
                                <option disabled selected>Masukan Kode Kerja</option>
                                @foreach($kode_kerja as $key => $value)
                                <option value="{{$value->kode_kerja}}">{{$value->kode_kerja}} ( {{$value->jam_kerja}} Jam Kerja - Istirahat {{$value->istirahat}} Menit )</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <span class="title-sm">Hari Kerja</span>
                        <div class="field mt-1">
                            <input type="text" class="form-control border-input" id="hari_kerja" name="hari_kerja">
                        </div>
                    </div>
                    <div class="col-12 mt-2 mb-4">
                        <button type="submit" class="btn-blue btn-block">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>