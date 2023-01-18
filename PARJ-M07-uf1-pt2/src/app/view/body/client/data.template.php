<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" width="40px" height="60px" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/gallery">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/data">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/web-service">Web Service</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Body-->
<section>
    <div class="container">

        <h1 class="text-center mt-5"><span class="text-info border-bottom border-primary border-5">La Liga - Classificación</span></h1>

        <div class="row">
            <div class="col-12">
                <div class="w-50 mx-auto mt-5">
                        <table class="table table-success table-striped text-center">
                            <?php

                                require_once(__DIR__ . '/../../../config.php');
                                use function Config\get_view_dir;

                                require_once(get_view_dir() . '/view.php');

                                echo "<thead>";
                                    echo View\get_html_header($team_table->header);
                                echo "</thead>";

                                echo "<tbody>";
                                echo View\get_html_body($team_table->body,"\get_html_row");
                                echo"</tbody>";
                            ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Apartado de comentarios-->
<section class="bg-dark mt-5">
     <div class="container-fluid">

          <h2 class="text-info ms-5 py-4">Comentarios</h2>
          
          <div class="row ms-5">
               <?php

                    echo View\get_html_body($comments_table->body,"\get_comments");
               ?>
          </div>

          <form method="post" class="p-5">
               <input type="text" name="user" placeholder="User"><br><br>
               <textarea name="comment" cols="50" rows="5" placeholder="Escribe tu comentario aqui"></textarea> <br><br>
               <input type="submit" class="btn btn-primary" value="Afegir">
          </form>
          
     </div>

     
</section>