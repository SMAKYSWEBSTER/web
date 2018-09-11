<!DOCTYPE html>
<html>

<head>
	<title>SMAK Yos Sudarso Batam - Official Website</title>
	<meta name="keywords" content="smak yos sudarso batam, sma yos sudarso batam,smak yos sudarso,  sma yos sudarso, smakys, sma katolik yos sudarso batam">
	<meta name="google-site-verification" content="cm2XFOhor3Dc4tO4axdEGWYnwBeIspXfhA_wlsRMMDk" />
	<meta name="description" content="Ini adalah webite resmi dari SMA Katolik Yos Sudarso Batam. Di website ini, kalian semua bisa mengetahui lebih banyak mengenai SMAK Yos Sudarso Batam. Website ini berisi konten seperti aktivitas-aktivitas sekolah, ekstrakurikuler, pengumuman, dan lain sebagainya. Bagi anda yang ingin mengetahui lebih detail tentang SMAK Yos Sudarso Batam silahkan klik link diatas. Terima Kasih!" />
	<meta name="google-site-verification" content="Bcu0lXUO-488qPc6tmsbpEX1MMRxgtgb9RDH14ukjCM" />
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">-->
	<link href="https://fonts.googleapis.com/css?family=Lato:500" rel="stylesheet" type="text/css"> 
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Palanquin+Dark" rel="stylesheet">
	<link href="/css/navbar.css" rel="stylesheet">
	<link href="/photos/vektoryos.png" rel="icon">
</head>

<body>
	<div id="isi">
		<header>
			<div id="content">
				<div id="logo">
					<img src="/photos/logoyos.jpg">
					<h1>SMAK Yos Sudarso Batam</h1>
				</div>
				<div id="container">
					<nav>
						<ul>
							<li><a href="/">Home</a></li>
							<li>
								<p>About</p>
								<div class="drop">
									<div class="down"><a href="/history">History</a></div>
									<div class="down"><a href="{{ route('achievement.index') }}">Achievements</a></div>
									<div class="down"><a href="{{ route('activity.index') }}">Activities</a></div>
									<div class="down"><a href="{{ route('facility.index') }}">Facilities</a></div>
									<div class="down"><a href="/extracurricular">Extracurricular</a></div>
									@if(Auth::check() == true)
									<div class="down"><a href="{{ route('myaccount.index') }}">My Account</a></div>
									@endif
								</div>
							</li>
							<li><a href="{{ route('announcement.index') }}">Announcement</a></li>
							@if(Auth::check() !== true)
							<li><a href="{{ route('contactus.index') }}">Contact Us</a></li>
							@endif 
							@if(Auth::check() == true)
								@if(Auth::user()->username == 'tatausaha')
								<li><a href="{{ route('manage.index') }}">Manage</a></li>
								@endif 
							@endif
							@if(Auth::check() !== true)
							<li><a href="{{ route('login') }}">Login</a></li>
							@else
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
							@endif
						</ul>
					</nav>
				</div>
			</div>
			
			<!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114906629-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-114906629-1');
            </script>
            
		</header>@yield('session') @yield('content')
	</div>
	<!-- <div class="scroll-top">
		<span><i class="fas fa-angle-double-up"></i></span>
	</div> -->
	<div id="footer">
		<div class='info-up'>
			<li class='adr'>SMA KATOLIK YOS SUDARSO BATAM</li>
			<li class='adr'>STATUS : TERAKREDITASI “A”</li>
		</div>
		<div class='info'>
			<li class='adr'>Alamat : Batam Centre – Jln. Dang Merdu No.02 - Kel. Teluk Tering – Kec. Batam Kota</li>
			<li class='adr'>BATAM 29421 TELP : (0778) 461547 FAX : (0778) 462661</li>
		</div>
		<div class='info'>
			<li>
				<div id="fb"><a href="https://www.facebook.com/officialSMAKYS/">
					<i class="fab fa-facebook-square" id="fb" aria-hidden="true"></i>officialSMAKYS</a>
				</div>
			</li>
			<li>
				<div id="insta"><a href="https://www.instagram.com/smakysgram/?hl=en">
					<i class="fab fa-instagram" id="insta" aria-hidden="true"></i>@smakysgram</a>
				</div>
			</li>
			<li>
				<div id="line"><a href="#">
					<i class="fab fa-line" id="line" aria-hidden="true"></i>Find us on LINE @uyd3058f</a>
				</div>
			</li>
		</div>
		<p>Developed By &#169; 2017 SMAKYS Programmers Clan - SMAK Yos Sudarso Batam</p>
		<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $("nav ul li p + .drop").on("click",function(){
                   $(this).css({
                       "display":"block",
                   }); 
                });
            });
        </script>
</body>

</html>