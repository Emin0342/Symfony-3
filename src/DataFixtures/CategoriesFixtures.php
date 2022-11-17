<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Informatique', null, 1, $manager);
        
        $this->createCategory('Ordinateurs portables', $parent, 2, $manager);
        $this->createCategory('Ecrans', $parent, 3, $manager);
        $this->createCategory('Souris', $parent, 4, $manager);

        $parent = $this->createCategory('Mode', null, 5, $manager);

        $this->createCategory('Homme', $parent, 6, $manager);
        $this->createCategory('Femme', $parent, 7, $manager);
        $this->createCategory('Enfant', $parent, 8, $manager);
                
        $manager->flush();
    }

    public function createCategory(string $name, Categories $parent = null, int $order, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $category->setCategoryOrder($order);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
