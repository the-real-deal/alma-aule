<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid px-4 px-lg-5">
        <button class="navbar-toggler border-1 border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a target="_blank" href="https://www.unibo.it/it" class="navbar-brand text-white d-flex align-items-center order-lg-last m-0" href="#">
            <img class="navbar-brand-logo" src="/assets/imgs/logo-unibo.png" alt="Alma Mater Studiorum Logo">
            <div class="vr my-3 text-white"></div>
            <div>
                <h3 class="ps-3 m-0 text-uppercase">
                    Alma<br />Aule
                </h3>
            </div>
        </a>     
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <div class="navbar-nav gap-1 gap-lg-4">
                <?php
                    require_once "{$_SERVER['DOCUMENT_ROOT']}/lib/php/links.php";
                    
                    $links = [
                        new Link("/home", "Home", "bi-house-fill"),
                        new Link("/rooms", "Aule", "bi-door-closed-fill"),
                        new Link("/booking", "Prenotazioni", "bi-bookmark-plus-fill"),
                        new Link("/profile", "Profilo", "bi-person-fill"),
                    ];
                    
                    foreach ($links as $link) {
                ?>
                        <a href="<?= "{$link->get_url()}"; ?>" class='nav-link text-white d-flex flex-row flex-lg-column align-items-start align-items-lg-center text-start text-lg-center'>
                            <strong class="fs-3 bi <?= "{$link->get_icon()}"; ?>"></strong>
                            <span class='d-inline-block my-auto ps-2 ps-lg-0 font-merriweather'><?= "{$link->get_label()}"; ?></span>
                        </a>
                <?php
                    }
                ?>
                <button id="logoutBtn" class='nav-link text-white d-flex flex-row flex-lg-column align-items-start align-items-lg-center'>
                    <strong class='fs-3 bi bi-box-arrow-left'></strong>
                    <span class='d-inline-block my-auto ps-2 ps-lg-0 font-merriweather'>Logout</span>
                </button>
            </div>
        </div> 
    </div>
</nav>