# News Portal Website

## Overview
This project is a news portal website that provides users with the latest news articles. It consists of a frontend built with HTML5, CSS3, JavaScript, and Bootstrap, and a backend developed using Node.js with a MySQL database. The application integrates with the News API to fetch news articles and implements security features such as SSL/TLS, OAuth 2.0, and firewall protection.

## Project Structure
The project is organized into the following directories:

- **backend**: Contains the server-side code, including routes, controllers, models, and middleware.
- **frontend**: Contains the client-side code, including HTML, CSS, and JavaScript files.
- **database**: Contains the SQL schema for the MySQL database.

## Features
- Fetches news articles from the News API.
- User authentication using OAuth 2.0.
- Responsive design using Bootstrap.
- Secure communication with SSL/TLS.
- Firewall protection for the backend.

## Getting Started

### Prerequisites
- Node.js
- MySQL
- npm

### Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd news-portal-website
   ```

2. Set up the backend:
   - Navigate to the backend directory:
     ```
     cd backend
     ```
   - Install dependencies:
     ```
     npm install
     ```
   - Create a `.env` file and add your database connection details and API keys.

3. Set up the database:
   - Run the SQL schema in your MySQL database:
     ```
     mysql -u <username> -p < database/schema.sql
     ```

4. Start the backend server:
   ```
   node src/app.js
   ```

5. Set up the frontend:
   - Navigate to the frontend directory:
     ```
     cd ../frontend
     ```

6. Open `index.html` in your web browser to view the application.

## Usage
- Users can view the latest news articles on the homepage.
- Users can authenticate using OAuth 2.0 to access additional features.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any suggestions or improvements.

## License
This project is licensed under the MIT License.