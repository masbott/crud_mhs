<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3></h3>
      <?php $kategori_pengguna = $this->session->userdata('kategori_pengguna'); 
            $getmenu = $this->db->query( "SELECT a.* , b.nama as menu_utama, b.icon, b.url, b.id, b.parent
                                          FROM menu_rule a 
                                          INNER JOIN menu b ON a.menu_id = b.id
                                          WHERE a.pengguna_id = $kategori_pengguna AND b.parent='0'
                                          " );
      ?>

      <ul class="nav side-menu">
        <?php foreach( $getmenu->result() as $menu ): ?>
            <li>
              <a href="<?php echo site_url($menu->url); ?>"><i class="<?php echo 'fa '. $menu->icon ?>"></i> <?php echo $menu->menu_utama; ?> </a>
            </li>
        <?php endforeach; ?>
      </ul>
    </div>
</div>