<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('packing.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'grade', name: 'grade'},
            {data: 'created_by', name: 'created_by'},
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
  $.get('index/edit/' + id , function (data) {
      $('#modal-editReport').modal('show');
      $('#id').val(data.id);
      $('#date').val(data.tanggal);
      $('#standar').val(data.grade);
      console.log(data.id)
  })
});
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>