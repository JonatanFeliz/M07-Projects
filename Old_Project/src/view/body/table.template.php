<h1> Clasificacion de LaLiga </h1>

<table>

     <?php
     require_once(__DIR__ . '/../viewlib.php');

     echo View\get_html_header($football_table->header);
     echo View\get_html_body($football_table->body);
     ?>

</table> 