# Ecomus - Laravel Ecommerce Application

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <strong>A modern ecommerce platform built with Laravel 11</strong>
</p>

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Structure](#database-structure)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## 🚀 About

Ecomus is a full-featured ecommerce application built with Laravel 11, providing a complete online shopping experience with both customer and admin interfaces. The application includes product management, user authentication, shopping cart functionality, order processing, and Stripe payment integration.

## ✨ Features

### Customer Features
- **User Registration & Authentication**: Secure user registration and login system
- **Product Browsing**: Browse products by category with detailed product views
- **Shopping Cart**: Add/remove items with session-based cart management
- **Secure Checkout**: Integrated Stripe payment processing
- **Order Management**: View order history and track order status
- **Responsive Design**: Mobile-friendly interface

### Admin Features
- **Admin Dashboard**: Comprehensive admin panel for store management
- **Product Management**: CRUD operations for products with image upload
- **Category Management**: Organize products with categories
- **User Management**: Manage customer accounts and information
- **Order Management**: Process and track customer orders
- **Inventory Control**: Monitor product availability

### Technical Features
- **Laravel 11**: Latest Laravel framework with modern PHP practices
- **Stripe Integration**: Secure payment processing
- **Session Management**: Robust cart and user session handling
- **Middleware Protection**: Route protection for admin and user areas
- **Database Migrations**: Structured database schema with migrations

## 🛠 Technology Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Database**: MySQL/PostgreSQL/SQLite
- **Payment Gateway**: Stripe
- **Frontend**: Blade templates with Vite
- **Authentication**: Laravel's built-in authentication system
- **File Storage**: Local file system for product images

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM
- Database (MySQL, PostgreSQL, or SQLite)
- Stripe account for payment processing

### Step 1: Clone the Repository
```bash
git clone <repository-url>
cd ecomus
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Database Setup
```bash
# Configure your database in .env file
php artisan migrate
```

### Step 5: Build Assets
```bash
npm run build
```

### Step 6: Start the Application
```bash
php artisan serve
```

## ⚙️ Configuration

### Environment Variables
Add the following to your `.env` file:

```env
# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecomus
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Stripe Configuration
STRIPE_PK=your_stripe_public_key
STRIPE_SK=your_stripe_secret_key

# Application Configuration
APP_NAME=Ecomus
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### Stripe Setup
1. Create a Stripe account at [stripe.com](https://stripe.com)
2. Get your API keys from the Stripe dashboard
3. Add the keys to your `.env` file
4. Configure webhook endpoints if needed

## 🗄️ Database Structure

### Core Tables

#### Users
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `created_at`, `updated_at` - Timestamps

#### Admins
- `id` - Primary key
- `name` - Admin's full name
- `email` - Unique email address
- `password` - Hashed password
- `status` - Admin status
- `created_at`, `updated_at` - Timestamps

#### Products
- `id` - Primary key
- `name` - Product name
- `price` - Product price (decimal)
- `description` - Product description
- `image` - Product image path
- `available` - Availability status
- `created_at`, `updated_at` - Timestamps

#### Categories
- `id` - Primary key
- `name` - Category name
- `slug` - URL-friendly slug
- `description` - Category description
- `image` - Category image path
- `created_at`, `updated_at` - Timestamps

#### Orders
- `id` - Primary key
- `user_id` - Foreign key to users table
- `total_amount` - Order total (decimal)
- `status` - Order status (pending, processing, completed, cancelled)
- `created_at`, `updated_at` - Timestamps

#### Order Items
- `id` - Primary key
- `order_id` - Foreign key to orders table
- `product_id` - Foreign key to products table
- `product_name` - Product name at time of order
- `quantity` - Item quantity
- `price` - Item price at time of order
- `total` - Item total
- `created_at`, `updated_at` - Timestamps

## 🚀 Usage

### Customer Flow
1. **Browse Products**: Visit the homepage to see available products
2. **Product Details**: Click on products to view detailed information
3. **Add to Cart**: Add desired items to shopping cart
4. **Checkout**: Proceed to Stripe checkout for secure payment
5. **Order Confirmation**: Receive order confirmation and tracking

### Admin Flow
1. **Admin Login**: Access admin panel at `/admin`
2. **Dashboard**: View store overview and statistics
3. **Manage Products**: Add, edit, or remove products
4. **Manage Categories**: Organize products into categories
5. **Process Orders**: Update order status and manage customer orders
6. **User Management**: Monitor and manage customer accounts

### Key Routes

#### Public Routes
- `/` - Homepage with products
- `/products` - All products listing
- `/categories` - Category listing
- `/product` - Product details
- `/category` - Category products
- `/account/login` - Customer login
- `/account/register` - Customer registration

#### Customer Routes (Protected)
- `/account/dashboard` - Customer dashboard
- `/orders` - Order history
- `/order/details/{id}` - Order details
- `/stripe/checkout` - Payment checkout

#### Admin Routes
- `/admin` - Admin login
- `/admin/dashboard` - Admin dashboard
- `/admin/products` - Product management
- `/admin/categories` - Category management
- `/admin/users` - User management
- `/admin/orders` - Order management

## 🔧 Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Database Seeding
```bash
php artisan db:seed
```

### Cache Management
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Laravel documentation](https://laravel.com/docs)
2. Review the application logs in `storage/logs/`
3. Ensure all environment variables are properly configured
4. Verify database migrations have been run

## 🔐 Security

- All user passwords are hashed using Laravel's built-in hashing
- Admin routes are protected with middleware
- Stripe handles all payment data securely
- CSRF protection is enabled for all forms
- Input validation is implemented throughout the application

---

**Built with ❤️ using Laravel 11**
