--
-- File generated with SQLiteStudio v3.2.1 on sex ago 19 13:54:21 2022
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: persons
DROP TABLE IF EXISTS persons;
CREATE TABLE persons (id INT PRIMARY KEY, name VARCHAR (255), age INT);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
