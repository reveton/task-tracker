## Understand code instruction

GET /tasks
Request
   ↓
Route
   ↓
Controller
   ↓
Query (GetTasksQuery)
   ↓
CommandBus
   ↓
QueryHandler (GetTasksQueryHandler)
   ↓
SpecificationBuilder
   ↓
Repository
   ↓
Aggregate (Task[])
   ↓
Controller
   ↓
DTO (TaskDTO[])
   ↓
Response

PUT

Request
   ↓
Route
   ↓
Controller
   ↓
Command (AssignTaskToUserCommand / UpdateTaskStatusCommand)
   ↓
CommandBus
   ↓
CommandHandler
   ↓
Repository
   ↓
Aggregate (Task)
   ↓
Controller
   ↓
Response

---

## 🧩 Questions

### Add Comments to Task
- Create new Entity `Comment`
- Add array of comments to `Task` aggregate
- Implement `addComment()` method in aggregate

### Add User Roles
- Create new bounded context `User`
- Implement roles and access rules in that context

### Switch to Database Persistence
- Implement a new class in `Infrastructure/Persistence`
- Implement the `TaskRepository` interface with database logic (e.g. Eloquent)

---

# Project Architecture

This project follows a clean architecture with **three layers**:

- **Domain** — Main business logic.
- **Application** — Coordinates use cases (commands/queries).
- **Infrastructure** — Laravel framework + persistence + HTTP layer.

---

## 📦 Domain Layer

Contains all core domain logic, without any dependencies on Laravel.

### ✅ Components:
- **Aggregates**: `Task`
- **Value Objects**: `TaskTitle`, `TaskDescription`, `TaskStatus (enum)`
- **Specifications**: `AssignSpecification`, `StatusSpecification`
- **Repositories**: `TaskRepository`
- **Exceptions**: `TaskNotFoundException`

---

## 🧠 Application Layer

Orchestrates domain logic through use cases.

### ✅ Components:
- **Commands**: `AssignTaskToUserCommand`, `UpdateTaskStatusCommand`
- **Queries**: `GetTasksQuery`
- **DTOs**: `TaskDTO`

---

## 🛠 Infrastructure Layer

Handles HTTP, framework logic, and persistence.

### ✅ Components:
- **Controllers**: `TaskController`
- **Requests**: `AssignTaskRequest`, `GetTasksRequest`, `UpdateTaskStatusRequest`
- **Persistence**: `InMemoryTaskRepository`
- **Providers**: `TaskProvider` (for Dependency Injection)
- **Routes**: API route declarations

> ❗ Laravel Models are not used in this project. They're included for possible future use.


## ✅ Design Patterns Used

- Aggregate
- Value Object
- Repository
- CQRS
- Hexagonal Architecture (Ports & Adapters)
- Specification Pattern
- Builder Pattern
- DTO
- CommandBus


---

---

## ✨ Summary

The project is structured using clean DDD principles, with full support for CQRS and easily replaceable infrastructure. Each layer is clearly separated and encapsulated, making the system flexible, scalable, and easy to test.

