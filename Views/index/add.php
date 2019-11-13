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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js"></script>

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

        .more_item > .form-group {
            margin-bottom: 5px;
        }

        .more_item > .form-group:last-child {
            margin-bottom: 15px;
        }

    </style>

</head>
<body>

<div class="container">

    <h1 class="hdr">My First Bootstrap Page</h1>


    <form class="frm" id="prd_frm">

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
                <input class="form-control" id="buyer_name" value="" placeholder="Buyer name" maxlength="20" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="buyer_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="buyer_email" value="" placeholder="Buyer email" maxlength="50" required >
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
                <input class="form-control" id="receipt_id" value="" placeholder="Receipt ID" maxlength="20" required />
            </div>
        </div>

        <div class="form-group row" style="margin-bottom: 0;">
            <label for="items_name" class="col-sm-2 col-form-label">Items</label>
            <div class="col-sm-9">
                <input class="form-control" name="items_name[]" value="" placeholder="Item name..." maxlength="255" required />
            </div>
            <div class="col-sm-1">
                <button class="btn btn-success" onclick="addMoreItemElement(this)"> + </button>
            </div>
        </div>

        <div class="more_item" style="padding: 0 5px;"></div>


        <div class="form-group row">
            <label for="items_note" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
                <textarea name="items_note" id="items_note" rows="5" class="form-control" placeholder="Notes..."></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="city_name" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input class="form-control" id="city_name" value="" placeholder="City name..." maxlength="20" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="phone_no" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="phone_no" value="" placeholder="Phone or mobile number..." maxlength="20" onblur="prependAreaCode(this)" required />
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
                <input class="form-control" readonly id="ip_address" value="<?=getUserIpAddress()?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="ip_address" class="col-sm-2 col-form-label">&nbsp; </label>
            <div class="col-sm-10">
                <button class="btn btn-primary" id="frm_submit"> Submit </button>
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


    //equivalent to document.ready in jquery...
    (function () {

        document.querySelector('#frm_submit').onclick = function (ev) {
            ev.preventDefault();


            let arrayInp = [];

            let buyerName   = document.querySelector('#buyer_name').value;
            let buyerEmail  = document.querySelector('#buyer_email').value;
            let amount      = document.querySelector('#buy_price').value;
            let receiptId   = document.querySelector('#receipt_id').value;
            let cityName    = document.querySelector('#city_name').value;
            let phoneNum    = document.querySelector('#phone_no').value;
            let entryBy     = document.querySelector('#entry_by').value;

            if(! validateName(buyerName)) {

                showError('buyer_name', 'Only text, spaces and numbers, not more than 20 characters.');

                return false;
            }

            clearError('buyer_name');


            if(! validateEmail(buyerEmail)) {

                showError('buyer_email', 'Must be a valid email address and not longer than 50 characters.');

                return false;
            }

            clearError('buyer_email');

            if(! validateAmount(amount)) {

                showError('buy_price', 'Must be an Integer and less than 9999999999');

                return false;
            }

            clearError('buy_price');

            if(! validateReceiptId(receiptId)) {

                showError('receipt_id', 'Only text/characters allowed and  not more than 20 characters.');

                return false;
            }

            clearError('receipt_id');

            let itemsElm = document.querySelectorAll('input[name="items_name[]"]');
            let first    = itemsElm.item(0);

            if(first.value.trim() === '') {

                showErrorToElm(first, 'Can not be empty and more than 255 characters.');

                return false;
            }

            clearErrorOfElm(first);

            itemsElm.forEach(function (node) {

                if(node.value.trim() === '') {

                    let nd = node.parentElement.parentNode;
                    nd.parentElement.removeChild(nd);

                    return;
                }

                arrayInp.push(node.value);
            });


            if(! validateCity(cityName)) {

                showError('city_name', 'Only space & characters are allowed and at least 2 character and no more than 20 characters.');

                return false;
            }

            clearError('city_name');

            if(! validatePhone(phoneNum)) {

                showError('phone_no', 'Phone number is required & must contain 880 and can not be longer than 20 characters.');

                return false;
            }

            clearError('phone_no');

            if(! validateEntryBy(entryBy)) {

                showError('entry_by', 'Only numbers is allowed and can not be longer than 20 characters.');

                return false;
            }

            clearError('entry_by');

            let itemNote = document.querySelector('#items_note').value;
            let ipAddress = document.querySelector('#ip_address').value;


            let values = {
                'buyer_name': buyerName,
                'buyer_email': buyerEmail,
                'buy_price': amount,
                'receipt_id': receiptId,
                'items_name': arrayInp,
                'items_note': itemNote,
                'city_name': cityName,
                'phone_no': phoneNum,
                'entry_by': entryBy,
                'ip_address': ipAddress
            };

            console.log('All the values....', values);

            // let dialog = bootbox.dialog({
            //     message: '<p class="text-center"><i class="fa fa-spin fa-spinner"></i> Waiting for server response....</p>',
            //     closeButton: false
            // });


            $.ajax({
                url: '/create',
                method: 'POST',
                data: values,
                dataType: 'json',
                success: function (data) {

                    console.log('Hmmm.....', data);

                    if (data.result === 'ok') {



                    } else {

                    }
                },
                error: function (data) {

                    //dialog.modal('hide');
                },
                complete: function () {

                }
            });
        };




    })();



    /**
     *
     * @param amount
     * @returns {boolean}
     */
    function validateAmount(amount) { return /^([1-9]|[1-9]\d+)$/.test(amount) && amount.toString().length < 10; }


    /**
     *
     * @param name
     * @returns {boolean}
     */
    function validateName(name) {

        let regexp = new RegExp(/^[a-zA-Z0-9 ]{1,20}$/);

        return regexp.test(name)
    }



    /**
     *
     * @param elmId
     * @param $msg
     */
    function showError(elmId, $msg) {

        let elm = document.querySelector('#'+elmId);

        addCSSClass(elm, 'is-invalid');

        let node = document.createElement("small");
        let textNode = document.createTextNode($msg);

        node.className = 'text-danger';
        node.appendChild(textNode);

        elm.parentNode.appendChild(node);
    }


    function showErrorToElm(elm, $msg) {

        addCSSClass(elm, 'is-invalid');

        let node = document.createElement("small");
        let textNode = document.createTextNode($msg);

        node.className = 'text-danger';
        node.appendChild(textNode);

        elm.parentNode.appendChild(node);
    }


    /**
     *
     * @param elmId
     * @returns {boolean}
     */
    function clearAllError(elmId) {

        document.querySelector('#'+elmId).querySelectorAll('small.text-danger').forEach(function (node) {
            node.parentNode.removeChild(node);
        });


        return true;
    }

    /**
     *
     * @param elmId
     * @returns {boolean}
     */
    function clearError(elmId) {

        let elm = document.querySelector('#'+elmId);

        elm.parentElement.querySelectorAll('small.text-danger').forEach(function (node) {

            node.parentNode.removeChild(node);
        });

        removeCSSClass(elm, 'is-invalid');

        return true;
    }

    function clearErrorOfElm(elm) {

        elm.parentElement.querySelectorAll('small.text-danger').forEach(function (node) {

            node.parentNode.removeChild(node);
        });

        removeCSSClass(elm, 'is-invalid');

        return true;
    }


    /**
     *
     * @param elm
     * @param $class
     */
    function addCSSClass(elm, $class) {

        if (elm.className.split(' ').indexOf($class) < 0) {

            elm.className += " " + $class;
        }
    }


    /**
     *
     * @param elm
     * @param $class
     */
    function removeCSSClass(elm, $class) {

        let cls = elm.className.split(' ');

        let index = cls.indexOf($class);

        if(index > -1) {
            cls.splice(index, 1);
        }

        elm.className = cls.join(' ');
    }


    /**
     *
     * @param elm
     */
    function removeInvalidCharter(elm) {

        elm.value = elm.value.split(/[^a-zA-Z0-9 ]/).join('');

    }

    /**
     *
     * @param name
     * @returns {boolean}
     */
    function validateReceiptId(name) {

        let regexp = new RegExp(/^[a-zA-Z]{1,20}$/);

        return regexp.test(name)
    }


    function validateCity(name) {

        let regexp = new RegExp(/^[a-zA-Z][a-zA-Z ]{1,19}$/);

        return regexp.test(name)
    }

    function validatePhone(name) {

        let regexp = new RegExp(/^(880)[0-9]{1,16}$/);

        return regexp.test(name)
    }

    function validateEntryBy(name) {

        let regexp = new RegExp(/^[0-9]{1,20}$/);

        return regexp.test(name)
    }


    /**
     *
     * @param email
     * @returns {boolean}
     */
    function validateEmail(email) {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(String(email).toLowerCase()) && email.toString().length < 51;
    }


    /**
     *
     * @param btn
     * @returns {boolean}
     */
    function addMoreItemElement(btn) {

        let node = document.createElement("div");

        node.className = 'form-group row';

        node.innerHTML = '<div class="col-sm-9 offset-sm-2">\n' +
            '                    <input class="form-control" name="items_name[]" value="" placeholder="More Items" maxlength="20" required />\n' +
            '                </div>\n' +
            '                <div class="col-sm-1">\n' +
            '                    <button class="btn btn-danger" onclick="removeThisElement(this)"> X </button>\n' +
            '                </div>';

        let holder = document.querySelector('.more_item');

        holder.appendChild(node);

        return true;
    }

    /**
     *
     * @param btn
     */
    function removeThisElement(btn) {

        let elm = btn.parentElement.parentNode;

        elm.parentElement.removeChild(elm);
    }


    /**
     *
     * @param elm
     */
    function prependAreaCode(elm) {

        let val = elm.value;

        if(val.substring(0, 3) !== '880') {

            elm.value = '880' + val;
        }
    }

</script>
</body>
</html>
