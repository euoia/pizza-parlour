USE pizzaparlour;

INSERT INTO customers(username, password) values ('Fred', '');
INSERT INTO customers(username, password) values ('Wilma', '');
INSERT INTO customers(username, password) values ('Pebbles', '');
INSERT INTO customers(username, password) values ('Barney', '');

-- Just one topping.
INSERT INTO pizzas(customer_id, topping1) values (
	(select id from customers where username='Fred'),
	'pepperoni');

-- Two topppings.
INSERT INTO pizzas(customer_id, topping1, topping2) values (
	(select id from customers where username='Barney'),
	'chorizo',
	'cajun chicken');

-- Three toppings.
INSERT INTO pizzas(customer_id, topping1, topping2, topping3) values (
	(select id from customers where username='Wilma'),
	'turkey',
	'cheddar',
	'pine nuts'
);

-- http://www.recipepizza.com/toppings/

-- MEAT
-- bacon
-- cajun chicken
-- chorizo
-- honey cured ham
-- pepperoni
-- turkey

-- CHEESE
-- cheddar
-- feta
-- gorgonzola
-- monterey jack
-- provolone
-- roquefort

-- NUTS
-- pistachios
-- pecans
-- pine nuts
-- walnuts
