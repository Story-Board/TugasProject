<?php
$konek=mysql_connect("localhost","root","");
$db=mysql_select_db("tkppl");
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Gallery<!--  <small>Users</small> --></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
			      error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
			      $success = $_GET['success'];
			      if ($success == 1 && !empty($success)) {
			      ?>
			      <div class="alert alert-info alert-dismissible fade in" role="alert">
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <strong>Success</strong> Selamat, data berhasil dihapus
			      </div>
			      <?php
			      }
			      ?>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Event / Poster</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
							$sql=mysql_query("select * from gallery order by id desc");
							$i = 1;
							while ($row = mysql_fetch_array($sql)) {
							?>
							<tr>
								<td align="center"><?= $i; ?></td>
								<td align="center"><img style="max-width: 80px;max-height: 60px;" src="http://localhost:8080/StoryBoardEO/admin/uploads/<?= $row['gambar'] ?>"></td>
								<td><?= $row['judul_event'] ?></td>
								<td><?= $row['category'] ?></td>
								<td align="center"><a href="#"><i class="fa fa-pencil"></i></a> | <a href="gallery/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah anda yakin...!')"><i class="fa fa-close"></i></a></td>
							</tr>
							<?php	
							$i++;
							}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>
