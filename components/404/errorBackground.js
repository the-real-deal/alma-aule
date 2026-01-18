const iconCodes = [
    "robot",
    "bug-fill",
    "server",
    "wifi-off",
    "cloud-slash"
];

const numOfIcons = 30;

function createIcon(code) {
    const icon = $('<strong>').addClass(`bi bi-${code}`);
    
    const randomX = Math.random() * (window.innerWidth - 50);
    const randomY = Math.random() * (window.innerHeight - 50);
    
    icon.css({
        position: 'fixed',
        left: randomX + 'px',
        top: randomY + 'px',
        opacity: 1,
        fontSize: '2em',
        zIndex: -1,
        color: "var(--bs-primary)"
    }).appendTo('body');
    
    function animateIcon() {
        const duration = 5000 + Math.random() * 5000; // Velocità casuale (5-10 secondi)
        
        icon.animate({
            top: window.innerHeight + 'px',
            opacity: 0
        }, duration, 'linear', function() {
            // Ricomincia da in cima alla pagina
            icon.css({
                top: '-50px',
                opacity: 1
            });
            animateIcon();
        });
    }
    
    animateIcon();
}

$(document).ready(function () {
    fetch("")
    for (let i = 0; i < numOfIcons; i++) {
        const code = iconCodes[Math.floor(Math.random() * iconCodes.length)];
        createIcon(code);
    }
    
    $(window).on('resize', function() {
        $('strong.bi').each(function() {
            const randomX = Math.random() * (window.innerWidth - 50);
            $(this).css({
                left: randomX + 'px'
            });
        });
    });
})
