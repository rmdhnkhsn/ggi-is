
<div class="row">
    <div class="col-12 justify-sb2 mb-3">
        <div class="justify-start2 gap-3">
            <div class="title-20-grey">Karyawan yang mengajukan Cash Request</div>
            <button type="button" class="btnSoftBlue ml-3" data-toggle="modal" data-target="#filter">Filter <i class="fs-20 ml-2 fas fa-filter"></i></button>
            @include('Approval.RequestApproval.partials.filter')
        </div>
        <form  action="{{route('tiket-approvalall-acc')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flexx gap-3">
                <div class="checkedAll">
                    <input type="checkbox" id="checkAll" class="check1 checkAll" />
                    <label for="checkAll" class="title-14">Select All</label>
                </div>
                <button type="button" class="btn-red-md rejectAll">Reject <i class="fs-18 ml-2 fas fa-times"></i></button>
                <button type="button" class="btn-green-md approveAll">Approve <i class="fs-18 ml-2 fas fa-check"></i></button>
                <input  type="number" class="d-none" id="app" name="app" required />
            </div>
        </div>
        @foreach($request_tiket as $key=> $value)
            <div class="col-md-3">
                <div class="cardApprove">
                    <div class="justify-sb">
                        <div class="title-13">{{$value->nik}}</div>
                        <input type="checkbox" class="check1 subCheck checked cekamount" id="check{{$value->id}}" name="id_tiket[]" value="{{$value->id}}">
                    </div>
                        <!-- <input type="hidden" class="check ValCek" id="status_app{{$value->id}}" name="status_app[]" value="0">
                        <input type="hidden" name="id_tiket[]" value="{{$value->id}}"> -->
                        <input type="hidden" class="AmountRencana" value="{{round($value['amount_rencana'],2)}}">

                    <a href="#" class="content" data-toggle="modal" data-target="#details{{$value->id}}">
                        <div class="title-16-dark text-truncate">{{$value->nama}}</div>
                        <div class="title-13 mt-3">{{$value->pencairan}}</div>
                        <div class="title-14-dark3 truncate">{{$value->deskripsi}}</div>
                        <div class="title-20-blue mt-1">Rp. {{number_format($value->amount_rencana, 2, ",", ".")}}</div>
                        @if($value->kategori=='Transfer')
                        <div class="justify-start">
                            <div class="badgeTransfer mt-3">Transfer</div>
                        </div>
                        @else
                        <div class="justify-start">
                            <div class="badgeCash mt-3">Cash</div>
                        </div>
                        @endif
                    </a>
                    @include('Approval.RequestApproval.partials.details')
                </div>
            </div>
            <script>
            $(document).on('click', '#check{{$value->id}}', function(){
                var status = document.getElementById('check{{$value->id}}').value;
                if(document.getElementById('check{{$value->id}}').checked){
                var result = '1'; 

                document.getElementById('status_app{{$value->id}}').value = result;
                }
                else{
                var result = 0; 
                document.getElementById('status_app{{$value->id}}').value = result;
                }    

            }); 
            </script>
        @endforeach
    </form>
</div>

