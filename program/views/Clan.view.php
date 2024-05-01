<?php
  class ClanView{
    public function render($data){
      $no = 1;
      $dataClan = null;
      foreach($data as $val){
        list($id_clan, $clan_nama, $since, $status) = $val;
        // if ($status == 'Senior') {
        //   $dataClan .= "<tr>
        //           <td>" . $no++ . "</td>
        //           <td>" . $nama . "</td>
        //           <td>" . $status . "</td>
        //           <td>
        //           <a href='author.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
        //           </td>
        //           </tr>";
        // } else {
            $dataClan .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $clan_nama . "</td>
                    <td>" . $since . "</td>
                    <td>" . $status . "</td>
                    <td>
                    <a href='clan.php?id_edit=" . $id_clan .  "' class='btn btn-warning''>Edit</a>
                    <a href='clan.php?id_hapus=" . $id_clan . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }
    //   }

      $tpl = new Template("templates/clan.html");
      $tpl->replace("DATA_TABEL", $dataClan);
      $tpl->write();
    }
  }