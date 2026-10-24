// FITNESS FREEK — Theme Manager
(function() {
    'use strict';

    const THEME_KEY = 'ff_theme';
    const DARK = 'dark';
    const LIGHT = 'light';

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        const toggle = document.getElementById('themeToggle');
        if (toggle) {
            // checked = light, unchecked = dark
            toggle.checked = (theme === LIGHT);
        }
        localStorage.setItem(THEME_KEY, theme);
    }

    function getStoredTheme() {
        return localStorage.getItem(THEME_KEY) || DARK;
    }

    // Apply theme immediately on load (before DOMContentLoaded to avoid flash)
    const storedTheme = getStoredTheme();
    document.documentElement.setAttribute('data-theme', storedTheme);

    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('themeToggle');

        // Apply to toggle UI
        if (toggle) {
            toggle.checked = (storedTheme === LIGHT);

            toggle.addEventListener('change', function () {
                const newTheme = this.checked ? LIGHT : DARK;
                applyTheme(newTheme);
            });
        }
    });
})();
