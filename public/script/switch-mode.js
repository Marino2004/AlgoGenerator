document.addEventListener('DOMContentLoaded', () => {
    const darkButton = document.getElementById('dark');
    const theme = document.getElementById('theme');
    const themeText = document.getElementById('theme-text');

    darkButton.addEventListener('click', () => {
        if (theme.getAttribute('data-theme') === 'light') {
            theme.setAttribute('data-theme', 'dark');
            themeText.textContent = 'Mode Light';
        } else {
            theme.setAttribute('data-theme', 'light');
            themeText.textContent = 'Mode Sombre';
        }
    });
});
