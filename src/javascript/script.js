$(document).ready(function () {
    $('#mobile_btn').on('click', function () {
        $('#mobile_menu').toggleClass('active');
        $('#mobile_btn').find('i').toggleClass('fa-x');
    });

    const sections = $('section');
    const navItems = $('.nav-item');

        $(window).on('scroll', function () {
        const header = $('header');
        const scrollPosition = $(window).scrollTop() - header.outerHeight();

        let activeSectionIndex = 0;

        if (scrollPosition <= 0) {
            header.css('box-shadow', 'none');
        } else {
            header.css('box-shadow', '5px 1px 5px rgba(0, 0, 0, 0.1');
        }

        sections.each(function(i) {
            const section = $(this);
            const sectionTop = section.offset().top - 96;
            const sectionBottom = sectionTop+ section.outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                activeSectionIndex = i;
                return false;
            }
        })

        navItems.removeClass('active');
        $(navItems[activeSectionIndex]).addClass('active');
    });

    /* function highlightNavByScroll() {
        const header = $('header');
        const scrollPosition = $(window).scrollTop() - header.outerHeight();

        let activeSectionIndex = 0;

        if (scrollPosition <= 0) {
            header.css('box-shadow', 'none')
        } else {
            header.css('box-shadow', '5px 1px 5px rgba(0,0,0,0.1)');
        }

        sections.each(function (i) {
            const section = $(this);
            const sectionTop = section.offset().top - 96;
            const sectionBottom = sectionTop + section.outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                activeSectionIndex = i;
                return false;
            }
        });

        navItems.removeClass('active');
        $(navItems[activeSectionIndex]).addClass('active');
    }

    function highlightNavByUrl() {
        const currentPath = window.location.pathname.split('/').pop(); // ex: "blog.php" ou "form.html"

        $('.nav-item').each(function () {
            const link = $(this).find('a').attr('href');

            if (link && link.includes(currentPath)) {
            $(this).addClass('active');
            }
        });
    }


    highlightNavByUrl(); */

    // ScrollReveal continua funcionando normalmente
    ScrollReveal().reveal('#cta', {
        origin: 'left',
        duration: 1500,
        distance: '20%'
    });

    ScrollReveal().reveal('.work', {
        origin: 'left',
        duration: 1500,
        distance: '20%'
    });

    ScrollReveal().reveal('#testimonials.balao', {
        origin: 'left',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('.feedback', {
        origin: 'right',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('#enterprise', {
        origin: 'right',
        duration: 1500,
        distance: '20%'
    });

    ScrollReveal().reveal('#questions_content', {
        origin: 'right',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('#contact_form', {
        origin: 'right',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('#thanks', {
        origin: 'right',
        duration: 1000,
        distance: '20%'
    });
});