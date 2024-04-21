# Fashion-Shop

Responsive Fashion Shop website is an e-commerce site with Laravel 10.x.

## Getting Started

- Getting all the products from the database and showing them on our site with filtration by the category or brand to which they belong, ordered by created at, or its price.
- The user can add any product to his cart list and see the total price that is calculated by considering the quantity ordered, after adding the product to the cart list, the user can change the quantity ordered as he likes.
- The user can add any product to his wishlist and then add it to his cart list or choose to delete the product from his wishlist, all handled by the database.
- Use the Laravel/UI package.
- Handel authentication.
- Create a simple UI for users with HTML, CSS, JS, and Bootstrap.
- The site is responsive.
- Use Eloquent Factories to store fake data.

### Tools

- Laravel 10.x.
- HTML.
- CSS.
- JS.
- Bootstrap.

### Installing

A step by step series of examples that tell you how to get a development
environment running

clone Repository in your local pc

    git clone https://github.com/Breksam/Fashion-Shop.git 

run on your cmd or terminal

    composer install

copy .env.example file to .env on the root folder

    copy .env.example .env

then open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

open the terminal in the project then:

run

    php artisan key:generate
run

    php artisan migrate
run

    php artisan serve

## Running the tests

Now you can try the site locally on your browser.

open the terminal in the project then:

run

    php artisan serve


## Authors

  - **Breksam Hassan Elsokkary** - (https://github.com/Breksam)


