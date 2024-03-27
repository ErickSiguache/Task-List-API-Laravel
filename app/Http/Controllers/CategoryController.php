<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Utils\CheckErrors;
use App\Utils\RequestResponses;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function getAll(): JsonResponse
    {
        try {
            $categories = Category::all();

            if ($categories->isEmpty())
                return RequestResponses::response200("The database is empty");

            return RequestResponses::response200(
                "successfully completed",
                $categories
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function get(int $id): JsonResponse {
        try {
            $category = Category::find($id);
            if (!$category) {
                return RequestResponses::responseError(
                    404,
                    "The user does not exist"
                );
            }

            return RequestResponses::response200(
                "The query has been successfully completed",
                $category
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function create(CategoryRequest $category): JsonResponse
    {
        try {
            $category = Category::create($category->all());
            return RequestResponses::response200(
                "The user was created correctly",
                $category
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function update(int $id, CategoryRequest $request)
    {
        try {
            $category_to_update = Category::find($id);

            if (!$category_to_update) {
                return RequestResponses::responseError(
                    404,
                    "The user does not exist"
                );
            }

            $category_to_update->name = $request->name;
            $category_to_update->description = $request->description;
            $category_to_update->status = $request->status;
            $category_to_update->save();

            return RequestResponses::response200(
                "The user has been updated",
                $category_to_update
            );
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }

    public function delete(int $id): JsonResponse {
        try {
            $category_to_delete = Category::find($id);
            if (!$category_to_delete) {
                return RequestResponses::responseError(
                    404,
                    "The user does not exist"
                );
            }

            $category_to_delete->delete();
            return RequestResponses::response201("The user has been deleted");
        } catch (Exception $e) {
            return CheckErrors::check($e);
        }
    }
}
