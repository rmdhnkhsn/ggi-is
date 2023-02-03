@extends("layouts.no_breadcrumb.app")
@section("title","Invoice List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
<section class="content">
  <div class="container-fluid invoiceList">
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards3 py-4 mt-3">
          <ul class="nav nav-tabs orangeTabs">
            <li class="nav-side">
              <a href="{{ route('invoice.index')}}" class="btnPrevious"><i class="fas fa-arrow-left"></i>Back To List</a> 
            </li>
            <li class="nav-item-show">
              <a class="nav-link active btnPrevious" data-bs-toggle="tab"\>
                <div class="number">1</div>
                Buyer
              </a>
              <div class="sliderOrange"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link btnNext" data-bs-toggle="tab" href="#Information">
                <div class="number">2</div>
                {{-- <div class="checkGreen"><img src="{{url('images/iconpack/invoice/double-check.svg')}}"></div> --}}
                Information
              </a>
              <div class="sliderOrange"></div>
            </li>
            <li class="nav-item-show">
              <a href="" class="nav-link" data-bs-toggle="tab">
                <div class="number">3</div>
                List Item
              </a>
              <div class="sliderOrange"></div>
            </li>
            <li class="nav-item-show">
              <a href="" class="nav-link" data-bs-toggle="tab">
                <div class="number">4</div>
                Preview
              </a>
              <div class="sliderOrange"></div>
            </li>
            <li class="nav-side">
              <a href="" class="btn-blue-md no-wrap">Save Draft</a> 
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane " id="Buyer">
            @include('MatDoc.invoice.edit.buyerEdit')
          </div>
          <div class="tab-pane active" id="Information">
            @include('MatDoc.invoice.edit.information')
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

 {{-- <script>
   $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  /* When click New customer button */
    });

  function testing(ID) {
   console.log(ID)
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("invoiceList.buyer") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          // console.log(data)
          $('#consigne').val(data.consigne)
          $('#shipto').val(data.shipto)
          $('#company_bene').val(data.company_bene)
          $('#address_bene').val(data.address_bene)
          $('#city_bene').val(data.city_bene)
          $('#country_bene').val(data.country_bene)
          $('#country_cons').val(data.country_cons)
          $('#partOfDestination').val(data.partOfDestination)
          $('#manufacture_name').val(data.manufacture_name)
          $('#address_manu').val(data.address_manu)
          $('#country_manu').val(data.country_manu)
          $('#telp_manu').val(data.telp_manu)
          $('#mid_manu').val(data.mid_manu)
          $('#buyer_detail').val(data.buyer_detail)
          $('#address').val(data.address)
          $('#country').val(data.country)
          $('#telp').val(data.telp) 
          $('#country_cons').val(data.country_cons) 
          $('#buyer_detail').val(data.buyer_detail) 
          $('#buyer_notif').val(data.buyer_notif) 
          $('#address_notif').val(data.address_notif) 
          $('#country_notif').val(data.country_notif) 
        },

      });
    }
  }
</script> --}}
<script>
  const accordionItems = document.querySelectorAll('.accordionItem3')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeader3')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContent3')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>
<script>
  $('.btnNext').click(function() {
    const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
    const nextTab = new bootstrap.Tab(nextTabLinkEl);
    nextTab.show();
  });

  // $('.btnPrevious').click(function() {
  //   const prevTabLinkEl = $('.nav-tabs .active').closest('li').prev('li').find('a')[0];
  //   const prevTab = new bootstrap.Tab(prevTabLinkEl);
  //   prevTab.show();
  // });

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>
@endpush