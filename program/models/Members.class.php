<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $clan = $data['clan_nama'];
        $status = "-";

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date', '$clan', '$status')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id)
    {
        $status = "Pro";

        $query = "update members set status = '$status' WHERE id = '$id'";
        // Mengeksekusi query
        return $this->execute($query);
    }
}
