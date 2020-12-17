DROP DATABASE IF EXISTS productsDB;
CREATE DATABASE IF NOT EXISTS productsDB;
use productsDB;

DROP TABLE IF EXISTS products;

CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT,
  SKU VARCHAR(9) NOT NULL,
  name VARCHAR(128) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  img VARCHAR(255),
  type INT,
  PRIMARY KEY (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO products (SKU, name, price, img, type)
VALUES
('JVC200123', 'Chrome CR OS 2.4.1290', 20.00, 'img/product01.png', 1),
('JVC200123', 'Ubuntu Cinamon Remix 20.10 LTS', 25.99, 'img/product02.png', 1),
('JVC200123', 'Bluewhite64 13.0 - 64 Bit', 15.00, 'img/product03.png', 1),
('JVC200123', 'Android x86 9.0  - 32/64Bit', 18.50, 'img/product04.png', 1),
('GGWP0007', 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5', 27.49, 'img/product05.png', 2),
('GGWP0007', 'SQL QuickStart Guide: The Simplified Beginner''s Guide', 23.74, 'img/product06.png', 2),
('GGWP0007', 'Clean Code: A Handbook of Agile Software', 42.31, 'img/product07.png', 2),
('GGWP0007', 'Programming: 4 Manuscripts in 1', 47.97, 'img/product08.png', 2),
('TR120555', 'Basics Gaming Computer Desk with Storage', 82.73, 'img/product09.png', 3),
('TR120555', 'Gaming Chair High Back Computer', 142.00, 'img/product10.png', 3),
('TR120555', 'Clip Light Reading', 16.99, 'img/product11.png', 3),
('TR120555', 'Flash Furniture Black Sit', 55.59, 'img/product12.png', 3);

ALTER TABLE products AUTO_INCREMENT=13;

DROP TABLE IF EXISTS dvds;

CREATE TABLE IF NOT EXISTS dvds (
  product_id INT NOT NULL,
  size INT,
  FOREIGN KEY (product_id) REFERENCES products (product_id)
    ON DELETE CASCADE
);

INSERT INTO dvds (product_id, size)
VALUES
(1, 4800),
(2, 4800),
(3, 8500),
(4, 8500);

DROP TABLE IF EXISTS books;

CREATE TABLE IF NOT EXISTS books (
  product_id INT NOT NULL,
  weight DECIMAL(5,2),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
    ON DELETE CASCADE
);

INSERT INTO books (product_id, weight)
VALUES
(5, 1.5),
(6, 2.5),
(7, 2.5),
(8, 13.5);

DROP TABLE IF EXISTS furnitures;

CREATE TABLE IF NOT EXISTS furnitures (
  product_id INT NOT NULL,
  height INT,
  width INT,
  lenght INT,
  FOREIGN KEY (product_id) REFERENCES products (product_id)
    ON DELETE CASCADE
);

INSERT INTO furnitures (product_id, height, width, lenght)
VALUES
(9, 120, 120, 120),
(10, 150, 60, 60),
(11, 30, 10, 10),
(12, 120, 60, 60)
;

