let ua = detect.parse(navigator.userAgent);
console.log(ua.browser.family);

let browserName = document.querySelector("div.browser-name");

if (ua.browser.family === "Firefox") {
    browserName.innerHTML = 'Ваш браузер - <strong>Firefox</strong>';
    browserName.classList.add("firefox")
}
if (ua.browser.family === "Chrome") {
    browserName.innerHTML = 'Ваш браузер - <strong>Chrome</strong>';
    browserName.classList.add("chrome")
}