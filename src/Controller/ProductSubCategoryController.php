<?php

namespace App\Controller;

use App\Entity\ProductSubCategory;
use App\Form\ProductSubCategoryType;
use App\Repository\ProductSubCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
#[Route('/subcategory')]
class ProductSubCategoryController extends AbstractController
{
    #[Route('/', name: 'app_product_sub_category_index', methods: ['GET'])]
    public function index(ProductSubCategoryRepository $productSubCategoryRepository): Response
    {
        return $this->render('product_sub_category/index.html.twig', [
            'product_sub_categories' => $productSubCategoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_product_sub_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $productSubCategory = new ProductSubCategory();
        $form = $this->createForm(ProductSubCategoryType::class, $productSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brochureFile = $form->get('picture')->getData();
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
                try {
                    $brochureFile->move(
                        $this->getParameter('subcategories_dir'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $productSubCategory->setPicture($newFilename);
            }
            $productSubCategory->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($productSubCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_product_sub_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product_sub_category/new.html.twig', [
            'product_sub_category' => $productSubCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_sub_category_show', methods: ['GET'])]
    public function show(ProductSubCategory $productSubCategory): Response
    {
        return $this->render('product_sub_category/show.html.twig', [
            'product_sub_category' => $productSubCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_product_sub_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductSubCategory $productSubCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductSubCategoryType::class, $productSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_product_sub_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product_sub_category/edit.html.twig', [
            'product_sub_category' => $productSubCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_sub_category_delete', methods: ['POST'])]
    public function delete(Request $request, ProductSubCategory $productSubCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productSubCategory->getId(), $request->request->get('_token'))) {
            $entityManager->remove($productSubCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_product_sub_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
