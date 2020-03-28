import Swiper from 'swiper'

function defaultCarouselInit (carousel) {
    let btnPrev = carousel.querySelector('.swiper-button-prev')
    let btnNext = carousel.querySelector('.swiper-button-next')
    let pagination = carousel.querySelector('.swiper-pagination')

    carousel = new Swiper(carousel, {
    // Optional parameters

        // direction: 'vertical',
        // loop: true,

        // If we need pagination
        pagination: {
            el: pagination,
            type: 'fraction'
        },

        // Navigation arrows
        navigation: {
            nextEl: btnNext,
            prevEl: btnPrev
        }
    })
}

window.onLoadCssFinished(function () {
    [].forEach(document.querySelectorAll('.js-swiper'), element => {
        defaultCarouselInit(element)
    })
})
