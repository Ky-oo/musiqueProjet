<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Group;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $groups = [
            ['name' => 'Iron Maiden', 'artists' => ['Bruce Dickinson', 'Steve Harris'], 'popularSongs' => ['The Trooper', 'Fear of the Dark']],
            ['name' => 'AC/DC', 'artists' => ['Brian Johnson', 'Angus Young'], 'popularSongs' => ['Back in Black', 'Highway to Hell']],
            ['name' => 'Guns N\' Roses', 'artists' => ['Axl Rose', 'Slash'], 'popularSongs' => ['Sweet Child o\' Mine', 'November Rain']],
            ['name' => 'Metallica', 'artists' => ['James Hetfield', 'Lars Ulrich'], 'popularSongs' => ['Enter Sandman', 'Nothing Else Matters']],
            ['name' => 'Led Zeppelin', 'artists' => ['Robert Plant', 'Jimmy Page'], 'popularSongs' => ['Stairway to Heaven', 'Whole Lotta Love']],
            ['name' => 'Nirvana', 'artists' => ['Kurt Cobain', 'Krist Novoselic'], 'popularSongs' => ['Smells Like Teen Spirit', 'Come as You Are']],
            ['name' => 'Queen', 'artists' => ['Freddie Mercury', 'Brian May'], 'popularSongs' => ['Bohemian Rhapsody', 'We Will Rock You']],
            ['name' => 'Pink Floyd', 'artists' => ['David Gilmour', 'Roger Waters'], 'popularSongs' => ['Comfortably Numb', 'Wish You Were Here']],
        ];

        foreach ($groups as $groupData) {
            $group = new Group();
            $group->setName($groupData['name']);
            $group->setArtists($groupData['artists']);
            $group->setPopularSongs($groupData['popularSongs']);
            $manager->persist($group);
        }

        $manager->flush();
    }
}
