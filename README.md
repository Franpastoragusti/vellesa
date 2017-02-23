Tu decides Vellesa 
========================

Autores: A. Alonso, AL .Mateo, S. Parau, F. Pastor

Proyecto Integrado 2ºDAW Florida - Universitaria

Vellesa.es

Instalación
--------------

Requerimientos de Symfony:

  ```bash
  composer install
  
  php bin/console doctrine:generate:database
  
  php bin/console doctrine:schema:update
  
  ```
  
Requerimientos de BBDD:

   ```sql
    INSERT INTO `person_class` (`id`, `type`) VALUES (NULL, 'assistant'), (NULL, 'witness1'), (NULL, 'witness2'), (NULL, 'witness3'), (NULL, 'representant');
    
   ```
  