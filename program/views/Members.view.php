<?php

  class MembersView {
    public function render($data){
      $no = 1;
      $dataMembers = null;
      $dataClan = null;
      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join_date, $id_clan, $status) = $val;
        $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $id_clan . "</td>
                <td>" . $status . "</td>";
        
        // if ($status == "Best Seller") {
        //     $dataMembers .= "
        //         <td>
        //           <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
        //         </td>";
        // }
        // else {
            $dataMembers .= "
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        // }
        $dataMembers .= "</tr>";
      }

      foreach($data['clan'] as $val){
        list($id_clan, $clan_nama, $since) = $val;
        $dataClan .= "<option value='".$id_clan."'>".$clan_nama."</option>";
      }

      $tpl = new Template("templates/index.html");

      $tpl->replace("OPTION", $dataClan);
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write(); 
    }
  }
?>