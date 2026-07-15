# Struktur Folder

Dokumentasi lengkap struktur folder project Ananniti Tattoo Bali.

## Level Root

```
ananniti-tattoo/
├── .ai/                    # Dokumentasi AI & guidelines
├── .env                    # Environment variables (not committed)
├── .env.example            # Environment template
├── .editorconfig           # Editor configuration
├── .gitattributes          # Git attributes
├── .gitignore              # Git ignore rules
├── app/                    # Application source code
├── bootstrap/              # Application bootstrap
├── config/                 # Configuration files
├── database/               # Database migrations & seeds
├── node_modules/           # NPM dependencies (not committed)
├── public/                 # Public assets
├── resources/              # Frontend resources
├── routes/                 # Route definitions
├── storage/                # Storage (logs, cache, uploads)
├── tests/                  # Test files
├── vendor/                 # Composer dependencies (not committed)
├── artisan                 # Artisan CLI
├── composer.json           # Composer configuration
├── composer.lock           # Composer lock file
├── package.json            # NPM configuration
├── package-lock.json       # NPM lock file
├── phpunit.xml             # PHPUnit configuration
├── README.md               # Project README
└── vite.config.js          # Vite configuration
```

## Folder .ai/ Dokumentasi

```
.ai/
├── ai-rules.md             # Aturan development AI
├── README.md               # Panduan dokumentasi
├── project.md              # Overview project
├── design.md               # Design system (finalized)
├── architecture.md         # Arsitektur sistem
├── roadmap.md              # Roadmap product (updated)
├── coding-rules.md         # Coding standards
├── folder-structure.md     # File ini
├── review-checklist.md     # Checklist code review
├── tech-stack.md           # Detail technology stack
├── ui-components.md        # Inventory UI components
├── flowchart.md            # Flowchart aplikasi
├── erd.md                  # Entity relationship diagrams
├── database-schema.md      # Database schema docs
├── api-plan.md             # Dokumentasi API plan
├── deployment.md           # Panduan deployment
│
├── context/
│   ├── design-system.md    # Detail design system
│   ├── spacing.md          # Panduan spacing
│   ├── typography.md       # Standar typography
│   ├── animation.md        # Panduan animation
│   ├── assets.md           # Asset management
│   ├── responsive.md       # Responsive design
│   ├── copywriting.md      # Panduan copywriting
│   ├── reusable-components.md
│   ├── naming-convention.md
│   ├── ui-philosophy.md
│   └── visual-reference.md
│
├── prompts/
│   ├── (empty — ready to fill)
│
├── todos/
│   ├── 01-design-foundation.md # Setup checklist
│   └── progress.md         # Progress tracking (updated)
│
└── journal/
    ├── sprint-00.md        # Project initialization
    ├── sprint-01.md        # Design foundation
    ├── sprint-02.md        # Landing page & navbar
    ├── sprint-02.1.md      # Navbar QA revision
    ├── sprint-03.md        # Hero section
    ├── sprint-03-revision.md
    ├── sprint-03-revision-final.md
    ├── sprint-03-pixel-perfect-analysis.md
    ├── sprint-03-pixel-perfect-final.md
    ├── sprint-03-visual-reference-alignment.md
    ├── sprint-04-analysis.md
    ├── sprint-04-final.md
    ├── sprint-05-analysis.md
    ├── sprint-05-final.md
    ├── sprint-05-revision-analysis.md
    ├── sprint-05-revision-final.md
    ├── sprint-05-final-revision-analysis.md
    ├── sprint-05-final-revision-report.md
    ├── sprint-05-visual-polish-final.md
    ├── sprint-05-ux-refinement-analysis.md
    ├── sprint-05-ux-refinement-final.md
    ├── sprint-06-analysis.md
    ├── sprint-06-final.md
    ├── sprint-07.md        # Gallery
    ├── sprint-07.1.md      # Gallery refinement
    ├── sprint-08.md        # Artists
    ├── sprint-08-editorial.md
    ├── sprint-09.md        # Consultation CTA
    ├── sprint-10.md        # Testimonials
    ├── sprint-10.1.md      # Testimonials refinement
    ├── sprint-10r.md       # Client Stories redesign
    ├── sprint-10x.md       # Trust Section redesign
    ├── sprint-11.md        # Footer
    ├── change-log.md       # Change history (updated)
    ├── decision-log.md     # Major decisions
    ├── known-issues.md     # Issues & workarounds
    ├── component-verification.md
    └── cta-update.md
```

