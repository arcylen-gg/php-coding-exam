<?php
declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Song;
use App\Repository\SongRepositoryInterface;
use Illuminate\Support\Collection;

class SongRepository implements SongRepositoryInterface
{
    /**
     * SongRepository constructor.
     * 
     * @param Song $model
     */
    public function __construct(Song $model)
    {
        $this->model = $model;
    
    }

    /**
     * @return Collection
     */
    public function listAllSong(): Collection
    {
        return $this->model::all();
    }


    /**
     * @return Array
     */
    public function findSong(int $id): Array
    {
        return $this->model->find($id)->toArray();
    }

   /**
     * @param array $attributes
     *
     * @return bool
     */
    public function saveSong(array $attributes): bool
    {
        $newSong = new Song($attributes);

        return $newSong->save();
    }

    /**
     * @return Bool
     */
    public function updateSong(array $attributes, int $id): bool
    {
        $update = $this->model->find($id);
        $update->title = $attributes['title'];
        $update->artist = $attributes['artist'];
        $update->lyrics = $attributes['lyrics'];
        return $update->save();
    }

    /**
     * @return Int
     */
    public function deleteSong(int $id): Int
    {
        return (int)$this->model::destroy($id);
    }
}