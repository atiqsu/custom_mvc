<?php

/**
 * Get the ip address of the client...
 *
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * @return mixed
 */
function getUserIpAddress() {

    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {

        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}



?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Testing </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>

        .hdr {
            text-align: center;
            border-bottom: solid 1px grey;
            padding-bottom: 10px;
            margin-bottom: 10px;
            background: #374a5e;
            color: white;
            margin-top: 15px;
        }

        .frm {
            border: solid 1px #374a5e;
            border-radius: 5px;
        }

        .frm > .row {
            padding: 5px;
        }

    </style>
</head>
<body>

<div class="container">

    <h1 class="hdr">My First Bootstrap Page</h1>


    <form class="frm">

        <br/>

        id (bigint 20) AI
        amount (int 10) *
        buyer (varchar 255) *
        receipt_id (varchar 20) *
        items (varchar 255) *
        buyer_email (varchar 50) *
        buyer_ip (varchar 20)
        note (text) *
        city (varchar 20) *
        phone (varchar 20) *
        hash_key (varchar 255)
        entry_at (date)
        entry_by (init 10) *


        <div class="form-group row">
            <label for="buyer_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="buyer_email" value="" placeholder="Buyer email">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staticEmail" value="email@example.com">
            </div>
        </div>

        <div class="form-group row">
            <label for="ip_address" class="col-sm-2 col-form-label">IP Address </label>
            <div class="col-sm-10">
                <input readonly class="form-control" id="ip_address" value="<?=getUserIpAddress()?>">
            </div>
        </div>
    </form>


    <div><?php echo 'I am from php......' ?></div>
</div>

</body>
</html>
