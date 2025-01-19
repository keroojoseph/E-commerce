<html lang="en-US">
<head>
    <title>Form Customer</title>
    <style type="text/css">
        .counter {
            display: flex;
            justify-content: center;
            height: 80vh;
            align-items: center;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: flex-start;
            width: 1000px;
        }

        form input {
            display: flex;
            gap: 10px;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            outline: none;
            width: calc((1000px - 20px)/2);
            align-self: flex-start;
        }

        .label {
            width: 100%;
        }

        form input[type="submit"] {
            width: 100px;
            background-color: #2c3e50;
            cursor: pointer;
            color: #ffffff;
        }

        form input[type="submit"]:hover {
            background-color: #3a5163;
        }



        form label {
            font-size: 1.8em;
        }

        p.message {
            background-color: #4040a5;
            padding: 10px ;
            width: 500px;
            text-align: center;
            border-radius: 4px;
            margin-bottom: 10px;
            color: white;
        }

        p.message.error {
            background-color: red;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title><?= $title ?></title>
</head>
<body>
<div class="counter">
    <form method="POST" enctype="application/x-www-form-urlencoded">
        <?php if (isset($_SESSION['message'])) { ?>
            <p class="message" <?= isset($error) ? 'error' : '' ?>><?= htmlspecialchars($_SESSION['message']) ?></p>
            <?php unset($_SESSION['message']); } ?>
        <label class = 'label' for="name">Customer Information</label>
        <input type="text" id="name" name="name" required placeholder="Write name" value="<?= isset($user) ? $user->name : '' ?>">
        <input type="email" id="email" name="email" required placeholder="Write email" value="<?= isset($user) ? $user->email : '' ?>">
        <input type="tel" name="phone" placeholder="Write phone" value="<?= isset($user) ? $user->phone : '' ?>">
        <input type="text" name="address" placeholder="Write address" value="<?= isset($user) ? $user->address : '' ?>">
        <input type="text" name="city" placeholder="Write city" value="<?= isset($user) ? $user->city : '' ?>">
        <input type="text" name="zipCode" placeholder="Write zip code" value="<?= isset($user) ? $user->zipCode : '' ?>">
            <input type="submit" name="submit" value="Save">
    </form>
</div>
</body>
</html>