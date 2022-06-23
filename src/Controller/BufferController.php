<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BufferController extends AbstractController
{

    public function __construct()
    {
    }

    #[Route('/buffer', name: 'app_buffer')]
    public function index(): Response
    {
        return $this->render('buffer/index.html.twig', [
            'controller_name' => 'BufferController',
        ]);
    }


    public function __invoke()
    {



        // // $httpClient = HttpClient::create(['headers' => [
        // //     'Authorization' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NTU5NzYzMDAsImV4cCI6MTY1NTk3NjkwMCwicm9sZXMiOlsiUk9MRV9TWVNURU0iLCJST0xFX1VTRVIiXSwiaWQiOjEsInVzZXJuYW1lIjoiYXhlbC5sdW5nQG91dGxvb2suZnIifQ.kXsAePQe2O6TfmrFDI77P7B_2nL72odPFJRbhxzsHZ5CEB2mHZpPeNVVJvE4HAZiodh1wm66chi-eoECTGVlDwR3EIMSGfi0baud9iX2BOkIqKx-N4AVNtqcdySQ0OVvKRCxZaZcOs9Cv4lOtNfjrwFZqcDAPfIdmC2goqvMdddiM8ZdTobfLdFIfVqjDotgRMcB_aNclemDui4Kv2BKTvm8QqzMiX8Ex9DN8nlGUiMGs8UQHN84jDK4YfejXSqvGRfxUlMrMdMEAilK4I3FBa-znC1YQ_WnAzTtpngV4i_lpmdubqQAZ-bzu4cDEy5pOVkuI7XwRvAg1PRTkHvyzgxQUDlXdt8aS3o1NajsMmLFZrSyUA-MAdZEI1YtHVx739bUuvmZBbZcsA5hCoYrg1BrWpKkAAjIz0bfZ_rbsVTWjPKQYDHAl1vAeWlisX9lwBOtgxJhehZQADhtvVABSgbP9-WoVq70ScNMQQ7dyQmnnbqzt2l4LjIl8r-bXLZY8nIY5MSNdp5Lkes2Dv8gayBThS8EAlO39GecN6cy-ITIvB6FhncL4aC7JOM8GS4OIzDENc-gEaLzSWKK1N2GRRoIlu9rjVFbQMR7RjSVyu5d_3N_KUAwNmK8s9VfE89PJp0aG3xa--9-Bd960bkJkhl5H4ED4aOEUxjdufgQ6ls',
        // // ]]);

        // // $this->client->withOptions([
        // //     //'headers' => ['X-Auth-Token' => '129f8612ad83483b83282f62998e4509']
        // // ]);
        // // $response = $httpClient->request(
        // //     'GET',
        // //     'http://localhost:8000/api/me'
        // // );
        // $response = $this->forward('App\Controller\MeController::__invoke', []);


        // //$statusCode = $response->getStatusCode();
        // // $statusCode = 200
        // //$contentType = $response->getHeaders()['content-type'][0];
        // // $contentType = 'application/json'
        // $content = $response->getContent();
        // // $content = '{"id":521583, "name":"symfony-docs", ...}'
        // //$content = $response->toArray();
        // // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        // return $content;
    }

}
