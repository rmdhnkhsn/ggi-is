
<div class="row">
    <div class="col-12 display mb-4">
        <div class="title-28 titleNone">Daily Abscence </div>
        <div class="filterSearch">
            <div class="container-form">
                <input type="text" id="SearchText2" class="searchText" placeholder="search employee..." required>
                <button type="button" id="SearchBtn2" class="iconSearch"><i class="fas fa-search"></i></button>
            </div>
            <div class="input-group" style="width:380px">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue px-3" style="border-radius:10px 0 0 10px" for=""><i class="fs-20 fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control borderInput10">
            </div>
            <a href="" class="btn-green-md">CSV<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12" style="padding-bottom:2.3rem">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable2" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>NIK</th> 
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Telphone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>John</td>
                        <td>CLN</td>
                        <td class="no-wrap">12-12-2021</td>
                        <td class="no-wrap">085864620738</td>
                        <td>
                            <div class="container-tbl-btn">
                                <div class="badge-green" style="width:87px">Tepat</div>
                                <!-- <div class="badge-yellow" style="width:87px">Telat</div>
                                <div class="badge-pink" style="width:87px">Mangkir</div>
                                <div class="badge-blue" style="width:87px">Cuti</div>
                                <div class="badge-brown" style="width:87px">Izin</div>
                                <div class="badge-grey" style="width:87px">Libur</div> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5566787</td>
                        <td>Agus</td>
                        <td>CLN</td>
                        <td class="no-wrap">12-12-2021</td>
                        <td class="no-wrap">085864620738</td>
                        <td>
                            <div class="container-tbl-btn">
                                <!-- <div class="badge-green" style="width:87px">Tepat</div> -->
                                <div class="badge-yellow" style="width:87px">Telat</div>
                                <!-- <div class="badge-pink" style="width:87px">Mangkir</div>
                                <div class="badge-blue" style="width:87px">Cuti</div>
                                <div class="badge-brown" style="width:87px">Izin</div>
                                <div class="badge-grey" style="width:87px">Libur</div> -->
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>