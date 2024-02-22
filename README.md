# Framework

Framework is a lightweight and flexible PHP framework designed to streamline the development of web applications. It provides a solid foundation with a set of powerful features to help you build robust and scalable applications quickly and efficiently.

## Key Features

- **MVC Architecture:** Follows the Model-View-Controller architectural pattern for better organization and separation of concerns.
- **Routing System:** A simple and intuitive routing system to map URLs to controller actions.
- **Middleware:** Middleware support for executing code.
- **Service Container:** A simplified dependency injection container for managing class dependencies.
- **Simplified Console Commands:** CLI tools for easy management and scaffolding of your application.
- **Providers:** Easy-to-use providers for integrating additional functionality into your application.
- **Manage Database:** Create and drop tables by using query builders and use them by CLI tool.
- **Models:** Simplified ORM for defining and interacting with database models.

## Getting Started

To get started with Framework, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/GevorgyanSam/Framework.git

2. Navigate to the project directory:
   ```bash
   cd ./Framework

3. Setup your .env file:
   ```bash
   cp .env.example .env

4. Install dependencies using Composer:
   ```bash
   composer install

5. Start the server:
   ```bash
   php artisan serve

Your application is now running! Visit http://localhost:8000 in your web browser to see it in action.