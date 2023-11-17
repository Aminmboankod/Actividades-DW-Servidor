
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de archivos</title>
</head>
<body>
    <form method = "post" enctype = "multipart/form-data">>
        <label>
            <input type="file" name="archivo">
        </label>
        <br>
        <input type="submit" name="submit" value="Subir archivo">
    </form>
    <pre>
        <?php
            echo var_dump($_FILES);
        ?>
    </pre>
    <?php

        if (filter_input(INPUT_POST,'submit', FILTER_SANITIZE_SPECIAL_CHARS))
        {
            foreach($_FILES as $file)
            {
                switch ($file['error'])
                {
                    case UPLOAD_ERR_OK:

                        if (!move_uploaded_file($file['tmp_name'], 'uploads/' . $file['name']))
                        {
                            echo "Error al mover el archivo";
                        }
                        else
                        {
                            echo "Archivo subido correctamente";
                        }
                        break;
                    case UPLOAD_ERR_INI_SIZE:
                        echo "El tamaño del archivo supera el especificado en la directiva 
                        upload_max_filesize en php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "El tamaño del archivo supera el especificado en la directiva
                        MAX_FILE_SIZE en el formulario.";
                        break;

                    case UPLOAD_ERR_PARTIAL:
                        echo "El archivo no se ha podido subir completamente.";
                        break;

                    case UPLOAD_ERR_NO_FILE:
                        echo "No se ha subido ningún archivo.";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        echo "PHP no tiene acceso a una carpeta temporal en el
                        servidor para almacenar el archivo.";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        echo "El archivo no se ha podido escribir en el disco del
                        servidor por alguna razón.";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        echo "El archivo subido se ha detenido por una de las
                        extensiones PHP actualmente cargadas.";
                        break;
                    default: echo "Error desconocido";
                        break;
                }
            }
        }
    ?>

</body>
</html>