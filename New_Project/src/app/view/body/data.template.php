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
                    <a class="nav-link text-white" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/data">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/web-service">Web Service</a>
                </li>
            </ul>
            <form class="d-flex">
                <a href="/login" class="btn btn-success" type="submit">Login</a>
            </form>
        </div>
    </div>
</nav>

<!--Body-->
<section>
    <div class="container">

        <h1 class="text-center mt-5"><span class="text-info border-bottom border-primary border-5">La Liga - Classificació</span></h1>

        <div class="row">
            <div class="col-12">
                <div class="w-50 mx-auto mt-5">
                        <table class="table table-success table-striped text-center">
                            <?php

                                require_once(__DIR__ . '/../../config.php');
                                use function Config\get_view_dir;

                                require_once(get_view_dir() . '/view.php');

                                echo "<thead>";
                                    echo View\get_html_header($manga_table->header);
                                echo "</thead>";

                                echo "<tbody>";
                                echo View\get_html_body($manga_table->body);
                                echo"</tbody>";
                            ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
</section>
