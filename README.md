# Neon-Glass Axiom (Modern Online Device Shop)

**Live UI Preview:** [https://sshihabb007.github.io/MODERN-ONLINE-DEVICE-SHOP/](https://sshihabb007.github.io/MODERN-ONLINE-DEVICE-SHOP/)

A futuristic, cyberpunk-themed e-commerce platform built with PHP, MySQL, and Tailwind CSS. The platform features a premium glassmorphism UI, a fully functional dynamic shopping cart, and a secure role-based authentication system.

## 🌟 Key Features

### 1. Cyber-Luxe User Interface
- **Glassmorphism Design:** Semi-transparent glass panels with glowing neon accents (`#00dddd`, `#6b13af`).
- **Responsive Layout:** fully optimized for both desktop and mobile viewing.
- **Dynamic PWA:** Installable as a Progressive Web App (PWA) with a "Network First" caching strategy to ensure dynamic content is always up to date.

### 2. Dynamic Product Ecosystem
- **Database-Driven:** All devices are fetched dynamically from the `shihab_products` MySQL table.
- **Dynamic Shopping Cart:** Features a real-time calculating cart that accurately pulls prices from the database and calculates subtotals with a 5% tax rate.

### 3. Secure Authentication & Authorization
- **Role-Based Access Control (RBAC):** Differentiates between standard `user` accounts and privileged `admin` accounts.
- **Admin Dashboard Guarding:** Restricted routes (`admin-add.php`, `admin-update.php`) automatically deflect unauthorized users back to the index.
- **Security Protocols:** Features Argon2id password hashing and robust session-based CSRF protection built into every form (`sshihabb007_generate_csrf()`).

### 4. Modular PHP Architecture
- Components like the Header, Footer, and Database Connection have been refactored into modular `includes/` to keep code DRY and maintainable.

---

## 🔐 System Credentials

The system comes pre-seeded with two default accounts. Navigate to `profile.php` to initiate a handshake.

### Administrator Clearance
- **Username:** `admin`
- **Password:** `admin123`
- *Access Level:* Grants the ability to view the "Admin Dashboard" button on the profile page and access backend product forging interfaces (`admin-add.php`).

### Standard Customer
- **Username:** `customer`
- **Password:** `customer123`
- *Access Level:* Grants access to the standard digital vault and product purchasing.

---

## 🛠️ Technical Stack

- **Frontend:** HTML5, Tailwind CSS (via CDN), Google Material Symbols.
- **Backend:** Raw PHP 8.x
- **Database:** MySQL (PDO Interface)
- **Architecture:** Procedural PHP with modular includes.

---

## 🚀 Installation & Setup

1. **Clone the Repository** into your local web server (e.g., XAMPP `htdocs` directory).
   ```bash
   git clone https://github.com/sshihabb007/MODERN-ONLINE-DEVICE-SHOP.git
   ```
2. **Database Configuration:**
   - Create a MySQL database named `shihab_nexus_db`.
   - Run the provided SQL artifact queries to construct the `shihab_products` and `sshihabb007_users` tables.
3. **Seeding:**
   - Navigate to `http://localhost/.../seed_users.php` in your browser once to initialize the default Admin and Customer accounts.
4. **Launch:**
   - Navigate to `index.php` and explore the grid.

---

*Architected by Mehedi Hasan Shihab (sshihabb007)*
