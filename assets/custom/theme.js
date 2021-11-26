(function () {
    "use strict"; // Start of use strict

    function checkNotEmpty(e, event, focus, tooltip) {
        const str = e.value.trim()
        if (str === '' || str === ' ' || getComputedStyle(tooltip).display !== 'none') {
            e.style.borderColor = '#dc3545'
            e.style.backgroundImage = "var(--image-red)"
            if (focus) {
                e.style.boxShadow = "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
            } else {
                e.style.boxShadow = 'unset'
            }
            event.preventDefault()
            event.stopPropagation();
        } else {
            e.style.borderColor = '#198754'
            e.style.backgroundImage = "var(--image-green)"
            if (focus) {
                e.style.boxShadow = "0 0 0 0.25rem rgba(25, 135, 84, 0.25)"
            } else {
                e.style.boxShadow = 'unset'
            }
        }
    }

    // Show Tooltip Validation
    document.querySelectorAll('.needs-validation').forEach((form) => {
            // Make listener every submitted input
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');

                const input = document.querySelectorAll('input')
                const tooltips = document.querySelectorAll('.invalid-tooltip')
                for (let i = 0; i < input.length; i++) {
                    const e = input[i]
                    checkNotEmpty(e, event, false, tooltips[i])
                    e.addEventListener('blur', () => {
                            checkNotEmpty(e, event, false, tooltips[i])
                        }
                    )
                    e.addEventListener('focus', () => {
                            checkNotEmpty(e, event, true, tooltips[i])
                        }
                    )
                    e.addEventListener('input', () => {
                        checkNotEmpty(e, event, true, tooltips[i])
                    })
                }
            }, false)
        }
    )

})(); // End of use strict
