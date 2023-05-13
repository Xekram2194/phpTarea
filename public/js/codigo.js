console.log('funcionaaaaaaaaaaaaa');

let nav = document.querySelector('.nav');
// nav.classList.add('cambioNav');
let menu = document.querySelector('.nav__contenedor__menu');
let btn = document.querySelector('.nav__contenedor--btn');

// console.log(scrollY);
btn.addEventListener('click', function(){
    // console.log('hiciste click');
    // menu.classList.add('mostrarMenu');
    menu.classList.toggle('mostrarMenu');
})


window.addEventListener('scroll', function(){
    // console.log('hiciste scroll', scrollY);
    if(scrollY > 0){
        nav.classList.add('cambioNav');
    } else{
        nav.classList.remove('cambioNav');
    }
});

const urlSplit = window.location.href.split('/');
const path = urlSplit[urlSplit.length - 1].split('?')[0];
if(path === 'portafolio.php'){
    nav.classList.add("cambioNav");
}
console.log(urlSplit);

let alertBtn = document.querySelector('.alert-btn');
let alertContainer = document.querySelector('.alert-contacto');
let closeBtn = document.querySelector('.close-btn');
let duration = 1000; // Duración del alerta en milisegundos (en este caso, 5 segundos)

alertBtn.addEventListener('click', function() {
    
//   alertContainer.style.display = 'block';
  setTimeout(() => {
    alertContainer.style.display = 'none';
  }, duration);
});
// if(alertContainer.style.display == 'block'){
//     setTimeout(() => {
//         alertContainer.style.display = 'none';
//       }, duration);
// }
    closeBtn.addEventListener('click', function() {
        alertContainer.style.display = 'none';
    });    




//pruebas del menu 
$(document).ready(function(){
    $('a[href*=#]').bind('click', function(e){
        e.preventDefault();
        let target = $(this).attr('href');

        //realizando la aniumacion 
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 600, function(){
            location.hash = target;
        });
        return false;
    });
});

$(window).scroll(function() {
    let scrollDistance = $(window).scrollTop();
    $('.page-section').each(function(i){
        if($(this).position().top <= scrollDistance){
            $('.nav__contenedor__menu__item a.active').removeClass('active');
            $('nav__contenedor__menu__item a').eq(i).addClass('active')
        }
    });
}).scroll();