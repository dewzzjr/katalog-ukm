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
            .tab({
                onLoad: function () {
                    google.maps.event.trigger(maps[0].map, 'resize');
                    maps[0].map.setCenter(maps[0].markers[0].getPosition());
                    maps[0].map.panTo(maps[0].markers[0].getPosition());
                    maps[0].map.setZoom(14);
                }
            });

        // create menu
        $('.vertical.menu')
            .sticky({
                context: '#sticky-menu',
                offset: 85,
            });

        // View some images
        viewer = new Viewer(document.getElementById('images'), {
            toolbar: false,
        });
    });