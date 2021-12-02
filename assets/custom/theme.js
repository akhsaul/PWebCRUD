(() => {
    "use strict"; // Start of use strict

    function isMatch(str, pattern, flags) {
        const regex = new RegExp(pattern, flags)
        let m
        let result = false
        while ((m = regex.exec(str)) !== null) {
            // This is necessary to avoid infinite loops with zero-width matches
            if (m.index === regex.lastIndex) {
                regex.lastIndex++
            }

            // The result can be accessed through the `m`-variable.
            m.forEach((match, groupIndex) => {
                console.log(`Found match, group ${groupIndex}: ${match}`)
                result = true
            });
        }
        return result
    }

    function checkNotEmpty(e, event, focus, tooltip) {
        const str = e.value.trim()

        let isNotValid = str === '' || str === ' '

        // check if element is password
        if (e.type === 'password') {
            // only run if element is password, otherwise ignore this!
            // check if value match pattern
            isNotValid = isMatch(str, "[^a-zA-Z0-9]", 'gm')
        }

        if (!isNotValid) {
            // style manual override computed style
            // so, we have to remove style manually
            tooltip.style.display = ''
            // validate if computed style changed into none
            isNotValid = getComputedStyle(tooltip).display !== 'none';
        }

        if (isNotValid) {
            e.style.borderColor = '#dc3545'
            e.style.backgroundImage = "var(--image-red)"
            if (focus) {
                e.style.boxShadow = "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
            } else {
                e.style.boxShadow = 'unset'
            }
            // make tooltip displayed when user input wrong pattern
            // can't change computed style (CSS)
            // this will override computed style
            // except computed style has '!important'
            tooltip.style.display = "block"

            // prevent submitted data if theres still not valid
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

                const input = document.querySelectorAll('.form-control')
                const tooltips = document.querySelectorAll('.invalid-tooltip')
                for (let i = 0; i < input.length; i++) {
                    const e = input[i]
                    // only run if button submit clicked
                    checkNotEmpty(e, event, false, tooltips[i])

                    // only run if all input element got blurred
                    e.addEventListener('blur', () => {
                        checkNotEmpty(e, event, false, tooltips[i])
                    })

                    // only run if all input element got focussed
                    e.addEventListener('focus', () => {
                        checkNotEmpty(e, event, true, tooltips[i])
                    })

                    // only run if user doing input in all input element
                    e.addEventListener('input', () => {
                        checkNotEmpty(e, event, true, tooltips[i])
                    })
                }
            }, false)
        }
    )

})(); // End of use strict
