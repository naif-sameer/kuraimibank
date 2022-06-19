/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './src/**/*.vue', './src/**/**/*.vue'],
  theme: {
    extend: {
      colors: {
        'primary-light': 'red',
        'primary-base': 'red',
        'primary-dark': 'red',

        'secondary-light': 'red',
        'secondary-base': 'red',
        'secondary-dark': 'red',
      },
    },
  },
  plugins: [require('tailwindcss-rtl')],
};
