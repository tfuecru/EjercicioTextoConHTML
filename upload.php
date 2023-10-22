<?php
// Verificar si se han subido archivos
if(isset($_FILES['archivos'])) {
    $archivos = $_FILES['archivos'];
    $archivo_unido = '';
    $archivosOrdenados = array(
        'head' => array(),
        'header' => array(),
        'main' => array(),
        'footer' => array()
    );

    // Clasificar los archivos en categorías
    for ($i = 0; $i < count($archivos['name']); $i++) {
        $nombre = $archivos['name'][$i];
        $archivo_temporal = $archivos['tmp_name'][$i];
        $contenido = file_get_contents($archivo_temporal);

        // Determinar la categoría del archivo por su contenido
        if (stripos($contenido, '<head') !== false) {
            $archivosOrdenados['head'][$nombre] = $contenido;
        } elseif (stripos($contenido, '<header') !== false) {
            $archivosOrdenados['header'][$nombre] = $contenido;
        } elseif (stripos($contenido, '<main') !== false) {
            $archivosOrdenados['main'][$nombre] = $contenido;
        } elseif (stripos($contenido, '<footer') !== false) {
            $archivosOrdenados['footer'][$nombre] = $contenido;
        }
    }

    // Ordenar los archivos dentro de cada categoría
    foreach ($archivosOrdenados as $categoria => $archivosCategoria) {
        ksort($archivosOrdenados[$categoria]);
    }

    // Unir los archivos ordenados
    foreach ($archivosOrdenados as $archivosCategoria) {
        foreach ($archivosCategoria as $contenido) {
            $archivo_unido .= $contenido;
        }
    }

    // Guardar el archivo unido en un archivo nuevo
    // Antes de file_put_contents, verifica el contenido
    echo $archivo_unido;

    $nombre_archivo_unido = 'archivo_unido.txt';
    file_put_contents($nombre_archivo_unido, $archivo_unido);

    // Verificar si el contenido contiene etiquetas HTML
    $contiene_html = preg_match('/<\w+.*<\/\w+>/', $archivo_unido);

    if ($contiene_html) {
        echo "<br><br>Los archivos se han unido correctamente y contienen etiquetas HTML.<br>";
    } else {
        echo "Los archivos se han unido correctamente, pero no contienen etiquetas HTML.";
    }
}