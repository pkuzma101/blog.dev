<html>
  <head>
    <title>Synomym Matching Game</title>
    <link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/grid-upgrade.css">
    <link rel="stylesheet" href="css/synonym.css">
  </head>
  <body>
    <a href="/portfolio" class="btn btn-default" id="back">Back</a>
    <section id="synonym_page">
      <div id="game_board">
      <article id="intro_box">
        <h2>Let's Play Synonym Matching Game!</h2>
        <div>
          Click on two cards.  If they are synonyms, the cards will stay overturned.  If they are not,
          they will turn back over.  You win once all synonym pairs have been matched.  Try to win in as
          few clicks as possible!
        </div>
      </article>
      <div id="score_row">
        <div class="col-6-12"><span>Turns:</span><span id="num_turns"></span></div>
        <div class="col-6-12"><span>Pairs Found:</span><span id="pair_found"></span></div>
      </div>
      <table id="game_grid"></table>
      <div id="reset_row"><a href="#/" id="reset_btn">Reset</a></div>
      </div>
    </section>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
      $(document).ready(function() {
  
        var counter = 0;
        var found = [];
        var choices = [];
        var score = 0;
        var pair_found = 0;

        $('#num_turns').html(score);
        $('#pair_found').html(pair_found);

        // function that resets the game
        function new_game() {
          var cards = [
            {
              data_id: 1,
              html: "large"
            },
            {
              data_id: 1,
              html: "big"
            },
            {
              data_id: 2,
              html: "beautiful"
            },
            {
              data_id: 2,
              html: "gorgeous"
            },
            {
              data_id: 3,
              html: "make"
            },
            {
              data_id: 3,
              html: "create"
            },
            {
              data_id: 4,
              html: "smart"
            },
            {
              data_id: 4,
              html: "intelligent"
            },
            {
              data_id: 5,
              html: "eat"
            },
            {
              data_id: 5,
              html: "consume"
            },
            {
              data_id: 6,
              html: "nice"
            },
            {
              data_id: 6,
              html: "kind"
            },
            {
              data_id: 7,
              html: "hit"
            },
            {
              data_id: 7,
              html: "strike"
            },
            {
              data_id: 8,
              html: "weapon"
            },
            {
              data_id: 8,
              html: "arm"
            },
            {
              data_id: 9,
              html: "fix"
            },
            {
              data_id: 9,
              html: "repair"
            },
            {
              data_id: 10,
              html: "clean"
            },
            {
              data_id: 10,
              html: "tidy"
            },
            {
              data_id: 11,
              html: "talk"
            },
            {
              data_id: 11,
              html: "speak"
            },
            {
              data_id: 12,
              html: "small"
            },
            {
              data_id: 12,
              html: "tiny"
            },
            {
              data_id: 13,
              html: "cold"
            },
            {
              data_id: 13,
              html: "frigid"
            },
            {
              data_id: 14,
              html: "burn"
            },
            {
              data_id: 14,
              html: "sear"
            },
            {
              data_id: 15,
              html: "play"
            },
            {
              data_id: 15,
              html: "frolic"
            },
          ];
          $('#game_grid').empty();

          for (i = 1; i <= 6; i++) {
            $('#game_grid').append('<tr class="grid_row"></tr>');
          }

          for (i = 1; i <= 5; i++) {
            $('.grid_row').append('<td class="card"></td>');
          }

          var square = $('.grid_row').children();

          // for each square, choose a random object from the cards array
          $.each(square, function(key, value) {
            var random_card = cards[Math.floor(Math.random()*cards.length)];
            var self = $(this);
            self.attr("data_id", random_card.data_id);
            self.append('<a href="#/" class="card_text">' + random_card.html + '</a>');

            // Remove the randomly chosen card from the array
            cards = jQuery.grep(cards, function(j) {
              return j.html !== random_card.html;
            });
          });

          $('.card_text').click(function() {
            var self = $(this);
            self.addClass("picked");
            choices.push(self.parent().attr("data_id"));
            counter++;
            if (counter == 2) {
              counter = 0;
              if (choices[0] == choices[1]) {
                $('a.picked').addClass("found");
                $('a').removeClass("picked");
                choices = [];
                score++;
                pair_found++;
                $('#num_turns').html(score);
                $('#pair_found').html(pair_found);
              } else {
                setTimeout(function() {
                  $('a').removeClass("picked");
                  choices = [];
                  score++;
                  $('#num_turns').html(score);
                }, 2000);
              }
            }

            if (pair_found == 15) {
              alert("Congratualtions!  You win!  Your final score is " + score + "!");
            }

          });
        }

        new_game();

        $('#reset_btn').click(function() {
          var reset = confirm("Are you sure you want to start a new game?");
          if (reset == true) {
            var counter = 0;
            var found = [];
            var choices = [];
            var score = 0;
            var pair_found = 0;
            $('#num_turns').html(score);
            $('#pair_found').html(pair_found);

            new_game();

          } else {
            return false;
          }
        });
      });

    </script>
  </body>
</html>