-----------------------------------------------------------------------------------------
# Endpoint
. http://localhost/index.php/user/list?limit=20

-----------------------------------------------------------------------------------------
# Database Structure
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-----------------------------------------------------------------------------------------
# Folder Structure
## entry-point
main.php: The entry-point of the application.

## Includes
inc/config.php: Holds the basic configuration to database.
inc/bootstrap.php: It is used to bootstrap the application by the necessary files.

## Models
Model/Database.php: Access layer which interact with the MySQL database.
Model/User.php: The model which implements the methods to the table with the same name.

## Controllers
Controller/Api/BaseController.php: The base controller.
Controller/Api/UserController.php: The User controller to interact with REST API calls.