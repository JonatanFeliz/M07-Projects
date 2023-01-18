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
                         <a class="nav-link text-white" href="#">Blog</a>
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

          <div class="row">
               <div class="col-12 mb-4">
                    <h2 class="text-center mt-5 text-info text-decoration-underline fs-1 fw-bold">Noticias deportivas</h2>
               </div>
          </div>

          <div class="row justify-content-center">
               <?php

                    require_once(__DIR__ . '/../../../config.php');
                    use function Config\get_view_dir;

                    require_once(get_view_dir() . '/view.php');

                    echo View\get_html_body($blog_table->body,"\get_blog_card");
               ?>
          </div>
     </div>
</section>





