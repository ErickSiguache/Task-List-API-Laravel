<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Models\Category;
use App\Utils\CheckErrors;
use App\Utils\RequestResponses;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function getAll(): JsonResponse
    {
        try {
            $tasks = Task::with('category')->get();

            if ($tasks->isEmpty()) {
                return RequestResponses::response200("The database is empty");
            }

            return RequestResponses::response200(
                "successfully completed",
                $tasks
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function get(int $id): JsonResponse
    {
        try {
            $task = Task::with('category')->find($id);

            if (!$task) {
                return RequestResponses::responseError(
                    404,
                    "The task does not exist"
                );
            }

            return RequestResponses::response200(
                "successfully completed",
                $task
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function create(TaskRequest $task): JsonResponse
    {
        try {
            if (!Category::find($task->category_id)) {
                return RequestResponses::responseError(404, 'Category not found');
            }

            $task = Task::create($task->all());
            return RequestResponses::response200(
                'The task was created correctly',
                $task
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function update(int $id, TaskRequest $task): JsonResponse {
        try {
            if (!Category::find($task->category_id)) {
                return RequestResponses::responseError(404, 'Category not found');
            }

            $task_to_update = Task::find($id);

            if (!$task_to_update) {
                return RequestResponses::responseError(404, 'Task not found');
            }

            $task_to_update->name = $task->name;
            $task_to_update->content = $task->content;
            $task_to_update->status = $task->status;
            $task_to_update->category_id = $task->category_id;
            $task_to_update->save();

            return RequestResponses::response200(
                'Task updated successfully',
                $task_to_update
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function delete(int $id): JsonResponse {
        try {
            $task_to_delete = Task::find($id);
            if (!$task_to_delete) {
                return RequestResponses::responseError(
                    404,
                    'The task does not exist'
                );
            }

            $task_to_delete->delete();
            return RequestResponses::response201('Task deleted successfully');
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }
}
