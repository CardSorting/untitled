<?php

namespace App\Templates;

class SubjectTemplateRepository
{
    public function getSubjectsWithCountries(): array
    {
        return [
            'team_sports' => [
                'basketball-player' => ['label' => 'Basketball Player', 'country' => 'us'],
                'soccer-player' => ['label' => 'Soccer Player', 'country' => 'br'],
                'baseball-player' => ['label' => 'Baseball Player', 'country' => 'jp'],
                'hockey-player' => ['label' => 'Hockey Player', 'country' => 'ca'],
                'cricket-player' => ['label' => 'Cricket Player', 'country' => 'in'],
                'volleyball-player' => ['label' => 'Volleyball Player', 'country' => 'it'],
            ],
            'individual_sports' => [
                'tennis-player' => ['label' => 'Tennis Player', 'country' => 'es'],
                'gymnast' => ['label' => 'Gymnast', 'country' => 'ru'],
                'swimmer' => ['label' => 'Swimmer', 'country' => 'us'],
                'track-athlete' => ['label' => 'Track Athlete', 'country' => 'jm'],
                'skater' => ['label' => 'Skater', 'country' => 'kr'],
                'golfer' => ['label' => 'Golfer', 'country' => 'ie'],
            ],
            'combat_sports' => [
                'boxer' => ['label' => 'Boxer', 'country' => 'mx'],
                'wrestler' => ['label' => 'Wrestler', 'country' => 'us'],
                'martial-artist' => ['label' => 'Martial Artist', 'country' => 'cn'],
                'fencer' => ['label' => 'Fencer', 'country' => 'fr'],
                'judoka' => ['label' => 'Judoka', 'country' => 'jp'],
            ],
            'esports' => [
                'pro-gamer' => ['label' => 'Pro Gamer', 'country' => 'kr'],
                'streamer' => ['label' => 'Streamer', 'country' => 'us'],
                'team-captain' => ['label' => 'Team Captain', 'country' => 'dk'],
                'coach' => ['label' => 'Coach', 'country' => 'se'],
                'tournament-player' => ['label' => 'Tournament Player', 'country' => 'cn'],
            ],
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
            'healthcare' => [
                'doctor' => ['label' => 'Doctor', 'country' => 'de'],
                'nurse' => ['label' => 'Nurse', 'country' => 'gb'],
                'surgeon' => ['label' => 'Surgeon', 'country' => 'us'],
                'pharmacist' => ['label' => 'Pharmacist', 'country' => 'fr'],
                'dentist' => ['label' => 'Dentist', 'country' => 'ch'],
                'paramedic' => ['label' => 'Paramedic', 'country' => 'au'],
                'veterinarian' => ['label' => 'Veterinarian', 'country' => 'ca'],
                'therapist' => ['label' => 'Therapist', 'country' => 'nl'],
            ],
            'tech' => [
                'programmer' => ['label' => 'Programmer', 'country' => 'us'],
                'designer' => ['label' => 'Designer', 'country' => 'se'],
                'data-scientist' => ['label' => 'Data Scientist', 'country' => 'il'],
                'sysadmin' => ['label' => 'System Administrator', 'country' => 'de'],
                'game-dev' => ['label' => 'Game Developer', 'country' => 'jp'],
                'cybersecurity' => ['label' => 'Cybersecurity Expert', 'country' => 'ee'],
                'devops' => ['label' => 'DevOps Engineer', 'country' => 'nz'],
                'qa-engineer' => ['label' => 'QA Engineer', 'country' => 'pl'],
            ],
            'education' => [
                'teacher' => 'Teacher',
                'professor' => 'Professor',
                'researcher' => 'Researcher',
                'librarian' => 'Librarian',
                'coach' => 'Coach',
                'tutor' => 'Tutor',
                'counselor' => 'Counselor',
                'principal' => 'Principal',
            ],
            'business' => [
                'entrepreneur' => 'Entrepreneur',
                'manager' => 'Manager',
                'consultant' => 'Consultant',
                'accountant' => 'Accountant',
                'lawyer' => 'Lawyer',
                'marketer' => 'Marketer',
                'analyst' => 'Business Analyst',
                'hr-specialist' => 'HR Specialist',
            ],
            'creative' => [
                'artist' => 'Artist',
                'musician' => 'Musician',
                'writer' => 'Writer',
                'photographer' => 'Photographer',
                'filmmaker' => 'Filmmaker',
                'architect' => 'Architect',
                'chef' => 'Chef',
                'fashion-designer' => 'Fashion Designer',
            ],
        ];
    }

    public function getCategories(): array
    {
        return [
            'team_sports' => 'Team Sports',
            'individual_sports' => 'Individual Sports',
            'combat_sports' => 'Combat Sports',
            'esports' => 'Esports',
            'pets' => 'Pets',
            'wild_animals' => 'Wild Animals',
            'mythical' => 'Mythical Creatures',
            'fantastic' => 'Fantastic Characters',
            'healthcare' => 'Healthcare Professionals',
            'tech' => 'Technology Professionals',
            'education' => 'Education Professionals',
            'business' => 'Business Professionals',
            'creative' => 'Creative Professionals',
        ];
    }
}
