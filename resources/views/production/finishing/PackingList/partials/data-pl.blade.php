<div class="cards-18" style="padding: 28px 22px">
    <div class="title-20 text-left">ALL Data PL to Ekspedisi</div>
        <div class="row mt-4">   
            <div class="col-12">
                <div class="cards-scroll pr-2 scrollY" id="scroll-bar-sm" style="max-height:382px">
                    <table class="table tbl-content-left">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>BUYER</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataBuyer as $key =>$value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $key }}</td>
                                <td>
                                    <div class="container-tbl-btn">
                                    <a href="{{ route('expedisi-details',$key)}}" class="btn-blue-md" style="width:110px">Details<i class="fs-18 ml-2 fas fa-chevron-right"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>