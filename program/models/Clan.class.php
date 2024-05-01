<?php

class Clan extends DB
{
    function getClan()
    {
        $query = "SELECT * FROM clan";
        return $this->execute($query);
    }

    function add($data)
    {
        $clan_nama = $data['clan_nama'];
        $since = $data['since'];

        $query = "insert into clan values ('', '$clan_nama', '$since', 'New')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM clan WHERE id_clan = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id)
    {
        $status = "Old";

        $query = "update clan set status = '$status' WHERE id_clan = '$id'";
        // Mengeksekusi query
        return $this->execute($query);
    }
}
