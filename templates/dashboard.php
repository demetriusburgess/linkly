<!DOCTYPE html>
<html lang="en">
<?php require('config.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/style.css?ver=<?php echo date('UTC'); ?>" no-cache>
    <script src="https://kit.fontawesome.com/0de542109c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Linkly</title>
</head>
<body>
    <!-- <?php // include('admin/template/header-dashboard.php'); ?>

    <section style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <?php // include('admin/template/card-table.php'); ?>
            </div>
        </div>
    </section> -->

    <?php 
        switch ($_GET['page']) {
            case 'settings': 
                include(ABSPATH . 'admin/page/settings.php');
                break;
            case 'tags': 
                    include(ABSPATH . 'admin/page/settings-tags.php');
                    break;
            case 'billing': 
                include(ABSPATH . 'admin/page/billing.php');
                break;
            default:
                include(ABSPATH . 'admin/page/dashboard.php');
            break;
        }
    ?>
</body>
</html>