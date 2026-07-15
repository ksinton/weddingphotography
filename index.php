<?php
$page_title = 'Photography — Home';
$current_page = 'home';

// Pick the hero image set server-side so the browser only downloads the matching set.
// To reorder, rearrange the entries in the array below for the relevant device.
$hero_desktop = [
    'images/homePagePics/1.jpg',
    'images/homePagePics/2.jpg',
    'images/homePagePics/3.jpg',
    'images/homePagePics/4.jpg',
    'images/homePagePics/5.jpg',
    'images/homePagePics/6.jpg',
    'images/homePagePics/7.jpg',
    'images/homePagePics/8.jpg',
];
// Mobile hero images, in display order. Each image's on-screen position is set
// in assets/style.css via its matching .hero-pos-N class (image 1 = .hero-pos-1,
// image 2 = .hero-pos-2, …). Edit positions THERE, not here.
$hero_mobile = [
    'images/homepagePicsMobile/_H2U8534_1.jpg',          // .hero-pos-1
    'images/homepagePicsMobile/IMG_9890.jpg',            // .hero-pos-2
    'images/homepagePicsMobile/129.jpg',                 // .hero-pos-3
    'images/homepagePicsMobile/IMG_4140.jpg',            // .hero-pos-4
    'images/homepagePicsMobile/IMG_4294_sepia_edit.jpg', // .hero-pos-5
    'images/homepagePicsMobile/IMG_8431_1.jpg',          // .hero-pos-6
];

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$is_mobile_or_tablet = (bool) preg_match(
    '/Mobile|Android|iP(hone|od|ad)|IEMobile|BlackBerry|Kindle|Silk|(hpw|web)OS|Opera M(obi|ini)|Tablet/i',
    $ua
);
// Dev/testing override: ?device=mobile or ?device=desktop forces a set so you can
// preview mobile image positioning from a desktop browser. Safe to remove later.
if (isset($_GET['device'])) {
    $is_mobile_or_tablet = ($_GET['device'] === 'mobile');
}
// Pair each image with the CSS class that positions it. Mobile images get a
// per-image .hero-pos-N class (defined in assets/style.css); desktop images stay
// centered via .hero-pos-center.
$src_list = $is_mobile_or_tablet ? $hero_mobile : $hero_desktop;
$hero_images = [];
foreach ($src_list as $i => $src) {
    $hero_images[] = [
        'src' => $src,
        'cls' => $is_mobile_or_tablet ? 'hero-pos-' . ($i + 1) : 'hero-pos-center',
    ];
}

include 'includes/header.php';
?>
<main class="flex-grow">
    <!-- Hero Carousel — full viewport, nav floats on top -->
    <section class="relative h-screen min-h-[560px] w-full overflow-hidden bg-black">
        <!-- Slide A (visible first) -->
        <div id="hero-slide-a" class="hero-slide <?= htmlspecialchars($hero_images[0]['cls'], ENT_QUOTES) ?>"
             style='background-image: url("<?= htmlspecialchars($hero_images[0]['src'], ENT_QUOTES) ?>");'></div>
        <!-- Slide B (hidden, swapped in by JS) -->
        <div id="hero-slide-b" class="hero-slide" style="opacity: 0;"></div>
        <!-- Dark overlay -->
        <div class="absolute inset-0 z-10 bg-black/35"></div>
    </section>

    <script>
    (function () {
        // Hero images chosen server-side based on device (mobile/tablet vs desktop).
        // First is already displayed, rest are lazy loaded.
        var images = <?= json_encode($hero_images, JSON_UNESCAPED_SLASHES) ?>;

        var slideA    = document.getElementById('hero-slide-a');
        var slideB    = document.getElementById('hero-slide-b');
        var current   = 0;      // index of currently visible image
        var showingA  = true;   // which slide is on top

        // Preload the other images so advancing is instant (fire-and-forget).
        images.slice(1).forEach(function (item) {
            var img = new Image();
            img.src = item.src;
        });

        // Apply an image + its position class to a slide. The position itself
        // lives in assets/style.css (.hero-pos-N); here we just swap the class.
        function setSlide(slide, item) {
            slide.style.backgroundImage = 'url("' + item.src + '")';
            var stale = [];
            slide.classList.forEach(function (c) {
                if (c.indexOf('hero-pos-') === 0) stale.push(c);
            });
            stale.forEach(function (c) { slide.classList.remove(c); });
            slide.classList.add(item.cls);
        }

        // Advance to the next image, crossfading between the two slides.
        function advance() {
            current = (current + 1) % images.length;
            if (showingA) {
                // Fade slide B (next image) in over slide A
                setSlide(slideB, images[current]);
                slideB.style.opacity = '1';
                slideA.style.opacity = '0';
            } else {
                // Fade slide A (next image) in over slide B
                setSlide(slideA, images[current]);
                slideA.style.opacity = '1';
                slideB.style.opacity = '0';
            }
            showingA = !showingA;
        }

        // Auto-advance to the next image every 3 seconds.
        setInterval(advance, 3000);
    })();
    </script>

    <!-- Availability Banner (below hero) -->
    <div class="w-full bg-background-light border-b border-[#8B95A5]/20 py-2.5 px-6 text-center">
        <p class="text-text-muted text-xs uppercase tracking-[0.15em] font-medium">
            Wedding Availability &nbsp;&middot;&nbsp; April 2026 &ndash; Dec 2027 &nbsp;&middot;&nbsp; Available in Iowa
        </p>
    </div>

    <!-- CTA -->
    <section class="bg-background-light py-24 px-6 text-center border-t border-[#f0f2f4]">
        <div class="max-w-3xl mx-auto flex flex-col items-center gap-8">
            <h2 class="text-text-main text-3xl md:text-5xl font-bold leading-tight">Ready to create something timeless?</h2>
            <a class="inline-flex min-w-[160px] items-center justify-center rounded-sm h-14 px-10 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary mt-4" href="contact.php">Inquire Now</a>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
