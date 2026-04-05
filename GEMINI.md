# Gemini CLI - Project Context

This file provides context and guidelines for Gemini CLI when working on this project.

## Project Overview

- **Name:** MyResume
- **Type:** Personal Portfolio / Resume Website
- **Framework:** Laravel 12.x
- **PHP Version:** ^8.2
- **Frontend Stack:** 
    - Bootstrap 5 (via a custom template)
    - Tailwind CSS 4.0 (configured via Vite, but legacy Bootstrap assets are currently used in the main layout)
    - Vite for asset bundling
- **Localization:** Supports English (`en`) and Thai (`th`) using JSON translation files.

## Project Structure

- `app/Http/Controllers/`: Contains `PortfolioController.php` for handling the main page.
- `app/Http/Middleware/`: Contains `SetLocale.php` for language switching.
- `lang/`: Contains `en.json` and `th.json` for translations.
- `resources/views/`: 
    - `layouts/`: Base layouts and partials (`css`, `js`, `navmenu`).
    - `portfolio/`: Main page sections (Hero, About, Resume, etc.).
- `public/assets/`: Contains pre-built Bootstrap template assets (CSS, JS, Vendor, Images).
- `routes/web.php`: Defines the routes for the portfolio and language switcher.

## Core Workflows

### Localization

The project uses a session-based localization system.

1.  **Switching Language:** Handled by the `/lang/{locale}` route.
2.  **Adding Translations:** Add keys to `lang/en.json` and `lang/th.json`.
3.  **Using Translations:** Use `__('Key Name')` in Blade templates or controllers.

### Assets & Styling

The project is in a transition state or hybrid state between Bootstrap and Tailwind CSS.

-   **Legacy Bootstrap:** The main theme is based on a "BootstrapMade" template. Files are located in `public/assets/`.
-   **Tailwind CSS:** Configured in `package.json` and `vite.config.js`. When adding new components, prefer Tailwind CSS if possible, but maintain consistency with the existing Bootstrap layout.
-   **Fonts:** Uses "Prompt" as the primary font to support both English and Thai characters beautifully.

## Coding Standards

-   **Laravel Conventions:** Follow standard Laravel naming conventions (PascalCase for Controllers/Models, camelCase for variables/methods).
-   **Blade Templates:** Keep sections modular in `resources/views/portfolio/partials/`.
-   **Comments:** Use English for code comments, but Thai is acceptable for internal notes or descriptions if specifically requested by the user.

## Common Commands

-   `php artisan serve`: Start the development server.
-   `npm run dev`: Start Vite development server.
-   `npm run build`: Build assets for production.
-   `php artisan test`: Run PHPUnit tests.