## Folder app/ Application Code

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   └── [TO BE ADDED]
│   │   ├── Public/
│   │   │   ├── HomeController.php
│   │   │   └── [TO BE ADDED]
│   │   └── Api/
│   │       └── [TO BE ADDED]
│   ├── Middleware/
│   │   └── [TO BE CONFIGURED]
│   └── Requests/
│       └── [TO BE ADDED]
├── Models/
│   └── User.php
├── Services/
│   └── [TO BE ADDED]
├── Repositories/
│   └── [TO BE ADDED]
├── Exceptions/
│   └── Handler.php
└── Console/
    └── Kernel.php
```

## Folder resources/ Frontend Resources

```
resources/
├── css/
│   └── app.css             # Main CSS (Tailwind + custom animations)
│
├── js/
│   ├── app.js              # Main JS entry
│   └── bootstrap.js        # Alpine.js + Axios setup
│
└── views/
    ├── layouts/
    │   └── app.blade.php   # Main layout
    ├── pages/
    │   └── home.blade.php  # Landing page (Hero → Footer)
    └── components/
        ├── ui/
        │   ├── button.blade.php
        │   ├── button-with-icon.blade.php
        │   └── link.blade.php
        ├── layout/
        │   ├── navbar.blade.php
        │   ├── container.blade.php
        │   ├── section.blade.php
        │   └── section-title.blade.php
        └── icon/
            ├── message-circle.blade.php
            ├── whatsapp.blade.php
            └── instagram.blade.php
```
│
├── js/
│   ├── app.js              # Main JS entry
│   ├── bootstrap.js        # Bootstrap utilities
│   └── [TO BE ADDED]
│
└── views/
    ├── layouts/
    │   ├── app.blade.php   # Main layout
    │   └── [TO BE ADDED]
    ├── pages/
    │   ├── home.blade.php
    │   └── [TO BE ADDED]
    ├── partials/
    │   ├── header.blade.php
    │   ├── footer.blade.php
    │   └── [TO BE ADDED]
    └── components/
        ├── ui/
        │   ├── button.blade.php
        │   └── [TO BE ADDED]
        ├── layout/
        │   ├── navigation.blade.php
        │   └── [TO BE ADDED]
        └── sections/
            └── [TO BE ADDED]
```

## Folder database/ Database Files

```
database/
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   └── [TO BE ADDED]
├── seeders/
│   └── DatabaseSeeder.php
└── factories/
    └── [TO BE ADDED]
```

## Folder routes/ Route Definitions

```
routes/
├── web.php                 # Web routes (HomeController → home)
└── api.php                 # API routes (future)
```

## Folder public/ Public Assets

```
public/
├── build/                  # Vite build output
├── images/
│   ├── hero/               # Hero section images
│   ├── about/              # About section images
│   ├── gallery/            # Gallery portfolio images (SVG placeholders)
│   ├── artists/            # Artist photos (SVG placeholders)
│   ├── reviews/            # Review tattoo photos (SVG placeholders)
│   └── testimonials/       # (removed — replaced by reviews/)
└── favicon.ico
```

## Folder storage/ Application Storage

```
storage/
├── app/
│   ├── public/             # Public storage
│   └── private/            # Private storage
├── framework/
│   ├── cache/
│   ├── sessions/
│   └── views/
└── logs/                   # Application logs
```

## Folder config/ Configuration

```
config/
├── app.php
├── database.php
├── cache.php
└── [STANDARD LARAVEL CONFIGS]
```

## Folder bootstrap/ Bootstrap Files

```
bootstrap/
├── app.php
└── cache/
```

## Folder tests/ Test Files

```
tests/
├── Unit/
│   └── [TO BE ADDED]
├── Feature/
│   └── [TO BE ADDED]
└── [TestCase.php]
```

## Naming Conventions

### Folders
- Gunakan lowercase dengan hyphen: `my-folder/`
- Plural untuk collections: `controllers/`, `models/`
- Singular untuk specific types: `middleware/`, `exception/`

### Files
- Controllers: `PascalCase` + `Controller.php` → `HomeController.php`
- Models: `PascalCase.php` → `User.php`
- Migrations: `timestamp_action_table.php` → `2024_01_01_120000_create_users_table.php`
- Blade views: `kebab-case.blade.php` → `home-page.blade.php`
- CSS: `kebab-case.css` → `app.css`
- JS: `camelCase.js` → `app.js`

## Best Practices

1. Keep folders organized dan logical
2. Gunakan consistent naming across project
3. Group related files together
4. Hindari deeply nested folders (max 3 levels)
5. Gunakan appropriate folder untuk file type
6. Keep public folder minimal
7. Jangan store sensitive files di public folder
