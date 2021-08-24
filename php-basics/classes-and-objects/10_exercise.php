<?php

class Video
{
    private string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    private bool $checkedOut;

    public function isCheckedOut(): bool
    {
        return $this->checkedOut;
    }

    private array $userRatings;

    //% of ratings that are >=5
    public function likedPercentage(): string
    {
        if (count($this->userRatings) < 1) return "0.00%";
        $count = 0;
        foreach ($this->userRatings as $rating)
        {
            if ($rating >= 5) $count++;
        }
        return number_format(($count / count($this->userRatings)) * 100, 2) . "% of users that rated \"$this->title\" liked this movie.";
    }

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->checkedOut = false;
        $this->userRatings = [];
    }

    public function addRating(float $rating)
    {
        $this->userRatings[] = $rating;
    }

    public function averageRating(): string
    {
        if (count($this->userRatings) < 1) return "0.0";
        return number_format(round(array_sum($this->userRatings) / count($this->userRatings), 1), 1);
    }

    public function checkOut()
    {
        $this->checkedOut = true;
    }

    public function returnVideo()
    {
        $this->checkedOut = false;
    }
}

class VideoStore
{
    private array $inventory;

    public function printInventory(): bool
    {
        if (count($this->inventory) > 0)
        {
            foreach ($this->inventory as $video)
            {
                $checkedOut = $video->isCheckedOut() ? "Checked out" : "On shelves";
                echo "{$video->getTitle()} | Average rating: {$video->averageRating()} | $checkedOut" . PHP_EOL;
            }
            echo PHP_EOL;
            return true;
        }
        return false;
    }

    public function __construct()
    {
        $this->inventory = [];
    }

    public function addVideo(string $title)
    {
        $video = new Video($title);
        $this->inventory[] = $video;
    }

    public function checkOut(string $title): bool
    {
        foreach ($this->inventory as $video)
        {
            if ($video->getTitle() === $title)
            {
                if ($video->isCheckedOut()) return false;
                $video->checkOut();
                return true;
            }
        }
        return false;
    }

    public function returnVideo(string $title): bool
    {
        foreach ($this->inventory as $video)
        {
            if ($video->getTitle() === $title)
            {
                if (!$video->isCheckedOut()) return false;
                $video->returnVideo();
                return true;
            }
        }
        return false;
    }

    public function addRating(string $title, float $rating): bool
    {
        if ($rating >= 0 && $rating <= 10)
        {
            $rating = round($rating, 1);
            foreach ($this->inventory as $video)
            {
                if ($video->getTitle() === $title)
                {
                    $video->addRating($rating);
                    return true;
                }
            }
        }
        return false;
    }

    public function likedPercentage(string $title)
    {
        foreach ($this->inventory as $video)
        {
            if ($video->getTitle() === $title)
            {
                return $video->likedPercentage();
            }
        }
        return false;
    }
}

class VideoStoreTest
{
    public function main()
    {
        $videoStore = new VideoStore();

        $videoStore->addVideo("The Matrix");
        $videoStore->addVideo("Godfather II");
        $videoStore->addVideo("Star Wars Episode IV: A New Hope");

        $videoStore->addRating("The Matrix", 5.6);
        $videoStore->addRating("The Matrix", 7.2);
        $videoStore->addRating("The Matrix", 9.8);

        $videoStore->addRating("Godfather II", 4.9);
        $videoStore->addRating("Godfather II", 2.5);
        $videoStore->addRating("Godfather II", 10.0);

        $videoStore->addRating("Star Wars Episode IV: A New Hope", 1.2);
        $videoStore->addRating("Star Wars Episode IV: A New Hope", 6.3);
        $videoStore->addRating("Star Wars Episode IV: A New Hope", 9.1);

        $videoStore->printInventory();

        $videoStore->checkOut("The Matrix");
        $videoStore->checkOut("Godfather II");

        $videoStore->printInventory();

        $videoStore->checkOut("Star Wars Episode IV: A New Hope");

        $videoStore->printInventory();

        $videoStore->returnVideo("The Matrix");
        $videoStore->returnVideo("Godfather II");
        $videoStore->returnVideo("Star Wars Episode IV: A New Hope");

        $videoStore->printInventory();

        echo $videoStore->likedPercentage("The Matrix") . PHP_EOL;
        echo $videoStore->likedPercentage("Godfather II") . PHP_EOL;
        echo $videoStore->likedPercentage("Star Wars Episode IV: A New Hope") . PHP_EOL;
    }
}

$test = new VideoStoreTest;
$test->main();
