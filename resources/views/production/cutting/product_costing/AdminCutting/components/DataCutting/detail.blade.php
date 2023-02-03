@extends("layouts.app")
@section("title","Detail Data Daily Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-4">
        <div class="cards-20 p-4">
          <div class="title-12-grey mb-1">Buyer</div>
          <div class="title-14-dark2 text-truncate mb-3">H&M HENNES&MAURITZ (SHANGHAI TRADING)</div>
          <div class="title-12-grey mb-1">PO</div>
          <div class="title-14-dark2">G22M6129</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="cards-20 p-4">
          <div class="title-12-grey mb-1">WO</div>
          <div class="title-14-dark2 text-truncate mb-3">172453</div>
          <div class="title-12-grey mb-1">Article/Style</div>
          <div class="title-14-dark2">EC23SS38321</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="cards-20 p-4">
          <div class="title-12-grey mb-1">Item</div>
          <div class="title-14-dark2 text-truncate mb-3">EC23SS24340-1</div>
          <div class="title-12-grey mb-1">Total Qty Order </div>
          <div class="title-14-dark2">178</div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="cards-20 p-4">
          <div class="title-12-grey mb-1">Qty Cutting (Body)</div>
          <div class="title-14-dark2 text-truncate mb-3">78</div>
          <div class="title-12-grey mb-1">Balance</div>
          <div class="title-14-dark2">100</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 accordionIcon">
        <div class="accordionItem">
          <header class="accordionHeaders h-72 bg-white">
            <div class="numbers bg-softBlue c-blue h-72 w-72 fs-32">1</div>
            <div class="flex ml-4 w-100">
              <div class="w-15-percent">
                <div class="title-14-dark">Kategori</div>
                <div class="title-16-dark2">BODY</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Color</div>
                <div class="title-16-dark2">White</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Qty Order</div>
                <div class="title-16-dark2">500</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Qty Cutting</div>
                <div class="title-16-dark2">20</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Line Plan</div>
                <div class="title-16-dark2">L1A</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Overcut %</div>
                <div class="title-16-dark2">1%</div>
              </div>
            </div>
          </header>
          <div class="accordionContents">
            <div class="bodyContent p-3">
              <div class="cards-head" style="border: 1px solid #F2F2F2;">
                <div class="title-24-blue">Qty Breakdown</div>
              </div>
              <div class="cards-scroll scrollX p-2" id="scroll-bar2">
                <table class="tables3 tbl-content-cost no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th style="padding-top:2rem" rowspan="2">Order</th>
                      <th colspan="8" class="text-center">Breakdown Size Qty</th>
                      <th style="padding-top:2rem" rowspan="2" class="text-center">Total</th>
                    </tr>
                    <tr class="bg-thead2">
                      <th>SS</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>O</th>
                      <th>XO</th>
                      <th>YO</th>
                      <th>ZO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Qty Order</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td>Qty Overcutt</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td>Qty Output Cutting</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td class="fw-600">Balance</td>
                      <td class="fw-600">40</td>
                      <td class="fw-600">20</td>
                      <td class="fw-600">20</td>
                      <td class="fw-600">15</td>
                      <td class="fw-600">10</td>
                      <td class="fw-600">30</td>
                      <td class="fw-600">50</td>
                      <td class="fw-600">60</td>
                      <td class="text-center fw-600">240</td>
                    </tr>
                  </tbody> 
                </table>
              </div>
              <div class="cards-head mt-4" style="border: 1px solid #F2F2F2;">
                <div class="title-24-blue">Summary</div>
              </div>
              <div class="cards-scroll scrollX p-2" id="scroll-bar2">
                <table class="tables3 tbl-content-cost no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th style="padding-top:2rem" rowspan="2">MEJA</th>
                      <th style="padding-top:2rem" rowspan="2">TANGGAL</th>
                      <th style="padding-top:2rem" rowspan="2">RATIO</th>
                      <th colspan="8" class="text-center">Size</th>
                      <th style="padding-top:2rem" rowspan="2">Total</th>
                      <th style="padding-top:2rem" rowspan="2">Keterangan</th>
                      <th style="padding-top:2rem" rowspan="2">Tanggal Shipment</th>
                      <th style="padding-top:2rem" rowspan="2">Tanggal Ambil</th>
                    </tr>
                    <tr class="bg-thead2">
                      <th>SS</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>O</th>
                      <th>XO</th>
                      <th>YO</th>
                      <th>ZO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>27 Okt 2022</td>
                      <td>1.2.1.2</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="text" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="date" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="date" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                    </tr>
                  </tbody> 
                </table>
              </div>
              <a href="" class="btn-blue-md mt-4">Simpan <i class="fs-18 ml-2 fas fa-download"></i></a>
            </div>
          </div> 
        </div>
        <div class="accordionItem">
          <header class="accordionHeaders h-72 bg-white">
            <div class="numbers bg-softBlue c-blue h-72 w-72 fs-32">2</div>
            <div class="flex ml-4 w-100">
              <div class="w-15-percent">
                <div class="title-14-dark">Kategori</div>
                <div class="title-16-dark2">RIB</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Color</div>
                <div class="title-16-dark2">Black</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Qty Order</div>
                <div class="title-16-dark2">780</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Qty Cutting</div>
                <div class="title-16-dark2">60</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Line Plan</div>
                <div class="title-16-dark2">L1B</div>
              </div>
              <div class="w-15-percent">
                <div class="title-14-dark">Overcut %</div>
                <div class="title-16-dark2">3%</div>
              </div>
            </div>
          </header>
          <div class="accordionContents">
            <div class="bodyContent p-3">
              <div class="cards-head" style="border: 1px solid #F2F2F2;">
                <div class="title-24-blue">Qty Breakdown</div>
              </div>
              <div class="cards-scroll scrollX p-2" id="scroll-bar2">
                <table class="tables3 tbl-content-cost no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th style="padding-top:2rem" rowspan="2">Order</th>
                      <th colspan="8" class="text-center">Breakdown Size Qty</th>
                      <th style="padding-top:2rem" rowspan="2" class="text-center">Total</th>
                    </tr>
                    <tr class="bg-thead2">
                      <th>SS</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>O</th>
                      <th>XO</th>
                      <th>YO</th>
                      <th>ZO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Qty Order</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td>Qty Overcutt</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td>Qty Output Cutting</td>
                      <td>40</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                    </tr>
                    <tr>
                      <td class="fw-600">Balance</td>
                      <td class="fw-600">40</td>
                      <td class="fw-600">20</td>
                      <td class="fw-600">20</td>
                      <td class="fw-600">15</td>
                      <td class="fw-600">10</td>
                      <td class="fw-600">30</td>
                      <td class="fw-600">50</td>
                      <td class="fw-600">60</td>
                      <td class="text-center fw-600">240</td>
                    </tr>
                  </tbody> 
                </table>
              </div>
              <div class="cards-head mt-4" style="border: 1px solid #F2F2F2;">
                <div class="title-24-blue">Rekap Daily Cutting</div>
              </div>
              <div class="cards-scroll scrollX p-2" id="scroll-bar2">
                <table class="tables3 tbl-content-cost no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th style="padding-top:2rem" rowspan="2">MEJA</th>
                      <th style="padding-top:2rem" rowspan="2">TANGGAL</th>
                      <th style="padding-top:2rem" rowspan="2">RATIO</th>
                      <th colspan="8" class="text-center">Size</th>
                      <th style="padding-top:2rem" rowspan="2">Total</th>
                      <th style="padding-top:2rem" rowspan="2">Keterangan</th>
                      <th style="padding-top:2rem" rowspan="2">Tanggal Shipment</th>
                      <th style="padding-top:2rem" rowspan="2">Tanggal Ambil</th>
                    </tr>
                    <tr class="bg-thead2">
                      <th>SS</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>O</th>
                      <th>XO</th>
                      <th>YO</th>
                      <th>ZO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>27 Okt 2022</td>
                      <td>1.2.1.2</td>
                      <td>20</td>
                      <td>20</td>
                      <td>15</td>
                      <td>15</td>
                      <td>10</td>
                      <td>30</td>
                      <td>50</td>
                      <td>60</td>
                      <td class="text-center">240</td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="text" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="date" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn">
                          <input type="date" class="form-control borderInput w-150" id="" name="" placeholder="-">
                        </div>
                      </td>
                    </tr>
                  </tbody> 
                </table>
              </div>
              <a href="" class="btn-blue-md mt-4">Simpan <i class="fs-18 ml-2 fas fa-download"></i></a>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $( document ).ready(function() {
    const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
      }else{
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
      }
    }

    const accordionItem = document.querySelectorAll('.accordionItem')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItem[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

    accordionItem.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
        const openItem = document.querySelector('.accordion-open')
        
        toggleItem(item)

        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
      })
    })
  });
</script>
@endpush