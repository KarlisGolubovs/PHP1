<?php declare(strict_types=1);

namespace App\Models;

class Character {
    private int $id;
    private string $name;
    private string $status;
    private string $species;
    private string $type;
    private string $gender;
    private object $origin;
    private object $location;
    private string $image;
    private array $episode;
    private string $url;
    private string $created;

    public function __construct(
        int $id,
        string $name,
        string $status,
        string $species,
        string $type,
        string $gender,
        object $origin,
        object $location,
        string $image,
        array $episode,
        string $url,
        string $created
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->type = $type;
        $this->gender = $gender;
        $this->origin = $origin;
        $this->location = $location;
        $this->image = $image;
        $this->episode = $episode;
        $this->url = $url;
        $this->created = $created;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getSpecies(): string {
        return $this->species;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function getOrigin(): object {
        return $this->origin;
    }

    public function getLocation(): object {
        return $this->location;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getEpisode(): array {
        return $this->episode;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getCreated(): string {
        return $this->created;
    }
}