@extends('layouts.master')
<style>
h1
{
	text-align: center;
}

.contact_info_heading
{
	color: rgb(52, 146, 237);
}

#name
{
	text-decoration:underline;
}

p, #name, .well
{
	color: black;
}

#about_site
{
	font-size: 18px;
	border-style: solid;
	border-width: 1px;
	padding-top: 10px;
	padding-left: 10px;
	padding-right: 10px;
	padding-bottom: 15px;
}

.well
{
	text-align:center;
	padding-top: 100px;
}
</style>

@section('title', 'about us')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="/img/edited3_headshot_adam.jpg" alt="Adam Vega" class="img-circle img-responsive"> <br>
			<h3 id="name">Adam Vega</h3>
			<p>Adam Vega graduated with a degree in Architecture in 2012 from the University of Texas at San Antonio. After having worked in the field he decided to change careers to information technology. After graduating from Codeup he plans on pursuing an entry level web development job. He specialized in design and layout in both information and graphic arts.</p>
			<div class="contact_info_heading">
				<h3>Contact Info</h3>
				<li>linkedin : </li>
				<li>github : {{ HTML::link('https://github.com/adam-j-vega') }}</li>
				<li>email : {{ HTML::mailto('adam.j.vega@hotmail.com') }}</li>
			</div>
		</div>

		<div class="col-md-4">
			<img src="/img/edited4_headshot_audrey.jpg" alt="Audrey Lopez" class="img-circle img-responsive">
			<h3 id="name">Audrey Lopez</h3>
			<p>Audrey Lopez worked in varying fields before launching into her career as a software and website developer with the help of the Codeup staff and numerous colleagues. Always gregarious, she now works predominately as a front end developer where user experience is still the key to her best work!</p>
			<div class="contact_info_heading">
				<h3>Contact Info</h3>
				<div id="contact_info"3>
					<li>linkedin : {{ HTML::link('http://linkedin.com/pub/audrey-lopez/a3/8a8/450') }}</li>
					<li>github : {{ HTML::link('http://github.com/audreyelopez') }}</li>
					<li>email : {{ HTML::mailto('audreyelopez@gmail.com') }}</li>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<img src="/img/edited3_headshot_cory.jpg" alt="Cory Rodriguez" class="img-circle img-responsive">
			<h3 id="name">Cory Rodriguez</h3>
			<p>Cory Rodriguez graduated from a STEM based curriculum at Brooks Academy of Science and Engineering. As part of an internship program, he was placed at Codeup Technology Information and Services School. After his internship, he was invited to attend the fall student course; now graduated, he does freelance work and is looking to launch his career as a full stack web developer.</p><hr>

			<div class="contact_info_heading">
				<h3>Contact Info</h3>
				<li>linkedin : {{ HTML::link('http://www.linkedin.com/in/rodriguezcory') }}</li>
				<li>github : {{ HTML::link('http://github.com/CoryRay') }}</li>
				<li>email : {{ HTML::mailto('coreyreylp@gmail.com') }}</li>
			</div><hr>
		</div><br>
		<div class="well well-lg">
			<h1>About the Site</h1>
			<p id="about_site"> Rising Star website was created in 2014 by delevopers Adam Vega, Audrey Lopez and Cory Rodriguez, students of Codeup Information Technologies Bootcamp. The site was developed as a way to bring together local and aspiring talent with the people looking to make them stars. Bridging the gap between those experienced in the entertainment field and those with the passion and talent to "make it" there, Rising Star is it's own luminary in the world of technology, social media and entertainment itself </p>
		</div>
	</div>
</div>
@stop
