<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Administrador</title>
</head>
<body>
  <div class="text-aling:center">
    <div style="background:black; color:white">
      <marquee><h1>¡Welcome! Jefe</h1></marquee>
    </div>
    <h2>Desde aqui podras modiicar el tipo de usuario de tus empleados</h2>
    <h3>Te en cuenta que</h3>
    </div>
  <ul>
    <li><strong>Roles</strong></li>
    <li>1 = Administrador</li>
    <li>2 = Mesero</li>
    <li>3 = Cocinero</li>
  </ul>
  <center>
    <table border="1" >
      <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Rol</th>
        <th>Modificar</th>
        <?php
        foreach ($usuario->result() as $row){
          ?>
            <form action="<?php echo base_url() ?>index.php/inicie_sesion/modificar" method="post"  data-ajax="false">
              <tr>
                <td><input type="text" value="<?php echo ($row->id); ?>" name="id" size="1"  readonly="readonly"></td>
                <td><?php echo ($row->user); ?></td>
                <td><?php echo ($row->pass); ?></td>
                <td> <input type="text" name="rol" placeholder="<?php echo ($row->id_rol); ?>" size="1" ></td>
                <td>
                  <input type="submit" name="" value="Modificar">
                </td>
              </tr>
            </form>
            <?php
          }
          ?>
        </tr>
      </table>
    </center>
  </body>
  </html>
