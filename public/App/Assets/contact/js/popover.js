let M = 0; // количество секунд до исчезновения подсказки

for (let elem in clueList) {
    $('form.contact-form').find(`input[name=${elem}]`).mouseover(() => {
        console.log('enter')
        clueList[elem].hidden = false;
    });

    $('form.contact-form').find(`input[name=${elem}]`).mouseout(() => {
        console.log('leave');
        setTimeout( () => {

            clueList[elem].hidden = true;
        }, M);

    });
}

//заблюрить все элементы кроме модального окна


/*
$('form.contact-form')[0].children.each(function(i, j) {
    console.log(i, j);
}); /*
    if (validatorArray.hasOwnProperty(elem.getAttribute('name'))) {
        elem.onmouseover( event => {
            console.log('mouseover');
            clueList[elem.getAttribute('name')].hidden = false;
        })

        elem.onmouseout( event => {
            setTimeout( () => {
                console.log('mouseout');
                clueList[elem.getAttribute('name')].hidden = true;
            }, M);
        })
    }
}*/