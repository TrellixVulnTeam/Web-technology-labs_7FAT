(()=>{"use strict";let e=new RegExp("^.*[a-zA-Z_\\-].*$"),t=document.querySelector("form.test-form");t.addEventListener("submit",(r=>{for(let u of t.elements)if(u.hasAttribute("type")&&u.getAttribute("type").match("text")&&null===e.exec(u.value))return u.focus(),r.returnValue=!1,!1;let u=0;for(let e of t.elements)e.hasAttribute("type")&&e.getAttribute("type").match("checkbox")&&e.checked&&++u;if(u>1)return r.returnValue=!1,!1}))})();