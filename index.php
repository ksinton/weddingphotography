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

    <!-- Featured Collections -->
    <section class="bg-surface py-20 lg:py-32 px-6 md:px-12 lg:px-24">
        <div class="max-w-[1440px] mx-auto flex flex-col gap-24 lg:gap-40">
            <div class="flex flex-col gap-4 max-w-[720px]">
                <h2 class="text-text-main text-[32px] md:text-4xl lg:text-5xl font-bold leading-tight tracking-[-0.03em]">
                    Featured Collections
                </h2>
                <p class="text-text-muted text-base lg:text-lg font-normal leading-relaxed">
                    Curated editorial stories from around the world.
                </p>
            </div>

            <!-- Feature 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                <div class="flex flex-col gap-8 order-2 lg:order-1">
                    <div class="flex flex-col gap-2">
                        <span class="text-text-muted text-xs font-medium uppercase tracking-[0.05em]">Editorial • Paris, France</span>
                        <h3 class="text-text-main text-3xl md:text-4xl font-bold leading-tight">A Parisian Romance</h3>
                    </div>
                    <p class="text-text-main text-base leading-relaxed max-w-md">
                        A high-fashion approach to a classic romance. Shot exclusively on medium format film, this collection explores the architectural beauty of the city alongside intimate, unposed moments.
                    </p>
                    <a class="inline-flex min-w-[120px] w-fit items-center justify-center rounded-sm h-12 px-8 bg-primary text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary/90" href="collection.php">View Work</a>
                </div>
                <div class="order-1 lg:order-2 w-full aspect-[4/5] rounded-sm overflow-hidden group">
                    <div class="w-full h-full bg-center bg-no-repeat bg-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHEzUlfS303uLm_-L8_bXcSqLGg-wv02gJkYs2JOKgYdtmEPVE8dPlIpJTh9JHPtLyPJiO_6-UEN4CiS-_LzAsCWlBHEGZm0nxT4QZasLY4IM4wdbebnlmb6-pBKUzWFtubqYsKQol8U-9OfHC3XVnyOgGBhPhKWBgAlSmqOp4OsLoXd7nT5DjHv9BGXPfMXpqQD7FofhTJGzfFGO8o1KzvbhnNONVcdcRchfFqDQ0DTQ_i0z7GhnW8RguzTChT7Qmg8_QO2DSeVA");'></div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                <div class="w-full aspect-[4/5] rounded-sm overflow-hidden group">
                    <div class="w-full h-full bg-center bg-no-repeat bg-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBfG8KLKfpSGRtvCj-ABgQhnYP1I3wgXgDc0zIxVv1wDiC4sWTE5C7zSAKTLQ12g-rhiz-W-9OqRR-aDhhAgg00Ivazn1PdGbWVPXj0xz3FafjaK7haLffsTAmMFyL2FmJ-1h2LrbJwMEPuO-39C5oyEekoQEX_1SEXQh8fOoxBlCOicIjqkwT8kL_5Fp62JFtSLgJJ_GdCPC5N1PN1TqCEPSsKfz7ITexgNX2e1yeihVauyROAbJmFGaHWqhyevgs1iaSz4v-mVMw");'></div>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <span class="text-text-muted text-xs font-medium uppercase tracking-[0.05em]">Elopement • Big Sur, CA</span>
                        <h3 class="text-text-main text-3xl md:text-4xl font-bold leading-tight">Coastal Shadows</h3>
                    </div>
                    <p class="text-text-main text-base leading-relaxed max-w-md">
                        Intimate moments framed by dramatic landscapes. Stripping away the excess to focus on the raw emotion of a private vow exchange against the rugged coastline.
                    </p>
                    <a class="inline-flex min-w-[120px] w-fit items-center justify-center rounded-sm h-12 px-8 bg-primary text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary/90" href="collection.php">View Work</a>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                <div class="flex flex-col gap-8 order-2 lg:order-1">
                    <div class="flex flex-col gap-2">
                        <span class="text-text-muted text-xs font-medium uppercase tracking-[0.05em]">Engagement • New York, NY</span>
                        <h3 class="text-text-main text-3xl md:text-4xl font-bold leading-tight">Urban Brutalism</h3>
                    </div>
                    <p class="text-text-main text-base leading-relaxed max-w-md">
                        Juxtaposing soft romance with stark concrete. An exploration of shape, shadow, and connection within the structured environment of the city.
                    </p>
                    <a class="inline-flex min-w-[120px] w-fit items-center justify-center rounded-sm h-12 px-8 bg-primary text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary/90" href="collection.php">View Work</a>
                </div>
                <div class="order-1 lg:order-2 w-full aspect-[4/5] rounded-sm overflow-hidden group">
                    <div class="w-full h-full bg-center bg-no-repeat bg-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAFUE2NsHzHZ6aypP1IIBa8thjcxbhIvSMSb03UxfH08k2D-Nrap5u2CKve-DtAQpFY4WIMcD3siePIx61us_CN4zy5-T5sDna0nG6eOJzsgSF2PlcQRZYzf-Xp0VvXJ-_9sqadZ9iXa1WUMiFzUSFthhGMASHqyih80QX0zS0iD3ptcyAoLeQWBEEaSFusCXMpsN4u3eqFunX2VdFzSdyIGG_Obl7SJT1iz7jjXTR42T6Q5p8XA41hoYjLQRp2xFysXRjddiqPtOw");'></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-background-light py-24 px-6 text-center border-t border-[#f0f2f4]">
        <div class="max-w-3xl mx-auto flex flex-col items-center gap-8">
            <h2 class="text-text-main text-3xl md:text-5xl font-bold leading-tight">Ready to create something timeless?</h2>
            <a class="inline-flex min-w-[160px] items-center justify-center rounded-sm h-14 px-10 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary mt-4" href="contact.php">Inquire Now</a>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
