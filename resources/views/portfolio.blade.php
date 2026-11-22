@extends('layouts.app')

@php
  // Foto profil:
  $fotoProfil = file_exists(public_path('images/profil.jpg'))
      ? asset('images/profil.jpg')
      : asset('images/profil-default.svg');
@endphp

@section('content')


  <!-- Navbar (menu burger di HP memakai CSS: checkbox) -->
  <nav class="navbar">
    <input type="checkbox" id="menuToggle" class="menu-toggle">

    <div class="nav-inner">
      <a href="#" class="brand">Taqi Junicio</a>

      <div class="nav-links">
        <a href="#about">About</a>
        <a href="#history">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>

        @auth
          <a href="{{ route('dashboard') }}" class="btn btn-sm btn-pill">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="btn btn-sm btn-pill">Login Admin</a>
        @endauth
      </div>

      <label for="menuToggle" class="burger" aria-label="Menu">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </label>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div class="hero-inner">
      {{-- Foto profil bundar. Letakkan fotomu di public/images/profil.jpg --}}
      <img src="{{ $fotoProfil }}" alt="Foto profil Muhammad Taqi Junicio" class="avatar">

      <h2>Muhammad <span class="text-primary">Taqi Junicio</span></h2>
      <p>Web Programmer • Web Designer</p>
      <a href="#projects" class="btn btn-pill btn-lg">Jelajahi Project Saya</a>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="section">
    <div class="container">
      <div class="panel">
        <h3>Tentang Saya</h3>
        <p>
         Halo! Saya Muhammad Taqi Junicio. Saya merupakan siswa SMKN 1 Bangsri Jurusan Pengembangan
         Perangkat Lunak dan GIM (PPLG) yang memiliki ketertarikan di bidang
         Web Development & UI/UX Design. <br><br>
         Saya senang mengeksplorasi dunia pemrograman web, saya mempelajari berbagai bahasa komputer
         didalamnya. Selain itu, saya juga mempelajari desain UI/UX, terutama dalam menciptakan
         tampilan website yang menarik, modern, dan mudah digunakan. <br> <br>
         Saat ini, saya mengikuti ekstrakurikuler WebDev Taksan Nawasena sebagai wadah untuk belajar,
         mengembangkan kemampuan, dan mendapatkan pengalaman baru di dunia teknologi.
        </p>
      </div>
    </div>
  </section>

  <!-- History -->
  <section id="history" class="section section-white">
    <div class="container">
      <h3 class="section-title">Skill</h3>

      <div class="grid grid-3">
        <div class="card">
          <h4>Bahasa Pemrograman</h4>
          <p>
            <ul>
              <li>JavaScript</li>
              <li>PHP</li>
            </ul>
          </p>
        </div>
        <div class="card">
          <h4>Bahasa Lainnya</h4>
          <p>
            <ul>
              <li>HTML</li>
              <li>CSS</li>
            </ul>
          </p>
        </div>
        <div class="card">
          <h4>Skill Lainnya</h4>
          <p>
            <ul>
              <li>Figma</li>
              <li>Laravel</li>
              <li>UI/UX Design</li>
              <li>Responsive Web Design</li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects (dinamis dari database) -->
  <section id="projects" class="section">
    <div class="container">
      <h3 class="section-title">Project Saya</h3>

      <div class="grid grid-3">
        @forelse ($projects as $project)
          <div class="card">
            <div class="card-img">
              <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}">
            </div>
            <h4>{{ $project->title }}</h4>
            <p>{{ $project->description }}</p>
            <div class="card-foot">
              <span class="tag">{{ $project->category }}</span>
              @if ($project->url)
                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="link">Lihat →</a>
              @endif
            </div>
          </div>
        @empty
          <p class="empty">Belum ada proyek.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="section">
    <div class="container">
      <div class="contact">
        <h3>Kontak</h3>
        <p>Kecamatan Bangsri, Desa Bondo, Kota Jepara</p>
        <p>Jawa Tengah, Indonesia – 59453</p>
        <p class="gap">Nomor: +62-895-3652-24842</p>
        <p>Email: mtaqyjnc@gmail.com</p>
      </div>
    </div>
  </section>

  <footer class="footer">
    © Copyright 2026. By Muhammad Taqi Junicio
  </footer>

@endsection
