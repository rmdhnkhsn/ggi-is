<button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-ellipsis-h"></i>
</button>
<div class="dropdown-menu">
    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailsIn{{ $row['id'] }}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Details Asset</button>
    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editIn{{ $row['id'] }}"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</button>
    <a href="{{route ('asset.master.deleteAssetTransaction', $row['id'])}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
</div>

@include('production.assetManagement.partials.transaction.modal.modal-action-in')