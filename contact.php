<?php
$page_title = 'Contact | Iowa Wedding Photographer — Kim Sinton';
$meta_description = 'Contact Iowa wedding photographer Kim Sinton to check availability for your wedding or elopement in Iowa City, Des Moines, Burlington or Northern Missouri.';
$meta_keywords = 'contact wedding photographer Iowa, book Iowa wedding photographer, Iowa City wedding photographer, Des Moines wedding photographer contact';
$current_page = 'contact';
include 'includes/header.php';
?>
<main class="flex-grow flex flex-col lg:flex-row w-full">
    <!-- Left: static content -->
    <section class="w-full lg:w-1/2 p-8 lg:p-24 xl:p-32 flex flex-col justify-between bg-surface border-b lg:border-b-0 lg:border-r border-[#8B95A5]/20 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-background-light/50 to-transparent pointer-events-none opacity-50"></div>
        <div class="relative z-10 max-w-xl">
            <h1 class="font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.1] tracking-tighter text-text-main mb-8">
                Let's create your<br/>Iowa wedding<br/>story.
            </h1>
            <p class="text-text-main/80 text-lg max-w-md leading-relaxed mb-12">
                I'd love to hear about your wedding. My style is relaxed and easygoing on the day, yet always thoroughly professional behind the camera — and I'm glad to talk through your ideas, locations, and options. Reach out any time; I look forward to hearing from you.
            </p>
        </div>
        <div class="relative z-10 space-y-6 mt-12 lg:mt-0">
            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-widest text-[#8B95A5] font-bold">Email</span>
                <a class="text-lg hover:text-accent transition-colors font-medium border-b border-transparent hover:border-accent inline-block self-start pb-0.5" href="mailto:kimsinton@gmail.com">kimsinton@gmail.com</a>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-widest text-[#8B95A5] font-bold">Phone</span>
                <a class="text-lg hover:text-accent transition-colors font-medium border-b border-transparent hover:border-accent inline-block self-start pb-0.5" href="tel:+14088248917">408 824 8917</a>
            </div>
            <div class="flex flex-col gap-1 mt-8">
                <span class="text-xs uppercase tracking-widest text-[#8B95A5] font-bold">Studio</span>
                <p class="text-lg font-medium text-text-main">Iowa City</p>
            </div>
        </div>
    </section>

    <!-- Right: form -->
    <section class="w-full lg:w-1/2 p-8 py-16 lg:p-24 xl:p-32 flex items-center justify-center bg-background-light relative">
        <div class="w-full max-w-md relative z-10">
            <div class="mb-12">
                <h2 class="font-display font-bold text-2xl text-text-main tracking-tight mb-2">Tell me about your day</h2>
                <p class="text-[#8B95A5] text-sm">Just your name and email to get started — everything else is optional.</p>
            </div>
            <form id="inquiry-form" action="https://api.web3forms.com/submit" method="POST" class="space-y-10">

                <!-- ▼▼▼ PASTE YOUR WEB3FORMS ACCESS KEY BETWEEN THE QUOTES BELOW ▼▼▼ -->
                <input type="hidden" name="access_key" value="98e4ffc5-dedc-48ad-8506-0916f52dd1c6"/>
                <!-- ▲▲▲ (get it free at web3forms.com — the key is tied to kimsinton@gmail.com) ▲▲▲ -->

                <!-- Email subject line and sender label shown in your inbox -->
                <input type="hidden" name="subject" value="New wedding inquiry from your website"/>
                <input type="hidden" name="from_name" value="Kim Sinton Website"/>
                <!-- Where visitors land after a successful submit -->
                <input type="hidden" name="redirect" value="https://kimsinton.com/thank-you.php"/>
                <!-- Honeypot: Web3Forms silently blocks bots that tick this -->
                <input type="checkbox" name="botcheck" class="hidden" style="display:none !important;" tabindex="-1" autocomplete="off"/>

                <div id="form-errors" class="hidden mb-2 text-[#b91c1c] text-sm font-medium"></div>

                <div class="space-y-8">
                    <div>
                        <label class="sr-only" for="name">Full Name</label>
                        <input class="minimal-input" id="name" name="name" placeholder="Your name" required type="text"/>
                    </div>
                    <div>
                        <label class="sr-only" for="email">Email Address</label>
                        <input class="minimal-input" id="email" name="email" placeholder="Email address" required type="email"/>
                    </div>
                    <div>
                        <label class="sr-only" for="phone">Phone Number (optional)</label>
                        <input class="minimal-input" id="phone" name="phone" placeholder="Phone number (optional)" type="tel"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                    <div>
                        <label class="sr-only" for="date">Wedding Date (optional)</label>
                        <input class="minimal-input" id="date" name="date" placeholder="Wedding date (optional)" type="text"/>
                    </div>
                    <div>
                        <label class="sr-only" for="location">Location / Venue (optional)</label>
                        <input class="minimal-input" id="location" name="location" placeholder="Location or venue (optional)" type="text"/>
                    </div>
                </div>
                <div class="pt-4">
                    <label class="sr-only" for="message">About your wedding (optional)</label>
                    <textarea class="minimal-input resize-none" id="message" name="message" rows="4" placeholder="Tell me a little about your wedding — the vibe, your plans, anything you'd like me to know (optional)"></textarea>
                </div>
                <div class="pt-8">
                    <button class="w-full bg-text-main text-white font-display font-bold uppercase tracking-widest text-sm h-14 flex items-center justify-center hover:bg-accent transition-colors duration-300 rounded group" type="submit">
                        <span class="group-hover:-translate-y-0.5 transition-transform duration-300 inline-block">Submit Inquiry</span>
                        <span class="material-symbols-outlined ml-2 text-lg group-hover:translate-x-1 transition-transform duration-300">arrow_right_alt</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>
<script>
(function () {
    var form = document.getElementById('inquiry-form');
    if (!form) return;
    form.addEventListener('submit', function (e) {
        var nameEl = form.querySelector('#name');
        var emailEl = form.querySelector('#email');
        var errs = [];
        if (!nameEl.value.trim()) errs.push('Please enter your name.');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value.trim())) errs.push('Please enter a valid email address.');
        var box = document.getElementById('form-errors');
        if (errs.length) {
            e.preventDefault();
            box.textContent = errs[0];
            box.classList.remove('hidden');
            (errs[0].indexOf('name') > -1 ? nameEl : emailEl).focus();
        }
    });
})();
</script>
<?php include 'includes/footer.php'; ?>
