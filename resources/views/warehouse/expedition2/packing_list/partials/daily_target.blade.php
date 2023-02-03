    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Daftar PL TO ekspedisi</div>
                {{-- <div class="flexx" style="margin-right:245px">
                    <div class="input-group flex" style="width:230px">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-users"></i></span>
                        </div>
                        <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                            <option selected disabled>Select Buyer</option>
                            <option name="Adidas">Adidas</option>    
                            <option name="Erigo">Erigo</option>    
                        </select>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable2" class="table tbl-content-left">
               <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>PO</th>
                        <th>OR</th>
                        <th>WO</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>QTY Size</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataExpedisiDaily as $key =>$value)
                        
                    <tr>
                       
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['tanggal'] }}</td>
                        <td>{{ $value['po'] }}</td>
                        <td>{{ $value['or_number'] }}</td>
                        <td>{{ $value['wo'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        <td>{{ $value['style'] }}</td>
                        <td>{{ round($value['qty2'],0) }}</td>
                        <td>
                            <div class="flex" style="gap:.35rem;margin:-6px 0">
                                <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                
                        </td>
                       
                    </tr>
                    <script>
                        $(document).on('click', '#check{{$value['id']}}', function(){
                            var status = document.getElementById('check{{ $value['id'] }}').value;
                            if(document.getElementById('check{{ $value['id'] }}').checked){
                            var result = '1';
                            document.getElementById('cek{{$value['id'] }}').value = result;
                            }
                            else{
                            var result = null; 
                            document.getElementById('cek{{ $value['id'] }}').value = result;
                            }    
                            
                        }); 
                    </script>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
      </div>
    </div>