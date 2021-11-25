const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    icon = document.querySelector('.bx-menu-alt-right'),
    iconTheme = 'bx-menu-alt-right';
    
    // Validate that variables exist
    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            // We add the show-menu class to the div tag with the nav__menu class
            nav.classList.toggle('mostrar');
            icon.classList[icon.classList[1] === 'bx-menu' ? 'add' : 'remove'](iconTheme)
            icon.classList.toggle('bx-menu');
        })
    }
}
showMenu('toggle','menu')

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.link')

function linkAction(){
    const navMenu = document.getElementById('menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('mostrar')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*==================== CHANGE BACKGROUND HEADER ====================*/ 
function scrollHeader(){
    const nav = document.getElementById('header')
    // When the scroll is greater than 200 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 200) nav.classList.add('scroll-header'); else nav.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

function getOS(){
    var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);

    if(/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream){
        document.querySelector('.header').classList.add('iphone');
    }
}

function IsSafari() {

    var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;

    if(is_safari){
        const header = document.querySelector('.header');
        header.classList.add('iphone');
    }
}

getOS();