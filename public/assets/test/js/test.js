'use strict';

let testRegEx = new RegExp('^.*[a-zA-Z_\\-].*$');

let form = document.querySelector('form.test-form');

/*
form.addEventListener('submit', event => {
    for (let elem of form.elements) {
        if (elem.hasAttribute('type')) {
            if (elem.getAttribute('type').match('text')) {
                if (testRegEx.exec(elem.value) === null) {
                    elem.focus();
                    event.returnValue = false;

                    return false;
                }
            }
        }
    }

    let checkedElementsCounter = 0;

    for (let elem of form.elements) {
        if (elem.hasAttribute('type')) {
            if (elem.getAttribute('type').match('checkbox')) {
                if (elem.checked) {
                    ++checkedElementsCounter;
                }
            }
        }
    }

    if (checkedElementsCounter > 1) {
        event.returnValue = false;
        return false;
    }
})*/
