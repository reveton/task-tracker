## Understand code instruction

Filters tasks by status and/or assignee.
1.	GET /tasks — HTTP request hits the route.
2.	Route (defined in routes/api.php) forwards it to TaskController@index.
3.	Request (GetTasksRequest) validates input and converts it to a GetTasksQuery.
4.	Controller sends the query to CommandBus::dispatch(...).
5.	QueryHandler:
•	Builds a filter via SpecificationBuilder.
•	Calls TaskRepository::findBySpec(...).
6.	Repository returns matching Task aggregates.
7.	Controller maps the results to TaskDTO and converts them to arrays.
8.	Response is returned via ResponseHelper::success(...).


Updates the assignee or task status.
1.	PUT request hits the appropriate route.
2.	Route maps it to TaskController@assignToUser or @updateStatus.
3.	Request (AssignTaskToUserRequest, UpdateTaskStatusRequest) validates the payload.
4.	The request converts the data to the corresponding Command.
5.	CommandBus::dispatch(…) forwards the command to its Handler.
6.	CommandHandler:
•	Loads the Task from the repository.
•	Executes logic like assignUser(...) or updateStatus(...) on the aggregate.
•	Saves the modified Task back to the repository.
7.	Returns a success response via ResponseHelper::success().

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

