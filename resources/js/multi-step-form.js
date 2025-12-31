// resources/js/multi-step-form.js

/**
 * Validates inputs in the current step and moves to the next.
 * @param {string} currentStepId - The ID of the div to hide (e.g., 'step-1')
 * @param {string} nextStepId - The ID of the div to show (e.g., 'step-2')
 */
function nextStep(currentStepId, nextStepId) {
    const currentStep = document.getElementById(currentStepId);
    const nextStep = document.getElementById(nextStepId);

    if (!currentStep || !nextStep) {
        console.error("Step IDs not found");
        return;
    }

    // Find all required inputs inside the current step
    const inputs = currentStep.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;

    // Validate them
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('border-red-500', 'ring-1', 'ring-red-500');

            // Remove error highlight when user types
            input.addEventListener('input', function() {
                input.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
            }, { once: true });
        } else {
            input.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
        }
    });

    // Switch steps if valid
    if (isValid) {
        const notifs = currentStep.querySelectorAll('.validation-notif, .error-message, [role="alert"]');
        notifs.forEach(n => n.classList.add('hidden'));

        currentStep.classList.add('hidden');
        nextStep.classList.remove('hidden');
    } else {
        alert('Please fill in all required fields marked in red.');
    }
}

/**
 * Moves back to the previous step (no validation needed).
 * @param {string} currentStepId - The ID of the div to hide (e.g., 'step-2')
 * @param {string} prevStepId - The ID of the div to show (e.g., 'step-1')
 */
function prevStep(currentStepId, prevStepId) {
    const currentStep = document.getElementById(currentStepId);
    const prevStep = document.getElementById(prevStepId);

    if (currentStep && prevStep) {
        currentStep.classList.add('hidden');
        prevStep.classList.remove('hidden');
    }
}

// Make functions global so HTML buttons can see them
window.nextStep = nextStep;
window.prevStep = prevStep;
