import LazyLoad from 'vanilla-lazyload'
// import lazySizes from 'lazysizes'
// import 'lazysizes/plugins/parent-fit/ls.parent-fit.js'

window.loadPictures = (element) => {
    window.myLazyLoad = new LazyLoad({
        elements_selector: element
    })
    window.myLazyLoad.update()
}
window.loadPictures('.lazy')

// lazySizes.cfg.lazyClass = 'lazy'
// lazySizes.cfg.expand = 300
// lazySizes.init()
