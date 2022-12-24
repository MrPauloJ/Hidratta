<?php

########################     CONFG-BASE     ########################

// Obtem base json
$data = json_decode(file_get_contents("data.json"), true);

// Obtem entradas do usuario
$id = $_GET["id"] ?? null;
$user = $_GET["usuario"] ?? null;
$userSenha = $_GET["senha"] ??null;
if($id!=null or $id==0){$id=intval($id);}
$titulo = $_GET["titulo"] ?? null;
$conteudo = $_GET["conteudo"] ?? null;
$imagemPost = $_GET["imagemPost"] ?? null;
$nomeCliente = $_GET["nomeCliente"] ?? null;
$imgCliente = $_GET["imgCliente"] ?? null;
$imgSlide = $_GET["imgSlide"] ?? null;
$operation = $_GET["operation"] ?? null;

// Formaliza autoincremento do ID
function nextId($section){
    global $data;
    return count($data[$section])+1;
}

// Corrige ID
function corrigirId($section){
    global $data;
    $data[$section]=array_values($data[$section]);
    $id=1;
    foreach($data[$section] as $dado){
        $data[$section][$id-1]["id"]=$id;
        $id+=1;
    }
}

// Reliza operacoes
switch($operation){
    case "novoSlide":
        novoSlide();
    break;
    case "alterarSlide":
        alterarSlide();
    break;
    case "deletarSlide":
        deletarSlide();
    break;
    case "novoPost":
        novoPost();
    break;
    case "alterarPost":
        alterarPost();
    break;
    case "deletarPost":
        deletarPost();
    break;
    case "novoCliente":
        novoCliente();
    break;
    case "alterarCliente":
        alterarCliente();
    break;
    case "deletarCliente":
        deletarCliente();
    break;
}

######################## USER MANIPULATION ########################

// Alterar senha de aministrador
function alterarSenhaAdmin(){
    global $data;

    // Obtem entradas do usuarios
    $newPass = $_GET["newPass"] ?? null;
    $oldPass = $_GET["oldPass"] ?? null;
    
    // Checa e altera senha caso validada
    if(($data["Users"][0]["user"]==="admin") and ($oldPass==$data["Users"][0]["senha"]) and ($newPass!=null) and ($oldPass!=null)){
        $data["Users"][0]["senha"] = $newPass;
        file_put_contents("data.json",json_encode($data));
    }else{
        echo "Tentativa invalidada ! <br>";
        echo "Senha antiga incorreta ! <br>";
    }
}

########################    ALTER CLIENT   ########################

// Adicionar cliente
function novoCliente(){
    global $data, $nomeCliente, $imgCliente;

    // Checa se as informacoes estao corretas e inputa
    if(($nomeCliente!=null) and ($imgCliente!=null)){
        $data["Clientes"][nextId("Clientes")] = array(
            "id"=>nextId("Clientes"),
            "nome"=>$nomeCliente,
            "imagem"=>$imgCliente
        );
        corrigirId("Clientes");
        file_put_contents("data.json",json_encode($data));
        echo "Inputados!";
    }else{
        echo "Erro!";
    }
}

// Altera cliente
function alterarCliente(){
    global $data, $id, $imgCliente, $nomeCliente;

    // Checa se as informacoes estao corretas e inputa
    if(($nomeCliente!=null) and ($imgCliente!=null) and ($id!=null)){
        foreach ($data["Clientes"] as $dado){
            if($dado["id"]===$id){
                $data["Clientes"][$id]["nome"]=$nomeCliente;
                $data["Clientes"][$id]["imagem"]=$imgCliente;
                file_put_contents("data.json",json_encode($data));
                echo "Inputados!";
            }
        }
    }else{
        echo "Erro!";
    }
}

// Consultar cliente
function consultarCliente(){
    global $data;
    if(count($data["Clientes"])>0){
        foreach ($data["Clientes"] as $dado){
            echo "<form action='' method='GET'>";
            echo "<tr>";
                echo "<input name='Clientes' style='visibility:hidden;'/>";
                echo "<input id='id' value=".$dado["id"]." style='visibility:hidden;'/>";
                echo "<td>";
                echo "<button name='operation' value='AlterarCliente'>UP</button>";
                echo "</td>";
                echo "<td>";
                echo "<button name='operation' value='deletarCliente'>DEL</button>";
                echo "</td>";
                echo "<td>";
                echo "<p id='content-empresa' class='fs-5'>".$dado["nome"]." - ".$dado["imagem"]."</p>";
                echo "</td>";
            echo "</tr>";
            echo "</form>";
        }
    }else{
        echo "<tr><td>";
        echo "<p id='content-empresa' class='fs-5'>Nenhum cliente foi criado pelo usuário até o momento.</p>";
        echo "</td></tr>";
    }
}

// Deleta cliente
function deletarCliente(){
    global $data, $id;

    // Checa se as informacoes estao corretas e inputa
    if($id!=null){
        foreach ($data["Clientes"] as $dado){
            if($dado["id"]===$id){
                unset($data["Clientes"][$id-1]);
            }
        }
        corrigirId("Clientes");
        file_put_contents("data.json",json_encode($data));
    }else{
        echo "Erro!";
    }
}

######################## POST MANIPULATION ########################

