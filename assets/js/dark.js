const btn = document.querySelector('.btn');

// Vérifie le thème enregistré au chargement
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark');
}

btn?.addEventListener('click', () => {
    document.body.classList.toggle('dark');

    if (document.body.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});