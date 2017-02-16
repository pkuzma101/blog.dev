<html>
<title>Timeline</title>
<link rel="stylesheet" href="css/timeline.css" type="text/css">
<body>
  <section id="timeline_box">
    <ul id="timeline">
      <?php
      $current_year = date("Y");
      /*for ($i = 1967; $i < $current_year + 1; $i++) {
        echo '<p id="'.$i.'"></p>';
      }*/
      ?>
    </ul>
  </section>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>
    $(document).ready(function() {
      for (i = 1967; i < 2018; i++) {
        $('ul#timeline').append('<li id="'+ i + '"><div class="bubble"><div class="year">'+ i + '</div></div></li>');
      }
    });
  </script>
</body>
</html>
