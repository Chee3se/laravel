<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Group;
use DOMDocument;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            $html = file_get_contents('http://pt.edu.lv/pt/stundas.php?id=m&g='.$group['name']);
            $html = preg_replace('/<style\b[^>]*>.*?<\/style>/is', '', $html);
            $DOM = new DOMDocument();
            @$DOM->loadHTML($html);
            $foundLessons = $DOM->getElementsByTagName('td');
            $day = 0;
            $lesson = ':/';
            $teacher = ':/';
            $started = false;
            $count = 0;
            foreach ($foundLessons as $foundLesson) {
                $text = $foundLesson->nodeValue;
                // Incrementing day
                if ($started == true) {

                    if (str_contains($text, 'Pārst.')) {

                        $day++;

                    } else if (!is_numeric($text) && !str_contains($text, "\n")) {
                        if ($count == 0) {

                            $lesson = $text;
                            $count = 1;

                        } else if ($count == 1) {

                            $teacher = $text;
                            $count = 2;

                        } else  {
                            if ($count == 2) {
                                if (empty($text)) {
                                    Lesson::create([
                                        'day' => $day,
                                        'group' => $group['name'],
                                        'lesson' => $lesson,
                                        'teacher' => $teacher,
                                    ]);
                                    $count = 0;
                                } else {

                                    $lesson = $text;
                                    $count = 3;

                                }
                            } else if ($count == 3) {

                                Lesson::create([
                                    'day' => $day,
                                    'group' => $group['name'],
                                    'lesson' => $lesson,
                                    'teacher' => $text,
                                ]);
                                $count = 0;
                            }

                        }

                    }
                }
                // Getting valuable info
                if ($text == "Dienas ") {
                    $started = true;
                }
            }
        }
    }
}
