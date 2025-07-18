# 🌾 Farmers E-Market - Empowering Indian Agriculture with Technology

![MCA Project](https://img.shields.io/badge/Project-MCA%20Final%20Year-blue)
![Tech Stack](https://img.shields.io/badge/TechStack-PHP%20%7C%20MySQL%20%7C%20Bootstrap%20%7C%20Razorpay-yellow)
![Status](https://img.shields.io/badge/Status-Completed-brightgreen)

---

## 📚 Table of Contents

- [📌 Overview](#-overview)
- [🎯 Objectives](#-objectives)
- [💡 Features](#-features)
- [🛠️ Tech Stack](#️-tech-stack)
- [📐 Architecture](#-architecture)
- [📷 Screenshots](#-screenshots)
- [⚙️ Installation & Setup](#️-installation--setup)
- [🧪 Testing Summary](#-testing-summary)
- [🎓 Academic Info](#-academic-info)
- [🙏 Acknowledgments](#-acknowledgments)
- [📚 References](#-references)

---

## 📌 Overview

**Farmers E-Market** is a web-based application that empowers Indian farmers by offering them a platform to sell their agricultural products directly to retailers, food processors, and other buyers — **without middlemen**.  
It supports real-time orders, secure Razorpay payments, and regional language accessibility (including Telugu), and is mobile-optimized for rural users.

---

## 🎯 Objectives

- 🧑‍🌾 Create a user-friendly digital marketplace for farmers
- 🚫 Remove intermediaries to ensure fair pricing
- 💸 Enable secure transactions via Razorpay
- 🗣️ Provide multilingual support for accessibility
- 📲 Deliver a responsive UI for mobile usage

---

## 💡 Features

| Role      | Capabilities |
|-----------|--------------|
| 👨‍🌾 **Farmers** | List crops, manage orders, set prices |
| 🛒 **Buyers**   | Browse, compare, buy products |
| 🧑‍💼 **Admins**  | Manage users, pricing, transactions |

✅ Additional Functionalities:
- Razorpay integration for payments  
- Real-time order & status updates  
- Regional language UI (Telugu supported)  
- Secure login and role-based access  
- Admin dashboard and analytics  

---

## 🛠️ Tech Stack

| Layer       | Technologies                     |
|-------------|----------------------------------|
| Frontend    | HTML5, CSS3, JavaScript, Bootstrap |
| Backend     | PHP, Apache (via XAMPP)          |
| Database    | MySQL                            |
| Payments    | Razorpay API                     |
| Tools       | VS Code, Git, Browser (Chrome)   |

---

## 📐 Architecture

**Three-Tier Architecture:**
1. **Presentation Layer:** HTML + Bootstrap
2. **Application Layer:** PHP
3. **Data Layer:** MySQL

> Supports modular design for scalability and maintainability.

📊 Includes UML Diagrams:
- Use Case  
- Class Diagram  
- Sequence & Activity Diagrams  
- Collaboration Diagram  

---

## 📷 Screenshots

> 💡 *Screenshots include UI in Telugu and English*

| Login Page | Farmer Dashboard | Product Listing | Razorpay Payment |
|------------|------------------|------------------|------------------|
| ![](screenshots/login.png) | ![](screenshots/farmer_dashboard.png) | ![](screenshots/products.png) | ![](screenshots/payment.png) |

---

## ⚙️ Installation & Setup

```bash
# 1. Clone the repo
git clone https://github.com/madhavgopi1212/farmers-e-market.git

# 2. Move project to XAMPP
Place it inside /htdocs directory

# 3. Import Database
Import 'db.sql' into MySQL using phpMyAdmin

# 4. Start server
Launch Apache & MySQL via XAMPP

# 5. Run the app
Visit: http://localhost/farmers-e-market/
