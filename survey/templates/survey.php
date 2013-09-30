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
?>
<section id="register">
    <div class="page-header">
        <h1>Survey</h1>
    </div>
    <div class="row">
        <div class="span8">
            <!-- Survey info/notification box -->
            <?php
                if (isset($_SESSION['invalid']))
                {
                    echo '<div id="surveyinvalid" class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>
                                <strong>Invalid Information Provided!</strong> The information you provided is not valid
                                please complete the survey and enter valid information.
                            </p>
                          </div>';
                }
                elseif (isset($_SESSION['success']))
                {
                    echo '<div id="surveyvalid" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>
                                <strong>Survey Submitted!</strong> Thank you, your survey has been successfully
                                submitted!
                            </p>
                          </div>';
                }
                else
                {
                    echo '<div id="surveyinfo" class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>
                                Fill out the following survey to the best of your abilities, if there are any questions
                                for which you need clarification <strong>please let us know</strong>.
                            </p>
                          </div>';
                }
            ?>
            <form class="well form-horizontal" action="submit.php" method="post" accept-charset="UTF-8">
                <fieldset>
                    <!-- COMMUNICATIONS UNDER STRESSFUL SITUATION -->
                    <div class="control-group">
                    <p><strong>When you are in a stressful situation, which communications medium do you pick first to signal for help?</strong></p>
                        <label for="q1" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q1" name="q1" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="Radio">Radio</option>
                                <option value="Panic">Panic Button</option>
                                <option value="Shouting">Shouting out loud</option>
                                <option value="Other">Other (please specify)</option>
                            </select>
                            <input type="text" id="other-q1" class="input-xlarge other-box" style="display: none;">
                        </div>
                    </div>
                    <!-- FLOOR PLANS EFFECTIVE -->
                    <div class="control-group">
                    <p><strong>How effective are maps/floor plans when attempting to navigate through a complex/building?</strong></p>
                        <label for="q2" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q2" name="q2" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Don't know</option>
                                <option value="2">Highly ineffective</option>
                                <option value="3">Ineffective</option>
                                <option value="4">I don't feel strongly either way</option>
                                <option value="5">Effective</option>
                                <option value="6">Highly effective</option>
                            </select>
                        </div>
                    </div>
                    <!-- STRESSFUL SITUATION ON MEDIUM -->
                    <div class="control-group well">
                        <p><strong>In a stressful situation, how easy is it to relay important situational information on the medium specified?</strong></p>
                        <p><strong>In each situation, assume that the circumstances make it impossible to use any other medium except the one specified (due to noise, smoke, and so on).</strong></p>
                        <!-- RADIO  -->
                        <div class="control-group">
                            <label for="q3a" class="control-label"><strong><strong>Radio:</strong></strong></label>
                            <div class="controls">
                                <select id="q3a" name="q3a" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- VERBAL  -->
                        <div class="control-group">
                            <label for="q3b" class="control-label"><strong><strong>Verbal / Audible message / Shouting:</strong></strong></label>
                            <div class="controls">
                                <select id="q3b" name="q3b" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- HAND  -->
                        <div class="control-group">
                            <label for="q3c" class="control-label"><strong><strong>Hand command / Gesture / Pointing:</strong></strong></label>
                            <div class="controls">
                                <select id="q3c" name="q3c" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- TOUCH  -->
                        <div class="control-group">
                            <label for="q3d" class="control-label"><strong><strong>Tactile command / Shoulder tap:</strong></strong></label>
                            <div class="controls">
                                <select id="q3d" name="q3d" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- STRESSFUL SITUATION ON MEDIUM -->
                    <div class="control-group well">
                        <p><strong>In a stressful situation, how easy is it to determine the location of your partners using the medium specified?</strong></p>
                        <p><strong>In each situation, assume that the circumstances make it impossible to use any other medium except the one specified (due to noise, smoke, and so on).</strong><p>
                        <!-- RADIO  -->
                        <div class="control-group inner">
                            <label for="q4a" class="control-label"><strong><strong>Radio:</strong></strong></label>
                            <div class="controls">
                                <select id="q4a" name="q4a" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- VERBAL  -->
                        <div class="control-group inner">
                            <label for="q4b" class="control-label"><strong><strong>Verbal / Audible message / Shouting:</strong></strong></label>
                            <div class="controls">
                                <select id="q4b" name="q4b" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- HAND  -->
                        <div class="control-group inner">
                            <label for="q4c" class="control-label"><strong><strong>Hand command / Gesture / Pointing:</strong></strong></label>
                            <div class="controls">
                                <select id="q4c" name="q4c" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                        <!-- TOUCH  -->
                        <div class="control-group inner">
                            <label for="q4d" class="control-label"><strong><strong>Tactile command / Shoulder tap:</strong></strong></label>
                            <div class="controls">
                                <select id="q4d" name="q4d" class="input-xlarge">
                                    <option>Please choose</option>
                                    <option value="1">Don’t know</option>
                                    <option value="2">Very difficult</option>
                                    <option value="3">Difficult</option>
                                    <option value="4">I don't feel strongly either way</option>
                                    <option value="5">Easy</option>
                                    <option value="6">Very easy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- CHOOSE MEDIUM -->
                    <div class="control-group">
                        <p><strong>Please choose which medium you would prefer as your fastest, most effective communications tool?</strong></p>
                        <label for="q5" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q5" name="q5" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Radio</option>
                                <option value="2">Verbal</option>
                                <option value="3">Hand command / Gesture / Pointing</option>
                                <option value="4">Tactile command / Shoulder tap</option>
                            </select>
                        </div>
                    </div>
                    <!-- BEST WAY OF KNOWING PARTERNS ARE NEARBY -->
                    <div class="control-group">
                        <p><strong>When in a stressful situation, which is the best way of knowing that your partners are nearby?</strong></p>
                        <label for="q6" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q6" name="q6" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="Radio">Radio</option>
                                <option value="Verbal">Verbal/audible message/shouting</option>
                                <option value="Line">Line of sight</option>
                                <option value="Other">Other (please specify)</option>
                            </select>
                            <input type="text" id="other-q6" class="input-xlarge other-box" style="display: none;">
                        </div>
                    </div>
                    <!-- IMPORTANCE OF KNOWING PARTNERS ARE NEARBY -->
                    <div class="control-group">
                        <p><strong>How important is it in a stressful situation to know where your partners are?</strong></p>
                        <label for="q7" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q7" name="q7" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Don’t know</option>
                                <option value="2">Very unimportant</option>
                                <option value="3">Unimportant</option>
                                <option value="4">I don't feel strongly either way</option>
                                <option value="5">Important</option>
                                <option value="6">Very important</option>
                            </select>
                        </div>
                    </div>
                    <!-- IMPORTANCE OF KNOWING PARTNERS LOCATION -->
                    <div class="control-group">
                        <p><strong>How easy is it to do your job effectively when you are constantly aware of your partners’ locations?</strong></p>
                        <label for="q8" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q8" name="q8" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Don’t know</option>
                                <option value="2">Very difficult</option>
                                <option value="3">Difficult</option>
                                <option value="4">I don't feel strongly either way</option>
                                <option value="5">Easy</option>
                                <option value="6">Very easy</option>
                            </select>
                        </div>
                    </div>
                    <!-- IMPORTANCE OF QUICK ACCESS TO A MAP OF SURROUNDINGS -->
                    <div class="control-group">
                        <p><strong>If you are in an unfamiliar location, how important is having quick access to a map of your surroundings?</strong></p>
                        <label for="q9" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q9" name="q9" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Don’t know</option>
                                <option value="2">Very unimportant</option>
                                <option value="3">Unimportant</option>
                                <option value="4">I don't feel strongly either way</option>
                                <option value="5">Important</option>
                                <option value="6">Very important</option>
                            </select>
                        </div>
                    </div>
                    <!-- BEING AWARE OF PARTNERS NEARBY -->
                    <div class="control-group">
                        <p><strong>When you are aware that your partners are nearby, do you feel more at ease in a stressful situation?</strong></p>
                        <label for="q19" class="control-label"><strong>Select one of the following:</strong></label>
                        <div class="controls">
                            <select id="q10" name="q10" class="input-xlarge">
                                <option>Please choose</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Submit survey -->
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" id="survey" name="survey" class="btn btn-large btn-inverse">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
