@extends("layouts.app")
@section("title","Components Select")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Select Option Dropdown</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Select Option</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Select Default</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-file"></i></span>
                                </div>
                                <select class="form-control borderInput" id="" name="" style="cursor:pointer" required>
                                    <option selected disabled>Select...</option>
                                    <option name="Gistex Cileunyi">Gistex Cileunyi</option>    
                                    <option name="Gistex Majalengka 1">Gistex Majalengka 1</option>    
                                    <option name="Gistex Majalengka 2">Gistex Majalengka 2</option>    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-sm"&gt;Select Default&lt;/div&gt;
&lt;div class="input-group flex mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 fas fa-file"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;select class="form-control borderInput" id="" name="" style="cursor:pointer" required&gt;
        &lt;option selected disabled&gt;Select...&lt;/option&gt;
        &lt;option name="Gistex Cileunyi"&gt;Gistex Cileunyi&lt;/option&gt;    
        &lt;option name="Gistex Majalengka 1"&gt;Gistex Majalengka 1&lt;/option&gt;    
        &lt;option name="Gistex Majalengka 2"&gt;Gistex Majalengka 2&lt;/option&gt;    
    &lt;/select&gt;
&lt;/div&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Select With Search</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-file"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4" id="" name="" style="cursor:pointer" required>
                                    <option selected disabled>Select...</option>
                                    <option name="Gistex Cileunyi">Gistex Cileunyi</option>    
                                    <option name="Gistex Majalengka 1">Gistex Majalengka 1</option>    
                                    <option name="Gistex Majalengka 2">Gistex Majalengka 2</option>    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
// Style
&lt;link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}"&gt;
&lt;link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"&gt;

&lt;div class="title-sm"&gt;Select With Search&lt;/div&gt;
&lt;div class="input-group flex mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 fas fa-file"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;select class="form-control borderInput select2bs4" id="" name="" style="cursor:pointer" required&gt;
        &lt;option selected disabled&gt;Select...&lt;/option&gt;
        &lt;option name="Gistex Cileunyi"&gt;Gistex Cileunyi&lt;/option&gt;    
        &lt;option name="Gistex Majalengka 1"&gt;Gistex Majalengka 1&lt;/option&gt;    
        &lt;option name="Gistex Majalengka 2"&gt;Gistex Majalengka 2&lt;/option&gt;    
    &lt;/select&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Select</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Select Date</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Input Select Date</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control borderInput" id="" name="" style="cursor:pointer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-sm"&gt;Input Select Date&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue"&gt;&lt;i class="fs-20 fas fa-calendar-alt"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;input type="date" class="form-control borderInput" id="" name="" style="cursor:pointer" required&gt;
&lt;/div&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Select Date Label</div>
                            <div class="input-group date mt-1 mb-3" id="Date" data-target-input="nearest">
                                <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                                    <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18 mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input borderInput" data-target="#Date" placeholder="Select Date"/>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
// Style
&lt;link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"&gt;

&lt;div class="title-sm"&gt;Select Date Label&lt;/div&gt;
&lt;div class="input-group date mt-1 mb-3" id="Date" data-target-input="nearest"&gt;
    &lt;div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker"&gt;
        &lt;div class="inputGroupBlue"&gt;&lt;i class="fas fa-calendar-alt fs-18 mr-2"&gt;&lt;/i&gt; &lt;span class="fs-14"&gt;Date&lt;/span&gt;&lt;i class="ml-2 fas fa-caret-down"&gt;&lt;/i&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;input type="text" class="form-control datetimepicker-input borderInput" data-target="#Date" placeholder="Select Date"/&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    $('#Date').datetimepicker({
        format: 'DD-MM-YY',
        showButtonPanel: false
    })
&lt;/script&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Date Range Picker</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="" placeholder="Input Date" />
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
// Style
&lt;link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}"&gt;

&lt;div class="title-sm"&gt;Date Range Picker&lt;/div&gt;
&lt;div class="input-group mt-1 mb-3"&gt;
    &lt;div class="input-group-prepend"&gt;
        &lt;span class="inputGroupBlue" style="height:40px"&gt;&lt;i class="fs-20 fas fa-calendar-alt"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="" placeholder="Input Date" /&gt;
&lt;/div&gt;

// Javascript
&lt;script src="{{asset('common/js/dateRangePicker.js')}}"&gt;&lt;/script&gt;
&lt;script&gt;
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    });
&lt;/script&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-sm">Next And Prev Date</div>
                            <div class="relative nextPrevDate mt-1 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="datepicker" class="form-control border-input-10" name="" value="" placeholder="Input Date" />
                                </div>
                                <button class="prev-day" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Previous Date"><i class="fas fa-angle-left"></i></button>
                                <button class="next-day" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Next Date"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-sm"&gt;Next And Prev Date&lt;/div&gt;
