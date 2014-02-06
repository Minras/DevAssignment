# Comments
* The solution requires PHP 5.4 (to directly access array element of the method returning array)
* The solution is not covered by tests (as it has to be build ASAP)
* The solution uses thin model and fat controller (Application acts as a controller here)
* The views are absent as the results are printed from the main application file (index.php)
* Phone numbers task supports wildcards ('\*15', '555\*', '\*15\*', etc.)
* Number comparison task uses Comparison helper which supports different types of operators ('>' and '>=' for now, but can be extended)

Time spent: ~40 minutes for initial version which simply did the required filtering in the single Application file
Full version with additional comparison/filtering functionality, data model, splitting the functionality between several files, etc. took two more hours.

If the real projects have similar code quality and are covered with tests - it should be perfect place for developers.

# Assignment explanation

This assignment is intended to test your knowledge. It's simple enough, but allows us here at Ratus to see
_how_ you tackle problems.

## Guidelines
* Supply an object oriented solution
* Don't forget to add docblocks
* You're not allowed to use external libraries
* Write your best, most beautiful code.
* Write your solutions in `application/src/Application/Main.php`
* You're allowed to add files. (Better yet, this is recommended)
* You may use `var_dump(); ` to output the filtered data.
* The data you'll be working with is already being set on `Application\Main` for you.

## Summary
You're going to be filtering the data supplied to you from an array of random data.

You'll come across the following code in `public/index.php`: 

```php
/**
 * Assignment description here
 *
 * @todo implementation
 */
$application->yourMethodCall();
```

This has to be replaced with your method calls, and must accomplish what has been described in the docblock above it.

## Getting started
1. Clone this repository to your development environment.
2. Navigate to http://localhost/ to verify everything is working. _(You should see `Development assignment`)_
3. Start in `index.php`
4. When sending back the assignment code, link to your fork and include the following information:
    * Your name
    * How long it took you to finish the assignment
    * How difficult you thought it was _(On a scale of 1 to 10)_
