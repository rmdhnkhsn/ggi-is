
@extends("layouts.no_breadcrumb.app")
@section("title","List Item")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
                    @include('MatDoc.invoiceNew.partials.stepbar')
                </div>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form  action="{{route('invoice.storeDataInvoice')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_invoice_detail" value="{{ $id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="cardPart">
                                        <div class="cardHead p-3">
                                            <div class="justify-sb3">
                                                <div class="title-20-blue no-wrap">INVOICE ITEM</div>
                                                <div class="endSide flexx gap-3">
                                                    <div class="DTtableSearch">
                                                        <input type="text" id="SearchText" class="searchText" placeholder="Search...">
                                                        <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <!-- <div class="flex gap-3">
                                                        <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                                                        <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section"></div>
                                        <div class="cardBody p-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                                        @include('MatDoc.invoiceNew.components.list_item.item_marubeni_corporation')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_marubeni_fashion')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_agron')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_hexapole')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_teijin')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_pentex')
                                                        @include('MatDoc.invoiceNew.components.list_item.item_matsuoka')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn-blue-md btnNext d-inline-block">Next & Save <i class="fs-18 ml-2 fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('/js/terbilang.js')}}"></script>
<script type="text/javascript">
  $('#totalInvoice').terbilang({
    lang: 'en',
    output: $('#terbilang')
  });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementsByClassName('form-control'); 
    let elementCreate = (optionlist)=> {
        console.log(optionlist)
        let oldList = document.querySelector('datalist')
        oldList.innerHTML = ''
        if(!optionlist) {
        } else {
            optionlist.map((data)=> {
                let option = document.createElement('option'); 
                option.setAttribute('value', data); 
                option.innerHTML = data
                oldList.appendChild(option)
            })
        }
        return
    }

    const storageDataLoad = localStorage.getItem('recomendation');
    let dataListLoad = JSON.parse(storageDataLoad);
    elementCreate(dataListLoad)

    Array.from(form).forEach(f => {
        f.addEventListener('blur', function(){   
            const storageData = localStorage.getItem('recomendation');
            let dataList = JSON.parse(storageData);
            if(!dataList) {
                dataList = []
            }
            let temp = dataList.find((data)=> data === f.value )
            if(!temp) {
                if(f.value !== '') {
                    // Buat data baru
                    let NewData = [...dataList, f.value]
                    // Push ke localstorage
                    localStorage.setItem('recomendation', JSON.stringify(NewData))
                    // Hapus child sebelumnya
                    elementCreate(NewData)
                }
            }

        })
    })



}, false);
</script>
<script>
   
//   $('.select2bs4').select2({
//       theme: 'bootstrap4'
//   })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
<script>
  $(document).ready( function () {
     
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("SearchBtn").click();
      }
  });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".unitPrice").keyup(function() {
            const node = this.parentNode.parentNode.parentNode;
            
            let qty = node.getElementsByClassName('qty')[0].value; 
            if(qty == '' ||  qty == '-' || qty == null) {
                node.getElementsByClassName('amount')[0].value = 0; 
            } else {
                node.getElementsByClassName('amount')[0].value = (parseFloat(qty) * parseFloat(this.value)).toFixed(2); 
            }
            // let total = node.getElementsByClassName('total')
            function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".amount").each(function() {
                    //add only if the value is number
                    if(!isNaN(this.value) && this.value.length!=0) {
                        sum += parseFloat(this.value);
                    }
                    console.log(sum)
                });
                //.toFixed() method will roundoff the final sum to 2 decimal places.
                $("#totalInvoice").val(sum.toFixed(0));
            } 
             node.getElementsByClassName('totalInvoice')[0].value = calculateSum(); 
            // var qty  = $("#qty").val();
            // // var unitPrice = $("#unitPrice").val();
            // var total2 = parseInt(qty) * parseInt(this.value);
            // $(".amount").val(total2);
        });
    });
</script>
@endpush
