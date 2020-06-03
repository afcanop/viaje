<?php


namespace App\Controller\Viajes;


use App\Entity\Viaje\Solicitud;
use App\Form\Type\Viaje\SolicitudType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/solicitud")
 */
class SolicitudController extends AbstractController
{
    /**
     * @Route("/",name="solicitud_index")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $arrSolicitudes = $em->getRepository(Solicitud::class)->findAll();
        return $this->render('admin/viajes/solicitud/index.html.twig', ['arrSolicitudes' => $arrSolicitudes]);

    }

    /**
     * @Route("/nuevo",name="solicitud_nuevo")
     */
    public function nuevo(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $arRegistro = new Solicitud;
        $form = $this->createForm(SolicitudType::class, $arRegistro);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('btnGuardar')->isClicked()) {
                $arRegistro = $form->getData();
                $arRegistro->setFechaCreacion(new \DateTime());
                $em->persist($arRegistro);
                $em->flush();
                return $this->redirect($this->generateUrl('solicitud_detalle', array('id' => $arRegistro->getId())));

            }
        }
        return $this->render('admin/viajes/solicitud/nuevo.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("editar/{id}/", name="solicitud_editar", methods={"GET","POST"})
     */
    public function edit(Request $request, Solicitud $arRegistro)
    {
        $form = $this->createForm(SolicitudType::class, $arRegistro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('solicitud_index');
        }

        return $this->render('admin/viajes/solicitud/nuevo.html.twig', [
            'arRegistro' => $arRegistro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/detalle/{id}", name="solicitud_detalle")
     */
    public function detalle(Request $request, Solicitud $arRegistro)
    {
        $em = $this->getDoctrine()->getManager();
        return $this->render('admin/viajes/solicitud/detalle.html.twig', [
            'arRegistro' => $arRegistro,
        ]);
    }




    /**
     * @Route("/{id}", name="solicitud_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Solicitud $registro){

        if ($this->isCsrfTokenValid('delete'.$registro->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('solicitud_index');
    }
}