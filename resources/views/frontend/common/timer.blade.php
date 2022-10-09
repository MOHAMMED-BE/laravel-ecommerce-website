<style>
    .timer {
        width: 23rem;
        margin: 0 0 0 3px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .timer ul {
        display: flex;
    }

    .timer ul li {
        box-shadow: 0 0.1rem 1.3rem 0 rgb(22 39 86 / 28%);
        background-color: #fff;
        margin: 0 3px 0px 3px;
        text-align: center;
        width: 40px;
        height: 40px;
        border-radius: 3px;
    }

    .timer ul li p {
        text-align: center;
        font-size: 15px;
        border-radius: 5px;
        padding: 1px;
        margin: 0 3px -2px 3px;
        font-weight: bold;

    }

    .timer ul li p span {
        font-size: 9px;
        font-weight: 600;
        padding: 3px 1px 4px 0;
    }

    #sec {
        margin: 0 5rem 0 0 !important;
    }

    @media all and (max-width: 1200px) {

        .timer {
            margin: 0 0 0 -7px;
            transform: scale(0.9);
        }

        #sec {
            margin: 0 9rem 0 0 !important;
        }

    }

    @media all and (max-width: 992px) {

        .timer {
            margin: 0 0 0 75px;
            transform: scale(1.0);
        }

    }

    @media all and (max-width: 745) {

        .timer {
            margin: 0 0 0 69px;
            transform: scale(1.0);
        }
    }

    @media all and (max-width: 700) {

        .timer {
            margin: 0 0 0 59px;
            transform: scale(1.0);
        }
    }

    @media all and (max-width: 515) {

        .timer {
            margin: 0 0 0 13px;
            transform: scale(1.0);
        }

    }
</style>
</head>

<body>

    <div class="timer">
        <ul>
            <li>
                <p class="day"></p><span>DAYS</span>
            </li>
            <li>
                <p class="hour"></p><span>HRS</span>
            </li>
            <li>
                <p class="minute"></p><span>MINS</span>
            </li>
            <li id="sec">
                <p class="secound"></p><span>SEC</span>
            </li>
        </ul>
    </div>

    <script>
        var countDownDate = new Date("2022-10-25 21:34:41").getTime();

        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $(".day").html(days);
            $(".hour").html(hours);
            $(".minute").html(minutes);
            $(".secound").html(seconds);

            if (distance < 0) {
                clearInterval(x);
                $(".day").html("EXPIRED");
            }
        }, 1000);
    </script>