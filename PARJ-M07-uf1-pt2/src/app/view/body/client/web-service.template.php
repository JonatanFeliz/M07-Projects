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
                    <a class="nav-link text-white" href="#">Web Service</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Body-->
<div class="container">
    <div class="row mt-5 justify-content-center">

        <h1 class="text-center text-info mb-4">Web Service</h1>

        <?php

            require_once(__DIR__ . '/../../../config.php');
            use function Config\get_view_dir;

            require_once(get_view_dir() . '/view.php');

            echo View\show_web_service($web_array);
            
        ?>
    </div>

   
</div>

 <section class="bg-dark mt-5">
     <div class="container-fluid">

          <h2 class="text-info ms-5 py-4">Comentarios</h2>
          
          <div class="row ms-5">
               <?php

                    echo View\get_html_body($comments_web_service->body,"\get_comments");
               ?>
          </div>

          <form method="post" class="p-5">
               <input type="text" name="user" placeholder="User"><br><br>
               <textarea name="comment" cols="50" rows="5" placeholder="Escribe tu comentario aqui"></textarea> <br><br>
               <input type="submit" class="btn btn-primary" value="Afegir">
          </form>
          
     </div>

     
</section>