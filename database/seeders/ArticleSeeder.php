<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run($users = null)
    {
        // If no users passed, get all users
        if (!$users) {
            $users = User::all();
        }
        
        // If still no users, create one
        if ($users->isEmpty()) {
            $users = collect([User::create([
                'name' => 'Default User',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
                'age' => 25,
            ])]);
        }

        $imageUrls = [
            'https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
        ];

        $articles = [
            [
                'title' => 'Getting Started with Laravel',
                'content' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.',
                'category' => 'Programming',
                'read_time' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Getting Started with PHP',
                'content' => 'PHP is a server-side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.',
                'category' => 'Programming',
                'read_time' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Getting Started with React and Laravel',
                'content' => 'React and Laravel together provide a powerful combination for building modern web applications. React handles the frontend while Laravel manages the backend API.',
                'category' => 'Programming',
                'read_time' => 10,
                'is_published' => true,
            ],
            [
                'title' => 'Getting Started with Node.js',
                'content' => 'Node.js is a JavaScript runtime built on Chrome\'s V8 JavaScript engine. It uses an event-driven, non-blocking I/O model that makes it lightweight and efficient.',
                'category' => 'Programming',
                'read_time' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Getting Started with CodeIgniter',
                'content' => 'CodeIgniter is a lightweight PHP framework with a small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.',
                'category' => 'Programming',
                'read_time' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Mastering Vue.js Components',
                'content' => 'Vue.js makes building interactive UIs simple. Components are one of the most powerful features of Vue.js. They help you extend basic HTML elements to encapsulate reusable code.',
                'category' => 'JavaScript',
                'read_time' => 8,
                'is_published' => true,
            ],
            [
                'title' => 'Understanding RESTful APIs',
                'content' => 'REST (Representational State Transfer) is an architectural style for designing networked applications. A RESTful API uses HTTP requests to GET, PUT, POST and DELETE data.',
                'category' => 'Web Development',
                'read_time' => 10,
                'is_published' => true,
            ],
            [
                'title' => 'Responsive Web Design Principles',
                'content' => 'Responsive web design makes your web page look good on all devices. It uses CSS media queries to adapt the layout to different screen sizes.',
                'category' => 'Design',
                'read_time' => 6,
                'is_published' => true,
            ],
            [
                'title' => 'Introduction to Machine Learning',
                'content' => 'Machine learning is a method of data analysis that automates analytical model building. It is a branch of artificial intelligence based on the idea that systems can learn from data.',
                'category' => 'AI',
                'read_time' => 12,
                'is_published' => false,
            ],
            [
                'title' => 'Building Scalable Applications',
                'content' => 'Scalability is the capability of a system to handle a growing amount of work. Building scalable applications requires careful planning and architecture decisions.',
                'category' => 'Software Engineering',
                'read_time' => 15,
                'is_published' => true,
            ],
            [
                'title' => 'Database Optimization Techniques',
                'content' => 'Database optimization involves improving the performance of database queries through various techniques like indexing, query optimization, and proper schema design.',
                'category' => 'Database',
                'read_time' => 8,
                'is_published' => true,
            ],
            [
                'title' => 'Mobile App Development with Flutter',
                'content' => 'Flutter is Google\'s UI toolkit for building natively compiled applications for mobile, web, and desktop from a single codebase.',
                'category' => 'Mobile Development',
                'read_time' => 7,
                'is_published' => true,
            ],
            [
                'title' => 'DevOps Best Practices',
                'content' => 'DevOps is a set of practices that combines software development and IT operations. It aims to shorten the systems development life cycle and provide continuous delivery.',
                'category' => 'DevOps',
                'read_time' => 11,
                'is_published' => true,
            ],
            [
                'title' => 'Cybersecurity Fundamentals',
                'content' => 'Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks. These attacks are usually aimed at accessing, changing, or destroying sensitive information.',
                'category' => 'Security',
                'read_time' => 9,
                'is_published' => true,
            ],
            [
                'title' => 'Cloud Computing Basics',
                'content' => 'Cloud computing is the delivery of computing services over the internet, including servers, storage, databases, networking, software, analytics, and intelligence.',
                'category' => 'Cloud',
                'read_time' => 6,
                'is_published' => true,
            ],
        ];

        foreach ($articles as $index => $articleData) {
            // Get random user for each article
            $user = $users->random();
            
            // Get image URL for this article
            $imageUrl = $imageUrls[$index % count($imageUrls)];
            
            // Check if article already exists
            $existing = Article::where('title', $articleData['title'])
                ->where('user_id', $user->id)
                ->first();
            
            if (!$existing) {
                Article::create([
                    'title' => $articleData['title'],
                    'slug' => Str::slug($articleData['title']) . '-' . Str::random(6),
                    'content' => $articleData['content'],
                    'category' => $articleData['category'],
                    'read_time' => $articleData['read_time'],
                    'is_published' => $articleData['is_published'],
                    'user_id' => $user->id,
                    'image' => $imageUrl,
                ]);
            }
        }
        
        $this->command->info('Successfully seeded ' . count($articles) . ' articles across ' . $users->count() . ' users!');
    }
}