Tu decides Vellesa 
========================

Autores: A. Alonso, AL .Mateo, S. Parau, F. Pastor

Video: https://www.youtube.com/watch?v=zyTHoSlTfkw&feature=youtu.be

Proyecto Integrado 2ºDAW Florida - Universitaria

Vellesa.es

Un servicio online para hacer tu testamento vital, para que cuando no puedas decidir todo esté claro:

- Límites de los tratamientos médicos que deseas recibir.
- Cómo y por quién quieres ser atendido/a.
- Detalles personales de tu entorno, hábitos y gustos personales.

Instalación
--------------

Requerimientos de Symfony:

  ```bash
  composer install
  
  php bin/console doctrine:generate:database
  
  php bin/console doctrine:schema:update --force
  
  ```
  
Requerimientos de BBDD:

   ```sql
    INSERT INTO `person_class` (`id`, `type`) VALUES (NULL, 'assistant'), (NULL, 'witness1'), (NULL, 'witness2'), (NULL, 'witness3'), (NULL, 'representant');
    
   ```
  
