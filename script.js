$(document).ready(function () {

    let currentFilter = 'all';

    function updateDisplay() {
        const searchTerm = $('#searchInput').val().toLowerCase();
        let visibleCount = 0;

        $('.character-list li').each(function () {
            const card = $(this);
            const matchesFilter = currentFilter === 'all' || card.data('class') === currentFilter;
            const name = card.find('span').text().toLowerCase();
            const matchesSearch = name.includes(searchTerm);

            if (matchesFilter && matchesSearch) {
                card.fadeIn(200);
                visibleCount++;
            } else {
                card.hide();
            }
        });

        if (visibleCount === 0) {
            $('#noResults').fadeIn(200);
        } else {
            $('#noResults').hide();
        }
    }

    $('.filter-btn').on('click', function () {
        currentFilter = $(this).data('filter');
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        updateDisplay();
    });

    $('#searchInput').on('input', updateDisplay);

    // scroll to top button
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 300) {
            $('#scrollTopBtn').fadeIn(200);
        } else {
            $('#scrollTopBtn').fadeOut(200);
        }
    });

    $('#scrollTopBtn').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 500);
    });

    // read more / read less
    $('#bioToggle').on('click', function () {
        $('.bio-extra').slideToggle(300);
        if ($(this).text().includes('more')) {
            $(this).html('Read less ▴');
        } else {
            $(this).html('Read more ▾');
        }
    });

});