<section>
    <div class="container">
        <div class="text-end">
            <a href="/index" class="btn btn-success mt-4 me-5">Volver a Home</a>
        </div>
        <div class="w-25 position-absolute top-50 start-50 translate-middle ">

            <img class="mx-auto d-block mb-3" src="/img/logo.png" width="60px" height="80px" alt="Logo">

            <form action="#" method="post">
                <div class=" px-5 py-4 shadow-lg p-3 mb-5 bg-body rounded">

                    <h2 class="text-center mb-3">Registrarse</h2>

                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                    <input type="text" name="r_username" class="form-control">
                    </div>

                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                    <input type="password" name="r_password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputRol1" class="form-label">Rol:</label>
                        <select class="form-select" name="role">
                            <option selected disabled>Selecciona un rol</option>
                            <option value="guest">Visitante</option>
                            <option value="client">Cliente</option>
                            <option value="admin">Administrador</option>
                            <option value="journalist">Periodista</option>
                        </select>
                    </div>
                    
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</section>