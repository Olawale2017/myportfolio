CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    slug VARCHAR(140) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT NOT NULL,
    client_name VARCHAR(160) NOT NULL,
    client_email VARCHAR(180) NOT NULL,
    client_phone VARCHAR(80) NOT NULL,
    company_name VARCHAR(180),
    preferred_date DATE NOT NULL,
    preferred_time TIME NOT NULL,
    project_description TEXT NOT NULL,
    status VARCHAR(40) NOT NULL DEFAULT 'New',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id)
);

CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    invoice_number VARCHAR(60) NOT NULL UNIQUE,
    client_name VARCHAR(160) NOT NULL,
    service_name VARCHAR(160) NOT NULL,
    amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    payment_status ENUM('Pending','Paid','Cancelled') NOT NULL DEFAULT 'Pending',
    invoice_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(160) NOT NULL,
    email VARCHAR(180) NOT NULL,
    phone VARCHAR(80),
    subject VARCHAR(180) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(180) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO services (name, slug, description, price, is_active) VALUES
('Meta Ads', 'meta-ads', 'Strategic Facebook and Instagram campaigns built for profitable lead generation and sales.', 500.00, 1),
('TikTok Ads', 'tiktok-ads', 'Scroll-stopping TikTok ad strategy, creative testing, and campaign optimization.', 450.00, 1),
('Funnel Design', 'funnel-design', 'High-converting sales funnels, landing pages, and nurture paths from click to close.', 750.00, 1),
('Email Marketing', 'email-marketing', 'Automated email flows and campaign sequences that convert subscribers into buyers.', 350.00, 1),
('Website Design', 'website-design', 'Premium responsive websites designed for credibility, clarity, and conversions.', 900.00, 1),
('SEO', 'seo', 'Search optimization to improve visibility, technical health, and content performance.', 400.00, 1),
('Digital Marketing Consultation', 'consultation', 'Actionable strategy sessions for offers, funnels, ads, analytics, and growth planning.', 150.00, 1)
ON DUPLICATE KEY UPDATE description = VALUES(description), price = VALUES(price), is_active = VALUES(is_active);

INSERT INTO admin_users (name, email, password_hash) VALUES
('Admin', 'admin@example.com', '$2y$12$1mJJ7KdgLoQ.VvU2SJCUP.kcXR.QVqdtdnbvCAVNqlZcXQKX9YMdS')
ON DUPLICATE KEY UPDATE email = email;
