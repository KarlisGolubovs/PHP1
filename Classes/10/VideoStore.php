<?php

class VideoStore
{
    private array $videos = [];

    public function checkOut(string $title): void
    {
        $video = $this->findVideoByTitle($title);
        if ($video) {
            if ($video->isCheckedOut()) {
                echo "Sorry, '$title' is already checked out.\n";
            } else {
                $video->setIsCheckedOut(true);
                echo "You have rented '$title'. Enjoy!\n";
            }
        } else {
            echo "Sorry, we don't have '$title' in our inventory.\n";
        }
    }

    public function addVideo(Video $video): void
    {
        $this->videos[] = $video;
        echo $video->getTitle() . " added to inventory.\n";
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
        echo "Title\t\t\tRating\t\tChecked Out\n";
        foreach ($this->videos as $video) {
            printf("%-25s%-16s%s\n", $video->getTitle(), $video->getAverageRating() . '%', $video->isCheckedOut() ? 'Yes' : 'No');
            if ($video->getAverageRating() > 0) {
                $avgRating = $video->getAverageRating();
                printf("Average rating: %.2f\n", $avgRating);
            }
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
}
