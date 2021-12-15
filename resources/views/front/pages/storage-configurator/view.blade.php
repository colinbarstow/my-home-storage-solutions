<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Storage Unit Configurator</title>
    <meta name="viewport" content="user-scalable=0, initial-scale=1, maximum-scale=1, width=device-width">
    <style>
        .dim {
            position: absolute;
            left: 0;
            top: 0;
            font-family: monospace;
            font-size: 12px;
            width: 40px;
            height: 16px;
            text-align: center;
            border: none;
            background: white;
            border-radius: 2px;
            padding: 1px 2px;
        }
    </style>
    <style>
        #fadeMe {
            opacity:    0.5;
            background: #000;
            width:      100%;
            height:     100%;
            z-index:    10;
            top:        0;
            left:       0;
            position:   fixed;
            display:    block;
        }
    </style>
    <style type="text/css">
        .loading-indicator { position: absolute; top: 50%; left: 50%; width: 256px; height: 256px; margin-top: -128px; margin-left: -128px; z-index: 10000; background: url(content/images/controls/spinner.gif) no-repeat; background-size: contain; }
    </style>
    <style>
        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video { margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; }

        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
        body { line-height: 1; }
        ol, ul { list-style: none; }
        table { border-collapse: collapse; border-spacing: 0; }

        /*Border-box across the whole app*/
        *, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }</style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    </style>
    <style>
        html, body { width: 100%; height: 100%; margin: 0; padding: 0; overscroll-behavior: contain; overflow: hidden; font-family: "Open Sans" }
        html, body, *, *:after, *:before { font-family: "Open Sans"; font-size: 14px; }

        h1, h2, h3 { margin-bottom: 20px }
        h1 { font-size: 28px; }
        h2 { font-size: 25px; }
        h3 { font-size: 20px; }
        p { margin-bottom: 20px; line-height: 1.2; }

        .mt-20 {
            margin-top: 20px;
        }

        .link:hover, a:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .disabled-control, .disabled-control * {
            opacity: .5;
            filter: grayscale(1);
            pointer-events: none;
        }

        :root {
            --header: #5d5d5d;
            --headerer: #ccc;
            --color: #444444;
            --colorAlt: #fff;

            --darkest: #233b29;
            --dark: #275934;
            --darker: #468C4B;
            --normal: #78BF45;
            --lighter: #F2DA63;
            --light: #F2EFBD;
            --lightest: rgb(245, 244, 223);

            --warning: #ffa347;

            --buttonsColor: #fff;
            --buttonsActiveColor: #fff;
            --buttonsActiveBackround: #F2DA63;
            --callToActionButtons: #ffa347;
            --accordionColor: #fefefe;
            --accordionBackground: #5d5d5d;
            --accordionColorActive: #fefefe;
            --accordionBackgroundActive: #ccc;

            --editBarBackground: #78BF45;
            --editBarColor: #fff;
            --editBarIconColor: #000;

            --snackbarColor: #444444;
        }

        body { background: linear-gradient(to bottom, #fff,#fff, #d4dcdc); color: var(--color); }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--callToActionButtons);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #666666;
        }

        /*Container for canvas & toolbar*/
        #drag-zone { width: 100%; height: 100%; }

        /*Various generic custom styles*/
        .non-select { -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; }
        .upper-case { text-transform: uppercase; }
        .center { text-align: center;}
        .shadow { box-shadow: 0 0 5px #8f8c8c;}
        .clear { clear: both;}
        .left { float: left;}
        .right { float: right;}
        .bg-warning { background-color: var(--warning); }
        .mb-20 { margin-bottom: 20px ; }
        .justify-content-unset { justify-content: unset !important; }


        /*Make a color image grayscale*/
        .grayscale, .menu-thumb:disabled img {
            -webkit-filter: grayscale(100%);
            filter: gray;
            filter: grayscale(100%);
        }

        .menu-group-btns {
            margin: 0 2px 11px 2px;
            width: 100%;

        }

        .menu-thumb {
            width: 107px; background-color: white; padding: 0;margin: 0 0 10px 0;
            touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            border: none; border-collapse: collapse;
            color:  var(--header);
            font-size: 13px;
        }
        .menu-thumb .upper-case {font-size: 11px;margin-top: 6px;}
        .menu-thumb > div:first-of-type { width: 104px; margin: 0 3px; height: 72px; border: 1px solid var(--light); box-sizing: border-box; }
        .menu-thumb:enabled > div:first-of-type:hover { border: 1px solid var(--darker) }
        .menu-thumb-image { width: 100px;height: 68px;margin: 1px; }
        .menu-thumb.large {
            width: 160px;
        }
        .menu-thumb.large .menu-thumb-image {
            width: 150px;
            height: 100px;
        }
        .menu-thumb.large > div:first-of-type { width: 154px; height: 104px;  }

        .action-bar { width: 100%; margin-top: 5px; }
        .action-button { width: calc(50% - 2px); background-color: var(--callToActionButtons); font-size: 20px; padding: 5px 0; color: var(--colorAlt); border: none; border-collapse: collapse; min-width: 0; }
        .action-button:hover { background-color: var(--headerer); }
        .action-button:last-child { float: right; }

        .edit-bar {
            position: fixed;
            left: 10px;
            width: 100px;
            top: 49%;
            transform: translateY(-50%);
        }
        .edit-bar button {
            margin-top: 5px;
            min-width: 85px;
            width: 85px;
            padding-left: 0;
            padding-right: 0;
            color: var(--editBarColor);
            background-color: var(--editBarBackground);
        }
        .edit-bar svg path {
            fill: var(--editBarIconColor);
        }
        .edit-bar button.act {
            background-color: var(--warning);
        }
        .edit-bar-toggle {
            display: none;
            background-color: var(--warning);
        }
        @media screen and (max-width: 800px) {
            .edit-bar {
                transform: none;
                top: inherit;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                height: 90px;
                background: var(--lighter);
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .edit-bar button {
                margin: 0 1px;
                min-width: 0;
                width: inherit;
            }
            .edit-bar-toggle {
                display: block;

            }
            #drag-zone:not(.exporting) {
                height: calc(100% - 90px);
            }
            .side-bar {
                max-height: calc(100vh - 80px);
            }
        }
        @media (max-width: 1024px), (max-height: 800px), (pointer: coarse) {
            .desktop {
                display: none;
            }
        }
        @media screen and (max-width: 500px) {
            .min500 {
                display: none;
            }
        }
        @media screen and (max-width: 450px) {
            .min450 {
                display: none;
            }
        }
        @media screen and (max-width: 400px) {
            .min400 {
                display: none;
            }
        }

        .resize-info {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--normal);
            color: #fff;
            padding: 7px 7px 4px;
            font-size: 25px;
        }
        @media screen and (max-width: 600px) {
            .resize-info {
                visibility: hidden;
                pointer-events: none;
            }
        }

        .flash {
            background: linear-gradient(to right, white , white, var(--lighter), white, white);
            background-size: 400% 100%;

            -webkit-animation: flash-anim 1s linear 1;
            -moz-animation: flash-anim 1s linear 1;
            -o-animation: flash-anim 1s linear 1;
            animation: flash-anim 1s linear 1;
        }

        .flash-btn {
            background: linear-gradient(to right, var(--normal), var(--warning), var(--warning), var(--normal));
            background-size: 500% 100%;

            -webkit-animation: flash-anim 4s linear 1;
            -moz-animation: flash-anim 4s linear 1;
            -o-animation: flash-anim 4s linear 1;
            animation: flash-anim 4s linear 1;
        }

        @-webkit-keyframes flash-anim {
            0%{background-position:0% 0%}
            50%{background-position:100% 0%}
            100%{background-position:0% 0%}
        }
        @-moz-keyframes flash-anim {
            0%{background-position:0% 0%}
            50%{background-position:100% 0%}
            100%{background-position:0% 0%}
        }
        @-o-keyframes flash-anim {
            0%{background-position:0% 0%}
            50%{background-position:100% 0%}
            100%{background-position:0% 0%}
        }
        @keyframes flash-anim {
            0%{background-position:0% 0%}
            50%{background-position:100% 0%}
            100%{background-position:0% 0%}
        }

        .main-logo {
            position: fixed;
            left: 10px;
            top: 20px;
            max-width: 85px;
            pointer-events: none;
        }

        /*Snack bar info at the bottom*/
        .snackbar {
            color: var(--snackbarColor);
            position: fixed;
            width: 100%;
            z-index: 800;
            background: var(--lighter);
            padding: 16px;
            text-align: center;
            opacity: 0;
            bottom: -30px;
            transition: bottom 0.5s, opacity 0.5s;
            height: 46px;
        }
        .snackbar.show {
            opacity: 1;
            bottom: 0;
        }

        /*Snack bar with a link to click on*/
        .snackbar-button {
            padding: 5px;
        }
        .snackbar-button a, .snackbar-button p {
            display: inline-block;
            margin: 8px;
            font-size: 18px;
        }

        /*Snack bar with size slider inside*/
        .snackbar-slider {
            z-index: 700;
            padding: 5px;
            background-color: var(--light);
        }
        .snackbar-slider > div {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }
        .snackbar-slider > div > div {
            display: flex;
            align-items: center;
            padding-left: 10px;
            background-color: var(--normal);
        }
        .snackbar-slider span {
            display: block;
            color: white;
            white-space: nowrap;
            background-color: var(--normal);
        }
        .snackbar-slider .slider {
            margin: 0 18px 0 18px;
        }
        .snackbar-slider input[type=text]  {
            width: 50px;
            text-align: center;
            padding: 9px 5px;
        }
        .snackbar-slider input[type=text]:focus  {
            outline: none;
            color: var(--color);
        }
        @media (max-width: 640px) {
            .snackbar-slider > div {
                flex-wrap: wrap;
                align-items: stretch;
            }
            .snackbar-slider > div > div {
                width: 100%;
                flex-basis: 100%;
            }
            .snackbar-slider .slider {
                margin: 20px 18px 0 0;
                max-width: calc(100% - 55px);
            }
            .snackbar-slider .close {
                margin-top: 10px;
            }
        }
    </style>
    <style>
        ::placeholder {
            color: #fff;
        }
        button,
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 12px 20px;
            box-sizing: border-box;
            border: none;
            background-color: var(--normal);
            color: var(--buttonsColor);
        }
        button.quiet,
        input.quiet {
            color: var(--color);
            background-color: var(--headerer);
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
        }
        button {
            min-width: 100px;
        }
        button.selected,
        button:active {
            color: var(--buttonsActiveColor) !important;
            background-color: var(--buttonsActiveBackround) !important;
            outline: none;
        }
        @media (pointer: fine) {
            button:hover {
                color: var(--buttonsActiveColor) !important;
                background-color: var(--buttonsActiveBackround) !important;
            }
        }
        button:active,
        button:focus {
            outline: none;
        }
        button.sm {
            padding: 6px 10px;
        }
        button.fit {
            width: 100%;
        }
        .button-group {
            display: flex;
            align-items: stretch;
        }
        .button-group > button {
            flex-grow: 1;
        }
        .button-group > button:not(:last-child) {
            border-right: 1px solid gray;
        }
        label {
            margin-bottom: 20px;
            display: inline-block;
            width: 100%;
        }
        label > input {
            margin: 3px 0 2px 0;
        }

        /* Customize the label (the container) */
        .checkbox {
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .checkbox:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .checkbox input:checked ~ .checkmark {
            background-color: var(--normal);
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .checkbox .checkmark:after {
            left: 10px;
            top: 4px;
            width: 5px;
            height: 14px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .input-error {
            color: #dc6a57;
            font-size: 13px;
            margin: 2px 0 0 0;
            visibility: hidden;
        }

        button:focus {
            outline: none;
        }
        button:hover {
            cursor: pointer;
        }
        button:disabled {
            cursor: not-allowed;
            background-color: #989898;
        }
        a.disabled {
            cursor: not-allowed;
            color: #989898;
        }

        button.close {
            min-width: 36px;
            font-size: 40px;
            z-index: 100;
            padding: 0px;
            line-height: 36px;
            height: 36px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active  {
            -webkit-box-shadow: 0 0 0 30px var(--normal) inset !important;
        }
        input:-webkit-autofill {
            -webkit-text-fill-color: var(--buttonsColor) !important;
        }
    </style>
    <style>
        /* Main bar on RHS holding the toolbar and other controls */
        .side-bar {
            position: fixed;
            top: 0px;
            right: 0;
            bottom: 0;
            width: 380px;
            padding: 10px;
            pointer-events: none;
            max-height: 100vh;
            overflow-y: overlay;
            overflow-x: hidden;
            transition: width 1s ease, background-color 1s ease, opacity 1s ease;
        }
        .side-bar > div {
            width: 100%;
            pointer-events: all;
        }
        .side-bar.hide {
            width: 0;
            overflow: hidden;
            opacity: 0;
        }
        .toolbar {
            min-width: 250px;
        }

        /* Accordion */
        .accordion {
            background-color: var(--accordionBackground);
            color: var(--accordionColor);
            cursor: pointer;
            padding: 5px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
            margin-top: 6px;
        }
        .accordion:after {
            content: '\02795'; /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: #777;
            float: right;
            margin-left: 5px;
        }
        .active:after {
            content: "\2796"; /* Unicode character for "minus" sign (-) */
        }
        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active, .accordion:hover {
            color: var(--accordionColorActive);
            background-color: var(--accordionBackgroundActive);
        }
        /* Style the accordion panel. Note: hidden by default */
        .accordion-panel {
            padding: 0 15px 0 15px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
        .accordion.active + .accordion-panel {
            padding-top: 15px
        }
        @media screen and (max-width: 640px) {
            .side-bar {
                width: 100%;
                max-width: 100%;
                pointer-events: all;
                background-color: rgba(255, 255, 255, .5);
            }
            .accordion-panel {
                padding: 0 8px;
            }
            .accordion-panel, .accordion-panel > div[data-group] {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
            }
        }</style>
    <style>
        .overlay-dg {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 0;
            overflow: hidden;
            transition: width 0.5s ease-out;
            background: #fff;
            z-index: 100;
        }
        .ovelay-close {
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 100;
        }
        .overlay-info {
            width: 300px;
            float: left;
            background-color: var(--normal);
            color: #fff;
            text-align: center;
        }
        .overlay-info img {
            width: 130px;
            margin: 0 auto 30px auto;
        }
        .overlay-content {
            max-width: 800px;
            overflow-x: hidden;
            margin: 0 auto;
        }
        .overlay-content > div {
            min-width: 500px;
        }
        .overlay-content div.narrow {
            width: 90%;
            max-width: 300px;
            margin: 0 auto;
        }
        .overlay-info, .overlay-content {
            height: 100%;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .overlay-content {
            max-height: 100vh;
        }
        .two-button button:first-child {
            margin-right: 2px;
        }
        @media screen and (max-width: 860px) {
            .overlay-content > div {
                min-width: 300px;
            }
        }
        @media screen and (max-width: 640px) {
            .overlay-info, .overlay-content {
                height: auto;
                width: 100%;
                overflow: scroll;
            }
            .overlay-content > div {
                min-width: 0;
            }
            .overlay-info {
                max-height: 160px;
            }
            .overlay-content {
                max-height: calc(100vh - 160px);
            }
        }
        @media screen and (max-height: 700px) {
            .overlay-info img, .overlay-info svg {
                display: none;
            }
            .overlay-info h3:last-child, .overlay-info p:last-child {
                margin-bottom: 0;
            }
        }
        @media screen and (max-width: 430px) {
            .two-button button {
                min-width: 0;
                width: calc(50% - 1px);
            }
        }</style>
    <style>
        .minus-size, .plus-size {
            width: 50px;
            height: 50px;
            position: fixed;
            top: calc(50% - 10px);
        }
        .minus-size:hover, .plus-size:hover {
            cursor: pointer;
            filter: invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);
        }
        .minus-size {
            left: 20px;
            background: url({{ asset('images/minus.svg') }});
        }
        .plus-size {
            right: 20px;
            background: url({{ asset('images/plus.svg') }});
        }

        /*Sizer +/- buttons in menu*/
        .sizer {
            width: 100%;
            margin-bottom: 10px;
            background-color: var(--lightest);
            text-align: center;
            padding: 5px;
        }
        .sizer > div { height: 30px; width: 30px; cursor: pointer; }
        .sizer > div:hover { filter: hue-rotate(90deg); }
        .sizer > div:first-child { background-image: url({{ asset('images/minus.svg') }}); float: left; }
        .sizer > div:last-child { background-image: url({{ asset('images/plus.svg') }}); float: right; }
        .sizer > span { display: inline-block; height: 30px; line-height: 29px; max-width: calc(100% - 62px); }
        .sizer input {
            text-align: center;
            background-color: #fff;
            padding: 1px 0;
            width: 150px;
            margin-left: 2px;
            color: black;
            max-width: calc(100% - 55px);
            pointer-events: none;
        }
    </style>
    <style>
        .items {
            background-image: url('content/css/items.sprite.png');
            background-repeat: no-repeat;
            display: block;
        }

        .items.R001 {
            width: 100px;
            height: 68px;
            background-position: -5px -5px;
        }
        .items.R002 {
            width: 100px;
            height: 68px;
            background-position: -5px -78px;
        }
        .items.R003 {
            width: 100px;
            height: 68px;
            background-position: -5px -151px;
        }
        .items.R004 {
            width: 100px;
            height: 68px;
            background-position: -5px -224px;
        }
        .items.R009 {
            width: 100px;
            height: 68px;
            background-position: -5px -297px;
        }
        .items.item-1 {
            width: 100px;
            height: 68px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .items.item-2 {
            width: 100px;
            height: 68px;
            background-image: url({{asset('models/chest-of-drawers/image.jpeg')}});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .items.item-3 {
            width: 100px;
            height: 68px;
            background-position: center;
            background-image: url({{asset('models/sideboard/image.jpeg')}});
            background-repeat: no-repeat;
            background-size: cover;
        }
        .items.item-4 {
            width: 100px;
            height: 68px;
            background-position: center;
            background-image: url({{asset('models/cabinet/image.jpeg')}});
            background-repeat: no-repeat;
            background-size: cover;
        }
        .items.FixedWindow-500 {
            width: 100px;
            height: 68px;
            background-position: -5px -662px;
        }
        .items.FixedWindow-800 {
            width: 100px;
            height: 68px;
            background-position: -5px -735px;
        }
        .items.FixedWindow-1200 {
            width: 100px;
            height: 68px;
            background-position: -5px -808px;
        }
        .items.TntWindow-500 {
            width: 100px;
            height: 68px;
            background-position: -5px -881px;
        }
        .items.TntWindow-800 {
            width: 100px;
            height: 68px;
            background-position: -5px -954px;
        }
        .items.BoxWindow-800 {
            width: 100px;
            height: 68px;
            background-position: -5px -1027px;
        }
        .items.RoofWindow {
            width: 100px;
            height: 68px;
            background-position: -5px -1100px;
        }
        .items.TopOpenWindow {
            width: 100px;
            height: 68px;
            background-position: -5px -1173px;
        }
        .items.SunPipe {
            width: 100px;
            height: 68px;
            background-position: -5px -1246px;
        }
        .items.Partition {
            width: 150px;
            height: 100px;
            background-position: -5px -1319px;
        }
        .items.AwningWindowHorizontal-1200x400 {
            width: 100px;
            height: 68px;
            background-position: -5px -1424px;
        }
        .items.AwningWindowHorizontal-1500x400 {
            width: 100px;
            height: 68px;
            background-position: -5px -1497px;
        }
        .items.AwningWindowHorizontal-1800x500 {
            width: 100px;
            height: 68px;
            background-position: -5px -1570px;
        }
        .items.AwningWindowVertical-500x1200 {
            width: 100px;
            height: 68px;
            background-position: -5px -1643px;
        }
        .items.AwningWindowVertical-500x1800 {
            width: 100px;
            height: 68px;
            background-position: -5px -1716px;
        }
        .items.BathroomWindow-500x600 {
            width: 100px;
            height: 68px;
            background-position: -5px -1789px;
        }
        .items.SingleDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -1862px;
        }
        .items.DoubleDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -1935px;
        }
        .items.SlidingDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -2008px;
        }
        .items.SlidingDoor3 {
            width: 100px;
            height: 68px;
            background-position: -5px -2081px;
        }
        .items.SlidingDoor4 {
            width: 100px;
            height: 68px;
            background-position: -5px -2154px;
        }
        .items.FoldingSliding3 {
            width: 100px;
            height: 68px;
            background-position: -5px -2227px;
        }
        .items.FoldingSliding4 {
            width: 100px;
            height: 68px;
            background-position: -5px -2300px;
        }
        .items.FoldingSliding5 {
            width: 100px;
            height: 68px;
            background-position: -5px -2373px;
        }
        .items.StackerDoor-2150 {
            width: 100px;
            height: 68px;
            background-position: -5px -2446px;
        }
        .items.StackerDoor-3000 {
            width: 100px;
            height: 68px;
            background-position: -5px -2519px;
        }
        .items.SingleDoorPanel {
            width: 100px;
            height: 68px;
            background-position: -5px -2592px;
        }
        .items.DoubleDoorPanel {
            width: 100px;
            height: 68px;
            background-position: -5px -2665px;
        }
        .items.PocketDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -2738px;
        }
        .items.CedarDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -2811px;
        }
        .items.InternalDoor {
            width: 100px;
            height: 68px;
            background-position: -5px -2884px;
        }
        .items.InternalBifold2 {
            width: 100px;
            height: 68px;
            background-position: -5px -2957px;
        }
        .items.InternalBifold3 {
            width: 100px;
            height: 68px;
            background-position: -5px -3030px;
        }
        .items.InternalBifold4 {
            width: 100px;
            height: 68px;
            background-position: -5px -3103px;
        }
        .items.Blinds {
            width: 100px;
            height: 68px;
            background-position: -5px -3176px;
        }
    </style>
    <style>
        .context-menu {
            position: fixed;
            transform: translate(-50%, -50%);
        }

        .context-menu:after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            top: -100px;
            left: -100px;
            border-radius: 50%;
            border: 5px solid rgba(0,0,0,.25);
        }

        .context-menu-item {
            line-height: 36px;
            box-sizing: border-box;
            height: 36px;
            box-shadow: 0 0 11px 2px rgba(0,0,0,.34);
            position: absolute;
            background-color: #fff;
            display: block;
            transform: translate(-50%,-50%);
            border-radius: 20px;
            opacity: 0;
            transition: opacity .1s ease-in;
            cursor: pointer;
            padding: 0 8px 0 6px;
            z-index: 1;
        }

        .context-menu-item div {
            display: flex;
            flex-direction: row;
            align-items: center;
            white-space: nowrap;
        }

        .context-menu-item div svg {
            margin-right: 3px;
        }

        .context-menu-item:hover {
            padding-top: 1px;
            min-height: 38px;
            transition: opacity .5s ease-in;
            background-color: var(--lighter);
        }</style>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.2); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        @media screen and (max-width: 400px) {
            .modal-content {
                width: 100%;
            }
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
        }

        .modal-header h2 {
            margin: 10px 0;
        }

        .modal-body {padding: 16px 16px;}

        .modal-footer {
            padding: 10px 16px;
        }</style>
    <style>
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 10px;
            background: var(--normal);
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }</style>
    <style>
        .ruler {
            background-color: var(--warning);
            position: fixed;
            min-width: 100px;
            min-height: 36px;
            padding: 10px 20px;
            font-size: 20px;
            color: white;
            display: none;
            text-align: center;
        }</style>
    <style>
        #alertBox {
            background-color: #fff;
            border-radius: 5px;
            position: fixed;
            width: 300px;
            left: 50%;
            top:50%;
            z-index: 50;
            padding:10px;
            margin-top: -105px;
            margin-left: -150px;
        }
        .alert-content {
            text-align: center;
        }
    </style>

    <body class="non-select">
    <div id="fadeMe" style="display:none"></div>
    <div id="alertBox" style="display:none">
        <div id="step1Intro">
            <div class="alert-content">
                <p>Welcome to the My Home Storage Solutions, Storage configurator. Click continue to begin a brief tutorial</p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="step1ButtonIntro">Continue</button>
            </div>
        </div>
        <div id="step2Intro" style="display: none">
            <div class="alert-content">
                <p>
                    The menu located on the right hand side has multiple options that allow you to design your storage unit with ease.
                    <br>
                    First of all you need to select the base of your storage unit. You can do this by selecting one of the models under the unit type option.
                </p>
            </div>
        </div>
        <div id="step3Intro" style="display: none">
            <div class="alert-content">
                <p>Now that your base model has been loaded, lets define the dimensions of the unit.
                    <br>
                    You can do this by either using the right hand menu, using the plus and minus symbols or you can
                    click and drag the edges of the unit to your desired length.</p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="step3ButtonIntro">Continue</button>
            </div>
        </div>
        <div id="step4Intro" style="display: none">
            <div class="alert-content">
                <p>
                    When you define the dimensions of the unit, partitions are added automatically at certain break points.
                    <br>
                    Over certain widths the unit must contain certain partitions however once defined you can manually adjust the positioning of your partitions.
                    To do this, simply click and drag the partition into the position you wish it to be.
                </p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="step4ButtonIntro">Continue</button>
            </div>
        </div>
        <div id="step5Intro" style="display: none">
            <div class="alert-content">
                <p>
                    Now we have our dimensions and partitions set we can choose the doors we would like for our unit.
                    from the right hand panel, click on the doors you like.
                </p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="step5ButtonIntro">Continue</button>
            </div>
        </div>
        <div id="step6Intro" style="display: none">
            <div class="alert-content">
                <p>
                    With the base of our unit complete, we can now choose the components to fill it with.
                    from the right hand menu drag an item to the unit, the unit will highlight the areas it can be dropped in.
                    let go to place the component.
                </p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="step6ButtonIntro">Continue</button>
            </div>
        </div>
        <div id="step7Intro" style="display: none">
            <div class="alert-content">
                <p>
                    The finishing touches.
                    from this panel you can select a finish for the unit, this will apply the finish to the whole storage unit.
                    if you wish to apply finishes to individual elements you can click the element and select finish from the pop out menu.
                </p>
            </div>
            <div class="alert-content">
                <button class="btn btn-primary" id="completeIntroButton">Complete tutorial</button>
            </div>
        </div>
    </div>
    <div id="loading-indicator" class="loading-indicator" style="display: none;"></div>
    <div id="drag-zone" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <canvas width="2880" height="820" id="canvas-3d" style="display: block; width: 1440px; height: 410px; cursor: auto;"></canvas>
        @include('front.pages.storage-configurator.components.side-bar')
        <div class="ruler">Select first point</div>
        <div class="logo"></div>
    </div>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=Promise,NodeList.prototype.forEach,Array.prototype.includes,Array.from,Array.prototype.find,Array.prototype.some,Array.prototype.every,Object.assign,Object.entries,Object.values,fetch,String.prototype.includes,Element.prototype.remove,String.prototype.startsWith"></script>
    <div id="snackbar" class="snackbar">Some info</div>
    <div class="minus-size" style="display: none;"></div>
    <div class="plus-size" style="display: none;"></div>
    <div id="resize-info" class="resize-info" style="display: none;"></div>
    <div>
        <div class="context-menu" id="context-menu" style="display:none">
            <div class="context-menu-item" id="contextMenuFinishButton" title="Choose finish" style="transition-delay: 0s; left: -100px; top: 1.22465e-14px; opacity: 1;">
                <div>
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="#6F6F6F" d="M17.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,9A1.5,1.5 0 0,1 19,10.5A1.5,1.5 0 0,1 17.5,12M14.5,8A1.5,1.5 0 0,1 13,6.5A1.5,1.5 0 0,1 14.5,5A1.5,1.5 0 0,1 16,6.5A1.5,1.5 0 0,1 14.5,8M9.5,8A1.5,1.5 0 0,1 8,6.5A1.5,1.5 0 0,1 9.5,5A1.5,1.5 0 0,1 11,6.5A1.5,1.5 0 0,1 9.5,8M6.5,12A1.5,1.5 0 0,1 5,10.5A1.5,1.5 0 0,1 6.5,9A1.5,1.5 0 0,1 8,10.5A1.5,1.5 0 0,1 6.5,12M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A1.5,1.5 0 0,0 13.5,19.5C13.5,19.11 13.35,18.76 13.11,18.5C12.88,18.23 12.73,17.88 12.73,17.5A1.5,1.5 0 0,1 14.23,16H16A5,5 0 0,0 21,11C21,6.58 16.97,3 12,3Z"></path>
                    </svg>
                    <span>Finish</span>
                </div>
            </div>
            <div class="context-menu-item" id="contextMenuCloseButton" title="Close" style="transition-delay: 0.02s; left: 50px; top: -86.6025px; opacity: 1;">
                <div>
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="#6F6F6F" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z"></path>
                    </svg>
                    <span>Cancel</span>
                </div>
            </div>
        </div>
    </div>
    <div class="edit-bar">
    <button class="edit-bar-toggle" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M7.47,21.5C4.2,19.94 1.86,16.76 1.5,13H0C0.5,19.16 5.66,24 11.95,24L12.61,23.97L8.8,20.16L7.47,21.5M8.36,14.96C8.17,14.96 8,14.93 7.84,14.88C7.68,14.82 7.55,14.75 7.44,14.64C7.33,14.54 7.24,14.42 7.18,14.27C7.12,14.13 7.09,13.97 7.09,13.8H5.79C5.79,14.16 5.86,14.5 6,14.75C6.14,15 6.33,15.25 6.56,15.44C6.8,15.62 7.07,15.76 7.38,15.85C7.68,15.95 8,16 8.34,16C8.71,16 9.06,15.95 9.37,15.85C9.69,15.75 9.97,15.6 10.2,15.41C10.43,15.22 10.62,15 10.75,14.69C10.88,14.4 10.95,14.08 10.95,13.72C10.95,13.53 10.93,13.34 10.88,13.16C10.83,13 10.76,12.81 10.65,12.65C10.55,12.5 10.41,12.35 10.25,12.22C10.08,12.09 9.88,12 9.64,11.91C9.84,11.82 10,11.71 10.16,11.58C10.31,11.45 10.43,11.31 10.53,11.16C10.63,11 10.7,10.86 10.75,10.7C10.8,10.54 10.82,10.38 10.82,10.22C10.82,9.86 10.76,9.54 10.64,9.26C10.5,9 10.35,8.75 10.13,8.57C9.93,8.38 9.66,8.24 9.36,8.14C9.05,8.05 8.71,8 8.34,8C8,8 7.65,8.05 7.34,8.16C7.04,8.27 6.77,8.42 6.55,8.61C6.34,8.8 6.17,9 6.04,9.28C5.92,9.54 5.86,9.82 5.86,10.13H7.16C7.16,9.96 7.19,9.81 7.25,9.68C7.31,9.55 7.39,9.43 7.5,9.34C7.61,9.25 7.73,9.17 7.88,9.12C8.03,9.07 8.18,9.04 8.36,9.04C8.76,9.04 9.06,9.14 9.25,9.35C9.44,9.55 9.54,9.84 9.54,10.21C9.54,10.39 9.5,10.55 9.46,10.7C9.41,10.85 9.32,10.97 9.21,11.07C9.1,11.17 8.96,11.25 8.8,11.31C8.64,11.37 8.44,11.4 8.22,11.4H7.45V12.43H8.22C8.44,12.43 8.64,12.45 8.82,12.5C9,12.55 9.15,12.63 9.27,12.73C9.39,12.84 9.5,12.97 9.56,13.13C9.63,13.29 9.66,13.5 9.66,13.7C9.66,14.11 9.54,14.42 9.31,14.63C9.08,14.86 8.76,14.96 8.36,14.96M16.91,9.04C16.59,8.71 16.21,8.45 15.77,8.27C15.34,8.09 14.85,8 14.31,8H11.95V16H14.25C14.8,16 15.31,15.91 15.76,15.73C16.21,15.55 16.6,15.3 16.92,14.97C17.24,14.64 17.5,14.24 17.66,13.78C17.83,13.31 17.92,12.79 17.92,12.21V11.81C17.92,11.23 17.83,10.71 17.66,10.24C17.5,9.77 17.23,9.37 16.91,9.04M16.5,12.2C16.5,12.62 16.47,13 16.38,13.33C16.28,13.66 16.14,13.95 15.95,14.18C15.76,14.41 15.5,14.59 15.24,14.71C14.95,14.83 14.62,14.89 14.25,14.89H13.34V9.12H14.31C15.03,9.12 15.58,9.35 15.95,9.81C16.33,10.27 16.5,10.93 16.5,11.8M11.95,0L11.29,0.03L15.1,3.84L16.43,2.5C19.7,4.06 22.04,7.23 22.39,11H23.89C23.39,4.84 18.24,0 11.95,0Z"></path>
        </svg>
        <div>Drawing</div>
    </button>
    <button class="edit-bar-toggle" style="display: none;">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M9,5V9H21V5M9,19H21V15H9M9,14H21V10H9M4,9H8V5H4M4,19H8V15H4M4,14H8V10H4V14Z"></path>
        </svg>
        <div>Options</div>
    </button>
    <button class="min400" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M15 21H17V19H15M19 9H21V7H19M3 5V19C3 20.1 3.9 21 5 21H9V19H5V5H9V3H5C3.9 3 3 3.9 3 5M19 3V5H21C21 3.9 20.1 3 19 3M11 23H13V1H11M19 17H21V15H19M15 5H17V3H15M19 13H21V11H19M19 21C20.1 21 21 20.1 21 19H19Z"></path>
        </svg>
        <div>Flip</div>
    </button>
    <button class="undefined" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M13.5,7A6.5,6.5 0 0,1 20,13.5A6.5,6.5 0 0,1 13.5,20H10V18H13.5C16,18 18,16 18,13.5C18,11 16,9 13.5,9H7.83L10.91,12.09L9.5,13.5L4,8L9.5,2.5L10.92,3.91L7.83,7H13.5M6,18H8V20H6V18Z"></path>
        </svg>
        <div>Undo</div>
    </button>
    <button class="min450" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M10.5,7A6.5,6.5 0 0,0 4,13.5A6.5,6.5 0 0,0 10.5,20H14V18H10.5C8,18 6,16 6,13.5C6,11 8,9 10.5,9H16.17L13.09,12.09L14.5,13.5L20,8L14.5,2.5L13.08,3.91L16.17,7H10.5M18,18H16V20H18V18Z"></path>
        </svg>
        <div>Redo</div>
    </button>
    <button class="min500" style="display: none;">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M20 19.88V22L18.2 20.83L13.41 11.83A4.94 4.94 0 0 0 15.19 10.83M15 7A3 3 0 0 1 12 10A3.27 3.27 0 0 1 11.56 10L5.8 20.83L4 22V19.88L9.79 9A3 3 0 0 1 12 4V2A1 1 0 0 1 13 3V4.18A3 3 0 0 1 15 7M13 7A1 1 0 1 0 12 8A1 1 0 0 0 13 7M4.22 10L6 11.8L4.56 14.56L2.1 12.1M12 17.76L10.5 16.25L9 19L12 22L15 19L13.53 16.23M19.78 10L18 11.8L19.5 14.56L21.9 12.1Z"></path>
        </svg>
        <div>Metric</div>
    </button>
    <button class="min500" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M1.39,18.36L3.16,16.6L4.58,18L5.64,16.95L4.22,15.54L5.64,14.12L8.11,16.6L9.17,15.54L6.7,13.06L8.11,11.65L9.53,13.06L10.59,12L9.17,10.59L10.59,9.17L13.06,11.65L14.12,10.59L11.65,8.11L13.06,6.7L14.47,8.11L15.54,7.05L14.12,5.64L15.54,4.22L18,6.7L19.07,5.64L16.6,3.16L18.36,1.39L22.61,5.64L5.64,22.61L1.39,18.36Z"></path>
        </svg>
        <div>Imperial</div>
    </button>
    <button class="desktop" style="">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#000000" d="M9,5A7,7 0 0,1 16,12H17V15H16V19H9A7,7 0 0,1 2,12A7,7 0 0,1 9,5M9,8A4,4 0 0,0 5,12A4,4 0 0,0 9,16A4,4 0 0,0 13,12A4,4 0 0,0 9,8M17,17H22V19L22,21H20V19H17V17Z"></path>
        </svg>
        <div>Ruler</div>
    </button>
    <button class="undefined" id="resetCameraButton">
        <i class="fa fa-camera"></i>
        <div>Reset Camera</div>
    </button>
