

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Create the 'sales' table
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    weight DECIMAL(10, 2) NOT NULL,
    supplier VARCHAR(255) NOT NULL,
    cost DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) NOT NULL,
    remarks TEXT
);

-- Insert 5 sample records into the 'sales' table
INSERT INTO sales (name, weight, supplier, cost, status, remarks) VALUES
('Product A', 10.50, 'Supplier X', 100.00, 'Available', 'First batch of Product A'),
('Product B', 5.25, 'Supplier Y', 50.00, 'Available', 'First batch of Product B'),
('Product C', 20.00, 'Supplier Z', 200.00, 'Out of Stock', 'First batch of Product C'),
('Product D', 15.75, 'Supplier X', 150.00, 'Available', 'First batch of Product D'),
('Product E', 7.50, 'Supplier Y', 75.00, 'Out of Stock', 'First batch of Product E');

--

-- Create the 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL
);

-- Insert 5 sample records into the 'users' table
INSERT INTO users (name, email, password, salary) VALUES
('himani', 'himani@gmail.com', '12345', 55000.00),
('sajani', 'sajani@gmail.com', '12345', 60000.00),
('Charlie Brown', 'charlie@example.com', 'password789', 52000.00),
('Diana Prince', 'diana@example.com', 'password101', 58000.00),
('Eve Adams', 'eve@example.com', 'password202', 62000.00);


-- Table structure for table `supliers`
--

CREATE TABLE supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    product VARCHAR(255) DEFAULT NULL,
    cost DECIMAL(10, 2) DEFAULT NULL,
    payment DECIMAL(10, 2) DEFAULT NULL
);


--
-- Dumping data for table `supliers`
--

INSERT INTO supplier (name, phone, product, cost, payment) VALUES
('Supplier A', '1234567890', 'Product A', 500.00, 200.00),
('Supplier B', '9876543210', 'Product B', 700.00, 300.00),
('Supplier C', '5554443333', 'Product C', 900.00, 400.00),
('Supplier D', '2223334444', 'Product D', 600.00, 250.00),
('Supplier E', '9998887777', 'Product E', 800.00, 350.00),
('Supplier F', '6667778888', 'Product F', 1000.00, 450.00),
('Supplier G', '3332221111', 'Product G', 1200.00, 500.00),
('Supplier H', '7778889999', 'Product H', 1500.00, 600.00),
('Supplier I', '4445556666', 'Product I', 1100.00, 480.00),
('Supplier J', '8889990000', 'Product J', 1300.00, 550.00),
('Supplier K', '1112223333', 'Product K', 1400.00, 600.00),
('Supplier L', '2221114444', 'Product L', 1600.00, 700.00),
('Supplier M', '5551117777', 'Product M', 1800.00, 800.00),
('Supplier N', '7771115555', 'Product N', 1700.00, 750.00);


-- --------------------------------------------------------


--
-- Table structure for table `payment`
--
-- Create the 'payment' table
CREATE TABLE payment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    `check` VARCHAR(100),
    remarks TEXT
);


INSERT INTO payment (supplier, amount, date, `check`, remarks) VALUES
('Supplier X', 1000.00, '2024-07-01', 'himani', 'First payment for supplies'),
('Supplier Y', 1500.00, '2024-07-02', 'sajani', 'Partial payment for order'),
('Supplier Z', 2000.00, '2024-07-03', 'himani', 'Full payment received'),
('Supplier X', 1200.00, '2024-07-04', 'himani', 'Second installment'),
('Supplier Y', 1800.00, '2024-07-05', 'sajani', 'Final payment'),
('Supplier Z', 2500.00, '2024-07-06', 'sajani', 'Advance payment'),
('Supplier X', 1100.00, '2024-07-07', 'sajani', 'Payment for additional order'),
('Supplier Y', 1600.00, '2024-07-08', 'himani', 'Payment for overdue balance'),
('Supplier Z', 2200.00, '2024-07-09', 'sajani', 'Payment for new contract'),
('Supplier X', 1300.00, '2024-07-10', 'himani', 'Partial payment for supplies');


CREATE TABLE products (
  product_id varchar(50) NOT NULL,
  name text NOT NULL,
  manufacture_date DATE NOT NULL,
  expiry_date DATE NOT NULL,
  rate varchar(50) DEFAULT NULL,
  weight varchar(50) DEFAULT NULL,
  cost varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`product_id`, `name`, `manufacture_date`, `expiry_date`, `rate`, `weight`, `cost`) VALUES
('1', 'product 1', '2022-01-01', '2023-01-01', '233', '600', '9000.00'),
('2', 'product 2', '2022-02-01', '2023-02-01', '293', '700', '8000.00'),
('3', 'product 3', '2022-03-01', '2023-03-01', '223', '800', '2000.00'),
('4', 'product 4', '2022-04-01', '2023-04-01', '253', '900', '4000.00'),
('5', 'product 5', '2022-05-01', '2023-05-01', '263', '1000', '5000.00'),
('6', 'product 6', '2022-06-01', '2023-06-01', '273', '1100', '6000.00'),
('7', 'product 7', '2022-07-01', '2023-07-01', '283', '1200', '7000.00'),
('8', 'product 8', '2022-08-01', '2023-08-01', '293', '1300', '8000.00'),
('9', 'product 9', '2022-09-01', '2023-09-01', '303', '1400', '9000.00');




-- --------------------------------------------------------

--
-- Table structure for table `settings_rates`
--

CREATE TABLE `settings_rates` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `rate` float NOT NULL COMMENT 'sh per kg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_rates`
--

INSERT INTO `settings_rates` (`id`, `from`, `to`, `rate`) VALUES
(4, '2019-01-01', '2019-01-31', 20),
(5, '2019-03-01', '2019-03-31', 24);
