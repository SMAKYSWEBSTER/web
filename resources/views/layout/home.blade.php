@extends('layouts.app')

@section('content')
{{-- @include('layout.login.session') --}}
<h1 class="centered-text">SMAKYS Website</h1>
<div class="wrapper image-slider">
  <img src="https://images.pexels.com/photos/8633/nature-tree-green-pine.jpg" class="active">
  <img src="https://www.planwallpaper.com/static/cache/41/08/410827afadb535c2eb3b22c16692b1be.jpg">
  {{-- <img src="">
  <img src="">
  <img src=""> --}}
  <span class="prev"><i class="fas fa-chevron-left"></i></span>
  <span class="next"><i class="fas fa-chevron-right"></i></span>
</div>

<div class="wrapper banner">
  <h1>- BUKA PIKIRAN, SENTUH HATI, BENTUK MASA DEPAN -</h1>
</div>

<div class="wrapper column">
  <div class="col-3">
    <h2>VISI</h2>
    <p>Dibimbing oleh Tritunggal Mahakudus siswa SMA Katolik Yos Sudarso menjadi manusia berkualitas dan mampu berkompetisi.</p>
  </div>
  <div class="col-3">
    <h2>MISI</h2>
    <p>1. Membangun komunitas persaudaraan </p>
    <p>2. Mendidik siswa menjadi manusia yang berilmu pengetahuan. </p>
    <p>3. Menyiapkan siswa untuk melanjutkan pendidikan ke jenjang yang lebih tinggi dan berkualitas. </p>
    <p>4. Mendidik siswa menjadi manusia yang berdisiplin dan bertanggungjawab serta berwirausaha/mandiri. </p>
    <p>5. Mendidik siswa menjadi manusia berbudi luhur, bertaqwa, dan cinta lingkungan. </p>
    <p>6. Membimbing siswa agar mampu berkompetisi. </p>
  </div>
</div>

<div class="wrapper banner">
  <h1>Sambutan Kepala Sekolah</h1>
  <img src="{{ asset('photos/kepala_sekolah.jpg') }}" class="pic">
  <p>Puji Syukur kita panjatkan kepada Tuhan Yang Maha Esa, sehingga SMAK Yos Sudarso Batam, sekarang mempunyai media komunikasi web sekolah. Tidak kata yang pantas untuk diucapkan, kecuali kata syukur nikmat atas segala limpahan rahmat, berkat, dan hidayat-Nya, sehingga kami masih bisa berkiprah dalam dunia pendidikan yang sangat mulia ini . Di era Globalisasi ini dan Informasi, kita dituntut untuk dapat mengikuti perkembangan tersebut terutama dalam hal informasi. Karena dengan informasi, pada hakekatnya adalah saling memberi dan menerima sehingga dalam kehidupan ini yang ada adalah saling melengkapi. Berkenan dengan rahmat Tuhan Yang Maha Esa, puji syukur kami dapat mempublishkan website SMAK Yos Sudarso Batam, Saya berharap dengan website ini akan berguna bagi kita semua. Atas Ketidaksempurnaan website kami, koreksi dan saran bersifat produktif dan inovatif sangat kami nantikan. Terima kasih!</p>
  <p class="sign">Stanislaus K. Teluma, S.Pd.</p>
</div>
@endsection