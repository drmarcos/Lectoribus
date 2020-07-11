<?php
/*-----------------------------------------------------------------------------------*
@       NÃO REMOVA AS INFORMÇÕES A SEGUIR
@		SISTEMA DE GERENCIAMENTO DE CONTEÚDOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍCULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português - Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       © todos os direitos reservados desde 2007  
@       VERSÃO 1.0     								 
@
@ NOTICE OF COPYRIGHT ---------------------------------------------------------------*                   
@
@ Copyright (C) 2007  Oliveira M.J.N  http://www.eadgames.com.br        
@ Copyright (C) 2012  Oliveira M.J.N  http://www.soordle.org                    
@
@ This program is free software; you can redistribute it and/or modify  
@ it under the terms of the GNU General Public License as published by  
@ the Free Software Foundation; either version 2 of the License, or     
@ (at your option) any later version.                                   
@
@ This program is distributed in the hope that it will be useful,       
@ but WITHOUT ANY WARRANTY; without even the implied warranty of        
@ MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         
@ GNU General Public License for more details:                          
@
@          http://www.gnu.org/copyleft/gpl.html                         
@                                                                       
@------------------------------------------------------------------------------------*/
if(!isset($_SESSION["idioma"])){
	$_SESSION["idioma"]=$idioma;
}
if (file_exists("$INCLUDE/modulos/$NomeModulo/idiomas/$_SESSION[idioma]/main.lang.php")){
	include("$INCLUDE/modulos/$NomeModulo/idiomas/$_SESSION[idioma]/main.lang.php");
}
if($pagina == "index.php"){

	$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');

		$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeInicial","","","","")." $_RESPONDER_LEITURA1</b>");
	if(isset($_SESSION["adm"])){
		if($_SESSION["adm"]== $_ADMINISTRADOR){		
			if($TextoLeitura == "ZERO"){
							$MJO->NTR('class='.$COR7.' colspan="3" align="LEFT"');
							$MJO->NOTB('class='.$COR1.' width="100%"');			
								$MJO->NTR('class='.$COR8.' align="center"');						
									$o = new printConteudo('<b>'.$_ALUNOS_SEM_ACESSO_FORM. '</b>');
							$MJO->NCTB();	
						$MJO->NCTR();
			}else{
							$MJO->NTR('class='.$COR7.' colspan="3" align="LEFT"');
							$MJO->NOTB('class='.$COR1.' width="100%"');			
								$MJO->NTR('class='.$COR9.' align="center"');						
									$o = new printConteudo('<b>'.$_ALUNOS_COM_ACESSO_FORM. '</b>');
							$MJO->NCTB();	
						$MJO->NCTR();				
			}	
		}
	}
	$MJO->NCTR();												
			$MJO->NCTR();																																
			$MJO->NHR('colspan="3" class='.$COR1.'');	
			$FORM->abreForm("","POST","customForm","customForm","");
			if($autoCadastro == "UM"){
				$FORM->mostraInput2("hidden","","cadastra","true");
				$FORM->mostraInput2("hidden","","autoCadastro","$autoCadastro");
				if(isset($_SESSION["usuario"])){
				$FORM->mostraInput2("hidden","","verifica","true");
				}
			}else{
							
				$FORM->mostraInput2("hidden","","cadastra","true");
				$FORM->mostraInput2("hidden","","verifica","true");
			}
					
			$FORM->mostraInput2("hidden","60","matricula","$identificacao");
				
}else{
			$FORM->abreForm("$pagina","post","customForm","customForm","");
			$FORM->mostraInput2("hidden","","nomeArquivo","$qualArquivo");
			$FORM->mostraInput2("hidden","","matricula2","$matricula");
			$FORM->mostraInput2("hidden","","atualizar","true");
			if (file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo")) {
			$xml = simplexml_load_file("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo");
			}
						$MJO->NTR('class='.$COR1.' colspan="2" align="center"');
							$o = new printConteudo("<b id=\"destaque5\">$_EDITAR</b>");
						$MJO->NCTR();								
						$MJO->NTR('colspan="2" align="left" class='.$COR3.'');
							$o = new printConteudo("<b>$_IDENTIFICACAO</b>: $qualArquivo");
						$MJO->NCTR();								
						$MJO->NHR('colspan="3" class='.$COR1.'');
																					
}						
						if(!isset($xml)){
							$xml = new stdClass();
							$xml->NOME = "";
							$xml->SERIE = "";
							$xml->PROFESSOR = "";
							$xml->QUESTAO1 = "";
							$xml->QUESTAO2 = "";
							$xml->QUESTAO3 = "";
							$xml->QUESTAO4 = "";
							$xml->QUESTAO5 = "";
							$xml->QUESTAO6 = "";
							$xml->HORARIO = "";
/*							$xml->COMENTARIO1 = "";
							$xml->COMENTARIO2 = "";
							$xml->COMENTARIO3 = "";
							$xml->COMENTARIO4 = "";
							$xml->COMENTARIO5 = "";
							$xml->COMENTARIO6 = "";
*/
							
							$valorBotaoEnvia = $_CADASTRAR;
						}else{
							$valorBotaoEnvia = $_EDITAR;
						}



