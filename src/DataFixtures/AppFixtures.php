<?php

namespace App\DataFixtures;

use App\Entity\District;
use App\Entity\Product;
use App\Entity\ProductRestaurant;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 20; $i++){
            $district = new District();
            $district->setName('District' . $i);
            $district->setPopulation(rand(50000, 200000));
            $manager->persist($district);
        }

        $manager->flush();

        for($i = 1; $i <= 10; $i++){
            $product = new Product();
            $product->setName('Product' . $i);
            $manager->persist($product);
        }

        $districtRepository = $manager->getRepository(District::class);
        $districts = $districtRepository->findAll();

        foreach ($districts as $dist){
            for($i = 1; $i <=10; $i++){
                $restaurant = new Restaurant();
                $restaurant->setName('Restaurant ' . $i . ' du ' . $dist->getName());
                $restaurant->setDistrict($dist);
                $manager->persist($restaurant);
            }
        }
        $manager->flush();

        $restaurantRepository = $manager->getRepository(Restaurant::class);
        $restaurants = $restaurantRepository->findAll();

        $productRepository = $manager->getRepository(Product::class);
        $products = $productRepository->findAll();

        foreach ($products as $prod){
            foreach ($restaurants as $rest){
                $productRestaurant = new ProductRestaurant();
                $productRestaurant->setPrice(rand(50,180)/10);
                $productRestaurant->setProduct($prod);
                $productRestaurant->setRestaurant($rest);
                $productRestaurant->setStock(rand(0, 500));
                $manager->persist($productRestaurant);
            }
        }
        $manager->flush();
    }
}
