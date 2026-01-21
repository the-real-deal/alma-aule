const ROUTES = {
    public: ['/landing', '/login', '/404'],
    admin: ['/admin']
};

// Funzione per verificare se il path corrente è in una lista di route
function isRouteAllowed(currentPath, allowedRoutes) {
    return allowedRoutes.some(route => currentPath.includes(route));
}

// Funzione per verificare se è una route admin
function isAdminRoute(currentPath) {
    return ROUTES.admin.some(route => currentPath.includes(route));
}

// Funzione per determinare il redirect corretto
function getRedirectPath(userData, currentPath) {
    const { username, admin } = userData;
    
    // Utente NON autenticato
    if (!username) {
        return isRouteAllowed(currentPath, ROUTES.public) ? null : '/404';
    }
    
    // Utente autenticato in pagina di login
    if (currentPath.includes('/login')) {
        return admin ? '/admin' : '/home';
    }
    
    // ADMIN
    if (admin) {
        // Admin può accedere solo a route pubbliche e admin
        const allowedForAdmin = [...ROUTES.public, ...ROUTES.admin];
        return isRouteAllowed(currentPath, allowedForAdmin) ? null : '/404';
    }
    
    // UTENTE NORMALE loggato
    // Può accedere a TUTTE le route TRANNE quelle admin
    if (isAdminRoute(currentPath)) {
        return '/404';
    }
    
    return null; 
}

async function checkStoredAuth() {
    const username = localStorage.getItem('username');
    const currentPath = window.location.pathname;
    
    try {
        const response = await fetch('/apis/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ dati: username })
        });
        
        const userData = await response.json();
        console.log(userData);
        
        const redirectPath = getRedirectPath(userData, currentPath);
        
        if (redirectPath) {
            window.location.href = redirectPath;
        }
        
    } catch (error) {
        console.error('Errore nella verifica autenticazione:', error);
    }
}

function showLoginError(message) {
    $('#loginErrorMessage').text(message);
    $('#loginErrorModal').modal('show');
}

async function setupLoginForm() {
    const loginForm = document.getElementById('loginForm');
    
    if (!loginForm) return;
    
    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        formData.append('submit', '1');
        
        try {
            const response = await fetch('/apis/login.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                localStorage.setItem('username', data.username);
                window.location.href = data.admin ? '/admin' : '/home';
            } else {
                showLoginError(data.message || "Si è verificato un errore sconosciuto.");
            }
            
        } catch (error) {
            console.error('Errore login:', error);
            showLoginError("Errore di comunicazione con il server.");
        }
    });
}

checkStoredAuth();
setupLoginForm();