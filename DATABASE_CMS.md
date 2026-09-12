# Database Schema & CMS Documentation

This document provides a comprehensive overview of the SQL database schema and tables used in your portfolio website CMS (`project_cms`). The structures are derived from the SQL dump at `d:\127_0_0_1.sql`.

---

## 🛢️ Database Overview: `project_cms`

The CMS website utilizes **MySQL / MariaDB** to manage administrative credentials, site configuration parameters, navigation menus, user registrations, and dynamic front-end content.

### 📋 Table Summary

| Table Name | Description | Key Columns | Primary Key | Auto Increment |
| :--- | :--- | :--- | :---: | :---: |
| **`basic_setting`** | Core site configuration (first name, email, phone, profile pictures, logo). | `first_name`, `email`, `number`, `images`, `logo` | Yes (`id`) | Yes |
| **`navigationbar`** | Dynamically loads navbar links and routes on the header & footer. | `navbar_links`, `body`, `href` | Yes (`id`) | Yes |
| **`categories`** | Dynamic profession categories shown as rotating items in the Hero section. | `name`, `created_at` | Yes (`id`) | Yes |
| **`users`** | Administrator accounts authorized to access the Admin Panel. | `username`, `email`, `password` | Yes (`id`) | Yes (Unique `email`) |
| **`users_register`** | Client/Visitor accounts registered through client-facing modals. | `username`, `email`, `created_at` | Yes (`id`) | Yes |
| **`subscribers`** | Lists emails of newsletter or site subscribers. | `subscriber` (email) | Yes (`id`) | Yes |
| **`contact_data`** | Logged messages/inquires submitted through the contact form. | `name`, `email`, `contact`, `subject`, `message` | Yes (`id`) | Yes |
| **`setting`** | Alternate core site settings. | `ph_number`, `email`, `address`, `nav_logo` | Yes (`id`) | Yes |
| **`menu`** | Additional page structures/content blocks. | `menu_name`, `header`, `description`, `page_image` | Yes (`id`) | Yes |
| **`text_table`** | Text blocks, raw HTML layouts, or dynamic components stored as strings. | `textarea` | Yes (`id`) | Yes |

---

## 📐 Table Specifications & SQL DDL

Below are the detailed schemas and structures for each table, including indexes and properties.

### 1. `basic_setting`
Stores primary profile details, contact numbers, and asset names (like logos and profile picture filenames) shown on the homepage and footer.

```sql
CREATE TABLE `basic_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `images` varchar(20) DEFAULT NULL,
  `logo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 2. `navigationbar`
Controls the website navigation links. Links in this table populate both the main header menu and the quick links in the footer.

```sql
CREATE TABLE `navigationbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navbar_links` varchar(10) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

*Sample Data:*
*   `id: 113` | `navbar_links: Resume` | `href: resume.php?resume=Resume`
*   `id: 149` | `navbar_links: Contact` | `href: contact.php?contact=Contact`

---

### 3. `categories`
Used by the dynamic typing carousel on `home.php` to present roles/professions (e.g., "Web Developer", "Freelancer").

```sql
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 4. `users`
Defines dashboard administrator credentials. Used in `signin.php` and `signup.php` to authenticate back-office permissions.

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 5. `users_register`
Stores client and visitor user accounts registered through frontend visual prompts and entry overlays.

```sql
CREATE TABLE `users_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 6. `subscribers`
Tracks email newsletter sign-ups.

```sql
CREATE TABLE `subscribers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `subscriber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 7. `contact_data`
Records client queries, names, contact numbers, email addresses, subjects, and text messages sent via your portfolio contact forms.

```sql
CREATE TABLE `contact_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 8. `setting`
An alternative/backup general site setting configuration table.

```sql
CREATE TABLE `setting` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `ph_number` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(110) NOT NULL,
  `nav_logo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 9. `menu`
Defines customizable dynamic pages or component blocks with associated media.

```sql
CREATE TABLE `menu` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(40) NOT NULL,
  `header` varchar(40) NOT NULL,
  `description` varchar(500) NOT NULL,
  `page_image` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

### 10. `text_table`
Stores plain text blocks, descriptions, raw markup scripts, and HTML fragments injected into dynamic rendering blocks.

```sql
CREATE TABLE `text_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textarea` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

## 🛠️ CMS Logic Integration
1.  **Dynamic Rendering**:
    *   **Hero Profile**: Fetches `first_name` and `images` from `basic_setting` to show your profile.
    *   **Navbar Links**: Loops through `navigationbar` rows to render `navbar_links` pointing to their respective `href` files.
    *   **Professions**: Iterates through `categories` to build typewriter-style headers on the index page.
2.  **Access Rules**:
    *   **Admin Access**: Checks logins against the `users` table.
    *   **Client Access**: Uses `users_register` to check for subscriber profiles and manage frontend access locks.
