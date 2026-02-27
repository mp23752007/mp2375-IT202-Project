-- Name: Mahi Patel | Date: Feb 27, 2026 | Course: IT-202 | Section: 004
-- Assignment: Phase 2 | Email: mp2375
USE chair;
DROP TABLE IF EXISTS chairs;
DROP TABLE IF EXISTS chair_types;

CREATE TABLE chair_types (
    chair_type_id      INT           NOT NULL,
    chair_type_code    VARCHAR(255)  NOT NULL UNIQUE,
    chair_type_name    VARCHAR(255)  NOT NULL,
    chair_aisle_number INT           NOT NULL,
    date_time_created  TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
    date_time_updated  TIMESTAMP     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (chair_type_id)
);

INSERT INTO chair_types (chair_type_id, chair_type_code, chair_type_name, chair_aisle_number)
VALUES (1, 'LNG', 'Lounge', 10), (2, 'REC', 'Recliner', 12), (3, 'OFF', 'Office', 15);

SELECT * FROM chair_types;