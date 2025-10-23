<?php

namespace Drupal\dispmovel_module\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Controller\ControllerBase;

class DispmovelController extends ControllerBase {

  public function gerarDeclaracao(Request $request) {
    if ($request->getMethod() === 'POST') {

      // Dados do formulário
      $nomeCompleto = mb_strtoupper($request->request->get('nome_completo', ''));
      $nip = mb_strtoupper($request->request->get('NipUsuario', ''));
      $posto_grad = mb_strtoupper($request->request->get('posto_grad', ''));

      // Coletar até 5 dispositivos, preenchendo "-------" se vazio
      $dispositivos = [];
      for ($i = 1; $i <= 5; $i++) {
        $marca = mb_strtoupper($request->request->get("marca_$i", '')) ?: '-------';
        $modelo = mb_strtoupper($request->request->get("modelo_$i", '')) ?: '-------';
        $num_serie = mb_strtoupper($request->request->get("num_serie_$i", '')) ?: '-------';
        $desc = mb_strtoupper($request->request->get("desc_equip_$i", '')) ?: '-------';

        $dispositivos[] = [
          'marca' => $marca,
          'modelo' => $modelo,
          'num_serie' => $num_serie,
          'descricao' => $desc,
        ];
      }

      // Data formatada
      date_default_timezone_set('America/Sao_Paulo');
      $dia = date('d');
      $mes = date('m');
      $ano = date('Y');
      $meses = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'];
      $mesTexto = $meses[intval($mes) - 1];
      $data = "Rio de Janeiro, em $dia de $mesTexto de $ano.";

      // Gerar linhas da tabela
      $linhas = '';
      foreach ($dispositivos as $d) {
        $linhas .= "<tr>
          <td class='tg-c3ow'>{$d['marca']}</td>
          <td class='tg-c3ow'>{$d['modelo']}</td>
          <td class='tg-c3ow'>{$d['num_serie']}</td>
          <td class='tg-c3ow'>{$d['descricao']}</td>
        </tr>";
      }

      $html = <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Declaração de Equipamentos Digitais Particulares - {$nomeCompleto}</title>
<style>
#corpotret { width: 794px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15px; text-align: center;}
#titulotret { font-size: 14px; font-weight: bold; margin-top: 50px; line-height: 15px; }
#datatret { font-size: 12px; text-align: right; margin-top: 20px; }
#textotret { text-align: justify; font-size: 12px; margin-top: 30px; }
#assinaturatret { width: 300px; margin-top: 80px; font-size: 12px; }
.tg { border-collapse: collapse; border-spacing: 0; width: 100%; }
.tg td, .tg th { font-family: Arial, sans-serif; font-size: 14px; padding: 10px 5px; border: 1px solid black; overflow: hidden; word-break: normal; }
.tg .tg-c3ow { text-align: center; vertical-align: top; }
.tg .tg-mn30 { font-size: 100%; font-family: serif !important; text-align: center; vertical-align: top; }
button { margin-top: 20px; }
@media print { button { display: none; } }
</style>
<script>
function imprimir() { window.print(); }
</script>
</head>
<body>
<div id="corpotret">
<div id="titulotret">
NOME NOME NOME<br>
NOME NOME NOME<br>
SEÇÃO DE INFORMÁTICA<br>
DECLARAÇÃO DE EQUIPAMENTOS DIGITAIS PARTICULARES
</div>

<div id="textotret">
Eu, <b>{$posto_grad} {$nomeCompleto}, NIP/RG {$nip}</b>, declaro que, até a presente data, possuo os equipamentos digitais abaixo relacionados.<br><br>
<table class="tg">
<tr>
<th class="tg-mn30">Marca</th>
<th class="tg-c3ow">Modelo</th>
<th class="tg-c3ow">Número de Série</th>
<th class="tg-c3ow">Descrição do Equipamento</th>
</tr>
{$linhas}
</table>
<br>
OBS 1: deverão ser declarados os bens pessoais do militar utilizados a bordo, tais como celulares, máquinas digitais, <em>pendrives</em>, <em>notebooks</em> ou outros equipamentos capazes de armazenar informações digitais, conforme regula a DGMM-0540 (3ª Revisão).<br><br>
OBS 2: cabe ao militar/civil da OM manter esta Declaração atualizada junto ao OSIC.
</div>

<div id="datatret">{$data}</div>

<div id="assinaturatret">
<hr>
<div align="center">
  <p>{$nomeCompleto}<br>{$posto_grad} {$nip}</p>
</div>
</div>

<div style="text-align:center;">
<button type="button" onclick="imprimir()">Imprimir / Salvar como PDF</button>
</div>

</div>
</body>
</html>
HTML;

      return new Response($html);
    }

    return new Response('Acesse este endpoint via POST.');
  }

}
