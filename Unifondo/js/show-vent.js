
addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.btn-login');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-login');
            menu_items.classList.toggle('show-ventana');
        })
    }
});

addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.btn-login2');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-login');
            menu_items.classList.toggle('show-ventana');
        })
    }
});



addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.btn-register');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-register');
            menu_items.classList.toggle('show-ventana');
        })
    }
});


addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.btn-contact');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-contact');
            menu_items.classList.toggle('show-ventana');
        })
    }
});

/**                                                      */

addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.close-login');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-login');
            menu_items.classList.toggle('show-ventana');
        })
    }
});

addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.close-register');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-register');
            menu_items.classList.toggle('show-ventana');
        })
    }
});

addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.close-contact');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-contact');
            menu_items.classList.toggle('show-ventana');
        })
    }
});

addEventListener('DOMContentLoaded', () =>{
    const btn_menu = document.querySelector('.pasar-register');
    if(btn_menu){
        btn_menu.addEventListener('click', () => {
            menu_items = document.querySelector('.cont-login');
            menu_items.classList.toggle('show-ventana');

            menu_items = document.querySelector('.cont-register');
            menu_items.classList.toggle('show-ventana');
        })
    }
});
