<html lang="en-US">
<head>
    <title>Form Customer</title>
    <style type="text/css">
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
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
</head>
<body>
<div class="container">
    <form method="POST" enctype="application/x-www-form-urlencoded">
        <?php if (isset($_SESSION['message'])) { ?>
            <p class="message" <?= isset($error) ? 'error' : '' ?>><?= htmlspecialchars($_SESSION['message']) ?></p>
            <?php unset($_SESSION['message']); } ?>
        <label for="name">Customer Information</label>
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