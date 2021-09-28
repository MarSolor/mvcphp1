<h1>Registrarse</h1>
<!--se cambio el action url que usaba el controlador  action="index.php?controller=usuario&action=save"s--->
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required id="">

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required id="">

    <label for="email">Email</label>
    <input type="email" name="email" required id="">

    <label for="password">Contrasena</label>
    <input type="password" name="password" required id="">

    <input type="submit" value="Registrarse">
</form>
