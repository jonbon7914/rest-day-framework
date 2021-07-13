# rest-day-framework

Files definitions:

  - core
    - main.php - a php file that expose the abstract class
    - util.php - a php file that contains different functions that can be used throughout the system
  - header
    - connection
      - connection.php - where the connection on database is being initiated
      - const.php - includes database connection creds and API URLs
      - transact.php - should not be edit, all db transactions referenced here, PDO powered
    - curl.php - not neccessary
    - db.php - not neccessary
    - tools.php - add tools here such as date tools, or any functions that is not connected in the database
  - motor - this folder can be renamed or you can create new folder with the same structure
    - db_transactions
      - motor_delete.php 
      - motor_insert.php
      - motor_select.php
      - motor_update.php
    - util
      - util.php
    - motor.php
  - index.php

Example payload:
http://localhost/rest-day-framework?action=Motor

'localhost' - host
'rest-day-framework' - folder name
'action=Motor' - action is always required, motor is the existing class, you can create a new one according to existing folder 'motor'

{
  "action" : "Select-selectReportType"
}

on the JSON payload, here is the definition of fields:
'action' - always required on the JSON payload, it will define the routing inside the framework
'Select-selectReportType'
  'Select' - this will define the type of transaction, always required in each call, can be Select, Insert, Update, Delete, Util
  'selectReportType' - existing class that will do the specific task, in each class there is always a doTask() function, this is the main function in each class
  
You can add more parameters depending on the payload, example:

{
  "action" : "Select-selectReportType",
  "values" : {
              "id": "5",
              "age": "20",
              "name": "Juan Dela Cruz"
              }
}

The param "values" can be call on the specific class thru 
  $this->json->values->id 
So example you change values to other_params, then you will call the params thru
  $this->json->other_params->id
