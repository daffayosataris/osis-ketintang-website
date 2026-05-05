/** @type {import('tailwindcss').Config} */
   module.exports = {
     content: [
       "./resources/**/*.blade.php",
       "./resources/**/*.js",
       "./resources/**/*.vue",
     ],
     theme: {
       extend: {
         colors: {
           // Menambahkan custom color palette Maroon
           maroon: {
             50: '#fdf2f2',
             100: '#fbe4e4',
             200: '#f8caca',
             300: '#f2a1a1',
             400: '#e76c6c',
             500: '#d94141',
             600: '#c52727',
             700: '#a51d1d',
             800: '#881b1b',
             900: '#711d1d', // Warna dasar maroon gelap
             950: '#3e0b0b',
           },
         }
       },
     },
     plugins: [],
   }