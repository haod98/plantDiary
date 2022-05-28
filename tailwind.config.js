const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [
                    "expressway",
                    "new-order",
                    "Nunito",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                plantDiary: {
                    50: "#A6D6AA",
                    100: "#7CA982",
                    150: "#6A9D71",
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
