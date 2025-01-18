<html>
<head>
    <style type="text/css">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            width: 100%;
            height: 60px;
            padding: 0 200px;
            background-color: #4040a5;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 2em;
            color: white;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            padding: 20px 200px;
            align-items: center;
            min-height: calc(100vh - 60px);
        }

        form {
            display: flex;
            flex-direction: column;
            width: 30%;
            /*align-items: center;*/
        }

        form input {
            padding: 10px;
            margin-top: 5px;
            width: 100%;
            border-radius: 5px;
            outline: none;
        }

        form input[type="submit"] {
            width: 100px;
        }

        form label {
            font-size: 1.8em;
        }

        p.message {
            background-color: #4040a5;
            padding: 10px ;
            width: 67%;
            text-align: center;
            border-radius: 4px;
            margin-bottom: 10px;
            color: white;
        }

        p.message.error {
            background-color: red;
        }

        table {
            width: 67%;
            border-collapse: collapse;
            font-size: .8em;
            text-align: left;
            margin-top: 40px;
        }

        /* Header Row */
        table thead tr {
            background-color: #f4f4f4;
            color: #333;
        }

        table thead tr td {
            border: solid 1px #a6a4a4;
            padding: 10px;
        }

        /* Table Data Rows */
        table tbody tr:nth-child(odd) {
            background-color: lightgray;
        }

        table tbody tr:nth-child(even) {
            background-color: #fff;
        }

        table tbody td {
            border: solid 1px #a6a4a4;
            padding: 8px;
        }

        table tbody td a {
            padding: 5px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<div class="container">

    <?php if (isset($_SESSION['message'])) { ?>
        <p class="message" <?= $error ?? '' ?> > <?= $_SESSION['message'] ?> </p>
    <?php } unset($_SESSION['message']); ?>

<table>
    <thead>
    <tr>
        <td>Customer ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td>City</td>
        <td>Date Time</td>
        <td>Control</td>
    </tr>
    </thead>
    <tbody>
    <?php if ($customers) { foreach ($customers as $customer) { ?>
        <tr>
            <td><?= $customer->customerId ?></td>
            <td><?= $customer->name ?></td>
            <td><?= $customer->email ?></td>
            <td><?= $customer->phone ?></td>
            <td><?= $customer->address ?></td>
            <td><?= $customer->city ?></td>
            <td><?= $customer->registrationDate ?></td>
            <td>
                <a href="/customer/edit/<?= $customer->customerId ?>">
                    <i class="fa-regular fa-pen-to-square"></i>                </a>
                <a href="/customer/delete/<?= $customer->customerId ?>" onclick="if (!confirm('Do You Want Delete Customer?')) return false;">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </td>
        </tr>
    <?php }} else { ?>
        <tr>
            <td colspan="8"><p>No Data Available</p></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
    <a href="/customer/add">Add Customer</a>
</div>
</body>
</html>