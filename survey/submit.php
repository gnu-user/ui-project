<?php
/*
 *  User Interfaces Survey
 *
 *  Copyright (C) 2013 Jonathan Gillet, Daniel Smullen, Matteo Ferrando, Joseph Heron
 *  All rights reserved.
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "inc/auth.php";
require_once "inc/db_interface.php";
require_once "inc/validate.php";

session_start();

$mysqli_conn = new mysqli("localhost", $db_user, $db_pass, $db_name);

/* check connection */
if (!valid_mysqli_connect($mysqli_conn))
{
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
}

/*
 * If all of the survey information is set add the results to the results table
 */
if (       isset($_POST['q1'])
        && isset($_POST['q2'])  && is_numeric($_POST['q2'])
        && isset($_POST['q3a']) && is_numeric($_POST['q3a'])
        && isset($_POST['q3b']) && is_numeric($_POST['q3b'])
        && isset($_POST['q3c']) && is_numeric($_POST['q3c'])
        && isset($_POST['q3d']) && is_numeric($_POST['q3d'])
        && isset($_POST['q4a']) && is_numeric($_POST['q4a'])
        && isset($_POST['q4b']) && is_numeric($_POST['q4b'])
        && isset($_POST['q4c']) && is_numeric($_POST['q4c'])
        && isset($_POST['q4d']) && is_numeric($_POST['q4d'])
        && isset($_POST['q5'])  && is_numeric($_POST['q5'])
        && isset($_POST['q6'])
        && isset($_POST['q7'])  && is_numeric($_POST['q7'])
        && isset($_POST['q8'])  && is_numeric($_POST['q8'])
        && isset($_POST['q9'])  && is_numeric($_POST['q9'])
        && isset($_POST['q10'])  && is_numeric($_POST['q10'])
        && isset($_POST['feedback'])
    )
{

    /* Submit the survey results */
    submit_survey($mysqli_conn, $_POST['q1'], $_POST['q2'], $_POST['q3a'], $_POST['q3b'], $_POST['q3c'], 
                  $_POST['q3d'], $_POST['q4a'], $_POST['q4b'], $_POST['q4c'], $_POST['q4d'], $_POST['q5'],
                  $_POST['q6'], $_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10'], $_POST['feedback']);

    /* Survey results recorded, redirect to main page */
    $_SESSION['success'] = "success";
    header('Location: index.php');
}
else
{
    /* Invalid data, redirect to main page */
    $_SESSION['invalid'] = "invalid";
    header('Location: index.php');
}
?>
