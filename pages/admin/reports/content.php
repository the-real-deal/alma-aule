<div class="container-fluid">
    <div class="row">
        <p class="h1 text-nowrap">Gestione segnalazioni</p>
    </div>
    <div class="row pb-4">
        <p class="col-lg-7 lead m-0">Visualizza tutte le segnalazioni presenti nell'applicazione.</p>
        <form class="col-lg-5 pt-4 pt-lg-0 d-flex d-lg-inline-block">
            <label class="d-flex align-items-center" for="searchUserInput">Ricerca un aula segnalata: </label>
            <input title="searchBarUser" type="text"placeholder="es. AULA 7" id="reportInput" class="w-75 form-control ms-3 ms-lg-0">
        </form>
    </div>
    <div class="row">
        <?php 
            require "{$_SERVER['DOCUMENT_ROOT']}/components/reportsManager/reportsManager.php";
        ?>
    </div>
</div>