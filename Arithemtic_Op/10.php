<?php
require_once 'Geometry.php';

while (true) {
    echo "Geometry calculator:\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Rectangle\n";
    echo "3. Calculate the Area of a Triangle\n";
    echo "4. Quit\n";
    echo "Enter your choice (1-4): ";

    $choice = readline();
    switch ($choice) {
        case 1:
            $radius = readline("Enter the radius of the circle: ");
            try {
                $area = Geometry::circleArea($radius);
                echo "The area of the circle is: $area\n";
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
            break;
        case 2:
            $length = readline("Enter the length of the rectangle: ");
            $width = readline("Enter the width of the rectangle: ");
            try {
                $area = Geometry::rectangleArea($length, $width);
                echo "The area of the rectangle is: $area\n";
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
            break;
        case 3:
            $base = readline("Enter the base of the triangle: ");
            $height = readline("Enter the height of the triangle: ");
            try {
                $area = Geometry::triangleArea($base, $height);
                echo "The area of the triangle is: $area\n";
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
            break;
        case 4:
            echo "Goodbye!\n";
            exit(0);
        default:
            echo "Invalid choice. Please enter a number between 1 and 4.\n";
    }
}
?>