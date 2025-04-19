<?php
namespace App\TaskTracker\Application\DTOs;

use App\TaskTracker\Domain\Aggregates\Task;
use App\TaskTracker\Domain\ValueObjects\TaskDescription;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use App\TaskTracker\Domain\ValueObjects\TaskTitle;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

class TaskDTO
{
    public function __construct(
        public UuidInterface $id,
        public TaskTitle $title,
        public TaskDescription $description,
        public TaskStatus $status,
        public ?UuidInterface $assigneeId,
        public DateTimeImmutable $createdAt,
    ) {}

    public static function fromEntity(Task $task): self
    {
        return new self(
            id: $task->getId(),
            title: $task->getTitle(),
            description: $task->getDescription(),
            status: $task->getStatus(),
            assigneeId: $task->getAssigneeId(),
            createdAt: $task->getCreatedAt()
        );
    }

    public function toArray(): array
    {
        return [
            'id' => (string) $this->id,
            'title' => (string) $this->title,
            'description' => (string) $this->description,
            'status' => $this->status->value,
            'assigneeId' => $this->assigneeId ? (string) $this->assigneeId : null,
            'createdAt' => $this->createdAt->format(DATE_ATOM),
        ];
    }
}