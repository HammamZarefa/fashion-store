<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Material;
use App\Models\Product;
use App\Models\Section;
use App\Models\Size;
use App\Models\User;
use Database\Factories\BannerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ["name" => "Red"],
            ["name" => "Blue"],
            ["name" => "Black"],
            ["name" => "White"],
            ["name" => "Green"],
            ["name" => "Gray"]
        ];
        foreach ($colors as $color)
            Color::create($color);

        $matirials = [
            ["name" => "Polyster"],
            ["name" => "Poplin"],
            ["name" => "Muslin"],
            ["name" => "Lawn"],
            ["name" => "Wool"],
            ["name" => "Cotton"],
        ];
        foreach ($matirials as $matirial)
            Material::create($matirial);

        $size = [
            ["name" => "Small"],
            ["name" => "Medium"],
            ["name" => "Large"],
            ["name" => "Extra Large"]];

        foreach ($size as $item)
            Size::create($item);

        $conditions = [
            [
                "name" => [
                    "en" => "New",
                    "ar" => "جديد"
                ],
            ],
            [
                "name" => [
                    "en" => "Exellent",
                    "ar" => "ممتاز"
                ]
            ],
            [
                "name" => [
                    "en" => "Good",
                    "ar" => "جيد"
                ]
            ]
        ];

        foreach ($conditions as $condition)
            Condition::create($condition);

        $sections = [
            ["name" => "Women"],
            ["name" => "Men"],
            ["name" => "Kids"],
            ["name" => "Accessories"],
        ];
        foreach ($sections as $section)
            Section::create($section);

        $categories = [
            ["name" => "Dress"],
            ["name" => "Party Wear"],
            ["name" => "Wedding"],
            ["name" => "Hats"],
        ];

        foreach ($categories as $category)
            Category::create($category);

        $branches = [
            ["name" => "Bab Tuma", "address" => "babtuma"],
            ["name" => "Jaramana", "address" => "jarmana"],
        ];

        foreach ($branches as $branch)
            Branch::create($branch);

        User::factory()->create();
        Product::factory(120)->create();
        Banner::factory(3)->create();

    }


}
