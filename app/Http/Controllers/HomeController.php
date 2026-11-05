<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'roomRates' => [
                'Twin' => 3500,
                'Queen' => 4200,
                'King' => 5500,
            ],
            'checkInTime' => '2:00 PM',
            'checkOutTime' => '12:00 noon',
            'menuSections' => [
                [
                    'title' => 'From the grill',
                    'image' => 'images/food/steak.jpg',
                    'alt' => 'Grilled steak served with vegetables and herb butter.',
                    'source' => 'https://www.pexels.com/photo/close-up-of-meet-18563182/',
                    'items' => [
                        [
                            'name' => 'House steak frites',
                            'description' => 'Grilled sirloin, crisp potatoes, and herb butter.',
                            'price' => 1450,
                        ],
                        [
                            'name' => 'Pepper-crusted ribeye',
                            'description' => 'Ribeye with pepper sauce and seasonal greens.',
                            'price' => 1680,
                        ],
                    ],
                ],
                [
                    'title' => 'From the kitchen',
                    'image' => 'images/food/pasta.jpg',
                    'alt' => 'Rigatoni pasta with tomato sauce and Parmesan.',
                    'source' => 'https://www.pexels.com/photo/delicious-rigatoni-pasta-with-parmesan-cheese-37180268/',
                    'items' => [
                        [
                            'name' => 'Rigatoni pomodoro',
                            'description' => 'Tomato sauce, fresh herbs, and shaved Parmesan.',
                            'price' => 680,
                        ],
                        [
                            'name' => 'Creamy mushroom pasta',
                            'description' => 'Mushrooms, cream, and aged cheese.',
                            'price' => 720,
                        ],
                    ],
                ],
                [
                    'title' => 'Something sweet',
                    'image' => 'images/food/dessert.jpg',
                    'alt' => 'Chocolate and strawberries arranged on a dessert plate.',
                    'source' => 'https://www.pexels.com/photo/chocolates-and-strawberries-on-plate-18784859/',
                    'items' => [
                        [
                            'name' => 'Chocolate lava cake',
                            'description' => 'Warm chocolate cake with vanilla cream.',
                            'price' => 320,
                        ],
                        [
                            'name' => 'Mango cheesecake',
                            'description' => 'Creamy cheesecake with mango and calamansi.',
                            'price' => 300,
                        ],
                    ],
                ],
            ],
        ]);
    }
}
