import smoothscroll from 'smoothscroll-polyfill'

smoothscroll.polyfill()

let element = document.querySelectorAll('.js-scroll-to');

[].forEach.call(element, element => {
    let dataTarget = element.dataset.target
    let target = document.querySelector(dataTarget)

    element.addEventListener('click', event => {
        event.preventDefault()

        target.scrollIntoView({
            block: 'start',
            behavior: 'smooth'
        })
    })
})
