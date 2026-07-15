<?php
$page_title = $page_title ?? 'Photography';
$current_page = $current_page ?? '';
function nav_class($page, $current) {
    $base = 'text-base lg:text-lg leading-normal uppercase tracking-wider transition-colors';
    if ($page === $current) {
        return $base . ' font-bold text-[#2B2D31]';
    }
    return $base . ' text-[#5B5D61]';
}
?>
<!DOCTYPE html>
<html class="light scroll-smooth" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title><?= htmlspecialchars($page_title) ?></title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "primary": "#A6842E",
                "background-light": "#f6f7f8",
                "background-dark": "#101822",
                "surface": "#ffffff",
                "text-main": "#111418",
                "text-muted": "#617289",
                "muted": "#8B95A5",
                "accent": "#5A6B7C",
            },
            fontFamily: {
                "display": ["EB Garamond", "Georgia", "serif"],
                "body": ["Source Sans 3", "Source Sans Pro", "sans-serif"],
            },
            borderRadius: {"DEFAULT": "0.125rem", "sm": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
        },
    },
}
</script>
<link href="assets/style.css?v=<?= @filemtime(__DIR__ . '/../assets/style.css') ?: '1' ?>" rel="stylesheet"/>
</head>
<body class="font-body bg-background-light text-text-main antialiased min-h-screen flex flex-col fade-in selection:bg-primary selection:text-white">

<?php if ($current_page === 'home'): ?>
<!-- Floating transparent nav for home page -->
<div class="fixed top-0 left-0 w-full z-50">
    <div class="max-w-[1280px] mx-auto px-6 md:px-10 lg:px-6 py-6">
        <header class="flex items-center justify-between whitespace-nowrap">
            <a class="flex items-center" href="index.php">
                <img src="images/logo/2-transparent-horizontal-white.svg" alt="Kim Sinton Wedding Photography" class="h-20 w-auto pr-8"/>
            </a>
            <nav class="hidden md:flex items-center gap-5 lg:gap-9">
                <a class="text-white/90 hover:text-white text-lg font-medium uppercase tracking-wider transition-colors" href="galleries.php">Galleries</a>
                <a class="text-white/90 hover:text-white text-lg font-medium uppercase tracking-wider transition-colors" href="about.php">About</a>
                <a class="text-white/90 hover:text-white text-lg font-medium uppercase tracking-wider transition-colors" href="pricing.php">Pricing</a>
                <a class="text-white/90 hover:text-white text-lg font-medium uppercase tracking-wider transition-colors" href="contact.php">Contact</a>
            </nav>
            <button class="md:hidden text-white" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false" data-mobile-menu-toggle>
                <span class="material-symbols-outlined text-5xl">menu</span>
            </button>
        </header>
    </div>
</div>

<?php else: ?>
<!-- Solid white nav for all other pages -->
<div class="w-full bg-white border-b border-[#8B95A5]/30">
    <div class="max-w-[1200px] mx-auto px-6 md:px-10 lg:px-5 py-5">
        <header class="flex items-center justify-between whitespace-nowrap">
            <a class="flex items-center" href="index.php">
                <img src="images/logo/2-transparent-horizontal-black.svg" alt="Kim Sinton Wedding Photography" class="h-20 w-auto pr-8"/>
            </a>
            <nav class="hidden md:flex items-center gap-5 lg:gap-9">
                <a class="<?= nav_class('galleries', $current_page) ?>" href="galleries.php">Galleries</a>
                <a class="<?= nav_class('about', $current_page) ?>" href="about.php">About</a>
                <a class="<?= nav_class('pricing', $current_page) ?>" href="pricing.php">Pricing</a>
                <a class="<?= nav_class('contact', $current_page) ?>" href="contact.php">Contact</a>
            </nav>
            <button class="md:hidden text-[#1A1C20]" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false" data-mobile-menu-toggle>
                <span class="material-symbols-outlined text-5xl">menu</span>
            </button>
        </header>
    </div>
</div>
<div class="w-full bg-background-light border-b border-[#8B95A5]/20 py-2.5 px-6 text-center">
    <p class="text-text-muted text-xs uppercase tracking-[0.15em] font-medium">
        Wedding Availability &nbsp;&middot;&nbsp; April 2026 &ndash; Dec 2027 &nbsp;&middot;&nbsp; Available in Iowa
    </p>
</div>
<?php endif; ?>

<!-- Mobile menu overlay -->
<div id="mobile-menu" class="fixed inset-0 z-[60] hidden md:hidden" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <div class="absolute inset-0 bg-[#1A1C20]/95 backdrop-blur-sm" data-mobile-menu-close></div>
    <div class="relative h-full w-full flex flex-col">
        <div class="flex justify-end p-6">
            <button class="text-white p-2" aria-label="Close menu" data-mobile-menu-close>
                <span class="material-symbols-outlined text-5xl">close</span>
            </button>
        </div>
        <nav class="flex-1 flex flex-col items-center justify-center gap-8 px-6 pb-20">
            <a class="text-white text-2xl font-display tracking-wider uppercase hover:opacity-70 transition-opacity" href="galleries.php">Galleries</a>
            <a class="text-white text-2xl font-display tracking-wider uppercase hover:opacity-70 transition-opacity" href="about.php">About</a>
            <a class="text-white text-2xl font-display tracking-wider uppercase hover:opacity-70 transition-opacity" href="pricing.php">Pricing</a>
            <a class="text-white text-2xl font-display tracking-wider uppercase hover:opacity-70 transition-opacity" href="contact.php">Contact</a>
        </nav>
    </div>
</div>

<script>
(function () {
    const menu = document.getElementById('mobile-menu');
    if (!menu) return;
    const toggles = document.querySelectorAll('[data-mobile-menu-toggle]');
    const closers = menu.querySelectorAll('[data-mobile-menu-close]');

    function open() {
        menu.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        toggles.forEach(function (t) { t.setAttribute('aria-expanded', 'true'); });
    }
    function close() {
        menu.classList.add('hidden');
        document.body.style.overflow = '';
        toggles.forEach(function (t) { t.setAttribute('aria-expanded', 'false'); });
    }

    toggles.forEach(function (t) { t.addEventListener('click', open); });
    closers.forEach(function (c) { c.addEventListener('click', close); });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !menu.classList.contains('hidden')) close();
    });
})();
</script>
