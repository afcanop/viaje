<?php

namespace App\Controller\Viajes;

use App\Entity\Viaje\Ruta;
use App\Form\RutaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ruta")
 */
class RutaController extends AbstractController
{
    /**
     * @Route("/", name="ruta_index")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $arrRutas = $em->getRepository(Ruta::class)->findAll();
        return $this->render('admin/viajes/ruta/index.html.twig', ['arrRutas' => $arrRutas]);
    }

    /**
     * @Route("/nuevo",name="ruta_nuevo")
     */
    public function nuevo(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $arRegistro = new Ruta;
        $form = $this->createForm(RutaType::class, $arRegistro);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('btnGuardar')->isClicked()) {
                $arRegistro = $form->getData();
                $em->persist($arRegistro);
                $em->flush();
                return $this->redirect($this->generateUrl('solicitud_detalle', array('id' => $arRegistro->getId())));

            }
        }
        return $this->render('admin/viajes/ruta/nuevo.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/editar/{id}/", name="ruta_editar")
     */
    public function editar(Request $request, Ruta $arRegistro)
    {
        $form = $this->createForm(RutaType::class, $arRegistro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ruta_index');
        }
        return $this->render('admin/viajes/ruta/nuevo.html.twig', [
            'arRegistro' => $arRegistro,
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/detalle/{id}", name="ruta_detalle")
     */
    public function detalle(Request $request, Ruta $arRegistro)
    {
        $em = $this->getDoctrine()->getManager();
        return $this->render('admin/viajes/ruta/detalle.html.twig', [
            'arRegistro' => $arRegistro,
        ]);
    }


    /**
     * @Route("/{id}", name="ruta_eliminar", methods={"DELETE"})
     */
    public function delete(Request $request, Ruta $registro){

        if ($this->isCsrfTokenValid('delete'.$registro->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ruta_index');
    }
}
