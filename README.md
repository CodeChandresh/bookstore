# REST API Book Store

This is a bare-bones example of a Sinatra application providing a REST
API to a DataMapper-backed model.

## Install
    Install Git:

    Install Git on your local machine if you don't have it already.

    Clone the repository:

    Open a terminal and navigate to the directory where you want to clone the repository.
    Run the following command to clone the repository:
    git clone https://github.com/user/repository_name.git

    Navigate to the project directory:

    Change into the newly cloned directory using the following command:
    cd repository_name

    Install the dependencies:

    Run the following command to install the dependencies required for the Laravel project:
    composer install

    If the project uses NPM for managing its front-end dependencies, run the following command to install those dependencies:
    npm install

    Set up the environment:

    Copy the example environment file using the following command:
    cp .env.example .env

    Open the .env file in a text editor and set up the environment variables as required.

    Update Elastic Search data in .env file

    ELASTICSEARCH_HOST=
    ELASTICSEARCH_INDEX=
    ELASTICSEARCH_INDEX_TYPE=

    Generate an application key:

    Run the following command to generate an application key for the Laravel project:
    php artisan key:generate

    Run the Migration:

    Run the following command to run the migration and create the table in the database:
    php artisan migrate

    Serve the Laravel application:

    Run the following command to start the Laravel development server:

    php artisan serve

    Register User
    goto {Hosted Link}/admin/register link and create admin user

    Login User 
     goto {Hosted Link}/admin/login and fill form 

# INSTALL E
    Elasticsearch is a distributed, open-source search and analytics engine that can be integrated with Laravel to provide powerful search functionality to your application. Here are the steps to integrate Elasticsearch with Laravel:  

    Install Elasticsearch:

    You can install Elasticsearch on your local machine by following the instructions on the official website.  

        Configure Elasticsearch in Laravel:

    Add the following code to the config/elasticsearch.php file to configure Elasticsearch in Laravel: 
# REST API

The REST API to the Book Store is described below.

## Seach book by attributes like title, author, publication date, isbn, genre 

### Request

`POST /api/books/search/`

    curl --location --request POST 'http://localhost:8000/api/books/search/' \
    --header 'Content-Type: application/json' \
    --data-raw '{
        "keyword":"Allan"
    }'

### Response
   
    {
        "books": [
            {
                "image": "http://placeimg.com/480/640/any",
                "author": "Allan Weimann",
                "isbn": "9782207975428",
                "genre": "A",
                "publisher": "Reiciendis Quod",
                "id": 24,
                "title": "And how odd the."
            }
        ]
    }
