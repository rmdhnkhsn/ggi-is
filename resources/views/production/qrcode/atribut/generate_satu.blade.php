@include('production.layouts.header')
@include('production.layouts.navbar3')
<style>
.btn_abu {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #DBDBDB;
}
.btn_ijo {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #67C965;
}
.label_ijo{
    font-size: 18px;
    color: #67C965;
    text-align:center;
    font-weight:bold;
}
.label_abu{
    font-size: 18px;
    color: #DBDBDB;
    text-align:center;
    font-weight:bold;
}
</style>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="container col-12" style="padding-top:20px;">
                <div class="row" style="padding-bottom:30px;">
                  <a href="{{route('qrcode.generate_satu')}}" class="col-lg-6 col-6">
                      <div>
                          <div class="label_ijo"> CHART PARAMETER WAKTU SYSTEM SIGNAL TOWER</div>
                          <div class="container btn_ijo"></div>
                      </div>
                  </a>
                  <a href="{{route('qrcode.generate_satu')}}" class="col-lg-6 col-6">
                      <div>
                          <div class="label_abu"> CHART  PARAMETER QUANTITY SYSTEM SIGNAL TOWER</div>
                          <div class="container btn_abu"></div>
                      </div>
                  </a>
                </div>
              </div>
                <div class="card-body">
                  
                        

                      </div>

                    </div>

                </div>

            </div>
            
          </div>

        </div>

      </div>
  
    </section>
  </div>
  @include('production.layouts.footer')

