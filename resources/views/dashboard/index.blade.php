@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')
  <div class="dash-head">
    <h1>Dashboard</h1>
    <a href="{{ route('projects.create') }}" class="btn">+ Tambah Proyek</a>
  </div>

  @if (session('success'))
    <div class="alert">{{ session('success') }}</div>
  @endif

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Link</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($projects as $project)
          <tr>
            <td><img class="thumb" src="{{ $project->imageUrl() }}" alt="{{ $project->title }}"></td>
            <td>
              <strong>{{ $project->title }}</strong><br>
              <small style="color:#6b7280">{{ \Illuminate\Support\Str::limit($project->description, 60) }}</small>
            </td>
            <td>{{ $project->category }}</td>
            <td>
              @if ($project->url)
                <a class="link" href="{{ $project->url }}" target="_blank" rel="noopener">Buka</a>
              @else
                -
              @endif
            </td>
            <td>
              <div class="td-actions">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-info btn-sm">Edit</a>

                {{-- Konfirmasi hapus memakai elemen <details> bawaan HTML  --}}
                <details>
                  <summary class="btn btn-danger btn-sm">Hapus</summary>
                  <form method="POST" action="{{ route('projects.destroy', $project) }}" class="confirm">
                    @csrf
                    @method('DELETE')
                    <p>Yakin hapus?</p>
                    <button type="submit" class="btn btn-danger btn-sm">Ya, hapus</button>
                  </form>
                </details>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center">Belum ada proyek.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
