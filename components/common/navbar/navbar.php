<nav class="navbar navbar-expand-md bg-primary">
    <div class="container-fluid px-5">
        <button class="navbar-toggler border-1 border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a target="_blank" href="https://www.unibo.it/it" class="navbar-brand text-white d-flex align-items-center order-md-last" href="#">
            <img class="navbar-brand-logo" src="/assets/imgs/logo-unibo.png" alt="Alma Mater Studiorum Logo">
            <div class="vr my-3 text-white"></div>
            <h3 class="ps-3 m-0 text-uppercase">
                Alma<br />Aule
            </h3>
        </a>     
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <div class="navbar-nav gap-1 gap-md-4">
                <?php
                    require_once "{$_SERVER['DOCUMENT_ROOT']}/lib/links.php";
                    
                    $links = [
                        new Link("../home", "Home", "bi-house-fill"),
                        new Link("../rooms", "Aule", "bi-door-closed-fill"),
                        new Link("../reservations", "Prenotazioni", "bi-bookmark-plus-fill"),
                        new Link("../profile", "Profilo", "bi-person-fill"),
                    ];

                    foreach ($links as $link) {
                        echo " <a href='{$link->get_url()}' class='nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center'>
                            <strong class='fs-3 bi {$link->get_icon()}'></strong>
                            <span class='d-inline-block my-auto ps-2 ps-md-0 font-merriweather'>{$link->get_label()}</span>
                        </a>";
                    }
                ?>
            </div>
        </div> 
    </div>
</nav>