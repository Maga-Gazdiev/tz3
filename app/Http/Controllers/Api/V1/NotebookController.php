<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Notebook;
use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\NotebookResource;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::paginate(10);
        return NotebookResource::collection($notebooks);
    }

    public function store(StoreNotebookRequest $request)
    {
        $data = $request->validated();
        $data['phone'] = preg_replace('/\D/', '', $data['phone']);
      
        $notebook = Notebook::create($data);
        return response()->json(new NotebookResource($notebook), 201);
    }

    public function show($id)
    {
        $notebook = Notebook::find($id);
        if (!$notebook) {
            return response()->json(['error' => 'Записная книжка не найдена'], 404);
        }
        return new NotebookResource($notebook);
    }

    public function update(UpdateNotebookRequest $request, $id)
    {
        $notebook = Notebook::find($id);
        if (!$notebook) {
            return response()->json(['error' => 'Записная книжка не найдена'], 404);
        }
        $data = $request->validated();
        $data['phone'] = preg_replace('/\D/', '', $data['phone']); 
      
        $notebook->update($data);
        return new NotebookResource($notebook);
    }

    public function destroy($id)
    {
        $notebook = Notebook::find($id);
        if (!$notebook) {
            return response()->json(['error' => 'Записная книжка не найдена'], 404);
        }
        $notebook->delete();
        return response()->json(['message' => 'Успешно удалено'], 204);
    }
}

