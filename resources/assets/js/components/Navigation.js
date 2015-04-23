class Navigation {

    constructor() {

        $(document).on('click', '#btn-logout', () => {
            $(this).addClass("disabled").append('...');
        });

    }

}

export default Navigation;
