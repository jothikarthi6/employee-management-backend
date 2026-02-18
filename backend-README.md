# Employee Management API
> RESTful API built with PHP Laravel & MySQL that serves employee data with automatic flagging for long-tenure active employees.

---

## 🚀 Tech Stack

- **Framework** — PHP Laravel 12
- **Database** — MySQL 8
- **Language** — PHP 8.5
- **Libraries** — Eloquent ORM, Carbon

---

## ✨ Features

- REST API to list and retrieve all employees
- Auto-computes `years_of_service` from `joined_date` at runtime
- Auto-flags (`is_flagged: true`) any employee who is **active** and has **more than 5 years** of service
- Clean MVC architecture — business logic lives in the Model, not the Controller
- CORS enabled for Flutter mobile client

---

## 📁 Project Structure

```
backend/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── EmployeeController.php   ← API controller
│   └── Models/
│       └── Employee.php                 ← Flagging logic lives here
├── database/
│   ├── migrations/
│   │   └── xxxx_create_employees_table.php
│   └── seeders/
│       └── EmployeeSeeder.php           ← Sample employee data
├── routes/
│   └── api.php                          ← API route definitions
└── config/
    └── cors.php                         ← CORS configuration
```

---

## ⚙️ Local Setup

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8+

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/employee-app.git
cd employee-app/backend
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Configure Environment
```bash
cp .env.example .env
```

Edit `.env` with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Create Database
```sql
CREATE DATABASE employee_db;
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Seed Sample Data
```bash
php artisan db:seed --class=EmployeeSeeder
```

### 8. Start the Server
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

---

## 📡 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/employees` | Returns all employees |
| GET | `/api/employees/{id}` | Returns a single employee |

### Sample Response — `GET /api/employees`

```json
{
  "success": true,
  "total": 8,
  "data": [
    {
      "id": 1,
      "name": "Alice Johnson",
      "email": "alice@company.com",
      "department": "Engineering",
      "position": "Senior Dev",
      "joined_date": "2016-03-15",
      "status": "active",
      "years_of_service": 9,
      "is_flagged": true
    },
    {
      "id": 2,
      "name": "Frank Lee",
      "email": "frank@company.com",
      "department": "Finance",
      "position": "Accountant",
      "joined_date": "2021-09-01",
      "status": "active",
      "years_of_service": 3,
      "is_flagged": false
    }
  ]
}
```

---

## 🧠 Flagging Logic

The core business logic is handled in the `Employee` Eloquent Model using computed attributes. These are calculated at runtime using **Carbon** and automatically appended to every API response.

```php
// Calculates how many years since joining
public function getYearsOfServiceAttribute(): int
{
    return Carbon::parse($this->joined_date)->diffInYears(Carbon::now());
}

// Flagged = active status AND more than 5 years of service
public function getIsFlaggedAttribute(): bool
{
    return $this->status === 'active' && $this->years_of_service > 5;
}
```

> **Design Decision:** Logic lives in the Model (Fat Model, Thin Controller) so it is reusable, testable, and consistent across all API consumers.

---

## 🗄️ Database Schema

```
employees
├── id              INT (Primary Key, Auto Increment)
├── name            VARCHAR
├── email           VARCHAR (Unique)
├── department      VARCHAR
├── position        VARCHAR
├── joined_date     DATE
├── status          ENUM('active', 'inactive')
├── created_at      TIMESTAMP
└── updated_at      TIMESTAMP
```

---

## 🌱 Sample Data

| Name | Department | Joined | Status | Years | Flagged |
|------|-----------|--------|--------|-------|---------|
| Alice Johnson | Engineering | 2016-03-15 | active | 9 | ✅ Yes |
| Bob Smith | Design | 2019-07-22 | active | 5 | ❌ No |
| Carol White | HR | 2015-01-10 | active | 10 | ✅ Yes |
| David Brown | Engineering | 2018-11-05 | inactive | 6 | ❌ No |
| Eva Martinez | Marketing | 2014-06-30 | active | 11 | ✅ Yes |
| Frank Lee | Finance | 2021-09-01 | active | 3 | ❌ No |
| Grace Kim | Engineering | 2013-04-18 | active | 12 | ✅ Yes |
| Henry Wilson | Sales | 2017-12-20 | inactive | 7 | ❌ No |

---

## 📜 License
MIT
