# FitBuddy

FitBuddy is a web application designed to help users achieve their fitness goals, whether it is weight loss, weight gain, or maintaining a healthy lifestyle. The platform provides personalized training programs, nutrition advice, and progress tracking, all within an interactive and user-friendly interface. The application was developed for academic purpose.

## Features

- User registration and authentication
- Fitness programs for weight loss and weight gain
- Nutrition and dietary advice
- Progress tracking (weight, goals, etc.)
- Responsive and modern UI with Bootstrap and custom SCSS
- Video demonstrations for exercises

## Technologies Used

- Symfony (PHP framework)
- Doctrine ORM (database management)
- Twig (templating engine)
- Webpack Encore (asset management)
- Bootstrap, SCSS, and custom styles
- JavaScript for interactivity

## Installation

1. **Clone the repository**
   ```sh
   git clone <repository-url>
   cd FitBuddy
   ```

2. **Install PHP dependencies**
   ```sh
   composer install
   ```

3. **Install JavaScript dependencies**
   ```sh
   npm install
   # or
   yarn install
   ```

4. **Configure environment variables**
   - Copy `.env` to `.env.local` and set your database credentials and other environment settings.

5. **Run database migrations**
   ```sh
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

6. **Build assets**
   ```sh
   npm run dev
   # or
   yarn dev
   ```

7. **Start the Symfony server**
   ```sh
   symfony server:start
   # or
   php -S localhost:8000 -t public
   ```

8. **Access the application**
   - Open your browser and go to `http://localhost:8000`

## Usage

- Register a new account or log in.
- Choose your fitness goal (weight loss, weight gain, etc.).
- Follow the personalized program and track your progress.
- Access video demonstrations and nutrition tips.

## License

This project is for educational and demonstration purposes.
