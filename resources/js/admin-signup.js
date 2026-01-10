// resources/js/admin-signup.js

document.addEventListener('DOMContentLoaded', function() {
    // 1. Handle step persistence if there are validation errors
    // We check for a data attribute on the form to see if we should skip to step 2
    const form = document.getElementById('signup-form');
    if (form && form.dataset.hasErrors === 'true') {
        nextStep('step-1', 'step-2');
    }

    // 2. Globalize functions so they are available to onclick attributes
    window.validateAdminId = async function() {
        const adminIdInput = document.getElementsByName('admin_id')[0];
        const adminId = adminIdInput.value;
        const btn = document.getElementById('next-btn-step-1');
        
        // Grab the URL and Token from the HTML
        const checkUrl = btn.dataset.url;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        if (!adminId) {
            alert('Please enter an Admin ID before proceeding.');
            return;
        }

        const originalContent = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = `<span>Checking ID...</span>
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        `;

        try {
            const response = await fetch(checkUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ admin_id: adminId })
            });

            const data = await response.json();

            if (data.valid) {
                nextStep('step-1', 'step-2');
            } else {
                alert(data.message);
                adminIdInput.classList.add('border-admin');
            }
        } catch (error) {
            console.error('Validation Error:', error);
            alert('Connection error. Please check your internet.');
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalContent;
        }
    };

    window.nextStep = function(currentId, nextId) {
        document.getElementById(currentId).classList.add('hidden');
        document.getElementById(nextId).classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.prevStep = function(currentId, prevId) {
        document.getElementById(currentId).classList.add('hidden');
        document.getElementById(prevId).classList.remove('hidden');
    };
});