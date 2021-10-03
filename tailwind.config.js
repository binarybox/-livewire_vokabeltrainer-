module.exports = {
    purge: [

        './resources/**/*.blade.php',

        './resources/**/*.js',

        './resources/**/*.vue',

    ],
    screens: {
        'mobile': {'min': '640px', 'max': '767px'},
        'tablet': {'min': '768px', 'max': '1023px'},
        'dektop': {'min': '1024px', 'max': '1279px'},
      },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}