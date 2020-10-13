<?php
namespace examples;

use classes\TableDB;

require_once '../classes/TableDB.php';

#######Classe Cliente
class Cliente extends TableDB
{
    protected string $tableName = 'tb_cliente';
    protected string $primaryKey = 'id_cliente';
}

#######Classe Contacto
class Contacto extends TableDB
{
    protected string $tableName = 'tb_contacto';
    protected string  $primaryKey = 'id_contacto';
}


###########Criação dos Objectos############
$cliente = new Cliente();
$contacto = new Contacto();



#############Inserção de Dados ##########################################################
$cliente->insert([
    'nome' => 'Wilson dos Santos',
    'sexo'=> 'Masculino',
    'data_nasc' => '1974-10-09'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 923456789,
    'email' => 'wilson02@gmail.com'
]);

$cliente->insert([
    'nome' => 'Jéssica Lorena',
    'sexo'=> 'Feminino',
    'data_nasc' => '1997-11-02'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 949001256,
    'email' => 'jessica-17@gmail.com'
]);

$cliente->insert([
    'nome' => 'Carlos Fernando',
    'sexo'=> 'Masculino',
    'data_nasc' => '2000-01-08'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 919875643,
    'email' => 'carlosf@yahoo.com'
]);

$cliente->insert([
    'nome' => 'Hermenegildo Calipa',
    'sexo'=> 'Masculino',
    'data_nasc' => '2001-05-01'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 990563412,
    'email' => 'hermenegildo@yahoo.com'
]);

$cliente->insert([
    'nome' => 'Lucinda Mesquita',
    'sexo'=> 'Feminino',
    'data_nasc' => '1993-10-10'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 945139640,
    'email' => 'lucinda@hotmail.com'
]);

$cliente->insert([
    'nome' => 'Rosário Afonso',
    'sexo'=> 'Masculino',
    'data_nasc' => '1981-03-04'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 938123450,
    'email' => 'afonso2008@hotmail.com'
]);
echo "<hr><br>";


$cliente->insert([
    'nome' => 'Joana Manuel',
    'sexo'=> 'Feminino',
    'data_nasc' => '2001-01-07'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 918123405,
    'email' => 'joana@hotmail.com'
]);

$cliente->insert([
    'nome' => 'Ana Maria',
    'sexo'=> 'Feminino',
    'data_nasc' => '1970-09-08'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 992874312,
    'email' => 'ana@gmail.com'
]);

$cliente->insert([
    'nome' => 'Ortiz David',
    'sexo'=> 'Masculino',
    'data_nasc' => '1994-10-22'
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 916975061,
    'email' => 'ortizdavid-17@hotmail.com'
]);

$cliente->insert([
    'nome' => 'Maria Francisco',
    'sexo'=> 'Feminino',
    'data_nasc' => '1991-02-03',
]);

$contacto->insert([
    'id_cliente' => $cliente->getLastId(),
    'telefone' => 917003405,
    'email' => 'maria@yahoo.com'
]);
###########################################################################################



#####################Obter o primeiro, o médio e o último Registo################################################-
echo "<h3>Obtendo o Primeiro, Médio e o Último Registo...</h3>";

$obj = $cliente->first();
echo "Dados Cliente primeiro Cliente:<br>";
echo "Id: {$obj->id_cliente}<br>Nome: {$obj->nome}<br>Sexo: {$obj->sexo}<br>Data de Nascimento: {$obj->data_nasc}";
echo "<br><br>";

$obj = $cliente->middle();
echo "Dados Cliente Cliente do Meio:<br>";
echo "Id: {$obj->id_cliente}<br>Nome: {$obj->nome}<br>Sexo: {$obj->sexo}<br>Data de Nascimento: {$obj->data_nasc}";
echo "<br><br>";

$obj = $cliente->last();
echo "Dados Cliente último Cliente:<br>";
echo "Id: {$obj->id_cliente}<br>Nome: {$obj->nome}<br>Sexo: {$obj->sexo}<br>Data de Nascimento: {$obj->data_nasc}";
echo "<hr><br>";
########################################################################################-




#####################Obter um Registo################################################-
echo "<h3>Obtendo Registos pelo Nome e pelo Id...</h3>";
$id = 5;
$obj = $cliente->find($id);
echo "Dados Cliente com Id: {$id}<br>";
echo "Nome: {$obj->nome}<br>Sexo: {$obj->sexo}<br>Data de Nascimento: {$obj->data_nasc}";
echo "<br><br>";

