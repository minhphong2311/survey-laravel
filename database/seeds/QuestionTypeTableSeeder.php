<?php

use Illuminate\Database\Seeder;
use App\QuestionType;

class QuestionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionType::truncate();
        QuestionType::create([
            'name' => 'Text field single',
            'code' => 'TEXT',
            'active' => true,
            'sort' => 1,
        ]);
        QuestionType::create([
            'name' => 'Text field multi line',
            'code' => 'TEXT_AREA',
            'active' => true,
            'sort' => 2,
        ]);
        QuestionType::create([
            'name' => 'Radio button',
            'code' => 'RADIO_BUTTON',
            'active' => true,
            'sort' => 3,
        ]);
        QuestionType::create([
            'name' => 'Checkbox',
            'code' => 'CHECKBOX',
            'active' => true,
            'sort' => 4,
        ]);
        QuestionType::create([
            'name' => 'Radio button range',
            'code' => 'RADIO_BUTTON_RANGE',
            'active' => true,
            'sort' => 5,
        ]);
        QuestionType::create([
            'name' => 'Show IC number',
            'code' => 'SHOW_IC',
            'active' => true,
            'sort' => 6,
        ]);
        QuestionType::create([
            'name' => 'Sort',
            'code' => 'SORT',
            'active' => true,
            'sort' => 7,
        ]);
        QuestionType::create([
            'name' => 'Date picker',
            'code' => 'DATE_PICKER',
            'active' => false,
            'sort' => 8,
        ]);
        QuestionType::create([
            'name' => 'Image upload',
            'code' => 'IMAGE',
            'active' => false,
            'sort' => 9,
        ]);
    }
}
