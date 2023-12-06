<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>manage current printers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="homePage">
        <h1>MANAGE CURRENT PRINTERS</h1>

        <form action="" class="form searchForm" method="post" enctype="multipart/form-data">
            <input name="printerInfo" type="text" class="searchField" id="searchInput" placeholder="Search">
            <input name="searchPrinter" type="submit" class="searchButton" value="Search">
        </form>

        <form action="" class="filterForm" method="post" enctype="multipart/form-data">
            <!-- Dropdown list -->

            <select id="brand" name="brand">
                <option value="0">All</option>
                <?php
                foreach ($brandList as $brand) {
                ?>
                <option value="<?php echo $brand->brandName; ?>"><?php echo $brand->brandName; ?></option>
                <?php
                }
                ?>
                <!-- Add more options as needed -->
            </select>

            <select id="campus" name="campus">
                <option value="0">All</option>
                <?php
                foreach ($campusList as $campus) {
                ?>
                <option value="<?php echo $campus->campusName; ?>"><?php echo $campus->campusName; ?></option>
                <?php
                }
                ?>
                <!-- Add more options as needed -->
            </select>

            <select id="building" name="building">
                <option value="0">All</option>
                <?php
                foreach ($buildingList as $building) {
                ?>
                <option value="<?php echo $building->buildingName; ?>"><?php echo $building->buildingName; ?></option>
                <?php
                }
                ?>
                <!-- Add more options as needed -->
            </select>
            <select id="room" name="room">
                <option value="0">All</option>
                <?php
                foreach ($roomList as $room) {
                ?>
                <option value="<?php echo $room->roomName; ?>"><?php echo $room->roomName; ?></option>
                <?php
                }
                ?>
                <!-- Add more options as needed -->
            </select>
            <input name="filter" type="submit" class="searchButton" value="Filter">
        </form>
    </section>

    <section class="list">
        <div class="container">
            <div class="row g-4 listRow">
                <?php
                if ($printerList !== NULL) {
                    foreach ($printerList as $printer) {
                ?>
                <div class="col-xxl-3 col-lg-4 col-md-6 printerCol">
                    <form action="" class="printer">
                        <img src="../assets/images/icon.png" alt="">
                        <h6><?php echo 'Brand: ' . $printer->brand; ?></h6>
                        <h6><?php echo 'Model: ' . $printer->printerModel; ?></h6>
                        <h6><?php echo 'ID: ' . $printer->printerID; ?></h6>
                        <h6><?php echo $printer->campus . ' - ' . $printer->building . ' - ' . $printer->room ?>
                        </h6>
                        <a href="<?php echo '/index.php?controller=pages&action=viewAndEdit&printerID=' . $printer->printerID; ?>"
                            class="moreButton">MORE</a>
                        <a href="" class="deleteButton">DELETE</a>
                    </form>
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/de521be8bb.js" crossorigin="anonymous"></script>
</body>

</html>