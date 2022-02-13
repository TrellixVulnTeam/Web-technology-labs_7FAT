'use strict';

const dayOfWeek = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
const month = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь',
    'Ноябрь', 'Декабрь'];

function setDate(elemToSet, dateClass) {
    elemToSet.children[0].innerHTML = dateClass.getDate().toString();
    elemToSet.children[1].innerHTML = month[dateClass.getMonth() + 1];
    elemToSet.children[2].innerHTML = dateClass.getFullYear().toString();
    elemToSet.children[3].innerHTML = dayOfWeek[dateClass.getDay() - 1];
}

function setTime(elemToSet, dateClass) {
    dateClass = new Date();

    elemToSet.children[0].innerHTML = dateClass.getHours().toString();
    elemToSet.children[1].innerHTML = dateClass.getMinutes().toString();

    let seconds = dateClass.getSeconds();
    if (seconds < 10) seconds = '0' + seconds.toString();
    elemToSet.children[2].innerHTML = seconds.toString();
}

let interestsMenu = document.querySelector('div.interests-menu');

interestsMenu.addEventListener('click', event => {
    event.stopPropagation();
})

document.addEventListener('click', event => {
    interestsMenu.hidden = true;
});

let menu = document.getElementById('interests');

menu.addEventListener('click', event => {
    event.stopPropagation();
    interestsMenu.hidden = false;
});


let menuDate = document.querySelector('li.current-date');
let menuTime = document.querySelector('li.current-time');

let date = new Date();

setDate(menuDate, date);

setTime(menuTime, date);
let currentDateInterval = setInterval(() => {
    setTime(menuTime, date)
}, 1000);
