module.exports = {
  mode: "jit",
  content: ["./**/*.php", "./src/**/*.js"],
  darkMode: "class",
  theme: {
    zIndex: {
      1: 1,
      2: 2,
      10: 10,
    },
    listStyleType: {
      auto: "auto",
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
    },
    container: {
      center: true,
      padding: "15px",
      // screens: {
      //   sm: "640px",
      //   md: "768px",
      //   lg: "1280px",
      // },
    },
    extend: {
      lineHeight: {
        12: "3rem",
        16: "4rem",
      },
      colors: {
        "theme-dark": "#122735",
        "theme-gray": "#828282",
        "theme-green": "#009C58",
        "theme-blue": "#009FE3",
        "theme-yellow": "#FEDA48",
        "theme-red": "#EA522F",
        primary: "#6266f0",
      },
      fontSize: {
        // '20xl': '20rem'
      },
      fontFamily: {
        heading: "Playfair Display",
      },
    },
  },
  variants: {
    extend: {},
  },
  // plugins: [require('@tailwindcss/typography')],
};
