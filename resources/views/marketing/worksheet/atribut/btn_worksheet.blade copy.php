<!-- <a href="{{route('worksheet.finish', $row['id'])}}" class="btn btn-primary btn-sm" title="Show Worksheet"><i class="fas fa-eye"></i></a>
<a href="{{route('worksheet.count', $row['id'])}}" class="btn btn-warning btn-sm" title="Edit Worksheet"><i class="fas fa-edit"></i></a>
<a href="{{route('worksheet.cancel_count', $row['id'])}}" class="btn btn-danger btn-sm" title="Cancel Count"><i class="fas fa-ban"></i></a> -->

<div class="container-tbl-btn flex gap-2">
    <a href="" class="btn-icon-blue" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Preview"><i class="fs-18 fas fa-info"></i></a>
    <a href="{{route('worksheet.count', $row['id'])}}" class="btn-icon-yellow" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit Worksheet"><i class="fs-18 fas fa-pencil-alt"></i></a>
    <a href="#" class="btn-icon-yellow" id="modalRevisi" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Revisi"><i class="fs-18 fas fa-comment-alt"></i></a>
</div>
@include('marketing.worksheet.partials.modal-revisi')
