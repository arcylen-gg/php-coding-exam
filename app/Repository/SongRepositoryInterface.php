<?php
declare(strict_types=1);

namespace App\Repository;
use Illuminate\Support\Collection;

interface SongRepositoryInterface
{
   public function listAllSong(): Collection;

   public function findSong(int $id): Array;

   public function saveSong(array $attributes): bool;

   public function updateSong(array $attributes, int $id): bool;

   public function deleteSong(int $id): Int;
}