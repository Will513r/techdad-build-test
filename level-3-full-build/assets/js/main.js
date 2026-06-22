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
});
