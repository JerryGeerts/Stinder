<?php
    $message = "
    <html>
        <head>
            <style type='text/css'>
                body {
                    font-family : arial;
                    margin: 0;
                    background-color: #E01944;
                }
                #content {
                    position: absolute;
                    width: 76%;
                    border-radius: 10px;
                    margin: 0 auto;
                    text-align: center;
                    color: black;
                    box-shadow: 0 0 6px black;
                    padding: 7px;
                    background: white;
                    margin-top: 50px;
                    left: 50%;
                    margin-left: -38%;
                }
                #verifylink {
                    text-decoration: none;
                    background-color: #e01944;
                    color: white;padding: 9px;
                    box-shadow: 0px 5px 0px #a63636;
                    font-size: 22px;
                    border-radius: 5px;
                }
            </style>
            <title>Verify je email</title>
        </head>
        <body>
            <div id='content'>
                <h2>EMAIL TEMP</h2>
                <a href='https://sappigejongens.nl/stinder/INCLUDES/register/verify.php?s={$emailString}' id='verifylink'>verifeer nu!</a>
                <p style='margin-top: 29px; font-size: 6px; font-family: cursive;'>EEN SAPPIGE JONGENS PRODUCTIE</p>
            </div>
        </body>
    </html>
    ";
    
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Stinder <NoReply@SappigeJongens.nl>' . "\r\n";
?>