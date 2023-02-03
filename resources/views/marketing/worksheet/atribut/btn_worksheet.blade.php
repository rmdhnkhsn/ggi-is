<div class="container-tbl-btn flex gap-2">
    <a href="{{route('worksheet.finish', $row['id'])}}" class="btn-icon-blue" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Preview"><i class="fs-18 fas fa-info"></i></a>
    <a href="{{route('worksheet.count', $row['id'])}}" class="btn-icon-yellow" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit Worksheet"><i class="fs-18 fas fa-pencil-alt"></i></a>
    <a href="#" class="btn-icon-yellow" id="{{$row['id']}}" onclick="myFunction(this.id)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Revisi"><i class="fs-18 fas fa-comment-alt"></i></a>
</div>
@include('marketing.worksheet.partials.modal-revisi')
<script>
  function myFunction(clicked_id) {
    $(".modalRevisi"+clicked_id).click();
    $('.select2bs4'+clicked_id).select2({
        theme: 'bootstrap4'
    })
  }
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>