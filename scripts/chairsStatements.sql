-- Name: Mahi Patel | Date: Feb 27, 2026 | Course: IT-202 | Section: 004
-- Assignment: Phase 2 | Email: mp2375
USE chair;

CREATE TABLE chairs (
    chair_id          INT            NOT NULL,
    chair_code        VARCHAR(10)    NOT NULL UNIQUE,
    chair_name        VARCHAR(255)   NOT NULL,
    chair_description TEXT           NOT NULL,
    chair_material    VARCHAR(50)    NOT NULL,
    chair_style       VARCHAR(60)    NOT NULL,
    chair_type_id     INT            DEFAULT 0,
    chair_buy_price   DECIMAL(10,2)  NOT NULL,
    chair_sell_price  DECIMAL(10,2)  NOT NULL,
    date_time_created TIMESTAMP      DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP      DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (chair_id),
    FOREIGN KEY (chair_type_id) REFERENCES chair_types(chair_type_id)
);

INSERT INTO chairs (chair_id, chair_code, chair_name, chair_description, chair_material, chair_style, chair_type_id, chair_buy_price, chair_sell_price)
VALUES (1, 'CH-01', 'Eames', 'Leather lounge chair.', 'Leather', 'Modern', 1, 400.00, 550.00);

SELECT * FROM chairs;