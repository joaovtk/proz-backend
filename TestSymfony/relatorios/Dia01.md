# Dia 01

- <a href="#instalação">instalação </a>
- <a href="#comandos-importantes">Comandos Importantes</a>
- <a href="#Basico">Basico</a>
- <a href="#Templates">Templates</a>
- <a href="#templates--paramentros">Templates + Paramentros </a>
- <a href="#templates--requestparams">Templates + RequestParams</a>

# Instalação

<a href="https://symfony.com/doc/current/setup.html">Site Oficial</a>

# Comandos Importantes

- symfony new my_project 
    - Cria um Projeto Symfony

- symfony server:start
    - Inicia um Servidor Symfony

- symfony local:server:stop
    - Para um servidor Symfony

# Basico

cTest.php
```php
    <?php
        // Setando o namespace para que ele reconheça o Controller
        namespace App\Controller;
        // Importação dos pacotes
        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\Routing\Attribute\Route;
        class cTest {
            // Toda função de Controller deve ter o Response como tipo
            #[Route("/")]
            public function index(): Response{
                // retorno de uma string com conteudo hello world
                return new Response("<h1>Hello World</h1>");
            }
        }
    ?>
```
Codigo de Impressão de um h1 com o conteudo de hello world

# Templates
cTest.php
``` php
    <?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class cTest extends AbstractController {
        #[Route("/")]
        public function welcome(string $name): Response {
            // deve ser criado uma pasta na raiz do projeto chamda templates
            return $this->render("diet/index.html.twig");
        }
    }
?>
```
Criação de um template de uma pagina que apenas exibi welcome

# Templates + Paramentros 

cTest.php
``` php
    <?php
        namespace App\Controller;

        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\Routing\Attribute\Route;
        use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

        class cTest extends AbstractController {
            #[Route("/")]
            public function welcome(string $name): Response {
                // Criação de uma variavel local
                $name = "joaovtk;
                // deve ser criado uma pasta na raiz do projeto chamda templates
                return $this->render("diet/index.html.twig", ["name" => $name]);
            }
        }
    ?>
```

index.html.twig
```html
    <h1>Welcome, {{name}}</h1>
```
Criação de um componente que ao acessar o ip ele exibirá uma mensagem Welcome, Joaovtk

# Templates + RequestParams

cTest.php
``` php
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
```

index.html.twig
```html
    <h1>Welcome, {{name}}</h1>
```

Criação de um componente onde ao ser acessado ele pedirá o endpoint + alguma string e exibirá welcome string que voce passou

url
``http://localhost:8080/test/joaovtk``

retorno welcome, joaovtk