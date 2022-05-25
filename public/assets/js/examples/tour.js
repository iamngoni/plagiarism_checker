'use strict';
$(document).ready(function () {

    $(document).on('click', 'a.tour', function(){
        Tour.run([
            {
                element: $('.header .header-body ul.navbar-nav'),
                content: 'This is the title bar.',
                position: 'bottom'
            },
            {
                element: $('.navigation .navigation-icon-menu'),
                content: 'This is an icon menu.',
                position: 'right'
            },
            {
                element: $('.page-header'),
                content: 'This is the main title of the page.',
                position: 'bottom'
            },
            {
                element: $('.tour-card'),
                content: 'This is the area that covers the content.',
                position: 'top'
            },
            {
                element: $('.tour-card a.btn'),
                content: 'This is the area that covers the content.',
                position: 'top'
            }
        ]);
    });

});