@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<style> 
  .selectdestination {
    display : none;
    /* showselect */
  }

</style>
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    @include('marketing.worksheet.partials.stepbar')
    <!-- <div class="row">
      @include('marketing.worksheet.partials.product_detail')
      @include('marketing.worksheet.partials.buyer_detail')
      @include('marketing.worksheet.partials.quantity_order')
    </div> -->
    <!-- <div class="col-lg-12 kotak_satu p-4 mb-3 mt-bd" style="overflow:scroll;">
      <span class="judul_biru">Breakdown Quantity Order</span>
      <table id="example1"  class="table table-bordered mt-3" >
        <thead>
          <tr>
            <th>Style</th>
            <th>Color Code</th>
            <th>Color Name</th>
            <th>Garmen Ex-Fact</th>
            @foreach ($master_data->rekap_size->toArray() as $column => $field)
                @if (str_contains($column,'size')&&($field!==null))
                  <th>{{$field}}</th>
                @endif
            @endforeach
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @include('marketing.worksheet.partials.detail_table')
        </tbody>
      </table>
    </div> -->
    <form action="{{ route('w_breakdown.breakdown_store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
      <div class="row">
        <div class="col-12">
          <div class="cards p-4">
            <div class="title-blue">Breakdown Qty - <span class="po">PO Number #{{$master_data->no_po}}</span></div>
            @foreach($master_data->rekap_detail as $key => $value)
            <?php 
              $contoh_aja = collect($master_data->rekap_detail)->first();
            ?>
            <!-- <input type="text" id="id_bagian" value="{{$contoh_aja}}"> -->
            <input type="hidden" id="detail_id" name="detail_id[]" value="{{$value->id}}">
            <div class="approval-flex3 my-4">
              <div class="title-or">#OR/SO {{$value->no_or}}</div>
              @if($value->id != $contoh_aja->id)
              <div class="input-group flex w-380 showselect">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-americas"></i></span>
                </div>
                <select class="form-control borderInput select2bs4" name="shipment_to[]" id="">
                  <option value="" hidden>Shipment To</option>
                  @foreach($address as $key7 => $value7)
                  <option {{ $value7['F0101_AN8'] == $value->shipment_to ? 'selected' : ''}} value="{{  $value7['F0101_AN8'] }}">{{ $value7['F0101_ALPH'] }}</option>
                  @endforeach
                </select>
              </div>
              @endif
              @if($value->id == $contoh_aja->id)
              <div class="input-group flex w-380">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-americas"></i></span>
                </div>
                <select class="form-control borderInput select2bs4" name="shipment_to[]" id="">
                  <option value="" hidden>Shipment To</option>
                  @foreach($address as $key7 => $value7)
                  <option {{ $value7['F0101_AN8'] == $value->shipment_to ? 'selected' : ''}} value="{{  $value7['F0101_AN8'] }}">{{ $value7['F0101_ALPH'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="check mt-2">
                <input type="checkbox" class="check1 checkall" id="setAll" value="1" name="set_to_all">
                <label for="setAll" class="label-checkbox2">Set to All</label>
              </div>
              @endif
            </div>
            <table class="table tbl-content-left" >
              <thead>
                <tr class="bg-thead">
                  <th rowspan="2" style="padding-bottom:2rem">NO</th>
                  <th rowspan="2" style="padding-bottom:2rem">ARTICLE</th>
                  <th rowspan="2" style="padding-bottom:2rem">COLOR CODE</th>
                  <th rowspan="2" style="padding-bottom:2rem">COLOR NAME</th>
                  <th rowspan="2" style="padding-bottom:2rem">COUNTRY CODE</th>
                  <?php
                  $jumlah_datanya = count($ukuran);
                  ?>
                  <th colspan="{{$jumlah_datanya+1}}" class="text-center">QTY BREAKDOWN</th>
                </tr>
                <tr class="bg-thead">
                  @foreach($ukuran as $key3 => $value3)
                  <th>{{$value3}}</th>
                  @endforeach
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0;?>
                @foreach($master_data->rekap_breakdown as $key2 => $value2)
                  @if($value->id == $value2->rekap_detail_id)
                  <?php $no++;?>
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$value->article}}</td>
                    <td>{{$value2->color_code}}</td>
                    <td>{{$value2->color_name}}</td>
                    <td>{{$value2->country_code}}</td>
                    @if($master_data->rekap_size->size1 != null)
                    <td style="text-align:center;">{{$value2->size1}}</td>
                    @endif
                    @if($master_data->rekap_size->size2 != null)
                    <td style="text-align:center;">{{$value2->size2}}</td>
                    @endif
                    @if($master_data->rekap_size->size3 != null)
                    <td style="text-align:center;">{{$value2->size3}}</td>
                    @endif
                    @if($master_data->rekap_size->size4 != null)
                    <td style="text-align:center;">{{$value2->size4}}</td>
                    @endif
                    @if($master_data->rekap_size->size5 != null)
                    <td style="text-align:center;">{{$value2->size5}}</td>
                    @endif
                    @if($master_data->rekap_size->size6 != null)
                    <td style="text-align:center;">{{$value2->size6}}</td>
                    @endif
                    @if($master_data->rekap_size->size7 != null)
                    <td style="text-align:center;">{{$value2->size7}}</td>
                    @endif
                    @if($master_data->rekap_size->size8 != null)
                    <td style="text-align:center;">{{$value2->size8}}</td>
                    @endif
                    @if($master_data->rekap_size->size9 != null)
                    <td style="text-align:center;">{{$value2->size9}}</td>
                    @endif
                    @if($master_data->rekap_size->size10 != null)
                    <td style="text-align:center;">{{$value2->size10}}</td>
                    @endif
                    @if($master_data->rekap_size->size11 != null)
                    <td style="text-align:center;">{{$value2->size11}}</td>
                    @endif
                    @if($master_data->rekap_size->size12 != null)
                    <td style="text-align:center;">{{$value2->size12}}</td>
                    @endif
                    @if($master_data->rekap_size->size13 != null)
                    <td style="text-align:center;">{{$value2->size13}}</td>
                    @endif
                    @if($master_data->rekap_size->size14 != null)
                    <td style="text-align:center;">{{$value2->size14}}</td>
                    @endif
                    @if($master_data->rekap_size->size15 != null)
                    <td style="text-align:center;">{{$value2->size15}}</td>
                    @endif
                    <td style="text-align:center;">{{$value2->total_size}}</td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            @endforeach
          </div>


          <!-- Tambahan po  -->
          <?php
          $tambahan_po = collect($master_data->general_po)->count('id');
          ?>
          @if($tambahan_po != 0)
          @foreach($master_data->general_po as $key => $value)
          <?php
          $data_rekap_order = collect($rekap_order)->where('id', $value->rekap_order_id)->first();
          ?>
          <div class="cards p-4">
            <div class="title-blue">Breakdown Qty - <span class="po">PO Number #{{$data_rekap_order->no_po}}</span></div>
            @foreach($data_rekap_order->rekap_detail as $key2 => $value2)
            <input type="hidden" id="detail_id" name="detail_id[]" value="{{$value2->id}}">
            <div class="approval-flex3 my-4">
              <div class="title-or">#OR/SO {{$value2->no_or}}</div>
              <div class="input-group flex w-380 showselect">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-globe-americas"></i></span>
                </div>
                <select class="form-control borderInput select2bs4" name="shipment_to[]" id="">
                  <option value="" hidden>Shipment To</option>
                  @foreach($address as $key9 => $value9)
                  <option {{ $value9['F0101_AN8'] == $value2->shipment_to ? 'selected' : ''}} value="{{  $value9['F0101_AN8'] }}">{{ $value9['F0101_ALPH'] }}</option>
                  @endforeach
                </select>
              </div>
              <!-- <div class="check mt-2">
                <input type="checkbox" class="check1" id="setAll" value="" name="">
                <label for="setAll" class="label-checkbox2"></label>
              </div> -->
            </div>
            <table class="table tbl-content-left" >
              <thead>
              <?php
                $size = [
                  $data_rekap_order->rekap_size->size1,
                  $data_rekap_order->rekap_size->size2,
                  $data_rekap_order->rekap_size->size3,
                  $data_rekap_order->rekap_size->size4,
                  $data_rekap_order->rekap_size->size5,
                  $data_rekap_order->rekap_size->size6,
                  $data_rekap_order->rekap_size->size7,
                  $data_rekap_order->rekap_size->size8,
                  $data_rekap_order->rekap_size->size9,
                  $data_rekap_order->rekap_size->size10,
                  $data_rekap_order->rekap_size->size11,
                  $data_rekap_order->rekap_size->size12,
                  $data_rekap_order->rekap_size->size13,
                  $data_rekap_order->rekap_size->size14,
                  $data_rekap_order->rekap_size->size15,
                ];
                $data_ukuran = array_filter($size,'strlen');
                $jumlah_size = count($data_ukuran);
                ?>
                <tr class="bg-thead">
                  <th rowspan="2" style="padding-bottom:2rem">NO</th>
                  <th rowspan="2" style="padding-bottom:2rem">ARTICLE</th>
                  <th rowspan="2" style="padding-bottom:2rem">COLOR CODE</th>
                  <th rowspan="2" style="padding-bottom:2rem">COLOR NAME</th>
                  <th rowspan="2" style="padding-bottom:2rem">COUNTRY CODE</th>
                  <th colspan="{{$jumlah_size + 1}}" class="text-center">QTY BREAKDOWN</th>
                </tr>
                <tr class="bg-thead">
                  @foreach($data_ukuran as $key3 => $value3)
                  <th>{{$value3}}</th>
                  @endforeach
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=0;?>
              @foreach($data_rekap_order->rekap_breakdown as $key4 => $value4)
              @if($value2->id == $value4->rekap_detail_id)
              <?php $no++;?>
              <tr>
                <td>{{$no}}</td>
                <td>{{$value2->article}}</td>
                <td>{{$value4->color_code}}</td>
                <td>{{$value4->color_name}}</td>
                <td>{{$value4->country_code}}</td>
                @if($data_rekap_order->rekap_size->size1 != null)
                <td style="text-align:center;">{{$value4->size1}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size2 != null)
                <td style="text-align:center;">{{$value4->size2}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size3 != null)
                <td style="text-align:center;">{{$value4->size3}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size4 != null)
                <td style="text-align:center;">{{$value4->size4}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size5 != null)
                <td style="text-align:center;">{{$value4->size5}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size6 != null)
                <td style="text-align:center;">{{$value4->size6}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size7 != null)
                <td style="text-align:center;">{{$value4->size7}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size8 != null)
                <td style="text-align:center;">{{$value4->size8}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size9 != null)
                <td style="text-align:center;">{{$value4->size9}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size10 != null)
                <td style="text-align:center;">{{$value4->size10}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size11 != null)
                <td style="text-align:center;">{{$value4->size11}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size12 != null)
                <td style="text-align:center;">{{$value4->size12}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size13 != null)
                <td style="text-align:center;">{{$value4->size13}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size14 != null)
                <td style="text-align:center;">{{$value4->size14}}</td>
                @endif
                @if($data_rekap_order->rekap_size->size15 != null)
                <td style="text-align:center;">{{$value4->size15}}</td>
                @endif
                <td style="text-align:center;">{{$value4->total_size}}</td>
              </tr>
              @endif
              @endforeach
              </tbody>
            </table>
            @endforeach
          </div>
          @endforeach
          @endif
        </div>
        <div class="col-12 justify-end gap-4 py-4">
          <a href="{{route('worksheet.general',$master_data->id)}}" class="btn-outline-grey-md w-130">Back</a>
          <!-- <a href="{{route('worksheet.material_pabric', $master_data->id)}}" class="btn-blue-md">Next & Save</a> -->
          <button type="submit" class="btn-blue-md">Next & Save</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
@push("scripts")
<script>
  document.getElementsByClassName('checkall')[0].addEventListener('click', function(e) {
    const showselect = document.getElementsByClassName('showselect');
    if (e.target.checked) {
      // for (let i = 0; i < showselect.length; i++) {
        // if( i != 1 ) {
        //   e.style.display = 'none';
        // } else {
        //   e.style.display = 'flex';
        // }
      // }
      Array.from(showselect).forEach(function(e){
        console.log(e);
        e.style.display = 'none';
      })
    } else {
      Array.from(showselect).forEach(function(e){
        e.style.display = 'flex';
      })
    }
  })
</script>
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4',
    templateResult: function(option) {
      if(option.element && (option.element).hasAttribute('hidden')){
         return null;
      }
      return option.text;
    }
  })
</script>

<script>
$('.checkall').click(function(){
    var d = $(this).data(); // access the data object of the button
    $(':checkbox').prop('checked', !d.checked); // set all checkboxes 'checked' property using '.prop()'
    d.checked = !d.checked; // set the new 'checked' opposite value to the button's data object
});
</script>
@endpush