const menuBtn = document.querySelector('.burger_line');
const menu = document.querySelector('.menu');

if(menuBtn){
    menuBtn.addEventListener("click", function(e) {
        menu.classList.toggle('active');
        menuBtn.classList.toggle('active');
    });
}