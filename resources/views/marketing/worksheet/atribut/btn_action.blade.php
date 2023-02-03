<!-- <a href="" class="btn btn-seru btn-sm title-navigate-home"><i class="fas fa-info icon-seru"></i></a> -->
<div class="container-tbl-btn flex gap-3">
    <a href="{{route('worksheet.general',$row['id'])}}" class="btn-blue-md no-wrap" style="max-width:168px">Create Worksheet</a>
    <a href="#" class="btn-icon-green" data-toggle="modal" data-target="#copyWorksheet{{$row['id']}}"><i class="fs-20 fas fa-copy"></i></a>
</div>
@include('marketing.worksheet.partials.copy-worksheet')