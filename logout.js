function logout() { 
    localStorage.removeItem('username');
    window.location.href = '/components/landing/';
}

element = document.getElementsByClassName('bi-box-arrow-left')[0];
element.addEventListener('click', logout);