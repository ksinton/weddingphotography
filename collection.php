<?php
// ─── Gallery Config ───────────────────────────────────────────────────────────
$galleries = [
    'california' => [
        'title'       => 'California',
        'subtitle'    => 'Dallas &amp; Christina',
        'description' => 'An engagement session along the California coast — dramatic cliffs, salt air, and two people completely at ease in each other\'s presence.',
        'sections'    => [
            ['label' => null, 'folder' => 'images/categories/1-california/DallasChristinaEngagment/'],
        ],
    ],
    'hawaii' => [
        'title'       => 'Hawaii',
        'subtitle'    => 'Hawaiian Weddings',
        'description' => 'Six intimate celebrations set against the breathtaking beauty of the Hawaiian islands. Lush landscapes, golden light, and love stories as timeless as the ocean.',
        'sections'    => [
            ['label' => 'Tuania &amp; Bryce', 'folder' => 'images/categories/2-hawaii/TuaniaBryceWedding/'],
            ['label' => 'Kaulana Wedding',    'folder' => 'images/categories/2-hawaii/KaulanaWedding/'],
            ['label' => 'Joey\'s Wedding',    'folder' => 'images/categories/2-hawaii/JoeyWedding/'],
            ['label' => 'Megan\'s Wedding',   'folder' => 'images/categories/2-hawaii/MegansWedding/'],
            ['label' => 'Own &amp; Maren',    'folder' => 'images/categories/2-hawaii/OwnMarenWedding/'],
            ['label' => 'Spiro &amp; Chricy', 'folder' => 'images/categories/2-hawaii/SpiroAndChricyWedding/'],
        ],
    ],
    'midwest' => [
        'title'       => 'Midwest',
        'subtitle'    => 'Midwest Weddings',
        'description' => 'Intimate celebrations across the heartland — golden fields, family-filled barns, and love stories rooted in the place they call home.',
        'sections'    => [
            ['label' => 'Smith Wedding',      'folder' => 'images/categories/3-midwest/SmithWedding/'],
            ['label' => 'Sule Wedding',       'folder' => 'images/categories/3-midwest/SuleWedding/'],
            ['label' => 'Kim &amp; Kristen', 'folder' => 'images/categories/3-midwest/KimAndKristen/'],
        ],
    ],
    'vedic' => [
        'title'       => 'Vedic',
        'subtitle'    => 'Annie &amp; Taddy &nbsp;&middot;&nbsp; Ben &amp; Kristi',
        'description' => 'Two Vedic ceremonies rich with colour, ritual, and joyful celebration. Every detail intentional, every moment full of meaning.',
        'sections'    => [
            ['label' => 'Ben &amp; Kristi',  'folder' => 'images/categories/5-vedic/BenChristiWedding/'],
            ['label' => 'Annie &amp; Taddy', 'folder' => 'images/categories/5-vedic/AnniTaddyWedding/'],
        ],
    ],
    'misc' => [
        'title'       => 'Miscellaneous',
        'subtitle'    => 'Misc Gallery',
        'description' => 'A collection of moments from various weddings and sessions — each one distinct, all of them real.',
        'sections'    => [
            ['label' => null, 'folder' => 'images/categories/4-misc/'],
        ],
    ],
    'colombia' => [
        'title'       => 'Colombia',
        'subtitle'    => 'Colombian Weddings',
        'description' => 'Vibrant celebrations steeped in culture, colour, and the warmth of family. Three couples, three unforgettable days in Colombia.',
        'sections'    => [
            ['label' => 'David &amp; Diana',   'folder' => 'images/categories/1b-columbia/DavidDianaColumbia2008/'],
            ['label' => 'Giovanni &amp; Mafa', 'folder' => 'images/categories/1b-columbia/GiovanniMafaColombia2008/'],
            ['label' => 'Oscar &amp; Maria',   'folder' => 'images/categories/1b-columbia/OscarAndMariaColumbia2008/'],
        ],
    ],
];

// ─── Resolve gallery ──────────────────────────────────────────────────────────
$key = isset($_GET['gallery']) ? preg_replace('/[^a-z]/', '', strtolower($_GET['gallery'])) : '';
if (!array_key_exists($key, $galleries)) {
    header('Location: galleries.php');
    exit;
}
$g = $galleries[$key];

// ─── Build image list per section ────────────────────────────────────────────
$base = __DIR__ . '/';
foreach ($g['sections'] as &$sec) {
    $files = glob($base . $sec['folder'] . '*-2.jpg');
    if (!$files) $files = glob($base . $sec['folder'] . '*.jpg');
    sort($files);
    $sec['images'] = array_map(fn($f) => str_replace($base, '', $f), $files ?? []);
}
unset($sec);

// ─── All images flat (for lightbox index) ────────────────────────────────────
$all_images = [];
foreach ($g['sections'] as $sec) {
    foreach ($sec['images'] as $img) $all_images[] = $img;
}

