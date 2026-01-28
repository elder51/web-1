<?php
require_once 'db.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$stmt = $pdo->query("SELECT consultas.*, medicos.nome AS medico_nome, pacientes.nome AS paciente_nome FROM consultas LEFT JOIN medicos ON consultas.medico_id = medicos.id LEFT JOIN pacientes ON consultas.paciente_id = pacientes.id");
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dompdf = new Dompdf();

$html = '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 16px; }
        h1 { font-size: 24px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>    
    <h1>Consultas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Medico</th>
                <th>Data e Hora</th>
            </tr>
        </thead>
        <tbody>';
foreach ($consultas as $consulta) {
    $html .= '<tr><td>' . $consulta['id'] . '</td>
    <td>' . $consulta['paciente_nome'] . '</td>
    <td>' . $consulta['medico_nome'] . '</td>
    <td>' . $consulta['data_hora'] . '</td></tr>';
}
$html .= '
        </tbody>
    </table>
</body>
</html>';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('consultas' . '.pdf', array("Attachment" => false));
