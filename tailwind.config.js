const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/views/**/**/*.blade.php",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        "primary-light": "#e7ddff",
        "primary-base": "#8956ff",
        "primary-dark": "#6d44cc",

        "secondary-light": "red",
        "secondary-base": "red",
        "secondary-dark": "red",
      },
    },
  },

  plugins: [require("@tailwindcss/forms"), require("tailwindcss-rtl")],
};
