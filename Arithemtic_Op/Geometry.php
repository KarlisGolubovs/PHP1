<?php
class Geometry
{
    public static function circleArea($radius)
    {
        if ($radius < 0) {
            throw new Exception("Radius cannot be negative");
        }
        return pi() * $radius * $radius;
    }

    public static function rectangleArea($length, $width)
    {
        if ($length < 0 || $width < 0) {
            throw new Exception("Length and width cannot be negative");
        }
        return $length * $width;
    }

    public static function triangleArea($base, $height)
    {
        if ($base < 0 || $height < 0) {
            throw new Exception("Base and height cannot be negative");
        }
        return 0.5 * $base * $height;
    }
}
