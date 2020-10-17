<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],
        /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img+div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>
        .primary {
            background: #0d0cb5;
        }

        .bg_white {
            background: #ffffff;
        }

        .bg_light {
            background: #fafafa;
        }

        .bg_black {
            background: #000000;
        }

        .bg_dark {
            background: rgba(0, 0, 0, .8);
        }

        .email-section {
            padding: 2.5em;
        }

        /*BUTTON*/
        .btn {
            padding: 5px 15px;
            display: inline-block;
        }

        .btn.btn-primary {
            border-radius: 5px;
            background: #0d0cb5;
            color: #ffffff;
        }

        .btn.btn-white {
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }

        .btn.btn-white-outline {
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
            color: #000000;
            margin-top: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0, 0, 0, .4);
        }

        a {
            color: #0d0cb5;
        }

        table {}

        /*LOGO*/

        .logo h1 {
            margin: 0;
        }

        .logo h1 a {
            color: #000000;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
        }

        .navigation {
            padding: 0;
        }

        .navigation li {
            list-style: none;
            display: inline-block;
            ;
            margin-left: 5px;
            font-size: 13px;
            font-weight: 500;
        }

        .navigation li a {
            color: rgba(0, 0, 0, .4);
        }

        /*HERO*/
        .hero {
            position: relative;
            z-index: 0;
        }

        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            width: 100%;
            background: #000000;
            z-index: -1;
            opacity: .3;
        }

        .hero .icon {}

        .hero .icon a {
            display: block;
            width: 60px;
            margin: 0 auto;
        }

        .hero .text {
            color: rgba(255, 255, 255, .8);
        }

        .hero .text h2 {
            color: #ffffff;
            font-size: 30px;
            margin-bottom: 0;
        }


        /*HEADING SECTION*/
        .heading-section {}

        .heading-section h2 {
            color: #000000;
            font-size: 20px;
            margin-top: 0;
            line-height: 1.4;
            font-weight: 700;
            text-transform: uppercase;
        }

        .heading-section .subheading {
            margin-bottom: 20px !important;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(0, 0, 0, .4);
            position: relative;
        }

        .heading-section .subheading::after {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -10px;
            content: '';
            width: 100%;
            height: 2px;
            background: #0d0cb5;
            margin: 0 auto;
        }

        .heading-section-white {
            color: rgba(255, 255, 255, .8);
        }

        .heading-section-white h2 {
            font-family:
                line-height: 1;
            padding-bottom: 0;
        }

        .heading-section-white h2 {
            color: #ffffff;
        }

        .heading-section-white .subheading {
            margin-bottom: 0;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, .4);
        }


        .icon {
            text-align: center;
        }

        .icon img {}


        /*SERVICES*/
        .services {
            background: rgba(0, 0, 0, .03);
        }

        .text-services {
            padding: 10px 10px 0;
            text-align: center;
        }

        .text-services h3 {
            font-size: 16px;
            font-weight: 600;
        }

        .services-list {
            padding: 0;
            margin: 0 0 20px 0;
            width: 100%;
            float: left;
        }

        .services-list img {
            float: left;
        }

        .services-list .text {
            width: calc(100% - 60px);
            float: right;
        }

        .services-list h3 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .services-list p {
            margin: 0;
        }

        /*BLOG*/
        .text-services .meta {
            text-transform: uppercase;
            font-size: 14px;
        }

        /*TESTIMONY*/
        .text-testimony .name {
            margin: 0;
        }

        .text-testimony .position {
            color: rgba(0, 0, 0, .3);

        }


        /*VIDEO*/
        .img {
            width: 100%;
            height: auto;
            position: relative;
        }

        .img .icon {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            margin-top: -25px;
        }

        .img .icon a {
            display: block;
            width: 60px;
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -25px;
        }



        /*COUNTER*/
        .counter {
            width: 100%;
            position: relative;
            z-index: 0;
        }

        .counter .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            width: 100%;
            background: #000000;
            z-index: -1;
            opacity: .3;
        }

        .counter-text {
            text-align: center;
        }

        .counter-text .num {
            display: block;
            color: #ffffff;
            font-size: 34px;
            font-weight: 700;
        }

        .counter-text .name {
            display: block;
            color: rgba(255, 255, 255, .9);
            font-size: 13px;
        }


        /*FOOTER*/

        .footer {
            color: rgba(255, 255, 255, .5);

        }

        .footer .heading {
            color: #ffffff;
            font-size: 20px;
        }

        .footer ul {
            margin: 0;
            padding: 0;
        }

        .footer ul li {
            list-style: none;
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: rgba(255, 255, 255, 1);
        }


        @media screen and (max-width: 500px) {

            .icon {
                text-align: left;
            }

            .text-services {
                padding-left: 0;
                padding-right: 20px;
                text-align: left;
            }

        }

    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
    <center style="width: 100%; background-color: #f1f1f1;">
        <div
            style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <!-- BEGIN BODY -->
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td width="40%" class="logo" style="text-align: left;">
                                    <svg width="116" height="50" viewBox="0 0 116 50" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g clip-path="url(#clip0)">
                                            <path
                                                d="M62.0053 20.6962C59.9003 18.9151 56.8442 18.9151 54.2464 21.2238V21.0239C54.2464 20.6259 54.0873 20.2441 53.8041 19.9626C53.521 19.6811 53.1369 19.523 52.7365 19.523C52.336 19.523 51.952 19.6811 51.6688 19.9626C51.3856 20.2441 51.2266 20.6259 51.2266 21.0239V41.5994C51.2266 41.9975 51.3856 42.3792 51.6688 42.6607C51.952 42.9422 52.336 43.1003 52.7365 43.1003C53.1369 43.1003 53.521 42.9422 53.8041 42.6607C54.0873 42.3792 54.2464 41.9975 54.2464 41.5994V35.1058C56.3134 36.5805 58.9673 36.6329 60.6157 35.7612C65.3366 33.2673 66.3801 24.3535 62.0053 20.6962ZM54.2464 32.2858V23.8439C56.6613 20.3505 61.786 22.1889 61.786 27.919C61.786 33.3591 56.9909 34.8321 54.2464 32.2858Z"
                                                fill="#464645" />
                                            <path
                                                d="M108.437 19.5146C104.538 19.5146 101.375 23.3391 101.375 28.0647C101.375 32.7903 104.542 36.5967 108.44 36.5967C112.339 36.5967 115.528 32.7772 115.528 28.0647C115.528 23.3522 112.353 19.5146 108.437 19.5146ZM108.437 33.9586C106.223 33.9586 104.43 31.3205 104.43 28.0598C104.43 24.799 106.223 22.1462 108.437 22.1462C110.651 22.1462 112.464 24.7843 112.464 28.0598C112.464 31.3353 110.651 33.9586 108.437 33.9586Z"
                                                fill="#464645" />
                                            <path
                                                d="M68.8511 19.5147C68.6515 19.514 68.4537 19.5526 68.2691 19.6282C68.0845 19.7038 67.9168 19.8149 67.7756 19.9551C67.6343 20.0954 67.5224 20.262 67.4461 20.4454C67.3699 20.6288 67.3309 20.8253 67.3313 21.0238V35.0876C67.3313 35.2847 67.3704 35.4799 67.4462 35.662C67.5221 35.8441 67.6333 36.0095 67.7735 36.1489C67.9138 36.2883 68.0802 36.3988 68.2634 36.4743C68.4466 36.5497 68.6429 36.5885 68.8412 36.5885C69.0395 36.5885 69.2358 36.5497 69.419 36.4743C69.6022 36.3988 69.7687 36.2883 69.9089 36.1489C70.0491 36.0095 70.1603 35.8441 70.2362 35.662C70.3121 35.4799 70.3511 35.2847 70.3511 35.0876V21.0238C70.3533 20.626 70.1966 20.2436 69.9153 19.9606C69.634 19.6777 69.2513 19.5173 68.8511 19.5147Z"
                                                fill="#464645" />
                                            <path
                                                d="M91.2343 19.5147C90.834 19.5173 90.4511 19.6776 90.1696 19.9605C89.888 20.2434 89.7309 20.6258 89.7327 21.0238V35.0876C89.7327 35.4857 89.8918 35.8674 90.1749 36.1489C90.4581 36.4304 90.8421 36.5885 91.2426 36.5885C91.6431 36.5885 92.0271 36.4304 92.3103 36.1489C92.5934 35.8674 92.7525 35.4857 92.7525 35.0876V21.0238C92.7529 20.8255 92.714 20.629 92.6378 20.4457C92.5617 20.2625 92.4499 20.0959 92.3088 19.9557C92.1678 19.8155 92.0002 19.7043 91.8158 19.6286C91.6315 19.553 91.4338 19.5142 91.2343 19.5147Z"
                                                fill="#464645" />
                                            <path
                                                d="M79.9594 32.9416C83.8578 32.9416 87.0244 29.9758 87.0244 26.3005C87.016 25.3177 86.7846 24.3494 86.3473 23.4679C85.9101 22.5864 85.2783 21.8144 84.4991 21.2094L85.4881 19.3726C85.5744 19.214 85.6282 19.04 85.6464 18.8606C85.6646 18.6812 85.6468 18.5 85.594 18.3275C85.5413 18.155 85.4547 17.9946 85.3391 17.8556C85.2236 17.7166 85.0815 17.6018 84.921 17.5177C84.5968 17.3535 84.2212 17.3205 83.873 17.4256C83.5248 17.5307 83.2311 17.7657 83.0534 18.0814L82.0644 19.9543C81.3815 19.7504 80.6724 19.6466 79.9594 19.6462C76.061 19.6462 72.9126 22.6284 72.9126 26.3037C72.9126 28.6879 74.2494 30.7787 76.244 31.9437C75.9537 32.6399 75.8225 33.3915 75.8599 34.1443C75.8936 34.6622 76.0434 35.1661 76.2984 35.619C76.5686 36.0941 76.9605 36.4898 77.4341 36.766C78.1478 37.1855 79.0825 37.4034 80.2693 37.3313L80.3254 37.3116C81.8616 37.1478 82.8144 37.5476 83.2166 38.1489C83.3733 38.3593 83.4566 38.6147 83.454 38.8765C83.4708 39.1829 83.3944 39.4872 83.2347 39.7498C82.7946 40.5691 81.6968 41.2409 79.9034 41.2409C77.8907 41.2409 76.6824 39.9858 75.639 38.4226C75.5383 38.2718 75.4086 38.1422 75.2574 38.0413C75.1063 37.9404 74.9366 37.8702 74.758 37.8345C74.5795 37.7989 74.3956 37.7987 74.217 37.8338C74.0384 37.8689 73.8685 37.9387 73.717 38.0391C73.5639 38.1381 73.4322 38.2664 73.3297 38.4167C73.2272 38.5669 73.156 38.736 73.1202 38.914C73.0844 39.092 73.0848 39.2754 73.1214 39.4532C73.1579 39.6311 73.2298 39.7999 73.3329 39.9497C74.9071 42.3338 76.9017 44.0068 79.9034 44.0068C82.849 44.0068 84.7892 42.6959 85.6859 41.077C86.0609 40.3784 86.2499 39.5961 86.2348 38.8044C86.2175 38.0113 85.9696 37.2402 85.521 36.5841C84.5699 35.2208 82.7567 34.2901 80.0814 34.5654C79.4979 34.6014 79.0924 34.5293 78.8567 34.4015C78.7825 34.3475 78.7281 34.3114 78.7099 34.2557C78.6641 34.1656 78.6387 34.0666 78.6358 33.9657C78.6272 33.5877 78.7091 33.2131 78.8748 32.8727C79.234 32.9233 79.5966 32.9463 79.9594 32.9416ZM75.878 26.3005C75.878 24.1703 77.7077 22.4433 79.9594 22.4433C82.2111 22.4433 84.0408 24.172 84.0408 26.3005C84.0408 28.429 82.2276 30.1396 79.9594 30.1396C77.6912 30.1396 75.878 28.429 75.878 26.3005Z"
                                                fill="#464645" />
                                            <path
                                                d="M97.5297 19.5147C97.1294 19.5173 96.7464 19.6776 96.4649 19.9605C96.1834 20.2435 96.0263 20.6258 96.028 21.0238V40.4179C96.0267 40.5717 95.9647 40.7189 95.8552 40.8278C95.7457 40.9366 95.5976 40.9983 95.4428 40.9995C94.9121 41.1454 94.6747 39.8902 93.173 40.2884C92.367 40.508 91.912 41.3076 92.5499 42.5627C93.0042 43.1648 93.6374 43.6097 94.36 43.8344C95.0825 44.0591 95.8579 44.0524 96.5763 43.815C97.2948 43.5777 97.92 43.1218 98.3636 42.5119C98.8071 41.9019 99.0465 41.1688 99.0479 40.4162V21.0238C99.0487 20.8254 99.01 20.6287 98.9341 20.4452C98.8581 20.2618 98.7463 20.095 98.6051 19.9547C98.464 19.8144 98.2963 19.7033 98.1117 19.6278C97.9271 19.5522 97.7293 19.5138 97.5297 19.5147Z"
                                                fill="#FF5B00" />
                                            <path
                                                d="M100.366 10.7089L100.99 9.61756C101.053 9.5087 101.095 9.38842 101.112 9.2636C101.129 9.13879 101.121 9.01189 101.088 8.89015C101.056 8.76842 100.999 8.65423 100.923 8.55412C100.846 8.45401 100.75 8.36994 100.64 8.30671C100.418 8.1826 100.156 8.14928 99.9102 8.21383C99.6641 8.27837 99.4528 8.4357 99.3214 8.65245L98.5895 9.92562C98.2404 9.85307 97.8846 9.81683 97.528 9.81747C97.121 9.8208 96.7157 9.86972 96.3197 9.9633L95.8614 9.18006C95.8017 9.06645 95.7194 8.96599 95.6197 8.88468C95.52 8.80338 95.4048 8.7429 95.281 8.70686C95.1572 8.67082 95.0274 8.65996 94.8993 8.67493C94.7712 8.68991 94.6475 8.7304 94.5355 8.79401C94.4235 8.85761 94.3255 8.943 94.2475 9.04509C94.1694 9.14718 94.1129 9.26386 94.0813 9.38816C94.0497 9.51245 94.0436 9.64182 94.0634 9.76851C94.0832 9.89521 94.1285 10.0166 94.1966 10.1255L94.5806 10.799C94.06 11.1825 93.6365 11.6817 93.344 12.2566C93.0516 12.8315 92.8982 13.4663 92.896 14.1105C92.896 16.6028 95.1114 18.3855 97.5263 18.3855C99.9412 18.3855 102.157 16.6028 102.157 14.1105C102.154 13.4425 101.99 12.7849 101.678 12.193C101.367 11.6011 100.917 11.0921 100.366 10.7089ZM97.5296 16.3308C96.2851 16.3308 95.1131 15.4017 95.1131 14.1105C95.1131 12.8193 96.2851 11.8919 97.5296 11.8919C98.7741 11.8919 99.9626 12.8013 99.9626 14.1105C99.9626 15.4197 98.7923 16.3308 97.5296 16.3308Z"
                                                fill="#FF5B00" />
                                            <path
                                                d="M46.5644 7.82585C46.5644 7.82585 46.1837 3.95392 38.1956 7.48994C36.3923 8.28793 33.7846 9.67252 32.0752 11.9894C32.0285 12.0544 31.9861 12.1223 31.9483 12.1926C29.1707 11.3406 25.9515 11.2505 22.7173 12.1189C19.5327 12.9726 16.831 14.6193 14.8678 16.697C14.8299 16.6757 14.7952 16.6544 14.7524 16.6348C12.1018 15.4878 9.14789 15.5943 7.18468 15.8057C-1.50722 16.7429 0.123023 20.2789 0.123023 20.2789C0.123023 20.2789 0.919189 22.5287 5.13244 24.0952C9.3457 25.6616 10.3364 24.141 10.3364 24.141C3.18076 22.7597 -0.976446 18.9452 5.61377 20.5264C8.12425 21.1294 10.6446 22.3009 11.6155 22.7778C11.3171 24.2644 11.3662 25.7993 11.7589 27.2642C13.465 33.548 21.1365 36.9563 28.8922 34.8769C36.6478 32.7976 41.5567 26.0156 39.8506 19.7349C39.462 18.3156 38.7591 17.0005 37.7934 15.886C38.2879 15.124 39.9594 12.676 41.9424 10.7884C46.8381 6.12666 45.1765 11.5012 39.6907 16.2727C39.6907 16.2727 41.316 17.0919 44.1644 13.6329C47.0128 10.1739 46.5644 7.82585 46.5644 7.82585Z"
                                                fill="url(#paint0_radial)" />
                                            <path
                                                d="M28.4988 14.9682C26.8003 15.422 25.3232 16.4691 24.3383 17.9176C23.0706 17.3124 21.6548 17.0817 20.2591 17.2529C18.8633 17.424 17.5463 17.9899 16.4646 18.8832C15.3829 19.7766 14.5819 20.9598 14.1568 22.2924C13.7317 23.6249 13.7004 25.0508 14.0666 26.4005C14.4327 27.7502 15.181 28.9671 16.2225 29.9065C17.2639 30.8459 18.5548 31.4684 19.9417 31.7C21.3286 31.9316 22.7532 31.7625 24.0462 31.2129C25.3393 30.6633 26.4465 29.7562 27.2362 28.5995C28.3042 29.1087 29.4802 29.3535 30.664 29.3131C31.8478 29.2727 33.0042 28.9483 34.0345 28.3674C35.0649 27.7866 35.9386 26.9667 36.5811 25.9776C37.2237 24.9884 37.616 23.8595 37.7246 22.687C37.8332 21.5145 37.6549 20.3333 37.2049 19.2442C36.7549 18.155 36.0465 17.1903 35.1402 16.4322C34.2339 15.6741 33.1566 15.1451 32.0001 14.8905C30.8437 14.6359 29.6424 14.6631 28.4988 14.9699V14.9682Z"
                                                fill="white" />
                                            <rect x="15.5344" y="16.457" width="20.4135" height="13.528"
                                                fill="url(#pattern0)" />
                                        </g>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                height="1">
                                                <use xlink:href="#image0" transform="scale(0.00193798 0.00290698)" />
                                            </pattern>
                                            <radialGradient id="paint0_radial" cx="0" cy="0" r="1"
                                                gradientUnits="userSpaceOnUse"
                                                gradientTransform="translate(23.2959 20.7443) scale(19.5267 19.4104)">
                                                <stop offset="0.46" stop-color="#FF5B00" />
                                                <stop offset="1" stop-color="#D84800" />
                                            </radialGradient>
                                            <clipPath id="clip0">
                                                <rect width="115.52" height="38" fill="white"
                                                    transform="translate(0 6)" />
                                            </clipPath>
                                            <image id="image0" width="516" height="344"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgQAAAFYCAYAAAAspuSHAAAACXBIWXMAAC4jAAAuIwF4pT92AAAT5klEQVR4Xu3dSZbbOBZAUTArt2ZpzQ6Pq7bFGthKy0o1bNB8APeek7PICEkBgk+flGNZ1zUBEM/l8q3qBv319WP59DWMaxEEAG3VPvEfIRbGJwgAKurh5L+HUBiHIAAoYLQT/xFioS+CAOAkJ//PxEF8ggDggOv1sto/jxEHMQkCgI1EQH7iIA5BAPCGCKhHHLQlCAAeiID2xEF9ggDgFyEQkzioQxAAUxMBfREH5QgCYDoioE/LsqTb700Y5CcIgGkIgfEIg3wEATA8ITA+YXCeIACGJQTmIwyOEwTAcIQAwmA/QQAMQwjwSBhsJwiAIYgB3hEGnwkCoGs9hsD9x+eoSxi8JgiALvUYAsQhDP5NEABdEQLkJAx+EwRANy6XbzYsshMFP/316QsAorBxU4LQ/MmEAOhW643czYHjmTk6BQEwhNZxwDhmjQJBAAxFGJDLbGHgHgJgKLNt4pQzW1yaEADDmm1Dp4xZIlMQAEMTBeQyehgIAmAKwoAcRo4C9xAAUxh5I6eekcPShACYysgbOnWNFpkmBMBURtvEaWe0uBQEwHREAbmMFAUuGQDTGmkzp73eQ9OEAJhW7xs4sfQemIIAmJooIKeeo0AQAEBGvUaBIACmF2VKsCwhHgYZ9BgFbioE+KXHTZzYosTmFiYEAFBIT5EpCAB+6endHOQmCAAyW5bln/+glymBewgAHvSygdOX6BMoEwIAqCB6aAoCgAfR38nRr8hRIAgAoKKoUSAIAJ4wJaCkiFEgCACggWhRIAgAXvDxQUqLFAWCAOCFdV3/+Q9KiRIFggDgBfcRUEuEKBAEABBA6ygQBACAIACAKFpOCQQBAATSKgoEAcAbbixkFoIAAIJpMSUQBAAQUO0oEAQAEFTNKBAEAIAgAIDIak0JBAEABFcjCv7+9AWM63L5tpb+K263Pwrjo1vw27Is/mAS4SwW5fiu18vLX3Lr379QILoS78wEAUeV3DMFwWCu18s6wu+05KKHPUoEAZxRan90yaBTo5z4X3m1CZc6EABmZ0LQgdFP/meJBEoyISCiEvueIAjo8Zq/39E+JQ4U5rU1CNwXQG259zpBEIhJQH65DxjmsjUGoIXc+5sgaEwE1JP74GF8goDIlmVJ379/ZdvX3FTYgAho435znzUObq/BrM8feE0QVCICYpnxxPju36MA+rOua7peL2uuKYEgKGimCOj1hipTA15xuYAe5Nx33UOQ2UwRMKoRw+DZuhzxeeZ0P1FxTBNdjuPZhCAT49hxzHg5gT/d/s6HEGAmJgQnmQiM6/6E0HMcvFujPT+vklwuoDc5PnHgzx+fIAbGdv+7vVy+rU4Sc/B7pkc5zkUmBAf0GALGn3n18s56y1rt5bnUIgjo2Znj2T0EO2zZXKPq9XFH1ct9Bn7v+4gBZuaSwQbX62W9XL51GwOUE/kEsvVG18jPAdjnzPFsQvBGzxMB6ullWsB7ZzZSGIF7CJ4QApwRJQz2ruMoj7sFMcBojhzPLhnccWmAHCJ8ImFvDCzL4qQIkxMEv+zdQOGTnk6w67pOGwUzPmfGt/UeonsuGdyJtDH4mOBYjozvjjoTt7d1V/PxthTpmIfc9h7HJgR3vr5+LLf/Pn1taUc3dGLq5cRzmxTM4PF3sizLNM+d8S3LsntKYEKwQS+bOX0oGZy51mqOfwY1slyvE0S29zgWBDvYRMilVBScuVzwaNTLB45jZrP1GHbJYIetLyqfzT6ajfBJhE9GvNFwpOdCv2ruf3t+lgnBQTYWcskVmjmnA/dGmRQ4Zomk5o3jW49dE4KDtr7A8En0E1Xvk4Lr9bJer5d1zzslGMnWY9eEIIOtLzZ8cjQ0L5dva8R3HK09+yRBydeo9PdnLDXXy5Zj1oQggy0vNGxxNC5rbiwpHX+ctZgKwG9bjwNBkMktCnyWOY5efw/RT7Y3UW+MvD2mdV2rRlJKc/07DvRjXddN+4pLBpltedFhi62TpyhrbuvjLWHra1BjklLjZzCOmuvl0zEqCArYujnBJ58O4JTKfbrgjC2PO4e9x1qtzbfWz6F/NdfKp+NSEBSyd6OCm2cbxLsDuXUQfNrQPm1Ce505tj491lxq/RzGUHO9vDseBUFBZzYuePTsQK796YJctkbCs2Po7PM9+/9vVevn0L+aa0UQNCQKyOnxYG49HShh6015R593rc231s9hDLXWy7sg8CkD6Ei0wNx68t4q9/drqcbmDnu920MEQWFbR6Ow1e2AjhAHuU56o35cd8TnRN/erUlBUIEoILde7x2Yzbr6dwnYptZaebdnCIKO1Vg8xDVCDFjDUN+r6aIgqKTElGCEEwJzq/Wu6F7tn+k4HUONNVNrbb76GYKgohJRAD2rsfm1NsNzpC+vIlUQAACCAGhjlnfOtcbAlFXr91jr5zwjCCpz2QDm4z4C9qixXp7dWCgIgOpavQNqZbbnyzmt1osgaMCUgFnl3OjOfK+WY1n6VWvd1Po5jwQBUFWLja61Vhs87CEIGrNJ5DPqP38LUIMgaOR22aDGzSOjejz5r+vq9QSKGmna83hjoSCgW07+/TC9gX1ahIcgILTaBwTzqB2ULTZ4yhj1dykICOXZZQD6NuLGeZT1TGSCgKYEwNjEwJ+8HuxRexIhCBry7xEIgFG5Z4DRjbh3CQKKc3KAn2q/46OsEX6X9580+PvdF0IOI5Y0wGhMCMhihFImj5proebPgkc1Jj41fsaNICALUwBSqn+C7nHd9fiYaavWmhEEbFZ7s6cvtddHrU2SdmqvqdkJAjazAROFtQj53G4sFAT8QZFzRM11IwagDJ8y4A82W/YQAszudtPfCOvThAAIb4TNFqITBA09/ulJ6Emt6YAYmFfNj9whCIADam3SYgDqEQTALmJgDLV+jzMYZZLhpkJgsxqbnhCANkwIgI9q/YEqMcCjUd5998CEoBE3FBJd7U1YDEBb2YLger2s67qmr68fdXcR4LTaJ/9HYqC+kT4/H8EIr6NLBh2oNa5lTq3X1ggbKaTU/lg6K0sQXK8XR/QOWy8X3BbXuq42TYZkXbNFL/cR9L6eTwfBfQwsy7L5ZMdr9yEAo7K+IZbTQUA+QuC5Ht4Z9KrVa2uNQzynguDZpQJTgvfevTa9bJK1TyK9vC585vIXxHUqCIC+1Tw51/xZwH6Hg+DdjYSmBM9dLt/W2u+u4Z1a61EMQHyHg4B9boHU+8boc8vsZb2QQy+fNOjZoSDY8jFDUwJADMTmJMu9Q0HgIN9HGPXNhrmfmwehP4eCIKVtB7wpAczn074AxLQ7CB5P8LcweLcJzBwFvT/3+3fH7h8YS4nJh/UB/dodBO88i4PbptP7ifGI3p7zsxOEDZ4tPr0pAOLLGgT37jeIGaMg+nN18t/GVOQzrw+1uAmyrF1//vjISW7GzeLI61TSs5PajL8X8rKGYCzFJgSvRDtZ5tb6+ZV65++dMjcuD8CYNgdBzhNdzu8VSYvn9RgANmpKEQJjMobnZnMQ5Ha5fFtbnEBLqfFcSr37h0+sM6KwFstpFgQ3NU6kpZV6Dt7905qpAMxjUxCUOuHdlP7+JZV87Dbitka+b+LTiFgIwHx2fcqgpOv1sq7rmr6+fnRxMWtPCDw7sew92ez9+pxa/mzq8nuG+dzOu5smBDXcNqI9J9pW9j7GZzft2HiJxERgbn73pLRhQrD35JfD7WdGmxaceS3OHHDeoVOStQWktCEIWooSBltCwASAnlifwKPl3caw5URYU80wePfcP92Q9ejM5tt6OtD657cy6/MG5nM7t4aeEDy6P0mXiINXEbA3AB6ZHgAQXVdBcO/ZyXtvJDz7HmdP/lvc/4x3ceBdKgC1vAyCaJcLttj7mGuc/D/ZGgcAUFK3E4Icnn0csKVolxZMKADGdj9ZnzoIUvp90o0UBjf+dgEAtTwNgr2j9xHcn2gjxsHNq8cmFPIxGQFmNP2E4JnHk0HkQLgxTQDgDEGwQS/Tg0emCQBsJQh26jUO7m2ZJhibA8zlX0Ew4/0DR/V4aeGVnh87AOeF+WuHI1jX9Z//YA9BBtT2+I/5uWRQyAiXFmbkUgkwK0FQQY+XFpwUAeYiCBowPQCgpWd/++ePIHBDYX09Tg8AGI8JQTDPRvUiYXwu0QCtCYIOvDpZlAqFWU9OLW8obPmzAVISBF2rHQqjc0IGZvDs/oGUBMGQzoSCkyLAnATBRLaEgtE1wJz+CQKfMJjX3gB4N2nY+70AqOfV5YKUTAg4wEk/P68p0Jq/ZQAACAJgHFtunAWeEwQQgBNZHi69wGvv7h9I6VcQuKEQAOZmQgAACAIAGN2nywUpCQIAIAkCABja1puWBQEADGzrp28EAQAMbMv9AykJAgAgCQIIYetID2CPrdOBlAQBhLD1ph+AUgQBBGBCAOS2ZzqQkiCAEEwIgNYEAQAMZu90ICVBAAAkQQAAQzkyHUhJEAAASRAAAbipEvI4Oh1ISRAAAfjYJbQnCAAggLOTsjPTgZQEAQCE0HpSJggAoKKzk4BSBAEAVHALgRKTgLOXC1ISBABQVMkQyEkQAEBm95cFSodAjulASoIAYBpRr12PpJdpwDOCAGASPZ6ketEqBHJNB1JK6T//+99/6z564F+8cwP2yhkDKZkQAMAuowa8IACADVpdFngm93QgJUEAAJtECIGUysRASoIAAEgp/VWqNACAvEqes00IAKADJWMgJUEAACRBAJww6sevIJrS04GUBAFwQpS7rmFkNWIgpV9BUOuHAQAxmRAAQFA137ALAgCaci/KczVjICVBAEBj7kWJQRAAQDC1pwMpCQIACKVFDKR0FwStHgAA0J4JAQAE0fLNuSAAgABaxkBKggAAmmsdAykJAgBoKkIMpCQIAKCZKDGQ0kMQRHpgADCyaOdcEwIAqCxaDKQkCACgqogxkJIgAACSIACAaqJOB1ISBABQReQYSOlJEER/wADQmx7OrU8nBMsS/nHDUPw9eBhXDzGQ0osgsDkBR3gzAX/qJQZSehEEPT0BII7v378WUQA/9XYudVMhkJUogP5iICVBABTw/fvX0uOGCDn0uvZfBkGvTwho49meYR9hNj2veRMCCGDkEXvPGyRs9fX1o/upmCCAAEb/ZE/vGyW8M8r6fhsEozxJoKwte8WWr4HejLSuTQiAakYYq8LNaGtZEADVjbaRMpdRw/ZjEIz4pIF8ju4RR/8/aGnkdfsxCABKGXlzZTyjr1dBADQ16viVscywRpetH3e6XL5t+0JgGrk3SfsM0eRe45GZEABhzLT5Et9s61EQAIeU2ixdQiCCGdfg5iCY8cUB2rHn0MLMQbo5CABqm3lzpr7Z19rfn74A4FHtjfP289x0SAm113NUuyYEXjSgJXsQOZlA/cmEANil9QZqWsBZrddwVLsmBCl5IUewLEux/27fH0q734usObZyDntt8z9MdE+Zw5yibqb2JD6JunYjORQEKTkAYUbRN1X7Eo+ir9lIpr2HYFmWdDSGYEY9bKzuL+Cmh/Uaze57CG56f7HXdXXdEQbl7vG5+d0fM+2EANiu1w3WxGAuva7TKA7fQ3DT84HmsgFsM8pG2/N+xWujrM/WTAiAt0babE0MxjHSuozi9IQgpb4PLlMCeG30TbfnvWtGo6/H1kwIgGndn2DEQVxCoI4sE4KU+j2YTAjguZk34V73s5HMvP5aMSEAeGBy0IYIaCvbhCCllK7Xy5rz+9ViSgB/sjH/mzAow1qLI2sQpNTnQSMI4Dcb9Gc97nPRWGfxuGQAsNPjyUwgbCMCYss+IUipv4PDhAB+smHn09s+mJu11J8iQZBSXweDIICfbOLl9LQn7mXdjEEQ/CIKmJ1Nvb7e9smUrJORFQuClPpa7IKA2dno46q5l1oH8yoaBCnVXchnCAJm5iQA/PXpC2YhBpiVGABSqhAENhsAiK94EKTUTxQsSxcPE7Lp5dgEyqsSBEA8YgC4Vy0IbD4AEFe1IEgpfhSs6+qyAVOIfiwC9VUNAqA9MQA8Uz0IbEbQjuMPeKV6EKRkU4IWHHfAO02CICWbE9TkeAM+aRYEKcXcpNxYCMCMmgYBUF7E8AbiaR4ENisox/EFbNU8CFKyaUEJjitgjxBBkFKszct9BPQu0vEE9CFMEKRkE4McHEfAEaGCICWbGQC0EC4IUhIFcJRjBzgqZBCk1H5jcx8BvWl9zAB9CxsEEazr+ulLIAQxAJwVOghscvCZ4wTIIXQQpGSzg3ccH0Au4YMgJZsePOO4AHLqIghSsvnBPccDkNvS441zl8u3/h40ZCIGgBK6mRDcsyEyK2sfKKXLCcGNSQGzEAJAaV1OCG5skszAOgdq6DoIUrJZMjbrG6il+yBIyabJmKxroKYhgiAlmydjsZ6B2rq+qfAVNxvSMzEAtDBkEKQkCuiPEABaGuaSwSObKz2xXoHWhp0Q3DMtIDIxAEQw7ITgng2XqKxNIIopgiAlGy/xWJNAJFNcMnjkEgItCQEgoimDICVRQH1CAIhs2iC4EQbUIAaA6KYPghthQAlCAOiFIHggDMhBCAC9EQRPiAKOEgJArwTBG8KAPcQA0DNBsIEw4B0hAIxAEOwgDLgnBICRCIIDhAFiABiNIDhIFMxJCACjEgQnCYM5CAFgdIIgE2EwJiEAzEIQZCYM+icCgBkJgkKEQV9EADA7QVCJQIhJCAD8JAgaEAdtiQCAfxMEjYmDOkQAwHuCIBBxkJ8QANhGEAQlDo4TAQD7CYIOiIPPRADAOYKgM+LAyR+gBEEwgJEjwckfoA5BMIFegsHJH6AdQUCTYHDyB4jl/xgUkYpFQ8RBAAAAAElFTkSuQmCC" />
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td valign="middle" class="hero bg_white"
                        style="background-image: url(images/bg_1.jpg); background-size: cover; height: 400px;">
                        <div class="overlay"></div>
                        <table>
                            <tr>
                                <td>
                                    <div class="text" style="padding: 0 3em; text-align: center;">
                                        <div>
                                            <a href="#">
                                                <svg width="576" height="266" viewBox="0 0 576 266" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M75.6823 226.272C92.7699 226.272 106.622 223.452 106.622 219.973C106.622 216.495 92.7699 213.675 75.6823 213.675C58.5947 213.675 44.7424 216.495 44.7424 219.973C44.7424 223.452 58.5947 226.272 75.6823 226.272Z"
                                                        fill="#E5E5E5" />
                                                    <path
                                                        d="M298.005 226.642C315.092 226.642 328.944 223.822 328.944 220.344C328.944 216.865 315.092 214.045 298.005 214.045C280.917 214.045 267.065 216.865 267.065 220.344C267.065 223.822 280.917 226.642 298.005 226.642Z"
                                                        fill="#E5E5E5" />
                                                    <path
                                                        d="M363.219 228.865C380.307 228.865 394.159 226.045 394.159 222.566C394.159 219.088 380.307 216.268 363.219 216.268C346.132 216.268 332.279 219.088 332.279 222.566C332.279 226.045 346.132 228.865 363.219 228.865Z"
                                                        fill="#E5E5E5" />
                                                    <path
                                                        d="M500.318 229.606C517.405 229.606 531.258 226.786 531.258 223.307C531.258 219.829 517.405 217.009 500.318 217.009C483.23 217.009 469.378 219.829 469.378 223.307C469.378 226.786 483.23 229.606 500.318 229.606Z"
                                                        fill="#E5E5E5" />
                                                    <path
                                                        d="M141.768 186.349H126.779L118.368 153.725C118.053 152.558 117.534 150.168 116.775 146.519C116.015 142.888 115.589 140.442 115.478 139.183C115.311 140.72 114.885 143.166 114.2 146.556C113.514 149.946 112.995 152.354 112.625 153.799L104.251 186.33H89.2995L73.459 124.232H86.4093L94.3573 158.134C95.7468 164.396 96.7473 169.824 97.3772 174.4C97.5439 172.788 97.933 170.287 98.5444 166.897C99.1558 163.507 99.7301 160.895 100.267 159.023L109.308 124.232H121.759L130.8 159.023C131.189 160.58 131.689 162.951 132.282 166.156C132.875 169.361 133.338 172.103 133.634 174.4C133.912 172.195 134.375 169.435 134.987 166.137C135.617 162.84 136.172 160.172 136.691 158.134L144.584 124.232H157.534L141.768 186.349Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M201.146 186.349H165.389V124.232H201.165V135.014H178.562V148.649H199.59V159.431H178.562V175.437H201.165V186.349H201.146Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M214.115 186.349V124.232H227.288V175.456H252.484V186.33H214.115V186.349Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M289.649 134.311C284.684 134.311 280.849 136.182 278.144 139.906C275.42 143.629 274.068 148.816 274.068 155.467C274.068 169.306 279.255 176.234 289.667 176.234C294.021 176.234 299.301 175.141 305.508 172.955V183.996C300.413 186.127 294.725 187.183 288.426 187.183C279.385 187.183 272.474 184.441 267.695 178.957C262.915 173.474 260.506 165.619 260.506 155.356C260.506 148.89 261.673 143.24 264.026 138.386C266.379 133.533 269.751 129.809 274.16 127.216C278.57 124.622 283.72 123.325 289.649 123.325C295.689 123.325 301.747 124.789 307.824 127.697L303.581 138.405C301.265 137.293 298.931 136.33 296.578 135.515C294.206 134.718 291.909 134.311 289.649 134.311Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M375.076 155.208C375.076 165.489 372.519 173.381 367.425 178.902C362.33 184.422 355.012 187.183 345.507 187.183C336.003 187.183 328.685 184.422 323.59 178.902C318.495 173.381 315.938 165.452 315.938 155.115C315.938 144.778 318.495 136.886 323.609 131.439C328.722 125.993 336.04 123.27 345.6 123.27C355.141 123.27 362.441 126.011 367.499 131.513C372.538 136.997 375.076 144.907 375.076 155.208ZM329.741 155.208C329.741 162.155 331.056 167.379 333.687 170.88C336.318 174.4 340.264 176.141 345.489 176.141C355.994 176.141 361.255 169.157 361.255 155.208C361.255 141.221 356.031 134.218 345.581 134.218C340.338 134.218 336.392 135.978 333.724 139.498C331.075 143.036 329.741 148.261 329.741 155.208Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M414.242 186.349L399.291 137.626H398.902C399.439 147.538 399.717 154.151 399.717 157.467V186.349H387.952V124.232H405.886L420.56 171.732H420.819L436.419 124.251H454.353V186.349H442.069V156.949C442.069 155.559 442.088 153.966 442.125 152.15C442.162 150.335 442.366 145.518 442.699 137.701H442.31L426.303 186.33H414.242V186.349Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M505.746 186.349H469.971V124.232H505.746V135.014H483.143V148.649H504.171V159.431H483.143V175.437H505.746V186.349Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M87.7989 167.101C88.1694 172.511 84.5011 176.679 84.5011 176.679L82.3891 175.234C82.3891 175.234 82.5743 174.937 82.8152 174.419C82.9449 174.159 83.0931 173.826 83.2228 173.455C83.8341 171.862 84.4826 169.435 83.9824 166.971C83.2228 163.229 81.685 160.562 81.3701 160.043C81.1107 156.115 80.8884 152.299 80.8513 151.892C81.6665 152.336 82.6484 153.04 83.5377 154.078C85.4645 156.301 87.4284 161.692 87.7989 167.101Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M75.6452 200.725C77.2756 197.113 78.6466 193.76 78.8504 192.278C79.4247 188.295 77.1089 179.495 77.1089 179.495C77.1089 179.495 75.812 188.257 75.6452 200.725ZM75.7749 210.155C75.8861 213.045 76.0714 216.064 76.3678 219.121C75.7935 219.436 73.1812 219.418 73.1812 219.418C73.1812 219.418 73.1626 219.306 73.1256 219.084C73.0885 218.899 73.0515 218.639 72.9774 218.324C72.8662 217.695 72.6995 216.842 72.5327 215.768C72.5142 215.675 72.4957 215.601 72.4957 215.509C72.2178 213.878 71.8843 211.822 71.5323 209.488C71.0135 206.005 70.4577 201.929 70.0501 197.817C68.957 186.85 68.4753 174.623 68.4753 174.623V174.586C69.939 174.697 73.6629 174.901 74.3484 173.789C75.0338 172.696 75.145 164.73 75.1635 161.47C75.1635 160.71 75.1635 160.191 75.1635 160.099C75.1635 160.191 75.2006 160.673 75.2562 161.377C75.5155 164.489 76.2751 172.233 77.4609 173.845C78.1278 174.771 81.3515 174.567 82.8337 174.419C82.5928 174.938 82.4075 175.234 82.4075 175.234C82.4075 175.234 81.722 175.586 81.0921 176.216C81.7962 176.92 82.9819 177.92 84.2787 178.124L84.2973 177.976C85.7609 186.071 85.7238 191.092 84.4455 194.686C83.5006 197.279 78.9986 204.838 75.7749 210.155Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M84.5012 176.679L84.2974 177.995L84.2789 178.143C82.982 177.939 81.7963 176.939 81.0923 176.235C81.7407 175.605 82.4077 175.253 82.4077 175.253L84.5012 176.679Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M81.3888 160.043C81.5926 163.137 81.8334 166.286 82.0001 167.879C82.2781 170.343 82.8709 172.362 83.2414 173.455C83.0932 173.826 82.945 174.159 82.8339 174.419C81.3517 174.567 78.128 174.752 77.4611 173.844C76.2753 172.233 75.5157 164.489 75.2563 161.377C75.2563 161.377 77.3128 155.708 79.8325 154.078C79.3137 153.503 77.7945 153.022 77.7945 153.022C77.7945 153.022 78.1465 151.947 79.2952 151.206C79.2952 151.206 79.9807 151.391 80.8885 151.91C80.9071 152.299 81.1294 156.115 81.3888 160.043Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M80.1659 142.036C80.6105 141.999 81.0366 142.203 80.8884 143.277C80.6846 144.889 79.8139 144.741 79.4433 144.611C79.4619 144.463 79.4619 144.315 79.4804 144.148C79.4989 143.407 79.4804 142.777 79.4248 142.277C79.536 142.222 79.8509 142.073 80.1659 142.036Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M79.0173 140.35C77.1831 140.998 74.5153 140.869 73.4592 140.461C71.6621 139.757 71.6621 139.757 71.6621 139.757L70.9766 139.053C70.9766 139.053 70.532 140.257 70.2541 141.869L70.1244 141.851C70.1244 141.851 69.9391 141.702 69.6798 141.591C69.6427 141.147 69.4204 138.405 70.4023 137.127C71.4769 135.737 79.7954 134.237 80.7959 137.627C81.1293 138.757 80.6291 139.535 79.7213 140.035C79.499 140.165 79.2581 140.276 79.0173 140.35Z"
                                                        fill="#F34F2F" />
                                                    <path
                                                        d="M76.6829 220.566C76.7014 220.826 76.7199 221.067 76.6643 221.215C76.4791 221.734 73.2183 223.864 71.4212 224.79C71.2915 224.661 71.2174 224.512 71.1433 224.364C71.625 224.068 76.3123 221.196 76.6643 220.585L76.6829 220.566Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M76.683 220.566H76.6644C76.3124 221.177 71.6251 224.049 71.1434 224.345C70.7729 223.493 71.2176 222.363 71.8475 221.585C72.5885 220.677 73.274 220.214 73.1814 219.399C73.1814 219.399 75.7937 219.417 76.368 219.103C76.368 219.121 76.6089 219.918 76.683 220.566Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M79.8323 140.109C79.8323 140.109 80.2769 141.406 80.1843 141.906C80.1843 141.944 80.1657 141.999 80.1657 142.036C79.8508 142.073 79.5358 142.221 79.4247 142.296C79.332 141.128 79.1097 140.554 79.0171 140.369C79.2579 140.276 79.4988 140.183 79.7026 140.072L79.8323 140.109Z"
                                                        fill="#F34F2F" />
                                                    <path
                                                        d="M77.183 150.354C77.183 150.354 78.3131 151.207 79.2765 151.207C78.1093 151.948 77.7758 153.022 77.7758 153.022C77.7758 153.022 79.295 153.504 79.8138 154.078C77.3126 155.708 75.2377 161.377 75.2377 161.377C75.1821 160.673 75.145 160.192 75.145 160.099V160.08C75.4229 156.69 77.183 150.354 77.183 150.354Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M79.4248 142.296C79.4619 142.796 79.4989 143.426 79.4804 144.167C79.4804 144.315 79.4619 144.463 79.4433 144.63C79.3136 145.871 78.8134 147.02 78.0353 147.89C78.0353 147.872 78.0168 147.835 78.0168 147.798C77.8315 147.168 76.8125 146.205 76.8125 146.205C76.8125 146.205 75.8306 147.39 74.5337 147.372C73.2368 147.353 72.3105 145.927 72.3105 145.927C72.3105 145.927 71.2915 146.89 71.0136 147.538L70.9951 147.557C70.3096 146.594 69.9761 145.352 69.9946 144.093C70.0132 143.315 70.1058 142.574 70.217 141.888C70.4949 140.258 70.9395 139.072 70.9395 139.072L71.625 139.776C71.625 139.776 71.625 139.776 73.4221 140.48C74.4781 140.888 77.146 141.017 78.9802 140.369C79.1098 140.536 79.3136 141.129 79.4248 142.296Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M76.5717 149.002C75.9233 149.317 75.1637 149.484 74.367 149.428C73.663 149.373 73.0331 149.187 72.4958 148.891C71.8844 148.557 71.3842 148.094 70.9951 147.538L71.0136 147.52C71.2915 146.872 72.3105 145.908 72.3105 145.908C72.3105 145.908 73.2369 147.335 74.5337 147.353C75.8306 147.372 76.8125 146.186 76.8125 146.186C76.8125 146.186 77.8315 147.149 78.0168 147.779C78.0168 147.816 78.0353 147.835 78.0353 147.872C77.6277 148.354 77.1275 148.743 76.5717 149.002Z"
                                                        fill="#F34F2F" />
                                                    <path
                                                        d="M76.9422 149.966C77.0719 150.188 77.183 150.336 77.183 150.336C77.183 150.336 75.423 156.691 75.1265 160.062C75.1821 158.803 71.9028 150.466 71.9028 150.466C72.014 150.41 72.1252 150.281 72.1993 150.096C72.5883 150.299 74.6263 151.244 76.9422 149.966Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M76.5716 149.002C76.553 149.261 76.7568 149.669 76.9236 149.965C74.6077 151.244 72.5698 150.299 72.1992 150.095C72.403 149.632 72.4771 148.909 72.4771 148.909C73.0144 149.206 73.6443 149.391 74.3483 149.446C75.182 149.484 75.9231 149.335 76.5716 149.002Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M73.1071 219.066C73.1071 219.066 68.4939 215.972 68.4939 215.361C68.4939 215.231 68.5495 215.046 68.6236 214.86C68.6236 214.86 69.0126 215.657 72.9403 218.288H72.9589C73.0144 218.621 73.07 218.88 73.1071 219.066Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M72.9588 218.306H72.9403C68.9941 215.675 68.6235 214.879 68.6235 214.879C68.9014 214.249 69.4943 213.508 69.4943 213.508L72.5142 215.768C72.6994 216.824 72.8477 217.695 72.9588 218.306Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M75.1081 161.414C75.1266 161.432 75.1266 161.451 75.1452 161.469C75.1266 164.73 75.0155 172.696 74.33 173.789C73.6445 174.9 69.9206 174.696 68.457 174.585C68.0864 174.548 67.8641 174.53 67.8641 174.53C67.8641 174.53 68.4014 170.213 68.6608 165.582C68.9201 160.95 68.494 156.004 68.494 156.004C68.494 156.004 61.8985 151.354 59.6567 144.185C57.3964 136.997 57.767 131.272 57.767 131.272C57.767 131.272 59.175 131.68 60.0828 131.476C60.1384 131.458 60.1755 131.458 60.231 131.439C61.8429 145.815 70.2911 151.021 70.2911 151.021C70.8284 151.891 70.9581 152.688 70.9581 152.688C70.9581 152.688 69.6612 152.836 68.7534 153.207C70.6431 154.392 74.6079 160.635 75.1081 161.414Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M75.1264 161.451C75.1264 161.433 75.1079 161.414 75.0894 161.396C75.1079 160.599 75.1264 160.08 75.1264 160.08C75.1264 160.191 75.1449 160.692 75.1264 161.451Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M72.5143 215.749L69.4944 213.489C69.4944 213.489 70.3281 211.859 71.4953 209.469C71.8473 211.784 72.1808 213.859 72.4587 215.49C72.4772 215.582 72.4957 215.675 72.5143 215.749Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M75.1266 160.08C75.1266 160.098 75.1081 160.617 75.0896 161.395C74.6079 160.617 70.6246 154.374 68.7163 153.151C69.6056 152.781 70.921 152.632 70.921 152.632C70.921 152.632 70.7913 151.836 70.2541 150.965C70.6246 151.058 71.903 150.465 71.903 150.465C71.903 150.465 75.2008 158.82 75.1266 160.08Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M69.661 141.628C69.9203 141.74 70.1056 141.888 70.1056 141.888L70.2353 141.906C70.1241 142.592 70.0315 143.333 70.013 144.111C70.013 144.111 68.5864 144.759 68.5123 142.703C68.4567 141.332 69.1793 141.406 69.661 141.628Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M57.9707 128.364C57.9521 128.235 57.7298 125.474 57.9521 125.493C58.1744 125.493 58.3782 128.29 58.3782 128.29C58.3782 128.29 58.4338 124.937 58.6006 124.882C58.7858 124.826 58.8599 128.216 58.8599 128.216C58.8599 128.216 59.1564 125.382 59.3602 125.363C59.564 125.345 59.3972 128.79 59.601 128.79C59.8048 128.79 60.2309 127.086 60.4903 127.216C60.6015 127.271 60.305 130.958 59.9901 131.254L60.0271 131.44C59.1193 131.643 57.7113 131.236 57.7113 131.236L57.7854 131.162C57.7854 131.162 57.211 126.493 57.4148 126.345C57.6372 126.215 57.9521 128.235 57.9707 128.364Z"
                                                        fill="#F5C2AD" />
                                                    <path
                                                        d="M76.2936 146.242C76.6085 146.223 76.7753 146.205 76.7753 146.205C76.7753 146.205 75.9786 147.557 74.4964 147.372C72.9958 147.187 72.2732 145.927 72.2732 145.927C72.4029 145.945 72.514 145.982 72.6437 146.001L72.6252 146.075C72.6252 146.075 74.1444 147.353 76.2936 146.297V146.242Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M76.2936 146.242V146.297C74.1445 147.372 72.6252 146.075 72.6252 146.075L72.6438 146.001C74.2186 146.297 75.6081 146.279 76.2936 146.242Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M76.4788 143.185C76.4603 143.444 76.3306 143.667 76.1639 143.648C75.9971 143.648 75.886 143.426 75.886 143.148C75.9045 142.888 76.0342 142.666 76.2009 142.685C76.3677 142.703 76.4974 142.926 76.4788 143.185Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M73.4405 143.036C73.422 143.296 73.2923 143.518 73.1256 143.5C72.9588 143.5 72.8477 143.277 72.8477 142.999C72.8662 142.74 72.9959 142.518 73.1626 142.536C73.3294 142.555 73.4405 142.777 73.4405 143.036Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M72.3104 141.573L72.2178 141.258C72.2548 141.24 73.1071 140.999 73.7555 141.036L73.737 141.37C73.1256 141.333 72.3104 141.573 72.3104 141.573Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M77.3312 141.814C77.3312 141.814 76.5345 141.499 75.9417 141.462L75.9602 141.129C76.6086 141.166 77.4238 141.481 77.4609 141.499L77.3312 141.814Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M74.4967 143.444C74.4967 143.444 73.663 145.241 74.4411 145.316C75.2377 145.408 74.4967 143.444 74.4967 143.444Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M68.5864 178.514C68.5493 178.514 68.5123 178.495 68.5123 178.458C68.4937 178.421 68.5308 178.365 68.5678 178.365C68.5864 178.365 70.8651 177.754 71.9582 175.753C71.9768 175.716 72.0323 175.698 72.0694 175.716C72.1064 175.735 72.125 175.79 72.1064 175.827C70.9763 177.902 68.6419 178.514 68.6049 178.514C68.6049 178.514 68.6049 178.514 68.5864 178.514Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M84.3156 178.513H84.2971C84.2786 178.513 81.9257 177.938 80.7585 175.882C80.74 175.845 80.7585 175.789 80.7955 175.771C80.8326 175.752 80.8882 175.771 80.9067 175.808C82.0368 177.79 84.3157 178.364 84.3342 178.364C84.3712 178.383 84.4083 178.42 84.3898 178.457C84.3898 178.494 84.3527 178.513 84.3156 178.513Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M72.8588 220.418L72.7468 220.542L73.653 221.363L73.7649 221.24L72.8588 220.418Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M72.2503 221.135L72.1382 221.259L72.9062 221.956L73.0183 221.833L72.2503 221.135Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M71.6845 221.805L71.5725 221.929L72.1763 222.476L72.2883 222.353L71.6845 221.805Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M73.6629 144.056H73.6444L71.2174 143.945C71.1062 143.945 70.9951 143.889 70.921 143.815C70.8469 143.741 70.8098 143.63 70.8098 143.519L70.8654 142.481C70.8839 142.259 71.0692 142.074 71.31 142.092L73.737 142.203C73.9593 142.222 74.1446 142.407 74.1261 142.648L74.0705 143.685C74.0705 143.889 73.8852 144.056 73.6629 144.056ZM73.6444 143.889C73.7741 143.889 73.9038 143.797 73.9038 143.648L73.9593 142.611C73.9593 142.481 73.8667 142.351 73.7185 142.351L71.2915 142.24C71.1618 142.24 71.0321 142.333 71.0321 142.481L70.9766 143.519C70.9766 143.593 70.9951 143.648 71.0507 143.704C71.0877 143.76 71.1618 143.778 71.2174 143.778L73.6444 143.889Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M77.9983 144.26H77.9797L75.5527 144.149C75.3304 144.13 75.1451 143.945 75.1636 143.704L75.2192 142.667C75.2377 142.444 75.423 142.259 75.6639 142.278L78.0909 142.389C78.3132 142.407 78.4985 142.593 78.48 142.833L78.4244 143.871C78.4058 144.093 78.2206 144.26 77.9983 144.26ZM77.9797 144.093C78.1094 144.093 78.2391 144.001 78.2391 143.852L78.2947 142.815C78.2947 142.685 78.202 142.556 78.0538 142.556L75.6268 142.444C75.4971 142.444 75.3674 142.537 75.3674 142.685L75.3118 143.723C75.3118 143.852 75.4045 143.982 75.5527 143.982L77.9797 144.093Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M75.3304 142.648H75.3118C74.8116 142.518 73.9779 142.555 73.9779 142.555C73.9408 142.555 73.8853 142.518 73.8853 142.481C73.8853 142.444 73.9223 142.389 73.9594 142.389C73.9964 142.389 74.8116 142.352 75.3489 142.481C75.386 142.5 75.423 142.537 75.4045 142.574C75.4045 142.63 75.3674 142.648 75.3304 142.648Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M78.3502 142.722C78.3131 142.722 78.2946 142.703 78.2761 142.666C78.2575 142.629 78.2761 142.574 78.3131 142.555C78.7763 142.333 79.8694 141.814 80.0731 141.888C80.1102 141.907 80.1473 141.944 80.1287 141.999C80.1102 142.036 80.0731 142.073 80.0176 142.055C79.8879 142.036 79.0912 142.37 78.3687 142.722C78.3687 142.703 78.3502 142.722 78.3502 142.722Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M71.032 142.333C71.0135 142.333 70.995 142.333 70.9765 142.314C70.5874 142.036 69.9204 141.647 69.6981 141.647C69.661 141.647 69.6055 141.61 69.6055 141.573C69.6055 141.536 69.6425 141.48 69.6796 141.48C69.6796 141.48 69.6796 141.48 69.6981 141.48C70.0501 141.48 70.9765 142.092 71.0691 142.166C71.1061 142.184 71.1247 142.24 71.0876 142.277C71.0876 142.333 71.0506 142.333 71.032 142.333Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M74.8672 169.602C74.8672 169.602 75.1821 161.729 75.1266 160.062C75.3859 165.119 76.2196 169.51 76.2196 169.51L74.8672 169.602Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M71.4583 209.487C71.4583 209.487 71.5879 209.876 71.7176 210.451C71.7917 210.747 71.8658 211.081 71.9399 211.451C71.977 211.636 72.0141 211.822 72.0511 212.025C72.0882 212.211 72.1252 212.414 72.1623 212.618C72.1993 212.822 72.2178 213.007 72.2549 213.211C72.292 213.396 72.3105 213.6 72.3475 213.785C72.4031 214.156 72.4402 214.508 72.4772 214.804C72.5328 215.397 72.5513 215.805 72.5513 215.805C72.5513 215.805 72.4216 215.415 72.292 214.841C72.2178 214.545 72.1437 214.211 72.0696 213.841C72.0326 213.656 71.9955 213.47 71.9585 213.267C71.9214 213.081 71.8844 212.877 71.8473 212.674C71.8103 212.47 71.7917 212.285 71.7547 212.081C71.7176 211.896 71.6991 211.692 71.6806 211.507C71.625 211.136 71.5879 210.784 71.5509 210.488C71.4583 209.895 71.4583 209.487 71.4583 209.487Z"
                                                        fill="#F7AF4F" />
                                                    <path
                                                        d="M75.6265 200.744C75.6265 200.744 75.6821 201.318 75.7377 202.189C75.7747 202.615 75.7933 203.134 75.8118 203.671C75.8118 203.949 75.8303 204.227 75.8303 204.505C75.8303 204.783 75.8488 205.079 75.8488 205.376C75.8488 205.672 75.8488 205.95 75.8488 206.246C75.8488 206.524 75.8488 206.821 75.8488 207.08C75.8488 207.617 75.8303 208.136 75.8118 208.562C75.7933 209.433 75.7377 210.007 75.7377 210.007C75.7377 210.007 75.6636 209.433 75.6265 208.562C75.5895 208.136 75.571 207.617 75.5524 207.08C75.5524 206.802 75.5339 206.524 75.5339 206.246C75.5339 205.968 75.5154 205.672 75.5154 205.376C75.5154 205.079 75.5154 204.801 75.5154 204.505C75.5154 204.227 75.5154 203.931 75.5154 203.671C75.5154 203.134 75.5339 202.615 75.5524 202.189C75.5895 201.337 75.6265 200.744 75.6265 200.744Z"
                                                        fill="#F7AF4F" />
                                                    <path
                                                        d="M199.182 122.474C200.368 122.863 202.387 123.622 202.369 124.234C202.35 125.067 196.644 124.956 196.014 124.938C195.866 124.697 195.718 124.456 195.551 124.234C195.384 124.011 195.218 123.789 195.051 123.585L195.069 123.567H199.293L199.182 122.492V122.474Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M199.108 149.928C200.72 150.669 202.721 151.836 202.332 152.837C201.702 154.448 196.792 151.744 194.551 150.688C194.458 150.651 194.476 150.224 194.514 149.483C194.514 149.483 198.145 150.854 198.46 150.873C198.793 150.854 199.09 149.928 199.108 149.928Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M199.164 122.51L199.275 123.585H195.051C194.81 121.028 193.013 116.749 191.568 113.951C192.198 113.581 195.31 111.728 195.773 111.654L195.81 111.636C197.126 116.304 198.33 122.214 198.33 122.214C198.33 122.214 198.682 122.306 199.164 122.473V122.51Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M199.108 149.928C199.108 149.928 198.812 150.855 198.478 150.855C198.145 150.855 194.532 149.465 194.532 149.465C194.699 147.057 195.255 141.388 194.106 135.904L198.052 135.404C198.237 142.203 197.274 149.15 197.274 149.15C197.274 149.15 198.108 149.465 199.108 149.928Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M198.034 135.404L194.087 135.905C194.05 135.738 194.013 135.571 193.976 135.404L198.015 134.886C198.034 135.071 198.034 135.238 198.034 135.404Z"
                                                        fill="white" />
                                                    <path
                                                        d="M198.015 134.904L193.976 135.422C193.847 134.885 193.717 134.329 193.55 133.792C193.439 133.403 193.309 133.033 193.161 132.681L197.793 132.088H197.83C197.923 132.996 197.997 133.94 198.015 134.904Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M197.83 132.07H197.793L193.161 132.663C190.345 125.271 184.176 125.901 184.176 125.901C184.176 125.901 183.861 122.678 184.305 118.269C184.583 118.269 190.771 118.472 195.051 123.604C195.218 123.808 195.384 124.03 195.551 124.252C195.718 124.475 195.866 124.715 196.014 124.956C197.015 126.698 197.57 129.273 197.83 132.07Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M195.81 111.636L195.773 111.655C195.31 111.729 192.198 113.581 191.568 113.952C191.494 113.803 191.42 113.655 191.345 113.526C191.846 113.229 195.125 111.265 195.588 111.191L195.662 111.173C195.718 111.303 195.773 111.469 195.81 111.636Z"
                                                        fill="white" />
                                                    <path
                                                        d="M195.681 111.154L195.607 111.173C195.125 111.247 191.846 113.21 191.364 113.507C190.79 112.432 190.29 111.636 190.012 111.339C190.216 111.21 193.476 108.987 194.736 108.523L194.847 108.505C195.125 109.264 195.403 110.172 195.681 111.154Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M194.828 108.505L194.717 108.523C193.457 108.986 190.197 111.191 189.993 111.339C189.919 111.247 189.845 111.21 189.808 111.21C189.252 111.191 185.639 113.21 185.028 113.562C185.621 110.765 186.584 107.782 188.085 105.022C188.085 105.022 192.513 103.54 194.254 107.097C194.439 107.467 194.643 107.949 194.828 108.505Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M189.771 81.8284C189.937 81.6061 191.605 79.3645 191.809 79.4756C192.012 79.6053 190.271 81.921 190.086 82.1433C190.252 81.958 191.66 80.3648 191.753 80.6057C191.864 80.865 188.548 84.9036 188.548 84.9036L188.474 84.9221L186.436 83.6439C186.38 83.0881 188.233 79.5682 188.363 79.5868C188.696 79.6238 188.085 81.4764 188.27 81.5875C188.455 81.6987 190.363 78.3641 190.53 78.5123C190.697 78.642 189.4 81.3096 189.307 81.4764C189.437 81.2911 191.401 78.3641 191.531 78.5123C191.697 78.6605 189.937 81.569 189.771 81.8284Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M186.473 83.6629L188.511 84.9411C188.511 84.9411 185.695 93.2776 181.341 97.2977C176.987 101.336 173.411 101.948 173.411 101.948C173.411 101.948 173.782 110.099 174.968 112.859C171.17 117.12 169.058 122.53 168.78 123.252C168.706 123.196 168.631 123.159 168.557 123.104C163.722 119.528 160.535 105.616 160.535 105.616C160.535 105.616 156.96 108.08 155.329 111.118C153.699 114.137 151.679 122.752 151.679 122.752H149.086C149.086 122.752 148.604 115.934 151.161 109.228C151.902 107.283 153.013 105.542 154.255 104.06C157.293 100.429 161.165 98.2054 162.758 97.6126C163.129 97.4644 163.444 97.2977 163.703 97.1309C163.74 97.2606 164.463 99.5948 166.76 99.317C169.132 99.0391 169.002 95.9824 169.002 95.9824C169.688 96.2788 169.688 96.2788 169.688 96.2788C169.688 96.2788 172.744 96.6678 178.025 94.1854C183.305 91.703 186.213 83.5146 186.213 83.5146L186.473 83.6629Z"
                                                        fill="#F34F2F" />
                                                    <path
                                                        d="M188.085 105.004C186.584 107.783 185.62 110.747 185.028 113.544C184.676 115.193 184.435 116.786 184.287 118.25C183.842 122.659 184.157 125.882 184.157 125.882C184.157 125.882 173.708 126.66 168.78 123.252C169.057 122.511 171.17 117.101 174.968 112.859C175.672 112.062 176.431 111.321 177.265 110.636C182.823 106.097 188.085 105.004 188.085 105.004Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M167.742 83.162C171.725 83.0694 172.3 86.4596 172.281 90.072C172.244 93.6845 169.688 96.2781 169.688 96.2781C169.688 96.2781 169.688 96.2781 169.002 95.9817C168.317 95.6853 168.557 95.2222 168.557 95.2222L168.502 95.148C170.188 94.0921 171.151 91.5356 171.466 89.0717C171.911 85.5148 170.114 84.5885 170.114 84.5885C170.114 84.5885 168.761 86.9598 163.889 87.7378C163.889 87.7378 162.369 87.2376 162.073 88.4418C161.777 89.646 163.518 90.2758 163.518 90.2758H163.592C163.518 91.9431 163.703 93.9995 164.833 94.9998L164.796 95.0369C164.796 95.0369 164.926 96.2225 163.685 97.1118C163.425 97.297 163.129 97.4637 162.74 97.5934C161.147 98.1862 157.275 100.409 154.236 104.04L154.181 103.985C148.585 99.0014 152.383 89.9609 157.386 88.1083C162.388 86.2928 163.759 83.2732 167.742 83.162Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M170.114 84.6074C170.114 84.6074 171.911 85.5337 171.466 89.0906C171.151 91.5545 170.188 94.0925 168.502 95.167C167.742 95.6487 166.853 95.8154 165.816 95.5561C165.426 95.4634 165.112 95.2782 164.834 95.0374C163.703 94.037 163.537 91.9806 163.592 90.3133C163.648 88.9054 163.889 87.7753 163.889 87.7753C168.78 86.9787 170.114 84.6074 170.114 84.6074ZM169.428 89.9984C169.484 89.7946 169.41 89.6093 169.299 89.5723C169.169 89.5352 169.039 89.6834 168.984 89.8872C168.928 90.091 169.002 90.2763 169.113 90.3133C169.225 90.3504 169.373 90.2022 169.428 89.9984ZM168.78 92.3326C168.78 92.3326 168.65 92.3511 168.409 92.3511C167.909 92.3511 166.964 92.2585 165.982 91.6842C165.89 91.6286 165.816 91.5731 165.723 91.5175C165.723 91.5175 165.778 93.685 166.742 94.1111C167.742 94.5186 168.78 92.3326 168.78 92.3326ZM167.39 91.3322C167.983 91.499 167.705 89.8872 167.705 89.8872C167.705 89.8872 166.797 91.147 167.39 91.3322ZM166.631 89.35C166.686 89.1462 166.612 88.9609 166.501 88.9239C166.371 88.8868 166.242 89.035 166.186 89.2388C166.131 89.4426 166.205 89.6279 166.316 89.6649C166.427 89.702 166.594 89.5538 166.631 89.35Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M169.28 89.5907C169.41 89.6277 169.465 89.813 169.41 90.0168C169.354 90.2206 169.224 90.3688 169.095 90.3317C168.965 90.2947 168.909 90.1094 168.965 89.9056C169.021 89.7018 169.15 89.5536 169.28 89.5907Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M169.002 95.9819C169.002 95.9819 169.132 99.0386 166.76 99.3165C164.463 99.5758 163.74 97.2601 163.703 97.1305C164.945 96.2412 164.815 95.0556 164.815 95.0556L164.852 95.0186C165.13 95.2594 165.445 95.4446 165.834 95.5373C166.871 95.7966 167.779 95.6299 168.52 95.1482L168.576 95.2223C168.557 95.2223 168.317 95.6855 169.002 95.9819Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M168.409 92.3513C168.632 92.3513 168.78 92.3327 168.78 92.3327C168.78 92.3327 167.742 94.5189 166.76 94.0928C165.779 93.6667 165.741 91.499 165.741 91.499C165.834 91.5546 165.908 91.6102 166.001 91.6658L165.945 91.7584C165.945 91.7584 166.538 94.0187 168.428 92.4254V92.3513H168.409Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M168.409 92.3505V92.4432C166.52 94.055 165.927 91.7762 165.927 91.7762L165.982 91.6836C166.964 92.2579 167.909 92.3505 168.409 92.3505Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M167.705 89.8867C167.705 89.8867 168.002 91.5171 167.39 91.3319C166.798 91.1466 167.705 89.8867 167.705 89.8867Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M166.501 88.9237C166.631 88.9607 166.686 89.146 166.631 89.3498C166.575 89.5536 166.445 89.7018 166.316 89.6648C166.186 89.6277 166.13 89.4424 166.186 89.2386C166.242 89.0348 166.371 88.8866 166.501 88.9237Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M163.889 87.7749C163.889 87.7749 163.648 88.9049 163.592 90.3129H163.518C163.518 90.3129 161.777 89.683 162.073 88.4788C162.369 87.2747 163.889 87.7749 163.889 87.7749Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M149.104 122.752H151.698C151.698 122.752 151.661 124.197 151.198 124.493C150.735 124.808 143.972 124.438 143.972 124.438C143.972 124.438 143.935 124.104 145.288 123.437C146.64 122.789 149.03 123.215 149.104 122.752Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M167.113 88.0902C166.668 87.979 165.982 88.0531 165.982 88.0531L165.964 87.7937C166.001 87.7937 166.686 87.7196 167.187 87.8308L167.113 88.0902Z"
                                                        fill="black" />
                                                    <path
                                                        d="M170.28 89.0721C170.28 89.0721 169.706 88.7016 169.261 88.609L169.317 88.3496C169.817 88.4608 170.392 88.8313 170.429 88.8498L170.28 89.0721Z"
                                                        fill="black" />
                                                    <path
                                                        d="M391.009 141.165C391.157 140.998 393.325 138.59 393.529 138.757C393.751 138.923 391.324 141.573 391.324 141.573C391.324 141.573 393.288 139.72 393.362 140.016C393.455 140.313 389.36 144.481 389.36 144.481L389.323 144.463C389.342 144.426 389.36 144.426 389.36 144.426L387.156 142.795C387.322 141.98 389.583 138.516 389.712 138.534C390.083 138.609 389.193 140.609 389.397 140.758C389.601 140.906 392.065 137.386 392.232 137.553C392.399 137.719 390.676 140.535 390.564 140.72C390.713 140.535 393.214 137.479 393.344 137.645C393.473 137.83 391.139 140.98 391.009 141.165Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M387.137 142.776L389.342 144.407C389.342 144.407 389.323 144.425 389.305 144.444C388.749 145.314 379.726 159.283 374.817 163.043C383.524 170.509 383.895 181.569 383.895 181.569C383.895 181.569 378.652 182.495 377.225 184.107C377.225 184.107 377.114 181.328 376.299 177.808C375.724 175.289 374.78 172.38 373.26 169.842C370.426 165.118 366.702 162.098 365.85 161.45C365.85 161.432 365.85 161.394 365.85 161.376C366.832 161.376 374.242 156.318 378.633 152.298C383.024 148.278 387.026 142.702 387.026 142.702L387.137 142.776Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M380.245 224.308C377.633 224.642 374.613 224.957 374.669 224.679C374.761 224.16 376.892 221.993 380.264 221.103C381.931 221.9 383.654 221.011 383.654 221.011C384.08 222.215 383.988 223.79 383.988 223.79C383.988 223.79 382.228 224.049 380.245 224.308Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M383.988 223.789L383.932 224.493L380.245 224.308C382.227 224.048 383.988 223.789 383.988 223.789Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M367.165 202.207C365.498 204.763 348.027 218.194 348.027 218.194L345.804 215.323C345.804 215.323 350.491 210.821 357.161 202.726C363.83 194.63 367.777 189.202 368.833 185.163L372.353 184.978C372.353 184.978 372.39 182.607 371.704 179.55H371.741C371.741 179.55 375.391 179.55 376.318 177.827C377.133 181.347 377.244 184.126 377.244 184.126C378.67 182.514 383.914 181.588 383.914 181.588C383.914 181.588 384.136 187.386 380.931 191.925C377.744 196.464 372.779 200.132 372.964 200.595C373.576 201.67 383.098 219.547 383.098 219.547L380.264 221.121C380.282 221.103 369.518 207.894 367.165 202.207Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M383.654 221.01C383.654 221.01 381.931 221.9 380.264 221.103L383.098 219.528C383.098 219.528 383.432 219.862 383.654 221.01Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M376.317 177.827C375.391 179.55 371.741 179.55 371.741 179.55H371.704C371.222 177.401 370.389 174.918 368.962 172.695C366.146 168.36 363.441 166.378 362.144 165.304C362.848 165.137 365.664 164.266 365.868 161.469C366.72 162.117 370.463 165.118 373.279 169.861C374.798 172.399 375.743 175.289 376.317 177.827Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M362.145 165.304C363.442 166.36 366.146 168.361 368.963 172.696C370.408 174.919 371.241 177.401 371.705 179.55C372.39 182.607 372.353 184.978 372.353 184.978L368.833 185.163C368.833 185.163 369.63 181.032 367.721 177.883C365.813 174.733 362.775 172.14 362.775 172.14C362.775 172.14 356.476 176.771 350.973 174.048C345.471 171.325 348.25 161.636 348.25 161.636L350.973 162.247C350.973 162.247 349.546 167.99 353.011 169.972C356.476 171.955 361.404 166.508 361.848 165.711C361.941 165.545 361.959 165.341 361.922 165.137C361.996 165.193 362.071 165.248 362.145 165.304Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M365.757 161.376C365.794 161.395 365.831 161.432 365.868 161.469C365.665 164.266 362.849 165.137 362.145 165.304C362.07 165.248 361.996 165.193 361.941 165.137C361.83 164.322 361.052 163.303 361.052 163.303V163.285C363.034 162.71 363.275 160.617 363.201 159.153C363.46 159.487 364.849 161.228 365.757 161.376Z"
                                                        fill="#E5AA6F" />
                                                    <path
                                                        d="M363.96 151.946C365.442 154.225 362.978 157.634 362.978 157.634L360.885 157.263C360.885 157.263 362.237 155.966 360.699 155.225C359.421 154.614 359.162 155.837 359.162 155.837C359.162 155.837 354.345 153.799 353.103 157.56C353.103 157.56 352.399 157.411 351.603 157.059C351.454 157.004 351.288 156.911 351.139 156.837C351.065 156.8 351.01 156.763 350.936 156.726C350.787 156.633 350.658 156.559 350.528 156.467C350.454 156.411 350.398 156.374 350.343 156.318C350.139 156.133 349.954 155.948 349.824 155.726C349.546 155.281 349.453 154.744 349.713 154.114C350.695 151.576 353.233 154.429 353.603 153.243C353.974 152.076 353.603 149.538 355.086 149.538C356.568 149.538 357.624 152.261 358.921 151.261C360.199 150.279 362.478 149.668 363.96 151.946Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M363.201 159.154C363.293 160.617 363.034 162.71 361.052 163.285C360.829 163.359 360.588 163.396 360.31 163.433C355.975 163.84 354.141 160.58 353.437 158.746C353.381 158.598 353.326 158.45 353.289 158.32C353.141 157.857 353.085 157.56 353.085 157.56C354.326 153.8 359.143 155.837 359.143 155.837C359.143 155.837 359.403 154.596 360.681 155.226C362.219 155.967 360.866 157.264 360.866 157.264L362.96 157.634C362.978 157.634 363.145 158.283 363.201 159.154Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M350.769 157.931C350.788 157.875 350.954 157.357 351.121 156.838C351.269 156.931 351.436 157.005 351.584 157.06C351.473 158.264 351.269 159.913 351.269 159.913C351.269 159.913 352.64 158.542 353.289 158.301C353.326 158.431 353.381 158.579 353.437 158.728C352.9 159.654 351.047 161.729 350.973 162.229L348.249 161.618C348.249 161.618 348.62 154.8 349.139 154.763C349.639 154.726 349.25 157.449 349.231 157.635C349.25 157.542 349.528 156.449 349.787 155.708C349.917 155.93 350.102 156.134 350.306 156.301L350.065 157.783C350.083 157.709 350.287 157.079 350.51 156.449C350.639 156.542 350.769 156.634 350.917 156.708C350.862 157.32 350.788 157.875 350.769 157.931Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M345.822 215.323L348.045 218.195L346.971 218.899C346.971 218.899 345.211 218.102 344.803 216.305L345.822 215.323Z"
                                                        fill="#EAB47F" />
                                                    <path
                                                        d="M342.265 218.25C340.375 216.416 338.263 214.248 338.523 214.119C338.986 213.878 342.006 214.193 344.803 216.305C345.229 218.102 346.971 218.898 346.971 218.898C346.285 219.973 344.989 220.88 344.989 220.88C344.989 220.88 343.71 219.658 342.265 218.25Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M344.989 220.862L344.414 221.251L342.265 218.231C343.71 219.658 344.989 220.862 344.989 220.862Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M360.255 160.098C360.255 160.098 361.366 161.58 360.551 162.562C359.718 163.543 358.069 163.228 358.069 163.228C358.161 163.154 358.235 163.08 358.309 163.006L358.365 163.062C358.365 163.062 360.384 162.802 360.144 160.505L360.088 160.487C360.199 160.246 360.255 160.098 360.255 160.098Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M360.144 160.505C360.384 162.802 358.365 163.062 358.365 163.062L358.31 163.006C359.273 162.043 359.829 161.024 360.088 160.486L360.144 160.505Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M358.198 158.709C358.328 158.968 358.309 159.246 358.161 159.339C357.994 159.413 357.772 159.283 357.624 159.005C357.494 158.746 357.512 158.468 357.661 158.376C357.827 158.301 358.068 158.45 358.198 158.709Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M356.401 160.136C356.531 160.395 356.512 160.673 356.364 160.766C356.197 160.84 355.975 160.71 355.827 160.432C355.697 160.173 355.716 159.895 355.864 159.802C356.012 159.71 356.271 159.876 356.401 160.136Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M354.863 160.191L354.493 160.135C354.493 160.098 354.66 159.135 354.993 158.486L355.327 158.653C355.012 159.246 354.863 160.191 354.863 160.191Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M356.438 157.782L356.271 157.449C356.901 157.115 357.883 156.985 357.92 156.985L357.976 157.356C357.957 157.337 357.013 157.486 356.438 157.782Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M357.105 159.932C357.105 159.932 357.902 161.988 358.569 161.414C359.254 160.839 357.105 159.932 357.105 159.932Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M374.465 185.886C374.465 185.886 374.298 186.108 373.983 186.516C373.668 186.923 373.242 187.497 372.742 188.22C372.241 188.924 371.667 189.758 371.074 190.665C370.778 191.11 370.481 191.592 370.185 192.073C369.889 192.555 369.592 193.055 369.314 193.555C369.036 194.056 368.758 194.574 368.518 195.074C368.388 195.334 368.277 195.575 368.166 195.834C368.11 195.964 368.054 196.093 367.999 196.204C367.943 196.334 367.888 196.464 367.851 196.575C367.739 196.816 367.665 197.075 367.573 197.316C367.48 197.557 367.406 197.798 367.332 198.039C367.258 198.279 367.202 198.502 367.147 198.724C367.091 198.946 367.054 199.169 367.017 199.372C366.98 199.576 366.98 199.798 366.943 199.984C366.924 200.187 366.924 200.373 366.924 200.539C366.943 200.891 366.961 201.188 367.017 201.429C367.054 201.67 367.128 201.855 367.165 201.984C367.202 202.114 367.239 202.188 367.239 202.188C367.239 202.188 367.202 202.114 367.147 202.003C367.091 201.873 366.998 201.707 366.943 201.447C366.869 201.206 366.813 200.891 366.776 200.539C366.776 200.354 366.758 200.169 366.758 199.965C366.776 199.761 366.776 199.558 366.795 199.335C366.832 199.113 366.85 198.891 366.887 198.65C366.943 198.428 366.98 198.168 367.054 197.927C367.184 197.446 367.332 196.927 367.536 196.427C367.591 196.297 367.628 196.167 367.684 196.038C367.739 195.908 367.795 195.778 367.851 195.649C367.962 195.389 368.073 195.13 368.203 194.871C368.443 194.352 368.721 193.833 368.999 193.314C369.296 192.814 369.592 192.314 369.889 191.814C370.185 191.332 370.5 190.851 370.815 190.406C371.13 189.961 371.426 189.535 371.723 189.128C372.019 188.72 372.316 188.35 372.575 188.016C373.112 187.331 373.594 186.793 373.927 186.404C374.261 186.09 374.465 185.886 374.465 185.886Z"
                                                        fill="#F6826B" />
                                                    <path
                                                        d="M202.424 207.357H123.5C123.5 207.357 126.835 200.132 136.839 200.132C122.944 186.794 140.73 184.571 147.955 190.684C144.621 168.453 160.535 161.302 167.964 188.461C167.964 188.461 176.098 168.805 188.325 178.253C200.553 187.701 180.748 197.909 180.748 197.909C180.748 197.909 199.645 196.797 202.424 207.357Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M161.165 207.357C151.939 200.725 146.214 190.388 143.046 182.903C139.6 174.789 138.322 168.138 138.303 168.064L138.674 167.99C138.692 168.064 139.97 174.678 143.398 182.755C146.566 190.202 152.254 200.484 161.388 207.061L161.165 207.357Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M158.071 204.82C158.071 204.82 153.421 193.556 158.016 194.131C162.629 194.686 157.941 201.652 158.071 204.82Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M153.013 199.132C153.013 199.132 148.363 187.869 152.957 188.443C157.552 189.017 152.865 195.964 153.013 199.132Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M148.345 192.722C148.345 192.722 145.491 180.884 149.956 182.144C154.403 183.422 148.697 189.554 148.345 192.722Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M144.509 186.164C144.509 186.164 141.656 174.326 146.121 175.586C150.568 176.864 144.861 183.015 144.509 186.164Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M141.545 178.513C141.545 178.513 138.692 166.675 143.157 167.935C147.604 169.213 141.897 175.363 141.545 178.513Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M139.007 170.695C139.007 170.695 132.263 160.562 136.876 160.21C141.508 159.876 138.247 167.62 139.007 170.695Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M141.267 177.698C141.267 177.698 135.505 166.972 133.023 170.881C130.559 174.808 138.896 175.586 141.267 177.698Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M144.472 185.737C144.472 185.737 138.71 175.011 136.228 178.92C133.764 182.829 142.119 183.607 144.472 185.737Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M148.678 192.907C148.678 192.907 141.582 183.015 139.637 187.22C137.673 191.425 146.066 191.11 148.678 192.907Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M152.754 199.298C152.754 199.298 144.028 190.814 142.842 195.297C141.675 199.78 149.864 198.001 152.754 199.298Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M158.46 204.986C158.46 204.986 148.956 197.353 148.215 201.929C147.455 206.505 155.459 203.948 158.46 204.986Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M170.336 207.357C176.19 200.354 178.58 191.147 179.562 184.682C180.618 177.66 180.285 172.232 180.285 172.177L179.988 172.195C179.988 172.251 180.322 177.66 179.266 184.644C178.302 191.091 175.931 200.225 170.114 207.172L170.336 207.357Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M172.244 204.764C172.244 204.764 173.615 195.057 170.151 196.428C166.668 197.78 171.707 202.263 172.244 204.764Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M175.042 199.317C175.042 199.317 176.413 189.609 172.948 190.98C169.465 192.351 174.523 196.834 175.042 199.317Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M177.394 193.389C177.394 193.389 177.246 183.589 174.023 185.478C170.817 187.349 176.487 190.999 177.394 193.389Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M179.062 187.516C179.062 187.516 178.914 177.716 175.69 179.605C172.485 181.495 178.154 185.126 179.062 187.516Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M179.84 180.958C179.84 180.958 179.692 171.158 176.468 173.048C173.263 174.937 178.932 178.568 179.84 180.958Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M180.248 174.363C180.248 174.363 183.472 165.119 179.803 165.767C176.153 166.434 180.229 171.825 180.248 174.363Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M179.896 180.272C179.896 180.272 182.249 170.769 184.954 173.325C187.659 175.882 181.323 178.16 179.896 180.272Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M179.006 187.164C179.006 187.164 181.359 177.66 184.064 180.217C186.769 182.774 180.414 185.052 179.006 187.164Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M177.172 193.611C177.172 193.611 180.73 184.478 183.082 187.368C185.435 190.239 178.84 191.684 177.172 193.611Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M175.264 199.409C175.264 199.409 180.359 191.054 182.175 194.296C183.99 197.538 177.265 197.816 175.264 199.409Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M171.966 204.967C171.966 204.967 177.839 197.131 179.34 200.54C180.841 203.948 174.097 203.559 171.966 204.967Z"
                                                        fill="#3A8883" />
                                                    <path
                                                        d="M456.557 191.925C452.926 184.385 452.87 175.678 453.444 169.713C454.074 163.247 455.594 158.486 455.612 158.449L455.872 158.542C455.853 158.597 454.352 163.321 453.722 169.75C453.148 175.678 453.204 184.329 456.798 191.814L456.557 191.925Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M455.446 189.183C455.446 189.183 456.409 180.253 459.188 182.254C461.967 184.255 456.483 187.089 455.446 189.183Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M454.167 183.718C454.167 183.718 455.13 174.789 457.909 176.789C460.688 178.79 455.204 181.624 454.167 183.718Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M453.408 177.919C453.408 177.919 455.742 169.25 458.169 171.639C460.615 174.048 454.76 176.011 453.408 177.919Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M453.24 172.343C453.24 172.343 455.575 163.673 458.002 166.063C460.448 168.453 454.574 170.417 453.24 172.343Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M454.019 166.341C454.019 166.341 456.353 157.671 458.78 160.061C461.226 162.47 455.371 164.433 454.019 166.341Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M455.131 160.395C455.131 160.395 454.334 151.465 457.446 152.873C460.559 154.281 455.742 158.134 455.131 160.395Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M454.13 165.711C454.13 165.711 454.186 156.745 451.203 158.394C448.22 160.08 453.352 163.525 454.13 165.711Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M453.37 172.047C453.37 172.047 453.426 163.081 450.443 164.73C447.46 166.397 452.592 169.843 453.37 172.047Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M453.574 178.179C453.574 178.179 452.463 169.268 449.721 171.306C446.979 173.325 452.5 176.085 453.574 178.179Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M453.963 183.755C453.963 183.755 451.296 175.178 448.961 177.679C446.627 180.18 452.537 181.884 453.963 183.755Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M455.631 189.424C455.631 189.424 452.167 181.143 450.073 183.829C447.998 186.534 454.056 187.701 455.631 189.424Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M459.892 193.573C464.209 188.405 465.969 181.643 466.692 176.863C467.47 171.695 467.229 167.693 467.229 167.656L467.007 167.675C467.007 167.712 467.248 171.695 466.488 176.845C465.765 181.587 464.024 188.312 459.744 193.444L459.892 193.573Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M461.3 191.665C461.3 191.665 462.301 184.515 459.744 185.515C457.187 186.515 460.911 189.831 461.3 191.665Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M463.357 187.664C463.357 187.664 464.357 180.514 461.8 181.514C459.262 182.514 462.967 185.812 463.357 187.664Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M465.098 183.292C465.098 183.292 464.987 176.086 462.616 177.457C460.244 178.846 464.431 181.532 465.098 183.292Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M466.321 178.957C466.321 178.957 466.21 171.751 463.838 173.122C461.467 174.53 465.654 177.197 466.321 178.957Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M466.895 174.122C466.895 174.122 466.784 166.916 464.413 168.287C462.041 169.695 466.228 172.381 466.895 174.122Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M467.191 169.268C467.191 169.268 469.563 162.451 466.876 162.933C464.19 163.414 467.173 167.397 467.191 169.268Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M466.932 173.622C466.932 173.622 468.655 166.62 470.656 168.491C472.657 170.38 467.988 172.066 466.932 173.622Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M466.284 178.716C466.284 178.716 468.007 171.713 470.008 173.584C472.009 175.474 467.321 177.141 466.284 178.716Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M464.932 183.44C464.932 183.44 467.544 176.715 469.285 178.846C471.027 180.976 466.173 182.032 464.932 183.44Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M463.523 187.719C463.523 187.719 467.284 181.569 468.618 183.959C469.971 186.349 464.987 186.552 463.523 187.719Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M461.096 191.814C461.096 191.814 465.413 186.034 466.525 188.554C467.636 191.073 462.671 190.777 461.096 191.814Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M464.524 202.485C469.433 197.983 471.49 182.829 471.49 182.829H448.016C448.016 182.829 450.073 197.983 454.982 202.485H464.524Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M196.829 70.0087C196.385 70.0087 195.94 69.9531 195.477 69.8235L195.625 69.2862C196.348 69.4715 197.07 69.5085 197.7 69.3603L197.83 69.8976C197.515 69.9717 197.181 70.0087 196.829 70.0087ZM193.402 68.8045C192.772 68.3414 192.235 67.7671 191.809 67.1187L192.272 66.8223C192.661 67.4151 193.161 67.9338 193.735 68.3599L193.402 68.8045ZM199.849 68.6563L199.423 68.3044C199.831 67.8227 200.127 67.1743 200.312 66.4147L200.85 66.5444C200.664 67.3966 200.331 68.1006 199.849 68.6563ZM235.217 67.4522C235.124 67.1743 235.013 66.8779 234.902 66.6L235.421 66.3777C235.551 66.6741 235.662 66.989 235.754 67.2855L235.217 67.4522ZM190.919 64.9698C190.845 64.5807 190.808 64.1546 190.808 63.7471C190.808 63.3766 190.845 63.006 190.901 62.6355L191.457 62.7282C191.401 63.0616 191.364 63.4136 191.364 63.7471C191.364 64.1176 191.401 64.4881 191.475 64.8586L190.919 64.9698ZM233.846 64.6919C233.457 64.1176 232.975 63.5433 232.457 63.006L232.864 62.617C233.401 63.1913 233.883 63.7841 234.309 64.3769L233.846 64.6919ZM200.498 64.2658C200.479 63.5989 200.387 62.8578 200.238 62.0983L200.776 61.9871C200.924 62.7837 201.016 63.5433 201.054 64.2473L200.498 64.2658ZM230.845 61.524C230.289 61.0794 229.696 60.6533 229.048 60.2457L229.344 59.7826C229.992 60.2087 230.622 60.6533 231.178 61.0979L230.845 61.524ZM192.105 60.7089L191.605 60.468C191.716 60.2457 191.846 60.0234 191.975 59.8011C192.235 59.375 192.55 58.9489 192.92 58.5599L193.328 58.9489C192.994 59.3009 192.698 59.69 192.457 60.079C192.327 60.2828 192.216 60.4866 192.105 60.7089ZM199.701 59.9493C199.608 59.6159 199.479 59.2639 199.368 58.8934C199.256 58.5414 199.108 58.1894 198.979 57.8559L199.497 57.6336C199.646 57.9856 199.775 58.3376 199.905 58.7081C200.035 59.0786 200.146 59.4306 200.238 59.7826L199.701 59.9493ZM227.139 59.1157C226.509 58.7822 225.824 58.4673 225.138 58.1523L225.361 57.6336C226.065 57.9486 226.75 58.2635 227.399 58.6155L227.139 59.1157ZM194.995 57.5781L194.699 57.1149C195.31 56.7259 195.977 56.3739 196.718 56.0775L196.941 56.5962C196.237 56.8741 195.57 57.2075 194.995 57.5781ZM223.063 57.3372C222.378 57.0964 221.674 56.8556 220.951 56.6333L221.118 56.096C221.841 56.3183 222.563 56.5591 223.267 56.8L223.063 57.3372ZM218.821 56.0775C218.117 55.9108 217.376 55.744 216.653 55.5958L216.764 55.0586C217.505 55.2068 218.246 55.355 218.969 55.5402L218.821 56.0775ZM197.96 55.9293C197.57 55.3179 197.126 54.7251 196.663 54.1693L197.089 53.7988C197.589 54.3731 198.052 54.9845 198.441 55.6329L197.96 55.9293ZM199.016 55.8367L198.867 55.2994C199.553 55.0956 200.294 54.9289 201.072 54.7807L201.183 55.3179C200.424 55.4847 199.701 55.6514 199.016 55.8367ZM214.448 55.2253C213.726 55.1142 212.966 55.0215 212.244 54.966L212.299 54.4102C213.04 54.4843 213.8 54.5769 214.541 54.6881L214.448 55.2253ZM203.369 55.003L203.314 54.4472C204.036 54.3546 204.796 54.299 205.556 54.262L205.593 54.8177C204.814 54.8548 204.073 54.9104 203.369 55.003ZM210.021 54.7992C209.298 54.7622 208.557 54.7436 207.834 54.7436H207.797V54.1879H207.834C208.557 54.1879 209.298 54.2064 210.039 54.2435L210.021 54.7992ZM195.088 52.6503C194.532 52.1871 193.939 51.761 193.309 51.372L193.606 50.8903C194.254 51.2979 194.884 51.7425 195.458 52.2242L195.088 52.6503ZM163.351 51.7425L163.092 51.2423C163.722 50.9089 164.407 50.5939 165.149 50.2975L165.352 50.8162C164.63 51.1126 163.963 51.4276 163.351 51.7425ZM191.364 50.3346C190.716 50.0382 190.03 49.7603 189.308 49.538L189.474 49.0192C190.215 49.2601 190.919 49.538 191.586 49.8529L191.364 50.3346ZM167.446 50.0752L167.279 49.538C167.983 49.3157 168.706 49.1119 169.447 48.9081L169.576 49.4453C168.854 49.6491 168.131 49.8529 167.446 50.0752ZM171.744 48.9637L171.633 48.4264C172.355 48.2782 173.115 48.1485 173.856 48.0374L173.93 48.5932C173.208 48.6858 172.467 48.8155 171.744 48.9637ZM187.177 48.9266C186.473 48.7599 185.75 48.6302 185.009 48.5191L185.083 47.9633C185.843 48.0744 186.584 48.2226 187.307 48.3894L187.177 48.9266ZM176.135 48.3153L176.079 47.7595C176.839 47.6854 177.58 47.6298 178.321 47.6113L178.34 48.1671C177.636 48.2041 176.876 48.2597 176.135 48.3153ZM182.805 48.2597C182.082 48.2041 181.341 48.1671 180.581 48.1485L180.6 47.5928C181.36 47.6113 182.119 47.6484 182.86 47.7039L182.805 48.2597Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M235.662 69.5831C235.625 69.2311 235.569 68.8606 235.495 68.5086L236.032 68.3975C236.106 68.768 236.162 69.1385 236.199 69.5276L235.662 69.5831Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M478.475 92.9248C478.326 92.2394 478.104 91.5354 477.826 90.8499L478.345 90.6462C478.641 91.3687 478.864 92.1097 479.031 92.8322L478.475 92.9248ZM476.844 88.8862C476.492 88.2749 476.066 87.6635 475.603 87.0707L476.048 86.7373C476.529 87.3486 476.955 87.9785 477.326 88.6083L476.844 88.8862ZM443.2 86.4964L443.07 85.9592C443.718 85.811 444.311 85.459 444.811 84.9032L445.219 85.2737C444.645 85.9036 443.959 86.3112 443.2 86.4964ZM440.847 86.3112C440.143 86.0518 439.457 85.6257 438.883 85.0514L439.272 84.6439C439.809 85.1626 440.421 85.5516 441.05 85.7739L440.847 86.3112ZM474.176 85.3849C473.695 84.8662 473.157 84.3475 472.602 83.8288L472.972 83.4212C473.547 83.9399 474.084 84.4771 474.584 84.9959L474.176 85.3849ZM446.423 83.2915L445.904 83.0877C446.145 82.4764 446.331 81.7724 446.479 80.9943L447.035 81.087C446.886 81.9021 446.683 82.6431 446.423 83.2915ZM437.512 83.1804C437.16 82.4579 436.956 81.7168 436.9 80.9388L437.456 80.9017C437.512 81.6057 437.697 82.2911 438.031 82.9395L437.512 83.1804ZM470.897 82.4023C470.323 81.9577 469.73 81.5131 469.119 81.087L469.434 80.6238C470.064 81.0499 470.675 81.5131 471.249 81.9577L470.897 82.4023ZM467.247 79.8643C466.618 79.4752 465.988 79.1047 465.321 78.7527L465.58 78.2711C466.247 78.6416 466.895 79.0121 467.525 79.4011L467.247 79.8643ZM447.257 78.8268L446.701 78.8083C446.72 78.4378 446.72 78.0673 446.72 77.6783C446.72 77.3263 446.72 76.9743 446.701 76.6038L447.257 76.5853C447.275 76.9558 447.275 77.3263 447.275 77.6783C447.294 78.0488 447.275 78.4378 447.257 78.8268ZM437.679 78.7898L437.141 78.6231C437.364 77.9006 437.716 77.2151 438.197 76.5482L438.642 76.8817C438.197 77.493 437.882 78.1229 437.679 78.7898ZM463.357 77.7153C462.69 77.4004 462.023 77.0854 461.337 76.789L461.56 76.2703C462.245 76.5667 462.931 76.8817 463.598 77.2151L463.357 77.7153ZM459.262 75.9554C458.558 75.696 457.854 75.4367 457.169 75.2144L457.336 74.6771C458.04 74.8994 458.762 75.1588 459.466 75.4181L459.262 75.9554ZM440.124 75.307L439.772 74.8624C440.346 74.4178 441.013 74.0287 441.792 73.7323L441.995 74.251C441.273 74.5474 440.643 74.8994 440.124 75.307ZM455.038 74.5845C454.316 74.3992 453.593 74.214 452.871 74.0658L452.982 73.5285C453.704 73.6767 454.445 73.862 455.168 74.0473L455.038 74.5845ZM446.46 74.4178C446.386 74.0843 446.312 73.7694 446.219 73.4544C445.46 73.4915 444.756 73.5656 444.089 73.6767L443.996 73.121C444.645 73.0098 445.33 72.9357 446.053 72.8801C445.979 72.6949 445.923 72.4911 445.849 72.3058L446.368 72.1021C446.646 72.806 446.868 73.5471 447.016 74.2881L446.46 74.4178ZM450.684 73.6953C449.925 73.5841 449.184 73.51 448.48 73.473L448.517 72.9172C449.239 72.9542 449.999 73.0283 450.759 73.1395L450.684 73.6953ZM444.867 70.3607C444.496 69.7493 444.089 69.138 443.607 68.5637L444.033 68.2117C444.515 68.823 444.96 69.4344 445.33 70.0828L444.867 70.3607ZM442.125 66.9334C441.606 66.4332 441.05 65.9516 440.458 65.4699L440.81 65.0253C441.421 65.507 441.995 66.0072 442.514 66.5259L442.125 66.9334ZM438.679 64.1916C438.086 63.8026 437.438 63.4136 436.789 63.0431L437.067 62.5614C437.734 62.9319 438.383 63.3209 438.994 63.7285L438.679 64.1916ZM434.807 62.0242C434.158 61.7092 433.473 61.4128 432.769 61.1349L432.973 60.6162C433.677 60.9126 434.381 61.209 435.029 61.524L434.807 62.0242ZM430.694 60.3383C430.008 60.0975 429.286 59.8752 428.582 59.6529L428.73 59.1156C429.453 59.3194 430.175 59.5603 430.879 59.8011L430.694 60.3383ZM426.433 59.0786C425.71 58.9119 424.988 58.7451 424.265 58.5969L424.376 58.0597C425.117 58.2079 425.858 58.3746 426.581 58.5414L426.433 59.0786ZM411.037 58.319L410.907 57.7818C411.574 57.6151 412.334 57.4854 413.149 57.3928L413.205 57.9485C412.408 58.0226 411.685 58.1523 411.037 58.319ZM422.06 58.2264C421.319 58.1153 420.578 58.0226 419.856 57.9485L419.911 57.3928C420.652 57.4669 421.393 57.5595 422.153 57.6706L422.06 58.2264ZM417.632 57.8003C416.873 57.7633 416.113 57.7633 415.409 57.7818L415.391 57.226C416.113 57.2075 416.873 57.2075 417.651 57.2446L417.632 57.8003Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M479.068 97.0373L478.53 96.9261C478.604 96.5741 478.641 96.2036 478.678 95.8516L479.234 95.8886C479.197 96.2777 479.142 96.6667 479.068 97.0373Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M326.765 56.0139C327.014 54.9584 326.36 53.9008 325.305 53.6515C324.249 53.4023 323.191 54.0559 322.942 55.1114C322.693 56.1668 323.347 57.2245 324.402 57.4737C325.458 57.7229 326.515 57.0693 326.765 56.0139Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M459.344 60.1838C459.594 59.1284 458.94 58.0707 457.884 57.8215C456.829 57.5722 455.771 58.2258 455.522 59.2813C455.273 60.3368 455.926 61.3944 456.982 61.6436C458.037 61.8929 459.095 61.2393 459.344 60.1838Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M82.4443 65.7057C82.6947 64.6505 82.0421 63.5921 80.9868 63.3418C79.9314 63.0915 78.873 63.744 78.6227 64.7993C78.3724 65.8545 79.0249 66.9129 80.0803 67.1632C81.1356 67.4135 82.194 66.761 82.4443 65.7057Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M158.238 68.1475C158.44 67.2913 157.911 66.4328 157.055 66.2299C156.198 66.027 155.34 66.5566 155.137 67.4127C154.934 68.2688 155.464 69.1274 156.32 69.3303C157.176 69.5332 158.035 69.0036 158.238 68.1475Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M467.253 102.499C467.875 101.876 467.875 100.868 467.253 100.245C466.63 99.6232 465.622 99.6232 464.999 100.245C464.377 100.868 464.377 101.876 464.999 102.499C465.622 103.121 466.63 103.121 467.253 102.499Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M301.126 90.8108C301.267 89.9423 300.677 89.1239 299.808 88.983C298.94 88.842 298.121 89.4318 297.98 90.3004C297.839 91.1689 298.429 91.9873 299.298 92.1283C300.167 92.2692 300.985 91.6794 301.126 90.8108Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M131.967 61.1169C132.589 60.4946 132.589 59.4858 131.967 58.8636C131.344 58.2414 130.336 58.2414 129.713 58.8636C129.091 59.4858 129.091 60.4946 129.713 61.1169C130.336 61.7391 131.344 61.7391 131.967 61.1169Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M353.923 64.8077C354.125 63.9514 353.595 63.0933 352.738 62.8911C351.882 62.6889 351.024 63.2192 350.822 64.0755C350.619 64.9318 351.15 65.7899 352.006 65.9921C352.862 66.1943 353.721 65.664 353.923 64.8077Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M319.385 219.565C319.551 219.954 319.588 220.232 319.588 220.232C319.588 220.232 311.381 221.159 310.992 221.085C310.918 221.066 310.825 220.899 310.751 220.603L319.385 219.565Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M319.385 219.565L310.751 220.602C310.455 219.528 310.195 216.971 310.195 216.971L313.363 216.119C313.363 216.119 314.216 217.379 316.143 217.379C318.143 217.379 319.033 218.731 319.385 219.565Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M314.957 156.152C315.012 156.097 315.994 155.263 316.513 154.244C316.847 153.725 317.143 152.947 317.402 153.096C317.662 153.225 317.254 154.337 316.439 155.374C315.809 156.171 315.642 156.523 315.642 156.523C315.642 156.523 316.198 156.134 316.958 155.133C317.717 154.133 317.847 153.67 318.143 153.707C318.44 153.744 317.847 154.837 317.124 155.819C316.402 156.819 316.198 157.079 316.198 157.079C316.198 157.079 316.624 156.838 317.254 156.115C317.884 155.393 318.273 154.8 318.403 155.059C318.532 155.319 316.124 159.154 313.808 159.765L311.955 158.765C311.955 158.765 311.233 157.449 312.159 155.986C312.956 154.726 314.104 154.522 314.382 154.522C314.66 154.522 312.9 155.986 313.03 156.301C313.16 156.634 313.956 156.171 314.623 155.448C315.29 154.726 315.939 153.392 316.142 153.133C316.346 152.873 316.643 152.762 316.272 153.8C315.92 154.8 314.994 156.097 314.957 156.152Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M311.974 158.764L313.827 159.764C313.827 159.764 311.974 169.953 306.49 170.546C303.303 170.898 300.691 168.305 299.042 166.082C300.339 160.265 299.802 156.467 299.802 156.467C299.802 156.467 302.192 166.063 305.693 166.063C309.195 166.045 311.974 158.764 311.974 158.764Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M313.364 216.119L310.195 216.972C310.195 216.972 306.564 211.488 300.413 199.632C294.262 187.794 291.02 182.366 291.02 182.366C291.983 181.921 294.114 173.288 294.262 172.733C295.17 172.64 296.152 172.455 297.171 172.177C298.171 174.159 298.431 176.345 301.469 186.923C304.508 197.538 313.364 216.119 313.364 216.119Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M300.135 146.26C300.321 147.519 299.024 147.686 298.783 147.705C298.82 147.427 298.857 147.149 298.875 146.852C298.931 146.241 298.931 145.667 298.875 145.111C299.135 145.093 299.969 145.074 300.135 146.26Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M294.244 172.752C293.595 172.826 292.984 172.863 292.391 172.863C288.63 172.881 286.444 171.603 286.444 171.603C286.444 171.603 287.833 168.954 289.093 163.396C289.241 162.748 289.334 162.155 289.408 161.618C289.908 157.635 288.612 155.93 288.445 155.745C290.26 155.004 291.761 154.578 292.391 154.467C292.391 154.467 294.781 157.042 296.763 154.541C296.893 154.8 299.802 156.468 299.802 156.468C299.802 156.468 300.339 160.265 299.042 166.082C298.635 167.935 298.023 169.991 297.171 172.214C296.115 172.474 295.152 172.659 294.244 172.752Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M298.783 147.723C298.468 150.002 297.69 151.447 296.56 152.151C295.948 152.54 295.244 152.707 294.447 152.688C293.836 152.67 293.243 152.466 292.724 152.077C291.724 151.354 290.909 150.021 290.501 148.224C290.353 147.594 290.26 146.89 290.223 146.149C290.205 145.964 290.205 145.797 290.223 145.63C290.223 145.63 294.651 144.908 296.837 142.647C297.375 143.703 298.82 145.167 298.82 145.167C298.82 145.167 298.838 145.167 298.894 145.148C298.931 145.686 298.931 146.26 298.894 146.89C298.857 147.149 298.82 147.446 298.783 147.723Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M298.876 145.13C298.839 145.13 298.802 145.148 298.802 145.148C298.802 145.148 297.338 143.685 296.819 142.629C294.633 144.87 290.205 145.611 290.205 145.611C290.242 142.536 292.039 140.609 293.929 140.202C294.281 140.128 294.633 140.109 294.966 140.128C296.949 140.276 298.635 142.073 298.876 145.13Z"
                                                        fill="#256D9E" />
                                                    <path
                                                        d="M296.56 152.15C296.56 152.15 296.634 154.262 296.763 154.54C294.781 157.06 292.391 154.466 292.391 154.466C292.725 153.743 292.65 152.15 292.65 152.15L292.706 152.076C293.243 152.465 293.818 152.669 294.429 152.688C295.244 152.706 295.948 152.521 296.56 152.15Z"
                                                        fill="#E5AA6F" />
                                                    <path
                                                        d="M293.929 140.183C292.039 140.591 290.242 142.536 290.205 145.611C290.094 145.63 289.019 145.797 289.019 146.871C289.019 147.39 289.316 147.742 289.612 147.946L289.538 148.001C289.538 148.001 288.149 151.039 285.962 151.373C282.053 151.966 280.942 149.594 280.942 149.594C280.942 149.594 283.517 150.187 283.924 146.426C284.314 142.647 284.388 136.312 288.556 136.312C292.725 136.312 293.91 140.146 293.91 140.146L293.929 140.183Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M294.244 172.752C294.114 173.308 291.965 181.941 291.002 182.385C292.039 176.327 292.373 172.974 292.391 172.863C292.984 172.863 293.596 172.826 294.244 172.752Z"
                                                        fill="#14605A" />
                                                    <path
                                                        d="M286.444 171.603C286.444 171.603 288.63 172.881 292.391 172.862C292.373 172.973 292.039 176.327 291.002 182.384C291.002 182.384 289.964 187.09 289.557 194.889C289.168 202.688 288.89 218.231 288.89 218.231L285.518 218.694C285.518 218.694 284.017 206.264 283.35 192.629C283.091 187.183 282.813 183.959 283.924 178.29C285.314 178.902 286.778 178.624 286.778 178.624C286.778 178.624 286.778 178.624 286.741 178.401C286.703 178.161 284.591 178.235 284.295 177.679C286.481 178.531 287.963 177.938 287.871 177.642C287.778 177.345 286.148 177.975 284.758 177.142C286.981 177.901 288.223 177.105 288.13 176.771C288.037 176.438 287.37 176.734 286.611 176.901C285.851 177.068 285.184 176.641 285.184 176.641C286.148 176.808 286.963 176.716 287.834 176.252C288.686 175.789 287.982 175.845 287.408 175.956C286.685 176.086 285.925 176.456 284.962 175.752C285.851 175.548 286.574 174.659 286.222 174.604C285.851 174.53 285.555 175.104 285.073 175.141C285.036 175.159 284.999 175.159 284.962 175.159C285.777 172.844 286.444 171.603 286.444 171.603Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M289.556 222.326C289.575 222.845 289.538 223.234 289.371 223.29C288.741 223.53 285.499 223.679 285.258 223.512C285.203 223.475 285.184 223.123 285.184 222.641C285.369 222.623 289.112 222.604 289.556 222.326Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M290.501 148.205L290.353 148.242C290.353 148.242 289.982 148.168 289.63 147.927C289.316 147.723 289.038 147.371 289.038 146.853C289.038 145.778 290.112 145.611 290.223 145.593C290.223 145.76 290.223 145.945 290.223 146.111C290.242 146.871 290.353 147.575 290.501 148.205Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M288.89 218.213C288.89 218.213 289.501 220.862 289.557 222.326C289.112 222.585 285.369 222.622 285.184 222.622C285.203 221.103 285.481 218.194 285.481 218.194L288.89 218.213Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M288.445 155.745C288.593 155.93 289.89 157.635 289.408 161.618C288.797 161.618 284.869 161.784 282.813 165.249C280.571 169.028 283.146 174.771 283.146 174.771L281.886 176.086C281.886 176.086 275.606 171.066 278.255 164.434C279.997 160.043 284.832 157.227 288.445 155.745Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M288.13 176.79C288.223 177.123 286.963 177.92 284.758 177.16C286.147 177.994 287.759 177.364 287.871 177.66C287.963 177.957 286.481 178.549 284.295 177.697C284.591 178.253 286.703 178.197 286.74 178.42C286.777 178.642 286.777 178.642 286.777 178.642C286.777 178.642 285.314 178.92 283.924 178.309C283.109 177.957 282.331 177.29 281.886 176.104L283.146 174.789C283.146 174.789 283.85 175.419 284.962 175.178C284.999 175.178 285.036 175.159 285.073 175.159C285.573 175.122 285.87 174.566 286.222 174.622C286.592 174.696 285.851 175.585 284.962 175.771C285.925 176.456 286.685 176.104 287.407 175.974C287.982 175.863 288.704 175.808 287.833 176.271C286.981 176.734 286.147 176.827 285.184 176.66C285.184 176.66 285.851 177.086 286.611 176.919C287.37 176.752 288.037 176.456 288.13 176.79Z"
                                                        fill="#F6C7A6" />
                                                    <path
                                                        d="M296.152 149.835C296.411 149.816 296.56 149.779 296.56 149.779C296.56 149.779 295.948 150.946 294.688 150.854C293.428 150.761 292.761 149.724 292.761 149.724C292.873 149.742 292.965 149.761 293.076 149.761V149.816C293.076 149.816 294.41 150.835 296.17 149.853L296.152 149.835Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M296.152 149.835V149.872C294.392 150.854 293.058 149.835 293.058 149.835V149.779C294.392 149.965 295.559 149.89 296.152 149.835Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M296.152 147.26C296.152 147.482 296.041 147.668 295.911 147.668C295.782 147.668 295.67 147.482 295.67 147.26C295.67 147.038 295.782 146.853 295.911 146.853C296.041 146.853 296.152 147.038 296.152 147.26Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M293.577 147.26C293.577 147.482 293.465 147.668 293.336 147.668C293.206 147.668 293.095 147.482 293.095 147.26C293.095 147.038 293.206 146.853 293.336 146.853C293.465 146.853 293.577 147.038 293.577 147.26Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M292.558 146.074L292.465 145.815C292.502 145.797 293.206 145.556 293.743 145.556V145.834C293.262 145.834 292.576 146.056 292.558 146.074Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M296.8 146.074C296.8 146.074 296.115 145.834 295.615 145.834V145.556C296.152 145.556 296.856 145.797 296.893 145.815L296.8 146.074Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M294.484 147.557C294.484 147.557 293.854 149.113 294.521 149.15C295.188 149.168 294.484 147.557 294.484 147.557Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M306.12 169.343C305.582 169.343 305.156 168.768 305.156 168.046C305.156 167.323 305.582 166.749 306.12 166.749C306.657 166.749 307.083 167.323 307.083 168.046C307.083 168.787 306.657 169.343 306.12 169.343ZM306.12 167.175C305.823 167.175 305.564 167.583 305.564 168.064C305.564 168.546 305.823 168.954 306.12 168.954C306.416 168.954 306.675 168.546 306.675 168.064C306.694 167.583 306.434 167.175 306.12 167.175Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M285.981 161.933C285.444 161.933 285.018 161.358 285.018 160.636C285.018 159.913 285.444 159.339 285.981 159.339C286.518 159.339 286.944 159.913 286.944 160.636C286.944 161.377 286.518 161.933 285.981 161.933ZM285.981 159.765C285.685 159.765 285.425 160.173 285.425 160.654C285.425 161.136 285.685 161.544 285.981 161.544C286.277 161.544 286.537 161.136 286.537 160.654C286.537 160.173 286.277 159.765 285.981 159.765Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M292.502 160.154C291.984 160.154 291.558 159.635 291.502 158.95C291.483 158.617 291.539 158.302 291.687 158.042C291.854 157.764 292.076 157.598 292.354 157.579C292.891 157.542 293.355 158.061 293.41 158.783C293.429 159.117 293.373 159.432 293.225 159.691C293.058 159.969 292.836 160.136 292.558 160.154C292.539 160.154 292.521 160.154 292.502 160.154ZM292.41 157.968H292.391C292.206 157.987 292.095 158.135 292.039 158.227C291.928 158.413 291.891 158.654 291.91 158.894C291.947 159.376 292.243 159.765 292.539 159.747C292.725 159.728 292.836 159.58 292.891 159.487C293.003 159.302 293.04 159.061 293.021 158.82C292.984 158.357 292.706 157.968 292.41 157.968Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M293.91 166.231C293.873 166.231 293.836 166.231 293.799 166.231C293.54 166.194 293.299 166.008 293.169 165.73C293.04 165.471 292.984 165.138 293.04 164.823C293.077 164.489 293.225 164.193 293.41 163.989C293.633 163.748 293.892 163.655 294.151 163.692C294.411 163.73 294.651 163.915 294.781 164.193C294.911 164.452 294.966 164.786 294.911 165.101C294.874 165.434 294.726 165.73 294.54 165.934C294.374 166.12 294.133 166.231 293.91 166.231ZM294.059 164.063C293.892 164.063 293.762 164.174 293.707 164.248C293.558 164.396 293.466 164.619 293.429 164.878C293.392 165.119 293.429 165.36 293.521 165.564C293.577 165.656 293.67 165.823 293.855 165.842C294.04 165.86 294.188 165.73 294.262 165.656C294.411 165.508 294.503 165.286 294.54 165.026C294.577 164.786 294.54 164.545 294.448 164.341C294.392 164.248 294.299 164.082 294.114 164.063C294.096 164.063 294.077 164.063 294.059 164.063Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M290.131 170.677C290.094 170.677 290.075 170.677 290.038 170.677C289.779 170.64 289.538 170.473 289.39 170.177C289.26 169.917 289.204 169.602 289.241 169.269C289.279 168.935 289.408 168.639 289.612 168.417C289.834 168.176 290.094 168.065 290.353 168.102C290.612 168.139 290.853 168.305 291.002 168.602C291.131 168.861 291.187 169.176 291.15 169.51C291.057 170.177 290.612 170.677 290.131 170.677ZM290.26 168.491C290.094 168.491 289.964 168.602 289.908 168.676C289.76 168.824 289.668 169.047 289.631 169.306C289.594 169.547 289.631 169.788 289.723 169.991C289.779 170.084 289.89 170.251 290.057 170.269C290.353 170.306 290.668 169.936 290.724 169.454C290.761 169.213 290.724 168.972 290.631 168.769C290.575 168.676 290.464 168.509 290.298 168.491C290.298 168.491 290.279 168.491 290.26 168.491Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M297.671 161.47C297.153 161.47 296.726 160.951 296.671 160.265C296.652 159.932 296.708 159.617 296.856 159.358C297.023 159.08 297.245 158.913 297.523 158.894C298.06 158.857 298.524 159.376 298.579 160.099C298.598 160.432 298.542 160.747 298.394 161.007C298.227 161.284 298.005 161.451 297.727 161.47C297.708 161.47 297.69 161.47 297.671 161.47ZM297.579 159.302H297.56C297.375 159.321 297.264 159.469 297.208 159.561C297.097 159.747 297.06 159.988 297.078 160.228C297.116 160.71 297.412 161.099 297.708 161.081C297.894 161.062 298.005 160.914 298.06 160.821C298.172 160.636 298.209 160.395 298.19 160.154C298.153 159.673 297.875 159.302 297.579 159.302Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M295.893 171.251C295.837 171.251 295.781 171.251 295.726 171.233C295.466 171.177 295.244 170.974 295.133 170.677C295.022 170.399 295.003 170.084 295.077 169.751C295.152 169.436 295.318 169.139 295.522 168.954C295.763 168.75 296.041 168.658 296.3 168.713C296.819 168.843 297.097 169.491 296.949 170.195C296.8 170.825 296.356 171.251 295.893 171.251ZM296.133 169.102C295.985 169.102 295.856 169.195 295.8 169.25C295.652 169.399 295.522 169.602 295.466 169.843C295.411 170.084 295.429 170.325 295.504 170.529C295.541 170.622 295.633 170.807 295.818 170.844C296.115 170.918 296.467 170.566 296.578 170.103C296.689 169.64 296.522 169.176 296.226 169.102C296.189 169.102 296.17 169.102 296.133 169.102Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M280.349 164.859C279.811 164.859 279.385 164.285 279.385 163.562C279.385 162.84 279.811 162.266 280.349 162.266C280.886 162.266 281.312 162.84 281.312 163.562C281.312 164.285 280.886 164.859 280.349 164.859ZM280.349 162.673C280.052 162.673 279.793 163.081 279.793 163.562C279.793 164.044 280.052 164.452 280.349 164.452C280.645 164.452 280.904 164.044 280.904 163.562C280.923 163.081 280.664 162.673 280.349 162.673Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M279.886 171.529C279.348 171.529 278.922 170.955 278.922 170.232C278.922 169.51 279.348 168.936 279.886 168.936C280.423 168.936 280.849 169.51 280.849 170.232C280.849 170.973 280.423 171.529 279.886 171.529ZM279.886 169.343C279.589 169.343 279.33 169.751 279.33 170.232C279.33 170.714 279.589 171.122 279.886 171.122C280.182 171.122 280.441 170.714 280.441 170.232C280.46 169.751 280.2 169.343 279.886 169.343Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M301.617 167.435C301.08 167.435 300.654 166.86 300.654 166.138C300.654 165.415 301.08 164.841 301.617 164.841C302.155 164.841 302.581 165.415 302.581 166.138C302.581 166.86 302.155 167.435 301.617 167.435ZM301.617 165.248C301.321 165.248 301.062 165.656 301.062 166.138C301.062 166.619 301.321 167.027 301.617 167.027C301.914 167.027 302.173 166.619 302.173 166.138C302.173 165.656 301.932 165.248 301.617 165.248Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M310.825 165.452C310.288 165.452 309.862 164.878 309.862 164.155C309.862 163.433 310.288 162.858 310.825 162.858C311.362 162.858 311.789 163.433 311.789 164.155C311.789 164.878 311.362 165.452 310.825 165.452ZM310.825 163.266C310.529 163.266 310.269 163.674 310.269 164.155C310.269 164.637 310.529 165.045 310.825 165.045C311.122 165.045 311.381 164.637 311.381 164.155C311.381 163.674 311.122 163.266 310.825 163.266Z"
                                                        fill="#63B49B" />
                                                    <path
                                                        d="M521.235 138.701C521.346 138.516 523.254 135.552 523.384 135.7C523.513 135.848 521.772 138.868 521.661 139.053C521.772 138.886 523.458 136.533 523.662 136.645C523.865 136.756 522.161 139.127 521.994 139.349C522.161 139.164 523.532 137.534 523.643 137.775C523.736 138.015 520.846 141.739 520.568 142.11L518.4 140.905C518.382 140.276 520.104 136.811 520.234 136.83C520.568 136.867 519.993 138.738 520.179 138.849C520.364 138.96 522.198 135.589 522.365 135.718C522.55 135.848 521.309 138.534 521.235 138.701Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M518.4 140.924L520.568 142.128L520.642 142.165C520.642 142.165 520.123 143.443 519.234 145.24C518.604 144.536 517.863 143.795 517.048 143.054C517.789 141.72 518.233 140.831 518.233 140.831L518.4 140.924Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M519.66 222.641C519.697 222.919 519.678 223.085 519.678 223.085C519.678 223.085 513.472 223.233 513.083 223.141C512.99 223.122 512.897 222.937 512.805 222.678L519.66 222.641Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M519.66 222.64L512.805 222.677C512.564 221.899 512.434 220.399 512.434 220.399V220.287L515.584 219.973C515.584 219.973 515.584 219.935 515.584 219.898H515.676C518.881 220.158 519.548 221.825 519.66 222.64Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M519.234 145.241C519.141 145.407 519.067 145.593 518.974 145.759C518.344 145.055 517.603 144.296 516.77 143.555C516.862 143.388 516.973 143.221 517.047 143.055C517.881 143.796 518.604 144.537 519.234 145.241Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M518.974 145.759C518.344 147 517.566 148.427 516.677 149.835C516.103 148.909 515.436 147.908 514.639 146.908C515.473 145.722 516.195 144.537 516.77 143.555C517.603 144.296 518.344 145.055 518.974 145.759Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M516.677 149.834C516.566 150.001 516.455 150.186 516.344 150.353C515.769 149.408 515.102 148.408 514.306 147.389C514.417 147.222 514.528 147.074 514.639 146.907C515.436 147.908 516.103 148.889 516.677 149.834Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M515.584 219.973L512.601 220.269C512.508 220.269 512.416 220.213 512.397 220.139C511.897 218.62 507.766 206.264 505.283 198.001C503.115 190.795 501.189 185.811 500.559 184.218C500.484 184.033 500.225 184.051 500.17 184.237C499.743 185.756 498.539 190.239 497.483 196.149C496.26 203.077 492.907 219.065 492.518 220.88C492.499 220.973 492.407 221.047 492.314 221.047L489.239 220.88C489.128 220.88 489.035 220.769 489.053 220.658C489.183 218.954 490.035 206.986 491.073 197.26C492.11 187.516 493.944 177.771 494.204 176.437C494.222 176.345 494.297 176.271 494.389 176.271C500.318 175.993 505.061 175.326 506.024 175.196C506.135 175.178 506.228 175.252 506.246 175.344C506.58 176.604 508.599 184.478 510.693 194.426C512.879 204.856 515.547 218.62 515.584 219.917C515.584 219.954 515.584 219.973 515.584 219.973Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M514.305 147.39C515.102 148.409 515.769 149.409 516.343 150.354C515.491 151.651 514.546 152.91 513.546 153.985C512.953 152.984 512.23 151.928 511.415 150.854C512.471 149.798 513.434 148.594 514.305 147.39Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M513.546 153.966C513.416 154.114 513.286 154.244 513.138 154.373C512.545 153.373 511.823 152.298 510.989 151.224C511.119 151.094 511.267 150.965 511.397 150.835C512.249 151.909 512.953 152.965 513.546 153.966Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M513.157 154.373C513.027 154.503 512.897 154.632 512.749 154.762C511.6 155.818 510.581 156.689 509.729 157.374C509.359 156.17 508.858 154.762 508.173 153.299C508.988 152.854 509.803 152.317 510.544 151.668C510.711 151.52 510.878 151.39 511.026 151.224C511.841 152.317 512.545 153.373 513.157 154.373Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M509.729 157.374C509.581 157.504 509.414 157.615 509.266 157.745C508.895 156.504 508.377 155.077 507.654 153.558C507.821 153.484 507.988 153.391 508.154 153.299C508.84 154.762 509.359 156.152 509.729 157.374Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M507.654 153.559C508.358 155.078 508.877 156.504 509.266 157.745C507.117 159.431 506.024 159.968 506.024 159.968L505.394 156.949L505.283 156.393L504.912 154.615C505.802 154.337 506.728 154.003 507.654 153.559Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M506.209 165.952C506.228 167.249 506.228 168.601 506.228 169.861C500.596 171.677 495.464 171.306 493.333 171.028C493.092 169.731 492.833 168.379 492.573 167.082C494.204 167.342 499.91 168.027 506.209 165.952Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M506.228 169.861C506.228 170.065 506.228 170.25 506.228 170.454C500.614 172.214 495.519 171.844 493.444 171.566C493.407 171.381 493.37 171.214 493.351 171.029C495.463 171.306 500.595 171.677 506.228 169.861Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M506.209 165.359C506.209 165.563 506.209 165.748 506.209 165.952C499.91 168.009 494.204 167.342 492.573 167.082C492.536 166.897 492.499 166.712 492.462 166.545C494.148 166.804 499.891 167.471 506.209 165.359Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M506.228 170.454C506.228 173.085 506.209 175.141 506.209 175.141C506.209 175.141 500.966 175.938 494.222 176.253C494.093 175.215 493.796 173.492 493.444 171.566C495.519 171.844 500.614 172.214 506.228 170.454Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M506.116 161.58C506.153 162.636 506.19 163.97 506.209 165.359C499.891 167.471 494.166 166.804 492.481 166.545C492.184 165.063 491.906 163.71 491.721 162.747C491.943 162.784 498.65 164.137 506.116 161.58Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M506.098 161.006C506.098 161.191 506.116 161.376 506.116 161.58C498.65 164.137 491.943 162.784 491.702 162.729C491.665 162.544 491.628 162.358 491.591 162.192C492.147 162.303 498.743 163.526 506.042 161.006H506.098Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M506.098 161.006H506.042C498.743 163.526 492.147 162.303 491.592 162.192C491.462 161.543 491.388 161.173 491.388 161.173L491.11 158.135L491.24 158.116C491.24 158.116 497.909 159.598 505.32 156.912L505.394 156.894L506.024 159.913C506.043 160.247 506.061 160.599 506.098 161.006Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M505.283 156.355L505.394 156.911L505.32 156.93C497.909 159.616 491.24 158.134 491.24 158.134L491.11 158.153L491.054 157.597H491.091C491.091 157.597 497.761 159.079 505.172 156.393L505.283 156.355Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M504.912 154.596L505.283 156.374L505.172 156.393C497.761 159.079 491.091 157.597 491.091 157.597H491.054L490.832 155.207L490.851 155.151C493.537 155.744 495.649 155.652 495.649 155.652C496.631 157.634 499.41 156.708 499.91 155.337C499.91 155.318 502.17 155.374 504.912 154.596Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M501.837 148.742C501.929 149.909 500.577 149.853 500.577 149.853H500.466C500.521 148.686 500.336 147.723 500.336 147.723C500.336 147.723 501.281 147.63 501.67 148.242C501.763 148.371 501.818 148.538 501.837 148.742Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M501.596 147.131C501.596 147.131 502.207 147.742 501.689 148.242H501.67C501.281 147.631 500.336 147.723 500.336 147.723C500.336 147.723 498.947 146.241 498.576 144.945C496.353 145.686 494.5 145.222 494.5 145.222C494.5 145.222 494.556 147.538 493.389 148.149C493.389 148.149 492.833 148.149 492.444 148.446L492.37 148.335C492.37 148.335 491.629 147.131 492.425 146.76C491.536 145.222 492.944 144.389 492.944 144.389C492.944 144.389 493.741 142.444 495.352 142.721C496.52 141.091 497.761 142.907 497.761 142.907C497.761 142.907 499.299 141.925 499.799 143.555C499.799 143.555 501.466 143.555 501.059 145.13C502.615 146.056 501.596 147.131 501.596 147.131Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M500.355 147.722C500.355 147.722 500.522 148.686 500.484 149.853C500.429 151.094 500.114 152.594 499.095 153.428C498.632 153.817 498.02 154.058 497.224 154.114C496.631 154.151 496.131 154.058 495.705 153.873C494.297 153.261 493.759 151.668 493.537 150.316C493.352 149.13 493.426 148.148 493.426 148.148C494.593 147.537 494.537 145.221 494.537 145.221C494.537 145.221 496.39 145.684 498.613 144.943C498.965 146.24 500.355 147.722 500.355 147.722Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M499.095 153.466C499.095 153.466 499.095 154.522 499.892 155.318C499.391 156.671 496.612 157.597 495.63 155.633C496.001 155.077 495.63 153.966 495.63 153.966L495.667 153.873C496.094 154.059 496.594 154.151 497.187 154.114C497.983 154.077 498.595 153.818 499.058 153.429L499.095 153.466Z"
                                                        fill="#DB805B" />
                                                    <path
                                                        d="M493.519 150.316C493.5 150.316 492.203 150.464 492.11 149.297C492.073 148.871 492.24 148.612 492.462 148.445C492.852 148.148 493.407 148.148 493.407 148.148C493.407 148.148 493.333 149.13 493.519 150.316Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M492.499 221.029C492.499 221.029 492.518 222.604 492.351 223.456L485.144 224.141C485.181 223.271 485.681 221.455 489.053 220.844L492.499 221.029Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M492.333 223.455C492.277 223.733 492.203 223.937 492.092 223.974C491.666 224.122 485.144 224.622 485.144 224.622C485.144 224.622 485.107 224.437 485.126 224.159L492.333 223.455Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M491.091 158.153L491.369 161.191C489.869 160.747 488.479 160.117 487.164 159.394C487.442 157.449 487.868 155.745 488.294 154.393C489.165 154.726 490.017 154.967 490.814 155.134L490.795 155.189L491.017 157.579L491.091 158.153Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M487.812 154.188C487.979 154.263 488.146 154.318 488.312 154.392C487.886 155.745 487.46 157.449 487.182 159.394C487.016 159.302 486.83 159.209 486.664 159.098C486.96 157.171 487.386 155.504 487.812 154.188Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M487.812 154.188C487.386 155.503 486.96 157.17 486.664 159.097C485.404 158.356 484.237 157.522 483.181 156.633C483.681 155.077 484.274 153.706 484.83 152.539C485.774 153.243 486.793 153.78 487.812 154.188Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M484.83 152.54C484.274 153.688 483.681 155.078 483.181 156.634C483.032 156.504 482.866 156.374 482.718 156.245C483.236 154.707 483.829 153.336 484.385 152.206C484.478 152.28 484.57 152.336 484.644 152.41C484.7 152.465 484.774 152.502 484.83 152.54Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M484.385 152.225C483.829 153.355 483.236 154.707 482.718 156.264C481.421 155.133 480.272 153.948 479.29 152.799C479.864 151.484 480.476 150.298 481.069 149.298C482.014 150.243 483.125 151.262 484.385 152.225Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M480.661 148.89C480.791 149.019 480.92 149.149 481.05 149.297C480.457 150.298 479.846 151.483 479.271 152.799C479.142 152.632 478.993 152.484 478.864 152.317C479.457 151.02 480.068 149.871 480.661 148.89Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M480.661 148.889C480.068 149.871 479.456 151.02 478.882 152.317C477.937 151.187 477.159 150.112 476.529 149.186C477.103 148.111 477.715 147.148 478.326 146.277C478.919 147 479.716 147.908 480.661 148.889Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M477.974 145.814C478.085 145.963 478.197 146.111 478.326 146.259C477.715 147.13 477.104 148.093 476.529 149.168C476.4 148.982 476.288 148.816 476.177 148.63C476.77 147.611 477.381 146.667 477.974 145.814Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M476.974 144.629L477.048 144.573C477.048 144.573 477.363 145.055 477.974 145.814C477.381 146.648 476.77 147.593 476.177 148.649C475.251 147.204 474.769 146.241 474.769 146.241L474.88 146.166L476.974 144.629Z"
                                                        fill="#D3D3D3" />
                                                    <path
                                                        d="M474.213 142.74C474.139 142.573 472.879 139.887 473.065 139.757C473.25 139.628 475.066 142.999 475.269 142.888C475.455 142.777 474.88 140.906 475.214 140.869C475.344 140.869 476.696 143.574 476.992 144.63L474.899 146.167C474.64 145.834 471.712 142.073 471.805 141.814C471.916 141.573 473.287 143.203 473.454 143.388C473.287 143.148 471.583 140.795 471.786 140.684C471.99 140.572 473.658 142.925 473.787 143.092C473.676 142.907 471.935 139.868 472.064 139.739C472.194 139.591 474.084 142.555 474.213 142.74Z"
                                                        fill="#E9926F" />
                                                    <path
                                                        d="M498.298 151.335C498.539 151.279 498.669 151.242 498.669 151.242C498.669 151.242 498.168 152.761 496.983 152.706C495.797 152.65 495.112 151.372 495.112 151.372C495.223 151.39 495.315 151.409 495.408 151.409L495.389 151.483C495.389 151.483 496.705 152.706 498.28 151.372L498.298 151.335Z"
                                                        fill="#363F45" />
                                                    <path
                                                        d="M498.298 151.335L498.317 151.391C496.742 152.725 495.427 151.502 495.427 151.502L495.445 151.428C496.686 151.576 497.761 151.446 498.298 151.335Z"
                                                        fill="#F5F5F5" />
                                                    <path
                                                        d="M498.187 148.667C498.205 148.871 498.113 149.056 497.983 149.056C497.853 149.056 497.742 148.908 497.742 148.686C497.724 148.482 497.816 148.297 497.946 148.297C498.057 148.297 498.168 148.464 498.187 148.667Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M495.797 148.797C495.816 149.001 495.723 149.186 495.593 149.186C495.464 149.186 495.352 149.038 495.352 148.816C495.334 148.612 495.427 148.427 495.556 148.427C495.686 148.427 495.779 148.593 495.797 148.797Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M494.797 147.741L494.704 147.501C494.723 147.482 495.371 147.223 495.89 147.204L495.908 147.464C495.427 147.482 494.797 147.741 494.797 147.741Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M498.743 147.538C498.743 147.538 498.094 147.353 497.631 147.371L497.613 147.112C498.113 147.093 498.798 147.278 498.817 147.278L498.743 147.538Z"
                                                        fill="#874F27" />
                                                    <path
                                                        d="M496.65 149.038C496.65 149.038 496.131 150.52 496.761 150.52C497.391 150.52 496.65 149.038 496.65 149.038Z"
                                                        fill="#D2734C" />
                                                    <path
                                                        d="M488.535 222.733C488.257 222.677 486.015 222.214 485.867 221.658C485.848 221.584 485.848 221.473 485.978 221.362C486.497 220.917 487.386 221.547 487.923 221.992C487.571 221.38 487.052 220.361 487.275 219.843C487.349 219.676 487.497 219.565 487.719 219.528C487.942 219.491 488.127 219.546 488.275 219.694C488.924 220.343 488.609 222.566 488.609 222.659C488.609 222.677 488.59 222.696 488.572 222.714C488.572 222.733 488.553 222.733 488.535 222.733ZM486.422 221.362C486.293 221.362 486.182 221.399 486.089 221.473C486.015 221.547 486.015 221.584 486.015 221.621C486.108 221.955 487.534 222.381 488.46 222.584C488.516 222.177 488.701 220.361 488.164 219.824C488.053 219.713 487.923 219.676 487.756 219.694C487.59 219.713 487.479 219.787 487.423 219.917C487.182 220.473 488.016 221.899 488.368 222.399C488.386 222.436 488.386 222.473 488.349 222.51C488.312 222.547 488.275 222.529 488.238 222.51C487.905 222.121 487.015 221.362 486.422 221.362Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M516.325 221.64C516.306 221.64 516.306 221.64 516.288 221.64C516.269 221.621 516.251 221.621 516.251 221.603C516.232 221.51 515.714 219.435 516.269 218.75C516.399 218.601 516.566 218.527 516.77 218.527C516.973 218.546 517.14 218.62 517.214 218.787C517.474 219.25 517.085 220.269 516.807 220.88C517.27 220.398 518.048 219.732 518.585 220.102C518.715 220.195 518.733 220.306 518.715 220.38C518.622 220.917 516.566 221.584 516.325 221.658C516.325 221.64 516.325 221.64 516.325 221.64ZM516.733 218.676C516.584 218.676 516.473 218.731 516.381 218.842C515.936 219.398 516.288 221.102 516.362 221.491C517.214 221.214 518.53 220.676 518.585 220.343C518.585 220.306 518.585 220.269 518.511 220.213C517.974 219.824 516.936 220.936 516.566 221.38C516.547 221.417 516.492 221.417 516.473 221.399C516.436 221.38 516.436 221.343 516.455 221.306C516.733 220.787 517.381 219.361 517.103 218.861C517.048 218.75 516.936 218.694 516.77 218.676C516.751 218.676 516.733 218.676 516.733 218.676Z"
                                                        fill="#1F272D" />
                                                    <path
                                                        d="M269.955 69.8793L272.901 70.0645L270.77 72.1208L272.085 74.77L269.251 73.9549L267.602 76.4187L266.898 73.5473L263.952 73.362L266.083 71.3057L264.767 68.6566L267.602 69.4717L269.251 67.0078L269.955 69.8793Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M116.923 75.0658L119.869 75.2511L117.738 77.3074L119.054 79.9565L116.219 79.1414L114.57 81.6053L113.866 78.7339L110.92 78.5486L113.051 76.4923L111.736 73.8431L114.57 74.6582L116.219 72.1943L116.923 75.0658Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M380.004 104.336L382.95 104.522L380.819 106.578L382.135 109.227L379.3 108.412L377.651 110.876L376.947 108.004L374.001 107.819L376.132 105.763L374.817 103.114L377.651 103.929L379.3 101.465L380.004 104.336Z"
                                                        fill="#F7D040" />
                                                    <path
                                                        d="M497.002 72.973L499.947 73.1583L497.817 75.2147L499.132 77.8638L496.279 77.0487L494.649 79.5126L493.945 76.6411L490.98 76.4374L493.111 74.3995L491.814 71.7503L494.649 72.5655L496.279 70.1016L497.002 72.973Z"
                                                        fill="#F34F2F" />
                                                    <path
                                                        d="M240.294 96.426H240.275C240.127 96.4075 240.016 96.2778 240.016 96.1296L240.757 85.7553C240.775 85.6071 240.905 85.4774 241.053 85.4959C241.201 85.5144 241.312 85.6441 241.312 85.7923L240.571 96.1666C240.553 96.3148 240.442 96.426 240.294 96.426Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M241.775 96.797C241.701 96.797 241.627 96.7785 241.572 96.7229C241.46 96.6117 241.46 96.445 241.572 96.3339L246.203 91.7025C246.315 91.5914 246.481 91.5914 246.592 91.7025C246.704 91.8137 246.704 91.9804 246.592 92.0915L241.961 96.7229C241.924 96.7785 241.85 96.797 241.775 96.797Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M251.595 99.0199L242.313 98.6494C242.165 98.6494 242.035 98.5197 242.054 98.353C242.054 98.2047 242.183 98.075 242.35 98.0936L251.613 98.4641C251.762 98.4641 251.891 98.5938 251.873 98.7605C251.873 98.9088 251.743 99.0199 251.595 99.0199Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M246.593 104.577C246.537 104.577 246.481 104.558 246.426 104.521L241.609 100.816C241.479 100.723 241.461 100.557 241.553 100.427C241.646 100.297 241.813 100.279 241.942 100.371L246.759 104.076C246.889 104.169 246.907 104.336 246.815 104.466C246.759 104.54 246.667 104.577 246.593 104.577Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M240.294 109.764C240.145 109.764 240.016 109.634 240.016 109.486V100.964C240.016 100.816 240.145 100.687 240.294 100.687C240.442 100.687 240.571 100.816 240.571 100.964V109.486C240.571 109.634 240.442 109.764 240.294 109.764Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M235.106 105.318C235.051 105.318 234.976 105.299 234.939 105.262C234.828 105.17 234.791 104.984 234.902 104.873L238.608 100.242C238.7 100.131 238.886 100.094 238.997 100.205C239.108 100.297 239.145 100.483 239.034 100.594L235.328 105.225C235.273 105.281 235.18 105.318 235.106 105.318Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M229.918 100.687C229.789 100.687 229.678 100.613 229.659 100.484C229.622 100.335 229.715 100.187 229.863 100.15L238.015 97.9271C238.163 97.8901 238.311 97.9827 238.348 98.1309C238.385 98.2791 238.293 98.4273 238.144 98.4644L229.993 100.687C229.974 100.687 229.937 100.687 229.918 100.687Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M238.811 97.1664C238.737 97.1664 238.663 97.1479 238.607 97.0923L234.161 92.6462C234.05 92.5351 234.05 92.3683 234.161 92.2572C234.272 92.146 234.439 92.146 234.55 92.2572L238.996 96.7033C239.108 96.8145 239.108 96.9812 238.996 97.0923C238.959 97.1479 238.885 97.1664 238.811 97.1664Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M328.333 79.9388C328.24 79.9388 328.166 79.9018 328.111 79.8277C328.018 79.698 328.055 79.5312 328.185 79.4386L336.726 73.5104C336.855 73.4178 337.022 73.4549 337.115 73.5845C337.207 73.7142 337.17 73.8809 337.041 73.9736L328.5 79.9018C328.444 79.9203 328.389 79.9388 328.333 79.9388Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M335.484 82.0317C335.466 82.0317 335.466 82.0317 335.447 82.0317L328.926 81.3277C328.778 81.3092 328.666 81.1795 328.685 81.0127C328.703 80.846 328.833 80.7533 329 80.7719L335.521 81.4759C335.67 81.4944 335.781 81.6241 335.762 81.7909C335.744 81.9205 335.633 82.0317 335.484 82.0317Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M333.409 90.3686C333.317 90.3686 333.243 90.3316 333.187 90.2575L327.666 82.8102C327.573 82.6805 327.592 82.5138 327.721 82.4212C327.851 82.3285 328.018 82.3471 328.11 82.4768L333.632 89.924C333.724 90.0537 333.706 90.2204 333.576 90.3131C333.52 90.3501 333.465 90.3686 333.409 90.3686Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M325.943 89.9612C325.794 89.9612 325.665 89.8501 325.665 89.6834L325.535 83.607C325.535 83.4588 325.646 83.3291 325.813 83.3291C325.961 83.3291 326.091 83.4403 326.091 83.607L326.221 89.6834C326.221 89.8316 326.091 89.9612 325.943 89.9612Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M317.939 88.3118C317.865 88.3118 317.773 88.2747 317.717 88.2006C317.624 88.0895 317.643 87.9042 317.754 87.8116L324.387 82.4577C324.498 82.3651 324.683 82.3836 324.776 82.4948C324.868 82.6059 324.85 82.7912 324.739 82.8838L318.106 88.2377C318.069 88.2933 318.013 88.3118 317.939 88.3118Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M318.161 81.4757C318.013 81.4757 317.884 81.346 317.884 81.1978C317.884 81.0496 318.013 80.9199 318.161 80.9199L324.09 80.9014C324.239 80.9014 324.368 81.0311 324.368 81.1793C324.368 81.3275 324.239 81.4572 324.09 81.4572L318.161 81.4757Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M325.35 79.4937C325.294 79.4937 325.239 79.4752 325.183 79.4381L318.347 74.4918C318.217 74.3991 318.199 74.2324 318.291 74.1027C318.384 73.973 318.551 73.9545 318.68 74.0472L325.517 78.9935C325.646 79.0862 325.665 79.2529 325.572 79.3826C325.517 79.4567 325.443 79.4937 325.35 79.4937Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M326.832 79.2531C326.814 79.2531 326.814 79.2531 326.795 79.2531C326.647 79.2345 326.536 79.1049 326.554 78.9381L327.221 72.695C327.24 72.5468 327.369 72.4356 327.536 72.4542C327.684 72.4727 327.796 72.6024 327.777 72.7691L327.11 79.0122C327.092 79.1419 326.962 79.2531 326.832 79.2531Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M395.66 60.5975H395.642C395.493 60.5789 395.382 60.4493 395.382 60.3011L395.975 52.0387C395.994 51.8904 396.123 51.7793 396.272 51.7793C396.42 51.7978 396.531 51.9275 396.531 52.0757L395.938 60.3381C395.938 60.4863 395.808 60.5975 395.66 60.5975Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M396.846 60.8942C396.772 60.8942 396.698 60.8757 396.642 60.8201C396.531 60.709 396.531 60.5422 396.642 60.4311L400.329 56.7445C400.44 56.6333 400.607 56.6333 400.718 56.7445C400.829 56.8557 400.829 57.0224 400.718 57.1335L397.031 60.8201C396.994 60.8757 396.92 60.8942 396.846 60.8942Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M404.664 62.6724L397.272 62.3759C397.123 62.3759 396.994 62.2462 397.012 62.0795C397.012 61.9313 397.142 61.8016 397.309 61.8201L404.683 62.1166C404.831 62.1166 404.96 62.2462 404.942 62.413C404.942 62.5427 404.812 62.6724 404.664 62.6724Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M400.681 67.0993C400.625 67.0993 400.57 67.0808 400.514 67.0438L396.679 64.0982C396.549 64.0056 396.531 63.8388 396.623 63.7092C396.716 63.5795 396.883 63.561 397.012 63.6536L400.847 66.5992C400.977 66.6918 400.996 66.8585 400.903 66.9882C400.847 67.0623 400.773 67.0993 400.681 67.0993Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M395.66 71.2316C395.512 71.2316 395.382 71.1019 395.382 70.9537V64.1548C395.382 64.0066 395.512 63.877 395.66 63.877C395.808 63.877 395.938 64.0066 395.938 64.1548V70.9537C395.938 71.1019 395.827 71.2316 395.66 71.2316Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M391.529 67.6924C391.473 67.6924 391.399 67.6739 391.362 67.6369C391.251 67.5442 391.214 67.359 391.325 67.2478L394.271 63.5612C394.363 63.45 394.548 63.413 394.66 63.5241C394.771 63.6168 394.808 63.802 394.697 63.9132L391.751 67.5998C391.695 67.6554 391.621 67.6924 391.529 67.6924Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M387.397 64.0067C387.267 64.0067 387.156 63.9325 387.138 63.8029C387.101 63.6546 387.193 63.5064 387.341 63.4694L393.844 61.6908C393.993 61.6537 394.141 61.7464 394.178 61.8946C394.215 62.0428 394.122 62.191 393.974 62.2281L387.471 64.0067C387.452 63.9881 387.415 64.0067 387.397 64.0067Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M394.493 61.1904C394.419 61.1904 394.345 61.1718 394.289 61.1163L390.75 57.5779C390.639 57.4667 390.639 57.3 390.75 57.1888C390.862 57.0777 391.028 57.0777 391.139 57.1888L394.678 60.7272C394.789 60.8384 394.789 61.0051 394.678 61.1163C394.622 61.1718 394.548 61.1904 394.493 61.1904Z"
                                                        fill="#EC4325" />
                                                    <path
                                                        d="M94.1907 93.74H94.1722C94.024 93.7214 93.9128 93.5917 93.9128 93.4435L94.4131 86.4779C94.4316 86.3297 94.5613 86.2 94.7095 86.2186C94.8577 86.2371 94.9689 86.3668 94.9689 86.515L94.4686 93.4806C94.4501 93.6288 94.339 93.74 94.1907 93.74Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M95.1912 93.9996C95.1171 93.9996 95.043 93.9811 94.9874 93.9255C94.8763 93.8143 94.8763 93.6476 94.9874 93.5364L98.0999 90.4242C98.2111 90.313 98.3778 90.313 98.489 90.4242C98.6002 90.5353 98.6002 90.7021 98.489 90.8132L95.3765 93.9255C95.3209 93.9625 95.2468 93.9996 95.1912 93.9996Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M101.787 95.4996C101.768 95.4996 101.768 95.4996 101.787 95.4996L95.5431 95.2588C95.3949 95.2588 95.2652 95.1291 95.2838 94.9623C95.2838 94.8141 95.4134 94.6844 95.5802 94.7029L101.805 94.9438C101.953 94.9438 102.083 95.0735 102.065 95.2403C102.046 95.3699 101.935 95.4996 101.787 95.4996Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M98.4148 99.2231C98.3592 99.2231 98.3036 99.2046 98.248 99.1675L95.0058 96.6851C94.8761 96.5925 94.8576 96.4258 94.9502 96.2961C95.0429 96.1664 95.2096 96.1479 95.3393 96.2405L98.5815 98.7229C98.7112 98.8156 98.7297 98.9823 98.6371 99.112C98.5815 99.1861 98.5074 99.2231 98.4148 99.2231Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M94.1907 102.706C94.0425 102.706 93.9128 102.576 93.9128 102.428V96.7037C93.9128 96.5555 94.0425 96.4258 94.1907 96.4258C94.339 96.4258 94.4686 96.5555 94.4686 96.7037V102.428C94.4686 102.595 94.339 102.706 94.1907 102.706Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M90.7077 99.7236C90.6521 99.7236 90.578 99.705 90.5409 99.668C90.4298 99.5754 90.3927 99.3901 90.5039 99.279L92.9865 96.1667C93.0791 96.0555 93.2644 96.0185 93.3755 96.1296C93.4867 96.2222 93.5237 96.4075 93.4126 96.5186L90.93 99.6309C90.8559 99.6865 90.7818 99.7236 90.7077 99.7236Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M87.206 96.6115C87.0763 96.6115 86.9652 96.5374 86.9466 96.4077C86.9096 96.2595 87.0022 96.1113 87.1504 96.0742L92.6344 94.5736C92.7826 94.5365 92.9309 94.6292 92.9679 94.7774C93.005 94.9256 92.9123 95.0738 92.7641 95.1109L87.2801 96.6115C87.2616 96.6115 87.2431 96.6115 87.206 96.6115Z"
                                                        fill="#0A4440" />
                                                    <path
                                                        d="M93.1904 94.2401C93.1163 94.2401 93.0422 94.2215 92.9866 94.166L90.0038 91.1833C89.8926 91.0722 89.8926 90.9055 90.0038 90.7943C90.1149 90.6831 90.2817 90.6831 90.3928 90.7943L93.3756 93.7769C93.4868 93.8881 93.4868 94.0548 93.3756 94.166C93.3386 94.2215 93.2645 94.2401 93.1904 94.2401Z"
                                                        fill="#0A4440" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text" style="padding: 0 3em; text-align: center;">
                                        <p
                                            style="width: 224px; height: 32px; left: 956px; top: 783.68px; font-family: Poppins; font-style: normal; font-weight: 600; font-size: 24px; line-height: 32px; color: #222222;">
                                            Satu langkah lagi!</p>
                                        <p>Terima kasih telah mendaftar di Pigijo.
                                            Yuk verifikasi email dulu! Karena setiap informasi penting akan dikirimkan
                                            ke sini.</p>
                                        <div class="icon">
                                            <a href="#">
                                                <svg width="182" height="54" viewBox="0 0 182 54" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 27C0 12.0883 12.0883 0 27 0H155C169.912 0 182 12.0883 182 27C182 41.9117 169.912 54 155 54H27C12.0883 54 0 41.9117 0 27Z"
                                                        fill="#FF5B00" />
                                                    <path
                                                        d="M40.784 21.88L36.608 33H34.496L30.304 21.88H32.256L35.552 31.128L38.864 21.88H40.784ZM50.3894 28.376C50.3894 28.7067 50.368 29.0053 50.3254 29.272H43.5894C43.6427 29.976 43.904 30.5413 44.3734 30.968C44.8427 31.3947 45.4187 31.608 46.1014 31.608C47.0827 31.608 47.776 31.1973 48.1814 30.376H50.1494C49.8827 31.1867 49.3974 31.8533 48.6934 32.376C48 32.888 47.136 33.144 46.1014 33.144C45.2587 33.144 44.5014 32.9573 43.8294 32.584C43.168 32.2 42.6454 31.6667 42.2614 30.984C41.888 30.2907 41.7014 29.4907 41.7014 28.584C41.7014 27.6773 41.8827 26.8827 42.2454 26.2C42.6187 25.5067 43.136 24.9733 43.7974 24.6C44.4694 24.2267 45.2374 24.04 46.1014 24.04C46.9334 24.04 47.6747 24.2213 48.3254 24.584C48.976 24.9467 49.4827 25.4587 49.8454 26.12C50.208 26.7707 50.3894 27.5227 50.3894 28.376ZM48.4854 27.8C48.4747 27.128 48.2347 26.5893 47.7654 26.184C47.296 25.7787 46.7147 25.576 46.0214 25.576C45.392 25.576 44.8534 25.7787 44.4054 26.184C43.9574 26.5787 43.6907 27.1173 43.6054 27.8H48.4854ZM54.0084 25.464C54.275 25.016 54.627 24.6693 55.0644 24.424C55.5124 24.168 56.0404 24.04 56.6484 24.04V25.928H56.1844C55.4697 25.928 54.9257 26.1093 54.5524 26.472C54.1897 26.8347 54.0084 27.464 54.0084 28.36V33H52.1844V24.184H54.0084V25.464ZM59.253 23.016C58.9223 23.016 58.645 22.904 58.421 22.68C58.197 22.456 58.085 22.1787 58.085 21.848C58.085 21.5173 58.197 21.24 58.421 21.016C58.645 20.792 58.9223 20.68 59.253 20.68C59.573 20.68 59.845 20.792 60.069 21.016C60.293 21.24 60.405 21.5173 60.405 21.848C60.405 22.1787 60.293 22.456 60.069 22.68C59.845 22.904 59.573 23.016 59.253 23.016ZM60.149 24.184V33H58.325V24.184H60.149ZM66.2398 25.672H64.6078V33H62.7678V25.672H61.7278V24.184H62.7678V23.56C62.7678 22.5467 63.0344 21.8107 63.5678 21.352C64.1118 20.8827 64.9598 20.648 66.1118 20.648V22.168C65.5571 22.168 65.1678 22.2747 64.9438 22.488C64.7198 22.6907 64.6078 23.048 64.6078 23.56V24.184H66.2398V25.672ZM68.7843 23.016C68.4536 23.016 68.1763 22.904 67.9523 22.68C67.7283 22.456 67.6163 22.1787 67.6163 21.848C67.6163 21.5173 67.7283 21.24 67.9523 21.016C68.1763 20.792 68.4536 20.68 68.7843 20.68C69.1043 20.68 69.3763 20.792 69.6003 21.016C69.8243 21.24 69.9363 21.5173 69.9363 21.848C69.9363 22.1787 69.8243 22.456 69.6003 22.68C69.3763 22.904 69.1043 23.016 68.7843 23.016ZM69.6803 24.184V33H67.8563V24.184H69.6803ZM75.563 28.6L79.627 33H77.163L73.899 29.208V33H72.075V21.16H73.899V28.04L77.099 24.184H79.627L75.563 28.6ZM80.3264 28.552C80.3264 27.6667 80.5077 26.8827 80.8704 26.2C81.2437 25.5173 81.745 24.9893 82.3744 24.616C83.0144 24.232 83.7184 24.04 84.4864 24.04C85.1797 24.04 85.7824 24.1787 86.2944 24.456C86.817 24.7227 87.233 25.0587 87.5424 25.464V24.184H89.3824V33H87.5424V31.688C87.233 32.104 86.8117 32.4507 86.2784 32.728C85.745 33.0053 85.137 33.144 84.4544 33.144C83.697 33.144 83.0037 32.952 82.3744 32.568C81.745 32.1733 81.2437 31.6293 80.8704 30.936C80.5077 30.232 80.3264 29.4373 80.3264 28.552ZM87.5424 28.584C87.5424 27.976 87.4144 27.448 87.1584 27C86.913 26.552 86.5877 26.2107 86.1824 25.976C85.777 25.7413 85.3397 25.624 84.8704 25.624C84.401 25.624 83.9637 25.7413 83.5584 25.976C83.153 26.2 82.8224 26.536 82.5664 26.984C82.321 27.4213 82.1984 27.944 82.1984 28.552C82.1984 29.16 82.321 29.6933 82.5664 30.152C82.8224 30.6107 83.153 30.9627 83.5584 31.208C83.9744 31.4427 84.4117 31.56 84.8704 31.56C85.3397 31.56 85.777 31.4427 86.1824 31.208C86.5877 30.9733 86.913 30.632 87.1584 30.184C87.4144 29.7253 87.5424 29.192 87.5424 28.584ZM94.9781 33.144C94.2848 33.144 93.6608 33.0213 93.1061 32.776C92.5621 32.52 92.1301 32.1787 91.8101 31.752C91.4901 31.3147 91.3195 30.8293 91.2981 30.296H93.1861C93.2181 30.6693 93.3941 30.984 93.7141 31.24C94.0448 31.4853 94.4555 31.608 94.9461 31.608C95.4581 31.608 95.8528 31.512 96.1301 31.32C96.4181 31.1173 96.5621 30.8613 96.5621 30.552C96.5621 30.2213 96.4021 29.976 96.0821 29.816C95.7728 29.656 95.2768 29.48 94.5941 29.288C93.9328 29.1067 93.3941 28.9307 92.9781 28.76C92.5621 28.5893 92.1995 28.328 91.8901 27.976C91.5915 27.624 91.4421 27.16 91.4421 26.584C91.4421 26.1147 91.5808 25.688 91.8581 25.304C92.1355 24.9093 92.5301 24.6 93.0421 24.376C93.5648 24.152 94.1621 24.04 94.8341 24.04C95.8368 24.04 96.6421 24.296 97.2501 24.808C97.8688 25.3093 98.1995 25.9973 98.2421 26.872H96.4181C96.3861 26.4773 96.2261 26.1627 95.9381 25.928C95.6501 25.6933 95.2608 25.576 94.7701 25.576C94.2901 25.576 93.9221 25.6667 93.6661 25.848C93.4101 26.0293 93.2821 26.2693 93.2821 26.568C93.2821 26.8027 93.3675 27 93.5381 27.16C93.7088 27.32 93.9168 27.448 94.1621 27.544C94.4075 27.6293 94.7701 27.7413 95.2501 27.88C95.8901 28.0507 96.4128 28.2267 96.8181 28.408C97.2341 28.5787 97.5915 28.8347 97.8901 29.176C98.1888 29.5173 98.3435 29.9707 98.3541 30.536C98.3541 31.0373 98.2155 31.4853 97.9381 31.88C97.6608 32.2747 97.2661 32.584 96.7541 32.808C96.2528 33.032 95.6608 33.144 94.9781 33.144ZM101.253 23.016C100.922 23.016 100.645 22.904 100.421 22.68C100.197 22.456 100.085 22.1787 100.085 21.848C100.085 21.5173 100.197 21.24 100.421 21.016C100.645 20.792 100.922 20.68 101.253 20.68C101.573 20.68 101.845 20.792 102.069 21.016C102.293 21.24 102.405 21.5173 102.405 21.848C102.405 22.1787 102.293 22.456 102.069 22.68C101.845 22.904 101.573 23.016 101.253 23.016ZM102.149 24.184V33H100.325V24.184H102.149ZM110.524 23.352V26.616H114.364V28.104H110.524V31.512H114.844V33H108.7V21.864H114.844V23.352H110.524ZM127.763 24.04C128.456 24.04 129.075 24.184 129.619 24.472C130.173 24.76 130.605 25.1867 130.915 25.752C131.235 26.3173 131.395 27 131.395 27.8V33H129.587V28.072C129.587 27.2827 129.389 26.68 128.995 26.264C128.6 25.8373 128.061 25.624 127.379 25.624C126.696 25.624 126.152 25.8373 125.747 26.264C125.352 26.68 125.155 27.2827 125.155 28.072V33H123.347V28.072C123.347 27.2827 123.149 26.68 122.755 26.264C122.36 25.8373 121.821 25.624 121.139 25.624C120.456 25.624 119.912 25.8373 119.507 26.264C119.112 26.68 118.915 27.2827 118.915 28.072V33H117.091V24.184H118.915V25.192C119.213 24.8293 119.592 24.5467 120.051 24.344C120.509 24.1413 121 24.04 121.523 24.04C122.227 24.04 122.856 24.1893 123.411 24.488C123.965 24.7867 124.392 25.2187 124.691 25.784C124.957 25.2507 125.373 24.8293 125.939 24.52C126.504 24.2 127.112 24.04 127.763 24.04ZM133.108 28.552C133.108 27.6667 133.289 26.8827 133.652 26.2C134.025 25.5173 134.526 24.9893 135.156 24.616C135.796 24.232 136.5 24.04 137.268 24.04C137.961 24.04 138.564 24.1787 139.076 24.456C139.598 24.7227 140.014 25.0587 140.324 25.464V24.184H142.164V33H140.324V31.688C140.014 32.104 139.593 32.4507 139.06 32.728C138.526 33.0053 137.918 33.144 137.236 33.144C136.478 33.144 135.785 32.952 135.156 32.568C134.526 32.1733 134.025 31.6293 133.652 30.936C133.289 30.232 133.108 29.4373 133.108 28.552ZM140.324 28.584C140.324 27.976 140.196 27.448 139.94 27C139.694 26.552 139.369 26.2107 138.964 25.976C138.558 25.7413 138.121 25.624 137.652 25.624C137.182 25.624 136.745 25.7413 136.34 25.976C135.934 26.2 135.604 26.536 135.348 26.984C135.102 27.4213 134.98 27.944 134.98 28.552C134.98 29.16 135.102 29.6933 135.348 30.152C135.604 30.6107 135.934 30.9627 136.34 31.208C136.756 31.4427 137.193 31.56 137.652 31.56C138.121 31.56 138.558 31.4427 138.964 31.208C139.369 30.9733 139.694 30.632 139.94 30.184C140.196 29.7253 140.324 29.192 140.324 28.584ZM145.487 23.016C145.157 23.016 144.879 22.904 144.655 22.68C144.431 22.456 144.319 22.1787 144.319 21.848C144.319 21.5173 144.431 21.24 144.655 21.016C144.879 20.792 145.157 20.68 145.487 20.68C145.807 20.68 146.079 20.792 146.303 21.016C146.527 21.24 146.639 21.5173 146.639 21.848C146.639 22.1787 146.527 22.456 146.303 22.68C146.079 22.904 145.807 23.016 145.487 23.016ZM146.383 24.184V33H144.559V24.184H146.383ZM150.602 21.16V33H148.778V21.16H150.602Z"
                                                        fill="white" />
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td class="bg_white">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td class="bg_white email-section">
                                    <div class="heading-section" style="text-align: center; padding: 0 30px;">
                                        <h2>Dengan akun Pigijo yang terverifikasi kamu langsung bisa:</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the
                                            necessary regelialia.</p>
                                    </div>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;"
                                                class="services">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5.46875 25.7812C5.26155 25.7812 5.06284 25.8636 4.91632 26.0101C4.76981 26.1566 4.6875 26.3553 4.6875 26.5625V28.125C4.6875 28.3322 4.76981 28.5309 4.91632 28.6774C5.06284 28.8239 5.26155 28.9062 5.46875 28.9062C5.67595 28.9062 5.87466 28.8239 6.02118 28.6774C6.16769 28.5309 6.25 28.3322 6.25 28.125V26.5625C6.25 26.3553 6.16769 26.1566 6.02118 26.0101C5.87466 25.8636 5.67595 25.7812 5.46875 25.7812Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M8.59375 25.7812C8.38655 25.7812 8.18784 25.8636 8.04132 26.0101C7.89481 26.1566 7.8125 26.3553 7.8125 26.5625V28.125C7.8125 28.3322 7.89481 28.5309 8.04132 28.6774C8.18784 28.8239 8.38655 28.9062 8.59375 28.9062C8.80095 28.9062 8.99966 28.8239 9.14618 28.6774C9.29269 28.5309 9.375 28.3322 9.375 28.125V26.5625C9.375 26.3553 9.29269 26.1566 9.14618 26.0101C8.99966 25.8636 8.80095 25.7812 8.59375 25.7812Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M11.7188 25.7812C11.5115 25.7812 11.3128 25.8636 11.1663 26.0101C11.0198 26.1566 10.9375 26.3553 10.9375 26.5625V28.125C10.9375 28.3322 11.0198 28.5309 11.1663 28.6774C11.3128 28.8239 11.5115 28.9062 11.7188 28.9062C11.926 28.9062 12.1247 28.8239 12.2712 28.6774C12.4177 28.5309 12.5 28.3322 12.5 28.125V26.5625C12.5 26.3553 12.4177 26.1566 12.2712 26.0101C12.1247 25.8636 11.926 25.7812 11.7188 25.7812Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M14.8438 25.7812C14.6365 25.7812 14.4378 25.8636 14.2913 26.0101C14.1448 26.1566 14.0625 26.3553 14.0625 26.5625V28.125C14.0625 28.3322 14.1448 28.5309 14.2913 28.6774C14.4378 28.8239 14.6365 28.9062 14.8438 28.9062C15.051 28.9062 15.2497 28.8239 15.3962 28.6774C15.5427 28.5309 15.625 28.3322 15.625 28.125V26.5625C15.625 26.3553 15.5427 26.1566 15.3962 26.0101C15.2497 25.8636 15.051 25.7812 14.8438 25.7812Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M5.46875 31.25C5.90022 31.25 6.25 30.9002 6.25 30.4688C6.25 30.0373 5.90022 29.6875 5.46875 29.6875C5.03728 29.6875 4.6875 30.0373 4.6875 30.4688C4.6875 30.9002 5.03728 31.25 5.46875 31.25Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M8.59375 31.25C9.02522 31.25 9.375 30.9002 9.375 30.4688C9.375 30.0373 9.02522 29.6875 8.59375 29.6875C8.16228 29.6875 7.8125 30.0373 7.8125 30.4688C7.8125 30.9002 8.16228 31.25 8.59375 31.25Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M11.7188 31.25C12.1502 31.25 12.5 30.9002 12.5 30.4688C12.5 30.0373 12.1502 29.6875 11.7188 29.6875C11.2873 29.6875 10.9375 30.0373 10.9375 30.4688C10.9375 30.9002 11.2873 31.25 11.7188 31.25Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M14.8438 31.25C15.2752 31.25 15.625 30.9002 15.625 30.4688C15.625 30.0373 15.2752 29.6875 14.8438 29.6875C14.4123 29.6875 14.0625 30.0373 14.0625 30.4688C14.0625 30.9002 14.4123 31.25 14.8438 31.25Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M44.5312 12.5H35.9375V2.34375C35.9375 2.13655 35.8552 1.93784 35.7087 1.79132C35.5622 1.64481 35.3634 1.5625 35.1562 1.5625H2.34375C2.13655 1.5625 1.93784 1.64481 1.79132 1.79132C1.64481 1.93784 1.5625 2.13655 1.5625 2.34375V33.5938C1.5625 33.8009 1.64481 33.9997 1.79132 34.1462C1.93784 34.2927 2.13655 34.375 2.34375 34.375H26.5625V44.5312C26.5637 45.5669 26.9756 46.5598 27.7079 47.2921C28.4402 48.0244 29.4331 48.4363 30.4688 48.4375H44.5312C45.5669 48.4363 46.5598 48.0244 47.2921 47.2921C48.0244 46.5598 48.4363 45.5669 48.4375 44.5312V16.4062C48.4363 15.3706 48.0244 14.3777 47.2921 13.6454C46.5598 12.9131 45.5669 12.5012 44.5312 12.5ZM28.125 43.75V35.683L37.1296 40.5316L37.1305 40.5301C37.2366 40.5883 37.355 40.6207 37.4761 40.6246C37.5971 40.6285 37.7174 40.6038 37.827 40.5524V40.5531L46.875 36.377V43.75H28.125ZM41.8913 32.8345C43.0293 31.9245 43.8564 30.6834 44.2584 29.2828C44.6604 27.8822 44.6173 26.3914 44.1351 25.0164C43.6529 23.6414 42.7555 22.4501 41.5669 21.6073C40.3782 20.7646 38.9571 20.3119 37.5 20.3119C36.0429 20.3119 34.6218 20.7646 33.4331 21.6073C32.2445 22.4501 31.3471 23.6414 30.8649 25.0164C30.3827 26.3914 30.3396 27.8822 30.7416 29.2828C31.1436 30.6834 31.9707 31.9245 33.1087 32.8345L35.6922 37.983L28.125 33.9083V17.1875H46.875V34.6563L39.1992 38.1989L41.8913 32.8345ZM37.5 38.1018L34.4262 31.9762C34.3726 31.8693 34.2952 31.7761 34.1999 31.7039C33.2863 31.0125 32.6128 30.0516 32.2748 28.9568C31.9367 27.862 31.951 26.6887 32.3156 25.6025C32.6803 24.5163 33.3769 23.5721 34.3072 22.9032C35.2374 22.2342 36.3542 21.8744 37.5 21.8744C38.6458 21.8744 39.7626 22.2342 40.6928 22.9032C41.6231 23.5721 42.3197 24.5163 42.6844 25.6025C43.049 26.6887 43.0633 27.862 42.7252 28.9568C42.3871 30.0516 41.7137 31.0125 40.8001 31.7039C40.7048 31.7761 40.6274 31.8693 40.5738 31.9762L37.5 38.1018ZM46.7406 15.625H28.2594C28.4214 15.1684 28.7207 14.7731 29.1163 14.4934C29.5118 14.2136 29.9843 14.0631 30.4688 14.0625H44.5312C45.0157 14.0631 45.4882 14.2136 45.8837 14.4934C46.2793 14.7731 46.5786 15.1684 46.7406 15.625ZM34.375 7.8125H24.2188V3.125H34.375V7.8125ZM14.8438 3.125H22.6562V18.0957L19.1744 15.8428C19.048 15.761 18.9006 15.7174 18.75 15.7174C18.5994 15.7174 18.452 15.761 18.3256 15.8428L14.8438 18.0957V3.125ZM13.2812 3.125V7.8125H3.125V3.125H13.2812ZM3.125 32.8125V9.375H13.2812V19.5312C13.2812 19.6718 13.3191 19.8097 13.3909 19.9304C13.4627 20.0512 13.5657 20.1504 13.6891 20.2176C13.8126 20.2847 13.9518 20.3173 14.0922 20.312C14.2326 20.3066 14.369 20.2635 14.4869 20.1872L18.75 17.4287L23.0131 20.1872C23.131 20.2635 23.2674 20.3066 23.4078 20.312C23.5482 20.3173 23.6874 20.2847 23.8109 20.2176C23.9343 20.1504 24.0373 20.0512 24.1091 19.9304C24.1809 19.8097 24.2188 19.6718 24.2188 19.5312V9.375H34.375V12.5H30.4688C29.4331 12.5012 28.4402 12.9131 27.7079 13.6454C26.9756 14.3777 26.5637 15.3706 26.5625 16.4062V32.8125H3.125ZM44.5312 46.875H30.4688C29.9843 46.8744 29.5118 46.7239 29.1163 46.4441C28.7207 46.1644 28.4214 45.7691 28.2594 45.3125H46.7406C46.5786 45.7691 46.2793 46.1644 45.8837 46.4441C45.4882 46.7239 45.0157 46.8744 44.5312 46.875Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M37.5 24.2188C36.8819 24.2188 36.2778 24.402 35.7638 24.7454C35.2499 25.0888 34.8494 25.5768 34.6129 26.1479C34.3764 26.7189 34.3145 27.3472 34.435 27.9534C34.5556 28.5596 34.8533 29.1164 35.2903 29.5535C35.7273 29.9905 36.2842 30.2881 36.8904 30.4087C37.4965 30.5293 38.1249 30.4674 38.6959 30.2309C39.2669 29.9944 39.755 29.5938 40.0984 29.0799C40.4417 28.566 40.625 27.9618 40.625 27.3438C40.6241 26.5152 40.2945 25.7209 39.7087 25.1351C39.1228 24.5492 38.3285 24.2197 37.5 24.2188ZM37.5 28.9063C37.191 28.9063 36.8889 28.8146 36.6319 28.6429C36.375 28.4712 36.1747 28.2272 36.0564 27.9417C35.9382 27.6562 35.9072 27.342 35.9675 27.0389C36.0278 26.7358 36.1766 26.4574 36.3952 26.2389C36.6137 26.0204 36.8921 25.8716 37.1952 25.8113C37.4983 25.751 37.8124 25.7819 38.098 25.9002C38.3835 26.0185 38.6275 26.2187 38.7992 26.4757C38.9709 26.7326 39.0625 27.0347 39.0625 27.3438C39.062 27.758 38.8972 28.1552 38.6043 28.4481C38.3114 28.741 37.9143 28.9058 37.5 28.9063Z"
                                                                    fill="#FF5B00" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-services">
                                                            <p>Akses ke semua produk Pigijo dengan praktis</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;"
                                                class="services">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M16.4062 12.5H14.0625C13.8553 12.5 13.6566 12.5823 13.5101 12.7288C13.3636 12.8753 13.2812 13.074 13.2812 13.2812V18.75C13.2812 18.9572 13.3636 19.1559 13.5101 19.3024C13.6566 19.4489 13.8553 19.5312 14.0625 19.5312H16.4062C16.8206 19.5312 17.2181 19.3666 17.5111 19.0736C17.8041 18.7806 17.9687 18.3832 17.9687 17.9688V16.4062C17.9693 16.3034 17.9496 16.2015 17.9108 16.1063C17.8719 16.0111 17.8146 15.9246 17.7422 15.8516L17.5078 15.625L17.7422 15.3984C17.8146 15.3254 17.8719 15.2389 17.9108 15.1437C17.9496 15.0485 17.9693 14.9466 17.9687 14.8438V14.0625C17.9687 13.6481 17.8041 13.2507 17.5111 12.9576C17.2181 12.6646 16.8206 12.5 16.4062 12.5ZM16.4062 14.5234L15.8516 15.0703C15.7783 15.1429 15.7202 15.2293 15.6806 15.3245C15.6409 15.4198 15.6205 15.5219 15.6205 15.625C15.6205 15.7281 15.6409 15.8302 15.6806 15.9255C15.7202 16.0207 15.7783 16.1071 15.8516 16.1797L16.4062 16.7266V17.9688H14.8437V14.0625H16.4062V14.5234Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M22.6562 12.5H21.0938C20.6793 12.5 20.2819 12.6646 19.9889 12.9576C19.6959 13.2507 19.5312 13.6481 19.5312 14.0625V17.9688C19.5312 18.3832 19.6959 18.7806 19.9889 19.0736C20.2819 19.3666 20.6793 19.5312 21.0938 19.5312H22.6562C23.0707 19.5312 23.4681 19.3666 23.7611 19.0736C24.0541 18.7806 24.2188 18.3832 24.2188 17.9688V14.0625C24.2188 13.6481 24.0541 13.2507 23.7611 12.9576C23.4681 12.6646 23.0707 12.5 22.6562 12.5ZM21.0938 17.9688V14.0625H22.6562V17.9688H21.0938Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M28.9062 12.5H27.3438C26.9293 12.5 26.5319 12.6646 26.2389 12.9576C25.9459 13.2507 25.7812 13.6481 25.7812 14.0625V17.9688C25.7812 18.3832 25.9459 18.7806 26.2389 19.0736C26.5319 19.3666 26.9293 19.5312 27.3438 19.5312H28.9062C29.3207 19.5312 29.7181 19.3666 30.0111 19.0736C30.3041 18.7806 30.4688 18.3832 30.4688 17.9688V14.0625C30.4688 13.6481 30.3041 13.2507 30.0111 12.9576C29.7181 12.6646 29.3207 12.5 28.9062 12.5ZM27.3438 17.9688V14.0625H28.9062V17.9688H27.3438Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M36.4922 12.7262C36.4196 12.653 36.3332 12.5949 36.238 12.5552C36.1427 12.5155 36.0406 12.4951 35.9375 12.4951C35.8344 12.4951 35.7323 12.5155 35.6371 12.5552C35.5418 12.5949 35.4554 12.653 35.3828 12.7262L33.5938 14.5231V13.2809C33.5938 13.0737 33.5114 12.875 33.3649 12.7285C33.2184 12.582 33.0197 12.4996 32.8125 12.4996C32.6053 12.4996 32.4066 12.582 32.2601 12.7285C32.1136 12.875 32.0312 13.0737 32.0312 13.2809V18.7496C32.0312 18.9568 32.1136 19.1556 32.2601 19.3021C32.4066 19.4486 32.6053 19.5309 32.8125 19.5309C33.0197 19.5309 33.2184 19.4486 33.3649 19.3021C33.5114 19.1556 33.5938 18.9568 33.5938 18.7496V17.5075L35.3828 19.3043C35.4554 19.3776 35.5418 19.4357 35.6371 19.4753C35.7323 19.515 35.8344 19.5354 35.9375 19.5354C36.0406 19.5354 36.1427 19.515 36.238 19.4753C36.3332 19.4357 36.4196 19.3776 36.4922 19.3043C36.5654 19.2317 36.6235 19.1453 36.6632 19.0501C36.7029 18.9549 36.7233 18.8528 36.7233 18.7496C36.7233 18.6465 36.7029 18.5444 36.6632 18.4492C36.6235 18.354 36.5654 18.2676 36.4922 18.195L34.3047 16.0153L36.4922 13.8356C36.5654 13.763 36.6235 13.6766 36.6632 13.5813C36.7029 13.4861 36.7233 13.384 36.7233 13.2809C36.7233 13.1778 36.7029 13.0756 36.6632 12.9804C36.6235 12.8852 36.5654 12.7988 36.4922 12.7262Z"
                                                                    fill="#FF5B00" />
                                                                <path
                                                                    d="M43.75 9.375H6.25C5.4212 9.375 4.62634 9.70424 4.04029 10.2903C3.45424 10.8763 3.125 11.6712 3.125 12.5V19.5312C3.125 20.3601 3.45424 21.1549 4.04029 21.741C4.62634 22.327 5.4212 22.6562 6.25 22.6562H23.7344L27.5078 29.1953L26.5625 32.3438C26.459 32.6787 26.458 33.0369 26.5596 33.3724C26.6612 33.7079 26.8608 34.0054 27.1328 34.2266L31.25 37.5938L32.4609 39.6875C32.6197 39.9594 32.8483 40.1839 33.123 40.3378C33.3978 40.4916 33.7086 40.5692 34.0234 40.5625C34.331 40.5652 34.6334 40.4842 34.8984 40.3281L39.75 37.5C40.1525 37.2664 40.446 36.8828 40.5661 36.4332C40.6862 35.9836 40.6231 35.5047 40.3906 35.1016L39.3125 33.2422L38.7344 27.3438C38.7141 27.1154 38.6484 26.8933 38.5411 26.6907C38.4338 26.4881 38.287 26.3091 38.1094 26.1641C37.7462 25.8729 37.2835 25.7355 36.8203 25.7812L30.9688 26.3281L28.9062 22.6562H43.75C44.5788 22.6562 45.3737 22.327 45.9597 21.741C46.5458 21.1549 46.875 20.3601 46.875 19.5312V12.5C46.875 11.6712 46.5458 10.8763 45.9597 10.2903C45.3737 9.70424 44.5788 9.375 43.75 9.375ZM30.2031 27.8203C30.335 27.8813 30.4801 27.9081 30.625 27.8984L36.9688 27.3438C37.0166 27.3258 37.0693 27.3258 37.1172 27.3438C37.1364 27.3602 37.1518 27.3806 37.1626 27.4035C37.1734 27.4264 37.1792 27.4513 37.1797 27.4766L37.7734 33.5938C37.7881 33.7032 37.8225 33.8091 37.875 33.9063L39.0625 35.875C39.0862 35.92 39.0921 35.9723 39.0791 36.0215C39.0661 36.0707 39.035 36.1132 38.9922 36.1406L34.0703 38.9766C34.0251 38.994 33.9749 38.994 33.9297 38.9766C33.8808 38.9601 33.8393 38.9269 33.8125 38.8828L32.5 36.7188C32.4539 36.6355 32.393 36.5614 32.3203 36.5L28.125 33.0156C28.0953 32.9921 28.0734 32.96 28.0622 32.9238C28.051 32.8875 28.0511 32.8487 28.0625 32.8125L29.1328 29.3281C29.165 29.2248 29.1754 29.1158 29.1633 29.0082C29.1512 28.9006 29.1169 28.7967 29.0625 28.7031L25 21.7422C24.9537 21.6656 24.9242 21.58 24.9134 21.4911C24.9026 21.4022 24.9108 21.312 24.9375 21.2266C24.9619 21.1391 25.0045 21.0577 25.0623 20.9878C25.1202 20.9178 25.1921 20.8607 25.2734 20.8203C25.356 20.7794 25.4469 20.758 25.5391 20.7578C25.67 20.7639 25.7974 20.8029 25.9093 20.8712C26.0213 20.9394 26.1143 21.0348 26.1797 21.1484L29.8516 27.5C29.9349 27.6388 30.0571 27.7502 30.2031 27.8203ZM45.3125 19.5312C45.3125 19.9457 45.1479 20.3431 44.8549 20.6361C44.5618 20.9291 44.1644 21.0938 43.75 21.0938H27.9688L27.5469 20.3672C27.2669 19.8598 26.8025 19.4795 26.2499 19.3049C25.6973 19.1304 25.0987 19.1751 24.5781 19.4297C24.3041 19.5628 24.061 19.7518 23.8646 19.9846C23.6681 20.2174 23.5226 20.4888 23.4375 20.7812C23.4084 20.8836 23.3875 20.9881 23.375 21.0938H6.25C5.8356 21.0938 5.43817 20.9291 5.14515 20.6361C4.85212 20.3431 4.6875 19.9457 4.6875 19.5312V12.5C4.6875 12.0856 4.85212 11.6882 5.14515 11.3951C5.43817 11.1021 5.8356 10.9375 6.25 10.9375H43.75C44.1644 10.9375 44.5618 11.1021 44.8549 11.3951C45.1479 11.6882 45.3125 12.0856 45.3125 12.5V19.5312Z"
                                                                    fill="#FF5B00" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-services">
                                                            <p>Book dengan cepat
                                                                dan mudah</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;"
                                                class="services">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <svg width="40" height="50" viewBox="0 0 40 50" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M35.8333 5H35V4.16667C34.9972 1.86646 33.1335 0.00284831 30.8333 0H4.16667C1.86646 0.00284831 0.00284831 1.86646 0 4.16667V40.8333C0.00284831 43.1335 1.86646 44.9972 4.16667 45H5V45.8333C5.00285 48.1335 6.86646 49.9972 9.16667 50H35.8333C38.1335 49.9972 39.9972 48.1335 40 45.8333V9.16667C39.9972 6.86646 38.1335 5.00285 35.8333 5ZM28.3333 1.66667V5.48828L27.2559 4.41081C26.9303 4.08569 26.403 4.08569 26.0775 4.41081L25 5.48828V1.66667H28.3333ZM1.66667 40.8333V4.16667C1.66667 2.78605 2.78605 1.66667 4.16667 1.66667H23.3333V7.5C23.3333 7.83691 23.5364 8.14087 23.8477 8.26986C24.1589 8.39884 24.5174 8.32723 24.7559 8.08919L26.6667 6.17839L28.5775 8.08919C28.8159 8.32723 29.1744 8.39884 29.4857 8.26986C29.797 8.14087 30 7.83691 30 7.5V1.66667H30.8333C32.2139 1.66667 33.3333 2.78605 33.3333 4.16667V40.8333C33.3333 42.2139 32.2139 43.3333 30.8333 43.3333H4.16667C2.78605 43.3333 1.66667 42.2139 1.66667 40.8333ZM38.3333 45.8333C38.3333 47.2139 37.2139 48.3333 35.8333 48.3333H9.16667C7.78605 48.3333 6.66667 47.2139 6.66667 45.8333V45H30.8333C33.1335 44.9972 34.9972 43.1335 35 40.8333V6.66667H35.8333C37.2139 6.66667 38.3333 7.78605 38.3333 9.16667V45.8333Z"
                                                                    fill="#FF5B00" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-services">
                                                            <p>Punya histori booking
                                                                yang tersimpan rapi</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end: tr -->
                            <tr>
                                <td class="bg_white email-section">
                                    <div class="heading-section" style="text-align: center; padding: 0 30px;">
                                        <h2>Projects</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the
                                            necessary regelialia.</p>
                                    </div>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td style="padding-top: 20px; padding-right: 10px;">
                                                            <a href="#"><img src="images/work-1.jpg" alt=""
                                                                    style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td style="padding-top: 20px; padding-left: 10px;">
                                                            <a href="#"><img src="images/work-2.jpg" alt=""
                                                                    style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td style="padding-top: 20px; padding-right: 10px;">
                                                            <a href="#"><img src="images/work-3.jpg" alt=""
                                                                    style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td style="padding-top: 20px; padding-left: 10px;">
                                                            <a href="#"><img src="images/work-4.jpg" alt=""
                                                                    style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end: tr -->

                            <tr>
                                <td valign="middle" class="counter"
                                    style="background-image: url(images/bg_1.jpg); background-size: cover; padding: 4em 0;">
                                    <div class="overlay"></div>
                                    <table>
                                        <tr>
                                            <td valign="middle" width="33.333%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td class="counter-text">
                                                            <span class="num">20</span>
                                                            <span class="name">Clients</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="middle" width="33.333%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td class="counter-text">
                                                            <span class="num">1200</span>
                                                            <span class="name">Projects</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="middle" width="33.333%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td class="counter-text">
                                                            <span class="num">100</span>
                                                            <span class="name">Coffee Cups</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="bg_white email-section">
                                    <div class="heading-section" style="text-align: center; padding: 0 30px;">
                                        <h2>Our Blog</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the
                                            necessary regelialia.</p>
                                    </div>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top" width="50%" style="padding-top: 20px;">
                                                <table role="presentation" cellspacing="0" cellpadding="10" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/blog-1.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-services" style="text-align: left;">
                                                            <p class="meta"><span>Posted on Feb 18, 2019</span>
                                                                <span>Food</span></p>
                                                            <h3>Business Key to Success</h3>
                                                            <p>Far far away, behind the word mountains, far from the
                                                                countries</p>
                                                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="50%" style="padding-top: 20px;">
                                                <table role="presentation" cellspacing="0" cellpadding="10" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/blog-2.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-services" style="text-align: left;">
                                                            <p class="meta"><span>Posted on Feb 18, 2019</span>
                                                                <span>Food</span></p>
                                                            <h3>Web Design Technique</h3>
                                                            <p>Far far away, behind the word mountains, far from the
                                                                countries</p>
                                                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end: tr -->
                            <tr>
                                <td class="bg_light email-section">
                                    <div class="heading-section" style="text-align: center; padding: 0 30px;">
                                        <h2>Our Team</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the
                                            necessary regelialia.</p>
                                    </div>
                                    <table role="presentation" border="0" cellpadding="10" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/person_1.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; margin-bottom: 20px; display: block;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-testimony" style="text-align: center;">
                                                            <h3 class="name">Ronald Tuff</h3>
                                                            <span class="position">Businessman</span>
                                                            <p>Far far away, behind the word mountains</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/person_2.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; margin-bottom: 20px; display: block;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-testimony" style="text-align: center;">
                                                            <h3 class="name">Willam Clarson</h3>
                                                            <span class="position">Businessman</span>
                                                            <p>Far far away, behind the word mountains</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/person_3.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; margin-bottom: 20px; display: block;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-testimony" style="text-align: center;">
                                                            <h3 class="name">Willam Clarson</h3>
                                                            <span class="position">Businessman</span>
                                                            <p>Far far away, behind the word mountains</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end: tr -->
                            <tr>
                                <td class="bg_white email-section" style="width: 100%;">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td valign="middle" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td>
                                                            <img src="images/bg_2.jpg" alt=""
                                                                style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="middle" width="50%">
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                    width="100%">
                                                    <tr>
                                                        <td class="text-services"
                                                            style="text-align: left; padding-left:25px;">
                                                            <div class="heading-section">
                                                                <h2>Our Features</h2>
                                                            </div>
                                                            <div class="services-list">
                                                                <img src="images/checked.png" alt=""
                                                                    style="width: 50px; max-width: 600px; height: auto; display: block;">
                                                                <div class="text">
                                                                    <h3>Responsive</h3>
                                                                    <p>A small river named Duden flows by their</p>
                                                                </div>
                                                            </div>
                                                            <div class="services-list">
                                                                <img src="images/checked.png" alt=""
                                                                    style="width: 50px; max-width: 600px; height: auto; display: block;">
                                                                <div class="text">
                                                                    <h3>Responsive</h3>
                                                                    <p>A small river named Duden flows by their</p>
                                                                </div>
                                                            </div>
                                                            <div class="services-list">
                                                                <img src="images/checked.png" alt=""
                                                                    style="width: 50px; max-width: 600px; height: auto; display: block;">
                                                                <div class="text">
                                                                    <h3>Responsive</h3>
                                                                    <p>A small river named Duden flows by their</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end: tr -->
                            <tr>
                                <td class="primary email-section" style="text-align:center;">
                                    <div class="heading-section heading-section-white">
                                        <h2>Get Ready For Modern Design</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the
                                            necessary regelialia. It is a paradisematic country, in which roasted parts
                                            of sentences fly into your mouth.</p>
                                        <p><a href="#" class="btn btn-white-outline">Get Started</a></p>
                                    </div>
                                </td>
                            </tr><!-- end: tr -->
                        </table>

                    </td>
                </tr><!-- end:tr -->
                <!-- 1 Column Text + Button : END -->
            </table>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin: auto;">
                <tr>
                    <td valign="middle" class="bg_black footer email-section">
                        <table>
                            <tr>
                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-right: 10px;">
                                                <h3 class="heading">About</h3>
                                                <p>A small river named Duden flows by their place and supplies it with
                                                    the necessary regelialia.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                <h3 class="heading">Contact Info</h3>
                                                <ul>
                                                    <li><span class="text">203 Fake St. Mountain View, San Francisco,
                                                            California, USA</span></li>
                                                    <li><span class="text">+2 392 3929 210</span></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-left: 10px;">
                                                <h3 class="heading">Useful Links</h3>
                                                <ul>
                                                    <li><a href="#">Home</a></li>
                                                    <li><a href="#">About</a></li>
                                                    <li><a href="#">Services</a></li>
                                                    <li><a href="#">Work</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end: tr -->
                <tr>
                    <td valign="middle" class="bg_black footer email-section">
                        <table>
                            <tr>
                                <td valign="top" width="33.333%">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-right: 10px;">
                                                <p>&copy; 2018 Corporate. All Rights Reserved</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="33.333%">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: right; padding-left: 5px; padding-right: 5px;">
                                                <p><a href="#" style="color: rgba(255,255,255,.4);">Unsubcribe</a></p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>
