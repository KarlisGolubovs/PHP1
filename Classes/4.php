<?php

class Movie {
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct($title, $studio, $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function GetPG($movies): array
    {
        $pgMovies = array();
        foreach($movies as $movie) {
            if($movie->rating === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }
}

// create instances of Movie
$movie1 = new Movie("Casino Royale", "Eon Productions", "PG-13");
$movie2 = new Movie("Glass", "Buena Vista International", "PG-13");
$movie3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

// create an array of movies
$movies = array($movie1, $movie2, $movie3);

// get only the PG movies from the array
$pgMovies = Movie::GetPG($movies);

// print out the titles of the PG movies
foreach($pgMovies as $movie) {
    echo $movie->title . "\n";
    echo $movie->studio . "\n";
    echo $movie->rating . "\n";
}
