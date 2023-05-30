<?php

class Product extends Db
{
    public static function ajouter(array $data)
    {
        $pdo= self::getDb();
        $request = "INSERT INTO product (name, category, image, price, description) VALUES (:name, :category, :image, :price, :description)";
        $response = $pdo->prepare($request);
        $response->execute($data);
        return $pdo->lastInsertId();
    }

    public static function findAll()
    {
        $request="SELECT * FROM product";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
      
        
    }

    public static function findById(array $id)
    {
        $request="SELECT * FROM product WHERE id_product=:id_product";
        $response = self::getDb()->prepare($request);
        $response->execute($id);
        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function update(array $francisco)
    {
        $request="UPDATE product SET name=:name, category=:category, image=:image, price=:price, description=:description WHERE id_product =:id_product";
        $response = self::getDb()->prepare($request);
        return $response->execute($francisco);

    }

    public static function delete(array $id)
    {
        $request="DELETE FROM product WHERE id_product = :id_product";
        $response = self::getDb()->prepare($request);
        return $response->execute($id);
    }
}