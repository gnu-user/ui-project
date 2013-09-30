SETUP INSTRUCTIONS
===================

DATABASE SETUP
--------------

1.  Create a new database for the purpose of the survey as a LIMITED account.
    
    ```sql
    CREATE DATABASE ui_survey;
    ```

2.  Create a table to store the survey results.

    ```sql
    USE ui_survey;
    
    CREATE TABLE results  
    (  
        q1          VARCHAR(1024) NOT NULL,
        q2          TINYINT UNSIGNED NOT NULL, 
        q3a         TINYINT UNSIGNED NOT NULL,
        q3b         TINYINT UNSIGNED NOT NULL,
        q3c         TINYINT UNSIGNED NOT NULL,
        q3d         TINYINT UNSIGNED NOT NULL,
        q4a         TINYINT UNSIGNED NOT NULL,
        q4b         TINYINT UNSIGNED NOT NULL,
        q4c         TINYINT UNSIGNED NOT NULL,
        q4d         TINYINT UNSIGNED NOT NULL,       
        q5          TINYINT UNSIGNED NOT NULL, 
        q6          VARCHAR(1024) NOT NULL,
        q7          TINYINT UNSIGNED NOT NULL,
        q8          TINYINT UNSIGNED NOT NULL,
        q9          TINYINT UNSIGNED NOT NULL,
        q10         BOOLEAN NOT NULL,
        feedback    TEXT DEFAULT NULL,
        submit_date DATE NOT NULL 
    );
    ```


SURVEY AUTH CONFIGURAION
------------------------

1.  Edit the configuration file **inc/auth.php** and set the following options according to the current
    database and server configuration.

    ```php
    /* Database access */
    $db_user = '';
    $db_pass = '';
    $db_name = '';
    ```

2.  Next, set the following permissions to various files that should never be made
    accessible (even READ ONLY) to the public as they contain confidential data
      such as passwords

      a.    For the inc/auth file

    ```bash
    chown root.www-data auth.php
    chmod 640 auth.php
    ```
