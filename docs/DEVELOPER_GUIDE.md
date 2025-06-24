# NEEPCO AMS Developer Guide

Welcome to the NEEPCO Asset Management System Developer Guide. This document provides information for developers working on the NEEPCO AMS project.

## Table of Contents
- [Development Environment](#development-environment)
- [Project Structure](#project-structure)
- [Coding Standards](#coding-standards)
- [API Development](#api-development)
- [Testing](#testing)
- [Deployment](#deployment)
- [Contribution Guidelines](#contribution-guidelines)

## Development Environment

### Prerequisites
- PHP 8.2+
- Composer 2.0+
- Node.js 16.x+
- MySQL 8.0+ or MariaDB 10.4+
- Redis (for caching and queues)

### Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/Pratik-Dev-Codes/neepco-ams.git
   cd neepco-ams
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install NPM dependencies:
   ```bash
   npm install
   ```

4. Configure environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Set up the database and run migrations:
   ```bash
   php artisan migrate --seed
   ```

6. Start the development server:
   ```bash
   php artisan serve
   ```

## Project Structure

```
app/
├── Console/          # Artisan commands
├── Exceptions/       # Exception handlers
├── Http/
│   ├── Controllers/ # Application controllers
│   ├── Middleware/   # HTTP middleware
│   └── Requests/     # Form requests
├── Models/           # Eloquent models
├── Policies/         # Authorization policies
└── Services/         # Business logic

config/               # Configuration files
database/
├── factories/       # Model factories
├── migrations/       # Database migrations
└── seeders/         # Database seeders

public/              # Publicly accessible files
resources/
├── js/             # JavaScript files
├── lang/            # Language files
├── sass/            # SASS stylesheets
└── views/           # Blade templates

routes/              # Application routes
tests/               # Test files
```

## Coding Standards

### PHP
- Follow PSR-12 coding standard
- Use type hints and return type declarations
- Write PHPDoc blocks for all classes and methods
- Follow Laravel's naming conventions

### JavaScript
- Use ES6+ syntax
- Follow Airbnb JavaScript Style Guide
- Use PascalCase for component names
- Use camelCase for variables and functions

### Git Workflow

1. Create a new branch for each feature/bugfix:
   ```bash
   git checkout -b feature/feature-name
   ```

2. Make your changes and commit with a descriptive message:
   ```bash
   git commit -m "Add user authentication feature"
   ```

3. Push your changes to the remote repository:
   ```bash
   git push origin feature/feature-name
   ```

4. Create a pull request to the `main` branch

## API Development

### Creating New Endpoints
1. Define the route in `routes/api.php`
2. Create a new controller or use an existing one
3. Add validation using Form Requests
4. Implement the business logic in a Service class
5. Return a JSON response

### API Versioning
- All API endpoints are versioned (e.g., `/api/v1/...`)
- Update the version number for breaking changes
- Document all changes in the API changelog

## Testing

To get started with NEEPCO AMS, please refer to our comprehensive [Testing Guide](./TESTING.md) which includes:

### Running Tests
```bash
# Run all tests
composer test

# Run specific test file
php artisan test tests/Feature/ExampleTest.php

# Run tests with coverage
composer test-coverage
```

### Writing Tests
- Write tests for all new features
- Follow the "Arrange-Act-Assert" pattern
- Use factories to create test data
- Test both success and failure cases

## Deployment

### Staging Deployment
```bash
# Pull the latest changes
git pull origin staging

# Install dependencies
composer install --no-dev --optimize-autoloader
npm install --production

# Build assets
npm run prod

# Run migrations
php artisan migrate --force

# Clear caches
php artisan optimize
```

### Production Deployment
- Use a deployment tool like Envoyer or Deployer
- Set up queue workers and task scheduling
- Monitor application performance
- Set up error tracking

## Contribution Guidelines

### Reporting Issues
- Check if the issue already exists
- Provide detailed steps to reproduce
- Include error messages and screenshots if applicable

### Submitting Pull Requests
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Write tests for your changes
5. Submit a pull request with a clear description

### Code Review Process
- All PRs require at least one approval
- Code must pass all tests
- Follow the established coding standards
- Update documentation if necessary
