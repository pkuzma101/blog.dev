<html>
<title>Timeline</title>
<link rel="stylesheet" href="css/timeline.css" type="text/css">
<body>
  <section id="timeline_box">
    <ul id="timeline">
    </ul>
  </section>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // create the years of the timeline
      for (i = 1967; i < 2018; i++) {
        $('ul#timeline').append('<li id="'+ i + '"><div class="bubble"><div class="year">'+ i + '</div></div></li>');
        // create markers for generations
        if (i == 1972 || i == 1973 || i == 1974 || i == 1975 || i == 1976) {
          // $('li#'+i).addClass('first_gen');
          $('li#'+i).prepend('<span class="first_gen"></span>');
        }
      }
    });
  </script>
</body>
</html>
