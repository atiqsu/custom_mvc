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

    <script>

        let clientIp = '';

        function getIp(json) {

            clientIp = json.ip;

            setTimeout(function (ev) {

                //setIpAddress('ip_address');

            }, 1500);
        }

    </script>

    <script type="application/javascript" src="https://json.geoiplookup.io/api?callback=getIp"></script>

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

        <!--
        id (bigint 20) AI
        buyer (varchar 255) *
        buyer_email (varchar 50) *
        amount (int 10) *
        receipt_id (varchar 20) *
        items (varchar 255) *


        note (text) *

        city (varchar 20) *
        phone (varchar 20) *
        entry_by (init 10) *


        hash_key (varchar 255)
        entry_at (date)
        buyer_ip (varchar 20)  -->


        <div class="form-group row">
            <label for="buyer_name" class="col-sm-2 col-form-label">Buyer</label>
            <div class="col-sm-10">
                <input class="form-control" id="buyer_name" value="" placeholder="Buyer name" maxlength="255">
            </div>
        </div>

        <div class="form-group row">
            <label for="buyer_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="buyer_email" value="" placeholder="Buyer email" maxlength="50">
            </div>
        </div>

        <div class="form-group row">
            <label for="buy_price" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="buy_price" value="" placeholder="Amount" min="0" max="9999999999">
            </div>
        </div>


        <div class="form-group row">
            <label for="receipt_id" class="col-sm-2 col-form-label">Receipt ID</label>
            <div class="col-sm-10">
                <input class="form-control" id="receipt_id" value="" placeholder="Receipt ID" maxlength="20">
            </div>
        </div>

        <div class="form-group row">
            <label for="items_name" class="col-sm-2 col-form-label">Items</label>
            <div class="col-sm-10">
                <input class="form-control" id="items_name" value="" placeholder="Item name..." maxlength="255" />
            </div>
        </div>

        <div class="form-group row">
            <label for="items_note" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
                <input class="form-control" id="items_note" value="" placeholder="Notes..." maxlength="255" />
            </div>
        </div>

        <div class="form-group row">
            <label for="city_name" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input class="form-control" id="city_name" value="" placeholder="City name..." maxlength="20" />
            </div>
        </div>

        <div class="form-group row">
            <label for="phone_no" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input class="form-control" id="phone_no" value="" placeholder="Phone or mobile number..." maxlength="20" />
            </div>
        </div>

        <div class="form-group row">
            <label for="entry_by" class="col-sm-2 col-form-label">Entry by</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="entry_by" value="" placeholder="Entry by (an integer number........?)" min="0" max="9999999999" maxlength="10">
            </div>
        </div>

        <div class="form-group row">
            <label for="ip_address" class="col-sm-2 col-form-label">IP Address </label>
            <div class="col-sm-10">
                <input class="form-control" id="ip_address" value="<?=getUserIpAddress()?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="ip_address" class="col-sm-2 col-form-label">&nbsp; </label>
            <div class="col-sm-10">
                <button class="btn btn-primary"> Submit </button>
            </div>
        </div>

    </form>


    <div><?php echo 'I am from php......' ?></div>
</div>


<script>


    function setIpAddress(elmId) {

        let elm = document.getElementById(elmId);

        elm.value = clientIp;
        elm.readOnly = true;
    }

</script>
</body>
</html>
