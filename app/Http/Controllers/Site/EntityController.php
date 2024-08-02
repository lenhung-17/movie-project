<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id', null);
        $limit = $request->input('limit', 10);

        $entities = Entity::when($categoryId, function($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })
            ->inRandomOrder()
            ->limit($limit)
            ->get();

        return view('index', compact('entities'));
    }

    public function show($id)
    {
        $entity = Entity::findOrFail($id);

        // Get related data
        $videos = $entity->videos;

        return view('show', compact('entity', 'videos'));
    }
}
