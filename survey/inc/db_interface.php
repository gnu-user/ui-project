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


/**
 * Submit the survey results into the database.
 *
 * @param mysqli $mysqli_conn The mysqli connection object
 * @param all The survey feedback, should really be an array...
 *
 */
function submit_survey($mysqli_conn, $q1, $q2, $q3a, $q3b, $q3c, $q3d, $q4a, 
                       $q4b, $q4c, $q4d, $q5, $q6, $q7, $q8, $q9, $q10, $feedback)
{
    $results_table = 'results';

    /* Add the survey results to the results table */
    if ($stmt = $mysqli_conn->prepare("INSERT INTO ". $results_table .
                                      " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())"))
    {
        /* bind parameters for markers */
        $stmt->bind_param('siiiiiiiiiisiiiis', $q1, $q2, $q3a, $q3b, $q3c, $q3d, $q4a, $q4b, $q4c, $q4d, 
                                               $q5, $q6, $q7, $q8, $q9, $q10, $feedback);

        /* execute query */
        $stmt->execute();

        /* close statement */
        $stmt->close();
    }
}
?>
