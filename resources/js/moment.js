import moment from 'moment'

moment.updateLocale('en', {
    relativeTime: {
        past: '%s',
        s: '%ds',
        ss: '%ds',
        m: '%dm',
        mm: '%dm',
        h: '%dh',
        hh: '%dh',
        d: '%dd',
        dd: '%dd',
        w: '%dw',
        ww: '%dw',
        M: '%dmo',
        MM: '%dmo',
        y: '%dy',
        yy: '%dy',
    }
})

export default moment