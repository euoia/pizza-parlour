CREATE DATABASE pizzaparlour;
USE pizzaparlour;

CREATE TABLE customers (
	id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username       VARCHAR(255)
);

CREATE TABLE pizzas (
	id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	customer_id    INT UNSIGNED,
	topping1       VARCHAR(255),
	topping2       VARCHAR(255),
	topping3       VARCHAR(255),

	CONSTRAINT pizzas_fk1
		FOREIGN KEY (customer_id)
		REFERENCES customers(id)
);
