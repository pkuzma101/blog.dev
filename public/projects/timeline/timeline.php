<html>
<title>Timeline</title>
<link rel="stylesheet" href="css/timeline.css" type="text/css">
<body>
  <section id="timeline_box">
    <div id="timeline_div">
      <ul id="gen_line"></ul>
      <ul id="timeline"></ul>
    </div>
  </section>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // create the years of the timeline
      for (i = 1967; i < 2018; i++) {
        $('ul#timeline').append('<li id="'+ i + '"><div class="bubble"><div class="year">'+ i + '</div></div></li>');
        // if (i == 1977) {
          // console.log($('ul#timeline').children());
        //   // $('li#' + i).append('<p>sadfsadf</p>');
        // }
      }

      // create years for generation spans
      for (j = 1967; j < 2018; j++) {
        $('ul#gen_line').append('<li id="' + j + '"></li>');

        // first generation span
        if (j == 1973 || j == 1974 || j == 1975 || j == 1976 || j == 1977 ) {
          $('li#' + j).css("background-color", "green");
        }

        if (j == 1978 || j == 1979 || j == 1980 || j == 1981 || j == 1982 || j == 1983 ) {
          $('li#' + j).css("background-color", "orange");
        }
      }
      // $('li#1977').append('<p>sadfsadf</p>');

    });
  </script>
</body>
</html>
