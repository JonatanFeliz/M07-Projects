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
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">User Management</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Body -->
<div class="container">
    <h1 class="text-center mt-5 text-info">User Management</h1>
    <div class="row">
        <div class="col-6 d-flex justify-content-center">
            <div class="mt-5 w-75">

                <form action="#" method="post">
                    <div class=" px-5 py-4 shadow-lg p-3 mb-5 bg-body rounded">
                        <h2 class="text-center mb-3">Añadir Usuario</h2>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputRol1" class="form-label">Rol:</label>
                            <select class="form-select" name="role">
                                <option value="journalist" selected>Periodista</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="create" class="btn btn-primary">Añadir</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>


        <div class="col-6 d-flex justify-content-center">
            <div class="mt-5 w-75">

                <form action="#" method="post">
                    <div class=" px-5 py-4 shadow-lg p-3 mb-5 bg-body rounded">
                        <h2 class="text-center mb-3">Eliminar Usuario</h2>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                            <input type="text" name="d_username" class="form-control">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="delete" class="btn btn-primary">Borrar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>