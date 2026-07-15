# Database Schema

Dokumentasi database schema untuk Ananniti Tattoo Bali.

## Overview

Database dirancang untuk mendukung functional requirements:
- User management
- Portfolio management
- Booking system
- Shop/E-commerce
- Admin operations

## Entity Relationship Diagram

[TO BE CREATED - ERD akan ditampilkan di file `erd.md`]

## Tables

### users

Tabel untuk menyimpan data pengguna.

```
Column Name       | Type      | Nullable | Default | Notes
------------------|-----------|----------|---------|------------------
id                | bigint    | No       |         | Primary Key
name              | string    | No       |         | 
email             | string    | No       | UNIQUE  | 
email_verified_at | timestamp | Yes      |         | 
password          | string    | No       |         | Hashed password
role              | string    | Yes      | user    | user, admin, staff
phone             | string    | Yes      |         | 
address           | text      | Yes      |         | 
city              | string    | Yes      |         | 
postal_code       | string    | Yes      |         | 
created_at        | timestamp | No       | now()   | 
updated_at        | timestamp | No       | now()   | 
deleted_at        | timestamp | Yes      |         | Soft delete
```

### [TO BE DEFINED] - Portfolio

Tabel untuk portfolio tattoo.

```
TO BE DEFINED
```

### [TO BE DEFINED] - Bookings

Tabel untuk booking appointments.

```
TO BE DEFINED
```

### [TO BE DEFINED] - Products

Tabel untuk merchandise/produk.

```
TO BE DEFINED
```

### [TO BE DEFINED] - Orders

Tabel untuk order/pembelian.

```
TO BE DEFINED
```

### [TO BE DEFINED] - Relationships

[TO BE DEFINED]

## Indexes

[TO BE DEFINED]

## Migrations

Semua schema changes dilakukan via migrations:

```bash
php artisan make:migration create_users_table
php artisan migrate
php artisan migrate:rollback
```

## Seeders

Database seeders untuk development:

```bash
php artisan db:seed
```

## Backup Strategy

[TO BE DEFINED]

## Data Retention

[TO BE DEFINED]

## Performance Considerations

[TO BE DEFINED]

## Constraints & Rules

[TO BE DEFINED]
