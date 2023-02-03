<form action="{{route('invoice.storeInvoiceHeader')}}" method="post" enctype="multipart/form-data">
    @csrf 
    <input type="hidden"  name="buyer_detail" value="{{ $data->buyer }}">
    <input type="hidden" name="invoice_final_id" value="{{ $filter }}">
    <div class="row p-4">
        <div class="col-md-5">
            <div class="row sticky-top-position">
                <div class="pd-info">
                    <div class="title-26"><span class="text-biru">#Step 2</span> Information</div>
                    <div class="title-14-dark mt-3">Isi Informasi Invoice dengan lengkap untuk Beneficiary, Consigne, Account & Risk, Container & Seal Number, Delivery Therm, Shipment information, Notify Party, Exporter, Account dll.</div>
                </div>
                <div class="notice">
                    <img src="{{url('images/iconpack/invoice/paper.svg')}}" class="imgPaper">
                    <div class="text">
                        <div class="judul">Form tidak Lengkap..? </div>
                        <div class="content my-1">Jika form tidak lengkap atau tidak sesuai dengan kebutuhan, silahkan pilih buyer yang sesuai dengan invoice yang akan dibuat.</div>
                        <a class="selectBuyer btnPrevious">Select Buyer <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7"> 
            <div class="cardFlat p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="title-24-blue mb-3">INVOICE HEADER</div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Invoice Title</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="invoice_title" value="Commercial Invoice" placeholder="Commercial Invoice" readonly>
                    </div>
                    <div class="col-12">
                        <input type="hidden" id="siBuyer" value="{{$data->buyer}}">
                        <!-- (-BENEFICIARY-) -->
                        @include('MatDoc.invoiceNew.components.info.beneficiary')
                        
                        <!-- (-EXPORTER-) -->
                        @include('MatDoc.invoiceNew.components.info.exporter')

                        <!-- (-SHIPPER-) PANTEX -->
                        @include('MatDoc.invoiceNew.components.info.shipper-pantex')
                     
                        <!-- (-CONSIGNEE/ SHIP TO-) -->
                        @include('MatDoc.invoiceNew.components.info.consignee')

                        <!-- (-NOTIFY PARTY-) -->
                        @include('MatDoc.invoiceNew.components.info.notify-party')
                       
                        <!-- (-CONTRACT-) MARUBENI -->
                        @include('MatDoc.invoiceNew.components.info.contract-marubeni')

                        <!-- (-CONTAINER & SEAL NUMBER-)  --> 
                        @include('MatDoc.invoiceNew.components.info.container-seal-number')
                       
                        <!-- (-CARRIER-) TAIJIN, HONGKONG -->
                        @include('MatDoc.invoiceNew.components.info.carrier-taijin')
                       
                        <!-- (-FOR ACCOUNT & RISK-) -->
                        @include('MatDoc.invoiceNew.components.info.for-account-risk')
                       
                        <!-- (-DELIVER TERMS-) -->
                        @include('MatDoc.invoiceNew.components.info.deliver-terms')                      

                        <!-- (-DELIVER TERMS PENTEXXX-) -->
                        @include('MatDoc.invoiceNew.components.info.deliver-terms-pantex')

                        <!-- (-NEGOTIATION BANK-) PANTEX -->
                        @include('MatDoc.invoiceNew.components.info.negotiation-bank-pantex')
                        
                        <!-- (-MANUFACTURE-) -->
                        @include('MatDoc.invoiceNew.components.info.manufacture')
                        
                        <!-- (-SHIPMENT INFO-) -->
                        @include('MatDoc.invoiceNew.components.info.shipment-info')
                       
                        <!-- (-SHIPMENT INFO MARUBENI ONLY-) -->
                        @include('MatDoc.invoiceNew.components.info.shipment-info-marubeni')

                        <!-- (-SHIPMENT INFO MARUSA ONLY-) -->
                        @include('MatDoc.invoiceNew.components.info.shipment-info-marusa')

                        <!-- (-BANK DETAIL-) -->
                        @include('MatDoc.invoiceNew.components.info.bank-detail')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btnNext d-inline-block">Next & Save <i class="fs-18 ml-2 fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function ptx(pantek) {
        if (pantek == "PTXPayment") {
            $('#showHidePTX').removeClass('hide');
            $('#showHidePTX').addClass('hide');
        } else if (pantek == "PTXOpen") {
            $('#showHidePTX').removeClass('hide');
            $('#showHidePTX').addClass('hide');
        }
        else if (pantek == "PTXLC") {
            const accordion = document.getElementsByClassName('accordionContent3')
            let last = accordion[accordion.length - 3];
            last.style.height = 'auto'

            $('#showHidePTX').addClass('hide');
            $('#showHidePTX').removeClass('hide');
        }
    }
</script>
<script>
    function dt(xx) {
        if (xx == "DTPayment") {
            $('#showHideDT').removeClass('hide');
            $('#showHideDT').addClass('hide');
        } else if (xx == "DTOpen") {
            $('#showHideDT').removeClass('hide');
            $('#showHideDT').addClass('hide');
        }
        else if (xx == "DTLC") {
            const accordion = document.getElementsByClassName('accordionContent3')
            let last = accordion[accordion.length - 1];
            last.style.height = 'auto'

            $('#showHideDT').addClass('hide');
            $('#showHideDT').removeClass('hide');
        }
    }
</script>
<script>
    function paymentMarubendi(xx) {
        if (xx == "PAYMENT") {
            $('#showHideShipmentMarubendi').removeClass('hide');
            $('#showHideShipmentMarubendi').addClass('hide');
        } else if (xx == "OPEN") {

            $('#showHideShipmentMarubendi').removeClass('hide');
            $('#showHideShipmentMarubendi').addClass('hide');
        }
        else if (xx == "LC") {
            const accordion = document.getElementsByClassName('accordionContent3')
            let last = accordion[accordion.length - 1];
            last.style.height = 'auto'

            $('#showHideShipmentMarubendi').addClass('hide');
            $('#showHideShipmentMarubendi').removeClass('hide');
        }
    }

    function All(all) {
        if (all == "PAYMENT") {
            $('#showHideShipment').removeClass('hide');
            $('#showHideShipment').addClass('hide');
        } else if (all == "OPEN") {
            $('#showHideShipment').removeClass('hide');
            $('#showHideShipment').addClass('hide');
        }
        else if (all == "LC") {
            const accordion = document.getElementsByClassName('accordionContent3')
            let last = accordion[accordion.length - 1];
            last.style.height = 'auto'
            
            $('#showHideShipment').addClass('hide');
            $('#showHideShipment').removeClass('hide');
        }
    }
</script>
<script>
     $( document ).ready(function() {
            letsCheckdata()

            function letsCheckdata() {
                const accordion = document.getElementsByClassName('accordionItem3'); 
                Array.from(accordion).forEach((e)=>{
                    const input = e.getElementsByTagName('input') 
                    const listValue = [];
                    Array.from(input).forEach((i)=>{

                        i.addEventListener('keyup', function(){  
                            console.log('ok')
                        })

                        listValue.push(i.value)
                    })
                    const data = listValue.filter((nul)=> nul === '' )
                    const checklist = e.querySelector('.checkAccord')
                    if(data.length > 0 ) {
                        checklist.classList.add('d-none')
                        checklist.classList.remove('flex')
                    } else {
                        checklist.classList.add('flex')
                        checklist.classList.remove('d-none')
                    }
                })
            }


        });
</script>

