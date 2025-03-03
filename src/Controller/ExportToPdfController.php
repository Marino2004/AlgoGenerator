<?php

namespace App\Controller;

use App\Entity\Algorithm;
use App\Service\PdfService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExportToPdfController extends AbstractController
{
    #[Route('{id}/export', name: 'app_pdf')]
    public function export(Algorithm $algorithm, PdfService $pdfService)
    {
        $pdfContent = $pdfService->exportAlgorithmToPdf($algorithm);

        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="algo.pdf"',
        ]);
    }
}
