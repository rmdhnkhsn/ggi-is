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

<head>
    <script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
    <script>
        // $(window).load(function () {
                    function beforeReady() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
        }

        // alert('sip')
        beforeReady()
        // })

    </script>
</head>
<section class="content">
    <div class="container-fluid invoiceList">
        <div class="row pb-4">
            <div class="col-12">
                <div class="cards3 py-4 mt-3">
                    @include('MatDoc.invoiceNew.partials.stepbar')
                </div>
                <div class="tab-content">
                    <div class="cards3 py-4 mt-3">
                        @include('MatDoc.invoiceNew.components.information')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        /* When click New customer button */
    });

    function letsCheckdata() {
        const accordion = document.getElementsByClassName('accordionItem3'); 
        Array.from(accordion).forEach((e)=>{
            const input = e.getElementsByTagName('input') 
            const listValue = [];
            Array.from(input).forEach((i)=>{
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

    const invoiceInput = document.querySelector('.cardFlat').getElementsByTagName('input');
    Array.from(invoiceInput).forEach((input)=> {
        input.addEventListener('change', function(){
        const parent = input.closest('.accordionItem3'); 
        const ii = parent.getElementsByTagName('input');
        const listValue = [];
        Array.from(ii).forEach((i)=> {
            listValue.push(i.value)
        }); 
        const data = listValue.filter((nul)=> nul === '' )
        const checklist = parent.querySelector('.checkAccord')
        if(data.length > 0 ) {
            checklist.classList.add('d-none')
            checklist.classList.remove('flex')
        } else {
            checklist.classList.add('flex')
            checklist.classList.remove('d-none')
        }

        })
    })

    function testing() {
        var kode_ekspedisi = $('#kode_ekspedisinya').val();
        var url = "{{ route('invoiceList.Information',[':id']) }}";
            url=url.replace(':id',kode_ekspedisi);
            window.location.href = url;
    }
</script>
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

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
@endpush