   <!-- Card Città -->
   <div class="col-12 col-lg-6">
       <div class="card border-0" style="height: 70vh;">
           <h2 class="card-header bg-primary text-light">Città</h2>
           <div class="card-body p-0 overflow-auto">
               <div id="citta-nav" class="list-group list-group-flush">
                   <!-- Città caricate qui -->
               </div>
           </div>
       </div>
   </div>

   <!-- Card Aule (scrollabile) -->
   <div class="col-12 col-lg-6">
       <div class="card border-0" style="height: 70vh;">
           <h2 class="card-header bg-primary text-light">Aule</h2>
           <div data-bs-spy="scroll" data-bs-target="#citta-nav"
               data-bs-smooth-scroll="true" tabindex="0"
               class="card-body overflow-auto">
               <div id="aule" class="list-group list-group-flush">
                   <!-- Aule caricate qui -->
               </div>
           </div>
       </div>
   </div>