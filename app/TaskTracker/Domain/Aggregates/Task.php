<?php

namespace App\TaskTracker\Domain\Aggregates;

use App\TaskTracker\Domain\ValueObjects\TaskDescription;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use App\TaskTracker\Domain\ValueObjects\TaskTitle;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

class Task
{
    public function __construct(
        protected UuidInterface $id,
        protected TaskDescription $description,
        protected TaskTitle $title,
        protected TaskStatus $status,
        protected ?UuidInterface $assigneeId,
        protected DateTimeImmutable $createdAt
    ) {}

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function assignUser(UuidInterface $userId) : void {
        $this->assigneeId = $userId;
    }

    public function updateStatus(TaskStatus $status) : void {
        $this->status = $status;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    public function getAssigneeId(): ?UuidInterface
    {
        return $this->assigneeId;
    }

    public function getTitle(): TaskTitle
    {
        return $this->title;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getDescription(): TaskDescription
    {
        return $this->description;
    }
}