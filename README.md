# Laravel Inventory System
##### Danyell Noe / Sample Code Application

[![Danyell Noe](https://avatars3.githubusercontent.com/u/12405298?s=100&u=32ac14e48283c20dcc4a36bb2cadf9808eb70884&v=4)](https://danyellnoe.com/)

This software was built by **Danyell Noe** to be used for evaluation of my programming style, technique and expertise.
The exercise was a timed coding challenge presented to me while interviewing with a software development firm.  

The requirements were as follows:

> Use Laravel and Vue.js to create a system that catalogs items in a store. The store sells all kinds of goods (movies, books, foodstuffs, etc), and needs to keep track of current inventory, pricing, and any items which are on layaway. Additionally, each item should have a category to determine which area of the store it's located in.
>
> When the application is complete it will do the following:
> - Show a listing of the current items in the store, along with their price and related comments. 
> - Have the ability to add a new item to the store. 
> - Will allow comments to be added to any store item (user authentication is not required). 
> - At least one of these interactions should use Vue.js 
> - Use Bootstrap or Tailwind so that pages look clean and balanced. 

The resulting software was developed over the course of a weekend with an estimated 15-20 hours of total time committed, 
including the time it took to set up the project via Homestead.  It is a very simple application that longs for many 
improvements, but it should give you a fairly good idea of the kind of output you can expect from me.  It was a good
challenge inasmuch as it required me to balance robustness of the software with a severe time constraint while still 
achieving the ultimate goal of showing off some of my knowledge and development capabilities.

Feel free to reach out with any questions, comments or critiques!

# Functionality

  - Shows a list of products and some common attributes
  - Products are searchable and sortable within a paginated table
  - Ability to add a new product to the existing inventory
  - Ability to review existing comments for each product
  - Ability to add new comments to products

# Tech

For this project, I used the following baseline software:
* [Laravel]
* [Bootstrap]
* [Vue.js]
* [jQuery]
* [Node.js]
* [NPM]
* [Composer]

I also leveraged these excellent tools:
* [Laravel Money] - Package by Ricardo Gobbo de Souza for working with and formatting money in Laravel projects.
* [Vue Currency Input] - Package by Matthias Stiller for easy input of currency formatted numbers for Vue.js.
* [DataTables] - A powerful jQuery plugin for creating table listings and adding interactions to them.
* [Dillinger] - Online tool for creating README files in markdown.

# Installation

This project was built on a Windows machine using [Oracle VirtualBox](https://www.virtualbox.org/) to host the latest version of [Laravel Homestead](https://laravel.com/docs/8.x/homestead).  These directions will provide the steps needed to run the application in that environment.

I installed Laravel in `~/code/inventory`, so the instructions that follow will reference that folder.  I won't go into the details of configuring the local environment or **NGINX** configurations, etc. as I am sure you have your own process in place.

After checking out the code from the [GitHub repo](https://github.com/danyellnoe/inventory), perform the following steps:

#### Update the .env file
The following custom environment variables should be updated / added:
```
APP_NAME="Laravel Inventory System"
APP_URL=http://inventory.test
MIX_CURRENCY_LOCALE=en_US
MIX_CURRENCY=USD
MIX_API_BASEURL="${APP_URL}"
```

#### Install  dependencies

```sh
$ cd ~/code/inventory
$ composer install
$ npm i
```

#### Run migrations and seeders

```sh
$ php artisan migrate --seed
```

# Explore!
That should be enough to get you up and running!

#### The application itself isn't very exciting, but here are some things to check out in the code:

  - **Migrations**, **seeders** and **model factories** for database creation and seeding
  - **Model relationships:** one-to-one, one-to-many, has-many-through
  - **Custom view setup** to facilitate convenient and compartmentalized JS / CSS customizations on a *per-template* basis.
    - The main layout file (_/resources/views/layouts/app.blade.php_) includes the **_styles.blade.php** and **_js.blade.php** partials
    - The **_styles** partial:
      - Includes the application-wide CSS file (*app.css*), compiled by **Laravel Mix**
      - Checks for and loads any custom CSS that should be included *for the specific view being rendered*
      - These styles are included just before the *</head>* tag
    - The **_js** partial:
      - Includes the application-wide JS file (*app.js*), compiled by **NPM**
      - Checks for and includes any custom JS that should be included *for the specific view being rendered*
      - Checks for and includes any JS scripts that should be loaded *for the specific view being rendered*
      - The JS is included just before the *</body>* tag
    - The **AppServiceProvider** includes a custom convenience function **_makeViewNamesAvailableGlobally()**, which:
      - Leverages a global view composer to share variables containing information about the *current view name* to all views
     * This setup allows for automatic inclusion of these JS/CSS view partials based on file name / location by:
        - Checking for a *partials* subdirectories beneath the current view's directory (in */resources/views*)
          - If a */partials* directory exists:
            - Checks for a file named *_ js_ {viewName}.blade.php*
            - Checks for a file names *_ css_ {viewName}.blade.php*
            - Includes these files (if they exist) via the */layouts/app.blade.php* file

     **Example:**
     When *views/products/**index**.blade.php* is rendered via http://inventory.test/products, it will automatically include:
    - */resources/views/products/partials/_js_index.blade.php*
      - Pulls in DataTables via CDN
      - Adds custom jQuery handling for comments modals
    - *views/products/partials/_css_index.blade.php*
        - Pulls in DataTables CSS file
        - Adds custom styling to the "Add Product" form and styles the "+" button for adding a comment

    This is a technique that I came up *years ago* and, while I'm sure there are better approaches these days to compartmentalizing JS and CSS on a per-view basis these days, I think this is a creative solution that shows "out of the box" thinking.
    
  - **Vue**-based form for adding a **Product**
    - Use of [vue-currency-input](https://www.npmjs.com/package/vue-currency-input) plugin for formatting price input field
    - Leverages [axios](https://www.npmjs.com/package/axios) package for form submission to API endpoint
    - **Laravel Mix** environment variables
  - Dynamic **Products** display table leverages the [DataTables](https://datatables.net/) jQuery plugin for search & custom sort functionality
  - **Comments** are added using a [Bootstrap modal plugin](https://getbootstrap.com/docs/4.5/components/modal/) and custom form handling via **jQuery**
  - Leverages the [Laravel Money](https://github.com/cknow/laravel-money) package to provide the *formatted_price* custom accessor in the **Product** model
  - Custom **Alert** component created and included in the application's **Blade** layout, used for displaying flash messages application-wide

------------

If you have any questions, feel free to reach out to me directly at me@danyellnoe.com

------------

   [Laravel]: <https://laravel.com>
   [Vue.js]: <https://vuejs.org/>
   [Vue Currency Input]: <https://dm4t2.github.io/vue-currency-input/>
   [Laravel Money]: <http://moneyphp.org/>
   [composer]: <https://getcomposer.org/>
   [node.js]: <http://nodejs.org>
   [NPM]: <https://www.npmjs.com/>
   [jQuery]: <http://jquery.com>
   [Bootstrap]: <https://getbootstrap.com/>
   [DataTables]: <https://datatables.net/>
   [Dillinger]: <https://dillinger.io/>
