# Testing Guide

This document provides comprehensive guidelines for testing the NEEPCO Asset Management System.

## Table of Contents
- [Test Environment Setup](#test-environment-setup)
- [Running Tests](#running-tests)
  - [Running All Tests](#running-all-tests)
  - [Running Specific Test Suites](#running-specific-test-suites)
  - [Running Individual Tests](#running-individual-tests)
  - [Test Coverage](#test-coverage)
- [Test Types](#test-types)
  - [Unit Tests](#unit-tests)
  - [Feature Tests](#feature-tests)
  - [Browser Tests](#browser-tests)
  - [API Tests](#api-tests)
- [Test Doubles](#test-doubles)
- [Testing Best Practices](#testing-best-practices)
- [Continuous Integration](#continuous-integration)
- [Troubleshooting](#troubleshooting)

## Test Environment Setup

### Prerequisites

- PHP 8.2+
- SQLite (for in-memory testing)
- Node.js 16+/18+ (for frontend testing)
- Xdebug (for code coverage reports)

### Configuration

1. Copy the testing environment file:
   ```bash
   cp .env.testing.example .env.testing
   ```

2. Configure your test environment (`.env.testing`):
   ```ini
   APP_ENV=testing
   APP_DEBUG=true
   APP_KEY=base64:glJpcM7BYwWiBggp3SQ/+NlRkqsBQMaGEOjemXqJzOU=
   APP_URL=http://localhost:8000
   
   # Use SQLite for faster tests
   DB_CONNECTION=sqlite
   DB_DATABASE=:memory:
   
   # Or use MySQL for more accurate integration tests
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=neepco_ams_test
   # DB_USERNAME=root
   # DB_PASSWORD=
   
   # Use array or null driver for testing
   CACHE_DRIVER=array
   SESSION_DRIVER=array
   QUEUE_CONNECTION=sync
   
   # Disable external services
   MAIL_MAILER=log
   
   # Testing specific settings
   TEST_TOKEN=test_token_123
   ```

## Running Tests

### Running All Tests

```bash
# Run all tests
php artisan test

# Run tests with coverage report (requires Xdebug or PCOV)
XDEBUG_MODE=coverage php artisan test --coverage-html=coverage
```

### Running Specific Test Suites

```bash
# Run only unit tests
php artisan test --testsuite=Unit

# Run only feature tests
php artisan test --testsuite=Feature

# Run only browser tests
php artisan test --testsuite=Browser
```

### Running Individual Tests

```bash
# Run a specific test file
php artisan test tests/Feature/UserTest.php

# Run a specific test method
php artisan test --filter=test_user_creation

# Run tests with a specific group
php artisan test --group=slow
```

### Test Coverage

To generate a code coverage report:

```bash
# HTML report
XDEBUG_MODE=coverage php artisan test --coverage-html=coverage

# Console summary
XDEBUG_MODE=coverage php artisan test --coverage-text

# Clover XML (for CI/CD)
XDEBUG_MODE=coverage php artisan test --coverage-clover=coverage.xml
```

## Test Types

### Unit Tests

- Location: `tests/Unit`
- Purpose: Test individual classes and methods in isolation
- Best for: Business logic, services, models
- Example:
  ```php
  public function test_user_full_name()
  {
      $user = new User([
          'first_name' => 'Admin',
          'last_name' => 'User'
      ]);
      
      $this->assertEquals('Admin User', $user->full_name);
  }
  ```

### Feature Tests

- Location: `tests/Feature`
- Purpose: Test complete features and their interactions
- Best for: Controllers, routes, and feature integration
- Example:
  ```php
  public function test_user_can_see_dashboard()
  {
      $user = User::factory()->create();
      
      $response = $this->actingAs($user)
                       ->get('/dashboard');
                       
      $response->assertStatus(200)
               ->assertSee('Dashboard');
  }
  ```

### Browser Tests

- Location: `tests/Browser`
- Purpose: Test JavaScript interactions and frontend behavior
- Requires: Laravel Dusk
- Example:
  ```php
  public function test_user_can_login()
  {
      $user = User::factory()->create([
          'email' => 'test@example.com',
      ]);

      $this->browse(function (Browser $browser) use ($user) {
          $browser->visit('/login')
                 ->type('email', $user->email)
                 ->type('password', 'password')
                 ->press('Login')
                 ->assertPathIs('/dashboard');
      });
  }
  ```

### API Tests

- Location: `tests/Feature/Api`
- Purpose: Test API endpoints
- Example:
  ```php
  public function test_can_create_asset()
  {
      $user = User::factory()->create();
      
      $response = $this->actingAs($user, 'api')
                      ->postJson('/api/assets', [
                          'name' => 'Test Asset',
                          'serial' => '12345',
                          'category_id' => 1
                      ]);
                      
      $response->assertStatus(201)
               ->assertJson(['name' => 'Test Asset']);
  }
  ```

## Test Doubles

### Model Factories

Define test data using Laravel's model factories:

```php
// In UserFactory.php
public function definition()
{
    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
}

// In test
$user = User::factory()->create();
$users = User::factory()->count(3)->create();
```

### Mocks and Stubs

Use Mockery for mocking dependencies:

```php
public function test_sends_notification()
{
    $mock = $this->mock(NotificationService::class);
    
    $mock->shouldReceive('send')
         ->once()
         ->with($user, 'Welcome!');
         
    // Test code that should trigger the notification
    $this->app->instance(NotificationService::class, $mock);
    
    $user->sendWelcomeNotification();
}
```

## Testing Best Practices

1. **Test Naming**
   - Use descriptive test names
   - Follow the `test_method_should_do_something_when_condition` pattern
   - Group related tests with `@group` annotations

2. **Test Data**
   - Use factories for test data
   - Clean up after tests using `RefreshDatabase` or `DatabaseMigrations`
   - Use `withoutExceptionHandling()` for debugging

3. **Assertions**
   - Be specific with assertions
   - Test edge cases
   - Test both success and failure paths

4. **Performance**
   - Use SQLite in-memory for faster tests
   - Run tests in parallel when possible
   - Mock external services

## Continuous Integration

### GitHub Actions

Example workflow (`.github/workflows/tests.yml`):

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    
    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: password
          MYSQL_DATABASE: neepco_ams_test
        ports:
          - 3306:3306
        options: --health-cmd="mysqladmin ping" --health-interval=10s --health-timeout=5s --health-retries=3
    
    steps:
      - uses: actions/checkout@v3
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: dom, curl, libxml, mbstring, zip, pdo, mysql, sqlite, xml, ctype, json, bcmath, gd
          coverage: xdebug
      
      - name: Install Dependencies
        run: |
          composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
          npm ci
      
      - name: Generate key
        run: php artisan key:generate
        
      - name: Directory Permissions
        run: chmod -R 777 storage bootstrap/cache
        
      - name: Execute tests
        env:
          DB_CONNECTION: mysql
          DB_HOST: 127.0.0.1
          DB_PORT: 3306
          DB_DATABASE: neepco_ams_test
          DB_USERNAME: root
          DB_PASSWORD: password
        run: |
          php artisan migrate:fresh --seed
          php artisan test --coverage-clover=coverage.xml
      
      - name: Upload coverage to Codecov
        uses: codecov/codecov-action@v3
        with:
          file: ./coverage.xml
          fail_ci_if_error: false
```

## Troubleshooting

### Common Issues

1. **SQLite Driver Not Found**
   ```bash
   sudo apt-get install php-sqlite3
   ```

2. **Memory Exhausted**
   ```ini
   ; In php.ini
   memory_limit = -1
   ```

3. **Slow Tests**
   - Use SQLite in-memory database
   - Run tests in parallel: `php artisan test --parallel`
   - Disable Xdebug for test runs

4. **Random Test Failures**
   - Use `$this->withoutExceptionHandling()` to see actual errors
   - Check for test dependencies
   - Ensure proper database cleanup

## Additional Resources

- [Laravel Testing Documentation](https://laravel.com/docs/testing)
- [PHPUnit Documentation](https://phpunit.readthedocs.io/)
- [Mockery Documentation](https://docs.mockery.io/)
- [Laravel Dusk Documentation](https://laravel.com/docs/dusk)
