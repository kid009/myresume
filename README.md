# MyResume - Personal Portfolio

A professional, responsive personal portfolio and resume website built with Laravel 12, featuring multi-language support (English and Thai) and a modern aesthetic.

## 🚀 Features

- **Multi-language Support:** Seamlessly switch between English and Thai.
- **Responsive Design:** Optimized for all devices using Bootstrap 5 and Tailwind CSS 4.
- **Modular Architecture:** Clean Laravel structure with modular Blade components.
- **Optimized Typography:** Uses the "Prompt" font for excellent readability in both EN and TH scripts.
- **Modern Assets:** High-quality WebP images and optimized vendor scripts.

## 🛠️ Tech Stack

- **Backend:** Laravel 12.x (PHP 8.2+)
- **Frontend:**
    - Bootstrap 5 (UI Framework)
- **Typography:** Google Fonts (Prompt, Roboto, Raleway)
- **Icons:** Bootstrap Icons

## 📁 Project Structure

- `app/Http/Controllers/`: Handles main page logic and localization.
- `app/DTOs/`: Data Transfer Objects for clean view data management.
- `lang/`: Contains PHP translation files (`en/`, `th/`).
- `resources/views/portfolio/`: Modular Blade sections (Hero, About, Resume, etc.).
- `resources/views/layouts/`: Base layout and asset partials.
- `public/assets/`: Pre-built template assets (CSS, JS, Vendor, Images).

## 📦 Installation

To get started with this project locally:

1. **Clone the repository:**

    ```bash
    git clone <repository-url>
    cd myresume
    ```

2. **Run the setup script:**
   This project includes a convenient setup command that handles dependencies, environment configuration, and asset building:

    ```bash
    composer setup
    ```

    _Alternatively, you can run the steps manually: `composer install`, `cp .env.example .env`, `php artisan key:generate`, `npm install`, and `npm run build`._

3. **Start the development servers:**
   In two separate terminals, run:
    ```bash
    php artisan serve
    ```
    and
    ```bash
    npm run dev
    ```

## 🌍 Localization

The project uses PHP-based translation files located in the `lang/` directory:

- `lang/en/home.php`, `lang/en/resume.php` - English translations
- `lang/th/home.php`, `lang/th/resume.php` - Thai translations

To add new content, add keys to the relevant PHP files and use the `__('filename.key')` helper in your Blade templates (e.g., `__('resume.page_title')`).

## 📜 Credits

- **Template:** Based on a [BootstrapMade](https://bootstrapmade.com/) design.
- **Author:** Pongpoom Kaewsungnern

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
