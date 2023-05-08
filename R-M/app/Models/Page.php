<?php declare(strict_types=1);

namespace App\Models;

class Page {
    private int $id;
    private string $title;
    private string $content;
    private string $created_at;
    private string $updated_at;

    public function __construct(int $id, string $title, string $content, string $created_at, string $updated_at) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function getUpdatedAt(): string {
        return $this->updated_at;
    }
}
