<h1> Blog </h1>

<form method="post">
     Add a message:  <input type = "text" name = "message"/>
</form>

<br>

<table>
     <?php
     require_once(__DIR__ . '/../../config.php');
     use function Config\get_view_dir;

     require_once(get_view_dir() . '/view.php');

     echo View\get_html_header($blog_table->header);
     echo View\get_html_body($blog_table->body);
     ?>
</table>