/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* -- [ AÇÃO CADASTRAR 	] -- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */

if(isset($_POST["cadastra"])){
		require_once("$INCLUDE/includes/validar.php");			
		if( isset($_POST['enviar']) && (!validateName($_POST['nome'])) ){								
						if(!validateName($_POST['nome'])){							
							$MJO->NTR('colspan="3" align="left" vAlign="top"  class="'.$COR8.'" id="error"');
								$o = new printConteudo('<b id="destaque4">'.$_NOME.' &nbsp;'.$_INVALIDO.':</b> '.$_NOME_DEVE_CONTER.'');
							$MJO->NCTR();						
						}

			}elseif(isset($_POST['enviar'])){
				include("$INCLUDE/modulos/$NomeModulo/campos_obrigatorios.php");	
				include("$INCLUDE/modulos/$NomeModulo/cadastra.php");
				exit;
			}
	}
	
/* ----------------------------------------------------------------------------------------------------------------------------------- */
	print"<script type=\"text/javascript\" src=\"$ROTA/includes/js/jquery.js\"></script>";
	print"<script type=\"text/javascript\" src=\"$ROTA/includes/js/validation.js\"></script>";
/* ----------------------------------------------------------------------------------------------------------------------------------- */

			if (file_exists("$INCLUDE/modulos/$NomeModulo/idiomas/$_SESSION[idioma]/textos.leitura.inc.php")){
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$_SESSION[idioma]/textos.leitura.inc.php");
			}else{
				$o = new printConteudo('Não existe arquivo de tradução para este idioma <b id="destaque5">{ '.$_SESSION["idioma"].' }</b>');
					$MJO->NCTB();			
			$FORM->fecha_form();											
		$MJO->NCTB();
		$MJO->fim($INCLUDE,$tema);							
				exit;
			}
