# booking

An event planning / booking website. Still under heavy development

Built with:
* Slim4 PHP API:
    - Medoo MySQL Driver
- Docker

See `mysql` folder for SQL to create the database

# Plans

To be added:
* Reactjs or Angularjs frontend app
* Docker configuration to also host general website (template or wordpress etc) with the idea users would be redirected to this one when making bookings
* Slim4 PHP API Expansion:
    - OpenAPI creation / integration
        - https://medium.com/swlh/integrate-openapi-into-slim-php-project-15dd9e1dc398
        - Allow to generate from URL: 
            - https://zircote.github.io/swagger-php/#links
            - https://stackoverflow.com/questions/23396555/restful-api-doc-using-slim-and-swagger
    - ReDoc for hosting OpenAPI docs
        - https://github.com/Redocly/redoc

# Resources:

- Follow tutorial to understand structure: https://odan.github.io/2019/11/05/slim4-tutorial.html
- This one uses PHP-DI too which is different: https://php-di.org/doc/getting-started.html
