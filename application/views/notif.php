

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php 
                 $notifA = $this->session->userdata('id_user');
                 $this->db->query("update t_user set usr_total_read = '0' where set usr_id = '$notifA'");
