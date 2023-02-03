
<h2>Dear, {{ $data['nama_kabag'] }} </h2>
<h2>Cc, {{ $data['nama_manager'] }} </h2>
<h3>Berikut Temuan Tim Satgas GGI INDAH di departemen {{$data['bagian']}}
<h3>Pada  Tanggal, {{ $data['tgl_tegur'] }} </h3>
<p>{{ $data['deskripsi'] }}</p>
<p> Bukti temuan terlampir </p> 
<p> Mohon Segera ditindaklanjuti dan Update Informasi CAP pada link berikut
<p>Akses melalui Komputer Gistex  <a href="http://10.8.0.108/ggi-is/public/ggi_indah/findings/respon/{{ $data['id'] }}"> Klik Disini</a></p>
<p>Akses melalui Handphone <a href="https://gcc.gistexgarmenindonesia.com:7186/ggi_indah/findings/respon/{{ $data['id'] }}"> Klik Disini</a></p>
<br>
Terimakasih,<br>
Satgas GGI INDAH