&lt;div class="relative nextPrevDate mt-1 mb-3"&gt;
    &lt;div class="input-group"&gt;
        &lt;div class="input-group-prepend"&gt;
            &lt;span class="inputGroupBlue" style="height:40px"&gt;&lt;i class="fs-20 fas fa-calendar-alt"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/div&gt;
        &lt;input type="text" id="datepicker" class="form-control border-input-10" name="" value="" placeholder="Input Date" /&gt;
    &lt;/div&gt;
    &lt;button class="prev-day" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Previous Date"&gt;&lt;i class="fas fa-angle-left"&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;button class="next-day" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Next Date"&gt;&lt;i class="fas fa-angle-right"&gt;&lt;/i&gt;&lt;/button&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
  $(document).ready(function(){
  $('#datepicker').val(moment().format('MM/DD/YYYY'));
      $('#datepicker').datepicker();
    $('.next-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() +1)
        $('#datepicker').datepicker('setDate', date);
    });
    $('.prev-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() -1)
        $('#datepicker').datepicker('setDate', date);
    });
    $('.today-date').on('click', function () {
        var date = moment().format('MM/DD/YYYY');
        $('#datepicker').datepicker('setDate', date);
    });
  });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Select Check</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Select Check</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <div class="col-12">
                        <div class="title-14 text-left">Checkbox</div>
                        <div class="justify-start mt-2" style="gap:1.6rem">
                            <div class="containerCheck">
                                <input type="checkbox" class="check1" id="cln" value="" name="">
                                <label for="cln" class="label-checkbox2">CLN</label>
                            </div>
                            <div class="containerCheck">
                                <input type="checkbox" class="check1" id="maja1" value="" name="">
                                <label for="maja1" class="label-checkbox2">MAJA 1</label>
                            </div>
                            <div class="containerCheck">
                                <input type="checkbox" class="check1" id="maja2" value="" name="">
                                <label for="maja2" class="label-checkbox2">MAJA 2</label>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-14 text-left"&gt;Checkbox&lt;/div&gt;
&lt;div class="justify-start mt-2" style="gap:1.6rem"&gt;
    &lt;div class="containerCheck"&gt;
        &lt;input type="checkbox" class="check1" id="cln" value="" name=""&gt;
        &lt;label for="cln" class="label-checkbox2"&gt;CLN&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class="containerCheck"&gt;
        &lt;input type="checkbox" class="check1" id="maja1" value="" name=""&gt;
        &lt;label for="maja1" class="label-checkbox2"&gt;MAJA 1&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class="containerCheck"&gt;
        &lt;input type="checkbox" class="check1" id="maja2" value="" name=""&gt;
        &lt;label for="maja2" class="label-checkbox2"&gt;MAJA 2&lt;/label&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-14 text-left">Radio Button</div>
                            <div class="justify-start mt-2" style="gap:1.4rem">
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="quest" id="radioCln" class="radioCustomInput">
                                        <label for="radioCln" class="radioCustoms"></label>
                                    </div>
                                    <label for="radioCln" class="label-radio">CLN</label>
                                </div>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="quest" id="radioMaja1" class="radioCustomInput">
                                        <label for="radioMaja1" class="radioCustoms"></label>
                                    </div>
                                    <label for="radioMaja1" class="label-radio">MAJA 1</label>
                                </div>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="quest" id="radioMaja2" class="radioCustomInput">
                                        <label for="radioMaja2" class="radioCustoms"></label>
                                    </div>
                                    <label for="radioMaja2" class="label-radio">MAJA 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-14 text-left"&gt;Radio Button&lt;/div&gt;
&lt;div class="justify-start mt-2" style="gap:1.4rem"&gt;
    &lt;div class="justify-center"&gt;
        &lt;div class="radioContainer"&gt;
            &lt;input type="radio" name="quest" id="radioCln" class="radioCustomInput"&gt;
            &lt;label for="radioCln" class="radioCustoms"&gt;&lt;/label&gt;
        &lt;/div&gt;
        &lt;label for="radioCln" class="label-radio"&gt;CLN&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class="justify-center"&gt;
        &lt;div class="radioContainer"&gt;
            &lt;input type="radio" name="quest" id="radioMaja1" class="radioCustomInput"&gt;
            &lt;label for="radioMaja1" class="radioCustoms"&gt;&lt;/label&gt;
        &lt;/div&gt;
        &lt;label for="radioMaja1" class="label-radio"&gt;MAJA 1&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class="justify-center"&gt;
        &lt;div class="radioContainer"&gt;
            &lt;input type="radio" name="quest" id="radioMaja2" class="radioCustomInput"&gt;
            &lt;label for="radioMaja2" class="radioCustoms"&gt;&lt;/label&gt;
        &lt;/div&gt;
        &lt;label for="radioMaja2" class="label-radio"&gt;MAJA 2&lt;/label&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
                <div class="inner-card2 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-14 text-left">Switch</div>
                            <div class="custom-switch mt-2">
                                <input type="checkbox" class="custom-control-input" id="customSwitch"  value="1" name="remark">
                                <label class="custom-control-label pointer" for="customSwitch">Set Private</label>
                            </div>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;div class="title-14 text-left"&gt;Switch&lt;/div&gt;
&lt;div class="custom-switch mt-2"&gt;
    &lt;input type="checkbox" class="custom-control-input" id="customSwitch"  value="1" name="remark"&gt;
    &lt;label class="custom-control-label pointer" for="customSwitch"&gt;Set Private&lt;/label&gt;
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
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>
<script src="{{asset('/common/assets/plugins/CalendarNextPrev.js')}}"></script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    // =====
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    });
    // =====
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
    // ===== 
    $('#Date').datetimepicker({
        format: 'DD-MM-YY',
        showButtonPanel: false
    })
</script>

<script>
  $(document).ready(function(){
  $('#datepicker').val(moment().format('MM/DD/YYYY'));
      $('#datepicker').datepicker();
    $('.next-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() +1)
        $('#datepicker').datepicker('setDate', date);
    });
    $('.prev-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() -1)
        $('#datepicker').datepicker('setDate', date);
    });
    $('.today-date').on('click', function () {
        var date = moment().format('MM/DD/YYYY');
        $('#datepicker').datepicker('setDate', date);
    });
  });
</script>

@endpush        