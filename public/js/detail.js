var viewer;
$(document)
    .ready(function () {

        // fix secondary menu to page on passing
        $('.secondary.menu').visibility({
            type: 'fixed'
        });
        $('.overlay').visibility({
            type: 'fixed',
            offset: 80
        });

        // create tab
        $('.menu .item')
            .tab();

        // create menu
        $('.vertical.menu')
            .sticky({
                context: '#sticky-menu',
                offset: 85,
            });

        // View some images
        viewer = new Viewer($('#images'), {
            toolbar: false,
        });
    });