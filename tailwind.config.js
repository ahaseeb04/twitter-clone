const plugin = require('tailwindcss/plugin')
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
