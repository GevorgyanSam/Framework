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
   cd ./Framework/docker
   
3. Build containers:
   ```bash
   docker-compose up -d --build

4. Build application:
   ```bash
   docker-compose exec app composer install
   docker-compose exec app cp .env.example .env
   ```

Your application is now running! Visit http://localhost:8080 in your web browser to see it in action.
