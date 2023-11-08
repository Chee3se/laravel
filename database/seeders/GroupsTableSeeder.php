<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use DOMDocument;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $html = file_get_contents('http://pt.edu.lv/pt/stundas.php');
        $html = preg_replace('/<style\b[^>]*>.*?<\/style>/is', '', $html);
        $DOM = new DOMDocument();
        @$DOM->loadHTML($html);
        $foundGroups = $DOM->getElementsByTagName('a');
        foreach ($foundGroups as $link) {
            $href = $link->getAttribute('href');
            if (preg_match('/\?id=m&g=([^&]+)/', $href, $matches)) {
                $groupName = $matches[1];
                Group::create(['name' => $groupName]);
            }
        }
    }
}
