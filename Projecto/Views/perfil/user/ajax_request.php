<?php

    
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=bd_angohairs;charset=utf8", 
                        "root", ""); 
    }catch(PDOException $ex){
        echo "ERRO: ".$ex->getMessage();
    }
    
    $request = (isset($_GET['request'])) ? filter_input(INPUT_GET, "request"):null;
    
    if($request=='get_categoria'){
        $stmt = $pdo->prepare("SELECT * FROM tb_categoria");
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }else if($request=='get_servico'){
        $stmt = $pdo->prepare("SELECT * FROM tb_tratamento WHERE id_categoria = ?");
        $stmt->execute(array(filter_input(INPUT_POST, "id_cat")));
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }else if($request=='get_profissional'){
        $stmt = $pdo->prepare("SELECT DISTINCT tb_profissional.id_profissional,nome FROM tb_pessoa,tb_profissional,tb_tratamento,tb_servico where tb_profissional.id_profissional = tb_servico.id_profissional and tb_tratamento.id_tratamento = tb_servico.id_tratamento and tb_pessoa.id_pessoa = tb_profissional.id_profissional and tb_tratamento.id_tratamento = ?");
        $stmt->execute(array(filter_input(INPUT_POST, "id_servico")));
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }else if($request=='get_horario'){
        $stmt = $pdo->prepare("SELECT DISTINCT tb_horario.id_horario,horario,nome FROM tb_pessoa,tb_profissional,tb_horario,tb_servico where tb_profissional.id_profissional = tb_servico.id_profissional and tb_horario.id_horario = tb_servico.id_horario and tb_pessoa.id_pessoa = tb_profissional.id_profissional and tb_profissional.id_profissional = ?");
        $stmt->execute(array(filter_input(INPUT_POST, "id_profissional")));
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }
    
    