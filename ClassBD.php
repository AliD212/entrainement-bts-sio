<?php

class bd
{

    private string $host;
    private string $bdname;
    private string $user;
    private string $password;
    private bd $bd;

    function __construct($host, $bdname, $user, $password)
    {
        $this->host = $host;
        $this->bdname = $bdname;
        $this->user = $user;
        $this->password = $password;
    }


    public static function  connexionbd($bd)
    {
        $host = $bd->gethost();
        $dbname = $bd->getbdname();
        $user = $bd->getuser();
        $password = $bd->getpassword();
        $bd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);

        return $bd;
    }


    /* j'ai pas reussi a trouver la solution ducoup auto increment dans la base de donnée
    public static function insert_id($bd)
    {
        $bd = $bd->connexionbd($bd);
        $sql_select_max_id = "select max(id) from user";
        $resultat = $bd->query($sql_select_max_id);
        $resultat = $resultat->fetch();
        $id =  $resultat['max(id)'];
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id + 1;
        }
        var_dump($id);

        return $id;
    }

**/

    public static function insert_user($bd, $nom, $email, $password)
    {
        $bd = $bd->connexionbd($bd);
        $sql_insert = "INSERT INTO user (id, nom, email, password) VALUES (:id, :nom, :email, :password)";
        $stmt = $bd->prepare($sql_insert);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }



    public static function update_user_name_email($bd)
    {
        $old_email = trim($_POST['old_email']);
        $new_email = trim($_POST['new_email']);
        $old_name = trim($_POST['old_name']);
        $new_name = trim($_POST['new_name']);

        if (!empty($old_name)) {

            $sql_insert = "update user set nom = :new_name where nom = :old_name ";
            $stmt = $bd->connexionbd($bd)->prepare($sql_insert);
            $stmt->bindParam(':new_name', $new_name);
            $stmt->bindParam(':old_name', $old_name);
            $stmt->execute();
            echo "L'utilisateur ", $old_name, " à été modifié par", $new_name;
        } else {
            echo "L'utilisateur n'a pas été trouver avec le nom ou le champs est vide" . $old_name, "<br>";
        }


        if (!empty($old_email)) {

            $sql_insert = "update user set email = :new_email where email = :old_email ";
            $stmt = $bd->connexionbd($bd)->prepare($sql_insert);
            $stmt->bindParam(':new_email', $new_email);
            $stmt->bindParam(':old_email', $old_email);
            $stmt->execute();
            echo "<br>" . "L'utilisateur ", $old_email, " à été modifié par ", $new_email;
        } else {
            echo " L'utilisateur n'a pas été trouver avec l'email ou le champs est vide" . $old_email;
        }
    }



    public static function delete_user($bd, $user)
    {



        try {
            $bd = $bd->connexionbd($bd);
            $user = trim($user);
            $sql_delete = "delete from user where nom = :user_delete";
            $stmt = $bd->prepare($sql_delete);
            $bd->prepare($sql_delete);
            $stmt->bindParam(':user_delete', $user);
            $stmt->execute();
            echo "L'utilisateur $user à était supprimer";
            $cpt = 0;
            $cpt2 = 0;
            $select_max_id = "select max(id) from user";

            $resultat_id = $bd->query($select_max_id);
            $resultat_id = $resultat_id->fetchAll();
            $resultat_id = $resultat_id[0];


            while ($cpt < $resultat_id[0]) {
                $cpt = $cpt + 1;
                $search_user_id = "select id from user where id = '$cpt'";

                $search_user_id = $bd->query($search_user_id);
                $search_user_id = $search_user_id->fetchAll();
                if (empty($search_user_id)) {
                } else {

                    $cpt2 = $cpt2 + 1;
                    $update_user_id = "update user set id = '$cpt2'  where id = '$cpt'";
                    $search_id = $bd->query($update_user_id);
                    $update_user_id;
                    $search_id->execute();
                }
            }
        } catch (PDOException $e) {

            echo $e;
        }
    }


    public function gethost()
    {
        return $this->host;
    }
    public function getbdname()
    {
        return $this->bdname;
    }
    public function getuser()
    {
        return $this->user;
    }
    public function getpassword()
    {
        return $this->password;
    }
}
