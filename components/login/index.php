<?php 
    require "{$_SERVER['DOCUMENT_ROOT']}/apis/login.php";        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php"?>
    <link href="./login.css" rel="stylesheet">
    <script src="../../common/animatedBackground.js"></script>
    <title>Alma Aule - Login</title>
</head>

<body class="d-flex justify-content-center align-items-center">
    <main>
        <div class="card border-0 rounded-2 shadow-lg" style="min-width: 18rem; max-width: 22rem;">
            <div class="card-header text-center">
                <img class="img-fluid" src="../../assets/imgs/logo-unibo.png">
                <h3 class="text-dark">ESEGUI L'ACCESSO</h3>
            </div>
            <div class="card-body px-3 px-md-5 my-3">
                <form class="d-flex flex-column justify-content-center">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label text-dark">
                            <i class="bi bi-person-circle"></i>    
                            E-mail
                        </label>
                        <input placeholder="marco.rossi@unibo.it" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label text-dark">
                            <i class="bi bi-key"></i>
                            Password
                        </label>
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                    <small class="pt-3 text-center">Non hai un account? <a class="fw-bolder text-primary text-decoration-underline">Registrati</a></small>
                </form>
            </div>
        </div>
    </main>
</body>

</html>