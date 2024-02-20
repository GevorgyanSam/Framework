<?php

/**
 * Outputs formatted content for debugging purposes using print_r.
 *
 * @param mixed $value
 * @return void
 */
if (!function_exists("dump")) {
    function dump(mixed $value): void
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
}

/**
 * Outputs formatted content for debugging purposes using print_r and terminates the script.
 *
 * @param mixed $value
 * @return void
 */
if (!function_exists("dd")) {
    function dd(mixed $value): void
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        die();
    }
}

/**
 * Outputs formatted content for debugging purposes using var_dump.
 *
 * @param mixed $value
 * @return void
 */
if (!function_exists("dumpd")) {
    function dumpd(mixed $value): void
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
    }
}

/**
 * Outputs formatted content for debugging purposes using var_dump and terminates the script.
 *
 * @param mixed $value
 * @return void
 */
if (!function_exists("ddd")) {
    function ddd(mixed $value): void
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }
}

/**
 * Sets HTTP response code and terminates the script.
 *
 * @param int $code
 * @return void
 */
if (!function_exists("abort")) {
    function abort(int $code = 404): void
    {
        http_response_code($code);
        die();
    }
}

/**
 * Gets the base path for the application and appends the provided path.
 *
 * @param string $path
 * @return string
 */
if (!function_exists("base_path")) {
    function base_path(string $path = ""): string
    {
        return __DIR__ . "/../../../" . $path;
    }
}

/**
 * Renders a view by including the corresponding view file and passing variables.
 *
 * @param string $path
 * @param array $vars
 * @return void
 */
if (!function_exists("view")) {
    function view(string $path, array $vars): void
    {
        extract($vars);
        require base_path("resources/views/{$path}.view.php");
    }
}

/**
 * Gets the value of the specified environment variable or returns a default value.
 *
 * @param string $name
 * @param string $default
 * @return string
 */
if (!function_exists("env")) {
    function env(string $name, string $default = ""): string
    {
        $name = strtoupper($name);
        return $_ENV["{$name}"] ?? $default;
    }
}

/**
 * Displays information about a command.
 *
 * @param string $command
 * @return void
 */
if (!function_exists("wrap")) {
    function wrap(string $command): void
    {
        echo "| " . $command::$command . " | " . $command::$description . " |" . PHP_EOL;
    }
}
