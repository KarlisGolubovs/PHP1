<?php


class Video
{
    private string $title;
    private bool $isCheckedOut;
    private int $ratingSum;
    private int $numRatings;

    function __construct($title)
    {
        $this->title = $title;
        $this->isCheckedOut = false;
        $this->ratingSum = 0;
        $this->numRatings = 0;
    }

    function getTitle(): string
    {
        return $this->title;
    }

    function getIsCheckedOut(): bool
    {
        return $this->isCheckedOut;
    }

    function setIsCheckedOut($isCheckedOut)
    {
        $this->isCheckedOut = $isCheckedOut;
    }

    function getAverageRating()
    {
        if ($this->numRatings == 0) {
            return 0;
        } else {
            return $this->ratingSum / $this->numRatings;
        }
    }

    function addRating($rating)
    {
        if ($rating >= 1 && $rating <= 5) {
            $this->ratingSum += $rating;
            $this->numRatings++;
        }
    }
}

class VideoStore
{
    private $videos = [];

    public function addVideo(string $title): void
    {
        $this->videos[] = new Video($title);
        echo "Video '$title' added to inventory.\n";
    }

    public function rentVideo(string $title): void
    {
        $video = $this->findVideoByTitle($title);
        if ($video) {
            if ($video->isCheckedOut()) {
                echo "Sorry, '$title' is already checked out.\n";
            } else {
                $video->checkOut();
                echo "You have rented '$title'. Enjoy!\n";
            }
        } else {
            echo "Sorry, we don't have '$title' in our inventory.\n";
        }
    }

    public function returnVideo(string $title): void
    {
        $video = $this->findVideoByTitle($title);
        if ($video) {
            if ($video->isCheckedOut()) {
                $video->returnVideo();
                echo "Thanks for returning '$title'.\n";
            } else {
                echo "Sorry, '$title' is already in our inventory.\n";
            }
        } else {
            echo "Sorry, we don't have '$title' in our inventory.\n";
        }
    }

    public function rateVideo(string $title, int $rating): void
    {
        $video = $this->findVideoByTitle($title);
        if ($video) {
            $video->addRating($rating);
            echo "Your rating of '$rating' has been recorded for '$title'.\n";
        } else {
            echo "Sorry, we don't have '$title' in our inventory.\n";
        }
    }

    public function listInventory(): void
    {
        if (empty($this->videos)) {
            echo "The inventory is empty.\n";
            return;
        }

        echo str_pad("Title", 25) . str_pad("Rating", 10) . "Checked Out\n";
        foreach ($this->videos as $video) {
            echo str_pad($video->getTitle(), 25) . str_pad($video->getAverageRating() . "%", 10) . ($video->isCheckedOut() ? "Yes" : "No") . "\n";
        }
    }

    private function findVideoByTitle(string $title): ?Video
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title) {
                return $video;
            }
        }
        return null;
    }

    public function checkOut(bool $title)
    {
    }
}

class Application
{
    private $store;

    function __construct()
    {
        $this->store = new VideoStore();
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform:\n";
            echo "Choose 0 to EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int) readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    echo "Enter video title: ";
                    $title = readline();
                    $this->store->addVideo(new Video($title));
                    break;
                case 2:
                    echo "Enter video title to rent: ";
                    $title = readline();
                    $this->store->checkOut($title);
                    break;
                case 3:
                    echo "Enter video title to return: ";
                    $title = readline();
                    $this->store->returnVideo($title);
                    break;
                case 4:
                    $this->store->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..\n";
            }
        }
    }
}
