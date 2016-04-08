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
					<article id="tabs-1" data-id="1">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="1">Add Character</a></h3>
						<div id="ff1_body" class="tab_body">
              <article id="intro">
                <p>Welcome!  Click on a logo to see all characters in the database for that particular Final Fantasy game.  If you
                   if you see one of your favorite characters is missing, go ahead and add him/her!  To change the portrait for a 
                   character, just click on his/her existing portrait.  May the Crystal guide you!
                </p>
              </article>
            </div>
					</article>
					<article id="tabs-2" data-id="2">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="2">Add Character</a></h3>
						<div id="ff2_body" class="tab_body"></div>
					</article>
					<article id="tabs-3" data-id="3">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="3">Add Character</a></h3>
						<div id="ff3_body" class="tab_body"></div>
					</article>
					<article id="tabs-4" data-id="4">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="4">Add Character</a></h3>
						<div id="ff4_body" class="tab_body"></div>
					</article>
					<article id="tabs-5" data-id="5">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="5">Add Character</a></h3>
						<div id="ff5_body" class="tab_body"></div>
					</article>
					<article id="tabs-6" data-id="6">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="6">Add Character</a></h3>
						<div id="ff6_body" class="tab_body"></div>
					</article>
					<article id="tabs-7" data-id="7">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="7">Add Character</a></h3>
						<div id="ff7_body" class="tab_body"></div>
					</article>
					<article id="tabs-8" data-id="8">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="8">Add Character</a></h3>
						<div id="ff8_body" class="tab_body"></div>
					</article>
					<article id="tabs-9" data-id="9">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="9">Add Character</a></h3>
						<div id="ff9_body" class="tab_body"></div>
					</article>
					<article id="tabs-10" data-id="10">
						<h3 id="add_label"><a href="#/" class="character_add" data-toggle="modal" data-target="#character_modal" data-id="10">Add Character</a></h3>
						<div id="ff10_body" class="tab_body"></div>
					</article>
				</section>
			</div><!-- tabs -->
		</section><!-- ff_page -->
    <audio id="menu_click" preload="auto"><source src="sound/cursor_move.mp3"></source></audio>
    <audio id="save_chime" preload="auto"><source src="sound/save_chime.mp3"></source></audio>

		<?php

		include('characters_modal.php');

		?>

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<!-- // <script src="js/jquery.form.min.js"></script> -->
    <script src="js/parallax.js"></script>  
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="js/characters.js"></script>
		<script>
			$(document).ready(function() {
        $('#ff_page').parallax({imageSrc: '/projects/final_fantasy/images/background_wallpaper.jpg'});

				// tab functionality
				$(function() {
					$('#tabs').tabs();
				});

				// fade roman numerals on tabs in and out
				$('ul#tab_list li').hover(function() {
					$(this).children().fadeIn(700);
				},
				function() {
					$(this).children().fadeOut(700);
				});

        // menu click sound plays whenever an 'a' is clicked
        var menu_click = $('#menu_click')[0];
        $('a').click(function() {
          menu_click.play();
        });

        // var save_chime = $('#save_chime')[0];
        // $('#submit_btn').click(function() {
        //   save_chime.play();
        // });

			});
		</script>
	</body>
</html>