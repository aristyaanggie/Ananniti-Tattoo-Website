# Entity Relationship Diagram

Dokumentasi Entity Relationship Diagram untuk Ananniti Tattoo Bali.

## ERD Overview

Database dirancang dengan relasi berikut untuk mendukung functional requirements.

## Entities & Relationships

### Core Entities

#### users
- id (PK)
- name
- email (UNIQUE)
- password
- phone
- address
- city
- postal_code
- role (user, admin, staff)
- email_verified_at
- created_at
- updated_at
- deleted_at (soft delete)

**Relationships**:
- Has many bookings
- Has many orders
- Has many addresses
- Has many reviews

#### portfolio_items
- id (PK)
- title
- description
- category_id (FK)
- artist_id (FK)
- image_url
- tattoo_style
- size
- placement
- created_at
- updated_at

**Relationships**:
- Belongs to category
- Belongs to artist (user)
- Has many reviews

#### bookings
- id (PK)
- user_id (FK)
- artist_id (FK)
- booking_date
- booking_time
- service_type
- design_details
- status (pending, confirmed, completed, cancelled)
- price
- notes
- created_at
- updated_at

**Relationships**:
- Belongs to user
- Belongs to artist (user)
- Has many payments (if split)

#### products
- id (PK)
- name
- description
- category_id (FK)
- price
- quantity_in_stock
- sku
- image_url
- created_at
- updated_at

**Relationships**:
- Belongs to category
- Has many order_items
- Has many reviews

#### orders
- id (PK)
- user_id (FK)
- order_number (UNIQUE)
- status (pending, processing, shipped, delivered, cancelled)
- total_price
- shipping_address_id (FK)
- payment_method
- payment_status
- created_at
- updated_at

**Relationships**:
- Belongs to user
- Has many order_items
- Belongs to shipping address

#### order_items
- id (PK)
- order_id (FK)
- product_id (FK)
- quantity
- price_per_item
- subtotal
- created_at

**Relationships**:
- Belongs to order
- Belongs to product

#### categories
- id (PK)
- name
- description
- type (portfolio, product)
- slug
- created_at

**Relationships**:
- Has many portfolio_items or products

#### reviews
- id (PK)
- user_id (FK)
- reviewable_id (polymorphic FK)
- reviewable_type (portfolio_item, product)
- rating
- comment
- created_at
- updated_at

**Relationships**:
- Belongs to user
- Belongs to reviewable (polymorphic)

#### payments
- id (PK)
- order_id or booking_id (FK)
- amount
- payment_method
- status (pending, completed, failed)
- transaction_id
- created_at
- updated_at

**Relationships**:
- Belongs to order or booking

#### user_addresses
- id (PK)
- user_id (FK)
- street
- city
- postal_code
- province
- country
- is_default
- created_at

**Relationships**:
- Belongs to user

## ERD Diagram (ASCII)

```
users
├── bookings
├── orders
├── addresses
├── reviews
└── artists (role = 'artist')

portfolio_items
├── categories
├── users (artist_id)
└── reviews

products
├── categories
├── order_items
└── reviews

bookings
├── users
├── artists (user)
└── payments

orders
├── users
├── order_items
├── products (through order_items)
└── payments

categories
├── portfolio_items
└── products

reviews (polymorphic)
├── users
├── portfolio_items
└── products
```

## Constraints & Rules

- `users.email` - Unique, not nullable
- `products.sku` - Unique, not nullable
- `orders.order_number` - Unique, not nullable
- `users.deleted_at` - Soft delete support
- Foreign keys dengan ON DELETE CASCADE dimana sesuai
- Foreign keys dengan ON UPDATE CASCADE

## Indexes

- `users.email` - UNIQUE INDEX
- `orders.user_id` - INDEX
- `bookings.user_id` - INDEX
- `portfolio_items.category_id` - INDEX
- `products.category_id` - INDEX
- `order_items.order_id` - INDEX
- `order_items.product_id` - INDEX
- `bookings.booking_date` - INDEX

## Normalization

Database dinormalisasi hingga 3NF (Third Normal Form):
- Menghindari data redundancy
- Menjaga data integrity
- Memaksimalkan query efficiency

## Future Considerations

- [TO BE DEFINED] - Analytics tables
- [TO BE DEFINED] - Audit log tables
- [TO BE DEFINED] - Message/notification tables
- [TO BE DEFINED] - Activity log tables

## Notes

- Diagram lengkap akan dibuat dengan tool seperti Lucidchart atau dbdiagram.io
- Semua relationships harus di-define di Eloquent models
- Gunakan migrations untuk schema management
