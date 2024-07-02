<?php
// Create a new car
#[Route('/basic/car/create', name: 'app_create_basic_car')]

public function create(): Response
{
    $myCar = new Car();
    $myCar->setKms(400);
    $myCar->setColor('red');
    
    $this->carRepo->save($myCar, true);

    return $this->render('basic_car/index.html.twig', [
        'operation_name' => 'Create new car',
        'car' => $myCar
    ]);
}

// Read an existing car
#[Route('/basic/car/read/{id}', name: 'app_read_one_basic_car')]

public function readOne(int $id): Response
{
    $myCar = $this->carRepo->find($id);
    if ($myCar == null) {
        return new Response('404 - Car NOT FOUND with id '.$id, 404);
    }

    return $this->render('basic_car/one.html.twig', [
        'operation_name' => 'Read an existing car',
        'car' => $myCar
    ]);
}
// Read all existing cars
#[Route('/basic/car/read', name: 'app_read_all_basic_car')]

public function create(): Response
{
    $carArray = $this->carRepo->findAll();
    return $this->render('basic_car/array.html.twig', [
        'operation_name' => 'Read all existing cars',
        'cars' => $carArray
    ]);
}

// Update an existing car
#[Route('/basic/car/update/{id}', name: 'app_update_basic_car')]
public function update(int $id): Response
{
    $myCar = $this->carRepo->find($id);
    if ($myCar == null) {
        return new Response('404 - Car NOT FOUND with id '.$id, 404);
    }
    
    $myCar->setColor('blue');
    $this->carRepo->save($myCar, true);
    
    return $this->render('basic_car/one.html.twig', [
        'operation_name' => 'Read an existing car',
        'car' => $myCar
    ]);
}

// Delete an existing car
#[Route('/basic/car/delete/{id}', name: 'app_delete_basic_car')]
public function delete(int $id): Response
{
    $myCar = $this->carRepo->find($id);
    if ($myCar == null) {
        return new Response('404 - Car NOT FOUND with id '.$id, 404);
    }
    
    $this->carRepo->remove($myCar);
    return $this->json(['message' => 'Deleted car with id ' . $id,], 200);
}