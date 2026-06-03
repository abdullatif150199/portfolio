<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Client;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@portfolio.test')],
            [
                'name' => 'Abdul Latif Mansyur',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
                'is_admin' => true,
            ]
        );

        // About
        About::truncate();
        About::create([
            'name' => 'Abdul Latif Mansyur',
            'title' => 'Fullstack Web Developer',
            'subtitle' => 'Membangun produk web yang cepat, elegan, dan berdampak.',
            'bio' => "Saya seorang Fullstack Web Developer dengan pengalaman membangun aplikasi modern menggunakan Laravel, Livewire, dan ekosistem JavaScript. Saya senang menerjemahkan ide bisnis menjadi produk digital yang scalable, performant, dan memiliki UX yang menyenangkan.\n\nSelama beberapa tahun terakhir saya telah mengerjakan beragam proyek mulai dari sistem internal perusahaan, dashboard analitik, hingga platform e-commerce. Fokus saya adalah menulis kode yang bersih, terstruktur, dan mudah dipelihara, sambil terus mengikuti perkembangan teknologi terbaru.",
            'photo_path' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?w=800&h=800&fit=crop',
            'email' => 'abdul.latif@example.com',
            'phone' => '+62 812 3456 7890',
            'location' => 'Jakarta, Indonesia',
            'github_url' => 'https://github.com/abdullatif',
            'linkedin_url' => 'https://linkedin.com/in/abdullatif',
            'twitter_url' => 'https://twitter.com/abdullatif',
            'website_url' => 'https://abdullatif.dev',
            'resume_url' => '#',
            'years_experience' => 5,
            'projects_completed' => 42,
        ]);

        // Skills (with icon URLs from devicons CDN)
        Skill::truncate();
        $skills = [
            ['Laravel', 'Backend', 95, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg'],
            ['PHP', 'Backend', 92, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
            ['Livewire', 'Backend', 90, 'https://laravel-livewire.com/img/twitter.png'],
            ['MySQL', 'Database', 88, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg'],
            ['PostgreSQL', 'Database', 82, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg'],
            ['JavaScript', 'Frontend', 90, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg'],
            ['Vue.js', 'Frontend', 85, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg'],
            ['React', 'Frontend', 80, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg'],
            ['Tailwind CSS', 'Frontend', 95, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg'],
            ['Alpine.js', 'Frontend', 88, 'https://alpinejs.dev/favicon.png'],
            ['Docker', 'DevOps', 78, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg'],
            ['Git', 'DevOps', 92, 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg'],
        ];
        foreach ($skills as $i => [$n, $c, $l, $icon]) {
            Skill::create([
                'name' => $n, 'category' => $c, 'level' => $l,
                'icon_path' => $icon, 'sort_order' => $i,
            ]);
        }

        // Projects
        Project::truncate();
        $projects = [
            [
                'title' => 'NusaShop — Marketplace UMKM',
                'category' => 'Web Application',
                'description' => 'Platform marketplace untuk UMKM Indonesia dengan multi-vendor, pembayaran online, dan dashboard penjual yang lengkap. Mendukung 1000+ produk dan 100+ vendor aktif.',
                'tech_stack' => ['Laravel', 'Livewire', 'MySQL', 'Tailwind', 'Midtrans'],
                'cover_path' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/nusashop',
                'repo_url' => 'https://github.com/abdullatif/nusashop',
                'is_featured' => true,
            ],
            [
                'title' => 'TaskFlow — Project Management',
                'category' => 'SaaS',
                'description' => 'Aplikasi manajemen proyek dengan Kanban board, real-time collaboration, time tracking, dan integrasi GitHub. Dipakai oleh 30+ tim engineering.',
                'tech_stack' => ['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Reverb'],
                'cover_path' => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/taskflow',
                'repo_url' => 'https://github.com/abdullatif/taskflow',
                'is_featured' => true,
            ],
            [
                'title' => 'EduPortal — LMS Sekolah',
                'category' => 'Education',
                'description' => 'Learning Management System untuk sekolah menengah dengan modul absensi, ujian online, rapor digital, dan portal orang tua. Diadopsi 5 sekolah dengan 2000+ siswa.',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Inertia'],
                'cover_path' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/eduportal',
                'repo_url' => 'https://github.com/abdullatif/eduportal',
                'is_featured' => true,
            ],
            [
                'title' => 'FinTrack — Personal Finance',
                'category' => 'Mobile-First Web',
                'description' => 'Aplikasi pencatatan keuangan pribadi dengan kategori otomatis, grafik interaktif, dan ekspor laporan PDF. Mobile-first PWA.',
                'tech_stack' => ['Laravel', 'Livewire', 'Chart.js', 'Tailwind'],
                'cover_path' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/fintrack',
                'repo_url' => 'https://github.com/abdullatif/fintrack',
                'is_featured' => false,
            ],
            [
                'title' => 'BookNow — Booking System',
                'category' => 'Web Application',
                'description' => 'Sistem booking salon kecantikan dengan kalender dinamis, reminder WhatsApp, dan dashboard owner. Mengurangi no-show hingga 40%.',
                'tech_stack' => ['Laravel', 'Livewire', 'MySQL', 'Twilio'],
                'cover_path' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/booknow',
                'repo_url' => 'https://github.com/abdullatif/booknow',
                'is_featured' => false,
            ],
            [
                'title' => 'CodeBlog — Developer Blog',
                'category' => 'Content',
                'description' => 'Blog teknis dengan markdown editor, syntax highlighting, comments, dan analytics. Open-source dan SEO-optimized.',
                'tech_stack' => ['Laravel', 'Livewire', 'Tailwind', 'MeiliSearch'],
                'cover_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=800&fit=crop',
                'demo_url' => 'https://example.com/codeblog',
                'repo_url' => 'https://github.com/abdullatif/codeblog',
                'is_featured' => false,
            ],
        ];
        foreach ($projects as $i => $p) {
            $p['slug'] = Str::slug($p['title']);
            $p['sort_order'] = $i;
            Project::create($p);
        }

        // Experience
        Experience::truncate();
        $experiences = [
            [
                'company' => 'Tokopedia',
                'role' => 'Senior Fullstack Engineer',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Memimpin pengembangan modul Seller Center, melakukan migrasi monolith ke microservices, dan memmentor 4 junior engineers.',
                'start_date' => '2023-02-01',
                'end_date' => null,
                'is_current' => true,
            ],
            [
                'company' => 'Bukalapak',
                'role' => 'Fullstack Web Developer',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Membangun fitur pembayaran installment, optimasi performance halaman produk (LCP -45%), dan setup CI/CD pipeline.',
                'start_date' => '2021-04-01',
                'end_date' => '2023-01-31',
                'is_current' => false,
            ],
            [
                'company' => 'Niagahoster',
                'role' => 'Backend Engineer',
                'location' => 'Yogyakarta, Indonesia',
                'description' => 'Mengembangkan dashboard customer untuk manajemen hosting, integrasi dengan WHM/cPanel, dan automation billing.',
                'start_date' => '2019-08-01',
                'end_date' => '2021-03-31',
                'is_current' => false,
            ],
            [
                'company' => 'Freelance',
                'role' => 'Web Developer',
                'location' => 'Remote',
                'description' => 'Mengerjakan beragam proyek client mulai dari company profile, e-commerce, hingga sistem internal untuk klien lokal dan internasional.',
                'start_date' => '2018-01-01',
                'end_date' => '2019-07-31',
                'is_current' => false,
            ],
        ];
        foreach ($experiences as $i => $e) {
            $e['sort_order'] = $i;
            Experience::create($e);
        }

        // Clients
        Client::truncate();
        $clients = [
            ['Tokopedia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Tokopedia_logo.svg/512px-Tokopedia_logo.svg.png'],
            ['Bukalapak', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Bukalapak_official_logo.svg/512px-Bukalapak_official_logo.svg.png'],
            ['Gojek',     'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Gojek_logo_2022.svg/512px-Gojek_logo_2022.svg.png'],
            ['Traveloka', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Traveloka_Primary_Logo.svg/512px-Traveloka_Primary_Logo.svg.png'],
            ['Telkom',    'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Telkom_Indonesia_2013.svg/512px-Telkom_Indonesia_2013.svg.png'],
            ['BCA',       'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/512px-Bank_Central_Asia.svg.png'],
        ];
        foreach ($clients as $i => [$n, $logo]) {
            Client::create(['name' => $n, 'logo_path' => $logo, 'sort_order' => $i]);
        }

        // Testimonials
        Testimonial::truncate();
        $testimonials = [
            [
                'name' => 'Rina Pratiwi',
                'role' => 'Product Manager',
                'company' => 'Tokopedia',
                'message' => 'Abdul adalah engineer yang sangat reliable. Dia tidak hanya menulis kode bersih, tapi juga aktif memberi masukan produk dan UX. Tim kami terbantu sekali.',
                'avatar_path' => 'https://i.pravatar.cc/200?img=47',
                'rating' => 5,
            ],
            [
                'name' => 'Budi Santoso',
                'role' => 'CTO',
                'company' => 'EduPortal',
                'message' => 'Hasil kerja Abdul melebihi ekspektasi. Project LMS yang awalnya kami estimasi 6 bulan, selesai dalam 4 bulan dengan kualitas production-grade.',
                'avatar_path' => 'https://i.pravatar.cc/200?img=12',
                'rating' => 5,
            ],
            [
                'name' => 'Sarah Lim',
                'role' => 'Founder',
                'company' => 'BookNow',
                'message' => 'Komunikasi jelas, deadline tepat, dan solusi yang ditawarkan selalu thoughtful. Highly recommended untuk siapapun yang butuh fullstack developer berpengalaman.',
                'avatar_path' => 'https://i.pravatar.cc/200?img=32',
                'rating' => 5,
            ],
            [
                'name' => 'Andika Wijaya',
                'role' => 'Engineering Manager',
                'company' => 'Bukalapak',
                'message' => 'Abdul punya kemampuan debugging luar biasa. Beberapa bug kritis yang stuck berhari-hari berhasil dia solve dalam hitungan jam.',
                'avatar_path' => 'https://i.pravatar.cc/200?img=15',
                'rating' => 5,
            ],
        ];
        foreach ($testimonials as $i => $t) {
            $t['sort_order'] = $i;
            Testimonial::create($t);
        }
    }
}
