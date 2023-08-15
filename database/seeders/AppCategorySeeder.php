<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Art & Design',
                'description' => 'Explore the world of art, design, and creativity. Discover inspiring artworks, designs, and artistic concepts.',
                'slug' => 'art-and-design',
                'status' => 'Publish',
            ],
            [
                'name' => 'Auto & Vehicles',
                'description' => 'Get information about automobiles, vehicles, and the automotive industry. Stay updated on the latest trends and innovations.',
                'slug' => 'auto-and-vehicles',
                'status' => 'Publish',
            ],
            [
                'name' => 'Beauty',
                'description' => 'Discover beauty tips, makeup tutorials, skincare routines, and product recommendations to enhance your natural beauty.',
                'slug' => 'beauty',
                'status' => 'Publish',
            ],
            [
                'name' => 'Books',
                'description' => 'Find your next great read! Explore a vast collection of books, reviews, and literary discussions.',
                'slug' => 'books',
                'status' => 'Publish',
            ],
            [
                'name' => 'Business',
                'description' => 'Stay informed about the business world, entrepreneurship, corporate strategies, and market trends.',
                'slug' => 'business',
                'status' => 'Publish',
            ],
            [
                'name' => 'Comics',
                'description' => 'Laugh, enjoy, and explore the world of comics. Follow your favorite comic strips and graphic novels.',
                'slug' => 'comics',
                'status' => 'Publish',
            ],
            [
                'name' => 'Communication',
                'description' => 'Improve your communication skills, learn about effective communication techniques, and explore various communication tools.',
                'slug' => 'communication',
                'status' => 'Publish',
            ],
            [
                'name' => 'Dating',
                'description' => 'Navigate the world of dating, relationships, and love. Get tips on building healthy and meaningful connections.',
                'slug' => 'dating',
                'status' => 'Publish',
            ],
            [
                'name' => 'Developer tools',
                'description' => 'Explore a range of developer tools, programming languages, and resources to enhance your coding skills.',
                'slug' => 'developer-tools',
                'status' => 'Publish',
            ],
            [
                'name' => 'Education',
                'description' => 'Access educational resources, online courses, and learning materials across various subjects and disciplines.',
                'slug' => 'education',
                'status' => 'Publish',
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Stay entertained with the latest news, updates, and gossips from the world of entertainment.',
                'slug' => 'entertainment',
                'status' => 'Publish',
            ],
            [
                'name' => 'Events',
                'description' => 'Stay updated on upcoming events, concerts, festivals, and gatherings near you.',
                'slug' => 'events',
                'status' => 'Publish',
            ],
            [
                'name' => 'Finance',
                'description' => 'Manage your finances better with tips on budgeting, saving, investing, and financial planning.',
                'slug' => 'finance',
                'status' => 'Publish',
            ],
            [
                'name' => 'Food & Drink',
                'description' => 'Delight your taste buds with recipes, cooking tips, restaurant reviews, and discussions about food and beverages.',
                'slug' => 'food-and-drink',
                'status' => 'Publish',
            ],
            [
                'name' => 'Games',
                'description' => 'Dive into the exciting world of gaming. Get the latest game reviews, updates, and strategies.',
                'slug' => 'games',
                'status' => 'Publish',
            ],
            [
                'name' => 'Government & Politics',
                'description' => 'Stay informed about government policies, political developments, and global affairs.',
                'slug' => 'government-and-politics',
                'status' => 'Publish',
            ],
            [
                'name' => 'Health & Fitness',
                'description' => 'Prioritize your health and well-being. Get fitness tips, workout routines, and advice on leading a healthy lifestyle.',
                'slug' => 'health-and-fitness',
                'status' => 'Publish',
            ],
            [
                'name' => 'House & Home',
                'description' => 'Discover home improvement ideas, interior design inspiration, and tips for maintaining a comfortable living space.',
                'slug' => 'house-and-home',
                'status' => 'Publish',
            ],
            [
                'name' => 'Kids & Family',
                'description' => "Find resources for parenting, kids' activities, family bonding, and child development.",
                'slug' => 'kids-and-family',
                'status' => 'Publish',
            ],
            [
                'name' => 'Libraries & Demo',
                'description' => 'Explore demo versions of apps and software or find information about libraries and their services.',
                'slug' => 'libraries-and-demo',
                'status' => 'Publish',
            ],
            [
                'name' => 'Lifestyle',
                'description' => 'Enhance your lifestyle with tips on fashion, travel, relationships, and personal development.',
                'slug' => 'lifestyle',
                'status' => 'Publish',
            ],
            [
                'name' => 'Maps & Navigation',
                'description' => 'Navigate and explore the world with maps, GPS tools, and location-based services.',
                'slug' => 'maps-and-navigation',
                'status' => 'Publish',
            ],
            [
                'name' => 'Medical',
                'description' => 'Get information about medical conditions, treatments, healthcare news, and wellness tips.',
                'slug' => 'medical',
                'status' => 'Publish',
            ],
            [
                'name' => 'Music',
                'description' => 'Immerse yourself in the world of music. Discover new artists, genres, and music trends.',
                'slug' => 'music',
                'status' => 'Publish',
            ],
            [
                'name' => 'Music & Audio',
                'description' => 'Listen to music and audio content, including podcasts, audiobooks, and more.',
                'slug' => 'music-and-audio',
                'status' => 'Publish',
            ],
            [
                'name' => 'Navigation',
                'description' => 'Find your way around with navigation tools, GPS technology, and mapping services.',
                'slug' => 'navigation',
                'status' => 'Publish',
            ],
            [
                'name' => 'News',
                'description' => 'Stay updated with the latest news and current events from around the world.',
                'slug' => 'news',
                'status' => 'Publish',
            ],
            [
                'name' => 'News & Magazines',
                'description' => 'Access a diverse range of news articles and digital magazines on various topics.',
                'slug' => 'news-and-magazines',
                'status' => 'Publish',
            ],
            [
                'name' => 'Parenting',
                'description' => 'Discover tips, advice, and resources for parents to raise happy and healthy children.',
                'slug' => 'parenting',
                'status' => 'Publish',
            ],
            [
                'name' => 'Personal Finance',
                'description' => 'Learn about managing personal finances, budgeting, investing, and financial goals.',
                'slug' => 'personal-finance',
                'status' => 'Publish',
            ],
            [
                'name' => 'Personalization',
                'description' => 'Personalize your digital experience with customization options for apps, devices, and platforms.',
                'slug' => 'personalization',
                'status' => 'Publish',
            ],
            [
                'name' => 'Photo & Video',
                'description' => 'Explore the world of photography and videography. Learn tips and techniques to capture stunning visuals.',
                'slug' => 'photo-and-video',
                'status' => 'Publish',
            ],
            [
                'name' => 'Photography',
                'description' => 'Discover inspiring photographs, photography gear, and tips to improve your photography skills.',
                'slug' => 'photography',
                'status' => 'Publish',
            ],
            [
                'name' => 'Productivity',
                'description' => 'Boost your productivity with tools, tips, and strategies for better time management and efficiency.',
                'slug' => 'productivity',
                'status' => 'Publish',
            ],
            [
                'name' => 'Reference',
                'description' => 'Access a wide range of reference materials, encyclopedias, dictionaries, and more.',
                'slug' => 'reference',
                'status' => 'Publish',
            ],
            [
                'name' => 'Shopping',
                'description' => 'Find the best deals, discounts, and product recommendations for your shopping needs.',
                'slug' => 'shopping',
                'status' => 'Publish',
            ],
            [
                'name' => 'Social',
                'description' => 'Explore social issues, human interactions, and societal trends.',
                'slug' => 'social',
                'status' => 'Publish',
            ],
            [
                'name' => 'Social Networking',
                'description' => 'Connect and interact with friends, family, and like-minded individuals on social networking platforms.',
                'slug' => 'social-networking',
                'status' => 'Publish',
            ],
            [
                'name' => 'Sports',
                'description' => 'Get the latest updates, scores, and news from the world of sports and athletics.',
                'slug' => 'sports',
                'status' => 'Publish',
            ],
            [
                'name' => 'Tools',
                'description' => 'Discover a variety of tools and utilities to simplify everyday tasks and projects.',
                'slug' => 'tools',
                'status' => 'Publish',
            ],
            [
                'name' => 'Travel',
                'description' => 'Plan your next adventure! Find travel tips, destination guides, and travel experiences.',
                'slug' => 'travel',
                'status' => 'Publish',
            ],
            [
                'name' => 'Travel & Local',
                'description' => 'Explore local attractions, restaurants, and events while traveling or in your hometown.',
                'slug' => 'travel-and-local',
                'status' => 'Publish',
            ],
            [
                'name' => 'Utilities',
                'description' => 'Access essential utility apps and services for your devices and everyday tasks.',
                'slug' => 'utilities',
                'status' => 'Publish',
            ],
            [
                'name' => 'Utilities & Tools',
                'description' => 'Find a wide range of utility tools and resources to enhance your productivity and efficiency.',
                'slug' => 'utilities-and-tools',
                'status' => 'Publish',
            ],
            [
                'name' => 'Video Players & Editors',
                'description' => 'Play and edit videos with various video player and editing apps.',
                'slug' => 'video-players-and-editors',
                'status' => 'Publish',
            ],
            [
                'name' => 'Weather',
                'description' => 'Stay updated on current weather conditions, forecasts, and meteorological news.',
                'slug' => 'weather',
                'status' => 'Publish',
            ],
        ];

        foreach ($data as $key => $value) {
            \App\Models\AppCategory::create($value);
        }
    }
}
