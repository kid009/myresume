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
  - Tailwind CSS 4.0 (Modern styling)
  - Vite (Asset Bundling)
- **Typography:** Google Fonts (Prompt, Roboto, Raleway)
- **Icons:** Bootstrap Icons

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
   *Alternatively, you can run the steps manually: `composer install`, `cp .env.example .env`, `php artisan key:generate`, `npm install`, and `npm run build`.*

3. **Start the development server:**
   ```bash
   npm run dev
   ```

## 🌍 Localization

The project uses JSON-based translation files located in the `lang/` directory:
- `lang/en.json` - English translations
- `lang/th.json` - Thai translations

To add new content, simply add the key-value pairs to both files and use the `__('Key')` helper in your Blade templates.

## 📜 Credits

- **Template:** Based on a [BootstrapMade](https://bootstrapmade.com/) design.
- **Author:** Pongpoom Kaewsungnern

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
