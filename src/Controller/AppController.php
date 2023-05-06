<?php

namespace App\Controller;

use App\Form\CoverType;
use App\Traits\EntityManagerTrait;
use OpenAI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

class AppController extends AbstractController
{

    use EntityManagerTrait;
    #[Route('/app/cover', name: 'cover')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(CoverType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cover = $form->getData();
            $apiKey = $_ENV['OPENAI_API_KEY'];
            $client = OpenAI::client($apiKey);
            $response= $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' =>[
                              ['role'=>'user', 'content' =>'Mon nom est '.$cover['nom'].' '.$cover['prenom'] . '.'],
                                ['role'=>'user', 'content' =>'Je suis titulaire d\'un diplôme '.$cover['diplome'] . '.'],
                                ['role'=>'user', 'content' =>'Entreprise cible: '.$cover['entreprise'] . '.'],
                                ['role'=>'user', 'content' =>'Poste visé est :'.$cover['poste'] . '.'],
                                ['role'=>'user', 'content' =>'Annone :'.$cover['annonce'] . '.'],
                                ['role'=>'user', 'content'=>'Ecrivez une lettre de motivation convaincante et personnalisée' . '.'],
                    ],
            ]);
                    $message = $response->toArray()['choices'][0]['message']['content'];
                    //to pdf
                    $pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 5, 5);
                    $pdf->writeHTML($message,);

                    return $this->render('main/index.html.twig', [

                        'message' => $pdf ->output('motivation.pdf'),
                        'cover' => $cover,
                    ]);

        }

        return $this->render('app/index.html.twig', [
            'form' => $form,
            'message' => $message ?? null,

        ]);
    }
}
