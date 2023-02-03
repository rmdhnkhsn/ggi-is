<div class="col-12">
        <div class="cards-18 p-4">
          <div class="row">
            <div class="col-12 flex" style="gap:1.4rem">
              <img src="{{url('images/iconpack/ticketing/calculate.svg')}}" />
              <div class="titleTicket">
                <div class="title">Accounting Ticket</div>
                <div class="subTitle">Bantuan untuk semua kegiatan yang berhubungan dengan keuangan.</div>
              </div>
            </div>
            <div class="col-12 mt-3 mb-4">
              <div class="borderlight"></div>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="" data-toggle="modal" data-target="#acc">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                  <div class="title">Cash Request</div>
                  <div class="subTitle">Permintaan Uang tunai atau Transfer untuk keperluan kantor</div>
                </div>
              </a>
            </div>
            @include('it_dt.Ticketing.itdt_ticketing.partials.modal.acc')
          </div>
        </div>
      </div>