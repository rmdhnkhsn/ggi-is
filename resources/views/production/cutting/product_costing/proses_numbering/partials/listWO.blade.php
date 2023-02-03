<div class="modal fade" id="nmb_list{{$value->id}}-{{$key4}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List WO</th>
                                    <th class="bg-striped" width="80%">Size</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value4 as $key5 => $value5)
                                <?php 
                                $totalqty = $value5->qty1 + $value5->qty2 + $value5->qty3 + $value5->qty4 + $value5->qty5 + 
                                            $value5->qty6 + $value5->qty7 + $value5->qty8 + $value5->qty9 + $value5->qty10 +
                                            $value5->qty11 +  $value5->qty12 + $value5->qty13 + $value5->qty14 + $value5->qty15; 
                                ?>
                                <tr>
                                    <td>{{$key4}}</td>
                                    <td>{{$value5->size1}}, {{$value5->size2}}, {{$value5->size3}}
                                        @if($value5->size4 != null)
                                        , {{$value5->size4}}
                                        @endif
                                        @if($value5->size5 != null)
                                        , {{$value5->size5}}
                                        @endif
                                        @if($value5->size6 != null)
                                        , {{$value5->size6}}
                                        @endif
                                        @if($value5->size7 != null)
                                        , {{$value5->size7}}
                                        @endif
                                        @if($value5->size8 != null)
                                        , {{$value5->size8}}
                                        @endif
                                        @if($value5->size9 != null)
                                        , {{$value5->size9}}
                                        @endif
                                        @if($value5->size10 != null)
                                        , {{$value5->size10}}
                                        @endif
                                        @if($value5->size11 != null)
                                        , {{$value5->size11}}
                                        @endif
                                        @if($value5->size12 != null)
                                        , {{$value5->size12}}
                                        @endif
                                        @if($value5->size13 != null)
                                        , {{$value5->size13}}
                                        @endif
                                        @if($value5->size14 != null)
                                        , {{$value5->size14}}
                                        @endif
                                        @if($value5->size15 != null)
                                        , {{$value5->size15}}
                                        @endif
                                    </td>
                                    <td>{{$totalqty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="nmb_listWO2" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>456</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="nmb_listWO3" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>789</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================= -->

<div class="modal fade" id="press_listWO1" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>222</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="press_listWO2" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>333</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="press_listWO3" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>444</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================= -->

<div class="modal fade" id="bund_listWO1" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>777</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="bund_listWO2" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>888</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<div class="modal fade" id="bund_listWO3" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-striped" width="80%">List Color</th>
                                    <th class="bg-striped" width="20%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>999</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->