$page_title  = 'Photography — ' . html_entity_decode($g['title']);
$current_page = 'galleries';
include 'includes/header.php';
?>
<main class="flex-grow pb-16">

    <!-- Back + Header -->
    <section class="max-w-[1200px] mx-auto px-6 md:px-10 lg:px-20 pt-16 pb-12">
        <a class="inline-flex items-center gap-2 text-text-muted hover:text-primary text-sm uppercase tracking-widest font-semibold transition-colors mb-10" href="galleries.php">
            <span class="material-symbols-outlined text-base">arrow_back</span> All Galleries
        </a>
        <div class="flex flex-col gap-3 max-w-2xl">
            <span class="text-text-muted text-xs font-medium uppercase tracking-[0.1em]"><?= $g['title'] ?></span>
            <h1 class="text-text-main text-4xl md:text-6xl font-bold tracking-tighter leading-tight"><?= $g['subtitle'] ?></h1>
            <p class="text-text-muted text-lg leading-relaxed mt-2"><?= $g['description'] ?></p>
        </div>
    </section>

    <?php if (empty($all_images)): ?>
    <!-- Coming Soon -->
    <section class="max-w-[1200px] mx-auto px-6 md:px-10 lg:px-20 py-24 text-center">
        <div class="border border-[#8B95A5]/20 rounded-sm p-20 flex flex-col items-center gap-6">
            <span class="material-symbols-outlined text-5xl text-[#8B95A5]">photo_camera</span>
            <h2 class="text-text-main text-2xl font-bold">Images Coming Soon</h2>
            <p class="text-text-muted">This gallery is being curated. Check back soon.</p>
            <a class="inline-flex items-center justify-center rounded-sm h-12 px-8 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary" href="galleries.php">Back to Galleries</a>
        </div>
    </section>

    <?php else: ?>
    <!-- Gallery Sections -->
    <?php foreach ($g['sections'] as $sec): ?>
        <?php if (!empty($sec['label'])): ?>
        <div class="max-w-[1200px] mx-auto px-6 md:px-10 lg:px-20 mb-8 mt-6">
            <h2 class="text-text-main text-2xl md:text-3xl font-bold tracking-tight border-b border-[#8B95A5]/20 pb-4"><?= $sec['label'] ?></h2>
        </div>
        <?php endif; ?>

        <div class="max-w-[1200px] mx-auto px-6 md:px-10 lg:px-20 mb-16">
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
                <?php foreach ($sec['images'] as $img):
                    $idx = array_search($img, $all_images);
                ?>
                <div class="break-inside-avoid cursor-pointer overflow-hidden rounded-sm group"
                     onclick="openLightbox(<?= $idx ?>)">
                    <img src="<?= htmlspecialchars($img) ?>"
                         alt="Wedding photography"
                         loading="lazy"
                         class="w-full block transition-transform duration-500 group-hover:scale-[1.03]"/>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>

    <!-- CTA -->
    <section class="bg-background-light py-20 px-6 text-center border-t border-[#8B95A5]/20 mt-8">
        <div class="max-w-2xl mx-auto flex flex-col items-center gap-6">
            <h2 class="text-text-main text-3xl md:text-4xl font-bold leading-tight">Love what you see?</h2>
            <p class="text-text-muted">I'd love to tell your story. Reach out to check availability.</p>
            <a class="inline-flex items-center justify-center rounded-sm h-12 px-10 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary" href="contact.php">Inquire Now</a>
        </div>
    </section>

</main>

<!-- ─── Lightbox ─────────────────────────────────────────────────────────── -->
<div id="lightbox" class="fixed inset-0 z-[100] bg-black/95 hidden items-center justify-center" onclick="closeLightboxOutside(event)">
    <button onclick="closeLightbox()" class="absolute top-5 right-6 text-white/70 hover:text-white z-10">
        <span class="material-symbols-outlined text-3xl">close</span>
    </button>
    <button onclick="prevImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white z-10 bg-black/30 rounded-sm p-2">
        <span class="material-symbols-outlined text-3xl">chevron_left</span>
    </button>
    <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white z-10 bg-black/30 rounded-sm p-2">
        <span class="material-symbols-outlined text-3xl">chevron_right</span>
    </button>
    <img id="lightbox-img" src="" alt="Gallery image"
         class="max-h-[90vh] max-w-[90vw] object-contain rounded-sm shadow-2xl transition-opacity duration-200"/>
    <p id="lightbox-counter" class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/50 text-xs uppercase tracking-widest"></p>
</div>

<script>
var images = <?= json_encode(array_values($all_images)) ?>;
var current = 0;
var lb = document.getElementById('lightbox');
var lbImg = document.getElementById('lightbox-img');
var lbCounter = document.getElementById('lightbox-counter');

function openLightbox(idx) {
    current = idx;
    lb.classList.remove('hidden');
    lb.classList.add('flex');
    document.body.style.overflow = 'hidden';
    showImage();
}
function closeLightbox() {
    lb.classList.add('hidden');
    lb.classList.remove('flex');
    document.body.style.overflow = '';
}
function closeLightboxOutside(e) {
    if (e.target === lb) closeLightbox();
}
function showImage() {
    lbImg.style.opacity = 0;
    setTimeout(function() {
        lbImg.src = images[current];
        lbImg.style.opacity = 1;
    }, 150);
    lbCounter.textContent = (current + 1) + ' / ' + images.length;
}
function nextImage() { current = (current + 1) % images.length; showImage(); }
function prevImage() { current = (current - 1 + images.length) % images.length; showImage(); }

document.addEventListener('keydown', function(e) {
    if (!lb.classList.contains('hidden')) {
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft')  prevImage();
        if (e.key === 'Escape')     closeLightbox();
    }
});
</script>

<style>
#lightbox-img { transition: opacity 0.2s ease; }
</style>

<?php include 'includes/footer.php'; ?>
