<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\City;
use App\Repository\WeatherRepository;
use App\Repository\CityRepository;

class WeatherController extends AbstractController
{
    public function cityAction(City $city, WeatherRepository $weatherRepository): Response
    {
        $weathers = $weatherRepository->findByLocation($city);

        return $this->render('weather/city.html.twig', [
            'city' => $city,
            'weathers' => $weathers,
        ]);
    }

    public function cityActionByName($name, CityRepository $cityRepository, WeatherRepository $weatherRepository): Response
    {
        $weathers = $weatherRepository->findByLocationName($name);

        $cityName = $cityRepository->findOneBy(['Name' => $name]);

        return $this->render('weather/city.html.twig', [
            'city' => $cityName,
            'weathers' => $weathers
        ]);
    }
}
