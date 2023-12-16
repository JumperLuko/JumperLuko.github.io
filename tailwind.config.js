/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js}"],
  darkMode: 'class',
    theme: {
      extend: {
        colors: {
          clifford: '#da373d',
        },
        animation: {
            'spin-slow': 'spin 5s linear infinite',
        },
      },
    },
  plugins: [],
}