// Adicionar postagem
function novoPost(){
    global $data, $titulo, $conteudo, $imagemPost;

    // Checa se as informacoes estao corretas e inputa
    if(($titulo!=null) and ($conteudo!=null) and ($imagemPost!=null)){
        $data["Post"][nextId("Post")] = array(
            "id"=>nextId("Post"),
            "titulo"=>$titulo,
            "conteudo"=>$conteudo,
            "imagem"=>$imagemPost
        );
        corrigirId("Post");
        file_put_contents("data.json",json_encode($data));
        echo "Inputados!";
    }else{
        echo "Erro!";
    }
}

// Altera postagem
function alterarPost(){
    global $data, $titulo, $conteudo, $imagemPost, $id;
    // Checa se as informacoes estao corretas e inputa
    if(($titulo!=null) and ($conteudo!=null) and ($imagemPost!=null) and ($id!=null)){
        foreach ($data["Post"] as $dado){
            if($dado["id"]===$id){
                $data["Post"][$id]["titulo"]=$titulo;
                $data["Post"][$id]["conteudo"]=$conteudo;
                $data["Post"][$id]["imagem"]=$imagemPost;
                file_put_contents("data.json",json_encode($data));
                echo "Inputados!";
            }
        }
    }else{
        echo "Erro!";
    }
}

// Consultar post
function consultarPost(){
    global $data;
    if(count($data["Post"])>0){
        foreach ($data["Post"] as $dado){
            echo "<form action='' method='GET'>";
            echo "<tr>";
                echo "<input name='Obras' style='visibility:hidden;'/>";
                echo "<input name='id' value=".$dado["id"]." style='visibility:hidden;'/>";
                echo "<td>";
                echo "<button name='operation' value='AlterarPost'>UP</button>";
                echo "</td>";
                echo "<td>";
                echo "<button name='operation' value='deletarPost'>DEL</button>";
                echo "</td>";
                echo "<td>";
                echo "<p id='content-empresa' class='fs-5'>".$dado["titulo"]." - ".$dado["imagem"]."</p>";
                echo "</td>";
            echo "</tr>";
            echo "</form>";
        }
    }else{
        echo "<tr><td>";
        echo "<p id='content-empresa' class='fs-5'>Nenhuma obra foi criado pelo usuário até o momento.</p>";
        echo "</td></tr>";
    }
}

// Deleta postagem
function deletarPost(){
    global $data, $id;

    // Checa se as informacoes estao corretas e inputa
    if($id!=null){
        foreach ($data["Post"] as $dado){
            if($dado["id"]===$id){
                unset($data["Post"][$id-1]);
            }
        }
        corrigirId("Post");
        file_put_contents("data.json",json_encode($data));
    }else{
        echo "Erro!";
    }
}

########################    ALTER SLIDES   ########################

// Adicionar slide
function novoSlide(){
    global $data, $imgSlide;
    // Checa se as informacoes estao corretas e inputa
    if($imgSlide!=null){
        $data["Slides"][nextId("Slides")] = array(
            "id"=>nextId("Slides"),
            "imagem"=>$imgSlide
        );
        corrigirId("Slides");
        file_put_contents("data.json",json_encode($data));
        echo "Inputados!";
    }else{
        echo "Erro!";
    }
}

// Altera slide
function alterarSlide(){
    global $data, $id, $imgSlide;

    // Checa se as informacoes estao corretas e inputa
    if(($imgCliente!=null) and ($id!=null)){
        foreach ($data["Slide"] as $dado){
            if($dado["id"]===$id){
                $data["Slides"][$id]["imagem"]=$imgSlide;
                file_put_contents("data.json",json_encode($data));
                echo "Inputados!";
            }
        }
    }else{
        echo "Erro!";
    }
}

// Consultar Slide
function consultarSlide(){
    global $data;
    if(count($data["Slides"])>0){
        foreach ($data["Slides"] as $dado){
            echo "<form action='' method='GET'>";
            echo "<tr>";
                echo "<input name='Slides' style='visibility:hidden;'/>";
                echo "<input name='id' value=".$dado["id"]." style='visibility:hidden;'/>";
                echo "<td>";
                echo "<button name='operation' value='AlterarSlide'>UP</button>";
                echo "</td>";
                echo "<td>";
                echo "<button name='operation' value='deletarSlide'>DEL</button>";
                echo "</td>";
                echo "<td>";
                echo "<p id='content-empresa' class='fs-5'>".$dado["id"]." - ".$dado["imagem"]."</p>";
                echo "</td>";
            echo "</tr>";
            echo "</form>";
        }
    }else{
        echo "<tr><td>";
        echo "<p id='content-empresa' class='fs-5'>Nenhum Slide foi criado pelo usuário até o momento.</p>";
        echo "</td></tr>";
    }
}

// Deleta slide
function deletarSlide(){
    global $data, $id;
    // Checa se as informacoes estao corretas e inputa
    if($id!=null){
        foreach ($data["Slides"] as $dado){
            if($dado["id"]==$id){
                unset($data["Slides"][$id-1]);
            }
        }
        corrigirId("Slides");
        file_put_contents("data.json",json_encode($data));
    }else{
        echo "Erro!";
    }
}

?>