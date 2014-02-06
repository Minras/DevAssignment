<?php

/**
 * # Assignment explanation:
 *
 * You're going to be filtering the data supplied to your Main class below.
 * A couple of things to remember:
 *
 *  -   There is no predefined way of doing this assignment, except that it has to be
 *      It's up to you to implement everything whichever way you see fit.
 *
 *  -   This assignment package comes bundled with a functional autoloader (as you might have can noticed on line 24).
 *      If you wish to add a namespace (besides Application) you can take a look at the
 *      "init_autoloader" file on how to do so.
 *
 *  -   You'll come across the following code below:
 *          $application->yourMethodCall();
 *      I think this is pretty obvious, but I'll explain it nonetheless.
 *      This is a placeholder for the method call you'll be replacing it with.
 *      It's just there to show you where you should put your method calls.
 *
 * Good luck.
 */
require_once __DIR__ . '/../init_autoloader.php';

/**
 * Initialize assignment application.
 */
$assignmentData = include __DIR__ . '/../data/assignmentData.php';
$application    = new Application\Main($assignmentData);

/**
 * The following method call will return all people with a last name of "Doe".
 */
var_dump($application->getPeople('lastName', 'Doe'));

/**
 * The following method call will return all car models containing a "5"
 */
var_dump($application->getCars('5'));

/**
 * The following method call will return all phone numbers ending with "15"
 */
var_dump($application->getPhones('*15'));

/**
 * The following method call will return all numbers containing greater than, or equal to "4000"
 */
var_dump($application->getNumbers(4000, '>='));
