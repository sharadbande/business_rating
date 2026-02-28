# Business Listing & Rating System

## 📌 Project Overview

This is a Business Listing & Rating System built using:

- Core PHP
- MySQL
- jQuery (AJAX)
- Bootstrap 5
- jQuery Raty (Star Rating Plugin)

The system allows users to manage businesses and provide ratings without page refresh using AJAX.

---

## ✨ Features

- Add Business
- Edit Business
- Delete Business (AJAX + Confirmation Modal)
- Star Rating System (Half Rating Supported)
- Average Rating Calculation
- No Page Refresh (Fully AJAX Based)
- Dynamic DOM Updates

---

## 🛠 Requirements

- PHP >= 7.4
- MySQL
- Apache (XAMPP / WAMP / MAMP)
- Internet connection (for CDN assets)

---

## 📁 Project Structure

```
business_rating/
│
├── ajax/
│   ├── fetch_business.php
│   ├── get_business.php
│   ├── save_business.php
│   ├── delete_business.php
│   ├── save_rating.php
│
├── assets/
│   └── js/
│       └── custom.js
│
├── config/
│   └── db.php
│
├── modals.php
├── index.php
└── README.md
```

---

## ⚙️ Setup Instructions

### 1️⃣ Download or Clone the Project

Place the project folder inside your server directory:

- XAMPP → `htdocs/`
- WAMP → `www/`

Example:

```
C:\xampp\htdocs\business_rating
```

---

### 2️⃣ Create Database

Open phpMyAdmin and create a new database:

```
business_rating
```

---

### 3️⃣ Create Tables

#### businesses table

```sql
CREATE TABLE businesses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(50),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### ratings table

```sql
CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);
```

---

### 4️⃣ Configure Database

Open:

```
config/db.php
```

Update credentials if needed:

```php
$conn = new mysqli("localhost", "root", "", "business_rating");
```

---

### 5️⃣ Run the Project

Open your browser and visit:

```
http://localhost/business_rating/
```

---

## 🔄 How It Works

### 📥 Load Businesses

- AJAX request → `ajax/fetch_business.php`
- Returns JSON
- Table rendered dynamically via JavaScript

---

### ➕ Add / Edit Business

- Uses Bootstrap Modal
- Form submitted using AJAX
- Data saved via `save_business.php`
- Table reloads dynamically

---

### 🗑 Delete Business

- Confirmation Modal
- AJAX POST → `delete_business.php`
- Row removed dynamically
- No page refresh

---

### ⭐ Rating System

- Uses jQuery Raty plugin
- Half rating supported
- Rating saved via `save_rating.php`
- Average calculated using:

```sql
IFNULL(ROUND(AVG(r.rating),1),0)
```

---

## 🚀 AJAX Architecture

| Action | File |
|--------|------|
| Fetch All | fetch_business.php |
| Get Single | get_business.php |
| Save Business | save_business.php |
| Delete Business | delete_business.php |
| Save Rating | save_rating.php |

All operations are handled asynchronously without page reload.

---

## 🧠 Technical Highlights

- Event delegation for dynamic elements
- Scoped modal form handling
- JSON-based responses
- Dynamic table rendering
- Clean AJAX architecture

---

## 📦 CDN Assets Used

- Bootstrap 5.3.2
- jQuery 3.6
- jQuery Raty 3.1.1

If working offline, download libraries locally and update paths.

---

## 🔒 Recommended Production Improvements

- Use prepared statements
- Server-side validation
- CSRF protection
- Input sanitization
- Authentication system

---

## 📈 Possible Enhancements

- Pagination
- Search & Filter
- SweetAlert confirmation
- Toast notifications
- REST API structure
- MVC architecture
- User authentication

---

## 👨‍💻 Author

Developed by: Sharad Bande  
Core PHP + AJAX Project

---