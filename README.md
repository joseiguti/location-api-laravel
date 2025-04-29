# Location API - Laravel Backend

## Project Architecture

This project consists of a simple REST API developed with Laravel that exposes a single endpoint `/api/locations`, protected by API Key authentication.

Includes:

- Laravel 10 Framework.
- SQLite database.
- `Location` model.
- Initial database seeding (Seeder).
- Custom middleware to validate API Key.
- API unit testing.
- Code quality tools: Laravel Pint and PHPStan.

---

## Prerequisites

- PHP 8.1 or higher
- Composer 2
- SQLite (or basic file system support)

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/joseiguti/location-api-laravel.git
cd location-api-laravel
```

2. Install dependencies:

```bash
composer install
```

3. Create the database file:

```bash
touch database/database.sqlite
```

4. Copy the environment file:

```bash
cp .env.example .env
```

Edit `.env`:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=database.sqlite
API_KEY=123456
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Run migrations and seeders:

```bash
php artisan migrate --seed
```

### Resetting the Database (optional)

If you want to reset your database and re-run all seeders:

```bash
php artisan migrate:fresh --seed
```

This will drop all tables, run the migrations, and repopulate them with demo data.

---

## Running the Project

Start the development server:

```bash
php artisan serve
```

Default access:
```
http://127.0.0.1:8000
```

---

## Endpoints

### `GET /api/locations`

- **Description**: Returns the list of locations.
- **Protection**: Requires a header `X-API-KEY: 123456`.

**Example with curl**:

```bash
curl -H "X-API-KEY: 123456" http://127.0.0.1:8000/api/locations
```

---

## Database Model

Table: `locations`

| Field         | Type        | Description                      |
|---------------|-------------|----------------------------------|
| id (code)     | bigint      | Unique identifier of the location |
| name          | string      | Name of the location             |
| image         | string      | URL of the representative image  |
| creation_date | date        | Creation date of the location    |
| timestamps    | timestamps  | Automatic creation and update timestamps |

---

## Endpoint Behavior

| Situation           | Result |
|---------------------|--------|
| Valid API Key       | 200 OK with list of locations |
| Missing or invalid API Key | 401 Unauthorized with error message |

---

## Unit Tests

The project includes an integration test:

Location:
```
tests/Feature/LocationApiTest.php
```

To run the tests:

```bash
php artisan test
```

Coverage:
- Validate successful response with API Key.
- Validate 401 error without API Key.

---

## Code Quality Tools

### Laravel Pint (Automatic Code Formatter)

Formats code according to PSR-12 standards.

```bash
./vendor/bin/pint
```

Automatically fixes style issues.

---

### PHPStan (Static Analysis)

Detects potential errors in the code before execution.

```bash
./vendor/bin/phpstan analyse app
```

Recommended analysis level: `--level=5`

---

## Conclusion

This backend adheres to fundamental best practices:
- Clean structure.
- Security via API Key authentication.
- Migratable database with seeders.
- Professionally formatted and validated code.
- Unit tests for critical endpoints.
