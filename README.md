# Laravel High School Management System (ERP)

A comprehensive High School Management System built with Laravel to streamline administrative and academic processes.

---

## Installation:
1. Clone the Repository

    ```bash
    git clone git@github.com:AlexAaqil/hsms.git
    ```

2. Install the dependencies
    ```bash
    composer install && npm install
    ```

3. Set up the Environment file
    ```bash
    cp .env.example .env
    ```

4. Generate the application key variable for the .env file
    ```bash
    php artisan key:generate
    ```

5. Run the migrations
    ```bash
    php artisan migrate
    ```

## Usage
1. Start the local development server
    ```bash
    php artisan serve
    ```

2. Open your browser and navigate to the following address
    ```arduino
    http://localhost:8000
    ```

## Version
- Laravel v11.5.0 
- PHP v8.3.2
