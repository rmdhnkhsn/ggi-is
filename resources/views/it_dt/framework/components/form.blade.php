@extends("layouts.app")
@section("title","Components Form")
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
            <div class="title-22 text-left mb-2">Components - Input Form</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Form Floating Label</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="floating-label-content">
                        <input type="text" class="form-control borderInput floating-input" name="" id="" placeholder=" ">
                        <label class="floating-label">Input Text</label>
                    </div>
                    <div class="floating-label-content">
                        <textarea class="form-control borderInput floating-input" name="" id="" placeholder=" "></textarea>
                        <label class="floating-label">Text Area</label>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="floating-label-content"&gt;
    &lt;input type="text" class="form-control borderInput floating-input" name="" id="" placeholder=" "&gt;
    &lt;label class="floating-label"&gt;Input Text&lt;/label&gt;
&lt;/div&gt;

&lt;div class="floating-label-content"&gt;
    &lt;textarea class="form-control borderInput floating-input" name="" id="" placeholder=" "&gt;&lt;/textarea&gt;
    &lt;label class="floating-label"&gt;Text Area&lt;/label&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Form With Label</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Input Text</div>
                            <input type="text" class="form-control borderInput floating-input mt-1 mb-3" name="" id="" placeholder=" ">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Text Area</div>
                            <textarea class="form-control borderInput floating-input mt-1 mb-3" name="" id="" placeholder=" "></textarea>
                        </div>
                    </div>
                </div>
                <pre> 
                    <code>
&lt;div class="title-sm"&gt;Input Text&lt;/div&gt;
&lt;input type="text" class="form-control borderInput floating-input mt-1 mb-3" name="" id="" placeholder=" "&gt;

&lt;div class="title-sm"&gt;Text Area&lt;/div&gt;
&lt;textarea class="form-control borderInput floating-input mt-1 mb-3" name="" id="" placeholder=" "&gt;&lt;/textarea&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Form Group With Icon</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Label Input Icon Both</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-file-excel"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder...">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlueRight"><i class="fs-20 fas fa-file-excel"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Label Input Icon Left</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-file-excel"></i></span>
                                </div>
                                <input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder...">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Label Input Icon Right</div>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder...">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlueRight"><i class="fs-20 fas fa-file-excel"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Label Input Icon Left With Label</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 mr-2 fas fa-file-excel"></i>Your Label</span>
                                </div>
                                <input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder...">
                            </div>
                        </div>
                    </div>
                </div>
                <pre> 
                    <code>
&lt;div class="title-sm"&gt;Label Input Icon Both&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 fas fa-file-excel"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder..."&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlueRight"&gt;&lt;i class="fs-20 fas fa-file-excel"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class="title-sm"&gt;Label Input Icon Left&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 fas fa-file-excel"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder..."&gt;
&lt;/div&gt;

&lt;div class="title-sm"&gt;Label Input Icon Right&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder..."&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlueRight"&gt;&lt;i class="fs-20 fas fa-file-excel"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class="title-sm"&gt;Label Input Icon Left With Label&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 mr-2 fas fa-file-excel"&gt;&lt;/i&gt;Your Label&lt;/span&gt;
    &lt;/div&gt;
    &lt;input type="text" class="form-control borderInput" name="" id="" placeholder="placeholder..."&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>

@endpush        