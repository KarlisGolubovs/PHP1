<?php declare(strict_types=1);

namespace App\Models;

class Episode {
    private int $id;
    private string $name;
    private string $air_date;
    private string $episode;
    private array $characters;
    private string $url;

    public function __construct(int $id, string $name, string $air_date, string $episode, array $characters, string $url, string $created) {
        $this->id = $id;
        $this->name = $name;
        $this->air_date = $air_date;
        $this->episode = $episode;
        $this->characters = $characters;
        $this->url = $url;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAirDate(): string {
        return $this->air_date;
    }

    public function getEpisodeCode(): string {
        return $this->episode;
    }

    public function getCharacters(): array {
        return $this->characters;
    }

    public function getUrl(): string {
        return $this->url;
    }
}

