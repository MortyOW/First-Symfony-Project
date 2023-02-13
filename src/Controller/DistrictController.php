<?php

namespace App\Controller;

use App\Repository\DistrictRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DistrictController extends AbstractController
{
    #[Route('/district/{id}', name: 'district_show')]
    public function show($id, DistrictRepository $districtRepository): Response
    {
        $district = $districtRepository->find($id);
        if(!$district){
            throw $this->createNotFoundException('District Not Found');
        }
        return $this->render('district/index.html.twig', [
            'district' => $districtRepository->find($id),
        ]);
    }
}
