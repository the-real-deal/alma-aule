<div class="container-lg py-1 py-lg-2">
    <div class="card">
        <div class="card-header">
            <h1 class="m-0">Aula 2.2 Vela</h1>
        </div>
        <div class="card-body d-flex">
            <div class="card">
                <div class="card-header">
                    <strong>Orari</strong>
                </div>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"></div>
                    <?php
                        for ($i=1; $i < 10 ; $i++) { 
                            echo '<input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">';
                            echo '<label class="btn btn-outline-primary" for="btncheck1">Checkbox</label>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>