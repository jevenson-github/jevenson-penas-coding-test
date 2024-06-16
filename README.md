<a name="readme-top"></a>

<div align="center">
    <h3 align="center">Backend Developer coding test</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-test">About the test</a>
    </li>
    <li>
      <a href="#requirements">Requirements</a>
      <ul>
        <li><a href="#product-specifications">Product specifications</a></li>
        <li><a href="#api-requirements">API Requirements</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#bonus-points">Bonus points</a>
    </li>
    <li>
      <a href="#project-setup">Project Setup</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE TEST -->
## About the test

You're tasked to create a simple REST web service application for a fictional e-commerce business using Laravel.

You need to develop the following REST APIs:

* Products list
* Product detail
* Create product
* Update product
* Delete product

<!-- REQUIREMENTS -->
## Requirements

### Product specifications

A product needs to have the following information:

* Product name
* Product description
* Product price
* Created at
* Updated at

### API requirements

* Products list API
    * The products list API must be paginated.
* Create and Update product API
    * The product name, description, and price must be required.
    * The product name must accept a maximum of 255 characters.
    * The product price must be numeric in type and must accept up to two decimal places.
    * The created at and updated at fields must be in timestamp format.

Others:
* You are required to use MYSQL for the database storage in this test.
* You are free to use any library or component just as long as it can be installed using Composer.
* Don't forget to provide instructions on how to set the application up.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* Git
* Composer
* PHP ^8.0.2
* MySQL

### Installation

* Create a new repository under your account named `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Push your code to the new repository.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- BONUS POINTS -->
## Bonus points

#### For bonus points:

* Cache the response of the Product detail API. You are free to use any cache driver.
* Use the Service layer and Repository design patterns.
* Create automated tests for the app.

#### Answer the question below by updating this file.

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A: _Put your answer here_

<!-- PROJECT SETUP AND INSTRUCTION   --> 
## Project Setup

### After Cloning the Project 

After you clone this project there are some files that need to run your Laravel Application . 

### 1. Install Composer Dependencies

* Run the following command : 
    * *composer install* 

### 2. Setup the Environment ( .env )

* Duplicate the file :
    * Duplicate or copy the ( .env.example ) file.
* Rename the Copy : 
    * Rename the duplicated file to (.env ) . 

### 3. Generate Application Key 

* Run the following command : 
  *  *php artisan key: generate*

### 4. Install Node.js Dependencies if you are using JavaScript libraries or CSS ( Optional )

* Run the following command:
  * *npm install*
* Once the npm is installed , run the following command to compile JavaScript and CSS assets
  * *npm run dev*

### 5. Migrate Database
* Run the following command:
  * *php artisan migrate*

### 6. Launch the project

* Run the following command
  * *php artisan serve*
* Viewing the application 
   * Great! Now that you've installed all the necessary dependencies and the server is up and running, 
     you can access the web application by pasting the following URL into your browser: 
   * URL : *http://127.0.0.1:8000*
   * This will allow you to view and start your own modification in project.

### 7. Testing Environment 

*  Create separate testing file 
  * *copy and paste your .env file and rename the file to .env.testing*
*  Create separate database for testing 
  * rename your database in .env.testing.    
    DB_CONNECTION=mysql  
    DB_HOST=127.0.0.1  
    DB_PORT=3306  
    DB_DATABASE=laravel_testing  
    DB_USERNAME=root  
    DB_PASSWORD=  
* Migrate the testing database 
  * *php artisan migrate*
* Run test
  * *php artisan test*

<p align="right">(<a href="#readme-top">back to top</a>)</p>

