# Abdul Latif Mansyur — Portfolio Website

Modern portfolio website built with **Laravel 11 + Livewire 3 + Tailwind CSS + MySQL**.

Two-part system:
- **Public site** (`/`) – elegant landing page with Hero, About, Skills, Projects, Experience, Clients, Testimonials, Contact sections.
- **Admin dashboard** (`/admin`) – full CRUD for every section, file uploads, dark mode.

---

## ✨ Features

### Public Site
- Modern minimalist design with dark mode (toggle persisted in `localStorage`)
- Glassmorphism hero with floating profile card
- Scroll-reveal animations (IntersectionObserver, no library)
- Skills grouped by category with progress bars & icons
- Project showcase with featured tags, tech stack chips, live demo & repo links
- Timeline-based experience section
- Client logos strip
- Testimonial cards with star ratings
- Sticky glass navbar + smooth scroll anchors
- Fully responsive, mobile-first

### Admin Dashboard
- Email + password authentication (single admin)
- Sidebar layout, sticky header, theme toggle
- CRUD for: About, Skills, Projects, Experience, Clients, Testimonials
- Image upload (Livewire `WithFileUploads`) + paste-URL fallback
- Live progress slider, validation, flash messages, confirm-delete

### Architecture
- Domain-based directories: `app/Livewire/Public/`, `app/Livewire/Admin/`, `app/Livewire/Auth/`
- Reusable Tailwind component classes (`card`, `btn-primary`, `input`, `chip`, `glass`, ...)
- Clean separation of frontend (public) vs backend (admin)
- Eloquent models with proper casts (arrays, dates, booleans)

---

## 🛠️ Requirements

| Tool       | Version  |
|------------|----------|
| PHP        | ≥ 8.2    |
| Composer   | ≥ 2.5    |
| Node.js    | ≥ 18     |
| NPM / Yarn | latest   |
| MySQL      | ≥ 5.7 / MariaDB 10.3+ |

---

## 🚀 Installation

```bash
# 1. Install PHP dependencies
composer install

# 2. Install JS dependencies
npm install
# (or: yarn)

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database in .env
#   DB_DATABASE=portfolio
#   DB_USERNAME=root
#   DB_PASSWORD=
#   ADMIN_EMAIL=admin@portfolio.test
#   ADMIN_PASSWORD=password

# 5. Create the database
mysql -uroot -e "CREATE DATABASE portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 6. Run migrations + seed dummy data
php artisan migrate --seed

# 7. Storage symlink (for uploaded images)
php artisan storage:link

# 8. Build / dev frontend
npm run dev          # development with hot reload
# or
npm run build        # production build

# 9. Run the app
php artisan serve
# → http://localhost:8000
```

### Default admin credentials
After seeding:

| Email                     | Password   |
|---------------------------|------------|
| `admin@portfolio.test`    | `password` |

Login at: **http://localhost:8000/login**
Admin dashboard: **http://localhost:8000/admin**

> Change these via the `ADMIN_EMAIL` and `ADMIN_PASSWORD` variables in `.env` **before** running `migrate --seed`.

---

## 📂 Project Structure

```
app/
├── Http/Middleware/EnsureUserIsAdmin.php
├── Livewire/
│   ├── Auth/Login.php
│   ├── Admin/
│   │   ├── Dashboard.php
│   │   ├── AboutManager.php
│   │   ├── SkillsManager.php
│   │   ├── ProjectsManager.php
│   │   ├── ExperienceManager.php
│   │   ├── ClientsManager.php
│   │   └── TestimonialsManager.php
│   └── Public/HomePage.php
├── Models/
│   ├── About.php  Skill.php  Project.php
│   ├── Experience.php  Client.php  Testimonial.php
│   └── User.php
└── Providers/AppServiceProvider.php

resources/views/
├── layouts/      (app, auth, admin)
├── partials/     (navbar, footer)
└── livewire/
    ├── public/home-page.blade.php
    ├── auth/login.blade.php
    └── admin/*.blade.php
```

---

## 🎨 Design System (Tailwind)

- Font: **Inter** (sans), **JetBrains Mono** (mono)
- Brand color palette: `brand.500 → brand.700` (modern blue)
- Ink palette: custom neutrals tuned for both light & dark
- Reusable utilities: `.card`, `.btn-primary`, `.btn-ghost`, `.chip`, `.glass`, `.input`, `.section-title`
- Dark mode via `class` strategy + persisted localStorage

---

## 🧪 Smoke test

After install:

```bash
# Should render homepage with seeded data
curl http://localhost:8000

# Should redirect to /login when unauthenticated
curl -I http://localhost:8000/admin
```

---

## 📦 Deployment Notes

- Set `APP_ENV=production`, `APP_DEBUG=false`
- Run `php artisan optimize`, `npm run build`
- Make sure `storage/` and `bootstrap/cache/` are writable
- Configure HTTPS at the reverse proxy; `AppServiceProvider` already forces HTTPS in production

---

## 📝 License

MIT — feel free to fork and adapt for your own portfolio.
