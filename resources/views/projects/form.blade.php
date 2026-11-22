@extends('layouts.dashboard')

@php $editing = $project !== null; @endphp

@section('title', $editing ? 'Edit Proyek' : 'Tambah Proyek')

@section('content')
  <form method="POST"
        action="{{ $editing ? route('projects.update', $project) : route('projects.store') }}"
        enctype="multipart/form-data"
        class="form-card wide" style="margin:0 auto">
    @csrf
    @if ($editing) @method('PUT') @endif

    <h1>{{ $editing ? 'Edit Proyek' : 'Tambah Proyek' }}</h1>

    <div class="field">
      <label for="title">Judul</label>
      <input id="title" type="text" name="title" required maxlength="100"
             value="{{ old('title', $project?->title) }}">
      @error('title') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field">
      <label for="description">Deskripsi</label>
      <textarea id="description" name="description" rows="3" required maxlength="500">{{ old('description', $project?->description) }}</textarea>
      @error('description') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="row">
      <div class="field">
        <label for="category">Kategori</label>
        <input id="category" type="text" name="category" list="categoryList" required maxlength="50"
               value="{{ old('category', $project?->category ?? 'Web Application') }}">
        <datalist id="categoryList">
          <option value="Web Application">
          <option value="Web Page">
          <option value="Website">
        </datalist>
        @error('category') <p class="error">{{ $message }}</p> @enderror
      </div>

      <div class="field">
        <label for="url">Link (opsional)</label>
        <input id="url" type="url" name="url" placeholder="https://..."
               value="{{ old('url', $project?->url) }}">
        @error('url') <p class="error">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="field">
      <label for="image">Gambar (jpg/png/webp, maks 2 MB)</label>
      @if ($editing)
        <img src="{{ $project->imageUrl() }}" alt="" class="preview">
      @endif
      <input id="image" type="file" name="image" accept="image/png,image/jpeg,image/webp">
      @if ($editing)
        <p class="hint">Kosongkan jika tidak ingin mengganti gambar.</p>
      @endif
      @error('image') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="actions">
      <a href="{{ route('dashboard') }}" class="btn btn-gray">Batal</a>
      <button type="submit" class="btn">Simpan</button>
    </div>
  </form>
@endsection
