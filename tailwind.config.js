const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans]
            },

            maxWidth: {
                '36': '9rem',
                '40': '10rem'
            }
        },
    },

    variants: {},
    
    plugins: [
        require('@tailwindcss/ui')
    ],
}
