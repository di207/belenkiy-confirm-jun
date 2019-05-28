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
            <form method="post" action="" enctype="multipart/form-data">
                <div class="page-header">
                    <div class="alert alert-secondary" role="alert">
                        Пример файла импорта: <br />
                        название|артикул|номер категории|стоимость оптовая  <br />
                        товар1|ART1|12|1000$  <br />
                    </div>
                </div>

                <?php if (isset($errors) && count($errors) > 0) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php foreach ($errors as $key => $value) { ?>
                            <p class="text-danger"><?php echo $value; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="csv">File input</label>
                    <input type="file" id="csv" name="csv" class="form-control-file" />
                </div>
                <input type="submit" id='upload' class="btn btn-primary" value="Upload"/>
            </form>

            <?php if(isset($table)) echo $table ?>

        </div>
    </body>
</html>

