<?php

require '../../../config.emp.php';




?>

<html>
	<head>
		<title>Final Fantasy Character Database</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cinzel:400,700|Cinzel+Decorative:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/grid-upgrade.css">
		<link rel="stylesheet" href="css/characters.css">
	</head>
	<body>
		<section id="ff_page">
			<a href="/portfolio" class="btn btn-default" id="back">Back</a>
			<h1 id="main_title">Final Fantasy Character Database</h1>

			<div id="tabs">
				<ul id="tab_list">
					<li id="fflogo1"><a href="#tabs-1" id="ff1" data-id="1">&#8544;</a></li>
					<li id="fflogo2"><a href="#tabs-2" id="ff2" data-id="2">&#8545;</a></li>
					<li id="fflogo3"><a href="#tabs-3" id="ff3" data-id="3">&#8546;</a></li>
					<li id="fflogo4"><a href="#tabs-4" id="ff4" data-id="4">&#8547;</a></li>
					<li id="fflogo5"><a href="#tabs-5" id="ff5" data-id="5">&#8548;</a></li>
					<li id="fflogo6" class="bottom_row"><a href="#tabs-6" id="ff6" data-id="6">&#8549;</a></li>
					<li id="fflogo7" class="bottom_row"><a href="#tabs-7" id="ff7" data-id="7">&#8550;</a></li>
					<li id="fflogo8" class="bottom_row"><a href="#tabs-8" id="ff8" data-id="8">&#8551;</a></li>
					<li id="fflogo9" class="bottom_row"><a href="#tabs-9" id="ff9" data-id="9">&#8552;</a></li>
					<li id="fflogo10" class="bottom_row"><a href="#tabs-10" id="ff10" data-id="10">&#8553;</a></li>
				</ul>
				<section id="card_section">
					<article id="tabs-1">
						<div id="ff1_body" class="tab_body"></div>
					</article>
					<article id="tabs-2">
						<div id="ff2_body" class="tab_body"></div>
					</article>
					<article id="tabs-3">
						<div id="ff3_body" class="tab_body"></div>
					</article>
					<article id="tabs-4">
						<div id="ff4_body" class="tab_body"></div>
					</article>
					<article id="tabs-5">
						<div id="ff5_body" class="tab_body"></div>
					</article>
					<article id="tabs-6">
						<div id="ff6_body" class="tab_body"></div>
					</article>
					<article id="tabs-7">
						<div id="ff7_body" class="tab_body"></div>
					</article>
					<article id="tabs-8">
						<div id="ff8_body" class="tab_body"></div>
					</article>
					<article id="tabs-9">
						<div id="ff9_body" class="tab_body"></div>
					</article>
					<article id="tabs-10">
						<div id="ff10_body" class="tab_body"></div>
					</article>
				</section>
			</div><!-- tabs -->
		</section><!-- ff_page -->

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/characters.js"></script>
		<script>
			$(document).ready(function() {

				$(function() {
					$('#tabs').tabs();
				});

				$('ul#tab_list li').hover(function() {
					$(this).children().fadeIn(700);
				},
				function() {
					$(this).children().fadeOut(700);
				});
			});
		</script>
	</body>
</html>