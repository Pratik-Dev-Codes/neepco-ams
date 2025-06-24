# Installation Guide

This guide provides detailed instructions for setting up the NEEPCO Asset Management System in various environments.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Quick Start](#quick-start)
  - [Local Development](#local-development)
  - [Production Deployment](#production-deployment)
- [Configuration](#configuration)
  - [Environment Variables](#environment-variables)
  - [Database Setup](#database-setup)
  - [Queue Workers](#queue-workers)
  - [Scheduled Tasks](#scheduled-tasks)
- [Troubleshooting](#troubleshooting)
- [Upgrading](#upgrading)

## Prerequisites

### Server Requirements

- **PHP 8.2+** with the following extensions:
  - BCMath
  - Ctype
  - cURL
  - DOM
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML
  - ZIP
  - GD Library (for image processing)
  - Imagick (recommended for better image handling)

- **Database**:
  - MySQL 5.7+ or MariaDB 10.3+
  - SQLite (for development only)
  - PostgreSQL 10+ (optional)

- **Web Server**:
  - Apache / Nginx
  - Or built-in PHP development server (for development only)

- **Node.js** 16.x / 18.x
- **Composer** 2.0+
- **Redis** (recommended for caching and queues)
- **Supervisor** (recommended for queue workers in production)

### Development Tools (Optional but Recommended)

- Git
- PHP_CodeSniffer
- Xdebug
- MySQL Workbench / TablePlus / DBeaver

## Quick Start

### Local Development

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Pratik-Dev-Codes/neepco-ams.git
   cd neepco-ams
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install --prefer-dist --optimize-autoloader --no-interaction
   ```

3. **Install NPM dependencies**:
   ```bash
   npm install
   ```

4. **Setup environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your environment** (edit `.env`):
   ```ini
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost:8000
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=neepco_ams
   DB_USERNAME=root
   DB_PASSWORD=
   
   MAIL_MAILER=log
   ```

6. **Setup database**:
   ```bash
   php artisan migrate --seed
   ```

7. **Build assets**:
   ```bash
   npm run dev
   # or for production:
   # npm run prod
   ```

8. **Start the development server**:
   ```bash
   php artisan serve
   ```

9. **Access the application**:
   - URL: http://localhost:8000
   - Admin: `admin@example.com` / `password`

### Production Deployment

1. **Server Preparation**:
   ```bash
   # Install required PHP extensions
   sudo apt-get update
   sudo apt-get install -y php8.2 php8.2-{bcmath,cli,common,curl,mbstring,xml,zip,gd,mysql}
   
   # Install Composer
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   
   # Install Node.js & npm
   curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
   sudo apt-get install -y nodejs
   ```

2. **Deploy the application**:
   ```bash
   # Clone the repository
   git clone https://github.com/Pratik-Dev-Codes/neepco-ams.git /var/www/neepco-ams
   cd /var/www/neepco-ams
   
   # Install dependencies
   composer install --prefer-dist --optimize-autoloader --no-interaction --no-dev
   npm install --production
   
   # Build assets
   npm run prod
   
   # Set permissions
   sudo chown -R www-data:www-data /var/www/neepco-ams
   sudo chmod -R 755 /var/www/neepco-ams/storage
   sudo chmod -R 755 /var/www/neepco-ams/bootstrap/cache
   ```

3. **Configure environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   # Edit .env with production values
   ```

4. **Setup database**:
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=ProductionSeeder
   ```

5. **Configure queue workers** (using Supervisor):
   ```ini
   [program:neepco-ams-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /var/www/neepco-ams/artisan queue:work --sleep=3 --tries=3 --max-time=3600
   autostart=true
   autorestart=true
   stopasgroup=true
   killasgroup=true
   user=www-data
   numprocs=8
   redirect_stderr=true
   stdout_logfile=/var/www/neepco-ams/storage/logs/worker.log
   ```

## Configuration

### Environment Variables

| Variable | Required | Description |
|----------|----------|-------------|
| `APP_ENV` | Yes | Application environment (`local`, `staging`, `production`) |
| `APP_DEBUG` | Yes | Enable/disable debug mode |
| `APP_URL` | Yes | Application URL |
| `DB_*` | Yes | Database connection settings |
| `MAIL_*` | No | Email configuration |
| `QUEUE_CONNECTION` | No | Queue driver (`sync`, `database`, `redis`) |
| `CACHE_DRIVER` | No | Cache driver (`file`, `redis`, `memcached`) |
| `SESSION_DRIVER` | No | Session driver (`file`, `database`, `redis`) |

### Database Setup

For production, it's recommended to use a managed database service or set up a dedicated database server. Ensure you:

1. Create a dedicated database user with appropriate permissions
2. Enable query caching
3. Set up regular backups
4. Configure proper character set and collation:
   ```sql
   CREATE DATABASE neepco_ams
   CHARACTER SET utf8mb4
   COLLATE utf8mb4_unicode_ci;
   ```

### Queue Workers

For better performance, configure queue workers to handle background jobs:

1. Set `QUEUE_CONNECTION=database` or `redis` in `.env`
2. Install and configure Supervisor
3. Start the queue worker:
   ```bash
   php artisan queue:work --tries=3 --timeout=120
   ```

### Scheduled Tasks

Set up a cron job to run the Laravel scheduler:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Support

For additional help, please [open an issue](https://github.com/Pratik-Dev-Codes/neepco-ams/issues) on GitHub.
