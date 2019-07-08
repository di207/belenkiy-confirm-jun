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
        <div class="container mt-20">
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
                    <input type="file" id="csv" name="csv" class="form-control-file" required/>
                </div>
                <button type="submit" id='upload' class="btn btn-primary" name="parsing" value="Upload">Upload</button>
            </form>

            <?php if($parser) : ?>
                <table  class='table'>
                    <thead>
                    <tr>
                        <th class='cell-1'>название</th>
                        <th class='cell-2'>артикул</th>
                        <th class='cell-3'>Стоимость</th>
                        <th>Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($parser->all() as $data) { ?>
                        <?php
                            $title = $data->{"название"};
                            $art = $data->{"артикул"};
                            $number = $data->{"номер категории"};
                            $cost = $data->{"стоимость оптовая"};
                            $markup = ($number>=1 && $number<=10)? 5 : 7;
                            $price = ((int)$cost*$markup/100) + (int)$cost;
                            $css_class = ($number%2 == 0) ? "alert alert-success" : "alert alert-primary";
                        ?>

                    <tr class='alert <?=$css_class; ?>'>
                        <td><span class='text-overflow'><?=$title; ?></span></td>
                        <td><span class='text-overflow'><?=$art; ?></span></td>
                        <td><span class='text-overflow'><?=$cost; ?></span></td>
                        <td><span class='text-overflow'><?=$price; ?></span></td>
                    </tr>
                    <?php } ?>
            <?php endif; ?>

        </div>
    </body>
</html>

