<html lang="en">
<?php // require('load.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css?ver=<?php echo date('UTC'); ?>" no-cache>
    <script src="https://kit.fontawesome.com/0de542109c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Linkly</title>
</head>
<body>
<header class="main">
    <div class="__container container">
        <div class="row">
            <div class="branding col">
                <a class="fs-3 fw-bold" href="#"><i class="fa-solid fa-link"></i> stubbylink</a>
            </div>
            <nav id="main-nav" class="col-8">
                <ul>
                    <li><a class="fs-6 fw-normal" href="/linkly/?api=login">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>