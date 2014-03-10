CREATE DATABASE pizzaparlour;
USE pizzaparlour;

CREATE TABLE customers (
	id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username       VARCHAR(255),
	password       VARCHAR(255),
	created        DATETIME DEFAULT NULL,
    modified       DATETIME DEFAULT NULL
);

CREATE TABLE pizzas (
	id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	customer_id    INT UNSIGNED NOT NULL,
	topping1       VARCHAR(255),
	topping2       VARCHAR(255),
	topping3       VARCHAR(255),
	created        DATETIME DEFAULT NULL,
    modified       DATETIME DEFAULT NULL,

	CONSTRAINT pizzas_fk1
		FOREIGN KEY (customer_id)
		REFERENCES customers(id)
);
