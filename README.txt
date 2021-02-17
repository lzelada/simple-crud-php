Pasos necesarios para implementar el proyecto:

1.Ubicar el contenido del archivo .rar en el directorio del servidor web.

2.En el motor de base de datos elegido (para el proyecto se utilizó MySQL), ejecutar el archivo \stampy_mail\base_de_datos\stampymail.sql para generar la base de datos.

3.Ejecutar las siguientes querys para generar el usuario que gestionara la base de datos: 

CREATE USER 'stampy'@'localhost' IDENTIFIED BY 'stampy_mail';
GRANT USAGE ON . TO 'stampy'@'localhost';
GRANT EXECUTE, SELECT, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `stampymail`.* TO 'stampy'@'localhost';
FLUSH PRIVILEGES; 

4. Luego dirigirse a la siguiente URL: http://localhost/stampy_mail/login.php.

5. Para poder loguearse tienen que utilizar las siguiente credenciales: 
email: stampymail@hotmail.com
password: 12345

6. Una vez logueados podran ver las lista de usuarios, donde podran buscar, crear, editar y eliminar usuarios.
