<?php 
$part = [];
foreach ($value->gelaran_wo as $key3 => $value3) {
$part[] = [
    'part' => $value3->part
];
}
$compo = collect($part)
                ->groupBy('part')
                ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
$body = collect($compo)->count('part');
?>
<a class="tbl-total-qty" data-toggle="modal" data-target="#Part-{{$value->id}}" title="View Info">{{$body}}</a>
<div class="modal fade" id="Part-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="cards-scroll scrollX mt-2" id="scroll-bar">
                    <table id="table_gelar" class="table gelar-tbl-content2 table-bordered no-wrap">
                        <thead class="bg-thead">
                            <tr>
                            <th>Description</th>
                            <th>Sequence</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compo as $key4 => $value4)
                            <?php 
                            $bagian = collect($component)->where('id', $value4['part'])->first();
                            ?>
                            <tr>
                                <td>{{$bagian->desc}}</td>
                                <td>{{$bagian->seq}}</td>
                                <td>{{$bagian->srtx}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>