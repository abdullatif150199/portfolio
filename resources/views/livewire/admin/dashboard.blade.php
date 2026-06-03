<div>
    <div class="mb-8">
        <h2 class="text-3xl font-bold">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="text-ink-500 mt-1">Here's what's happening with your portfolio.</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-10">
        @php
            $cards = [
                ['Projects',     $stats['projects'],     'admin.projects',     '🗂️'],
                ['Skills',       $stats['skills'],       'admin.skills',       '⚡'],
                ['Experience',   $stats['experiences'],  'admin.experiences',  '💼'],
                ['Clients',      $stats['clients'],      'admin.clients',      '🤝'],
                ['Testimonials', $stats['testimonials'], 'admin.testimonials', '💬'],
                ['About Me',     $stats['about_done'] ? '✓' : '–', 'admin.about', '🪪'],
            ];
        @endphp
        @foreach($cards as [$label, $val, $route, $icon])
            <a href="{{ route($route) }}" wire:navigate class="card group" data-testid="stat-{{ Str::slug($label) }}">
                <div class="text-2xl mb-2">{{ $icon }}</div>
                <div class="text-3xl font-bold mb-1">{{ $val }}</div>
                <div class="text-xs text-ink-500 group-hover:text-brand-500 transition">{{ $label }} →</div>
            </a>
        @endforeach
    </div>

    <div class="card">
        <h3 class="font-semibold mb-4">Recent Projects</h3>
        <div class="divide-y divide-ink-200 dark:divide-white/5">
            @forelse($recent_projects as $p)
                <div class="flex items-center gap-4 py-3">
                    <img src="{{ $p->cover_path }}" alt="" class="h-12 w-16 rounded object-cover">
                    <div class="flex-1 min-w-0">
                        <div class="font-medium truncate">{{ $p->title }}</div>
                        <div class="text-xs text-ink-500">{{ $p->category }}</div>
                    </div>
                    <a href="{{ route('admin.projects') }}" wire:navigate class="text-sm text-brand-500 hover:underline">Manage</a>
                </div>
            @empty
                <p class="text-sm text-ink-500 py-3">No projects yet.</p>
            @endforelse
        </div>
    </div>
</div>
