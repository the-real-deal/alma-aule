<div class="container-lg py-1 py-lg-2 w-100">
    <div class="my-5">
        <button onclick="history.back()" class="btn btn-outline-primary">
            <strong class="bi bi-arrow-left me-2"></strong>Indietro
        </button>
    </div>
    <div class="card border-2 border-primary">
        <div class="card-header bg-primary text-white">
            <h1 id="title" class="m-0 fs-3 fs-lg-1"></h1>
        </div>
        <div class="card-body gap-3 d-flex flex-column flex-lg-row">
            <!-- Card Informazioni -->
            <div class="card border-2 p-0 border-primary h-100">
                <div class="card-header bg-primary text-white">
                    <p class="h6 fw-bold m-0">Informazioni</p>
                </div>
                <div class="card-body">
                    <div class="p-2 border border-2 rounded-2 mb-2">
                        <strong class="border-bottom border-2 border-primary d-block mb-2">Dotazioni:</strong>
                        <ul class="list-group list-group-flush">
                            <li id="accessibility" class="list-group-item d-flex align-items-center gap-2">
                                <strong class="bi bi-person-wheelchair"></strong>
                                <label class="mb-0">Accessibilità</label>
                            </li>
                            <li id="projector" class="list-group-item d-flex align-items-center gap-2">
                                <strong class="bi bi-projector"></strong>
                                <label class="mb-0">Proiettore</label>
                            </li>
                            <li id="plugs" class="list-group-item d-flex align-items-center gap-2">
                                <strong class="bi bi-plug-fill"></strong>
                                <label class="mb-0">Prese</label>
                            </li>
                            <li id="lab" class="list-group-item d-flex align-items-center gap-2">
                                <strong class="bi bi-pc-display"></strong>
                                <label class="mb-0">Laboratorio</label>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-start gap-2">
                        <strong class="bi bi-geo-alt flex-shrink-0"></strong>
                        <span id="address" class="small"></span>
                    </div>
                </div>
            </div>

            <!-- Card Orari -->
            <div class="card flex-grow-1 d-flex flex-column">
                <div class="card-header flex-shrink-0">
                    <p class="h6 fw-bold mb-2">Orari</p>
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label class="form-label small mb-1" for="calendar">
                                <strong>Data:</strong>
                            </label>
                            <input type="date" name="days" id="calendar" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label small mb-1" for="capacity">
                                <strong>Presenti:</strong>
                            </label>
                            <select class="form-select form-select-sm" id="capacity">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body flex-grow-1 overflow-auto">
                    <div id="grid" class="row g-2">
                        <!-- Griglia orari generata dinamicamente -->
                    </div>
                </div>
                <div class="card-footer flex-shrink-0 d-flex justify-content-end">
                    <button id="book" class="btn btn-primary btn-sm">Prenota</button>
                </div>
            </div>
        </div>
    </div>
</div>