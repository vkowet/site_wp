(function () {
    var supportedLanguages = ['fr', 'en', 'es'];
    var defaultLanguage = 'fr';
    var fallbackLanguage = 'en';

    function hasTranslationCookie() {
        return /(?:^|;\s*)googtrans=/.test(document.cookie);
    }

    function getPreferredLanguage() {
        var languages = navigator.languages && navigator.languages.length
            ? navigator.languages
            : [navigator.language || navigator.userLanguage || ''];

        var primaryLanguage = String(languages[0] || '').toLowerCase().split('-')[0];

        return supportedLanguages.indexOf(primaryLanguage) !== -1
            ? primaryLanguage
            : fallbackLanguage;
    }

    function translateTo(language, attempts) {
        if (language === defaultLanguage || hasTranslationCookie()) {
            return;
        }

        if (typeof window.doGTranslate === 'function') {
            window.doGTranslate(defaultLanguage + '|' + language);
            try {
                window.localStorage.setItem('fms_language_autodetected', language);
            } catch (e) {}
            return;
        }

        if (attempts > 0) {
            window.setTimeout(function () {
                translateTo(language, attempts - 1);
            }, 400);
        }
    }

    if (!window.navigator || /bot|spider|slurp|facebook/i.test(navigator.userAgent || '')) {
        return;
    }

    try {
        if (window.localStorage.getItem('fms_language_autodetected')) {
            return;
        }
    } catch (e) {}

    document.addEventListener('DOMContentLoaded', function () {
        translateTo(getPreferredLanguage(), 12);
    });
})();
