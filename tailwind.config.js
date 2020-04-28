const plugin = require('tailwindcss/plugin')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            boxShadow: {
                light: '0 0 15px 0 rgba(255, 255, 255, .1)'
            },

            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans]
            },

            maxWidth: {
                '36': '9rem',
                '40': '10rem'
            },

            spacing: {
                '2/3': '66.6666666667%'
            }
        },
    },

    variants: {
        textColor: ['responsive', 'hover', 'focus', 'important']
    },
    
    plugins: [
        require('@tailwindcss/ui'),

        plugin(function({ addVariant }) {
            addVariant('important', ({ container }) => {
                container.walkRules(rule => {
                    rule.selector = `.\\!${rule.selector.slice(1)}`
                    rule.walkDecls(decl => {
                        decl.important = true
                    })
                })
            })
        })
    ],
}
