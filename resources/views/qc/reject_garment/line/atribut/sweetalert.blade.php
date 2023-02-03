@if(Session::has('berhasil'))
<script>
toastr.success("{!!Session::get('berhasil')!!}");
</script>
@endif

@if(Session::has('tes'))
<script>
toastr.error("{!!Session::get('tes')!!}");
</script>
@endif

@if(Session::has('detail_berhasil'))
<script>
toastr.success("{!!Session::get('detail_berhasil')!!}");
</script>
@endif

@if(Session::has('hapus_oke'))
<script>
toastr.success("{!!Session::get('hapus_oke')!!}");
</script>
@endif

@if(Session::has('detail_edit'))
<script>
toastr.success("{!!Session::get('detail_edit')!!}");
</script>
@endif 


@if(Session::has('error_detail'))
<script>
toastr.error("{!!Session::get('error_detail')!!}");
</script>
@endif