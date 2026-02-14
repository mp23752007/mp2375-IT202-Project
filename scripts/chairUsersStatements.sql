-- Name: Mahi Patel 
-- Date: Feb 13, 2026
-- Course: IT-202
-- Section: 004
-- Assignment: Phase 1
-- Email: mp2375

CREATE DATABASE IF NOT EXISTS chair;
USE chair;

CREATE TABLE IF NOT EXISTS chair_users (
    chair_user_id INT NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    pronouns VARCHAR(60) NOT NULL,
    first_name VARCHAR(60) NOT NULL,
    last_name VARCHAR(60) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (chair_user_id)
);

INSERT INTO chair_users (email_address, password, pronouns, first_name, last_name, phone_number)
VALUES 
('taylor@chairs.com', SHA2('password123', 256), 'She/Her', 'Taylor', 'Swift', '555-1234'),
('mahi@chairs.com', SHA2('password123', 256), 'She/Her', 'Mahi', 'Patel', '555-5678'),
('admin@lounge.com', SHA2('password123', 256), 'They/Them', 'Admin', 'User', '555-0000');