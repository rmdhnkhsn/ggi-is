<div class="row">
    <div class="col-lg-6">
        <div class="container">
            <center><img src="{{url('/assets3/gistex.jpg')}}"  height="100px" width="200px">
            <br>
                    <label>Gistex Garmen Indonesia</label>
                    <br>
                    <label> INDAH</label>
                    <br>
                    <label> Inovatif Nyaman Disiplin Aman Hijau</label>
                    
        </center>
        </div>
        <div class="container">
            <form action="{{ route('indah.vote')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <br>
                    <input type="text" class="form-control mb-2" id="nik" name="nik" placeholder="Masukan NIK" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                    <button type="submit" id="nikcari"  class="btn btn-warning my-2 col-lg-12" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.2);"><i class="fa fa-search fa-xs"></i> Find</button>
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="container">
            <center>
               <video id="preview" class="col-lg-9"></video></br> 
               <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                    <label class="btn btn-warning active" style="box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
                        <input type="radio" name="options" value="1" autocomplete="off" > Front Camera
                    </label>
                    <label class="btn btn-warning active" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                        <input type="radio" name="options" value="2" autocomplete="off" checked> Back Camera
                    </label>
                </div>
            </center>
        </div>
    </div>
</div>
<br>
<body>
<center>




