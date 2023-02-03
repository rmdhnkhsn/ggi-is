<div class="col-12">
        <div class="cards-18 p-4">
          <div class="row">
            <div class="col-12 flex" style="gap:1.4rem">
              <img src="{{url('images/iconpack/ticketing/HR.svg')}}" />
              <div class="titleTicket">
                <div class="title">HR & GA Ticket</div>
                <div class="subTitle">Bantuan untuk permasalahan compliance, umum, booking, payroll, dll</div>
              </div>
            </div>
            <div class="col-12 mt-3 mb-4">
              <div class="borderlight"></div>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="" data-toggle="modal" data-target="#complianceHR">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="title">Compliance</div>
                  <div class="subTitle">Ajukan pertanyaan seputar compliance </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="" data-toggle="modal" data-target="#umumHR">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-user-cog"></i>
                  </div>
                  <div class="title">Umum</div>
                  <div class="subTitle">Permintaan makan di jam lembur</div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="" data-toggle="modal" data-target="#puHR">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-broom"></i>
                  </div>
                  <div class="title">PU</div>
                  <div class="subTitle">Permintaan Bersih ruangan & Toilet, Isi ulang galon, ganti lampu dll.</div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="{{ route('create-booking') }}">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-building"></i>
                  </div>
                  <div class="title">Booking</div>
                  <div class="subTitle">Booking ruangan meeting </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-6">
              <a href="" data-toggle="modal" data-target="#payrollHR">
                <div class="categoryTicket">
                  <div class="icons">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                  <div class="title">Payroll</div>
                  <div class="subTitle">Ajukan pertanyaan seputar payroll atau penggajian. </div>
                </div>
              </a>
            </div>
            @include('it_dt.Ticketing.itdt_ticketing.partials.modal.hrga')
          </div>
        </div>
      </div>