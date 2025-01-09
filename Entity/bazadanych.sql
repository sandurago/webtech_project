CREATE DATABASE dreamstore;

CREATE TABLE dreamstore.product (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(100),
  price FLOAT,
  description VARCHAR(1000),
  category VARCHAR(100),
  image VARCHAR(100),
  rate FLOAT,
  count INT,
  PRIMARY KEY (id)
);
