'use strict';

let toggeleElementsBlur = () => {
    for (let elem of Array.from($('body').children())) {
        if (!$(elem).hasClass('submit-window')) $(elem).toggleClass('blur');
    }
};

let mailRegEx = new RegExp('^[a-zA-Z]{1,}@[a-zA-Z]{1,}\.[a-zA-Z]{1,}$');
let nameRegEx = new RegExp('^[a-zA-Zа-яА-ЯёЁ]+\\s{1}[a-zA-Zа-яА-ЯёЁ]+\\s{1}[a-zA-Zа-яА-ЯёЁ]+$');
let phoneRegEx = new RegExp('^\\+[73]\\d{9,11}$');

let form = $('form.contact-form');
let sendButton = $('button.submit-button')[0];

let validatorArray = {
    'name': false,
    'email': false,
    'phone': false
}

let regexList = {
    'name': nameRegEx,
    'email': mailRegEx,
    'phone': phoneRegEx
}

let clueList = {
    'name': $('p.name-clue')[0],
    'email': $('p.email-clue')[0],
    'phone': $('p.phone-clue')[0]
}

$('div.submit-window')[0].style.display = 'none';


form.on('submit', event => {
    event.preventDefault();

    toggeleElementsBlur();

    $('div.submit-window').show('fast');

    $('[name=ok-btn]').click(() => {
        form.submit();
    })

    $('[name=cancel-btn]').click(() => {
        toggeleElementsBlur();

        $('div.submit-window').hide();
    })
})

for (let elem of Array.from(form[0].elements).reverse()) {
    if (validatorArray.hasOwnProperty(elem.getAttribute('name'))) {
        elem.addEventListener('focusout', event => {

            if (regexList[elem.getAttribute('name')].exec(elem.value.toString()) === null) {
                elem.classList.add('form-incorrect');

                validatorArray[elem.getAttribute('name')] = false;

                clueList[elem.getAttribute('name')].hidden = false;

                elem.classList.remove('form-correct');
            }
            else {
                elem.classList.add('form-correct');

                validatorArray[elem.getAttribute('name')] = true;

                clueList[elem.getAttribute('name')].hidden = true;

                elem.classList.remove('form-incorrect');
            }

            for (let elem in validatorArray) {
                if (!validatorArray[elem]) {
                    sendButton.disabled = true;

                    return;
                }
            }

            sendButton.disabled = false;

        })
    }
}