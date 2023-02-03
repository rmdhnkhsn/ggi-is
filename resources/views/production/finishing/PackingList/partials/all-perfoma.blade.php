<div class="cards-18" style="padding: 28px 22px">
    <div class="title-20 text-left"> ALL Data Performa Packing List</div>
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
                            <?php
                                // Groupby buyer 
                                $packingBuyer = collect($dataDetail)->groupBy('buyer');
                            ?>
                            @foreach ($packingBuyer as $key =>$value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $key }}</td>
                                <td>
                                    <div class="container-tbl-btn">
                                        <a href="{{ route('packing-details',$key)}}" class="btn-blue-md" style="width:110px">Details<i class="fs-18 ml-3 fas fa-chevron-right"></i></a>
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