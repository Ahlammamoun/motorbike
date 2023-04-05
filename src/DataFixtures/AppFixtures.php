<?php 

namespace App\DataFixtures;


use App\DataFixtures\Provider\MovieTimeProvider;
use Doctrine\bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Casting;
use App\Entity\Season;
use App\Entity\User;
use DateTime;
use Faker\Factory as Faker;
use Doctrine\DBAL\Connection;
use Symfony\Component\PasswordHasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
   
    public function __construct(Connection $connection, UserPasswordHasherInterface $hasher){

        $this->connection = $connection;
        $this->$hasher = $hasher;
    }

    public function load()
    { 
                
  
        $doctrine->flush();

    }

}