
# E-commerce Product Management

This project implements a product management feature for an e-commerce application. It includes user authentication, product CRUD operations, and an API for accessing product data. The project is built with Laravel, PHP, MySQL, and JavaScript.

## Features

- **User Authentication**: Allows user registration and login.
- **Product Management**: Full CRUD (Create, Read, Update, Delete) functionality for managing products.
- **API Integration**: Provides a secure API for fetching product details.
- **Frontend Interactivity**: Uses JavaScript for dynamic product management and form validation.

---

## Setup Instructions

### Prerequisites

- **PHP** >= 8.0
- **Composer**
- **MySQL**
- **Node.js** and **NPM**

### Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Saad20Elkammah/ecommerce-product-management.git
   cd ecommerce-product-management
   ```

2. **Install PHP dependencies**:

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**:

   ```bash
   npm install
   ```

4. **Environment Configuration**:
   
   - Copy `.env.example` to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Update the `.env` file with your MySQL database credentials:

     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Generate Application Key**:

   ```bash
   php artisan key:generate
   ```

6. **Migrate the Database**:

   This will create the necessary tables in your database.

   ```bash
   php artisan migrate
   ```

7. **Seed Data**:

   To populate your database with sample data, run:

   ```bash
   php artisan db:seed
   ```

---

## Running the Project

1. **Start the Development Server**:

   ```bash
   php artisan serve
   ```

2. **Compile Assets**:

   To compile the JavaScript and CSS assets, use:

   ```bash
   npm run dev
   ```

3. **Access the Application**:

   By default, the application runs at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Usage

### Authentication

1. **Register** or **login** to access the product management features.
2. Only authenticated users can add, edit, and delete products.

### Product Management

- **Add, Edit, Delete Products**: Manage products dynamically with a responsive, user-friendly interface.
- **API Access**: Use the provided API endpoints to fetch product details.

---

## API Documentation

The API provides access to product data. Use it with appropriate authentication.

- **Get Product Details**:

  ```http
  GET /products/{id}
  ```


## Security

- CSRF protection for form submissions.
- Secure password storage using hashing.
- Sanitization and validation of all user inputs.

---
## Additional Notes

For development, run `npm run watch` to automatically compile assets as you work on the project.

---

