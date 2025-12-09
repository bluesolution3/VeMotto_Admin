CREATE TABLE business_owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    business_name VARCHAR(200),
    province VARCHAR(50),
    status ENUM('active', 'inactive') DEFAULT 'active',
    email VARCHAR(200),
    phone VARCHAR(20)
);
