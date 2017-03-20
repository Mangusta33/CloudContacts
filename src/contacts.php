<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 20/03/2017
 * Time: 00.15
 */

// get all contacts
    $app->get('/contacts', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM contact");
        $sth->execute();
        $utenti = $sth->fetchAll();
        return $this->response->withJson($utenti);
    });

    // Retrieve contacts with id
    $app->get('/contacts/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM contact WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchObject();
        return $this->response->withJson($todos);
    });

    // Add a new contact
    $app->post('/contacts', function ($request, $response) {
         $input = $request->getParsedBody();
         $sql = "INSERT INTO contact (telnumber,name,id_group) VALUES (:telnumber,:name,:id_group)";
         $sth = $this->db->prepare($sql);
         $sth->bindParam("telnumber", $input['telnumber']);
         $sth->bindParam("name", $input['name']);
         $sth->bindParam("id_group", $input['id_group']);
         $sth->execute();
         $input['id'] = $this->db->lastInsertId();
         return $this->response->withJson($input);
    });


 /*// DELETE a user with given id
 $app->delete('/users/[{id}]', function ($request, $response, $args) {
     $sth = $this->db->prepare("DELETE FROM user WHERE id=:id");
     $sth->bindParam("id", $args['id']);
     $sth->execute();
     $todos = $sth->fetchAll();
     return $this->response->withJson($todos);
 });

 // Update user with given id           FUNZIONA
 $app->put('/users/[{id}]', function ($request, $response, $args) {
     $input = $request->getParsedBody();
     $sql = "UPDATE user SET name=:name,surname=:surname WHERE id=:id";
     $sth = $this->db->prepare($sql);
     $sth->bindParam("id", $args['id']);
     $sth->bindParam("name", $input['name']);
     $sth->bindParam("surname", $input['surname']);
     $sth->execute();
     $input['id'] = $args['id'];
     return $this->response->withJson($input);
 });
 */