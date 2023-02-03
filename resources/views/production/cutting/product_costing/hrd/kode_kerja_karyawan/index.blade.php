@extends("layouts.app")
@section("title","Kode Kerja Karyawan")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/dataTablesSearchLeft.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush

@push("sidebar")
  @include('production.cutting.product_costing.layouts.navbar')
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{route('master_kode_kerja.index')}}" class="rc-col-2">
        <div class="cards bg-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-business-time"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Master Kode Kerja</div>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-user-clock"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Kode Kerja Karyawan</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12 mb-3">
        <div class="ctg-ppic-title">Employee Data</div>
      </div>
      <div class="col-12 justify-end">
        <a href="" class="btn-blue ml-2" data-toggle="modal" data-target="#add_employ">Add Data<i class="ml-2 fs-20 fas fa-plus"></i></a>
        @include('production.cutting.product_costing.hrd.kode_kerja_karyawan.partials.form-modal')
        <a href="" class="btn-blue ml-2" data-toggle="modal" data-target="#filter"><i class="fs-20 fas fa-filter"></i></a>
        <a href="{{route('kode_kerja_karyawan.export')}}" class="btn-green ml-2">Export<i class="ml-2 fs-18 fas fa-file-excel"></i></a>
        <a href="" class="btn-yellow ml-2" data-toggle="modal" data-target="#import">Import<i class="ml-2 fs-18 fas fa-upload"></i></a>
        @include('production.cutting.product_costing.hrd.kode_kerja_karyawan.partials.import-modal')
      </div>
    </div>
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card">
          <div class="tableSearch">
            <i class="fs-24 fas fa-search"></i>
          </div>
          <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="example1" class="table hrd-tbl-content no-wrap">
              <thead>
                <tr class="font-tr">
                  <th>ID</th>
                  <th>Periode</th>
                  <th>Hari Kerja</th>
                  <th>Tahun</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Gedung</th>
                  <th>Jabatan</th>
                  <th>Bagian</th>
                  <th>Group</th>
                  <th>Kategory</th>
                  <th>Departement</th>
                  <th>Status</th>
                  <th>Gaji Pokok</th>
                  <th>Prem. KRJ</th>
                  <th>Tun. Tetap</th>
                  <th>THP</th>
                  <th>GP+TJ</th>
                  <th>BPJamsostek</th>
                  <th>BPJS KS</th>
                  <th>Uang Makan</th>
                  <th>Gaji/Hari</th>
                  <th>Gaji/Jam(Normal)</th>
                  <th>Gaji/Jam(Lembur)</th>
                  <th>Kode Kerja</th>
                  <th>Jam Kerja</th>
                  <th>Istirahat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/dataTables-fixed-column-smqc.js')}}"></script>
<script type="text/javascript">
  $(function () {
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        fixedColumns:   {
            left: 6
        },
        ajax:{
				  url: "{{ route('kode_kerja_karyawan.index') }}"
			  },
        columns: [                 
            {data: 'id', name: 'id'},
            {data: 'periode', name: 'periode'},
            {data: 'hari_kerja', name: 'hari_kerja'},
            {data: 'tahun', name: 'tahun'},
            {data: 'nik', name: 'nik'},
            {data: 'nama', name: 'nama'},
            {data: 'gedung', name: 'gedung'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'bagian', name: 'bagian'},
            {data: 'group', name: 'group'},
            {data: 'kategory', name: 'kategory'},
            {data: 'departemen', name: 'departemen'},
            {data: 'statuskontrak', name: 'statuskontrak'},
            {data: 'gaji_pokok', name: 'gaji_pokok'},
            {data: 'prem_krj', name: 'prem_krj'},
            {data: 'tun_tetap', name: 'tun_tetap'},
            {data: 'thp', name: 'thp'},
            {data: 'gp_tun', name: 'gp_tun'},
            {data: 'bpjamsostek', name: 'bpjamsostek'},
            {data: 'bpjs_ks', name: 'bpjs_ks'},
            {data: 'uang_makan', name: 'uang_makan'},
            {data: 'gaji_per_hari', name: 'gaji_per_hari'},
            {data: 'gaji_per_jam', name: 'gaji_per_jam'},
            {data: 'gaji_per_jam_lembur', name: 'gaji_per_jam_lembur'},
            {data: 'kode_kerja', name: 'kode_kerja'},
            {data: 'jam_kerja', name: 'jam_kerja'},
            {data: 'istirahat', name: 'istirahat'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
  });

</script>
<script>
  $('.select2bs').select2({
    theme: 'bootstrap4'
  });
  $('.select2bs_packing2').select2({
    theme: 'bootstrap4'
  });
</script>
<script>
  $('.select2bs7').select2({
    theme: 'bootstrap4'
  });
</script>
<script>
  $(document).ready(function() {
    $(document).on('change', '.cari_nik', function() {

      var id = $(this).val();
      $.get('kode-kerja-karyawan/cari_nik' + id , function (data) {
          $('#inac').modal('show');
          $('#nik_karyawan').val(data.nik);
          $('#nama_karyawan').val(data.nama);
          $('#branch_karyawan').val(data.branch);
          $('#branchdetail_karyawan').val(data.branchdetail);
          console.log(data.nama)
      })
    });
  });
</script>
<script>
  $(document).ready(function() {
    $(document).on('change', '.kode_kerja', function() {

      var id = $(this).val();
      $.get('kode-kerja-karyawan/kode_kerja' + id , function (data) {
          $('#inac').modal('show');
          $('#kode_kerja_karyawan').val(data.kode_kerja);
          $('#jam_kerja_karyawan').val(data.jam_kerja);
          $('#istirahat_karyawan').val(data.istirahat);
          console.log(data.istirahat)
      })
    });
  });

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

  $('#Date').datetimepicker({
    format: 'YYYY',
    showButtonPanel: false
  })
  $('#Date2').datetimepicker({
    format: 'YYYY',
    showButtonPanel: false
  })
  $('#year').datetimepicker({
    format: 'YYYY',
    showButtonPanel: false
  })
</script>
@endpush