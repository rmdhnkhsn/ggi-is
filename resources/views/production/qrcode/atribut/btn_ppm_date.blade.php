@if(auth()->user()->role == 'PPIC_USER' || auth()->user()->role== 'SYS_ADMIN')
    <form action="{{ route('update.ppm-date', [$row->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @if($row['ppm_date'] === null)
        <div class="container-tbl-btn flex">
            <input type="date" class="form-control input-ppm-date border-input" value="{{ $row->ppm_date }}" id="ppm_date-{{ $row->id }}" name="ppm_date">
            <button type="submit" class="btn btn-primary btn-sm ml-2 btn-save" id="save-ppm-date-{{ $row->id }}">Save</button>
        </div>
        @else
        <div class="container-tbl-btn flex">
            <input type="date" class="form-control input-ppm-date border-input" value="{{ $row->ppm_date }}" id="ppm_date-{{ $row->id }}"name="ppm_date">
            <button type="submit" class="btn btn-info btn-sm ml-2" id="save-ppm-date-{{ $row->id }}">Edit</button>
        </div>
        @endif
    </form>
@else
    @if($row['ppm_date'] === null)
        <div class="container-tbl-btn flex">
            <input type="date" class="form-control input-ppm-date border-input" value="{{ $row->ppm_date }}" id="ppm_date-{{ $row->id }}" name="ppm_date" readonly>
            <button type="submit" class="btn btn-primary btn-sm ml-2 btn-save" id="save-ppm-date-{{ $row->id }}"  disabled>Save</button>
        </div>
        @else
        <div class="container-tbl-btn flex">
            <input type="date" class="form-control input-ppm-date border-input" value="{{ $row->ppm_date }}" id="ppm_date-{{ $row->id }}"name="ppm_date" readonly>
            <button type="submit" class="btn btn-info btn-sm ml-2" id="save-ppm-date-{{ $row->id }}" disabled>Edit</button>
        </div>
    @endif

@endif