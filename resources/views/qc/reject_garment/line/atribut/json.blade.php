<script type="text/javascript">

$(document).ready(function() {
  var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "asc" ]],
    });
} );

$('body').on('click', '.editProduct', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('edit/' + id , function (data) {
      $('#modal-edit').modal('show');
      $('#id').val(data.id);
      $('#date').val(data.tanggal);
      $('#lines').val(data.line);
      $('#supervisor1').val(data.supervisor);
      $('#buyer1').val(data.buyer);
      $('#style1').val(data.style);
      $('#no_wo1').val(data.no_wo);
      $('#article1').val(data.article);
      $('#item1').val(data.item);
      $('#color1').val(data.color);
      $('#qty1').val(data.qty);
      $('#size1').val(data.size);
      console.log(data.id)
  })
});

$('body').on('click', '.showDetail', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('show_detail/' + id , function (data) {
      $('#modal-showDetail').modal('show');
      $('#test').val(data.id);
      $('#report').val(data.report_id);
      $('#bcd').val(data.report_id);
      $('#cacat').val(data.f_cacat);
      $('#bolong').val(data.f_bolong);
      $('#shadding').val(data.f_shadding);
      $('#kotor').val(data.f_kotor);
      $('#lain').val(data.f_lain);
      $('#c_cacat').val(data.s_cacat);
      $('#c_label').val(data.s_label);
      $('#c_kotor').val(data.s_kotor);
      $('#c_bolong').val(data.s_bolong);
      $('#c_ukuran').val(data.s_ukuran);
      $('#x_total').val(data.total);
      $('#x_keterangan').val(data.keterangan);
      console.log(data.id)
  })
});

$('body').on('click', '.editDetail', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('edit_detail/' + id , function (data) {
      $('#modal-editDetail').modal('show');
      $('#bd').val(data.id);
      $('#riweuh').val(data.report_id);
      $('#bcd').val(data.report_id);
      $('#j_cacat').val(data.f_cacat);
      $('#j_bolong').val(data.f_bolong);
      $('#j_shadding').val(data.f_shadding);
      $('#j_kotor').val(data.f_kotor);
      $('#j_lain').val(data.f_lain);
      $('#b_cacat').val(data.s_cacat);
      $('#b_label').val(data.s_label);
      $('#b_kotor').val(data.s_kotor);
      $('#b_bolong').val(data.s_bolong);
      $('#b_ukuran').val(data.s_ukuran);
      $('#z_keterangan').val(data.keterangan);
      console.log(data.id)
  })
});

$('body').on('click', '.addDetail', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('edit/' + id , function (data) {
      $('#modal-breakdown').modal('show');
      $('#report_id').val(data.id);
      console.log(data.id)
  })
});
</script>