module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./vendor/laravel/**/resources/*.blade.php"
    ],
    theme: {
        container: {
            center: true
        },
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px'
        },
        colors: {
            transparent: "rgba(255,255,255,0)",
            white: {
                full: "#ffffff",
                DEFAULT: "#f8f9fb",
                600: "rgba(248,249,251,0.6)",
                second: "#e8ecef",
                border: "#dbdbdb"
            },
            dark: {
                DEFAULT: "#323232",
                lighter: "#707070",
                600: "rgba(50,50,50,0.6)"
            },
            gray: {
                DEFAULT: "#545454"
            },
            blue: {
                DEFAULT: "#2a66e8"
            },
            red: {
                DEFAULT: "rgb(177,37,52)"
            }
        },
        fontFamily: {
            display: ['Roboto', 'sans-serif']
        },
        extend: {},
    },
    plugins: [],
}
