<!DOCTYPE html>
<html lang="en">
<head>
    <title>Testing </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>


    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>


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

        #dt_pkr .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

    </style>

</head>
<body>

<div class="container">

    <h1 class="hdr">My First Bootstrap Page</h1>

    <br/>

    <div class="row">

        <div class="col-sm-1">Date:</div>
        <div class="col-sm-6">
            <div class="input-daterange input-group" id="dt_pkr">
                <input type="text" class="input-sm form-control" id="min">
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" id="max">
            </div>
        </div>

        <div class="col-sm-1">EntryBy:</div>

        <div class="col-sm-4">
            <select name="entry_by" id="entry_by" class="form-control">
                <option value="">Select</option>
            </select>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <table class="table table-bordered" id="prd_tbl">
                <thead>
                <tr>
                    <th>Buyer</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Entry By</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach($data as $id => $obj) : ?>

                    <tr>
                        <td><?= $obj->buyer ?></td>
                        <td><?= $obj->buyer_email ?></td>
                        <td><?= $obj->amount ?></td>
                        <td><?= $obj->entry_at ?></td>
                        <td><?= $obj->entry_by ?></td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>


</div>


<script>


    $(document).ready(function () {

        let slt = $('#entry_by');
        let prdTl = $('#prd_tbl');
        let uniqueUser = {};


        prdTl.find('tbody:first').find('td:nth-child(5)').each(function (idx, elm) {

            var tmp = $(elm).text();

            uniqueUser[tmp] = tmp;
        });

        Object.keys(uniqueUser).forEach(function (val, idx) {
            slt.append(new Option(val, val));
        });


        $('#min').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true
        });

        $('#max').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true
        });

        let productTable = $('#prd_tbl').DataTable();


        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {

                let minDt = $('#min').val().trim();
                let maxDt = $('#max').val().trim();
                let startDate = data[3];

                if(minDt == '' && maxDt == '') return true;
                if(minDt == '' && startDate <= maxDt) return true;
                if(startDate >= minDt && maxDt == '') return true;
                if(startDate >= minDt && startDate <= maxDt) return true;

                return false;
            }
        );


        $('#min, #max').change(function () {
            productTable.draw();
        });

        slt.on('change', function (ev) {

            let vl = $(this).val();

            productTable.column(4).search(vl).draw();
        });

    });

</script>
</body>
</html>
