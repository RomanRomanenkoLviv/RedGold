import 'intersection-observer'

let mapBlock = document.querySelector('.js-map')

function initMap () {
    let observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                observer.unobserve(mapBlock)

                startMap()
            }
        })
    }, {
        rootMargin: '100px'
    })

    observer.observe(mapBlock)
}

function startMap () {
    if (!mapBlock) {
        return
    }

    let lat = parseFloat(mapBlock.dataset.lat)
    let lng = parseFloat(mapBlock.dataset.lng)
    let styles = [
        {
            'featureType': 'water',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#F7F7F7'
                },
                {
                    'lightness': 17
                }
            ]
        },
        {
            'featureType': 'road.highway',
            'elementType': 'geometry.fill',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 17
                }
            ]
        },
        {
            'featureType': 'road.highway',
            'elementType': 'geometry.stroke',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 29
                },
                {
                    'weight': 0.2
                }
            ]
        },
        {
            'featureType': 'road.arterial',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 18
                }
            ]
        },
        {
            'featureType': 'road.local',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 16
                }
            ]
        },
        {
            'featureType': 'poi.park',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#F7F7F7'
                },
                {
                    'lightness': 21
                }
            ]
        },
        {
            'elementType': 'labels.text.stroke',
            'stylers': [
                {
                    'visibility': 'on'
                },
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 16
                }
            ]
        },
        {
            'elementType': 'labels.text.fill',
            'stylers': [
                {
                    'saturation': 36
                },
                {
                    'color': '#333333'
                },
                {
                    'lightness': 40
                }
            ]
        },
        {
            'elementType': 'labels.icon',
            'stylers': [
                {
                    'visibility': 'off'
                }
            ]
        }
    ]

    let markerUrl = staticAsset('front/img/svg/mark.svg')
    let mapMarker = new google.maps.MarkerImage(
        markerUrl, null, null, null, new google.maps.Size(114, 135)
    )
    let target = {
        lat: lat,
        lng: lng
    }
    let markerPosition = {
        lat: lat - 0.00025,
        lng: lng
    }

    let map = new google.maps.Map(mapBlock, {
        zoom: 17,
        center: target,
        scrollwheel: false,
        panControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        zoomControl: false,
        styles: styles,
        fullscreenControl: false
    })
    let marker = new google.maps.Marker({
        position: markerPosition,
        map: map,
        icon: mapMarker
    })
}
window.initMap = initMap
window.startMap = startMap
