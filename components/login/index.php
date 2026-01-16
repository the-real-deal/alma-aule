<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="/components/login/css/background.css" rel="stylesheet">
        <link href="/components/style.css" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap"
            rel="stylesheet">
        <title>Alma Aule - Login</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
            defer></script>
    </head>
    <body>
        <main>   
            <div class="background vh-100">
                <div class="container ">
                    <div class="card shadow-lg z-1">
                        <h1 class="cinzel-logo card-header text-muted">Alma Aule</h1>
                        <div class="card-img-top">
                            <img class="logo " src="/assets/img/logo-unibo.png" alt="">
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">Login</h2>
                            <!-- htmlspecialchars() used to avoid PHP_SELF exploit -->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input required id="email" type="email" name="email" class="form-control"
                                        placeholder="nome.cognome@studio.unibo.it">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input required id="password" name="password" aria-label="password" type="password" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="objects ">
                    <i class="obj bi bi-backpack"></i>
                    <i class="obj bi bi-mortarboard"></i>
                    <i class="obj bi bi-backpack"></i>
                    <i class="obj bi bi-book"></i>
                    <i class="obj bi bi-backpack"></i>
                    <i class="obj bi bi-backpack4"></i>
                    <i class="obj bi bi-highlighter"></i>
                    <i class="obj bi bi-backpack4"></i>
                    <i class="obj bi bi-backpack"></i>
                    <i class="obj bi bi-book"></i>
                    <i class="obj bi bi-backpack"></i>
                    <i class="obj bi bi-backpack4"></i>
                </div>
            </div> 
                   
        </main>
        
    </body>
</html>