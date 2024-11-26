<?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class cTest extends AbstractController {
        #[Route("/test/{name}", methods: ["GET", "HEAD"])]
        public function welcome(string $name): Response {
            return $this->render("diet/index.html.twig", ["name" => $name]);
            
        }
    }
?>