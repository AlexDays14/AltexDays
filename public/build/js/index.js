const showMenu=(e,t)=>{const n=document.getElementById(e),o=document.getElementById(t),s=document.querySelector(".bx-menu-alt-right");n&&o&&n.addEventListener("click",()=>{o.classList.toggle("mostrar"),s.classList["bx-menu"===s.classList[1]?"add":"remove"]("bx-menu-alt-right"),s.classList.toggle("bx-menu")})};showMenu("toggle","menu");const navLink=document.querySelectorAll(".link");function linkAction(){document.getElementById("menu").classList.remove("mostrar")}navLink.forEach(e=>e.addEventListener("click",linkAction));const sections=document.querySelectorAll("section[id]");function scrollActive(){const e=window.pageYOffset;sections.forEach(t=>{const n=t.offsetHeight,o=t.offsetTop-50;sectionId=t.getAttribute("id"),e>o&&e<=o+n?document.querySelector(".menu a[href*="+sectionId+"]").classList.add("active-link"):document.querySelector(".menu a[href*="+sectionId+"]").classList.remove("active-link")})}function scrollHeader(){const e=document.getElementById("header");this.scrollY>=200?e.classList.add("scroll-header"):e.classList.remove("scroll-header")}function getOS(){var e=navigator.userAgent||navigator.vendor||window.opera;/iPad|iPhone|iPod/.test(e)&&!window.MSStream&&document.querySelector(".header").classList.add("iphone")}function IsSafari(){if(navigator.userAgent.toLowerCase().indexOf("safari/")>-1){document.querySelector(".header").classList.add("iphone")}}window.addEventListener("scroll",scrollActive),window.addEventListener("scroll",scrollHeader),getOS();