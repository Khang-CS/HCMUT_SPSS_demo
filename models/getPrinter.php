<?php
// models/getPrinterList.php

class Printer
{
    public $printerID;
    public $brand;
    public $printerModel;
    public $campus;
    public $building;
    public $room;
    public $isEnabled;
    public $Description_D;

    function __construct($printerID, $brand, $printerModel, $campus, $building, $room, $isEnabled, $Description_D)
    {
        $this->printerID = $printerID;
        $this->brand = $brand;
        $this->printerModel = $printerModel;
        $this->campus = $campus;
        $this->building = $building;
        $this->room = $room;
        $this->isEnabled = $isEnabled;
        $this->Description_D = $Description_D;
    }

    static function getPrinterList()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT* FROM PRINTER');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Printer($item['printerID'], $item['brand'], $item['printerModel'], $item['campus'], $item['building'], $item['room'], $item['isEnabled'], $item['Description_D']);
        }

        return $list;
    }

    static function searchPrinter($printerInfo)
    {
        $list = [];
        $db = DB::getInstance();

        /* Store value */
        $printerID = $printerInfo;
        $brand = $printerInfo;
        $campus = $printerInfo;
        $building = $printerInfo;
        $room = $printerInfo;
        //

        $sql = "SELECT * FROM PRINTER WHERE printerID = :printerID OR brand = :brand OR campus = :campus OR building = :building OR room = :room";
        $stmt = $db->prepare($sql);

        /*Bind Param*/
        $stmt->bindParam(':printerID', $printerID, PDO::PARAM_STR);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':campus', $campus, PDO::PARAM_STR);
        $stmt->bindParam(':building', $building, PDO::PARAM_STR);
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        //

        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($items as $item) {
            $list[] = new Printer($item['printerID'], $item['brand'], $item['printerModel'], $item['campus'], $item['building'], $item['room'], $item['isEnabled'], $item['Description_D']);
        }

        return $list;
    }

    static function filterPrinter($brand, $campus, $building, $room)
    {
        if ($brand === '0' && $campus === '0' && $building === '0' && $room === '0') {
            return Printer::getPrinterList();
        }

        $list = [];
        $db = DB::getInstance();
        $stringBrand = ($brand === '0') ? "" : " brand = :brand AND";
        $stringCampus = ($campus === '0') ? "" : " campus = :campus AND";
        $stringBuilding = ($building === '0') ? "" : " building = :building AND";
        $stringRoom = ($room === '0') ? "" : " room = :room AND";

        $sql = "SELECT* FROM PRINTER WHERE" . $stringBrand . $stringCampus . $stringBuilding . $stringRoom;
        $sql = substr($sql, 0, strlen($sql) - 4);
        $stmt = $db->prepare($sql);

        if ($brand !== '0') {
            $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        }

        if ($campus !== '0') {
            $stmt->bindParam(':campus', $campus, PDO::PARAM_STR);
        }

        if ($building !== '0') {
            $stmt->bindParam(':building', $building, PDO::PARAM_STR);
        }

        if ($room !== '0') {
            $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        }

        $stmt->execute();

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($items as $item) {
            $list[] = new Printer($item['printerID'], $item['brand'], $item['printerModel'], $item['campus'], $item['building'], $item['room'], $item['isEnabled'], $item['Description_D']);
        }

        return $list;
    }

    static function getPrinterInfo($printerID)
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM PRINTER WHERE printerID = :printerID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':printerID', $printerID, PDO::PARAM_STR);
        $stmt->execute();

        $item = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $item = $item[0];

        if (isset($item['printerID'])) {
            return new Printer($item['printerID'], $item['brand'], $item['printerModel'], $item['campus'], $item['building'], $item['room'], $item['isEnabled'], $item['Description_D']);
        }

        return NULL;
    }

    static function updatePrinter($printerID, $brand, $printerModel, $campus, $building, $room, $isEnabled, $Description_D)
    {
        $db = DB::getInstance();
        $sql = "UPDATE PRINTER SET brand = :brand, printerModel = :printerModel, campus = :campus, building = :building , room = :room, isEnabled = :isEnabled, Description_D = :Description_D WHERE printerID = :printerID";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':printerID', $printerID, PDO::PARAM_STR);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':printerModel', $printerModel, PDO::PARAM_STR);
        $stmt->bindParam(':campus', $campus, PDO::PARAM_STR);
        $stmt->bindParam(':building', $building, PDO::PARAM_STR);
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        $stmt->bindParam(':isEnabled', $isEnabled, PDO::PARAM_STR);
        $stmt->bindParam(':Description_D', $Description_D, PDO::PARAM_STR);

        $stmt->execute();
    }

    static function addNewPrinter($printerID, $brand, $printerModel, $campus, $building, $room, $isEnabled, $Description_D)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO PRINTER (printerID, brand, printerModel, campus, building, room, isEnabled, Description_D) VALUES (:printerID ,:brand, :printerModel, :campus, :building, :room, :isEnabled, :Description_D)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':printerID', $printerID, PDO::PARAM_STR);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':printerModel', $printerModel, PDO::PARAM_STR);
        $stmt->bindParam(':campus', $campus, PDO::PARAM_STR);
        $stmt->bindParam(':building', $building, PDO::PARAM_STR);
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        $stmt->bindParam(':isEnabled', $isEnabled, PDO::PARAM_STR);
        $stmt->bindParam(':Description_D', $Description_D, PDO::PARAM_STR);

        $stmt->execute();
    }
}

class Brand
{
    public $brandID;
    public $brandName;

    function __construct($brandID, $brandName)
    {
        $this->brandID = $brandID;
        $this->brandName = $brandName;
    }

    static function getBrandList()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT* FROM BRAND');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Brand($item['brandID'], $item['brandName']);
        }

        // $list[] = new Brand(1, 'CANON');
        // $list[] = new Brand(2, 'SONY');

        return $list;
    }
}

class Campus
{
    public $campusID;
    public $campusName;

    function __construct($campusID, $campusName)
    {
        $this->campusID = $campusID;
        $this->campusName = $campusName;
    }

    static function getCampusList()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT* FROM CAMPUS');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Campus($item['campusID'], $item['campusName']);
        }

        // $list[] = new Brand(1, 'CANON');
        // $list[] = new Brand(2, 'SONY');

        return $list;
    }
}

class Building
{
    public $buildingID;
    public $buildingName;

    function __construct($buildingID, $buildingName)
    {
        $this->buildingID = $buildingID;
        $this->buildingName = $buildingName;
    }

    static function getBuildingList()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT* FROM BUILDING');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Building($item['buildingID'], $item['buildingName']);
        }

        // $list[] = new Brand(1, 'CANON');
        // $list[] = new Brand(2, 'SONY');

        return $list;
    }
}

class Room
{
    public $roomID;
    public $roomName;

    function __construct($roomID, $roomName)
    {
        $this->roomID = $roomID;
        $this->roomName = $roomName;
    }

    static function getRoomList()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT* FROM ROOM');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Room($item['roomID'], $item['roomName']);
        }

        // $list[] = new Brand(1, 'CANON');
        // $list[] = new Brand(2, 'SONY');

        return $list;
    }
}
