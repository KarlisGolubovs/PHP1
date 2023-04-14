<?php

class Video
{
    private array $ratings = [];
    private string $title;
    private bool $isCheckedOut;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->isCheckedOut = false;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setIsCheckedOut(bool $isCheckedOut): void
    {
        $this->isCheckedOut = $isCheckedOut;
    }

    public function addRating(int $rating): void
    {
        $this->ratings[] = $rating;
    }

    public function isCheckedOut(): bool
    {
        return $this->isCheckedOut;
    }

    public function returnVideo(): void
    {
        $this->isCheckedOut = false;
    }

    public function getAverageRating(): float
    {
        $count = count($this->ratings);
        if ($count == 0) {
            return 0;
        } else {
            $sum = array_sum($this->ratings);
            return $sum / $count;
        }
    }
}
