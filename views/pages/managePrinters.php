<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="homePage">
        <h1>MANAGE PRINTERS</h1>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 featureManagePrinters">
                    <div class="featureManagePrintersContent">
                        <h2><a href="/index.php?controller=pages&action=manageCurrentPrinters" class="">MANAGE CURRENT
                                PRINTERS</a></h2>
                    </div>
                </div>
                <div class="col-lg-6 featureManagePrinters">
                    <div class="featureManagePrintersContent">
                        <h2><a href="/index.php?controller=pages&action=addNewPrinter" class="">ADD NEW PRINTER</a></h2>
                    </div>
                </div>
            </div>

        </div>
        <a style="text-decoration: none" href="index.php" class="commonButton">GO HOME</a>


    </section>

    <script src="../assets/script/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/de521be8bb.js" crossorigin="anonymous"></script>
</body>

</html>