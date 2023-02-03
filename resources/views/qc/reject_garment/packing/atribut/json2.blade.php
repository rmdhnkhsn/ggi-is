<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('packing_detail.index', $packing_id) }}",
        columns: [
            {data: 'tanggal', name: 'tanggal'},
            {data: 'no_box', name: 'no_box'},
            {data: 'buyer', name: 'buyer'},
            {data: 'style', name: 'style'},
            {data: 'color', name: 'color'},
            {data: 'no_wo', name: 'no_wo'},
            {data: 'no_po', name: 'no_po'},
            {data: 'item', name: 'item'},
            {data: 'total', name: 'total'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
$('body').on('click', '.editReport', function (event) {
event.preventDefault();
var id = $(this).data('id');
  $.get('edit/' + id , function (data) {
      $('#modal-editReport').modal('show');
      $('#id').val(data.id);
      $('#date').val(data.tanggal);
      $('#box').val(data.no_box);
      $('#beli').val(data.buyer);
      $('#gaya').val(data.style);
      $('#wo').val(data.no_wo);
      $('#warna').val(data.color);
      $('#data_po').val(data.no_po);
      $('#barang').val(data.item);
      $('#jumlah').val(data.total);
      $('#ket').val(data.keterangan);
      console.log(data.id)
  })
});
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>