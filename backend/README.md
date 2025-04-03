# Backend News Portal API

This is the backend for the News Portal website, built using Node.js, Express, and MySQL. This API serves news articles and handles user authentication.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Security Features](#security-features)
- [License](#license)

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd news-portal-website/backend
   ```

2. Install the dependencies:
   ```
   npm install
   ```

3. Create a `.env` file in the backend directory and add your environment variables:
   ```
   DB_HOST=your_database_host
   DB_USER=your_database_user
   DB_PASSWORD=your_database_password
   DB_NAME=your_database_name
   NEWS_API_KEY=your_news_api_key
   ```

4. Run the application:
   ```
   node src/app.js
   ```

## Usage

The backend API is now running on `http://localhost:3000`. You can use tools like Postman or curl to interact with the API endpoints.

## API Endpoints

- `GET /api/news` - Retrieve all news articles.
- `GET /api/news/:id` - Retrieve a specific news article by ID.
- `POST /api/news` - Create a new news article (requires authentication).

## Security Features

- **SSL/TLS**: Ensure that your server is configured to use HTTPS for secure communication.
- **OAuth 2.0**: User authentication is handled using OAuth 2.0 for secure access to the API.
- **Firewall Protection**: Implement firewall rules to restrict access to the server.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.