/* ----------------------------------------------------------------------------------------------------------------------------------- */

		if(!isset($_SESSION["adm"])){
			$_SESSION["adm"] = "";
		}
			if(($_SESSION["adm"]) != $_ADMINISTRADOR){				
				if($TextoLeitura == "ZERO"){
						$MJO->NTR('class='.$COR7.' colspan="3" align="LEFT"');
						$MJO->NOTB('class='.$COR1.' width="100%"');			
							$MJO->NTR('class='.$COR8.' align="center"');						
								$o = new printConteudo('<b>'.$_SISTEMA_MANUTENCAO. '</b>');
						$MJO->NCTB();	
					$MJO->NCTR();						
				}else{
					$o = new printConteudo($_OQUE_FAZER1,$_DICA_FAZER1,$_DICA_FAZER2.'<br/><br/>'.$_DICA_FAZER3,$_TEXTO_PARA_LEITURA1);
				}
			}else{	
					if((isset($qualArquivo))&&($qualArquivo != "")){
					?>
						<script type="text/javascript">
						$(document).ready(function() {
							$("h1#mostra").toggle(
								function() {
									$("div#oculto").fadeIn(); // ou slideDown()
								},
								function() {
									$("div#oculto").fadeOut(); // ou slideUp()
								}
							);
						});
						</script>
						<style type="text/css">
						
						#conteudo, #oculto {
							background: #e5e5e5;
							width: 730px;
							margin: auto;
							padding: 10px;
							border: solid 1px #ccc;
						}
						#conteudo h1 {
							font-size: 1em;
							cursor:pointer;
						}
						#oculto {
							display: none;
							margin-top: 0px;
						}
						</style>
						<div id="conteudo">
							<h1 id="mostra">Para visualizar o texto clique aqui!</h1>
						</div>
					<?php

					print('<div id="oculto">'.$_TEXTO_PARA_LEITURA1);
					}

				//$o = new printConteudo($_OQUE_FAZER1,$_DICA_FAZER1,$_DICA_FAZER2.'<br/><br/>'.$_DICA_FAZER3,$_TEXTO_PARA_LEITURA1);
					if((isset($qualArquivo))&&($qualArquivo != "")){
					print('</div>');
					}												
				
			}
			
	if($TextoLeitura != "ZERO"){					

/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* -- [ NOME ] -- */						
/* ----------------------------------------------------------------------------------------------------------------------------------- */
								
			$F->inputAjax($COR6,'<b id="destaque7">*</b><b id="destaque5">'.$_NOME.'</b>',$COR6,'TYPE="TEXT" id="name" name="nome" value="'.$xml->NOME.'" size="40" title="'.$_TITLE_CAMPO_NOME.'"','nameInfo');					

/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* --- [ SERIE ] --- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */

			$F->inputAjax($COR6,'<b id="destaque7">*</b><b id="destaque5">'.$_SERIE.'</b>',$COR6,'TYPE="TEXT" id="serie" name="serie" value="'.$xml->SERIE.'" size="40" title="'.$_TITLE_CAMPO_NOME.'"','nameInfo');					
						
/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* --- [ PERÍODO ] --- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */

			$MJO->NTR('align="left" class='.$COR1.'');
				$o = new printConteudo('<b id="destaque7">*</b><b id="destaque5">'.$_HORARIO_PERIODO.'</b>');									
				$MJO->NTD('align="left" class='.$COR1.'');											
					$horario = array("$_MANHA", "$_TARDE", "$_NOITE",);   
					$FORM-> comboBox('horario','comboBox', $horario,$xml->HORARIO, 'title="'.$_SELECIONE_OPCAO.'"');		
			$MJO->NCTR();

/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* --- [ PROFESSOR ] --- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */

			$F->input('class="'.$COR6.'"','<b id="destaque7">*</b><b id="destaque5">'.$_NOME_PROFESSOR.'</b>','class="'.$COR6.'"','TYPE="TEXT" name="professor" value="'.$xml->PROFESSOR.'" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"');						
			$MJO->NHR('colspan="3" class='.$COR1.'');
									
/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* --- [ QUESTÕES ] --- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */
			$tipoCampo = "hidden";
			$valoresNotas = 11;
			$F->input($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_UM.'</b>',$COR6,'TYPE="TEXT" name="questaoum" value="'.$xml->QUESTAO1.'" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"');
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO1;
					$F->comentaQuestoesNotas('comentario1',$xml->COMENTARIO1,'notaquestao1',$valoresNotas);
					unset($xml->COMENTARIO1,$notaquestao);														
				}
				else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario1" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao1" value="" size="1"');
				}
			$F->textArea($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_DOIS.'</b>',$COR6,'cols="50" rows="6" name="questaodois" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"',$xml->QUESTAO2);								
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO2;
					$F->comentaQuestoesNotas('comentario2',$xml->COMENTARIO2,'notaquestao2',$valoresNotas);
					unset($xml->COMENTARIO2,$notaquestao);
				}else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario2" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao2" value="" size="1"');
				}

			$F->textArea($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_TRES.'</b>',$COR6,'cols="50" rows="6" name="questaotres" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"',$xml->QUESTAO3);								
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO3;
					$F->comentaQuestoesNotas('comentario3',$xml->COMENTARIO3,'notaquestao3',$valoresNotas);
					unset($xml->COMENTARIO3,$notaquestao);
				}else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario3" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao3" value="" size="1"');
				}			
			$F->textArea($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_QUATRO.'</b>',$COR6,'cols="50" rows="6" name="questaoquatro" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"',$xml->QUESTAO4);
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO4;
					$F->comentaQuestoesNotas('comentario4',$xml->COMENTARIO4,'notaquestao4',$valoresNotas);
					unset($xml->COMENTARIO4,$notaquestao);
				}else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario4" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao4" value="" size="1"');
				}		
			$F->textArea($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_CINCO.'</b>',$COR6,'cols="50" rows="6" name="questaocinco" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"',$xml->QUESTAO5);
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO5;
					$F->comentaQuestoesNotas('comentario5',$xml->COMENTARIO5,'notaquestao5',$valoresNotas);
					unset($xml->COMENTARIO5,$notaquestao);
				}else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario5" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao5" value="" size="1"');
				}				
			$F->textArea($COR6,'<b id="destaque7">*</b><b id="destaque4">'.$_PERGUNTA_SEIS.'</b>',$COR6,'cols="50" rows="6" name="questaoseis" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"',$xml->QUESTAO6);
				if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
					$notaquestao = $xml->NOTAQUESTAO6;
					$F->comentaQuestoesNotas('comentario6',$xml->COMENTARIO6,'notaquestao6',$valoresNotas);
					unset($xml->COMENTARIO6,$notaquestao);
				}else{					
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="comentario6" value="" size="1"');
					$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="notaquestao6" value="" size="1"');
				}
