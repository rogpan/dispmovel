# Módulo Dispmovel - Declaração de Equipamentos Digitais Particulares

## 📋 Descrição
Módulo customizado do Drupal 10 para geração da **Declaração de Responsabilidade de Uso de Dispositivo Móvel**.

## 🚀 Rotas
- `/disp_movel` → Formulário para preenchimento dos dados.
- `/dispmovel/gerar` → Geração da declaração em formato imprimível.

## 🧩 ## Instalação e Configuração
1.  Crie uma página copie o código html abaixo (formato de texto completo) nomeie o caminho para disp_movel, Código:

<form method="POST" action="/drupal10/web/dispmovel/gerar">
    <h2>
        Declaração de Equipamentos Digitais Particulares
    </h2>
    <hr>
    <div class="form-group">
        <label for="nomeCompleto">Nome Completo</label> <input class="form-control" style="text-transform:uppercase;" type="text" maxlength="50" name="nome_completo" required="">
    </div>
    <div class="form-group">
        <label for="postoGrad">Posto/Graduação</label> <input class="form-control" style="text-transform:uppercase;" type="text" maxlength="50" name="posto_grad" required="">
    </div>
    <div class="form-group">
        <label for="NipUsuario">Nip ou Nº da Identidade</label> <input class="form-control" style="text-transform:uppercase;" type="text" maxlength="50" name="NipUsuario" required="">
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Marca
                </th>
                <th>
                    Modelo
                </th>
                <th>
                    Número de série
                </th>
                <th>
                    Descrição do Equipamento
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input style="border-width:0;" type="text" name="marca_1" required="">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="modelo_1" required="">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="num_serie_1" required="">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="desc_equip_1" required="">
                </td>
            </tr>
            <tr>
                <td>
                    <input style="border-width:0;" type="text" name="marca_2">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="modelo_2">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="num_serie_2">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="desc_equip_2">
                </td>
            </tr>
            <tr>
                <td>
                    <input style="border-width:0;" type="text" name="marca_3">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="modelo_3">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="num_serie_3">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="desc_equip_3">
                </td>
            </tr>
            <tr>
                <td>
                    <input style="border-width:0;" type="text" name="marca_4">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="modelo_4">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="num_serie_4">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="desc_equip_4">
                </td>
            </tr>
            <tr>
                <td>
                    <input style="border-width:0;" type="text" name="marca_5">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="modelo_5">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="num_serie_5">
                </td>
                <td>
                    <input style="border-width:0;" type="text" name="desc_equip_5">
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <button class="btn btn-primary" type="submit">Gerar Declaração</button>
    </p>
</form>



2. Acesse a página "Estender" do Drupal: `/admin/modules` e marque a opção **DispMovel - Declaração de Disp Movel**.
3. Preencha os campos: **Posto/Graduação**, **Nome Completo** e **NIP**.
4. Clique em **Gerar Declaração**.
5. Na página gerada, clique em **Salvar em PDF** para exportar.

## Requisito

    Drupal 10.1 ou superior
    PHP 8.1 ou superior
    Apache/Nginx com suporte a URL amigável
    Fonte Carlito instalada no sistema (opcional — fonte carregada via Google Fonts)

## Histórico de Versões
Versão 1.0.0 - 22/10/2025

    Testado com Drupal 10.4.x
    Lançamento inicial do módulo
    Formulário e controlador integrados
    Layout responsivo e compatível com formato A4
    Texto legal completo e otimizado para impressão

## Autoria e Créditos

    Autor Principal: Roger Pantoja da Silva
    Data de Criação: Outubro/2025

    Desenvolvimento: Este módulo foi elaborado por Roger Pantoja da Silva com o apoio da inteligência artificial ChatGPT da OpenAI, atuando como assistente na codificação, estruturação e depuração do projeto Drupal 10.

## Licença

Este projeto é licenciado sob a GNU General Public License v3 ou superior. Consulte o arquivo LICENSE.txt para mais informações.
