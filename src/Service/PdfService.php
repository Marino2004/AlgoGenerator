<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;
use App\Entity\Algorithm;

class PdfService
{

    public function __construct(
        private readonly Environment $twig,
    ) { }

    private function setOptions() : Options
    {
        return (new Options())
            ->set('defaultFont', 'Arial');
    }

    private function configureDomPDF( Dompdf $dompdf, $html)
    {
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();

    }
    
    public function exportAlgorithmToPdf(Algorithm $algorithm)
    {
        $domPdf = (new Dompdf)->setOptions($this->setOptions());

        $html = $this->twig->render('pdf/algorithm-subject.html.twig', [
            'title' => $algorithm->getTitle(),
            'theme' => $algorithm->getTheme(),
            'level' => $algorithm->getLevel()->value,
            'description' => $algorithm->getDescription(),
        ]);

        return $this->configureDomPDF($domPdf, $html);

    }
}