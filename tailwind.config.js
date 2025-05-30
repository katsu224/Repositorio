/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', 'sans-serif'], 
      },
      colors: {
        'color-repository1': '#FFEC00',
        'color-repository2': '#FFFFFF',
        'color-repository3': '#161616',
        'color-repository4': '#0081AF',
        'color-repository5': '#3B60E4',
      },
      spacing: {
        '0-2':'1px',
      } 
    },  
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

