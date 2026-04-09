# 🛡️ Laravel JWT Login Dashboard

Aplikasi web **Responsive Login System** dengan **Laravel + JWT Authentication**. Fitur lengkap termasuk validasi form, protected routes, dan desain modern.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-ff4444?style=flat&logo=laravel)](https://laravel.com)
[![JWT](https://img.shields.io/badge/JWT-Auth-00d4aa?style=flat&logo=json-web-tokens)](https://jwt.io)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-563d7c?style=flat&logo=bootstrap)](https://getbootstrap.com)

## ✨ Fitur Utama

### ✅ **Core Features**
- [x] **Form Login** (Email + Password)
- [x] **Real-time Validation** (Email format + required fields)
- [x] **Show/Hide Password** toggle
- [x] **Protected Dashboard** (JWT middleware)
- [x] **Auto Redirect** ke `/dashboard` setelah login sukses
- [x] **Logout** functionality

### 🎁 **Bonus Features**
- [x] **Rate Limiting** (5 attempts/minute per IP)
- [x] **Loading Animation**
- [x] **Dark Mode Toggle**
- [x] **Responsive Design** (Mobile-first)
- [x] **Unit Tests** (Login validation)

### 🛠 Tech Stack

### ✅ Frontend: 
-├── Blade Templates
-├── Bootstrap 5.3 (Responsive)
-├── jQuery + Ajax
-└── Custom CSS/JS (Dark mode + Animations)

### ✅ Backend:
-├── Laravel 10.x
-├── MySQL 8.0
-├── JWT Auth (tymon/jwt-auth)
-├── Laravel Sanctum (HttpOnly Cookies)
-└── Laravel Rate Limiting

### ✅ Tools:
-├── Composer
-├── NPM (assets)
-├── PHPUnit (Testing)
-└── Laravel Tinker

### 🚀 Cara Menjalankan Project

### Prerequisites
PHP 8.1+ | Composer | Node.js + NPM | MySQL 8.0+ | Git

### Quick Start (5 Menit)
✅ git clone https://github.com/derim/logapp.git
✅ cd logapp
✅ composer install --optimize-autoloader --no-dev
✅ cp .env.example .env
✅ php artisan key:generate
✅ php artisan jwt:secret
✅ npm install && npm run build
✅ php artisan migrate --seed
✅ php artisan serve

### 🏗 Arsitektur Sistem
✅ Frontend (Blade/Ajax) 
--- ↓ Ajax POST
✅ API Routes (JWT Middleware)
--- ↓ Auth Check
✅ MySQL + Bcrypt → Dashboard (Protected)

### 🔒 Security
✅ JWT + HttpOnly Cookie
✅ Bcrypt Hashing
✅ Rate Limit (5x/min/IP)
✅ CSRF Protection

### 🧪 Testing
✅ php artisan test

### 📊 API Endpoints
POST /api/login
POST /api/logout  
GET  /api/user
GET  /dashboard


## 📱 Demo Screenshots
<p align="center"><strong>Mobile</strong></p>
<p align="center">
  <img src="https://raw.githubusercontent.com/detrim/img/main/Screenshot%20(140).png" width="45%">
  <img src="https://raw.githubusercontent.com/detrim/img/main/Screenshot%20(141).png" width="45%">
</p>

<p align="center"><strong>Desktop</strong></p>
<p align="center">
  <img src="https://raw.githubusercontent.com/detrim/img/main/Screenshot%20(142).png" width="45%">
  <img src="https://raw.githubusercontent.com/detrim/img/main/Screenshot%20(143).png" width="45%">
</p>

## 🚀 Deployment Ready

📄 License

Project selesai 100% ✅ | Fully Responsive | Production Ready 🚀


