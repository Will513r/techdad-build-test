/**
 * Main Controller - Summit Exterior Cleaning LLC
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // =========================================================================
    // 1. Mobile Menu Drawer Logic
    // =========================================================================
    const menuToggle = document.querySelector('.mobile-nav-toggle');
    const menuClose = document.querySelector('.mobile-menu-close');
    const menuOverlay = document.querySelector('.mobile-menu-overlay');
    
    if (menuToggle && menuClose && menuOverlay) {
        menuToggle.addEventListener('click', function() {
            menuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling background
        });
        
        const closeMenu = function() {
            menuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        };
        
        menuClose.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', function(e) {
            if (e.target === menuOverlay) {
                closeMenu();
            }
        });
    }

    // =========================================================================
    // 2. Before/After Image Comparison Slider
    // =========================================================================
    const sliderContainer = document.querySelector('.ba-slider-container');
    const afterImage = document.querySelector('.ba-after-image');
    const sliderHandle = document.querySelector('.ba-slider-handle');
    
    if (sliderContainer && afterImage && sliderHandle) {
        let isDragging = false;
        
        // Function to move the slider
        const moveSlider = function(clientX) {
            const containerRect = sliderContainer.getBoundingClientRect();
            const containerWidth = containerRect.width;
            const offsetX = clientX - containerRect.left;
            
            // Boundary constraints (0% to 100%)
            let percentage = (offsetX / containerWidth) * 100;
            if (percentage < 0) percentage = 0;
            if (percentage > 100) percentage = 100;
            
            // Apply positioning
            afterImage.style.width = percentage + '%';
            sliderHandle.style.left = percentage + '%';
        };
        
        // Mouse Events
        sliderHandle.addEventListener('mousedown', function() {
            isDragging = true;
        });
        
        window.addEventListener('mouseup', function() {
            isDragging = false;
        });
        
        window.addEventListener('mousemove', function(e) {
            if (!isDragging) return;
            moveSlider(e.clientX);
        });
        
        // Touch Events (Mobile)
        sliderHandle.addEventListener('touchstart', function() {
            isDragging = true;
        });
        
        window.addEventListener('touchend', function() {
            isDragging = false;
        });
        
        window.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            if (e.touches.length > 0) {
                moveSlider(e.touches[0].clientX);
            }
        });
        
        // Support direct clicking on container to jump
        sliderContainer.addEventListener('click', function(e) {
            if (e.target !== sliderHandle && !sliderHandle.contains(e.target)) {
                moveSlider(e.clientX);
            }
        });
    }

    // =========================================================================
    // 3. Accordion FAQ Triggers
    // =========================================================================
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            
            // Toggle active class
            const isActive = item.classList.contains('active');
            
            // Close other items (optional, but clean)
            document.querySelectorAll('.accordion-item').forEach(otherItem => {
                otherItem.classList.remove('active');
            });
            
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    // =========================================================================
    // 4. Contact Form Validation & AJAX Submission
    // =========================================================================
    const leadForm = document.getElementById('leadForm');
    const formStatus = document.getElementById('form-status');
    
    if (leadForm && formStatus) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear prior validation errors
            document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
            formStatus.style.display = 'none';
            formStatus.className = 'form-status-alert';
            
            let hasErrors = false;
            
            // Fetch inputs
            const nameInput = document.getElementById('name');
            const phoneInput = document.getElementById('phone');
            const emailInput = document.getElementById('email');
            const serviceSelect = document.getElementById('service');
            const citySelect = document.getElementById('city');
            const messageInput = document.getElementById('message');
            
            // Validate Name
            if (nameInput && nameInput.value.trim() === '') {
                document.getElementById('name-error').textContent = 'Please enter your name.';
                hasErrors = true;
            }
            
            // Validate Phone
            if (phoneInput) {
                const phoneVal = phoneInput.value.trim();
                const digits = phoneVal.replace(/[^0-9]/g, '');
                if (phoneVal === '') {
                    document.getElementById('phone-error').textContent = 'Please enter your phone number.';
                    hasErrors = true;
                } else if (digits.length < 10) {
                    document.getElementById('phone-error').textContent = 'Please enter a valid 10-digit phone number.';
                    hasErrors = true;
                }
            }
            
            // Validate Email
            if (emailInput) {
                const emailVal = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailVal === '') {
                    document.getElementById('email-error').textContent = 'Please enter your email address.';
                    hasErrors = true;
                } else if (!emailRegex.test(emailVal)) {
                    document.getElementById('email-error').textContent = 'Please enter a valid email address.';
                    hasErrors = true;
                }
            }
            
            // Validate Service
            if (serviceSelect && serviceSelect.value === '') {
                document.getElementById('service-error').textContent = 'Please select a service.';
                hasErrors = true;
            }
            
            // Validate City
            if (citySelect && citySelect.value === '') {
                document.getElementById('city-error').textContent = 'Please select your city.';
                hasErrors = true;
            }
            
            // Block submit if errors exist
            if (hasErrors) {
                formStatus.style.display = 'block';
                formStatus.classList.add('form-status-error');
                formStatus.textContent = 'Please correct the validation errors below.';
                return;
            }
            
            // Submit form via fetch
            const submitBtn = leadForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Send Quote Request &rarr;';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending Quote Request...';
            }
            
            const formData = new FormData(leadForm);
            
            fetch(leadForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'An error occurred during submission.');
                    });
                }
                return response.json();
            })
            .then(data => {
                // Success State
                formStatus.style.display = 'block';
                formStatus.classList.add('form-status-success');
                formStatus.textContent = data.message;
                
                // Clear form
                leadForm.reset();
            })
            .catch(error => {
                // Error State
                formStatus.style.display = 'block';
                formStatus.classList.add('form-status-error');
                formStatus.textContent = error.message || 'There was a problem sending your inquiry. Please try calling instead.';
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        });
    }
    
    // Automatically pre-fill service dropdown from query string if present
    const urlParams = new URLSearchParams(window.location.search);
    const svcParam = urlParams.get('service');
    if (svcParam) {
        const serviceSelect = document.getElementById('service');
        if (serviceSelect) {
            serviceSelect.value = svcParam;
        }
    }

    // =========================================================================
    // 5. Smart Header Scroll Behavior (Hide on Scroll Down, Show on Scroll Up)
    // =========================================================================
    const mainHeader = document.querySelector('.main-header');
    if (mainHeader) {
        let lastScrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            if (currentScrollY > lastScrollY && currentScrollY > 150) {
                // Scrolling down & past header threshold
                mainHeader.classList.add('header-hidden');
            } else {
                // Scrolling up or at the top
                mainHeader.classList.remove('header-hidden');
            }
            lastScrollY = currentScrollY;
        }, { passive: true });
    }

    // =========================================================================
    // 6. Services Scrollspy & Tab Navigation
    // =========================================================================
    const tabItems = document.querySelectorAll('.service-tab-item');
    const detailCards = document.querySelectorAll('.service-detail-card');
    
    if (tabItems.length > 0 && detailCards.length > 0) {
        // Tab click handling (Smooth Scroll to target card)
        tabItems.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetService = this.getAttribute('data-service');
                const targetCard = document.getElementById(`service-${targetService}`);
                
                if (targetCard) {
                    // Account for sticky header offset
                    const headerOffset = 110; 
                    const elementPosition = targetCard.getBoundingClientRect().top + window.scrollY;
                    const offsetPosition = elementPosition - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Scrollspy handling (Intersection Observer)
        const observerOptions = {
            root: null,
            rootMargin: '-30% 0px -50% 0px', // Triggers when card is in upper-middle of viewport
            threshold: 0
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeService = entry.target.getAttribute('data-service');
                    
                    // Update active state in sidebar tabs
                    tabItems.forEach(item => {
                        if (item.getAttribute('data-service') === activeService) {
                            item.classList.add('active');
                        } else {
                            item.classList.remove('active');
                        }
                    });
                }
            });
        }, observerOptions);
        
        detailCards.forEach(card => observer.observe(card));
    }

    // =========================================================================
    // 7. GSAP Scroll Animations
    // =========================================================================
    function initGSAP() {
        if (typeof gsap === 'undefined') return;

        // Register ScrollTrigger
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // --- 7.1 Hero Section Animation (Immediate on Load) ---
        const heroTagline = document.querySelector('.hero-tagline');
        const heroTitle = document.querySelector('.hero-title');
        const heroDesc = document.querySelector('.hero-desc');
        const heroActions = document.querySelector('.hero-actions');
        
        const heroTl = gsap.timeline({ defaults: { ease: 'power3.out', duration: 1 } });
        
        if (heroTagline || heroTitle || heroDesc || heroActions) {
            heroTl.delay(0.2); // Start almost immediately once initGSAP is called
            if (heroTagline) heroTl.from(heroTagline, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0);
            if (heroTitle) heroTl.from(heroTitle, { opacity: 0, y: 30, filter: 'blur(8px)' }, 0.15);
            if (heroDesc) heroTl.from(heroDesc, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0.3);
            if (heroActions) heroTl.from(heroActions, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0.45);
        }

        // --- 7.1b Services Hero Animation (Immediate on Load) ---
        const servicesBadge = document.querySelector('.services-hero .services-badge');
        const servicesTagline = document.querySelector('.services-hero-tagline');
        const servicesTitle = document.querySelector('.services-hero-title');
        const servicesBtn = document.querySelector('.services-hero-btn');
        
        if (servicesBadge || servicesTagline || servicesTitle || servicesBtn) {
            const servicesTl = gsap.timeline({ 
                defaults: { ease: 'power3.out', duration: 1 },
                onComplete: () => {
                    gsap.set([servicesBadge, servicesTagline, servicesTitle, servicesBtn].filter(Boolean), { clearProps: 'opacity,transform,filter' });
                }
            });
            servicesTl.delay(0.2);
            if (servicesBadge) servicesTl.from(servicesBadge, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0);
            if (servicesTagline) servicesTl.from(servicesTagline, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0.1);
            if (servicesTitle) servicesTl.from(servicesTitle, { opacity: 0, y: 30, filter: 'blur(8px)' }, 0.2);
            if (servicesBtn) servicesTl.from(servicesBtn, { opacity: 0, y: 20, filter: 'blur(5px)' }, 0.35);
        }

        // --- 7.2 General ScrollTrigger Animations ---
        if (typeof ScrollTrigger !== 'undefined') {
            
            // A helper function to create ScrollTrigger scroll animations
            const animateOnScroll = (elements, vars, triggerOffset = 'bottom 90%') => {
                const elList = document.querySelectorAll(elements);
                elList.forEach(el => {
                    if (el.closest('.services-hero')) return;
                    gsap.from(el, {
                        ...vars,
                        scrollTrigger: {
                            trigger: el,
                            start: 'top ' + triggerOffset.split(' ')[1],
                            toggleActions: 'play none none none'
                        },
                        onComplete: () => {
                            gsap.set(el, { clearProps: 'opacity,transform,filter' });
                        }
                    });
                });
            };

            // Stagger helper for groups of elements
            const staggerOnScroll = (parentSelector, childSelector, vars, triggerOffset = '85%') => {
                const parents = document.querySelectorAll(parentSelector);
                parents.forEach(parent => {
                    const children = parent.querySelectorAll(childSelector);
                    if (children.length === 0) return;
                    
                    gsap.from(children, {
                        ...vars,
                        stagger: vars.stagger || 0.15,
                        scrollTrigger: {
                            trigger: parent,
                            start: `top ${triggerOffset}`,
                            toggleActions: 'play none none none'
                        },
                        onComplete: () => {
                            gsap.set(children, { clearProps: 'opacity,transform,filter' });
                        }
                    });
                });
            };

            // 1. Fade In Up + Blur for Headers, Subtitles, Badges
            animateOnScroll('h2, .section-subtitle, .services-badge, .about-intro-label, .reviews-badge, .estimate-pill, .internal-hero-title, .internal-hero-subtitle', {
                opacity: 0,
                y: 30,
                filter: 'blur(8px)',
                duration: 1,
                ease: 'power2.out'
            });

            // 2. Fade In + Blur for descriptions and text blocks
            animateOnScroll('.about-continuation-desc, .slider-intro-desc, .areas-split-desc, .footer-top-tagline', {
                opacity: 0,
                y: 20,
                filter: 'blur(5px)',
                duration: 1,
                ease: 'power2.out'
            }, 'bottom 85%');

            // 3. Staggered Bullet Points
            staggerOnScroll('.about-bullets-list', 'li', {
                opacity: 0,
                y: 15,
                filter: 'blur(4px)',
                duration: 0.8,
                stagger: 0.12,
                ease: 'power2.out'
            });

            // 4. Staggered Grid Cards (e.g. Trust Items, Area Cards, Service detail cards)
            staggerOnScroll('.trust-strip-grid', '.trust-item', {
                opacity: 0,
                y: 25,
                filter: 'blur(5px)',
                duration: 0.8,
                stagger: 0.1,
                ease: 'power2.out'
            });

            staggerOnScroll('.areas-grid', '.area-card', {
                opacity: 0,
                y: 30,
                filter: 'blur(6px)',
                duration: 0.8,
                stagger: 0.12,
                ease: 'power2.out'
            });

            staggerOnScroll('.services-split-layout', '.service-tab-item', {
                opacity: 0,
                x: -30,
                filter: 'blur(5px)',
                duration: 0.8,
                stagger: 0.1,
                ease: 'power2.out'
            });

            // 5. Individual Cards & Image Animations
            animateOnScroll('.about-continuation-image-col, .detail-img-wrapper, .ba-slider-container, .testimonial-slider-container', {
                opacity: 0,
                scale: 0.96,
                filter: 'blur(8px)',
                duration: 1.2,
                ease: 'power2.out'
            });

            // 6. Form panel entrance (Slide in up + blur)
            animateOnScroll('.estimate-panel, .contact-form-block', {
                opacity: 0,
                y: 40,
                filter: 'blur(8px)',
                duration: 1.2,
                ease: 'power3.out'
            });
            
            // 7. Contact Info Block in contact.php
            animateOnScroll('.contact-info-block', {
                opacity: 0,
                x: -40,
                filter: 'blur(8px)',
                duration: 1.2,
                ease: 'power3.out'
            });
        }
    }

    // Delay GSAP initialization until preloader exits (1.8s) if it exists on the page
    const preloaderEl = document.getElementById('preloader');
    if (preloaderEl) {
        setTimeout(initGSAP, 1800);
    } else {
        initGSAP();
    }

    // =========================================================================
    // 8. Back to Top Button Logic
    // =========================================================================
    const backToTopBtn = document.getElementById('back-to-top');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        }, { passive: true });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
