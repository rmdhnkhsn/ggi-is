@extends("layouts.app")
@section("title","Components Modal")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")
<style>
    .modal { overflow-y: auto}
</style>
<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Modal</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Modal Switch</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-blue-md" data-toggle="modal" data-target="#myModal">Open modal</button>
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                                    <div class="modal-content p-4" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 justify-sb">
                                                <div class="title-18">Test</div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="borderlight2"></div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-green-md" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">Switch Modal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModal2">
                                <div class="modal-dialog" role="document" style="max-width:650px">
                                    <div class="modal-content p-4" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 justify-sb">
                                                <div class="title-18">Test 2</div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="borderlight2"></div>
                                            </div>
                                            <div class="col-12">
                                                YOUR CONTENT HERE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;button type="button" class="btn btn-blue-md" data-toggle="modal" data-target="#myModal"&gt;Open modal&lt;/button&gt;
&lt;div class="modal fade" id="myModal"&gt;
    &lt;div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px"&gt;
        &lt;div class="modal-content p-4" style="border-radius:10px"&gt;
            &lt;div class="row"&gt;
                &lt;div class="col-12 justify-sb"&gt;
                    &lt;div class="title-18"&gt;Test&lt;/div&gt;
                    &lt;button type="button" class="close" data-dismiss="modal" aria-label="Close"&gt;
                        &lt;span aria-hidden="true"&gt;&lt;i class="fas fa-times"&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="col-12 mb-3"&gt;
                    &lt;div class="borderlight2"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    &lt;button type="button" class="btn btn-green-md" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"&gt;Switch Modal&lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="myModal2"&gt;
    &lt;div class="modal-dialog" role="document" style="max-width:650px"&gt;
        &lt;div class="modal-content p-4" style="border-radius:10px"&gt;
            &lt;div class="row"&gt;
                &lt;div class="col-12 justify-sb"&gt;
                    &lt;div class="title-18"&gt;Test 2&lt;/div&gt;
                    &lt;button type="button" class="close" data-dismiss="modal" aria-label="Close"&gt;
                        &lt;span aria-hidden="true"&gt;&lt;i class="fas fa-times"&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="col-12 mb-3"&gt;
                    &lt;div class="borderlight2"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    YOUR CONTENT HERE
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Modal On Top</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn-blue-md" data-toggle="modal" data-target="#modalTop">Open Modal</a>
                            <div class="modal fade" id="modalTop" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width:600px">
                                    <div class="modal-content p-4" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 justify-sb">
                                                <div class="title-18">Title</div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="borderlight"></div>
                                            </div>
                                            <div class="col-12">
                                                Your Content Here!!!
                                            </div>
                                            <div class="col-12 justify-end mt-3">
                                                <a href="#" class="btn-blue-md">Save <i class="ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-blue-md" data-toggle="modal" data-target="#modalTop"&gt;Open Modal&lt;/a&gt;
&lt;div class="modal fade" id="modalTop" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true"&gt;
    &lt;div class="modal-dialog" role="document" style="max-width:600px"&gt;
        &lt;div class="modal-content p-4" style="border-radius:10px"&gt;
            &lt;div class="row"&gt;
                &lt;div class="col-12 justify-sb"&gt;
                    &lt;div class="title-18"&gt;Title&lt;/div&gt;
                    &lt;button type="button" class="close" data-dismiss="modal" aria-label="Close"&gt;
                        &lt;span aria-hidden="true"&gt;&lt;i class="fas fa-times"&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    &lt;div class="borderlight"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    Your Content Here!!!
                &lt;/div&gt;
                &lt;div class="col-12 justify-end mt-3"&gt;
                    &lt;a href="#" class="btn-blue-md"&gt;Save &lt;i class="ml-2 fas fa-download"&gt;&lt;/i&gt;&lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Modal On Center</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn-blue-md" data-toggle="modal" data-target="#modalCenter">Open Modal</a>
                            <div class="modal fade" id="modalCenter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
                                    <div class="modal-content p-4" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 justify-sb">
                                                <div class="title-18">Title</div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="borderlight"></div>
                                            </div>
                                            <div class="col-12">
                                                Your Content Here!!!
                                            </div>
                                            <div class="col-12 justify-end mt-3">
                                                <a href="#" class="btn-blue-md">Save <i class="ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="btn-blue-md" data-toggle="modal" data-target="#modalCenter"&gt;Open Modal&lt;/a&gt;
&lt;div class="modal fade" id="modalCenter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true"&gt;
    &lt;div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px"&gt;
        &lt;div class="modal-content p-4" style="border-radius:10px"&gt;
            &lt;div class="row"&gt;
                &lt;div class="col-12 justify-sb"&gt;
                    &lt;div class="title-18"&gt;Title&lt;/div&gt;
                    &lt;button type="button" class="close" data-dismiss="modal" aria-label="Close"&gt;
                        &lt;span aria-hidden="true"&gt;&lt;i class="fas fa-times"&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    &lt;div class="borderlight"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="col-12"&gt;
                    Your Content Here!!!
                &lt;/div&gt;
                &lt;div class="col-12 justify-end mt-3"&gt;
                    &lt;a href="#" class="btn-blue-md"&gt;Save &lt;i class="ml-2 fas fa-download"&gt;&lt;/i&gt;&lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
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