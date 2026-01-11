<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $users = $manager->getRepository(User::class)->findAll();
        

        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(9));
            $article->setDescription($faker->paragraphs(7, true));
            $article->setCreatedAt(new \DateTimeImmutable());
            if (!empty($users)) {
                $article->setAuthor($users[array_rand($users)]); 
            }            
            $article->setIsPublished(true);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