</div>
    <div class="overlay-dg">
    <button type="button" class="ovelay-close close" data-action="cancel">×</button>
    <div class="overlay-info">
        <img src="content/images/controls/download.svg">
        <h3>Save and export your drawing</h3>
        <p>Please enter your email and choose a password so that you can access your drawing later.</p>
        <p>Download link for your free drawing will be sent to you by email.</p>
    </div>
    <div class="overlay-content">
        <div>
            <h2>Your free drawing will be sent to you by email</h2>
            <form name="saveDgForm" novalidate="">
                <label>
                    Email
                    <input type="email" name="email" placeholder="Email" autocomplete="email" required="">
                    <p class="input-error">Please enter your email</p>
                </label>
                <label>
                    Password
                    <input type="password" name="password" placeholder="Password" autocomplete="current-password" required="">
                    <p class="input-error">Please enter your password</p>
                </label>
                <div class="two-button">
                    <button type="submit" data-action="save">Save</button>
                    <button type="button" data-action="cancel">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div id="footer" style="display:none; justify-content: center; position: fixed; bottom: 0; left: 0; height: 70px; width:100%; background-color: rgba(0, 175, 240, 0.3)">
        <div id="errorBlock" style="display: none; text-align: center"></div>
        <div id="positionSlider" style="display: none; text-align: center">
            <div class="sliderValue">
                <span id="sliderValue"></span>
            </div>
            <div class="widthSliderValue" style="margin-top: 10px">
                <span id="sliderValueLabel"></span>
            </div>
            <div class="field">
                <div class="value left" id="minimumWidthLabel"></div>
                <input id="sliderInput" type="range" min="" max="" value="" steps="">
                <div class="value right" id="maximumWidthLabel"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/cookie-cutter.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="{{ asset('js/storage-configurator-dom.js') }}"></script>
    <script type="module" src="{{ asset('js/storage-configurator.js') }}"></script>
</body>
</html>

