<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-06 05:00:34 --> 404 Page Not Found: Assets/images
ERROR - 2020-01-06 05:12:50 --> Query error: Unknown column 'EmailAddress' in 'field list' - Invalid query: INSERT INTO `tblfeedback` (`FirstName`, `LastName`, `EmailAddress`, `ContactNumber`, `FeedbackDescription`, `UpdatedOn`) VALUES ('Mit', 'Patel', '', '8200308821', 'hhtrhftrhrh', '2020-01-06')
ERROR - 2020-01-06 05:13:34 --> Query error: Unknown column 'UpdatedOn' in 'field list' - Invalid query: INSERT INTO `tblfeedback` (`FirstName`, `LastName`, `ContactNumber`, `FeedbackDescription`, `UpdatedOn`) VALUES ('Mit', 'Patel', '8200308821', 'hhtrhftrhrh', '2020-01-06')
ERROR - 2020-01-06 05:21:36 --> Severity: Notice --> Undefined index: FeedbackId C:\xampp\htdocs\travels\application\views\common\user-profile.php 108
ERROR - 2020-01-06 05:22:18 --> Severity: Notice --> Trying to get property 'FeedbackId' of non-object C:\xampp\htdocs\travels\application\views\common\user-profile.php 108
ERROR - 2020-01-06 05:29:50 --> Severity: error --> Exception: Too few arguments to function Login_model::feedback_update(), 0 passed in C:\xampp\htdocs\travels\application\controllers\home.php on line 315 and exactly 1 expected C:\xampp\htdocs\travels\application\models\Login_model.php 363
