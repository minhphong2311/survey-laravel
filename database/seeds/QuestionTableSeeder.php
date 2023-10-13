<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\QuestionDetail;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'name' => 'What is your current work?',
            'type_id' => '1',
            'active' => true,
            'sort' => '1',
        ]);
        $question2 = Question::create([
            'name' => 'What is your age?',
            'type_id' => '3',
            'active' => true,
            'sort' => '2',
        ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '18-24',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '25-34',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '35-44',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '45-54',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '55-64',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question2->id,
                'name' => '65 and above',
                'sort' => '6',
            ]);
        $question3 = Question::create([
            'name' => 'Do you any disabilities?',
            'type_id' => '3',
            'active' => true,
            'relationship' => '4',
            'relationship_answer' => 'YES',
            'sort' => '3',
        ]);
            QuestionDetail::create([
                'question_id' => $question3->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question3->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        Question::create([
            'name' => 'If YES, what are your disabilities?',
            'type_id' => '1',
            'active' => true,
            'sort' => '4',
        ]);
        $question5 = Question::create([
            'name' => 'What is the highest level of education you have obtained?',
            'type_id' => '3',
            'active' => true,
            'sort' => '5',
        ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'UPSR',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'PMR',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'SPM',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'Technical Certificate (Vocational Programme)',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'College / University',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question5->id,
                'name' => 'No formal education',
                'sort' => '6',
            ]);
        Question::create([
            'name' => 'Do you have any other certificates relevant to your field of work?',
            'type_id' => '1',
            'active' => true,
            'sort' => '6',
        ]);
        Question::create([
            'name' => 'What are your previous work experience? (eg: 2001-2005: ABC Company)',
            'type_id' => '1',
            'active' => true,
            'sort' => '7',
        ]);
        $question8 = Question::create([
            'name' => 'What is your preferred speaking language?',
            'type_id' => '4',
            'active' => true,
            'sort' => '8',
        ]);
            QuestionDetail::create([
                'question_id' => $question8->id,
                'name' => 'English',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question8->id,
                'name' => 'Bahasa Melayu',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question8->id,
                'name' => 'Chinese',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question8->id,
                'name' => 'Tamil',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question8->id,
                'name' => 'Others',
                'sort' => '5',
                'other' => 1
            ]);
        $question9 = Question::create([
            'name' => 'What is your preferred reading language?',
            'type_id' => '4',
            'active' => true,
            'sort' => '9',
        ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'English',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'Bahasa Melayu',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'Chinese',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'Tamil',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'Illiterate / Cannot read well',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question9->id,
                'name' => 'Others',
                'sort' => '6',
                'other' => 1
            ]);
        $question10 = Question::create([
            'name' => 'Are you registered with KWSP?',
            'type_id' => '3',
            'active' => true,
            'sort' => '10',
        ]);
            QuestionDetail::create([
                'question_id' => $question10->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question10->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question11 = Question::create([
            'name' => 'Do you have any criminal records?',
            'type_id' => '3',
            'active' => true,
            'sort' => '11',
        ]);
            QuestionDetail::create([
                'question_id' => $question11->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question11->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question12 = Question::create([
            'name' => 'Do you have any chronic diseases or allergies?',
            'type_id' => '3',
            'relationship' => '13',
            'relationship_answer' => 'YES',
            'active' => true,
            'sort' => '12',
        ]);
            QuestionDetail::create([
                'question_id' => $question12->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question12->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        Question::create([
            'name' => 'If you do have a chronic illness or allergy please state below: ',
            'type_id' => '1',
            'active' => true,
            'sort' => '13',
        ]);
        $question14 = Question::create([
            'name' => 'Do you have access to the internet?',
            'type_id' => '3',
            'active' => true,
            'sort' => '14',
        ]);
            QuestionDetail::create([
                'question_id' => $question14->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question14->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question15 = Question::create([
            'name' => 'Do you own a mobile phone/ smart phone?',
            'type_id' => '3',
            'active' => true,
            'sort' => '15',
        ]);
            QuestionDetail::create([
                'question_id' => $question15->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question15->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question16 = Question::create([
            'name' => 'What do you normally do on your mobile phone / smart phone?',
            'type_id' => '4',
            'active' => true,
            'sort' => '16',
        ]);
            QuestionDetail::create([
                'question_id' => $question16->id,
                'name' => 'Browsing internet',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question16->id,
                'name' => 'Social media',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question16->id,
                'name' => 'Chat platforms (wechat / whatsapp / messenger)',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question16->id,
                'name' => 'Play games',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question16->id,
                'name' => 'Others',
                'sort' => '5',
                'other' => 1
            ]);
        $question17 = Question::create([
            'name' => 'Do you own a laptop / desktop computer?',
            'type_id' => '3',
            'active' => true,
            'sort' => '17',
        ]);
            QuestionDetail::create([
                'question_id' => $question17->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question17->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question18 = Question::create([
            'name' => 'What do you normally do on your laptop / desktop computer?',
            'type_id' => '4',
            'active' => true,
            'sort' => '18',
        ]);
            QuestionDetail::create([
                'question_id' => $question18->id,
                'name' => 'Browsing internet',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question18->id,
                'name' => 'Social media',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question18->id,
                'name' => 'Chat platforms',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question18->id,
                'name' => 'Play games',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question18->id,
                'name' => 'Others',
                'sort' => '5',
                'other' => 1
            ]);
        $question19 = Question::create([
            'name' => 'On a scale of 0-10, how familiar are you with using websites? (e.g. google / jobstreet / mudah)',
            'type_id' => '5',
            'active' => true,
            'sort' => '19',
        ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '1',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '2',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '3',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '4',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '5',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '6',
                'sort' => '6',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '7',
                'sort' => '7',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '8',
                'sort' => '8',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '9',
                'sort' => '9',
            ]);
            QuestionDetail::create([
                'question_id' => $question19->id,
                'name' => '10',
                'sort' => '10',
            ]);
        $question20 = Question::create([
            'name' => 'On a scale of 0-10, how familiar are you with using mobile apps? (e.g. whatsapp / shopee / facebook)',
            'type_id' => '5',
            'active' => true,
            'sort' => '20',
        ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '1',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '2',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '3',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '4',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '5',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '6',
                'sort' => '6',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '7',
                'sort' => '7',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '8',
                'sort' => '8',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '9',
                'sort' => '9',
            ]);
            QuestionDetail::create([
                'question_id' => $question20->id,
                'name' => '10',
                'sort' => '10',
            ]);
        $question21 = Question::create([
            'name' => 'Did you use any online job seeking platforms before?',
            'type_id' => '4',
            'active' => true,
            'sort' => '21',
        ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Jobstreet',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'FastJobs',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Linkedin',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Facebook',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Mudah',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Others',
                'sort' => '6',
                'other' => 1
            ]);
            QuestionDetail::create([
                'question_id' => $question21->id,
                'name' => 'Have not used any before',
                'sort' => '7',
            ]);
        $question22 = Question::create([
            'name' => 'From a scale of 0-10, how likely is it for you to find a job online?',
            'type_id' => '5',
            'active' => true,
            'sort' => '22',
        ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '1',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '2',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '3',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '4',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '5',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '6',
                'sort' => '6',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '7',
                'sort' => '7',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '8',
                'sort' => '8',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '9',
                'sort' => '9',
            ]);
            QuestionDetail::create([
                'question_id' => $question22->id,
                'name' => '10',
                'sort' => '10',
            ]);
        $question23 = Question::create([
            'name' => "When finding a job online, what do you think could've been helpful for you during your job search?",
            'type_id' => '4',
            'active' => true,
            'sort' => '23',
        ]);
            QuestionDetail::create([
                'question_id' => $question23->id,
                'name' => 'More details about employer & the company',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question23->id,
                'name' => 'More description on the job scope',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question23->id,
                'name' => 'More photos of the workplace',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question23->id,
                'name' => 'Direct contact to the employer',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question23->id,
                'name' => 'Others',
                'sort' => '5',
                'other' => 1
            ]);
        $question24 = Question::create([
            'name' => "How did you find your current / previous job?",
            'type_id' => '4',
            'active' => true,
            'sort' => '24',
        ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Friend / family recommendation',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Online platform',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Job agent',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Walk in',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Newspaper / magazine',
                'sort' => '5',
            ]);
            QuestionDetail::create([
                'question_id' => $question24->id,
                'name' => 'Others',
                'sort' => '6',
                'other' => 1
            ]);
        $question25 = Question::create([
            'name' => 'Does resume/ CV play an important part in your field?',
            'type_id' => '3',
            'active' => true,
            'sort' => '25',
        ]);
            QuestionDetail::create([
                'question_id' => $question25->id,
                'name' => 'YES',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question25->id,
                'name' => 'NO',
                'sort' => '2',
            ]);
        $question26 = Question::create([
            'name' => 'Rank the importance of below factors when you are looking for a job (1 being most important, 5 being least important).',
            'type_id' => '7',
            'active' => true,
            'sort' => '26',
        ]);
            QuestionDetail::create([
                'question_id' => $question26->id,
                'name' => 'Salary',
                'sort' => '1',
            ]);
            QuestionDetail::create([
                'question_id' => $question26->id,
                'name' => 'Working hours',
                'sort' => '2',
            ]);
            QuestionDetail::create([
                'question_id' => $question26->id,
                'name' => 'Job location / distance from home',
                'sort' => '3',
            ]);
            QuestionDetail::create([
                'question_id' => $question26->id,
                'name' => 'Work environment',
                'sort' => '4',
            ]);
            QuestionDetail::create([
                'question_id' => $question26->id,
                'name' => 'Other benefits (eg. healthcare, commissions)',
                'sort' => '5',
            ]);
    }
}
