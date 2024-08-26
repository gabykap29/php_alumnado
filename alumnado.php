<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Estudiantes</title>
</head>
<body>

<?php
    // 1. Función para cargar al menos 10 nombres de estudiantes en un array
    function cargarEstudiantes() {
        // Devuelve un array de estudiantes, cada uno con un DNI y un nombre
        return [
            ['dni' => '12345678', 'nombre' => 'Juan'],
            ['dni' => '23456789', 'nombre' => 'María'],
            ['dni' => '34567890', 'nombre' => 'Carlos'],
            ['dni' => '45678901', 'nombre' => 'Lucía'],
            ['dni' => '56789012', 'nombre' => 'Pedro'],
            ['dni' => '67890123', 'nombre' => 'Ana'],
            ['dni' => '78901234', 'nombre' => 'Miguel'],
            ['dni' => '89012345', 'nombre' => 'Sofía'],
            ['dni' => '90123456', 'nombre' => 'Tomás'],
            ['dni' => '01234567', 'nombre' => 'Laura']
        ];
    }

    // 2. Función para cargar las notas de 2 parciales y la cantidad de asistencias
    function cargarNotasYAsistencias($estudiantes) {
        // Itera sobre cada estudiante y les asigna notas y asistencias aleatorias
        foreach ($estudiantes as &$estudiante) {
            $estudiante['nota_parcial_1'] = rand(1, 10); // Nota del primer parcial
            $estudiante['nota_parcial_2'] = rand(1, 10); // Nota del segundo parcial
            $estudiante['asistencias'] = rand(0, 40); // Número de asistencias
        }
        return $estudiantes; // Devuelve el array con las notas y asistencias agregadas
    }

    // 3. Calcular el porcentaje de asistencias
    function calcularPorcentajeAsistencias($asistencias) {
        $totalClases = 40; // Total de clases posibles
        // Calcula el porcentaje de asistencias y lo retorna
        return ($asistencias / $totalClases) * 100;
    }

    // 4-7. Evaluar a los estudiantes y emitir el mensaje correspondiente
    function evaluarEstudiantes($estudiantes) {
        // Itera sobre cada estudiante y evalúa su situación académica
        foreach ($estudiantes as $estudiante) {
            $porcentajeAsistencias = calcularPorcentajeAsistencias($estudiante['asistencias']); // Calcula el porcentaje de asistencias
            $nota1 = $estudiante['nota_parcial_1']; // Nota del primer parcial
            $nota2 = $estudiante['nota_parcial_2']; // Nota del segundo parcial
            $dni = $estudiante['dni']; // DNI del estudiante

            // Evalúa las condiciones para determinar la situación del estudiante
            if ($nota1 >= 8 && $nota2 >= 8 && $porcentajeAsistencias >= 80) {
                // Si las dos notas son mayores o iguales a 8 y la asistencia es mayor o igual a 80%
                echo "<p>Alumno regular - DNI: $dni</p>";
            } elseif ($nota1 >= 8 && $nota2 >= 8 && $porcentajeAsistencias < 80) {
                // Si las dos notas son mayores o iguales a 8 pero la asistencia es menor al 80%
                echo "<p>Debe realizar clases de apoyo - DNI: $dni</p>";
            } elseif (($nota1 < 8 || $nota2 < 8) && $porcentajeAsistencias >= 80) {
                // Si alguna de las notas es menor a 8 pero la asistencia es mayor o igual a 80%
                echo "<p>Debe recuperar un parcial - DNI: $dni</p>";
            } else {
                // En cualquier otro caso, el alumno es libre
                echo "<p>Alumno libre - DNI: $dni</p>";
            }
        }
    }

    // Ejecución del programa

    // Cargar los estudiantes iniciales
    $estudiantes = cargarEstudiantes();
    // Cargar las notas y asistencias para cada estudiante
    $estudiantes = cargarNotasYAsistencias($estudiantes);
    // Evaluar a cada estudiante y mostrar el resultado
    evaluarEstudiantes($estudiantes);
?>

</body>
</html>
