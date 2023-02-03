
<div class="col-12 mt-4 mb-5 d-flex justify-content-center">
    <div id="recipeCarousel" class="carousel slide position-static carouselNone" style="width : 92%" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="#" class="navCard" onclick="set_appname('');">
                    <div class="judul">All</div>
                    <div class="number">{{$traffic_all}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-chart-pie"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('pic/schedule');">
                    <div class="judul">Production Schedule</div>
                    <div class="number">{{$traffic_production_schedule}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-industry"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('mkt/rekap-order');">
                    <div class="judul">Rekap Order</div>
                    <div class="number">{{$traffic_rekap_order}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-chart-bar"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('prd/sewing');">
                    <div class="judul">Upload Sewing</div>
                    <div class="number">{{$traffic_sewing_upload}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-file-import"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('itd/ticket');">
                    <div class="judul">Ticketing</div>
                    <div class="number">{{$traffic_ticketing}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-ticket-alt"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('mrp/weekly-question');">
                    <div class="judul">Monitoring Covid</div>
                    <div class="number">{{$traffic_monitoring_covid}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-ticket-alt"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard" onclick="set_appname('cmc/approval');">
                    <div class="judul">Approval Overtime</div>
                    <div class="number">{{$traffic_approval_overtime}}</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-ticket-alt"></i>
                </a>
            </div>
            <!-- <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">IT & DT</div>
                    <div class="number">1.200</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-robot"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Quality Control</div>
                    <div class="number">800</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-cogs"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Production</div>
                    <div class="number">200</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-industry"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Marketing</div>
                    <div class="number">800</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-chart-bar"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Purchasing</div>
                    <div class="number">600</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Internal Audit</div>
                    <div class="number">230</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-podcast"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">HR & GA</div>
                    <div class="number">6.500</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-user"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">PPIC</div>
                    <div class="number">1.500</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-calendar-alt"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">GGI Indah</div>
                    <div class="number">900</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-building"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Mat & Doc</div>
                    <div class="number">600</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-file-signature"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Sample Room</div>
                    <div class="number">100</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-tshirt"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">More Program</div>
                    <div class="number">3.500</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-receipt"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Warehouse</div>
                    <div class="number">200</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-warehouse"></i>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#" class="navCard">
                    <div class="judul">Others</div>
                    <div class="number">1.500</div>
                    <div class="visitor">Visitors</div>
                    <i class="fas fa-th"></i>
                </a>
            </div> -->
        </div>
        <a class="carouselPrev" href="#recipeCarousel" role="button" data-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carouselNext" href="#recipeCarousel" role="button" data-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</div>