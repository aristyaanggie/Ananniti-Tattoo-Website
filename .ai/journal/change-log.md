# Change Log

Dokumentasi perubahan dan versioning untuk Ananniti Tattoo Bali.

## Version History

### v3.3.0 — Shop Editorial Showroom + Discoverability
**Date**: 2026-07-16
**Status**: Beta (Shop Complete — Editorial Showroom)

**What's New**:
- Sprint 12.0–12.8: Shop Foundation, Product Card, Category Filter, Editorial Grid, Product Detail, Gallery Experience, UX Polish
- Sprint 13.0–13.3: Shop Architecture Redesign, Category Redesign, Editorial Showroom, Discoverability
- Shop redesigned as single-page Editorial Showroom (no category pages)
- 5 editorial sections: Machines (image left), Ink (horizontal), Needles (image right), Furniture (featured), Others (grid)
- Product badges: Best Seller, New, Limited, Staff Pick, Artist Pick
- "View All (N)" links with product counts for scalability
- Reusable components: Product Card, Category Filter, Loading Skeleton, Footer
- Product Detail: Thumbnail gallery, highlights, horizontal editorial "Why Artists"
- Build: 0 error, 0 warning

**Changes**:
- Updated `resources/views/pages/shop.blade.php` (editorial showroom)
- Created `resources/views/pages/shop-detail.blade.php`
- Created `resources/views/pages/shop-category.blade.php`
- Created `resources/views/components/shop/product-card.blade.php`
- Created `resources/views/components/shop/category-filter.blade.php`
- Created `resources/views/components/shop/loading-skeleton.blade.php`
- Created `resources/views/components/layout/footer.blade.php`
- Updated `app/Http/Controllers/ShopController.php`
- Updated `routes/web.php`
- Updated `resources/views/pages/home.blade.php` (footer component)
- Added `.ai/journal/sprint-12.0.md` through `sprint-13.3.md`

---

### v2.6.0 — Final Art Direction QA (Production Lock Candidate)
**Date**: 2026-07-15
**Status**: Beta (Landing Page v1.0 PRODUCTION LOCK CANDIDATE)

**What's New**:
- Sprint 11.11: Final Art Direction QA (7 tasks)
- Background flow: Hero→About→Services→Shop [WHITE] → Gallery→Artists [BLACK] → Trust [WHITE] → Consultation→Footer [BLACK]
- Services & Shop moved to white chapter with subtle card depth
- Gallery: editorial asymmetric grid (5:7 column ratio, varied heights)
- Artist: moved to dark chapter
- Consultation → Footer separator: subtle white/8% gradient
- All CTAs solid, all text readable, all headings clear
- Final Score: 96/100
- Build: 0 error, 0 warning

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `.ai/journal/sprint-11.11.md`

---

### v2.5.0 - Final Art Direction — Production Candidate
**Date**: 2026-07-15
**Status**: Beta (Landing Page v1.0 FINAL LOCK)

