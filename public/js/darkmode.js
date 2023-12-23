function defaultSystemTheme() {
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}
}

// Apply theme on load page
if (localStorage.theme === 'dark') {
document.documentElement.classList.add('dark');
} else if (localStorage.theme === 'light') {
document.documentElement.classList.remove('dark');
} else {
defaultSystemTheme();
}

const themeButton = document.querySelector('#theme-button');

// Apply theme on click in the button
themeButton.addEventListener('click', function() {
if (localStorage.theme === 'dark') {
    localStorage.theme = 'light';
    document.documentElement.classList.remove('dark');
} else if (localStorage.theme === 'light') {
    localStorage.theme = 'system';
    defaultSystemTheme();
} else {
    localStorage.theme = 'dark';
    document.documentElement.classList.add('dark');
}
});

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
var themeToggleSystemIcon = document.getElementById('theme-toggle-system-icon');

// Update the icon in button
function updateThemeButtonText() {
if (localStorage.theme === 'dark') {
    // themeButton.textContent = 'Dark Mode';
    themeToggleSystemIcon.classList.add('hidden');
    themeToggleLightIcon.classList.add('hidden');
    themeToggleDarkIcon.classList.remove('hidden');
} else if (localStorage.theme === 'light') {
    // themeButton.textContent = 'Light Mode';
    themeToggleDarkIcon.classList.add('hidden');
    themeToggleSystemIcon.classList.add('hidden');
    themeToggleLightIcon.classList.remove('hidden');
} else {
    // themeButton.textContent = 'System Theme';
    themeToggleLightIcon.classList.add('hidden');
    themeToggleDarkIcon.classList.add('hidden');
    themeToggleSystemIcon.classList.remove('hidden');
}
}

// Call this function when the page loads
updateThemeButtonText();

// Also call this function whenever the theme changes
themeButton.addEventListener('click', updateThemeButtonText);

// Update theme if is in theme system theme
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
if (localStorage.theme === 'system') {
    const isDarkMode = e.matches;
    document.documentElement.classList.toggle('dark', isDarkMode);
    localStorage.theme = 'system';
    updateThemeButtonText();
}
});