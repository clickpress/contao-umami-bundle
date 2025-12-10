# Contao Umami Analytics Bundle

This bundle integrates [Umami Analytics](https://umami.is/) into Contao. It allows you to configure the Umami tracking script directly within the page root settings of your Contao installation.

## Features

- Easy integration of Umami Analytics.
- Configuration per website root (Multi-domain support).
- Adds necessary tracking codes automatically to the frontend.

## Installation

1. Install the bundle via Composer:

   ```bash
   composer require clickpress/contao-umami-bundle
   ```

2. Update your database to add the new configuration fields:

   ```bash
   php bin/console contao:migrate
   ```

## Configuration

1. Log in to your **Contao Backend**.
2. Go to **Site Structure** and edit a **Website Root** page.
3. Locate the **Umami Analytics** section (usually under "Website legend" or similar).
4. Enter your Umami configuration details:
    - **Umami Analytics URL**: The URL to your Umami instance (e.g., `https://analytics.mydomain.com/script.js`).
    - **Umami API-Key / Site ID**: The unique Site ID provided by Umami for this website.

Once saved, the tracking script will be automatically injected into the `<head>` of your website pages.

## Requirements

- Contao 5.3 or newer
- PHP 8.3 or newer

## License

This bundle is released under the LGPL-3.0-or-later license.
