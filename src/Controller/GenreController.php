<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations as Rest;

class GenreController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"genre"})
     * @Route("/genres.json", name="genres_json", methods={"GET"})
     */
    public function genres(Request $request)
    {

		$query = "";

        if ($request->query->get("q")){
        	$query = $request->query->get("q");

        }

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT * FROM genres WHERE name LIKE :query");
        $stmt->execute(array(":query" => "%".$query."%"));
        $genres = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        if (!$genres){
        	return "No genre was found.";
        }
        return $genres;
    }

    /**
     * @Rest\View(serializerGroups={"genre"})
     * @Route("/genre/{id}.json", name="genre_json", methods={"GET"})
     */
    public function genre($id)
    {

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT * FROM genres WHERE ID=:id");
        $stmt->execute(array(":id" => $id));
        $genre = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$genre){
        	return "No genre was found.";
        }
        return $genre;
    }


}
