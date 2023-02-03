    <div class="row" style="margin-top:-10px">
        <div class="col-12 pb-5">
            <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable3" class="table tbl-content-12">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Buyer</th>
                            <th>AVG</th>
                            <th>AVG tgl</th>
                            <th>Style</th>
                            <th>Item</th>
                            @foreach($tanggal as $key1=>$value1)
                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;?>
                        @foreach($record_produktif as $key2=>$value2)
                        <?php
                        $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value2['branch']}}</td>
                            <td>{{$value2['line']}}</td>
                            <td>{{$value2['buyer']}}</td>
                            <td>{{$value2['average']}}</td>
                            <td>{{$value2['average_month']}}</td>
                            <td>{{$value2['style']}}</td>
                            <td>{{$value2['item']}}</td>
                            @foreach($tanggal as $key3=>$value3)
                            <?php
                            $collect=collect($data);
                            $check=$collect->where('fasilitas',$value2['branch'])->where('line',$value2['line'])
                                    ->where('style',$value2['style'])->where('tanggal',$value3['tanggal'])->count();
                            if($check>0){
                                $sum=collect($replace)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                ->where('fasilitas',$value2['branch'])
                                ->where('style',$value2['style'])
                                ->sum('act_line');
                                $count=collect($replace)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                ->where('fasilitas',$value2['branch'])->where('style',$value2['style'])->count();
                                $jumlah_op=$op_hadir->where('branchdetail',$value2['branch'])->where('line',$value2['line'])
                                        ->where('style',$value2['style'])->where('tanggal',$value3['tanggal'])->first();
                                    if($jumlah_op!=null){
                                        $avg=number_format($sum/$count/$jumlah_op['total_operator'],2, "," , ".");
                                    }
                                    else{
                                        $avg='op null';
                                    }
                            }
                            else{
                                $avg='-';
                            }
                            ?>
                                <th style="font-weight:400;text-align:left">{{$avg}}</th>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Buyer</th>
                            <th>AVG</th>
                            <th>AVG</th>
                            <th>Style</th>
                            <th>Item</th>
                            @foreach($tanggal as $key1=>$value1)
                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>