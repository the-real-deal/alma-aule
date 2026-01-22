<div class="container-lg py-1 py-lg-2">
    <div class="card border-2 border-primary">
        <div class="card-header bg-primary text-white">
            <h1 id="title" class="m-0"></h1>
        </div>
        <div class="card-body gap-3 d-flex">
            <div class="card border-2 p-0 border-primary">
                <div class="card-header bg-primary text-white">
                    <p class="h6 fw-bold">Informazioni</p>
                </div>
                <div class="card-body">

                    <div class="p-2 border border-2  rounded-2">
                        <strong class="border-bottom border-2 border-primary">Dotazioni:</strong>
                        <ol class="list-group list-group-flush">
                            <li id="accessibility" class="list-group-item">
                                <strong class="bi bi-person-wheelchair"></strong>
                                <label>Accessibilità</label>
                            </li>
                            <li id="projector" class="list-group-item">
                                <strong class="bi bi-projector"></strong>
                                <label>Proiettore</label>
                            </li>
                            <li id="plugs" class="list-group-item">
                                <strong class="bi bi-plug-fill"></strong>
                                <label>Prese</label>
                            </li>
                            <li id="lab" class="list-group-item">
                                <strong class="bi bi-pc-display"></strong>
                                <label>Laboratorio</label>
                            </li>
                        </ol>
                    </div>
                    <div class="pt-2 gap-1">
                        <strong>
                            <strong class="bi bi-geo-alt"></strong>
                        </strong>
                        <span id="address"></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header gap-2 d-flex ">
                    <div class="container">
                        <h6>Orari <br> </h6>
                        <label class="pe-1" for="calendar">Data:</label>
                        <input type="date" name="days" id="calendar">
                    </div>
                    <div class="container">
                        <label for="">Presenti:</label>
                        <select class="form-select" id="capacity">

                        </select>
                    </div>

                </div>
                <div class="card-body d-flex ">

                    <div id="grid" class="container p-3">

                    </div>
                </div>
                <div class="card-footer w-100 d-flex justify-content-end ">
                    <button id="book" class="btn btn-primary">Prenota</button>
                </div>
            </div>

        </div>
    </div>
</div>