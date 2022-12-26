<h1> Manga Data </h1>

<table>

     <?php
     require_once(__DIR__ . '/../../config.php');
     use function Config\get_view_dir;

     require_once(get_view_dir() . '/view.php');

     echo View\get_html_header($manga_table->header);
     echo View\get_html_body($manga_table->body);
     ?>

</table>
