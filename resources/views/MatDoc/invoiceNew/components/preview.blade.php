@extends("layouts.no_breadcrumb.app")
@section("title","Preview Invoice")
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
                        <div class="row">
                            <div class="col-12">
                                <div class="cardPart">
                                    <div class="cardHead p-3">
                                        <div class="justify-sb3">
                                            <div class="title-20-blue no-wrap">PREVIEW INVOICE</div>
                                            <div class="endSide">
                                                <div class="flex gap-3">
                                                    <a href="{{ route('invoiceList.previewPDF',$filter) }}" class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>
                                                    <a href="" class="btn-black-md" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Print" style="height:35px">Print<i class="fs-20 ml-3 fas fa-print"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section"></div>
                                    <div class="cardBody p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="headerPreview">
                                                    <div class="left-side">
                                                        <img src="{{url('images/iconpack/invoice/gistex-red.svg')}}" width="180px">
                                                        <div class="title-28-grey2 mb-min">PT. GISTEX GARMEN INDONESIA</div>
                                                    </div>
                                                    <div class="right-side">
                                                        <div class="office">
                                                            <div class="title-12 judul text-left">Office</div> 
                                                            <div class="address">
                                                                <div class="mr-3" style="margin-top:-5px">:</div>
                                                                <div class="title-12 text-left">Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</div>
                                                            </div>
                                                        </div>
                                                        <div class="factory mt-2">
                                                            <div class="title-12 judul text-left">Factory</div>
                                                            <div class="address">
                                                                <div class="mr-3" style="margin-top:-5px">:</div>
                                                                <div class="title-12 text-left">Jl. Panyawungan KM.19<br/> Cileunyi Wetan, Cileunyi<br/> Kab. Bandung, Jawabarat 40393<br/>Telp  : (62-002) - 7796683, 7796684, 7798885 <br/>Fax <span style="margin-left:5px">:</span> (62-002) - 7796686</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <!-- {{-- AGRON || HEXAPOLE --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.agron')
                                                @include('MatDoc.invoiceNew.components.preview_info.hexapole')
                                                <!-- {{-- MARUBENI --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.marubeni')
                                                <!-- {{-- TAIJIN || HONGKONG --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.hongkong')
                                                @include('MatDoc.invoiceNew.components.preview_info.teijin')
                                                <!-- {{-- MATSUOKA --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.matsuoka')
                                                <!-- {{-- PENTEX --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.pentex')
                                                <!-- {{-- JIANGSU --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.jiangsu')
                                                <!-- {{-- MARUSA --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.marusa')
                                                <!-- {{-- TOYOTA --}} -->
                                                @include('MatDoc.invoiceNew.components.preview_info.toyota')
                                                <!-- RITA CARGO & ADRENALINE LACROSE -->
                                                @include('MatDoc.invoiceNew.components.preview_info.rita_cargo')
                                                @include('MatDoc.invoiceNew.components.preview_info.adrenaline')

                                                @if ($data->buyer == 'PENTEX LTD')
                                                <div class="cards-scroll scrollX" id="scroll-bar3">
                                                @endif
                                                <table class="table table-small tbl-content-12 table-bordered text-center">
                                                    <thead>
                                                        <!-- {{-- AGRON || HEXAPOLE --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_agron')
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_hexapole')
                                                        <!-- {{-- MARUBENI --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_marubeni')
                                                        <!-- {{-- TAIJIN || HONGKONG --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_hongkong')
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_taijin')
                                                        <!-- {{-- MATSUOKA --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_matsuoka')
                                                        <!-- {{-- PENTEX --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_pentex')
                                                        <!-- {{-- JIANGSU --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_jiangsu')
                                                        <!-- {{-- MARUSA --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_marusa')
                                                        <!-- {{-- TOYOTA --}} -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_toyota')
                                                        <!-- RITA CARGO & ADRENALINE LACROSE -->
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_rita_cargo')
                                                        @include('MatDoc.invoiceNew.components.tabel.header.header_adrenaline')
                                                    </thead>
                                                       
                                                    <tbody>
                                                        @foreach ($data2 as $key =>$value)
                                                             <!-- {{-- AGRON || HEXAPOLE --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_agron')
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_hexapole')
                                                            <!-- {{-- MARUBENI --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_marubeni')
                                                            <!-- {{-- TAIJIN || HONGKONG --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_hongkong')
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_taijin')
                                                            <!-- {{-- MATSUOKA --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_matsuoka')
                                                            <!-- {{-- PENTEX --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_pentex')
                                                            <!-- {{-- JIANGSU --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_jiangsu')
                                                            <!-- {{-- MARUSA --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_marusa')
                                                            <!-- {{-- TOYOTA --}} -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_toyota')
                                                            <!-- RITA CARGO & ADRENALINE LACROSE -->
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_rita_cargo')
                                                            @include('MatDoc.invoiceNew.components.tabel.body.body_adrenaline')
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <!-- tfooot -->
                                                        @include('MatDoc.invoiceNew.components.tabel.footer.tfoot')
                                                    </tfoot>
                                                </table>
                                                @if ($data->buyer == 'PENTEX LTD')
                                                </div>
                                                @endif
                                                <div class="footerTable">
                                                    <div class="containerFooter">
                                                        <div class="all">
                                                            <div class="title-12-dark text-center" style="font-style: italic">{{ $dataInvoiceHeader->terbilang }}</div>
                                                        </div>
                                                    </div>
                                                    @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
                                                    <div class="containerFooter">
                                                        <div class="all">
                                                            <div class="title-12-dark text-center">MADE IN INDONESIA</div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                                    <div class="containerFooter">
                                                        <div class="all">
                                                            <div class="title-12-dark text-center" style="font-style: italic">COUNTRY OF ORIGIN : {{ $invoiceHeader->country_of_origin }}</div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <!-- FOOTER CONTENT NO BANK -->
                                                    <!-- {{-- ALL --}} -->
                                                    @include('MatDoc.invoiceNew.components.tabel.footer.no_bank')

                                                    <!-- FOOTER CONTENT WTTH BANK -->
                                                    <!-- {{-- HANYA MARUBENI --}} -->
                                                    @include('MatDoc.invoiceNew.components.tabel.footer.with_bank')

                                                    <!-- {{-- HANYA PANTEX --}} -->
                                                    @include('MatDoc.invoiceNew.components.tabel.footer.footer_pentex')

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
    $('.saveAll').on('click', function (event) {
        swal({
        position: 'center',
        icon: 'success',
        title: 'Successfully',
        text: 'Invoice data Sucessfully Created.',
        buttons: false,
        timer: 5000
        })
    });
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

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
@endpush

