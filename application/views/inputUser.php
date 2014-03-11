<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Input User</title>
    </head>
    <body>
        <h1>Input User</h1>
        <form method="POST" accept-charset="utf-8" action="<?php echo site_url('user/userSave'); ?>">
            <label>Username: </label><input type="text" name="username" required />
            <label>Password: </label><input type="password" name="password" required />
            <label>Email: </label><input type="email" name="email" required />
            <input type="submit" value="submit" />
        </form>

    </body>
</html>