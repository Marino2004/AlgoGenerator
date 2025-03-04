document.addEventListener('DOMContentLoaded', () => {
    const darkButton = document.getElementById('dark');
    const theme = document.getElementById('theme');
    const themeText = document.getElementById('theme-text');

    // Vérifie si un thème est déjà stocké
    const savedTheme = localStorage.getItem('theme') || 'dark';
    theme.setAttribute('data-theme', savedTheme);
    darkButton.checked = savedTheme === 'dark'; 
    themeText.textContent = savedTheme === 'dark' ? 'Mode Light' : 'Mode Sombre';

    darkButton.addEventListener('click', () => {
        let newTheme = theme.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        theme.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        themeText.textContent = newTheme === 'dark' ? 'Mode Light' : 'Mode Sombre';
    });
});
