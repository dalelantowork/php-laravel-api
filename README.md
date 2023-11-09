## Setup Configuration

Do the following:

1. Create a new database named phptest and check the `.env` file.

   - update the `.env.example` for the DB_USERNAME and DB_PASSWORD

2. Run `composer install` and `composer dump-autoload` for the instalation of dependencies.

3. Run `php artisan migrate:fresh` to generate new tables with columns.

4. Run `php artisan artisan db:seed` to seed the tables News and Comments with the current database provided in DB.php.

5. Run `php artisan serve` and access the APIs on `http://localhost:8080` OR if you use laravel valet you can just run `valet link` instead.

## Coding Standard and Implementations

- **[SOLID Principles](https://medium.com/successivetech/s-o-l-i-d-the-first-5-principles-of-object-oriented-design-with-php-b6d2742c90d7)** must be observed at all times.

- All code written must be compliant to **[PSR](https://www.php-fig.org/psr/)** specifications

- When using namespaces, arrange them alphabetically for simpler and intuitive debugging.

- Whenever possible, follow the **[KISS Principle](https://en.wikipedia.org/wiki/KISS_principle)**.

- **MUST** adhere to these naming standards:
  - For Classes, Interfaces/Contracts, Traits: use `PascalCase`
  - For Constants: use `TITLE_CASE`
  - For Functions/Methods, Class Properties, Variables: use `camelCase`
  - For Array Indices/Database Field Names/Model Fillables/Model Relations: use `lower_snake_case`
  - For Routes: use `lower-kebab-case`
  - For File Names: use singular naming convention (news is a singular noun)

## Step by Step Explanation of Implementations

1. Created blank files for News and Comment

   - Migration in `database/migration`
     - where the database tables and columns are created, updated and deleted
   - Controller in `app/Http/Controllers`
     - where the functionalities are located - index, show, create, store, edit, update and destroy
   - Model in `app/Models`
     - where the tables are implemented as eloquent models
   - Request in `app/Http/Requests`
     - separated files based on routes (News, Comment)
     - where the validation for the payload/requests are implemented
   - Resources in `app/Http/Resources`
     - separated files based on routes (News, Comment)
     - where the resources(api response) are implemented
   - Factories in `database/migration`
     - separated files based on routes (News, Comment)
     - left blank for now, ready for scalability

2. Added News and Comment in Route

   - Routes in `routes/web.php`
     - added routes as resource which follows the practice of Object Oriented Programming and SOLID principles

3. Created Seeders for News and Comment
   - Seeders in `database/migration`
     - separated files based on routes (News, Comment)
     - seeders uses the database entries provided in DB.php

### Custom Implementations to make the app highly optimized,scalable and adheres to coding standards, Object Oriented Programming and SOLID Principles

4. Response Codes

   - Located in `app/Constants/ResponseCode`
     - List of default responses to be returned for each execution of api calls
     - helps frontend developers in knowing the status of the response
     - sets default coding standard that helps backend developers use it globally all through out the app
     - follows the practice of Object Oriented Programming and SOLID principles

5. Global Response and Forbidden Response

   - Helpers in `app/Helpers/response`
     - helpers can be used all through out the app
     - implemented in `composer.json` under `autoload/files`
     - global and forbidden responses are used to make a format of json response that adheres to RESTful API standards
     - forbidden response are used for routes that will not be used or when a user cannot access the specified route
     - global response is a dynamic json response that are used for available routes
     - global response helps backend developers easily return clean and formatted json which will be used by front end developers

6. Exceptions Handler

   - Located in `app/Exceptions/Handler`
     - added custom responses like bad request,forbidden, not found, method not allowed, database error and system error
     - makes error messages readable for both frontend and backend developer
     - highly dynamic and clean for the users
     - where logging of errors should be implemented when scaled

7. Services

   - Located in `app/Http/Services`
   - where the custom services or functionalities are implemented
   - makes the functions dynamic
   - SOLID principles (Single Responsibility Principle)
   - ResponseService

8. Interfaces

   - Located in `app/Http/Interfaces`
   - sets the format functions
   - SOLID principles (Dependency Inversion Principle)

9. Custom Configuration

   - Located in `config/custom`
   - where the default messages are stored
   - makes the messages in responses dynamic
   - makes the pagination and sort of queries dynamic
   - where additional configurations and settings can be further added

10. Controllers

    - used eloquent for querying tables
    - added validations for the payload/request for error handling and seamless payload checking
    - added dynamic pagination and sortation
    - added dynamic clean and formatted responses
    - added clean resources
    - index, where the listing or getting of all data per table
    - show, store, update and delete

11. Resources

    - have to types the collection and the resource
    - collection is a list of resource
    - implements pagination
    - easily expandable and scalable

12. Requests

    - implements validation for payloads
    - used in index,store and update

13. Migration on Delete

    - added on delete cascade for migrations on comments connected to news
    - whenever a news is deleted, connected comments will also be deleted

14. Traits
    - Located in `app/Http/Traits`
    - used to add reusable methods and properties to your Eloquent models
    - by using traits, developers can organize the code more effectively and avoid code duplication
    - where accessors, mutators, relationships and scopes are implemented
    - with this relationships can easily be queried and return

# 12 Tips for API Security

1. HTTPS
2. OAuth2
3. WebAuthn
4. Leveled API Keys
5. Authorization
6. Rate Limiting
7. API Versioning
8. Allowlist
9. Check OWASP(Open Web Application Security Project) API Security Risks
10. API Gateway
11. Error Handling
12. Input Validation

##  Refactor the application to have a cleaner codebase and easier to maintain / evolve (meaning: use OOP and its design patterns well).

1. SOLID Principles: 
    I have applied the SOLID principles to enhance the code's maintainability and flexibility. This ensures that our codebase is more robust and adaptable to future changes.

2. Naming Standards: 
    I have meticulously followed naming standards to ensure code readability and consistency throughout the project. Clear and consistent naming conventions promote better collaboration and understanding.

3. PHP Standard Recommendation (PSR): 
    I have adhered to PHP Standard Recommendations, which are essential for a standardized and well-organized codebase in our PHP application. This ensures that our codebase is aligned with industry standards and is more accessible to other developers.

4. Object-Oriented Programming (OOP):
     The codebase now strictly adheres to Object-Oriented Programming principles. This promotes code reusability, maintainability, and a structured approach to software development.

5. RESTful API Development and Integration: 
    In developing and integrating APIs, I have followed RESTful architectural principles. This design approach ensures that our APIs are efficient, scalable, and adhere to industry best practices for web services.

