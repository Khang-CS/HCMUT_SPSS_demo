
--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--------------------------------WARNNING COMMAND DROP DB--------------------------------------------
--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DECLARE @DatabaseName nvarchar(50)
SET @DatabaseName = N'HCMUT_SPSS'
DECLARE @SQL varchar(max)
SELECT @SQL = COALESCE(@SQL,'') + 'Kill ' + Convert(varchar, SPId) + ';'
FROM MASTER..SysProcesses
WHERE DBId = DB_ID(@DatabaseName) AND SPId <> @@SPId
EXEC(@SQL)

USE master
GO
IF EXISTS (SELECT 1
FROM sys.databases
WHERE name ='HCMUT_SPSS')
BEGIN
    PRINT 'Database exists.';
    DROP DATABASE HCMUT_SPSS;
END
GO
--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

--------------------------------------------START--------------------------------------------
-------------------------Create DB
USE master
GO
CREATE DATABASE HCMUT_SPSS
GO
USE HCMUT_SPSS

---------------------------create table and primary key

-- TABLE PRINTER
GO
IF  EXISTS (SELECT *
FROM sys.objects
WHERE object_id = OBJECT_ID(N'[PRINTER]') AND type in (N'U'))
DROP TABLE [PRINTER]

CREATE TABLE PRINTER
(
    printerID VARCHAR(255),
    brand VARCHAR(255),
    printerModel VARCHAR(255) NOT NULL,
    campus VARCHAR(255),
    building VARCHAR(255),
    room VARCHAR(255),
    isEnabled BIT DEFAULT 1 NOT NULL,
    Description_D TEXT,
    PRIMARY KEY ([printerID])
);

-- TABLE CAMPUS
GO
IF  EXISTS (SELECT *
FROM sys.objects
WHERE object_id = OBJECT_ID(N'[CAMPUS]') AND type in (N'U'))
DROP TABLE [CAMPUS]

CREATE TABLE CAMPUS
(
    campusID INT IDENTITY(1,1),
    campusName VARCHAR(255) UNIQUE,

    PRIMARY KEY([campusID])
);

--- TABLE BUILDING
GO
IF  EXISTS (SELECT *
FROM sys.objects
WHERE object_id = OBJECT_ID(N'[BUILDING]') AND type in (N'U'))
DROP TABLE [BUILDING]

CREATE TABLE BUILDING
(
    buildingID INT IDENTITY(1,1),
    buildingName VARCHAR(255) UNIQUE,

    PRIMARY KEY([buildingID])
);

--- TABLE ROOM
GO
IF  EXISTS (SELECT *
FROM sys.objects
WHERE object_id = OBJECT_ID(N'[ROOM]') AND type in (N'U'))
DROP TABLE [ROOM]

CREATE TABLE ROOM
(
    roomID INT IDENTITY(1,1),
    roomName VARCHAR(255),

    PRIMARY KEY([roomID])
);

--- TABLE BRAND
GO
IF  EXISTS (SELECT *
FROM sys.objects
WHERE object_id = OBJECT_ID(N'[BRAND]') AND type in (N'U'))
DROP TABLE [BRAND]

CREATE TABLE BRAND
(
    brandID INT IDENTITY(1,1),
    brandName VARCHAR(255) UNIQUE,

    PRIMARY KEY([brandID])
);