# AW-Studio CMS

Bootstrap yout Laravel Application for CMS-usage with litstack, litstack-pages, litstack-bladesmith, and a aw-studio vitt stack - with one single command.

## Installation

In order to install the private composer packages add the repositories array to your `composer.json` and make shure you have a valid `auth.json` for the litstack store. After that you can download the package via composer:

```bash
composer require aw-studio/cms
```

and install it with the artisan command:

```bash
php artisan cms:install
```
