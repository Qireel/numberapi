# Number API Test Task

Number API allows you to generate random values and retrieve them from database by their ids.

This REST API uses Slim microframework and is based on Slim-Skeleton Template (https://github.com/slimphp/Slim-Skeleton).

Enabled REST routes are: 

/api/v1/number/generate/
--returns a Json object containing 'id' and value of a generated number

/api/v1/number/retrieve/{id}
--returns a Json object containing 'id' and value of a number that was requested by its 
{id} parameter.

To set up the application you need to create a mysql database table called 'number' and then put the connection parameters into MysqliAdapter.php class.

I've tried to implement Data Mapper as it seemed to me this pattern was the most suitable for the test task

Logging of the API workflow is enabled.

PHPUnit is also included in the project but tests are not implemented yet (and probably will never be implemented)
