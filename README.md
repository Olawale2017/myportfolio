# Premium Personal Portfolio Website

A cPanel/Hostinger-compatible PHP and MySQL portfolio website for **[Your Name]**, a Digital Marketer / Funnel Designer / Ads Specialist / Web Designer.

## Features

- Premium responsive public website
- Home, About, Services, Portfolio, Testimonials, Booking, Contact, and Admin pages
- Booking request form with service, date/time, client details, and project description
- Automatic invoice creation after a booking is saved
- Browser-based invoice PDF download/print button
- Admin dashboard for bookings, invoices, service pricing, revenue, and pending payments
- MySQL schema with seeded services
- Plain PHP, HTML, CSS, and JavaScript for shared hosting compatibility

## Setup on cPanel/Hostinger

1. Upload all files to your hosting public directory, usually `public_html`.
2. Create a MySQL database and database user from your hosting control panel.
3. Import `database/schema.sql` using phpMyAdmin.
4. Edit `config/database.php` with your database host, name, username, and password.
5. Edit `config/app.php` with your brand name, email, phone number, location, and admin credentials.
6. Visit your domain root, for example `https://example.com/`, to view the website.
7. Visit `https://example.com/admin/login` to access the dashboard.

## Default Admin Login

The fallback admin login in `config/app.php` is:

- Email: `admin@example.com`
- Password: `admin123`

Change this before going live. Generate a new password hash with PHP:

```php
<?php echo password_hash('your-new-password', PASSWORD_DEFAULT); ?>
```

Then replace `admin_password_hash` in `config/app.php`.

## Database Tables

- `services` stores service names, descriptions, pricing, and active status.
- `bookings` stores client booking requests.
- `invoices` stores generated invoices and payment status.
- `contact_messages` stores contact form submissions.
- `admin_users` is included for future database-based admin expansion.

## Invoice PDF Download

The invoice page includes a **Download Invoice as PDF** button that opens the browser print dialog. Choose “Save as PDF” to download. This avoids server-side PDF dependencies and works reliably on shared hosting.

## Customization

- Update site-wide brand values in `config/app.php`.
- Update colors and layout in `assets/css/style.css` and `assets/css/admin.css`.
- Manage service names and prices from `/admin/services` after database setup.


## Clean URLs

The included `.htaccess` file removes visible `.php` extensions from public and admin URLs. For example:

- `/services.php` redirects to `/services`
- `/booking.php` redirects to `/booking`
- `/admin/login.php` redirects to `/admin/login`

Internal navigation, form actions, and post-submit redirects are also written with clean URLs so visitors should not see `.php` in the browser address bar on Apache hosting.