$nome = "Carlos Fernando";
$obj = $cliente->unique('nome', $nome);
echo "Dados Cliente com Nome: {$nome}<br>";
echo "Id: {$obj->id_cliente}<br>Sexo: {$obj->sexo}<br>Data de Nascimento: {$obj->data_nasc}";
echo "<hr><br>";
########################################################################################-



#####################Buscar Registos ################################################-
echo "<h3>Buscando Registos por Nome e por Sexo...</h3>";
$param = 'm';
$busca = $cliente->search(['nome'=>$param]);
$total = count($busca);
echo "Busca o Nome dos Clientes que o nome contém <b>'{$param}'</b><br>Resultados Encontrados: {$total}<br>";
foreach ($busca as $cl) {
   echo "Nome: {$cl->nome}<br>";
}
echo "<br><br>";

$param = 'Masculino';
$busca = $cliente->search(['sexo'=>$param]);
$total = count($busca);
echo "Busca o Nome e Data dos Clientes do Sexo <b>'{$param}'</b><br>Resultados Encontrados: {$total}<br>";
foreach ($busca as $cl) {
   echo "Nome: {$cl->nome} -- {$cl->data_nasc}<br>";
}
echo "<hr><br>";
########################################################################################-



#####################Eliminar um Registo################################################-
echo "<h3>Eliminando Registos por Id e por Nome...</h3>";
$id = 2;
$cliente->delete($id);
echo "Foi Eliminado o Cliente com Id: {$id}";
echo "<br>";

$nome = "Carlos Fernando";
$cliente->deleteWhere(['nome'=>$nome]);
echo "Foi Eliminado o Cliente com Nome: {$nome}";
echo "<br>";

$nome1 = 'Ana Maria'; $nome2 = 'Ortiz David';
$cliente->deleteMany('nome', [$nome1, $nome2]);
echo "Foram Eliminados 2 Clientes: {$nome1} e {$nome2}";
echo "<hr><br>";
########################################################################################-



#####################Actualizar um Registo################################################-
echo "<h3>Actualizando Registos pelo nome e Pelo Id...</h3>";
$id = 1;
$cliente->update(['data_nasc'=>'2002-04-04'], $id);
echo "Foi Actualizada a Data do Cliente com Id: {$id}<br>";

$id = 2;
$cliente->update(['data_nasc'=>'2000-09-03', 'altura'=>1.99], $id);
echo "Foi Actualizada a Data e Altura do Cliente com Id: {$id}<br>";

$nome = "Carlos Fernando";
$cliente->updateWhere(['data_nasc'=>'1989-01-09', 'sexo'=>'Feminino', 'altura'=>1.78], ['nome' => $nome]);
echo "Foi Actualizada a Data, Altura e o Sexo do Cliente com Nome: {$nome}<br>";
echo "<hr><br>";
########################################################################################-



#####################Funções Maior e Menor################################################-
echo "<h3>Otendo o Maior, Menor, Média e Soma...</h3>";
echo "Maior Id: {$cliente->max('id_cliente')}<br>";
echo "Menor Id: {$cliente->min('id_cliente')}<br>";
echo "Soma de todos os Ids: {$cliente->sum('id_cliente')}<br>";
echo "Média de todos os Ids: {$cliente->avg('id_cliente')}<br>";
echo "<hr><br>";
########################################################################################-



##################### Manipulação de Datas ################################################-
$data1 = "1993-10-08";
$data2 = "2001-11-18";
$hora1 = date('H:i:s');
$hora2 = '05:00:00';
echo "<h3>Manipulando Datas...</h3>";
echo "Da Data '{$data1}' Passaram-se a '{$cliente->age($data1)}' anos<br>";
echo "Subtraindo 15 dias na data '{$data1}' ----------- '{$cliente->subDate($data1, '15', 'day')}'<br>";
echo "Adicionando 2 anos na data '{$data1}' ----------- '{$cliente->addDate($data1, '2', 'year')}'<br>";
echo "A diferença entre as datas '{$data1}' e '{$data2}' é: '{$cliente->diffDate($data1, $data2)}'<br>";
echo "Obtendo o mês da data '{$data2}' ---------- '{$cliente->extract($data2, 'month')}'<br>";
echo "Obtendo o ano da  data '{$data2}' ---------- '{$cliente->extract($data2, 'year')}'<br>";
echo "Conversão da data '{$data1}' em minutos --------- '{$cliente->convertPeriod($data2, 'minute')}'<br>";
echo "Conversão da data '{$data1}' em semanas ---------- '{$cliente->convertPeriod($data2, 'week')}'<br>";
echo "Último dia do mês da data '{$data1}' ----------- '{$cliente->convertPeriod($data2, 'last_day')}'<br>";
echo "Adicionando '2h e 30 minutos' na Hora '{$hora1}' --------- '{$cliente->addTime($hora1, '02:30:00')}'<br>";
echo "Diferença de Horas entre '{$hora1}' e '{$hora2}' ---------- '{$cliente->timeDiff($hora1, $hora2)}'<br>";
echo "Obtendo o dia da semana na data '{$data2}' ------------ '{$cliente->dayOf($data2, 'week')}'<br>";
echo "<hr><br>";
########################################################################################-



