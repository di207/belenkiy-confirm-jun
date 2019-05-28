<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="keywords" content="">

        <title><?= $title ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="/./favicon.ico">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container">
            <?php if (isset($alert) && count($alert) > 0) { ?>
            <?php foreach ($alert as $key => $value) { ?>
            <?php echo $value; ?>
            <?php } ?>
            <?php } ?>
            <form action="" method="post">
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td>Title or ID</td>
                        <td><input type='text' name='title-id' class='form-control' value="<?= (isset($_POST['title-id'])) ? $_POST['title-id'] : '' ?>" /></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input type='text' name='status' class='form-control' value="<?= (isset($_POST['status'])) ? $_POST['status'] : '' ?>" /></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary" name="action" value="create">Create</button>
                            <button type="submit" class="btn btn-primary" name="action" value="find">Find</button>
                            <button type="submit" class="btn btn-primary" name="action" value="update">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

