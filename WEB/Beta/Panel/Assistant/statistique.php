<?php
session_start();
require_once "../../config.php";
?>


<html>

<head>




</head>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>


</header>

<style>



    body {

        background-color:white ;

    }
    .container {
        margin-top:25%;
        max-width:600px;
        margin:0 auto;
        text-align:center;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
        background-color: #F5F5F5;
        box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 17px 17px 0 rgba(0, 0, 0, 0.15);
    }
    .head {
        margin-top:30%;
        -webkit-border-radius:6px 6px 0px 0px;
        -moz-border-radius:6px 6px 0px 0px;
        border-radius:6px 6px 0px 0px;
        background-color: #88b2d1;
        color:#FAFAFA;
    }
    h2 {
        text-align:center;
        padding:18px 0 18px 0;
        font-size: 1.4em;
    }
    input {
        margin-bottom:10px;
    }
    textarea {
        height:100px;
        margin-bottom:10px;
    }
    input:first-of-type
    {
        margin-top:35px;
    }
    input, textarea {
        font-size: 1em;
        padding: 15px 10px 10px;
        font-family: 'Source Sans Pro',arial,sans-serif;
        border: 1px solid #cecece;
        background: #d7d7d7;
        color:black;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -moz-background-clip: padding;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        width: 80%;
        max-width: 600px;
    }
    ::-webkit-input-placeholder {
        color: black;
    }
    :-moz-placeholder {
        color: black;
    }
    ::-moz-placeholder {
        color: black;
    }
    :-ms-input-placeholder {
        color: black;
    }
    button {
        margin-top:15px;
        margin-bottom:25px;
        background-color:#88b2d1;
        padding: 12px 45px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        border-radius: 5px;
        border: 1px solid #88b2d1;
        -webkit-transition: .5s;
        transition: .5s;
        display: inline-block;
        cursor: pointer;
        width:30%;
        color:#fff;
    }
    button:hover, .button:hover {
        background: 	#1E90FF;
    }
    label.error {
        font-family:'Source Sans Pro',arial,sans-serif;
        font-size:1em;
        display:block;
        padding-top:10px;
        padding-bottom:10px;
        background-color:#d89c9c;
        width: 80%;
        margin:auto;
        color: #FAFAFA;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
    }
    /* media queries */
    @media (max-width: 700px) {
        label.error {
            width: 90%;
        }
        input, textarea {
            width: 90%;
        }
        button {
            width:90%;
        }
        body {
            padding-top:10px;
        }
    }
    .message {
        font-family:'Source Sans Pro',arial,sans-serif;
        font-size:1.1em;
        display:none;
        padding-top:10px;
        padding-bottom:10px;
        background-color: #88b2d1;
        width: 80%;
        margin:auto;
        color: #FAFAFA;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
    }

</style>





















<body>


        <form action="statistique2.php" method="post">

            <div class="container">
                <div class="head">
                    <h2>Statistique</h2>
                </div>

                <input type="text" name="search" placeholder=" ex: Martin " required <br/>
                <div>

                    <input type="date" id="date-min" name="date-min" required>


                    <div>

                        <input type="date" id="date-max" name="date-max" required>
                    </div>


                    <div class="message">Message Sent</div>
                    <button id="submit" type="submit">
                        Valider
                    </button>
                </div>
        </form>



</body>

<footer>

</footer>

</html>

