
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Subiendo una foto</title>
        
        </head>
        <body>
            <h1>Formulario con una foto</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width: 30em;">

                    <label for="visitorName">Tu nombre</label>
                    <input type="text" name="visitorName" id="visitorName" value="" />

                    <label for="photo">Tu foto</label>
                    <input type="file" name="photo" id="photo" value="" />

                    <div style="clear: both;">
                        <input type="submit" name="subirFoto" value="Subir foto" />
                    </div>

                </div>
            </form>


            <?php
                // Verifica si el botón "subirFoto" del formulario ha sido presionado
                if (isset($_POST["subirFoto"]))
                {
                    // Llama a la función "processForm" para procesar el formulario
                    processForm();
                }

                /**
                 * Procesa los datos del formulario y sube la foto al servidor.
                 *
                 * Verifica si se ha enviado un archivo (foto) y si no hubo errores en la carga.
                 * Si el archivo es válido, lo mueve desde la ubicación temporal al directorio "photos" en el servidor.
                 * Si no se puede mover el archivo, muestra un mensaje de error.
                 * Si hay errores en la carga de la foto, maneja diferentes casos de error y muestra un mensaje de error que indica la causa del problema.
                 *
                 * @return void
                 */
                function processForm()
                {
                    // Verifica si se ha enviado un archivo (foto) y si no hubo errores en la carga
                    if (isset($_FILES["photo"]) && ($_FILES["photo"]["error"] == UPLOAD_ERR_OK))
                    {
                        // Mueve el archivo cargado desde la ubicación temporal al directorio "photos" en el servidor
                        if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "photos/" . basename($_FILES["photo"]["name"])))
                        {
                            // Si no se pudo mover el archivo, muestra un mensaje de error
                            echo "No se ha podido subir la foto. Error: " . $_FILES["photo"]["error"];
                        }
                        else
                        {
                            echo var_dump($_FILES);
                            echo "La foto se ha subido correctamente a la carpeta 'photos'";
                        }
                    }
                    else
                    {
                        switch ($_FILES["photo"]["error"])
                        {
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                $message = "La foto es muy grande.";
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                $message = "No se ha subido ningún archivo.";
                                break;
                            default:
                                $message = "Error no detectado";
                        }
                        
                        echo "<p>Lo siento, ha habido un problema subiendo esta foto. $message</p>";
                    }
                }
            ?>

        </body>
    </html>