**What's New**:
- Sprint 11.10: Final art direction — 7 tasks
- Chapter-based background flow (White→Dark→White→Dark)
- Footer: Heading opacity 80%, body 70%, all info clearly readable
- Trust: 4.9 rating header + social proof tags + review metadata
- Consultation: Complete redesign → single centered white card
- Shop: Moved to dark chapter (bg-[#0a0a0a])
- CTAs: All solid, no transparency
- Readability: Full audit, all sections clear
- Responsive: QA at 390/430/768/1024/1440/1920px
- Build: 0 error, 0 warning

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `.ai/journal/sprint-11.10.md`

---

### v2.4.0 - Final Art Direction (Final Before Shop)
**Date**: 2026-07-17
**Status**: Beta (Landing Page v1.0 Final Lock Candidate)

**What's New**:
- Sprint 11.9: Final art direction refinement (13 tasks)
- Background rhythm: Feather transitions (h-px gradient lines)
- Typography: All opacity minimum 60%, body text 70-85%
- CTA buttons: All solid, high contrast
- Gallery: CSS masonry columns, varied heights, 16px radius
- Services: Lucide Storefront icon, text opacity 70%
- Shop: Stronger gradient (black/80)
- Consultation: 2-column layout, solid white card
- Reviews: Editorial layout, gold stars #D4AF37, 2+3 grid
- Navbar: Solid black, center nav
- Footer: Clickable address (Google Maps), link opacity 60%
- Build: 0 error, 0 warning

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `.ai/journal/sprint-11.9.md`

---

### v2.3.0 - Landing Page Final Art Direction (Pre-Production Lock)
**Date**: 2026-07-16
**Status**: Beta (Landing Page v1.0 Pre-Production Lock)

**What's New**:
- Sprint 11.6.1: Final art direction refinement (12 tasks)
- Background rhythm: Feather transitions, alternating white/black
- Hero: Overlay dikurangi (bg-black/50 → bg-black/30), foto lebih terbaca
- CTA buttons: Semua solid, kontras tinggi (bukan ghost/transparent)
- Services: Icon storefront untuk Studio, icon representatif
- Shop: Gradient lebih subtle
- Gallery: CSS masonry editorial layout (variasi tinggi gambar)
- Artist: Background putih bersih
- CTA: Solid black (#0a0a0a), focus point
- Reviews: Editorial layout (2 besar + 3 kecil), bintang gold #D4AF37
- Footer: Alamat clickable ke Google Maps
- Build: 0 error, 0 warning

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `.ai/journal/sprint-11.6.1.md`

---

### v2.2.0 - Landing Page Art Direction Refinement (FINAL)
**Date**: 2026-07-15
**Status**: Beta (Landing Page v1.0 Lock Candidate)

**What's New**:
- Sprint 11.6: Complete art direction refinement (12 tasks)
- Navbar: True center navigation, flex-1 layout
- Hero: Identity label "Est. MMXII — Bali, Indonesia"
- Hero: CTA buttons direct links (bukan component)
- Services: Bug fix state independen + editorial visual
- Shop: Editorial asymmetric grid (large + small + wide)
- Gallery: Editorial photography exhibition (mixed aspect ratios)
- Artist: Image dominance 45%, two-line dramatic name
- Trust: Complete redesign — editorial list, bukan card grid
- CTA: Centered headline dominant, whitespace sangat lega
- Visual Rhythm: Section backgrounds bervariasi (white → #fafafa → #111 → #0a0a0a)
- Animation: Duration 250ms (dari 300ms)
- Final Score: 94.1 / 100

**Changes**:
- Updated `resources/views/components/layout/navbar.blade.php` (complete rewrite)
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Updated `resources/css/app.css` (animation duration)
- Added `.ai/journal/sprint-11.6.md` (audit report)

**Known Issues**: None

**Next**: Sprint 12 — Tattoo Supply Shop

---

### v2.1.0 - Landing Page Final Polish & UX Audit
**Date**: 2026-07-15
**Status**: Beta (Landing Page Final Polish)

**What's New**:
- Sprint 11.5: Landing Page Final Polish & UX Audit (14 audits)
- Services cards: Added `relative` for top accent line rendering
- Hero CTA: Changed to white button for visibility on dark overlay
- Hero Secondary: Changed to ghost button (transparent + border)
- Section titles: Standardized to `size="sm"` for Services & Supply
- Gallery/Supply links: Added `cursor-pointer` for consistency
- Services aria-controls: Removed invalid ARIA references
- Button hover: Added scale effect (1.02 hover, 0.98 active)
- CSS transitions: Standardized to 200ms for responsiveness
- Final Landing Page Score: 91.5 / 100

**Changes**:
- Updated `resources/views/pages/home.blade.php` (10 fixes)
- Updated `resources/css/app.css` (3 improvements)
- Added `.ai/journal/sprint-11.5.md` (audit report)

**Known Issues**: None

**Next**: Manual QA Review → v2.2.0 (Shop Page)

---

### v2.0.0 - Footer + Landing Page Complete
**Date**: 2026-07-15
**Status**: Beta (Landing Page Complete)

**What's New**:
- Footer editorial luxury (4 kolom, responsive)
- Brand section (logo + nama + description)
- Quick Links (6 anchor links)
- Studio Information (address, hours, phone, email)
- Connect (Instagram, WhatsApp, TikTok, Facebook)
- Bottom Bar (copyright + "Made with passion in Bali")
- LANDING PAGE SELESAI (Hero hingga Footer)

**Changes**:
- Updated `resources/views/pages/home.blade.php` (Footer implementation)
- Added `.ai/journal/sprint-11.md`

**Known Issues**: None

**Next**: Final Landing Page Review & QA

---

### v1.9.0 - Trust Section (Complete Redesign)
**Date**: 2026-07-15
**Status**: Beta (Landing Page Update)

**What's New**:
- Trust Section complete redesign dari Client Stories
- Section Header: Eyebrow + Heading + Description
- Trust Overview: 4 metrics placeholder (Google Rating, Total Reviews, Years Experience, Countries Served)
- Featured Reviews: 6 review cards dengan foto tattoo (3×2 grid)
- Trust Sources: Google Reviews, Instagram Community, Returning Clients
- Closing Statement

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `public/images/reviews/` (6 placeholder SVGs)
- Added `.ai/journal/sprint-10x.md`

**Known Issues**: None

**Next Version**: v2.0.0 - Footer Section

---

### v1.8.0 - Client Stories (Complete Redesign)
**Date**: 2026-07-15
**Status**: Beta (Landing Page Update)

**What's New**:
- Client Stories complete redesign dari Testimonials
- One Hero Per Section (hanya 1 testimonial tampil)
- Review sebagai HERO (text-xl/2xl/3xl, italic)
- Alpine.js navigation (avatar dots + nama)
- Transisi halus (opacity + translateY, 250ms)
- Whitespace sangat lega (py-32/48/64)
- Tidak ada card, grid, border, shadow

**Changes**:
- Updated `resources/views/pages/home.blade.php` (complete rewrite)
- Added `.ai/journal/sprint-10r.md`

**Known Issues**: None

**Next Version**: v1.9.0 - Footer Section

---

### v1.7.1 - Testimonials Refinement
**Date**: 2026-07-15
**Status**: Beta (Landing Page Update)

**What's New**:
- Testimonials refinement berdasarkan QA findings
- Card feeling dihilangkan (editorial, bukan e-commerce)
- Visual hierarchy: Stars → Review → Client → Country
- Review menjadi elemen paling dominan
- Placeholder .jpeg (SVG dihapus)
- Spacing lebih lega (breathing room)
- Hover sangat halus (hanya border)

**Changes**:
- Updated `resources/views/pages/home.blade.php` (Testimonials refinement)
- Removed `public/images/testimonials/*.svg`

**Known Issues**: None

**Next Version**: v1.8.0 - Footer Section

---

### v1.7.0 - Testimonials Section
**Date**: 2026-07-15
**Status**: Beta (Landing Page Update)

**What's New**:
- Testimonials section dengan 3 client reviews
- Dark theme (bg-[#0a0a0a]) konsisten dengan Artists & CTA
- Card styling: border tipis, radius kecil, hover subtle
- Star rating (white, bukan gold)
- Responsive: 3 desktop, 2 tablet, 1 mobile

**Changes**:
- Updated `resources/views/pages/home.blade.php` (Testimonials section)
- Added `public/images/testimonials/` (3 placeholder SVGs)
- Added `.ai/journal/sprint-10.md`

**Known Issues**: None

**Next Version**: v1.8.0 - Footer Section

---

### v1.6.0 - Consultation CTA
**Date**: 2026-07-14
**Status**: Beta (Landing Page Update)

**What's New**:
- Consultation CTA section sebagai penutup sebelum Testimonials
- Black background dengan centered layout
- WhatsApp CTA dengan MessageCircle icon
- Whitespace sangat lega untuk premium feel

**Changes**:
- Updated `resources/views/pages/home.blade.php` (CTA section)
- Added `.ai/journal/sprint-09.md`

**Known Issues**: None

**Next Version**: v1.7.0 - Testimonials Section

---

### v1.5.0 - Artists Editorial
**Date**: 2026-07-13
**Status**: Beta (Landing Page Update)

**What's New**:
- Gallery section dengan 6 portfolio items
- Artists section dengan featured artist editorial layout

**Changes**:
- Updated `resources/views/pages/home.blade.php` (Gallery + Artists)
- Added placeholder images for gallery and artists

**Known Issues**: None

---

### v0.0.1 - Initial Setup
**Date**: 2026-07-10
**Status**: Alpha (Project Initialization)

**What's New**:
- Initial project setup dengan Laravel 12
- Documentation structure (.ai folder)
- Environment verification complete
- Vite build process working
- Tailwind CSS integrated

**Changes**:
- Created 31 documentation files
- Created .ai folder structure
- Verified all dependencies

**Known Issues**: None

**Next Version**: v0.1.0 - Landing Page & Navigation

---

## Version Naming

Format: `v[Major].[Minor].[Patch]`

- **Major**: Significant feature release atau major refactor
- **Minor**: New features, minor changes
- **Patch**: Bug fixes, documentation updates

## Release Schedule

- Beta: When first MVP features complete
- RC (Release Candidate): When ready untuk testing
- Production: When fully tested dan approved

## Deprecation Policy

Features deprecated akan:
1. Marked as @deprecated di code
2. Documented di release notes
3. Supported untuk minimum 2 major versions
4. Removed di 3rd major version

## Breaking Changes

Breaking changes akan:
1. Clearly documented
2. Only di major versions
3. Accompanied by migration guide
4. Announced di advance

## Changelog Format

Setiap version harus include:

```
### v[Version] - [Release Date]
**Status**: [Alpha/Beta/RC/Stable]

**Features**:
- [New feature 1]
- [New feature 2]

**Improvements**:
- [Improvement 1]
- [Improvement 2]

**Bug Fixes**:
- [Bug fix 1]
- [Bug fix 2]

**Breaking Changes**:
- [Breaking change 1]

**Migration Guide**:
[How to upgrade]

**Known Issues**:
- [Known issue 1]

**Dependencies**:
- [Updated dependencies]
```

## Release Process

1. Create release branch
2. Update version numbers
3. Update changelog
4. Run full test suite
5. Create release tag
6. Generate release notes
7. Deploy jika applicable
8. Announce release

## Rollback Process

Jika issues found di production:
1. Revert ke previous version
2. Fix issue di separate branch
3. Create hotfix release
4. Deploy hotfix

## Documentation Updates

- Update documentation untuk setiap release
- Keep API documentation current
- Update README dengan new features
- Archive old documentation jika needed

## Version Tracking

Current version: **v3.3.0**

```
Legend:
✅ = Completed
🔄 = In Progress
⏳ = Planned
🚫 = Cancelled
```

## Release Timeline

| Version | Target Date | Status | Notes |
|---------|------------|--------|-------|
| v0.0.1  | 2026-07-10 | ✅ Complete | Initial setup |
| v1.5.0  | 2026-07-13 | ✅ Complete | Landing page (Hero, About, Services, Supply, Gallery, Artists) |
| v1.6.0  | 2026-07-14 | ✅ Complete | Consultation CTA |
| v1.7.0  | 2026-07-15 | ✅ Complete | Testimonials Section |
| v1.7.1  | 2026-07-15 | ✅ Complete | Testimonials Refinement |
| v1.8.0  | 2026-07-15 | ✅ Complete | Client Stories (Complete Redesign) |
| v1.9.0  | 2026-07-15 | ✅ Complete | Trust Section (Complete Redesign) |
| v2.0.0  | 2026-07-15 | ✅ Complete | Footer + Landing Page Complete |
| v2.1.0  | 2026-07-15 | ✅ Complete | Landing Page Final Polish & UX Audit (91.5/100) |
| v2.2.0  | 2026-07-15 | ✅ Complete | Art Direction Refinement (v1.0 Lock Candidate) |
| v2.3.0  | 2026-07-16 | ✅ Complete | Final Art Direction — Pre-Production Lock |
| v2.4.0  | 2026-07-17 | ✅ Complete | Final Art Direction — Final Before Shop (95/100) |
| v2.5.0  | 2026-07-15 | ✅ Complete | Final Art Direction — Production Candidate |
| v2.6.0  | 2026-07-15 | ✅ Complete | Final Art Direction QA — Production Lock (96/100) |
| v3.0.0  | 2026-07-16 | ✅ Complete | Shop Foundation + Product Card + Category Filter |
| v3.1.0  | 2026-07-16 | ✅ Complete | Product Detail + Editorial Grid |
| v3.2.0  | 2026-07-16 | ✅ Complete | Shop Architecture Redesign (Collection-First) |
| v3.3.0  | 2026-07-16 | ✅ Complete | Shop Editorial Showroom + Discoverability |

## Semantic Versioning

Project ini follow Semantic Versioning 2.0.0:

- **MAJOR** version ketika membuat incompatible API changes
- **MINOR** version ketika add functionality di backward compatible manner
- **PATCH** version ketika membuat backward compatible bug fixes

## Commit Messages untuk Changes

Setiap commit harus reference version-nya:

```
v0.1.0: Add landing page hero section
v0.1.0: Fix responsive navigation menu
v0.2.0: Add portfolio gallery component
```

---

**Last Updated**: 2026-07-15
**Current Version**: v2.0.0-beta
**Next**: Final Landing Page Review & QA
