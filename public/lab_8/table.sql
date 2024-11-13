CREATE TABLE orders (
    id SERIAL PRIMARY KEY,
    order_number VARCHAR(100) NOT NULL,
    weight DECIMAL(5, 2) NOT NULL,
    city VARCHAR(255) NOT NULL,
    delivery_option VARCHAR(50) NOT NULL,
    branch VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);