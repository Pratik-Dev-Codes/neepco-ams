# Contributing to NEEPCO AMS

We appreciate your interest in contributing to the NEEPCO Asset Management System! This document will guide you through the contribution process.

## Table of Contents
- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Workflow](#development-workflow)
- [Code Style](#code-style)
- [Commit Guidelines](#commit-guidelines)
- [Pull Request Process](#pull-request-process)
- [Reporting Issues](#reporting-issues)
- [Feature Requests](#feature-requests)
- [License](#license)

## Code of Conduct

This project adheres to the [Contributor Covenant Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code.

## Getting Started

1. **Fork the repository** on GitHub
2. **Clone your fork** locally:
   ```bash
   git clone git@github.com:your-username/neepco-ams.git
   cd neepco-ams
   ```
3. **Add the upstream repository**:
   ```bash
   git remote add upstream git@github.com:Pratik-Dev-Codes/neepco-ams.git
   ```
4. **Create a feature branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```

## Development Workflow

1. **Sync with upstream**:
   ```bash
   git fetch upstream
   git rebase upstream/main
   ```
2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Run tests**:
   ```bash
   php artisan test
   ```
4. **Start the development server**:
   ```bash
   php artisan serve
   ```

## Code Style

- Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard
- Use PHP_CodeSniffer for code style validation:
  ```bash
  composer check-style  # Check for style violations
  composer fix-style   # Fix style violations
  ```
- Write tests for new features and bug fixes
- Keep the code DRY (Don't Repeat Yourself)

## Commit Guidelines

We follow [Conventional Commits](https://www.conventionalcommits.org/) for our commit messages:

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

### Commit Types

- **feat**: A new feature
- **fix**: A bug fix
- **docs**: Documentation only changes
- **style**: Changes that do not affect the meaning of the code
- **refactor**: A code change that neither fixes a bug nor adds a feature
- **perf**: A code change that improves performance
- **test**: Adding missing tests or correcting existing tests
- **chore**: Changes to the build process or auxiliary tools

### Examples

```
feat(auth): add password reset functionality

Add password reset functionality with email verification

Closes #123
```

## Pull Request Process

1. Ensure your code passes all tests
2. Update the documentation if needed
3. Run the test suite and ensure all tests pass
4. Create a Pull Request with a clear description of the changes
5. Reference any related issues in your PR description
6. Ensure your PR has exactly one commit (use `git rebase` if needed)

## Reporting Issues

When creating an issue, please include:

- A clear title and description
- Steps to reproduce the issue
- Expected vs actual behavior
- Screenshots if applicable
- Your environment (PHP version, Laravel version, etc.)

## Feature Requests

We welcome feature requests! Please:

1. Check if a similar feature request already exists
2. Clearly describe the feature and its benefits
3. Include any relevant use cases

## License

By contributing, you agree that your contributions will be licensed under the [MIT License](LICENSE).
