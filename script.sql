--
-- File generated with SQLiteStudio v3.2.1 on qua ago 17 20:48:51 2022
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: products
DROP TABLE IF EXISTS products;
CREATE TABLE products (id INT PRIMARY KEY, type VARCHAR (255), firstname VARCHAR (255), mainname VARCHAR (255), title VARCHAR (255), price FLOAT, numpages INT, playlength INT, discount INT);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
