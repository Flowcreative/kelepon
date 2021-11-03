<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="<?= base_url('src/landing/') ?>img/faviprabu.png" type="image/png">
<title>Coming Soon</title>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bgimg {
        background-image: url('<?= base_url('src/') ?>12.jpg');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    hr {
        margin: auto;
        width: 40%;
    }

    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button4 {
        border-radius: 12px;
    }
</style>

<body>

    <div class="bgimg">
        <div class="topleft">

        </div>
        <div class="middle">
            <h1>COMING SOON</h1>

            <!-- <p>35 days left</p> -->
            <h2>Dapatkan terus update informasi melalui instagram kami</h2>
            <h1>@pramuka.unib</h1>


            <a href="<?= base_url('auth/logout') ?>" class="button button4">Back to home</a>
        </div>
        <div class="bottomleft">

        </div>
    </div>

</body>

</html>