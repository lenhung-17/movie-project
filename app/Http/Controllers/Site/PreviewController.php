<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function createCategoryPreviewVideo($categoryId) {
        $entity = Entity::where('category_id', $categoryId)->first();

        if (!$entity) {
            return redirect()->back()->with('error', 'No TV shows to display');
        }

        return $this->createPreviewVideo($entity);
    }

    public function createTVShowPreviewVideo() {
        $entity = Entity::whereHas('category', function($query) {
            $query->where('name', 'TV Show');
        })->first();

        if (!$entity) {
            return redirect()->back()->with('error', 'No TV shows to display');
        }

        return $this->createPreviewVideo($entity);
    }

    public function createMoviesPreviewVideo() {
        $entity = Entity::whereHas('category', function($query) {
            $query->where('name', 'Movie');
        })->first();

        if (!$entity) {
            return redirect()->back()->with('error', 'No movies to display');
        }

        return $this->createPreviewVideo($entity);
    }

    public function createPreviewVideo($entity) {
        if(!$entity) {
            $entity = $this->getRandomEntity();
        }

        $video = Video::where('entity_id', $entity->id)->where('user_id', $this->user->id)->first();

        if (!$video) {
            // Handle case when there is no video for the entity
        }

        $inProgress = $video->in_progress;
        $playButtonText = $inProgress ? "Continue watching" : "Play";
        $seasonEpisode = $video->is_movie ? '' : "<h4>{$video->season_and_episode}</h4>";

        return view('preview', compact('entity', 'video', 'playButtonText', 'seasonEpisode'));
    }

    public function createEntityPreviewSquare($entity) {
        return view('entity_preview_square', compact('entity'));
    }

    private function getRandomEntity() {
        return Entity::inRandomOrder()->first();
    }
}
