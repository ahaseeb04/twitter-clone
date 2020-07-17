const plugin = require('tailwindcss/plugin')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        './resources/js/**/**/**/**/*.js',
        './resources/js/**/**/**/**/*.vue',
        './resources/views/**/**/**/**/*.php',
    ],

    theme: {
        extend: {
            borderColor: {
                default: defaultTheme.colors.gray[800],
            },

            boxShadow: {
                light: '0 0 15px 0 rgba(255, 255, 255, .1)',
            },

            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },

            maxWidth: {
                '36': '9rem',
                '40': '10rem',
            },

            spacing: {
                '3px': '3px',
            }
        },
    },

    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'important'],
        borderRadius: ['responsive', 'important'],
        overflow: ['responsive', 'important'],
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
