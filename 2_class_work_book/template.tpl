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
    <form class="m-3" action="" method="post">
        <div class="table-responsive">
            <table class='table table-bordered'>
                <tr>
                    <td>
                        <div class="form-group row m-0">
                            <label for="title-id" class="col-sm-2 col-form-label">Title or ID</label>
                            <div>
                                <input type='text' id="title-id" name='title-id' class='form-control'
                                       value="<?= (isset($_POST['title-id'])) ? $_POST['title-id'] : '' ?>"/>
                            </div>
                        </div>
                    </td>
                    <td rowspan="3">
                        <div>
                            <?php
                                if (isset($alert) && count($alert) > 0) {
                                    foreach ($alert as $key => $value) {
                                        echo $value;
                                    }
                                }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-group row m-0">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div>
                                <input type='text' id="status" name='status' class='form-control'
                                       value="<?= (isset($_POST['status'])) ? $_POST['status'] : '' ?>"/>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary" name="action" value="create">Create</button>
                        <button type="submit" class="btn btn-primary" name="action" value="find">Find</button>
                        <button type="submit" class="btn btn-primary" name="action" value="update">Update</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>

