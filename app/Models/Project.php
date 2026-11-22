<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'category', 'url', 'image'];

    /**
     * URL gambar proyek. Jika kosong, pakai gambar placeholder.
     * Gambar bawaan disimpan di public/images/projects/..., gambar unggahan
     * disimpan sebagai "storage/projects/..." (lewat storage:link).
     */
    public function imageUrl(): string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return asset('images/placeholder.jpg');
    }

    /**
     * Hapus file gambar unggahan (gambar bawaan di public/images tidak disentuh).
     */
    public function deleteImageFile(): void
    {
        if ($this->image && str_starts_with($this->image, 'storage/')) {
            Storage::disk('public')->delete(substr($this->image, strlen('storage/')));
        }
    }
}
