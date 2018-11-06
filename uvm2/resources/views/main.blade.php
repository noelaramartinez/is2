@extends('index')

@section('title', 'UVM')

@section('sidebar')
@parent
@endsection

@section('contenido')
<section id="portfolio" name="portfolio">

	<div>
		<div class="slider">
			<ul>
				<li>
					<img src="{{ asset('images/BannerHome-Consejo.jpg') }}" alt="BannerHome-Consejo" class="img-portfolio">
				</li>
				<li>
					<img src="{{ asset('images/BannerHome_Compartamos-1170X620.jpg') }}" alt="BannerHome_Compartamos" class="img-portfolio">
				</li>
			</ul>
		</div>
	</div>

	<nav class="menu-bar">
		<ul>
			<li>ACERCA DE UVM</li>
			<li>PROGRAMAS ACADEMICOS</li>
			<li>FINANCIAMIENTO Y BECAS</li>
			<li>ADMISIONES</li>
			<li>ÁREA ACADÉMICA</li>
			<li>EXPERIENCIA ESTUDIANTIL</li>
			<li>CAMPUS</li>
			<li>SERVICIOS ESCOLARES</li>
		</ul>
	</nav>
</section>

<div class="seccion">

	<br />
	<br />

	<div class="row text-center">
		<div class="col-md-4 text-right">
			<img src="{{ asset('images/solicita-info.png') }}" alt="solicita-info" width="70%" />
		</div>
		<div class="col-md-4 text-center">
			<img src="{{ asset('images/botones_01800.png') }}" alt="botones_01800" width="70%" />
		</div>
		<div class="col-md-4 text-left">
			<img src="{{ asset('images/boton_chat.jpg') }}" alt="boton_chat" width="70%" />
		</div>
	</div>

	<br />
	<br />

	<div class="row">
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="LinkHome-Fimpes" />
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="LinkHome-Fimpes" />
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
		</div>
	</div>

</div>

<div class="seccion">
	<img id="waldenImg" src="{{ asset('images/CompB_WALDEN_nov18_1.jpg') }}" alt="walden" />
</div>
<br />
<br />
<div class="seccion text-center fondo-gris">
	<h2>Así vivimos en UVM</h2>
	<div class="row">
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="LinkHome-Fimpes" />
			</div>
			<h4>Ver Noticia</h4>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
			<h4>Ver Más</h4>
		</div>
		<div class="col-md-4 text-center">
			<div class="panel">
				<img src="{{ asset('images/LinkHome-Fimpes.png') }}" alt="BannerHome_Compartamos" />
			</div>
			<h4>Ir al Blog</h4>
		</div>
	</div>

</div>
<br />
<br />

<div class="seccion fondo-oscuro texto-blanco seccion-ligas">
	<br />
	<br />
	<div class="row">
		<div class="col-md-3 col-sm-3">
			<img src="{{ asset('images/white-uvm.png') }}" alt="BannerHome_Compartamos" />
		</div>
		<div class="col-md-3 col-sm-3">
			<h4>Contáctanos</h4>
			<ul>
				<li>01 800 0000 886</li>
				<li>Chats</li>
				<li>Buzón del rector</li>
				<li>Prensa UVM</li>
				<li>Contáctanos</li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<h4>Contáctanos</h4>
			<ul>
				<li>01 800 0000 886</li>
				<li>Chats</li>
				<li>Buzón del rector</li>
				<li>Prensa UVM</li>
				<li>Contáctanos</li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<h4>Contáctanos</h4>
			<ul>
				<li>01 800 0000 886</li>
				<li>Chats</li>
				<li>Buzón del rector</li>
				<li>Prensa UVM</li>
				<li>Contáctanos</li>
			</ul>
		</div>
	</div>

</div>

<div class="footer">
	<div class="row">
		<div class="col-md-3">
			pie de pagina
		</div>
	</div>
</div>

@endsection