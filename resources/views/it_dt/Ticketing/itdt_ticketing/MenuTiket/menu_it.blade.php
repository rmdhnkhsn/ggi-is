<div class="col-12">
  <div class="cards-18 p-4">
    <div class="row">
      <div class="col-12 flex" style="gap:1.4rem">
        <img src="{{url('images/iconpack/ticketing/IT.svg')}}" />
        <div class="titleTicket">
          <div class="title">IT Ticket</div>
          <div class="subTitle">Bantuan untuk masalah peralatan pendukung kerja, perangkat keras, perangkat lunak, jaringan dll. </div>
        </div>
      </div>
      <div class="col-12 mt-3 mb-4">
        <div class="borderlight"></div>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#networkIT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-wifi"></i>
            </div>
            <div class="title">Network</div>
            <div class="subTitle">Internet, Email, Bersama, CCTV, WIFI</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#softwareIT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-robot"></i>
            </div>
            <div class="title">Software</div>
            <div class="subTitle">Windows/ Ubuntu, Microsoft Office, Open Office, Zoom, Mic, Teams</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#hardwareIT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-desktop"></i>
            </div>
            <div class="title">Hardware</div>
            <div class="subTitle">PC, Printer, Isi tinta, Monitors, Mouse, Keyboard, Scaner, Telephone, Camera CCTV</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#peminjamanIT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-credit-card"></i>
            </div>
            <div class="title">Peminjaman</div>
            <div class="subTitle">Laptop, Infocus, Webcam, Microphone</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#rpaIT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-keyboard"></i>
            </div>
            <div class="title">RPA</div>
            <div class="subTitle">Robotic Process Automation</div>
          </div>
        </a>
      </div>
      @include('it_dt.Ticketing.itdt_ticketing.partials.modal.it')
    </div>
  </div>
</div>
<div class="col-12">
  <div class="cards-18 p-4">
    <div class="row">
      <div class="col-12 flex" style="gap:1.4rem">
        <img src="{{url('images/iconpack/ticketing/DT.svg')}}" />
        <div class="titleTicket">
          <div class="title">DT Ticket</div>
          <div class="subTitle">Bantuan untuk permasalahan aplikasi JDE, GCC, HRIS dan SMQC </div>
        </div>
      </div>
      <div class="col-12 mt-3 mb-4">
        <div class="borderlight"></div>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#jdeDT">
          <div class="categoryTicket">
            <div class="icons">
              <img src="{{ asset('/images/iconpack/ticketing/create_ticket/JDE.svg') }}"
                onmouseover="this.src='{{ asset('/images/iconpack/ticketing/create_ticket/JDE2.svg') }}';"
                onmouseout="this.src='{{ asset('/images/iconpack/ticketing/create_ticket/JDE.svg') }}';">
              </img>
            </div>
            <div class="title">JDE</div>
            <div class="subTitle">Pembuatan Akun, Perlu Panduan/Tutorial, Cek Data/Error, Request Report/Revisi dll.</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#gccDT">
          <div class="categoryTicket">
            <div class="icons">
              <img src="{{ asset('/images/iconpack/ticketing/create_ticket/GCC.svg') }}"
                onmouseover="this.src='{{ asset('/images/iconpack/ticketing/create_ticket/GCC2.svg') }}';"
                onmouseout="this.src='{{ asset('/images/iconpack/ticketing/create_ticket/GCC.svg') }}';">
              </img>
            </div>
            <div class="title">GCC</div>
            <div class="subTitle">Gistex Garmen Indonesia, Error aplikasi, tidak bisa login, dll</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#hrisDT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-users"></i>
            </div>
            <div class="title">HRIS</div>
            <div class="subTitle">Permasalahan seputar karyawan, Cuti, Mutasi jabatan, Dinas Luar Kota, dll.</div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="" data-toggle="modal" data-target="#smqcDT">
          <div class="categoryTicket">
            <div class="icons">
              <i class="fas fa-laptop-house"></i>
            </div>
            <div class="title">SMQC</div>
            <div class="subTitle">Error Aplikasi, Delete data, Tambah user</div>
          </div>
        </a>
      </div>
      @include('it_dt.Ticketing.itdt_ticketing.partials.modal.dt')
    </div>
  </div>
</div>