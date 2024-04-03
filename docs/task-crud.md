# Documentación del CRUD: Tareas

## Consultas "GET"

-   La base de datos está vacía:

![Task table is empty](./tasks-imgs/get-database-empty.PNG)

-   Base de datos con datos almacenados

![Database with data](./tasks-imgs/get-with-data.PNG)

-   Consultar tarea por su ID

![Task by ID](./tasks-imgs/get-by-id.PNG)

## Consultas "POST"

-   Los datos son requeridos (Validaciones)

![Task validations](./tasks-imgs/validations-in-created.PNG)

-   La tarea se ha insertado correctamente

![Task inseted correctly](./tasks-imgs/created-correctly.PNG)

-   No repetir el nombre al insertar

![Not repeat name](./tasks-imgs/not-repeat-name.PNG)

-   La categoría no existe

![Category not found](./tasks-imgs/category-not-found.PNG)

## Consultas "PUT"

-   La tarea a actualizar no existe

![Task not found](./tasks-imgs/task-not-found.PNG)

-   La categoría no existe

![Category not found](./tasks-imgs/task-category-not-exist.PNG)

-   Los datos son requeridos (Validaciones)

![Validations in updated task](./tasks-imgs/update-validations.PNG)

-   La tarea se ha actualizado

![Task updated currently](./tasks-imgs/task-updated.PNG)

## Consultas "DELETE"

-   La tarea a eliminar no existe

![Task not found in delete](./tasks-imgs/delete-not-found.PNG)

-   La tarea se ha eliminado

![Task deleted correctly](./tasks-imgs/task-deleted-successfully.PNG)