if(($pagina != "index.php")&&($_SESSION["adm"] == $_ADMINISTRADOR)){
		$MJO->NTR('align="left" class='.$COR1.'');
			$o = new printConteudo('<b id="destaque5">'.$_PONTUAÇÃO.'</b>');
			
			$totalPontuacao = $xml->NOTAQUESTAO1+$xml->NOTAQUESTAO2+$xml->NOTAQUESTAO3+$xml->NOTAQUESTAO4+$xml->NOTAQUESTAO5+$xml->NOTAQUESTAO6;
			$totalGeral = $valoresNotas*6-6;
			$mediaTotal = $totalGeral/2;
			if($totalPontuacao <= $mediaTotal){
				$corcampo = $COR8;
			}else{
				$corcampo = $COR9;				
			}
		$MJO->NTD('align="CENTER" class='.$corcampo.'');
			$o = new printConteudo('<b id="destaque5">'.$totalPontuacao.'</b>'.'&nbsp;'.$_PONTOS_DE_TOTAL.'&nbsp;<b>'.$totalGeral.'</b>');
		$MJO->NCTR();	
/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* -- [ APROVADO ] -- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */

		$MJO->NTR('align="left" class='.$COR1.'');
			$o = new printConteudo('<b id="destaque5">'.$_APROVADO.'</b>');									
		$MJO->NTD('align="left" class='.$COR1.'');
			if($xml->APROVADO == ""){
				$xml->APROVADO = $_SELECIONE_OPCAO;
			}											
			$APROVADOARR = array("$_NAO","$_SIM");   
			$FORM-> comboBox('aprovado','comboBox', $APROVADOARR,$xml->APROVADO, 'title="'.$_SELECIONE_OPCAO.'"');		
		$MJO->NCTR();	
}else{															
	$F->input($COR6,'',$COR6,'TYPE="'.$tipoCampo.'" name="aprovado" value="0" size="1"');
}								
	$MJO->NHR('colspan="3" class='.$COR1.'');
/* ----------------------------------------------------------------------------------------------------------------------------------- */
/* --- [ BOTÃO ] --- */
/* ----------------------------------------------------------------------------------------------------------------------------------- */
			$MJO->NTR('colspan="2" align="center" class='.$COR1.'');
				$FORM->mostraBotao("BUTTON","enviar","enviar","$valorBotaoEnvia");
print "</DIV>";	
}
						
?>