<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            overflow-x: hidden;
            justify-content: center;
        }

        body {
            background: #eaeaea;
            /* display: flex; */
            /* flex-direction: column; */
            min-height: calc(100vh - 60px);
            /* align-items: center; */
            /* justify-content: center; */
            padding: 30px;
        }

        a {
            color: #5E5CFA;
            text-decoration: none
        }

        .card {
            margin: 0px auto;
        }

        .card-header {
            background: #F9F4FF;
            border-radius: 8px;
            padding: 46px 26px;
            margin-bottom: 39px;
        }

        .card-step .card-header {
            padding: 25px 25px 38px 25px;
        }

        .card-step .card-header::before {
            content: 0;
            display: none;
        }

        .text {

            font-size: 14px;
            line-height: 24px;
            color: #102E5B;
        }

        .text-strong {

            color: #102E5B;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
        }

        .text-margin {
            margin-top: 34px;
        }

        .text-margin-sm {
            margin-top: 23px;
        }

        .card {
            padding: 26px 25px 32px 21px;
            background: #ffffff;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
        }

        .content {
            padding: 0 26px;
        }



        .submit-btn {
            cursor: pointer;
            display: inline-block;
            padding: 18px 43px;
            background: #5E5CFA;

            font-size: 22px;
            border-radius: 5px;
            color: #ffffff;
            border: 0;
            outline: 0;
            margin-top: 20px;
            text-decoration: none
        }

        .title {

            font-size: 35px;
            margin-bottom: 15px;
            color: #102E5B;
        }

        .main-title {

            font-size: 25px;
            margin-bottom: 10px;
            color: #5E5CFA;
        }

        .subtitle {

            font-size: 11px;
            color: #102E5B;
            max-width: 211px;
            width: 100%;
        }

        .card-footer {
            margin-top: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
        }

        .footer-logo {
            max-width: 93.52px;
            max-height: 21px;
            width: 100%;
            height: auto;
            margin-left: 10px;
        }

        @media screen and (max-width: 600px) {
            .card-header {
                background-image: none !important;
            }
            .card-header {
                background: #F9F4FF;
                border-radius: 8px;
                padding: 30px 20px;
                margin-bottom: 25px;
            }

            .submit-btn {
                padding: 10px 20px;
                font-size: 15px;
                margin-top: 15px;
            }

            .text-margin {
                margin-top: 25px;
            }

            .content,
            .card-footer {
                padding: 0 10px;
            }

            .card-footer {
                margin-top: 40px;
            }
        }

        @media screen and (max-width: 360px) {
            .main-title {
                font-size: 20px;
            }

            .card-footer span {
                font-size: 10px;
            }

            .footer-logo {
                max-width: 63px;
                margin-left: 5px;
            }
        }

    </style>
    <style>
        .card-header {
            position: relative;
            background-position: right;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url(https://api.flipchain.ai/email_assets/images/invitation-header.png);
        }

        /* .card-header::before {
            content: '';
            position: absolute;
            display: block;
            top: 13px;
            right: -7px;
            width: 273px;
            height: 200px;
            background: url('./images/invitation-header.svg') no-repeat center;
            background-size: cover;
        } */

        .user {
            display: flex;
            align-items: center;
            margin-top: 42px;
        }

        .user .username {
            margin-right: 15px;
            width: 50px;
            height: 50px;
            background: #F14336;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            font-size: 20px;
        }

        .user .info .name {
            color: #102E5B;
            font-size: 18px;

        }

        .user .info .value {
            font-size: 13px;
            color: #9494A3;

        }


        @media screen and (max-width:600px) {
            .card-header::before {
                top: 10px;
                right: -15px;
                width: 235px;
                height: 173px;
            }

            .user .username {
                margin-right: 10px;
            }
        }

        @media screen and (max-width:530px) {
            .card-header::before {
                top: 15px;
                width: 160px;
                height: 117px;
            }
        }

        @media screen and (max-width:460px) {
            .card-header::before {
                content: 0;
                display: none;
            }
        }

    </style>
    <title>Email invitation</title>
</head>

<body>
<div class="card">
    <div class="content">
        <p class="text">
            <span class="text-strong">Hi,</span>
            {{--{{ $career->name }} <a href="#">{{ $career->email }}</a> wants to contact with you.--}}
        </p>
        <div class="user">
            <div class="info">
                {{--<h5 class="name">Name: {{ $career->name }}</h5><br>--}}
                {{--<span class="value">Phone: {{$career->phone}}</span><br>--}}
                {{--<span class="value">Email: {{$career->email}}</span><br>--}}
                {{--<span class="value">Desired Position: {{$career->desired_position}}</span><br>--}}
                {{--<span class="value">Uploaded File: {{$document}}</span>--}}
            </div>
        </div>
    </div>
    <div class="card-footer">
        <span class="subtitle">Thank you for using MegaTex</span>
        <img class="footer-logo" src="{{asset('images/LOGO.png')}}" alt="MegaTex">
    </div>
</div>
</body>

</html>
