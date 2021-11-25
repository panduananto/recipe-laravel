const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  purge: ['./resources/**/*.blade.php', './resources/**/*.js'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      spacing: {
        '1/2': '50%',
        '1/3': '33.333333%',
        '2/3': '66.666667%',
        '1/4': '25%',
        '2/4': '50%',
        '3/4': '75%',
      },
      height: {
        'screen-20': 'calc(100vh - 5rem)',
        'screen-20-1': 'calc(100vh - 5rem - 1px)',
      },
    },
    fontFamily: {
      sans: ['Inter', ...defaultTheme.fontFamily.sans],
      serif: ['IBM Plex Serif', ...defaultTheme.fontFamily.serif],
      mono: ['IBM Plex Mono', ...defaultTheme.fontFamily.mono],
    },
  },
  variants: {
    extend: {
      scrollbar: ['rounded'],
    },
  },
  plugins: [require('@tailwindcss/forms'), require('tailwind-scrollbar')],
};
