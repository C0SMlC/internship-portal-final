<?php
$image =  "../../assets/College.png"
    ?>

<div class="main">
    <div class="first">
        <div class="outer">
            <div class="logo">
                <img src=<?php echo $image ?> class="image1" alt="...">
            </div>
            <div class="name">
                <p class="pce">PILLAI COLLEGE OF ENGINEERING</p>
                <p class="status">
                    (Autonomous)
                </p>
            </div>
        </div>
        <div class="credit">
            <p class="grade">A+</p>
            <p class="organization">
                NAAC
            </p>
        </div>
    </div>
    <div class="second"></div>
    <div class="third"></div>
</div>
<style>
    .main {
        width: 100%;
        height: 250px;
        display: flex;
        flex-direction: column;
    }

    .first {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .outer {
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .second {
        width: 100%;
        height: 10px;
        background-color: #ffcb00;
    }

    .third {
        flex: 0.5;
        background-color: #1b3061;
    }

    .image1 {
        width: 90px;
        height: 100px;
    }

    .logo {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .name {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #1b3061;
        font-weight: bold;
        font-size: 1.2rem;
        margin-right: 2rem;
    }

    .credit {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ec0000;
        font-weight: bold;
        font-size: 1.5rem;
    }

    @media only screen and (max-width: 600px) {
        html{
            font-size: 62.5%;
        }
        .main {
            height: 280px;
        }

        .first {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: repeat(2, 1fr);
        }

        .first {
            margin: 10px;
        }

        .outer {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 1fr;
        }

        .name {
            color: #1b3061;
            font-weight: bold;
            font-size: 1.1rem;
            margin-right: 0px;
        }

        .credit {
            color: #ec0000;
            font-weight: bold;
            font-size: 1.2rem;
        }
    }
</style>