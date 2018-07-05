<?php

namespace App\Controller;

use App\Utils\Asciify;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AsciiController extends Controller
{

    /**
     * @Route("/ascii/{string}", name="ascii")
     * @param $string
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function asciiTable(string $string)
    {
        $word = new Asciify($string);

        return $this->render('ascii/index.html.twig', [
            'table' => $word->splitStringToAscii(),
        ]);
    }

}
