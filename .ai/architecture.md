# Arsitektur

Dokumen ini mendeskripsikan arsitektur sistem Ananniti Tattoo Bali.

## Arsitektur Aplikasi

### Level Tinggi

```
[Browser Client]
    ↓
[Vite Dev Server / Laravel Server]
    ↓
[Blade Templates + Tailwind CSS]
    ↓
[Aplikasi Laravel]
    ↓
[Database]
```

### Layer

1. **Presentation Layer**
   - Blade templates
   - Styling Tailwind CSS
   - JavaScript (Vite bundled)

2. **Application Layer**
   - Controllers
   - Service classes
   - Middleware

3. **Domain Layer**
   - Models
   - Business logic
   - Validation rules

4. **Data Layer**
   - Repositories
   - Database queries
   - Migrations

## Struktur Direktori

```
app/
├── Http/
│   ├── Controllers/          # Request handlers
│   ├── Middleware/           # HTTP middleware
│   └── Requests/             # Form requests & validation
├── Models/                   # Eloquent models
├── Services/                 # Business logic
├── Repositories/             # Data access layer
└── Exceptions/               # Custom exceptions

resources/
├── views/
│   ├── layouts/             # Layout templates
│   ├── pages/               # Page templates
│   ├── partials/            # Reusable partials
│   └── components/          # Blade components
│       ├── ui/              # UI components
│       ├── layout/          # Layout components
│       └── sections/        # Section components
├── css/                     # CSS files
└── js/                      # JavaScript files

database/
├── migrations/              # Schema migrations
├── seeders/                 # Database seeders
└── factories/               # Model factories

routes/
├── web.php                  # Web routes
└── api.php                  # API routes (if needed)
```

## Alur Data

### Alur Page Request

1. User request halaman
2. Laravel router match route
3. Controller diinvoke
4. Controller fetch data dari service/model
5. Data passed ke Blade template
6. Template render HTML dengan Tailwind CSS
7. Vite bundle CSS dan JS
8. Response dikirim ke browser

### Alur Form Submission

1. User submit form
2. Form request validate data
3. Controller process request
4. Service handle business logic
5. Model persist data ke database
6. Response redirect atau return

## Stack Teknologi

- **Backend Framework**: Laravel 12
- **Frontend Templating**: Blade
- **Styling**: Tailwind CSS 4.0
- **Build Tool**: Vite 7.x
- **PHP Version**: 8.2+
- **Node Version**: [TO BE DEFINED]

## Design Patterns

- [TO BE DEFINED] Implementasi MVC pattern
- [TO BE DEFINED] Repository pattern
- [TO BE DEFINED] Service layer pattern
- [TO BE DEFINED] Dependency injection

## Pertimbangan Skalabilitas

- [TO BE DEFINED] Strategi caching
- [TO BE DEFINED] Database optimization
- [TO BE DEFINED] API versioning
- [TO BE DEFINED] Load balancing
