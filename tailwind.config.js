const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    // Don't remove these lines. It may need for design.

    // purge: [
    //     "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    //     "./storage/framework/views/*.php",
    //     "./resources/views/**/*.blade.php",
    // ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './public/**/*.js',
        './Modules/**/*.blade.php',
        './Modules/**/*.js',
        './Modules/**/**/**/*.php',
    ],

    safelist: [
        ...[...Array(12).keys()].map(i => `lg:grid-cols-${i + 1}`),
      ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                DM: ["DM Sans"],
            },

            fontSize: {
                "xss": "10px",
                '2.5xl': '28px',
                '8': '8px',
                '11': '11px',
                '13': '13px',
                '15': '15px',
                '17': '17px',
                '18': '18px',
                '19': '19px',
                '20': '20px',
                '22': '22px',
                '23': '23px',
                '26': '26px',
                '28': '28px',
                '32': '32px',
                '33': '33px',
                '34': '34px',
                '40': '40px',
                '42': '42px',
                '46': '46px',
                '52': '52px',
                '66': '66px',
                '108': '108px',
            },
            spacing: {
                "128": "32rem",
                "92": "475px",
                "63": "270px",
                "29": "120px",
                "25": "100px",
                "105p": "105px",
                "50p": "50px",
                "54p": "54px",
                "33": "130px",
                "23": "88px",
                "1p": "1px",
                "2p": "2px",
                "3p": "3px",
                "5p": "5px",
                "7p": "7px",
                "9p": "9px",
                "10p": "10px",
                "11p": "11px",
                "13p": "13px",
                "15p": "15px",
                "18p": "18px",
                "19p": "19px",
                "21p": "21px",
                "22p": "22px",
                "23p": "23px",
                "25p": "25px",
                "26p": "26px",
                "29p": "29px",
                "30p": "30px",
                "31p": "31px",
                "35p": "35px",
                "52p": "52px",
                "53p": "53px",
                "55p": "55px",
                "59p": "59px",
                "27p": "27px",
                "33.5p": "33.5px",
                "35p": "35px",
                "38p": "38px",
                "40p": "40px",
                "46p": "46px",
                "47p": "47px",
                "49p": "49px",
                "52p": "52px",
                "53p": "53px",
                "58p": "58px",
                "75p": "75px",
                "77p": "77px",
                "60p": "60px",
                "65p": "65px",
                "66p": "66px",
                "68p": "68px",
                "70p": "70px",
                "72p": "72px",
                "74p": "74px",
                "78p": "78px",
                "80p": "80px",
                "82p": "82px",
                "84p": "84px",
                "89p": "89px",
                "93p": "93px",
                "90p": "90px",
                "97p": "97px",
                "103p": "103px",
                "116p": "116px",
                "120p": "120px",
                "125p": "125px",
                "130p": "130px",
                "135p": "135px",
                "132p": "132px",
                "150p": "150px",
                "216p": "216px",
                "225p": "225px",
                "296p": "296px",
                "270p": "270px",
                "135p": "135px",
                "137p": "137px",
                "141p": "141px",
                "146p": "146px",
                "150p": "150px",
                "152p": "152px",
                "155p": "155px",
                "163p": "163px",
                "168p": "168px",
                "173p": "173px",
                "210p": "210px",
                "216p": "216px",
                "225p": "225px",
                "245p": "245px",
                "250p": "250px",
                "260p": "260px",
                "263p": "263px",
                "266p": "266px",
                "275p": "275px",
                "300p": "300px",
                "312p": "312px",
                "318p": "318px",
                "322p": "322px",
                "337p": "337px",
                "345p": "345px",
                "344p": "344px",
                "354p": "354px",
                "364p": "364px",
                "370p": "370px",
                "382p": "382px",
                "385p": "385px",
                "400p": "400px",
                "407p": "407px",
                "411p": "411px",
                "418p": "418px",
                "430p": "430px",
                "450p": "450px",
                "468p":"468px",
                "485p": "485px",
                "491p": "491px",
                "494p": "494px",
                "470p": "470px",
                "480p": "480px",
                "532p": "532px",
                "556p": "556px",
                "505p": "505px",
                "1179p": "1179px",
                "1253p": "1253px",
                "1575p": "1575px",
                "600p":"600px",
                "649p":"649px",
                "690p": "690px",
                "19%": "19%",
                "23%": "23%",
                "24%": "24%",
                "36%": "36%",
                "27%": "27%",
                "28%": "28%",
                "42%": "42%",
                "46%": "46%",
                "49%": "49%",
                "54%": "54%",
                "58%": "58%",
                "72%": "72%",
                "76%": "76%",
                "77%": "77%",
                "340p": "340px",
                "700p": "700px",
                "848p": "848px",
                "850p": "850px",
                "860p": "860px",
                "1425p": "1425px",
                },
            margin: {
                "92": "375px",
            },
            lineHeight: {
                "15p": "15px",
                "22p": "22px",
                "29p": "29px",
                "34p": "34px",
                "42p": "42px",
                "48p": "48px",
                "55p": "55px",
                "60p": "60px",
                "140p": "140px",
            },
            colors: {
            'gray-1': '#999999',
            'gray-10': '#898989',
            'gray-11': '#F3F3F3',
            'gray-12': '#2C2C2C',
            'gray-13': '#777777',
            'gray-2': '#DFDFDF',
            'yellow-1': '#FCCA19',
            'orange-1': '#FA886A',
            'orange-2': '#FF9C00',
            'yellow-2': 'rgba(252, 202, 25, 0.65)',
            'yellow-5': 'rgba(249, 181, 11, 0.1)',
            'orange-3': '#DEA512',
            'orange-4': '#FFF1DC',
            'orange-5': '#FF6C2E',
            'gray-3': '#3F3F3F',
            'green-1': '#009651',
            'black-1': '#474747',
            'gray-4': '#C4C4C4',
            'pinks-1': '#DEAAB3',
            'pinks-2': '#F9E8E8',
            'skies-1': '#2DADD6',
            'blues-1': '#115B98',
            'blues-2': '#4E6297',
            'blues-3': '#3A4A75',
            'reds-1': '#C5331E',
            'reds-2': '#C3573A',
            'reds-3': '#C8191C',
            'reds-4': '#953426',
            'reds-5': '#F81B4D',
            'reds-6': '#E43147',
            'gray-5': '#CBCBCB',
            'gray-6': '#E5E5E5',
            'yellow-3': '#B69665',
            'green-2': '#EBF9F1',
            'green-3' : '#33C172',
            'yellow-4' : '#FEF8E7',
            'green-4' : '#10B981',
            'green-5' : '#00B14F',
            'gray-7' : '#828282',
            'gray-14':'#B0B0B0',
            'blues-4': '#4040A3',
            'gray-15':'#3E3E3E',
            'gray-16':'#505050',
            'gray-17':'#F1F1F1',
            'gray-18':'#929292',
            'gray-19':'#BCBCBC',
            'gray-20':'#F9F9F9',
            'gray-21':' #C5C5C5 ',
            'gray-22':' #BFBFBF ',
            'gray-23':' #EEEEEE  ',
            'gray-24':' #B7B7B7 ',
            'gray-25':'#F0F0F0 ',
            'gray-26':'#EFEFEF ',
            'gray-27':' #BABABA ',
            'blues-5': '#0060A9',
            'blues-6': '#E9F2F9',
            'purple-1': '#9747FF',
            'purple-2': '#F8F2FF',
            },
            screens: {
                "3xl": "1920px",
                'xxs': {'min': '480px', 'max': '640px'},
                'xs': {'min': '360px', 'max': '480px'},
                'x': {'min': '280px', 'max': '360px'},
            },
            scale: {
                minus: "-1",
            },
            zIndex: {
                'ng': -1,
              }
        },
    },
    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },
    plugins: [require("@tailwindcss/forms"),
    require("tw-elements/dist/plugin"),
]
    
};
