-- Table UserTypes
CREATE TABLE user_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Table Users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address VARCHAR(255),
    user_type_id INT,
    FOREIGN KEY (user_type_id) REFERENCES user_types(id)
);

-- Table ProductCategories
CREATE TABLE product_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Table Suppliers
CREATE TABLE suppliers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    contact VARCHAR(50),
    phone VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255)
);

-- Table Products
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    category_id INT,
    supplier_id INT,
    FOREIGN KEY (category_id) REFERENCES product_categories(id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- Table Sales
CREATE TABLE sales (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME NOT NULL,
    user_id INT,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table SalesDetails
CREATE TABLE sales_details (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sale_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (sale_id) REFERENCES sales(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Table Inventory
CREATE TABLE inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    quantity INT NOT NULL,
    last_updated DATETIME NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);