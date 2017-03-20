<?php

// get all groups
    $app->get('/groups', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM progettoreti.group");
        $sth->execute();
        $utenti = $sth->fetchAll();
        return $this->response->withJson($utenti);
    });

    // Retrieve group with id
    $app->get('/groups/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM progettoreti.group WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchObject();
        return $this->response->withJson($todos);
    });

   // Add a new group
   $app->post('/groups', function ($request, $response) {
       $input = $request->getParsedBody();
       $sql = "INSERT INTO progettoreti.group (name,id_user) VALUES (:name,:id_user)";
       $sth = $this->db->prepare($sql);
       $sth->bindParam("name", $input['name']);
       $sth->bindParam("id_user", $input['id_user']);
       $sth->execute();
       $input['id'] = $this->db->lastInsertId();
       return $this->response->withJson($input);
   });


   // DELETE a group with given id
   $app->delete('/groups/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM progettoreti.group WHERE id=:id");
       $sth->bindParam("id", $args['id']);
       $sth->execute();
       $todos = $sth->fetchAll();
       return $this->response->withJson($todos);
   });

   // Update group with given id           FUNZIONA
   $app->put('/groups/[{id}]', function ($request, $response, $args) {
       $input = $request->getParsedBody();
       $sql = "UPDATE progettoreti.group SET name=:name,id_user=:id_user WHERE id=:id";
       $sth = $this->db->prepare($sql);
       $sth->bindParam("id", $args['id']);
       $sth->bindParam("name", $input['name']);
       $sth->bindParam("id_user", $input['id_user']);
       $sth->execute();
       $input['id'] = $args['id'];
       return $this->response->withJson($input);
   });
