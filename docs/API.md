# NEEPCO AMS API Documentation

This document provides comprehensive information about the NEEPCO Asset Management System API.

## Base URL

All API endpoints are relative to the base URL of your installation (e.g., `https://your-domain.com/api`).

## Authentication

### Login

Authenticate and retrieve an access token.

```http
POST /api/auth/login
Content-Type: application/json

{
    "email": "admin@example.com",
    "password": "your_password"
}
```

**Response**

```json
{
    "token": "your_access_token",
    "user": {
        "id": 1,
        "name": "Admin User",
        "email": "admin@example.com",
        "role": "admin"
    }
}
```

## Assets

### Get All Assets

```http
GET /api/assets
Authorization: Bearer your_access_token
```

### Create New Asset

```http
POST /api/assets
Authorization: Bearer your_access_token
Content-Type: application/json

{
    "name": "Laptop XYZ",
    "asset_tag": "LAP-001",
    "model_id": 1,
    "status_id": 1,
    "assigned_to": 1
}
```

### Get Single Asset

```http
GET /api/assets/{id}
Authorization: Bearer your_access_token
```

## Users

### Get Current User

```http
GET /api/user
Authorization: Bearer your_access_token
```

## Error Handling

Errors follow the JSON:API specification:

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "field_name": ["The field name is required."]
    }
}
```

## Rate Limiting

API requests are limited to 60 requests per minute per IP address.

## Versioning

The current API version is v1. All endpoints are prefixed with `/api/v1/`.
