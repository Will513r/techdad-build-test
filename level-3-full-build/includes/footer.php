<?php
/**
 * Shared footer layout for Summit Exterior Cleaning LLC
 * Design concept: dark two-panel top + 5-column link grid + bottom bar
 */
require_once __DIR__ . '/config.php';
$footer_services = require dirname(__DIR__) . '/data/services.php';
$footer_cities   = require dirname(__DIR__) . '/data/cities.php';
?>
<footer class="site-footer">

    <!-- ── TOP PANEL: Two halves ── -->
    <div class="footer-top">

        <!-- Left half: tagline + email CTA -->
        <div class="footer-top-left">
            <!-- Logo -->
            <div class="footer-logo-lockup">
                <svg class="footer-logo-icon" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="36" height="36" rx="8" fill="#0d9488" fill-opacity="0.15"/>
                    <path d="M18 6L28 12V24L18 30L8 24V12L18 6Z" stroke="#0d9488" stroke-width="2" fill="none"/>
                    <path d="M18 12l6 3.5V22L18 25.5 12 22v-6.5L18 12z" fill="#0d9488" fill-opacity="0.4"/>
                </svg>
                <span class="footer-logo-text">SUMMIT</span>
            </div>

            <p class="footer-top-tagline">
                Asheville's trusted soft wash specialists. No pressure sales, no hidden fees — just a cleaner property.
            </p>

            <!-- Email capture row -->
            <form class="footer-email-row" onsubmit="return false;">
                <input type="email" class="footer-email-input" placeholder="Enter email address...">
                <button type="submit" class="footer-email-btn">CONTACT NOW</button>
            </form>
        </div>

        <!-- Divider -->
        <div class="footer-top-divider"></div>

        <!-- Right half: big headline + book button -->
        <div class="footer-top-right">
            <h2 class="footer-top-headline">Professional exterior cleaning for Asheville homes and businesses.</h2>
            <p class="footer-top-sub">
                From soft washing algae-stained siding to restoring grimy driveways — owner Mike Reyes
                <span class="footer-top-sub-accent">handles every job personally.</span>
            </p>
            <a href="#estimate-section" class="btn-secondary">
                Get Your Free Estimate
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="btn-arrow" style="margin-left: 8px; vertical-align: middle; display: inline-block;"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- ── LINK GRID: 5 columns ── -->
    <div class="footer-link-grid-wrapper">
        <div class="footer-link-grid">

            <!-- Col 1: Main Pages -->
            <div class="footer-link-col">
                <h4 class="footer-col-heading">MAIN PAGES</h4>
                <ul class="footer-link-list">
                    <li><a href="<?php echo SITE_URL; ?>/">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/#services-section">Services</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/about">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/reviews">Reviews</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/#areas-section">Service Areas</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/contact">Contact</a></li>
                </ul>
            </div>

            <!-- Col 2: Services -->
            <div class="footer-link-col">
                <h4 class="footer-col-heading">SERVICES</h4>
                <ul class="footer-link-list">
                    <?php foreach ($footer_services as $slug => $svc): ?>
                        <li><a href="<?php echo SITE_URL; ?>/services/<?php echo $slug; ?>"><?php echo htmlspecialchars($svc['name']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Col 3: Blog & Resources -->
            <div class="footer-link-col">
                <h4 class="footer-col-heading">RESOURCES</h4>
                <ul class="footer-link-list">
                    <li><a href="<?php echo SITE_URL; ?>/blog">Blog</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/blog/why-pressure-washing-damages-siding">Why Soft Wash?</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/contact">Free Quote</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/sitemap.xml">Sitemap</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact / Location -->
            <div class="footer-link-col">
                <h4 class="footer-col-heading">INQUIRY</h4>
                <p class="footer-contact-block">
                    <a href="mailto:<?php echo EMAIL_ADDRESS; ?>"><?php echo EMAIL_ADDRESS; ?></a><br>
                    <a href="tel:<?php echo PHONE_TEL; ?>"><?php echo PHONE_DISPLAY; ?></a>
                </p>

                <h4 class="footer-col-heading" style="margin-top:20px;">LOCATION</h4>
                <p class="footer-contact-block">
                    <?php echo STREET_ADDRESS; ?>,<br>
                    <?php echo CITY_NAME; ?>, <?php echo STATE_ABBR; ?> <?php echo ZIP_CODE; ?><br>
                    <span style="font-size:12px;opacity:.55;">Mon–Fri <?php echo HOURS_MON_FRI; ?></span>
                </p>
            </div>

            <!-- Col 5: Service Areas -->
            <div class="footer-link-col">
                <h4 class="footer-col-heading">SERVICE AREA</h4>
                <ul class="footer-link-list">
                    <?php
                    $count = 0;
                    foreach ($footer_cities as $slug => $city):
                        if ($count++ >= 6) break;
                    ?>
                        <li><a href="<?php echo SITE_URL; ?>/services/house-soft-washing/<?php echo $slug; ?>"><?php echo htmlspecialchars($city['name']); ?>, NC</a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>

    <!-- ── BOTTOM BAR ── -->
    <div class="footer-bottom-bar">
        <!-- Social icons left -->
        <div class="footer-socials">
            <a href="<?php echo SOCIAL_FACEBOOK; ?>" target="_blank" rel="noopener" aria-label="Facebook" class="footer-social-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="<?php echo SOCIAL_LINKEDIN; ?>" target="_blank" rel="noopener" aria-label="LinkedIn" class="footer-social-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </a>
            <a href="#" aria-label="Google Business" class="footer-social-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M21.35 11.1H12.18V13.83H18.69C18.36 17.64 15.19 19.27 12.19 19.27C8.36 19.27 5 16.25 5 12C5 7.9 8.2 4.73 12.19 4.73C15.29 4.73 17.1 6.7 17.1 6.7L19 4.72C19 4.72 16.56 2 12.1 2C6.42 2 2 6.8 2 12C2 17.05 6.16 22 12.19 22C17.6 22 21.5 18.33 21.5 12.91C21.5 11.76 21.35 11.1 21.35 11.1Z"/></svg>
            </a>
        </div>

        <!-- Copyright right -->
        <div class="footer-copy">
            &copy; <?php echo COMPANY_NAME; ?> <?php echo date('Y'); ?>
            <span class="footer-copy-sep">|</span>
            Website by <a href="https://techdadmedia.com" target="_blank" rel="noopener">Tech Dad Media</a>
            <span class="footer-copy-sep">|</span>
            Cash &bull; Check &bull; Venmo &bull; Card
        </div>
    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top-btn" aria-label="Back to Top">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
    </button>
</footer>

<!-- GSAP Animation Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<!-- Core Script -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>

<!-- Review card spotlight glow tracker -->
<script>
(function () {
    function initCardGlow() {
        const cards = document.querySelectorAll('.review-card');
        if (!cards.length) return;

        cards.forEach(card => {
            card.addEventListener('mousemove', function (e) {
                const rect = card.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width  * 100).toFixed(1) + '%';
                const y = ((e.clientY - rect.top)  / rect.height * 100).toFixed(1) + '%';
                card.style.setProperty('--mouse-x', x);
                card.style.setProperty('--mouse-y', y);
            });

            card.addEventListener('mouseleave', function () {
                card.style.setProperty('--mouse-x', '50%');
                card.style.setProperty('--mouse-y', '50%');
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCardGlow);
    } else {
        initCardGlow();
    }
})();
</script>

<?php 
// Inject Hot Reload polling script strictly on local development hosts
$host = $_SERVER['HTTP_HOST'] ?? '';
if (str_contains($host, 'localhost') || str_contains($host, '127.0.0.1') || str_contains($host, '127.0.0.1:8081') || str_contains($host, 'localhost:8000')): 
?>
<script>
(function() {
    let lastMtime = null;
    function checkHotReload() {
        fetch('<?php echo SITE_URL; ?>/api/hot-reload-status.php')
            .then(response => {
                if (!response.ok) throw new Error('Offline');
                return response.json();
            })
            .then(data => {
                if (lastMtime === null) {
                    lastMtime = data.mtime;
                } else if (data.mtime > lastMtime) {
                    console.log('[Hot Reload] File modification detected. Reloading page...');
                    window.location.reload();
                }
            })
            .catch(error => {
                // Ignore connection errors during server restarts
            });
    }
    // Poll every 1000ms
    setInterval(checkHotReload, 1000);
})();
</script>
<!-- Testimonial slideshow slider controller -->
<script>
(function () {
    function initTestimonialSlider() {
        const container = document.getElementById('testimonial-slider');
        if (!container) return;

        const reviews = <?php echo json_encode($reviews); ?>;
        const services = <?php echo json_encode($services); ?>;
        
        let activeIndex = 0;
        
        const quoteEl = document.getElementById('testimonial-quote');
        const authorEl = document.getElementById('testimonial-author-name');
        const metaEl = document.getElementById('testimonial-author-meta');
        const activeAvatarEl = document.getElementById('testimonial-active-avatar');
        const activeIndexEl = document.getElementById('testimonial-active-index');
        const progressFillEl = document.getElementById('testimonial-progress-fill');
        const accentLineEl = document.getElementById('testimonial-accent-line');
        const tinyAvatars = document.querySelectorAll('.tiny-avatar');
        const customCursor = document.getElementById('testimonial-custom-cursor');

        // Helper to format string representation of index
        function padZero(num) {
            return String(num).padStart(2, '0');
        }

        function updateTestimonial(index) {
            activeIndex = index;
            const rev = reviews[activeIndex];
            
            // 1. Update Index Indicator
            activeIndexEl.textContent = padZero(activeIndex + 1);
            
            // 2. Update Progress Bar
            const percent = ((activeIndex + 1) / reviews.length) * 100;
            progressFillEl.style.width = `${percent}%`;

            // 3. Update Stacked Tiny Avatars classes
            tinyAvatars.forEach((avatar, i) => {
                if (i === activeIndex) {
                    avatar.classList.add('active');
                } else {
                    avatar.classList.remove('active');
                }
            });

            // 4. Reset & Trigger Reveal Line
            accentLineEl.classList.remove('visible');
            void accentLineEl.offsetWidth; // force reflow
            accentLineEl.classList.add('visible');

            // 5. Update Author Info & Avatar Initials
            authorEl.textContent = rev.author;
            const serviceName = services[rev.service] ? services[rev.service].name : 'Exterior Cleaning';
            metaEl.innerHTML = `Verified Customer &bull; ${serviceName} &bull; ${rev.location_name}, NC`;
            
            // Extract initials (e.g. "Karen D." -> "KD")
            const initials = rev.author.split(' ').map(n => n[0]).join('').toUpperCase();
            activeAvatarEl.textContent = initials;

            // 6. Split Text Animation
            // Fade out current quote, then update with new words
            quoteEl.style.opacity = 0;
            setTimeout(() => {
                quoteEl.innerHTML = '';
                const words = rev.text.split(' ');
                words.forEach((word, i) => {
                    const span = document.createElement('span');
                    span.className = 'word-span';
                    span.textContent = word + ' ';
                    span.style.transitionDelay = `${i * 0.03}s`;
                    quoteEl.appendChild(span);
                });
                quoteEl.style.opacity = 1;
                
                // Trigger visibility of words on next tick
                requestAnimationFrame(() => {
                    const spans = quoteEl.querySelectorAll('.word-span');
                    spans.forEach(span => span.classList.add('visible'));
                });
            }, 200);
        }

        // Click on tiny avatar to navigate
        tinyAvatars.forEach(avatar => {
            avatar.addEventListener('click', (e) => {
                e.stopPropagation(); // prevent container click next
                const index = parseInt(avatar.getAttribute('data-index'));
                updateTestimonial(index);
            });
        });

        // Click anywhere on container to go next
        container.addEventListener('click', () => {
            const nextIndex = (activeIndex + 1) % reviews.length;
            updateTestimonial(nextIndex);
        });

        // Custom magnetic cursor follow (with smooth lerp)
        let targetX = 0, targetY = 0;
        let currentX = 0, currentY = 0;
        const speed = 0.15;
        let isHovered = false;

        document.addEventListener('mousemove', (e) => {
            if (!container) return;
            const rect = container.getBoundingClientRect();
            // check boundary
            if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                targetX = e.clientX;
                targetY = e.clientY;
                if (!isHovered) {
                    isHovered = true;
                    customCursor.classList.add('hovered');
                }
            } else {
                if (isHovered) {
                    isHovered = false;
                    customCursor.classList.remove('hovered');
                }
            }
        });

        function animateCursor() {
            currentX += (targetX - currentX) * speed;
            currentY += (targetY - currentY) * speed;
            customCursor.style.left = `${currentX}px`;
            customCursor.style.top = `${currentY}px`;
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Initial loading
        updateTestimonial(0);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTestimonialSlider);
    } else {
        initTestimonialSlider();
    }
})();
</script>

<?php endif; ?>
</body>
</html>
