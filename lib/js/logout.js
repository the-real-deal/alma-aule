function logout() { 
    localStorage.removeItem('username');
    window.location.href = '/landing/';
}

element = document.getElementById('logoutBtn');
element.addEventListener('click', logout);