<?php

namespace App\Templates;

class SubjectTemplateRepository
{
    public function getSubjects(): array
    {
        return [
            'pets' => [
                'cat' => 'Cat',
                'dog' => 'Dog',
                'bunny' => 'Bunny',
                'hamster' => 'Hamster',
                'parrot' => 'Parrot',
                'guinea-pig' => 'Guinea Pig',
            ],
            'wild_animals' => [
                'bear' => 'Bear',
                'fox' => 'Fox',
                'wolf' => 'Wolf',
                'owl' => 'Owl',
                'penguin' => 'Penguin',
                'panda' => 'Panda',
                'shark' => 'Shark',
                'lion' => 'Lion',
                'tiger' => 'Tiger',
                'elephant' => 'Elephant',
            ],
            'mythical' => [
                'dragon' => 'Dragon',
                'unicorn' => 'Unicorn',
                'phoenix' => 'Phoenix',
                'griffin' => 'Griffin',
                'mermaid' => 'Mermaid',
                'pegasus' => 'Pegasus',
            ],
            'fantastic' => [
                'robot' => 'Robot',
                'alien' => 'Alien',
                'ninja' => 'Ninja',
                'pirate' => 'Pirate',
                'astronaut' => 'Astronaut',
                'wizard' => 'Wizard',
            ],
        ];
    }

    public function getCategories(): array
    {
        return [
            'pets' => 'Pets',
            'wild_animals' => 'Wild Animals',
            'mythical' => 'Mythical Creatures',
            'fantastic' => 'Fantastic Characters',
        ];
    }
}
