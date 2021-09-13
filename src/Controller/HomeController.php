<?php

namespace App\Controller;

use App\Service\API\LOL\BaseApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     *
     * @var SessionInterface 
     */
    private $session;

    /**
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/changeSession", name="app_changeSession")
     * @param Request $request
     * @param BaseApi $baseApi
     * @return Response
     */
    public function changeSession(Request $request, BaseApi $baseApi)
    {
        $versions = $baseApi->getAllVersion();     

        $form = $this->createFormBuilder()
                    ->add("versions", ChoiceType::class, [
                        "label" => "Versions",
                        "choices" => array_combine($versions, $versions),
                        "data" => $this->requestStack->getSession()->get('version')
                    ])
                    ->getForm()
        ;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // On récupère les données
            $version = $form->getData();
            $this->changeVersionSession('version', $version['versions']);
            return $this->redirect($request->request->get('referer'));
        }
        
        return $this->render("home/changeVersion.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @param BaseApi $baseApi
     * @return Response
     */
    public function headerNavbar(BaseApi $baseApi)
    {
        $versions = $baseApi->getAllVersion();
        // Mise en Session de la derniere version
    
        if(!$this->session->has('version')){
            $this->changeVersionSession("version", $versions[0]);
            // $this->session->set("version", $versions[0]);
        }
        
        return $this->render('main/__navbar.html.twig',[
            'versions' => $versions
        ]);
    }

    private function changeVersionSession(string $name, $value)
    {
        $this->session->set($name, $value);
    }
}