#####################Listagem dos Registos ################################################-
echo "<h3>Listando todos os Clientes <br>Total: {$cliente->count()}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($cliente->findAll() as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<p>Colunas Afectadas: {$cliente->getNumCols()}</p>";
echo "<p>Linhas Afectadas: {$cliente->getNumRows()}</p>";
echo "<hr><br>";
###########################################################################################



#####################Listagem dos Registos ordenados por Nome ################################################-
echo "<h3>Listando os Clientes Ordenados por Nome... <br>Total: {$cliente->count()}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($cliente->orderBy('nome') as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<hr><br>";
###########################################################################################



#####################Listagem Apenas os Clientes do Sexo Feminino ################################################-
$sexo = "Feminino";
echo "<h3>Listando apenas os de Clientes do Sexo '{$sexo}' ...<br>Total: {$cliente->countWhere('sexo', $sexo)}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($cliente->only(['sexo'=> $sexo]) as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<hr><br>";
###########################################################################################



#####################Listagem de Todos os Clientes Excepto o Carlos Fernando ################################################-
$nome = "Hermenegildo Calipa";
echo "<h3>Listando todos os Clientes Excepto '{$nome}' ...<br>Total: {$cliente->countExcept('nome', $nome)}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($cliente->except(['nome'=>$nome]) as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<hr><br>";
###########################################################################################



#####################Listagem de Todos os Clientes Que têm Altura################################################-
$lista = $cliente->isNull('altura');
$total = count($lista);
echo "<h3>Listagendo os Clientes que não têm altura...<br>Total: {$total}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($lista as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<hr><br>";
###########################################################################################



#####################Listagem de Todos os Clientes Que não têm Altura################################################-
$lista = $cliente->isNotNull('altura');
$total = count($lista);
echo "<h3>Listagem de Clientes que têm altura<br>Total: {$total}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($lista as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table><hr>";
###########################################################################################



#####################Listagem de Todos os Clientes Que Nasceram entre X e Y################################################-
$data1 = '1950-01-01';
$data2 = '1986-12-31';
$lista = $cliente->between('data_nasc', $data1, $data2);
$total = count($lista);
echo "<h3>Listagem de Clientes que nasceram entre '{$data1}' e '{$data2}'<br>Total: {$total}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($lista as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table><hr>";
###########################################################################################



#####################Listagem de Todos os Clientes Que não Nasceram entre X e Y################################################-
$data1 = '1950-01-01';
$data2 = '1986-12-31';
$lista = $cliente->notBetween('data_nasc', $data1, $data2);
$total = count($lista);
echo "<h3>Listando os Clientes que não nasceram entre '{$data1}' e '{$data2}' ...<br>Total: {$total}</h3>";
echo "<table border='1'>";
echo "  <tr>";
echo "      <th>Id</th>";
echo "      <th>Nome</th>";
echo "      <th>Sexo</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Idade</th>";
echo "      <th>Altura</th>";
echo "  </tr>";
foreach ($lista as $cl) {
    echo "  <tr>";
    echo "      <td>{$cl->id_cliente}</td>";
    echo "      <td>{$cl->nome}</td>";
    echo "      <td>{$cl->sexo}</td>";
    echo "      <td>{$cl->data_nasc}</td>";
    echo "      <td>{$cliente->age($cl->data_nasc)} anos </td>";
    echo "      <td>{$cl->altura} </td>";
    echo "  </tr>";
}
echo "</table>";
echo "<hr></br>";
###########################################################################################