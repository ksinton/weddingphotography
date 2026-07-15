<?php
$page_title = 'Photography — Pricing';
$current_page = 'pricing';
include 'includes/header.php';
?>
<main class="flex-grow">

    <!-- Page Header -->
    <section class="bg-surface border-b border-[#8B95A5]/20 py-6 md:py-8 px-6 text-center">
        <div class="max-w-5xl mx-auto flex flex-col gap-4">
            <p class="text-text-main text-base md:text-lg leading-relaxed max-w-4xl mx-auto">
                Every wedding is different, and my collections are designed to flex with yours. If you'd like a custom album, a second photographer, or coverage tailored to your day, I welcome the conversation — reach out any time to discuss the options.
            </p>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-8 md:py-10 px-6 md:px-12 lg:px-24 bg-background-light">
        <div class="max-w-[1200px] mx-auto flex flex-wrap justify-center gap-6 items-start">

            <!-- Short Wedding Package -->
            <div class="bg-surface border border-[#8B95A5]/20 rounded-sm p-6 flex flex-col gap-4 w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] max-w-[380px]">
                <div class="flex flex-col gap-2">
                    <span class="text-text-muted text-xs font-bold uppercase tracking-[0.1em]">01</span>
                    <h2 class="text-text-main text-2xl font-bold tracking-tight">Short Wedding Package</h2>
                    <p class="text-text-muted text-sm leading-relaxed">Half-day coverage for smaller weddings and shorter celebrations.</p>
                </div>
                <div class="border-t border-[#8B95A5]/20 pt-4 flex items-baseline gap-2">
                    <span class="text-text-main text-4xl font-bold tracking-tighter">$1,200</span>
                    <span class="text-text-muted text-sm">· up to 4 hrs</span>
                </div>
                <button type="button" class="feature-toggle inline-flex items-center justify-center gap-1.5 h-11 px-5 rounded-sm border border-primary text-primary text-xs font-bold uppercase tracking-[0.08em] transition-colors hover:bg-primary hover:text-white" aria-expanded="false">
                    <span class="toggle-label">See what's included</span>
                    <span class="material-symbols-outlined text-base leading-none">expand_more</span>
                </button>
                <ul class="feature-list hidden flex flex-col gap-3 text-sm text-text-main">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Up to 4 hours of shooting</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photos delivered digitally through Dropbox</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Raw photos available upon request at no additional cost</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes album design</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes 1 premium 12&times;12 album (contact me for additional albums or other options)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photo editing &amp; sorting (roughly 8 hours)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Wedding planning session</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> All travel time included (remote locations may incur travel fees)</li>
                </ul>
                <a class="mt-auto inline-flex items-center justify-center rounded-sm h-12 px-8 border border-text-main text-text-main text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-text-main hover:text-white" href="contact.php">Inquire</a>
            </div>

            <!-- Standard Wedding Package — highlighted -->
            <div class="bg-[#241710] border border-[#241710] rounded-sm p-6 flex flex-col gap-4 relative w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] max-w-[380px]">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <span class="bg-gradient-to-b from-[#94742A] to-[#7C611C] text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-sm shadow-sm">Most Popular</span>
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-[#8B95A5] text-xs font-bold uppercase tracking-[0.1em]">02</span>
                    <h2 class="text-white text-2xl font-bold tracking-tight">Standard Wedding Package</h2>
                    <p class="text-[#8B95A5] text-sm leading-relaxed">Full ceremony and reception coverage for a complete wedding day.</p>
                </div>
                <div class="border-t border-white/10 pt-4 flex items-baseline gap-2">
                    <span class="text-white text-4xl font-bold tracking-tighter">$1,500</span>
                    <span class="text-[#8B95A5] text-sm">· up to 6 hrs</span>
                </div>
                <button type="button" class="feature-toggle inline-flex items-center justify-center gap-1.5 h-11 px-5 rounded-sm border border-primary text-primary bg-white/5 text-xs font-bold uppercase tracking-[0.08em] transition-colors hover:bg-primary hover:text-white" aria-expanded="false">
                    <span class="toggle-label">See what's included</span>
                    <span class="material-symbols-outlined text-base leading-none">expand_more</span>
                </button>
                <ul class="feature-list hidden flex flex-col gap-3 text-sm text-white">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Up to 6 hours of shooting</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photos delivered digitally through Dropbox</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Raw photos available upon request at no additional cost</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes album design</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes 1 premium 12&times;12 album (contact me for additional albums or other options)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photo editing &amp; sorting (roughly 12 hours)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Wedding planning session</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> All travel time included (remote locations may incur travel fees)</li>
                </ul>
                <a class="mt-auto inline-flex items-center justify-center rounded-sm h-12 px-8 bg-gradient-to-b from-[#94742A] to-[#7C611C] text-white text-sm font-bold uppercase tracking-[0.04em] transition-all hover:from-[#A2812F] hover:to-[#846A20]" href="contact.php">Inquire</a>
            </div>

            <!-- Full Wedding Package -->
            <div class="bg-surface border border-[#8B95A5]/20 rounded-sm p-6 flex flex-col gap-4 w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] max-w-[380px]">
                <div class="flex flex-col gap-2">
                    <span class="text-text-muted text-xs font-bold uppercase tracking-[0.1em]">03</span>
                    <h2 class="text-text-main text-2xl font-bold tracking-tight">Full Wedding Package</h2>
                    <p class="text-text-muted text-sm leading-relaxed">Comprehensive all-day coverage from getting ready through the celebration.</p>
                </div>
                <div class="border-t border-[#8B95A5]/20 pt-4 flex items-baseline gap-2">
                    <span class="text-text-main text-4xl font-bold tracking-tighter">$3,200</span>
                    <span class="text-text-muted text-sm">· up to 10 hrs</span>
                </div>
                <button type="button" class="feature-toggle inline-flex items-center justify-center gap-1.5 h-11 px-5 rounded-sm border border-primary text-primary text-xs font-bold uppercase tracking-[0.08em] transition-colors hover:bg-primary hover:text-white" aria-expanded="false">
                    <span class="toggle-label">See what's included</span>
                    <span class="material-symbols-outlined text-base leading-none">expand_more</span>
                </button>
                <ul class="feature-list hidden flex flex-col gap-3 text-sm text-text-main">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Up to 10 hours of shooting</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photos delivered digitally through Dropbox</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Raw photos available upon request at no additional cost</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes album design</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes 2 premium 12&times;12 albums (contact me for additional albums or other options)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photo editing &amp; sorting (roughly 20 hours)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Wedding planning session</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> All travel time included (remote locations may incur travel fees)</li>
                </ul>
                <a class="mt-auto inline-flex items-center justify-center rounded-sm h-12 px-8 border border-text-main text-text-main text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-text-main hover:text-white" href="contact.php">Inquire</a>
            </div>

            <!-- Low Cost No Frills -->
            <div class="bg-surface border border-[#8B95A5]/20 rounded-sm p-6 flex flex-col gap-4 w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] max-w-[380px]">
                <div class="flex flex-col gap-2">
                    <span class="text-text-muted text-xs font-bold uppercase tracking-[0.1em]">04</span>
                    <h2 class="text-text-main text-2xl font-bold tracking-tight">Low Cost No Frills</h2>
                    <p class="text-text-muted text-sm leading-relaxed">Essential coverage for couples who want beautiful photos without the extras.</p>
                </div>
                <div class="border-t border-[#8B95A5]/20 pt-4 flex items-baseline gap-2">
                    <span class="text-text-main text-4xl font-bold tracking-tighter">$430</span>
                    <span class="text-text-muted text-sm">· up to 1.5 hrs</span>
                </div>
                <button type="button" class="feature-toggle inline-flex items-center justify-center gap-1.5 h-11 px-5 rounded-sm border border-primary text-primary text-xs font-bold uppercase tracking-[0.08em] transition-colors hover:bg-primary hover:text-white" aria-expanded="false">
                    <span class="toggle-label">See what's included</span>
                    <span class="material-symbols-outlined text-base leading-none">expand_more</span>
                </button>
                <ul class="feature-list hidden flex flex-col gap-3 text-sm text-text-main">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Up to 1.5 hours of shooting</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photos delivered digitally through Dropbox</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Raw photos available upon request at no additional cost</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> No album included</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photo editing &amp; sorting (roughly 3 hours)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Wedding planning session</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> All travel time included (remote locations may incur travel fees)</li>
                </ul>
                <a class="mt-auto inline-flex items-center justify-center rounded-sm h-12 px-8 border border-text-main text-text-main text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-text-main hover:text-white" href="contact.php">Inquire</a>
            </div>

            <!-- Elopement -->
            <div class="bg-surface border border-[#8B95A5]/20 rounded-sm p-6 flex flex-col gap-4 w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] max-w-[380px]">
                <div class="flex flex-col gap-2">
                    <span class="text-text-muted text-xs font-bold uppercase tracking-[0.1em]">05</span>
                    <h2 class="text-text-main text-2xl font-bold tracking-tight">Elopement</h2>
                    <p class="text-text-muted text-sm leading-relaxed">For intimate ceremonies, courthouse weddings, and private vow exchanges.</p>
                </div>
                <div class="border-t border-[#8B95A5]/20 pt-4 flex items-baseline gap-2">
                    <span class="text-text-main text-4xl font-bold tracking-tighter">$900</span>
                    <span class="text-text-muted text-sm">· up to 2 hrs</span>
                </div>
                <button type="button" class="feature-toggle inline-flex items-center justify-center gap-1.5 h-11 px-5 rounded-sm border border-primary text-primary text-xs font-bold uppercase tracking-[0.08em] transition-colors hover:bg-primary hover:text-white" aria-expanded="false">
                    <span class="toggle-label">See what's included</span>
                    <span class="material-symbols-outlined text-base leading-none">expand_more</span>
                </button>
                <ul class="feature-list hidden flex flex-col gap-3 text-sm text-text-main">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Up to 2 hours of shooting</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photos delivered digitally through Dropbox</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Raw photos available upon request at no additional cost</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes album design</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Includes 1 premium 12&times;12 album (contact me for additional albums or other options)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Photo editing &amp; sorting (roughly 4 hours)</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> Wedding planning session</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-primary text-base mt-0.5">check</span> All travel time included (remote locations may incur travel fees)</li>
                </ul>
                <a class="mt-auto inline-flex items-center justify-center rounded-sm h-12 px-8 border border-text-main text-text-main text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-text-main hover:text-white" href="contact.php">Inquire</a>
            </div>
        </div>

        <p class="text-center text-text-muted text-sm mt-6">Tap <span class="text-primary font-bold">See what's included</span> on any package to view full details.</p>
    </section>

    <!-- CTA -->
    <section class="bg-background-light py-16 px-6 text-center border-t border-[#8B95A5]/20">
        <div class="max-w-3xl mx-auto flex flex-col items-center gap-6">
            <h2 class="text-text-main text-3xl md:text-5xl font-bold leading-tight">Ready to get started?</h2>
            <p class="text-text-muted text-base lg:text-lg max-w-xl">I take on a limited number of weddings each year — reach out early to check your date.</p>
            <a class="inline-flex min-w-[160px] items-center justify-center rounded-sm h-14 px-10 bg-text-main text-white text-sm font-bold uppercase tracking-[0.04em] transition-colors hover:bg-primary mt-4" href="contact.php">Inquire Now</a>
        </div>
    </section>

</main>
<script>
    document.querySelectorAll('.feature-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var list = btn.nextElementSibling;
            var expanded = btn.getAttribute('aria-expanded') === 'true';
            list.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.querySelector('.toggle-label').textContent = expanded ? "See what's included" : 'Hide details';
            btn.querySelector('.material-symbols-outlined').textContent = expanded ? 'expand_more' : 'expand_less';
        });
    });
</script>
<?php include 'includes/footer.php'; ?>
