@extends("layouts.app")
@section("title","QUANTITY CHECK")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content aql">
  <div class="container-fluid accordionRound pb-5">
    <div class="row">
      <div class="col-12">
        <form action="">
          <div class="cards-part">
            <div class="cards-head justify-sb">
              <div class="title-24-dark2">INSPECTION QUANTITY</div>
              <a href="{{ route('aql.description.check')}}" class="btn-blue-md">Save & Next <i class="fs-18 ml-2 fas fa-caret-right"></i></a>
            </div>
            <div class="cards-body pt-3">
              <div class="accordionItems">
                <header class="accordionHeaders h-68">
                  <div class="title-24-grey">Size : SS</div>
                  <div class="icons2 ml-auto">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="TableSS" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>CATEGORY</th>
                                <th>PART</th>
                                <th>ROLE</th>
                                <th>IE</th>
                                <th>IC</th>
                                <th>IE</th>
                                <th>PL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>上衣TOPS</td>
                                <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordionItems">
                <header class="accordionHeaders h-68">
                  <div class="title-24-grey">Size : M</div>
                  <div class="icons2 ml-auto">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="TableM" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>CATEGORY</th>
                                <th>PART</th>
                                <th>ROLE</th>
                                <th>IE</th>
                                <th>IC</th>
                                <th>IE</th>
                                <th>PL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>上衣TOPS</td>
                                <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordionItems">
                <header class="accordionHeaders h-68">
                  <div class="title-24-grey">Size : L</div>
                  <div class="icons2 ml-auto">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="TableL" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>CATEGORY</th>
                                <th>PART</th>
                                <th>ROLE</th>
                                <th>IE</th>
                                <th>IC</th>
                                <th>IE</th>
                                <th>PL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>上衣TOPS</td>
                                <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordionItems">
                <header class="accordionHeaders h-68">
                  <div class="title-24-grey">Size : XL</div>
                  <div class="icons2 ml-auto">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="TableXL" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>CATEGORY</th>
                                <th>PART</th>
                                <th>ROLE</th>
                                <th>IE</th>
                                <th>IC</th>
                                <th>IE</th>
                                <th>PL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>上衣TOPS</td>
                                <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordionItems">
                <header class="accordionHeaders h-68">
                  <div class="title-24-grey">Size : XO</div>
                  <div class="icons2 ml-auto">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="TableXO" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>CATEGORY</th>
                                <th>PART</th>
                                <th>ROLE</th>
                                <th>IE</th>
                                <th>IC</th>
                                <th>IE</th>
                                <th>PL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>上衣TOPS</td>
                                <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                                <td>
                                  <div class="container-tbl-btn w-105">
                                    <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#TableSS').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });
  $(document).ready( function () {
    var table = $('#TableM').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });
  $(document).ready( function () {
    var table = $('#TableL').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });
  $(document).ready( function () {
    var table = $('#TableXL').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });
  $(document).ready( function () {
    var table = $('#TableXO').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });
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

    const accordionItems = document.querySelectorAll('.accordionItems')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItems[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

    accordionItems.forEach((item) =>{
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