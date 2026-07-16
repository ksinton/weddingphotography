<?php
$page_title = 'Thank You | Kim Sinton Wedding Photography';
$meta_description = 'Thank you for your wedding photography inquiry. Kim Sinton will be in touch shortly.';
$meta_robots = 'noindex, follow';
$current_page = '';
include 'includes/header.php';
?>
<main class="flex-grow flex items-center justify-center px-6 py-24 md:py-32 bg-background-light">
    <div class="max-w-xl mx-auto text-center flex flex-col items-center gap-6">
        <span class="material-symbols-outlined text-primary text-6xl">favorite</span>
        <h1 class="text-text-main text-4xl md:text-5xl font-bold tracking-tight leading-tight">Thank you!</h1>
        <p class="text-text-muted text-lg leading-relaxed">
            Your message is on its way to my inbox. I read every inquiry personally and will get back to you within a couple of days — I can't wait to hear about your wedding.
        </p>
        <p class="text-text-muted text-base leading-relaxed">
            In the meantime, feel free to browse a few recent weddings.
        </p>
        <div class="flex flex-col sm:flex-row items-center gap-4 mt-2">
            <a class="inline-flex items-center justify-center rounded-sm h-12 px-8 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary" href="galleries.php">View Galleries</a>
            <a class="inline-flex items-center justify-center rounded-sm h-12 px-8 border border-text-main text-text-main text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-text-main hover:text-white" href="index.php">Back to Home</a>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
