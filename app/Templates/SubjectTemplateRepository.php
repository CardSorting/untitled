<?php

namespace App\Templates;

class SubjectTemplateRepository
{
    public function getSubjects(): array
    {
        return [
            'team_sports' => [
                'basketball-player' => 'Basketball Player',
                'soccer-player' => 'Soccer Player',
                'baseball-player' => 'Baseball Player',
                'hockey-player' => 'Hockey Player',
                'cricket-player' => 'Cricket Player',
                'volleyball-player' => 'Volleyball Player',
            ],
            'individual_sports' => [
                'tennis-player' => 'Tennis Player',
                'gymnast' => 'Gymnast',
                'swimmer' => 'Swimmer',
                'track-athlete' => 'Track Athlete',
                'skater' => 'Skater',
                'golfer' => 'Golfer',
            ],
            'combat_sports' => [
                'boxer' => 'Boxer',
                'wrestler' => 'Wrestler',
                'martial-artist' => 'Martial Artist',
                'fencer' => 'Fencer',
                'judoka' => 'Judoka',
            ],
            'esports' => [
                'pro-gamer' => 'Pro Gamer',
                'streamer' => 'Streamer',
                'team-captain' => 'Team Captain',
                'coach' => 'Coach',
                'tournament-player' => 'Tournament Player',
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
                'doctor' => 'Doctor',
                'nurse' => 'Nurse',
                'surgeon' => 'Surgeon',
                'pharmacist' => 'Pharmacist',
                'dentist' => 'Dentist',
                'paramedic' => 'Paramedic',
                'veterinarian' => 'Veterinarian',
                'therapist' => 'Therapist',
            ],
            'tech' => [
                'programmer' => 'Programmer',
                'designer' => 'Designer',
                'data-scientist' => 'Data Scientist',
                'sysadmin' => 'System Administrator',
                'game-dev' => 'Game Developer',
                'cybersecurity' => 'Cybersecurity Expert',
                'devops' => 'DevOps Engineer',
                'qa-engineer' => 'QA Engineer',
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
