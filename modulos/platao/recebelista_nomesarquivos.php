<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEڄOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATR̓ULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Portugu고- Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       � todos os direitos reservados desde 2007  
@       VERSÏ 1.0     								 
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
unset($pagina);
unset($diretorio);
$pagina = "recebelista_nomesarquivos";
$diretorio = "2";
session_name("soordle_xamaleon");
session_start();
/*import_request_variables("pg");	*/
extract($_GET);
extract($_POST);
				include('../../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");				
				include("$INCLUDE/modulos/$NomeModulo/classe_switch.php");
				$TROCA = new meuSwitch;
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
if($_SESSION["usuario"] != ""){

print "<center>";	
	montaMenu();
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeRelatorio","","","","")." $_RELATORIO</b>");
				$MJO->NCTR();
						
/* -- [ BUSCAR ARQUIVOS PELO NOME ] --*/
									
		$MJO->NTR('colspan="2" align="right" vAlign="top" class='.$COR6.'');
			$o = new printConteudo('<b id="destaque5"><a class="link2" href="../busca_nomes.php?verifica=true">'.$_BUSCA_NOMES.'</a></b>');
		$MJO->NCTR();	
		
/* -- [ // BUSCAR POR NOMES ] -- */	

				$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR5.'');		
/* -- [ BUSCAR ARQUIVOS POR APROVADOS ] --*/

				$MJO->NCTR();
				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo('<b id="destaque3"><a class="link2" href="../busca_nomes.php?buscaAprovados="1"&verifica=true">'.$_APROVADOS.'</a></b>');
				$MJO->NCTR();

/* -- [ BUSCAR ARQUIVOS POR LETRA ] --*/

				$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR5.'');
				
				$arr_alfa = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z");
				foreach( $arr_alfa as $chave => $letra ){
					$o = new printConteudo('<b id="destaque3"><a class="link2" href="../busca_nomes.php?buscaLetra='.$letra.'&verifica=true">'.$letra.'</a></b>');
        			if( $chave < count($arr_alfa)-1 )
                	echo " | ";
				}
				$MJO->NCTR();
	
				$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR5.'');
				if(!isset($_SESSION["nomesArquivos"])){
				$valorNomesArquivos = "nomeArquivo=".$nomesArquivos."&";
				}else{
				$valorNomesArquivos = "";	
				}
					$M = new menu;
					$alturaIcone = 48;
					$larguraIcone = 48;	
					$menuArray = array();
						$menuArray[1] = $MJO->imagensTagLink('gera_lms.php?totalArquivos='.$totalArquivos.'&verifica=true','','LMS',$CFG->iconeLMS,'',$alturaIcone,$larguraIcone);			
						$menuArray[2] = $MJO->imagensTagLink('gera_cms.php?totalArquivos='.$totalArquivos.'&verifica=true','','CMS',$CFG->iconeCMS,'',$alturaIcone,$larguraIcone);
						$menuArray[3] = $MJO->imagensTagLink('gera_txt.php?totalArquivos='.$totalArquivos.'&verifica=true','','TXT',$CFG->iconeTxt,'',$alturaIcone,$larguraIcone);
						$menuArray[4] = $MJO->imagensTagLink('gera_xls.php?totalArquivos='.$totalArquivos.'&verifica=true','','XLS',$CFG->iconeExcel,'',$alturaIcone,$larguraIcone);					
						$menuArray[5] = $MJO->imagensTagLink('gera_pdf.php?'.$valorNomesArquivos.'totalArquivos='.$totalArquivos.'&verifica=true','','PDF',$CFG->iconePDF,'',$alturaIcone,$larguraIcone);
					$M->MenuExportacao($menuArray);
				$MJO->NCTR();
				
// PARA EVITAR UMA TENTATIVA ERRADA DE LEITURA

	if(!isset($_SESSION["nomesArquivos"])){
	$nomesArquivos = $nomesArquivos;	
	}else{		
	$nomesArquivos = $_SESSION["nomesArquivos"];
	}
	$totalArquivos = $totalArquivos-1;	
	$i=0;
	while($i<=$totalArquivos)
  	{

		$array_nomes = explode("#",$nomesArquivos);	
		$qualArquivo = $array_nomes[$i];
				$MJO->NCTR();
				if (file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo")) {
				$xml = simplexml_load_file("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo"); 
			
					$p_cnt = count($xml->NOME);
				
					$MJO->NTR('class="'.$COR4.'"');
							$o = new printConteudo("<b id=\"destaque2\">$_MATRICULA</b>");
					$MJO->NTD('class="'.$COR4.'"');
							$o = new printConteudo("<b id='destaque2'>".$xml->IDENTIFICACAO."</b>");							
					$MJO->NCTR();						
			
					$MJO->NTR();
							$o = new printConteudo($_APROVADO);									
							print "</TD><TD><b id='destaque7'>";
							$aprovadoCadastrado = $xml->APROVADO;
							$TROCA->mostraAprovado($aprovadoCadastrado);
						print "</b></TD></TR>";						

					if($xml->NOME != "")					
							$o = new printConteudo($_NOME,"<b id='destaque5'>".$xml->NOME."</b>");
												
					if($xml->SERIE != "")
							$o = new printConteudo($_SERIE,$xml->SERIE);
					if($xml->HORARIO != "")
					$MJO->NTR();
							$o = new printConteudo($_HORARIO_PERIODO);									
							print "</TD><TD><b id='destaque10'>";
							$horarioCadastrado = $xml->HORARIO;
							$TROCA->mostraHorario($horarioCadastrado);
						print "</b></TD></TR>";								
							
					if($xml->PROFESSOR != "")
					$MJO->NTR();
					
							$o = new printConteudo($_NOME_PROFESSOR,$xml->PROFESSOR);									
						print "</b></TD></TR>";
						
/* -- [ QUESTÕES ] -- */					
					if($xml->QUESTAO1 != "")
							$o = new printConteudo($_PERGUNTA_UM,$xml->QUESTAO1);																											
					if($xml->QUESTAO2 != "")
							$o = new printConteudo($_PERGUNTA_DOIS,$xml->QUESTAO2);																											
																											
					if($xml->QUESTAO3 != "")
							$o = new printConteudo($_PERGUNTA_TRES,$xml->QUESTAO3);																											
																											
					if($xml->QUESTAO4 != "")
							$o = new printConteudo($_PERGUNTA_QUATRO,$xml->QUESTAO4);																											
																											
					if($xml->QUESTAO5 != "")
							$o = new printConteudo($_PERGUNTA_CINCO,$xml->QUESTAO5);																											
																											
					if($xml->QUESTAO6 != "")
							$o = new printConteudo($_PERGUNTA_SEIS,$xml->QUESTAO6);																											

			$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR6.'');
				$MJO->imagensTagLink("editar_xml.php?arquivo=$xml->IDENTIFICACAO","","$_EDITAR","$CFG->iconeEditar","$_EDITAR","16","16");
				$MJO->imagensTagLink("../excluir_xml.php?arquivo=$xml->IDENTIFICACAO","","$_EXCLUIR","$CFG->iconeExcluir","$_EXCLUIR","16","16");			
			}//FECHA O IF PARA SE FILE EXIST
		$i++;
				$MJO->NCTR();
$MJO->NHR('colspan="3" class='.$COR1.'');

	}//FECHA O WHILE DO TOTAL DE ARQUIVOS
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$_ACESSO_NEGADO</div>";
}	
				$MJO->NCTR();
		$MJO->NCTB();
		print "<br/>";
$MJO->fim($INCLUDE,$tema);								
?>