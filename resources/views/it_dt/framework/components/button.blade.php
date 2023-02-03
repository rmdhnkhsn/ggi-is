@extends("layouts.app")
@section("title","Components Button")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Button</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Button Text Only (Large)</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="" class="btn-blue">Btn Blue</a>
                    <a href="" class="btn-green">Btn Green</a>
                    <a href="" class="btn-yellow">Btn Yellow</a>
                    <a href="" class="btn-red">Btn Red</a>
                    <a href="" class="btn-black">Btn Black</a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-blue"&gt;Btn Blue&lt;/a&gt;
&lt;a href="#" class="btn-green"&gt;Btn Green&lt;/a&gt;
&lt;a href="#" class="btn-yellow"&gt;Btn Yellow&lt;/a&gt;
&lt;a href="#" class="btn-red"&gt;Btn Red&lt;/a&gt;
&lt;a href="#" class="btn-black"&gt;Btn Black&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Button Text Only (Medium)</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="" class="btn-blue-md">Btn Blue</a>
                    <a href="" class="btn-green-md">Btn Green</a>
                    <a href="" class="btn-yellow-md">Btn Yellow</a>
                    <a href="" class="btn-red-md">Btn Red</a>
                    <a href="" class="btn-black-md">Btn Black</a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-blue-md"&gt;Btn Blue&lt;/a&gt;
&lt;a href="#" class="btn-green-md"&gt;Btn Green&lt;/a&gt;
&lt;a href="#" class="btn-yellow-md"&gt;Btn Yellow&lt;/a&gt;
&lt;a href="#" class="btn-red-md"&gt;Btn Red&lt;/a&gt;
&lt;a href="#" class="btn-black-md"&gt;Btn Black&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Button Text With Icon</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="" class="btn-blue-md">Btn Blue<i class="ml-2 fas fa-chevron-right"></i></a>
                    <a href="" class="btn-green-md">Btn Green<i class="ml-2 fas fa-check"></i></a>
                    <a href="" class="btn-yellow-md">Btn Yellow<i class="ml-2 fas fa-exclamation-triangle"></i></a>
                    <a href="" class="btn-red-md">Btn Red<i class="ml-2 fas fa-times"></i></a>
                    <a href="" class="btn-black-md">Btn Black<i class="ml-2 fas fa-sync-alt"></i></a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-blue-md"&gt;Btn Blue&lt;i class="ml-2 fas fa-chevron-right"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-green-md"&gt;Btn Green&lt;i class="ml-2 fas fa-check"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-yellow-md"&gt;Btn Yellow&lt;i class="ml-2 fas fa-exclamation-triangle"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-red-md"&gt;Btn Red&lt;i class="ml-2 fas fa-times"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-black-md"&gt;Btn Black&lt;i class="ml-2 fas fa-sync-alt"&gt;&lt;/i&gt;&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Button Icon Only</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="" class="btn-icon-blue"><i class="fas fa-chevron-right"></i></a>
                    <a href="" class="btn-icon-hijau"><i class="fas fa-check"></i></a>
                    <a href="" class="btn-icon-yellow"><i class="fas fa-exclamation-triangle"></i></a>
                    <a href="" class="btn-icon-red"><i class="fas fa-times"></i></a>
                    <a href="" class="btn-icon-black"><i class="fas fa-sync-alt"></i></a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-icon-blue"&gt;&lt;i class="fas fa-chevron-right"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-icon-hijau"&gt;&lt;i class="fas fa-check"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-icon-yellow"&gt;&lt;i class="fas fa-exclamation-triangle"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-icon-red"&gt;&lt;i class="fas fa-times"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;a href="#" class="btn-icon-black"&gt;&lt;i class="fas fa-sync-alt"&gt;&lt;/i&gt;&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>

@endpush        