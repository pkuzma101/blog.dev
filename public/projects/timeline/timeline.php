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
      }

      // create years for generation spans
      for (j = 1967; j < 2018; j++) {
        $('ul#gen_line').append('<li id="' + j + '"></li>');
        if (j == 1973 || j == 1974 || j == 1975 || j == 1976 || j == 1977 ) {
          $('li#' + j).css("background-color", "green");
        }
      }

      // create first generation span
      // for (a = 1972; a < 1979; a++) {
      //   $('ul#first_gen').prepend('<li id="first' + a + '" class=""');
      // }
    });
  </script>
</body>
</html>
