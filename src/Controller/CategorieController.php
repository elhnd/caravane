<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */

class CategorieController extends AbstractController
{
     /**
     * @var EntityManagerInterface
     */
    private $em;
    private $categorieRepository;
    private $serializer;
    private $validator;
    
    public function __construct(ValidatorInterface $validator,SerializerInterface $serializer,CategorieRepository $categorieRepository, EntityManagerInterface $em)
    {
        $this->categorieRepository = $categorieRepository;
        $this->serializer = $serializer;
        $this->em = $em;
        $this->validator = $validator;

      
     
    }

    /**
     * @Route("/showcategory", name="category_indexshow", methods={"GET"})
     */
    public function indexCategory()
    {
       
       $ligne = 0;
       $dataCategories = [];
       $rem = [];
       
       $category = $this->categorieRepository->findBy([],['libelle'=>'ASC']);
       foreach ($category as  $key) {
           
           $ligne++;
           $rem = array(
           'id'=>$key->getId(),
           'libelle'=>$key->getLibelle(),
           'image'=>$key->getImage(),
           'createAt'=>$key->getCreatedAt(),
           'updateAt'=>$key->getUpdatedAt(),
           'ligne'=>$ligne
          );
          array_push($dataCategories, $rem);
       }

       return $this->json($dataCategories,200);
    }


    /**
     * @Route("/newCategorie", name="category_new", methods={"POST"})
     */
    public function newCategory(Request $request)
    {

        $nomCategory = '';

        $category = new Categorie;
        $data=json_decode($request->getContent(),true);
        if(!$data){
            $data=$request->request->all();
        }
        
        $nomCategory = $data['libelle'];  
 
        $category->setLibelle($nomCategory);

            $errors = $this->validator->validate($category);
            if (count($errors)) {
                $errors = $this->serializer->serialize($errors, 'json');
                return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
            }
            if($requestFile=$request->files->all()){
                
                $file=$requestFile['image'];
                $extension=$file->guessExtension();
                if($extension!='png' && $extension!='jpeg' ){
                    throw new HttpException(400,'Entrer une image valide !! ');
                }
                
                $fileName=md5(uniqid()).'.'.$extension;
                $category->setImage($fileName);
                $file->move($this->getParameter('image_directory'),$fileName);
                //die();
              }else {
                  # code...
                $error = [
              
                    'status' => 404,
                    'message' => 'Fichier Non Trouvé'
                ];
                 return $this->json($error,404);

              }
            $this->em->persist($category);
            $this->em->flush();
            $data = [
              
                'status' => 201,
                'message' => 'Catégorie Créée'
            ];
            
            return new JsonResponse($data, 201);
            # code...
    }

    /**
     * @Route("/modifierCategorie", name="category_edit", methods={"POST"})
     */
    public function editercategory(Request $request)
    {
        $data=json_decode($request->getContent(),true);
        if(!$data){
            $data=$request->request->all();
        }
        $id = 'id';
        $nomCategory = 'libelle';
        $updateCategory = $this->categorieRepository->findOneBy(['id'=>$data[$id]]);

        if ($updateCategory) {
            $updateCategory
            ->setLibelle($data[$nomCategory]);
        }
        if($requestFile=$request->files->all()){
                
            $file=$requestFile['image'];
            $extension=$file->guessExtension();
            if($extension!='png' && $extension!='jpeg' && $extension!='jpg'){
                throw new HttpException(400,'Entrer une image valide !! ');
            }
            
            $fileName=md5(uniqid()).'.'.$extension;
            $updateCategory->setImage($fileName);
            $file->move($this->getParameter('image_directory'),$fileName);
        }
        $this->em->flush();

            $data = [
            'status' => 200,
            'message' => 'Catégorie Modifiée !'
        ];
        return new JsonResponse($data, 200);
    }

    /**
     * archiver  archiverCategory
     * @Route("/archiverCategory/{id}", name="archiverCategory", methods={"DELETE"})
     */
    public function archiverCategory(Categorie $category)
    {
   
       
       $categoryOne =  $this->categorieRepository->find($category->getId());
    
       //$existe =$categoryOne->getArticles()[0];
  
      
       if ($categoryOne) {
         # code...
  /*       if ($existe) {
            # code...
            $data = [
                      'status' => 501,
                      'message' => 'Impossible de supprimer une catégorie liée à un produit '
                  ];
                  return new JsonResponse($data, 501);
        }else { */
            # code...
             $this->em->remove($category);
             $this->em->flush();
     
        $data = [
        'status' => 200,
        'message' => 'La catégorie  a bien été supprimée'

      ];
      return new JsonResponse($data,200);
      }else {
          # code...
          $data = [
                'status' => 404,
                'message' => 'Catégorie introuvable!'
                        ];
                return new JsonResponse($data, 404);
              
      }   
    
    
      }

}
