
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="modal fade" id="playlist" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:560px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row px-1">
                        <div class="col-12">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fs-16 fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <form id="form-playlist" action="{{route ('guide.playlist.storePlaylist') }}" method="post">
                        @csrf
                        <div class="row px-1">
                            <div class="col-12">
                                <span class="title-14-sm">Playlist Name</span>
                                <div class="input-group mt-1">
                                    <input type="text" class="form-control border-input playlist-name" id="nama" name="nama" autocomplete="off" placeholder="input playlist name...">
                                    
                                </div>
                                <span class="title-14-sm">Category</span>
                                <div class="input-group mt-1">
                                    <select class="form-control list-category playlist-category-id" name="kategori_id">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="button" id="submit-playlist" class="btn-blue submit-store-playlist">Save <i class="ml-3 fas fa-upload"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script>
    document.getElementById("submit-playlist").onclick = (e) => {
        document.getElementById("form-playlist").submit()
    }

    jQuery(document).ready(function($){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        showCategory()
        function showCategory(){
            $.ajax({
                url: '{{ route("show-category") }}',         
                type: "get",
                dataType: 'json',            
                success: function (data) {     
                    html = ``
                    for (let i = 0; i < data.length; i++) {
                        html += `<option value="`+data[i].id+`">`+data[i].nama+`</option>`
                    }     
                    $('.playlist-category-id').html(html)
                },
                error: function (xhr, status, error) {
                    // alert(xhr.responseText);
                }
            })
        }

        $('body').on('click', '.submit-store-playlist', function () { 
            storePlaylist()
        })

        function storePlaylist(){
            var kategori_id = $('.playlist-category-id').val()
            var name = $('.playlist-name').val()

            $.ajax({
                data:{
                    kategori_id: kategori_id,
                    nama:name
                },
                url: '{{ route("store-playlist") }}',           
                type: "post",
                dataType: 'json',            
                success: function (data) {
                    // alert('playlist saved!')
                    location.reload()
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        }
    })
    </script>
