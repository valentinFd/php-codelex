<?php

class Movie
{
    public string $title;

    public string $studio;

    public string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function getPG(array $movies): array
    {
        $PGMovies = [];
        foreach ($movies as $movie)
        {
            if ($movie->rating === "PG") $PGMovies[] = $movie;
        }
        return $PGMovies;
    }

    public function __toString(): string
    {
        return "Title: \"$this->title\" | Studio: $this->studio | Rating: $this->rating";
    }
}

$movie1 = new Movie("Casino Royale", "Eon Productions", "PG13");
$movie2 = new Movie("Glass", "Buena Vista International", "PG13");
$movie3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

$movies = [$movie1, $movie2, $movie3];

$PGMovies = Movie::getPG($movies);
foreach ($PGMovies as $movie)
{
    echo $movie . PHP_EOL;
}
