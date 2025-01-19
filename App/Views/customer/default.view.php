<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <title><?= @$title ?> </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        p.message {
            background-color: green;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
            margin: 0 auto;
            color: white;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        p.message.error {
            background-color: #e74c3c;
        }

        .moveLink {
            text-align: left; /* Ensures text alignment starts from the left */
            margin: 20px 0; /* Adjust vertical spacing */
        }

        .moveLink a {
            text-decoration: none;
            color: #fff;
            text-transform: capitalize;
            background-color: #2c3e50;
            border-radius: 4px;
            padding: 12px 24px;
            font-size: 1em;
            transition: background-color 0.3s;
            display: inline-block; /* Ensure correct inline spacing */
        }

        .moveLink a:hover {
            background-color: #3a5163;
        }


        table {
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        table thead {
            background-color: #2c3e50;
            color: #fff;
        }

        table thead tr th {
            text-align: left;
            padding: 12px 16px;
            font-weight: bold;
            border-bottom: 2px solid #333;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        table tbody tr:nth-child(even) {
            background-color: #fff;
        }

        table tbody tr:hover {
            background-color: #dddddd;
        }

        table tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            font-size: 0.9em;
        }

        table tbody td a {
            color: #3498db;
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s;
        }

        table tbody td a:hover {
            color: #2980b9;
        }

        table tbody td a i {
            margin-right: 6px;
        }

        @media screen and (max-width: 768px) {
            table {
                width: 100%;
                font-size: 0.9em;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                display: block;
                margin-bottom: 15px;
            }

            table tbody td {
                display: flex;
                justify-content: space-between;
                padding: 12px 8px;
                border-bottom: none;
            }

            table tbody td:before {
                content: attr(data-label);
                font-weight: bold;
                flex: 1;
                text-transform: capitalize;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<?php if (isset($_SESSION['message'])) { ?>
    <p class="message <?= $error ?? '' ?>"><?= $_SESSION['message'] ?></p>
<?php } unset($_SESSION['message']); ?>

<div class="moveLink">
    <a href="/customer/add"><?= $text_add_customer ?> </a>
</div>

<table id="myTable">
    <thead>
    <tr>
        <th><?= $text_table_customer_id ?> </th>
        <th><?= $text_table_customer_name ?></th>
        <th><?= $text_table_customer_email ?></th>
        <th><?= $text_table_customer_phone ?></th>
        <th><?= $text_table_customer_address ?></th>
        <th><?= $text_table_customer_city ?></th>
        <th><?= $text_table_customer_date ?></th>
        <th><?= $text_table_customer_controller ?></th>
    </tr>
    </thead>
    <tbody>
    <?php if ($customers) { foreach ($customers as $customer) { ?>
        <tr>
            <td data-label="Customer ID"><?= $customer->customerId ?></td>
            <td data-label="Name"><?= $customer->name ?></td>
            <td data-label="Email"><?= $customer->email ?></td>
            <td data-label="Phone"><?= $customer->phone ?></td>
            <td data-label="Address"><?= $customer->address ?></td>
            <td data-label="City"><?= $customer->city ?></td>
            <td data-label="Date Time"><?= $customer->registrationDate ?></td>
            <td data-label="Control">
                <a href="/customer/edit/<?= $customer->customerId ?>">
                    <i class="fa-regular fa-pen-to-square"></i> <?= $text_edit_customer ?>
                </a>
                <a href="/customer/delete/<?= $customer->customerId ?>" onclick="if (!confirm('<?= $message_delete_customer ?>')) return false;">
                    <i class="fa-regular fa-trash-can"></i> <?= $text_delete_customer ?>
                </a>
            </td>
        </tr>
    <?php }} else { ?>
        <tr>
            <td colspan="8" style="text-align: center;">NoT Available Data</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
