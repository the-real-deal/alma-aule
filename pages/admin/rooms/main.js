
let idAula
$(document).on('click', 'a[id^="aula-"]', function(e) {
    e.preventDefault();
    idAula=$(this).attr('id').replace('aula-', '');
    
    $.ajax({
        url: "/apis/aula.php",
        type: "get",
        data: {
            idAula: idAula,
        },
        success: function(response){
            
            const aula = JSON.parse(response);
            
            $("#seats").val(aula.NumeroPosti);
            $("#accessibility").prop('checked', aula.Accessibilita);
            $("#lab").prop('checked', aula.Laboratorio);
            $("#projector").prop('checked', aula.Proiettore);
            $("#plugs").prop('checked', aula.Prese);
        }
    })
    $('#staticBackdrop').modal('show');
});
$("#save").on("click",()=>{
     const data = {
        idAula: sessionStorage.getItem("idAula"),
        seats: $("#seats").val(),
        accessibility: $("#accessibility").is(":checked") ? 1 : 0,  // Esplicito 1/0
        projector: $("#projector").is(":checked") ? 1 : 0,
        lab: $("#lab").is(":checked") ? 1 : 0,
        plugs: $("#plugs").is(":checked") ? 1 : 0
    };
    $.ajax({
        url:"/apis/updateRoom.php",
        type:"post",
        data:data,
        success:function(response){
            $('#staticBackdrop').modal('hide');
        }
    })
});



// function lookForRoom(data) {
//     const query = $("#searchRoomInput").val().toLowerCase();
//     return data.filter(room =>
//         room.roomName.toLowerCase().includes(query) ||
//         room.site["city"].name.toLowerCase().includes(query) ||
//         room.site["street"].toLowerCase().includes(query)
//     );
// }

// $(function () {
//     loadRooms();
//     $("#searchRoomInput").on("input", function () {
//         displayRooms(lookForRoom(rooms));
//     });
// });