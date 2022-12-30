<section>
    <div class="container">
        <div class="text-end">
            <a href="/index" class="btn btn-success mt-4 me-5">Torna a Home</a>
        </div>
        <div class="w-25 position-absolute top-50 start-50 translate-middle ">

            <img class="mx-auto d-block mb-3" src="/img/logo.png" width="60px" height="80px" alt="Logo">

            <form action="#" method="post">
                <div class=" px-5 py-4 shadow-lg p-3 mb-5 bg-body rounded">

                    <h2 class="text-center mb-3">Registrar-se</h2>

                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Usuari:</label>
                    <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contrasenya:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputRol1" class="form-label">Rol:</label>
                        <select class="form-select">
                            <option selected disabled>Selecciona un rol</option>
                            <option value="visitant">Visitant</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="root">Root</option>
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