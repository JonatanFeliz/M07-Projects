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
                         <a class="nav-link text-white" href="#">Galeria</a>
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


<section>
    <div class="container-fluid text-center mb-5">
        <div class="row justify-content-center">
            <div class="col-12 mt-5 mb-3">
                <h1 class="fw-bold">Ganadores del Mundial</h1>
            </div>     

            <div class="col-8 mb-5">
                <div id="mundial" class="carousel slide mx-auto d-block w-75" data-bs-ride="carousel">
                    

                    <div class="carousel-inner">
                        <?php
                            $i = 1;
                            //print_r($images_array);
                            foreach ($worldcup_array as $image) {
                                if ($i == 1) {
                                    echo "<div class='carousel-item active'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                    $i++;
                                } 
                                else{
                                    echo "<div class='carousel-item'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                }
                            }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#mundial" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mundial" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row justify-content-center bg-dark text-light">
            <div class="col-12 mt-5 mb-3">
                <h1 class="fw-bold">Ganadores de la Champions</h1>
            </div>     

            <div class="col-8 mb-5">
                <div id="champions" class="carousel slide mx-auto d-block w-75" data-bs-ride="carousel">
                    

                    <div class="carousel-inner">
                        <?php
                            $i = 1;
                            //print_r($images_array);
                            foreach ($champions_array as $image) {
                                if ($i == 1) {
                                    echo "<div class='carousel-item active'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                    $i++;
                                } 
                                else{
                                    echo "<div class='carousel-item'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                }
                            }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#champions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#champions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 mt-5 mb-3">
                <h1 class="fw-bold">Ganadores del Balon de Oro</h1>
            </div>     

            <div class="col-8 mb-5">
                <div id="balon-oro" class="carousel slide mx-auto d-block w-75" data-bs-ride="carousel">
                    

                    <div class="carousel-inner">
                        <?php
                            $i = 1;
                            //print_r($images_array);
                            foreach ($goldenball_array as $image) {
                                if ($i == 1) {
                                    echo "<div class='carousel-item active'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                    $i++;
                                } 
                                else{
                                    echo "<div class='carousel-item'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                }
                            }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#balon-oro" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#balon-oro" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row justify-content-center bg-dark text-light">
            <div class="col-12 mt-5 mb-3">
                <h1 class="fw-bold">Ganadores del Golden Boy</h1>
            </div>     

            <div class="col-8 mb-5">
                <div id="golden-boy" class="carousel slide mx-auto d-block w-75" data-bs-ride="carousel">
                    

                    <div class="carousel-inner">
                        <?php
                            $i = 1;
                            //print_r($images_array);
                            foreach ($goldenboy_array as $image) {
                                if ($i == 1) {
                                    echo "<div class='carousel-item active'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                    $i++;
                                } 
                                else{
                                    echo "<div class='carousel-item'>";
                                    echo "<img src='$image' class='d-block w-100' height='550px' alt='...'>";
                                    echo "</div>" . PHP_EOL;
                                }
                            }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#golden-boy" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#golden-boy" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
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
                    require_once(__DIR__ . '/../../../config.php');
                    use function Config\get_view_dir;

                    require_once(get_view_dir() . '/view.php');

                    echo View\get_html_body($comments_gallery->body,"\get_comments");
               ?>
          </div>

          <form method="post" class="p-5">
               <input type="text" name="user" placeholder="User"><br><br>
               <textarea name="comment" cols="50" rows="5" placeholder="Escribe tu comentario aqui"></textarea> <br><br>
               <input type="submit" class="btn btn-primary" value="Afegir">
          </form>
          
     </div>

     
</section>