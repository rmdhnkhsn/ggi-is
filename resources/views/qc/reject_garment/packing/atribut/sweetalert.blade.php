@if(Session::has('berhasil'))
<script>
toastr.success("{!!Session::get('berhasil')!!}");
</script>
@endif

@if(Session::has('sama'))
<script>
toastr.error("{!!Session::get('sama')!!}");
</script>
@endif

@if(Session::has('hapus'))
<script>
toastr.success("{!!Session::get('hapus')!!}");
</script>
@endif

@if(Session::has('update'))
<script>
toastr.success("{!!Session::get('update')!!}");
</script>
@endif
