CREATE TABLE contact_lens(
id INT AUTO_INCREMENT PRIMARY KEY,

product_name VARCHAR(100),

series_name VARCHAR(100),

replacement_cycle VARCHAR(50),

material VARCHAR(50),

target_user VARCHAR(100),

description TEXT,

image VARCHAR(255),

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);