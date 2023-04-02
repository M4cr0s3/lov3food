function burgerMenu(selector) {
    let menu = $(selector);
    let button = menu.find('.burger-menu_button', '.burger-menu_lines');
    let links = menu.find('.burger-menu_link');
    let overlay = menu.find('.burger-menu_overlay');

    button.on('click', (e) => {
        e.preventDefault();
        toggleMenu();
    });

    links.on('click', () => toggleMenu());
    overlay.on('click', () => toggleMenu());

    function toggleMenu(){
        menu.toggleClass('burger-menu_active');

        if (menu.hasClass('burger-menu_active')) {
            // $('.burger-menu_button').css('')
            $('body').css('overlow', 'hidden');
            $('.col-12').css('z-index', 1);
        } else {
            $('body').css('overlow', 'visible');
            $('.col-12').css('z-index', 3);
        }
    }
}

burgerMenu('.burger-menu');
