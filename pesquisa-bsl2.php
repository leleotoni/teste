<?php

    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');    

?>     
    <link rel="stylesheet" href="css/style_cadastro.css">
    <h1> Pesquisa BSL </h1>
        <div>A pesquisa poderá ser feito número do BSL</div>
            <pre>
                <form method="POST" action="">
                    <label>Buscar: </label>
                    <input id="BuscaNum" name="Pesq" type="text" class="g" placeholder="Digite número BSL">
                    <input type="submit" value="Pesquisar">
                </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Data</th>
                                <th>Ação</th>
                                </tr>
                            <?php
                                foreach (glob("c:/xampp/htdocs/teste/bsl/*.pdf") as $arquivo) {
                                    $palavra = "portaria";
                                    header('Content-Type: text/plain');
                                    $conteudo = file_get_contents($arquivo);
                                    $parte = explode("\n", $conteudo);
                                    $base = preg_quote($palavra, '/');
                                    $base = "/^.*$base.*\$/m";
                                    if(preg_match_all($base, $parte[0], $achado)){
                                        echo "achou:\n";
                                        echo implode("\n", $achado[0]);
                                    }else{
                                        echo "não achou";
                                    }
                                }
                                /*if(isset($_POST['Pesq'])) {
                                    $numero = addslashes($_POST['Pesq']);
                                    $pesquisa = $b->pesquisaBsl($numero);
                                    foreach ($pesquisa as $dados) {              
                            ?> 
                                        <tr>
                                        <td><?php echo $dados["numero"] ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($dados["data"]))?></td>
                                        <td><?php echo "<a href=\"bsl/". $dados["arquivo"] ."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button></td>
                                        </tr>
                                            <?php                                          
                                    }
                                    if(!isset($dados["numero"])) {
                                    ?>
                                        <script type="text/javascript">
                                            alert('Nenhum BSL cadastrado com este número');
                                        </script>
                                    <?php
                                    }
                                        
                                }*/
                                    
            
                    ?>

                        </thead>

                    </table> 
            </pre>
