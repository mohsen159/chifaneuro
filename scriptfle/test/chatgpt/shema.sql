Products
- product_id (primary key)
- product_name
- description
- price
- quantity

Customers
- customer_id (primary key)
- first_name
- last_name
- email
- phone_number

Orders
- order_id (primary key)
- customer_id (foreign key)
- order_date
- total_price

Order_Items
- order_id (foreign key)
- product_id (foreign key)
- quantity
- price_per_unit

Sales_History
- product_id (foreign key)
- date
- sales_count
