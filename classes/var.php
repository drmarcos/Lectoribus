<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEڄOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português- Brasil	            						 
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
if(($diretorio == "0")and(!file_exists("config.inc.php"))){
	include("includes/cria_condicao.inc.php");
	exit;
}elseif(($diretorio == "1")and(!file_exists("../config.inc.php"))){
	include("../includes/cria_condicao.inc.php");
	print " <META HTTP-EQUIV=\"Refresh\" Content=0;URL=\"../../index.php\"> ";
	exit;
}elseif(($diretorio == "2")and(!file_exists("../../config.inc.php"))){
	include("../../includes/cria_condicao.inc.php");
	print " <META HTTP-EQUIV=\"Refresh\" Content=0;URL=\"../../../index.php\"> ";
	exit;
}else {
	if($diretorio == "0"){include("config.inc.php");}elseif($diretorio == "1"){include("../config.inc.php");}else{include("../../config.inc.php");}
	$_SESSION["idioma"] = $idioma;
	if(!file_exists("$INCLUDE/idiomas/$_SESSION[idioma]/main.lang.php")){
		if($producao == "SIM"){
			$producao = "<h2>Modo produção</h2>";
		}else{
			$producao = "<h2>Modo desenvolvimento</h2>";
		}
		print "<center><meta charset=\"utf-8\"><b>Encontramos um problema nas configurações do sistema</b><br/>Sua configuração atual esta setada para $producao</center>";
			if($producao == "SIM"){
			$producao = "<h2>Production mode</h2>";
		}else{
			$producao = "<h2>Development mode</h2>";
		}
		print "<center><meta charset=\"utf-8\"><b>We found a problem in the system settings </b><br/> Your current configuration set to this $producao</center>";
		exit;
}
include("$INCLUDE/idiomas/$_SESSION[idioma]/main.lang.php");
include("$INCLUDE/classes/lib_html.php"); 
include("$INCLUDE/classes/biblioteca.php"); 
include("$INCLUDE/classes/forms.inc.php");
include("$INCLUDE/includes/menu.inc.php");
$FORM = new Form;
$MJO = new montaHtml;
$F = new Newform;
							$COR1 = "c1"; $COR8 = "c8";
							$COR2 = "c2"; $COR9 = "c9";
							$COR3 = "c3"; $COR10 = "c10";
							$COR4 = "c4"; $COR11 = "c11";
							$COR5 = "c5";
							$COR6 = "c6";
							$COR7 = "c7";

$META_TAGS = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\" >
<html>\n
<head>\n
<meta charset=\"utf-8\">\n
<meta name=\"description\" content=\"$metaDescricao\">\n
<meta name=\"keywords\" content=\"$metaPalavrasChave\">\n
<meta name=\"author\" content=\"$metaAutor\">\n
<link rel=\"shortcut icon\" href=\"$ROTA/imagens/icones/favicon.ico\" type=\"image/x-icon\" />
<title>$tagTituloSite</title>\n
</head>\n";
unset ( $CFG ) ;
$CFG = new stdClass();
$CFG->caminhoImagens = "$ROTA/imagens/";
$CFG->caminhoIcones = $CFG->caminhoImagens."icones/";
$CFG->caminhoTemasImagens = "$ROTA/temas/$tema/imagens/";
$CFG->caminhoTemasIcones = $CFG->caminhoTemasImagens."icones";
$CFG->iconeInicial = $CFG->caminhoTemasIcones."/cadastrar.png";
$CFG->iconeConfig = $CFG->caminhoTemasIcones."/pre_requisitos.png";
$CFG->iconeMenuConfig = $CFG->caminhoTemasIcones."/menu_config.png";
$CFG->iconeRelatorio = $CFG->caminhoTemasIcones."/relatorios.png";
$CFG->iconeRelatorioDesativados = $CFG->caminhoTemasIcones."/relatorios_desativados.png";
$CFG->iconeImpressao = $CFG->caminhoTemasIcones."/impressao.png";
$CFG->iconeAjuda = $CFG->caminhoTemasIcones."/ajuda.png";
$CFG->iconeMenuAjuda = $CFG->caminhoTemasIcones."/menu_ajuda.png";
$CFG->iconeSair = $CFG->caminhoTemasIcones."/sair.png";
$CFG->iconeBusca = $CFG->caminhoTemasIcones."/busca.png";
$CFG->iconeGNU = $CFG->caminhoTemasIcones."/gnu.png";
$CFG->iconeCadeado = $CFG->caminhoTemasIcones."/lock.png";
$CFG->iconeEditar = $CFG->caminhoTemasIcones."/editar1.png";
$CFG->iconeEditarPasta = $CFG->caminhoTemasIcones."/editar.png";
$CFG->iconeDevelop = "VDJ4cGRtVnBjbUVnVFM1S0xrNGdaR1Z6Wlc1MmIyeDJhVzFsYm5SdklGZGxZanhpY2k4K2MyOXZjbVJzWlNaamIzQjVPMmR0WVdsc0xtTnZiVHhpY2k4K2QzZDNMbk52YjNKa2JHVXViM0pu.png";
$CFG->iconeExcluir = $CFG->caminhoTemasIcones."/lixeira2.png";
$CFG->iconeIdiomaAtual = "/$_SESSION[idioma].png";
$CFG->iconePDF = $CFG->caminhoIcones."pdf2.png";
$CFG->iconeExcel = $CFG->caminhoIcones."excel.png";
$CFG->iconeTxt = $CFG->caminhoIcones."txt.png";
$CFG->iconeLMS = $CFG->caminhoIcones."lms.png";
$CFG->iconeCMS = $CFG->caminhoIcones."cms.png";
$CFG->iconeAdmin = $CFG->caminhoTemasIcones."/admin.png";
$CFG->iconeSoordle = $CFG->caminhoTemasIcones."/soordle.png";
$CFG->caminhoArquivosXML = "arquivos_xml/$NomeModulo";
$CFG->imagemErro404 = $CFG->caminhoImagens."/404.png";
$CFG->imagemLogoMSG = $CFG->caminhoImagens."/logo_branco.png";
$VersaoDemo = 1;
$mostraEmail = str_replace("@", "<img src='$ROTA/temas/$tema/imagens/icones/mail_arrob.png' width='16' height='16'>", "$AUTOR1_Email");
$COPY = "&copy; $_TODOS_DIREITOS_RESERVADOS [2012] $mostraEmail";
$ACESSO_NEGADO = "<b class=\"alerta\">&nbsp;$_ACESSO_NEGADO_MSG&nbsp;</b><br><a class=\"link2\" href=\"$ROTA/index.php\"><b class=\"$COR5\">$_VOLTAR</b></a>"; 							
		class geraToken{
			function nomeArquivo($identificacao){
			global $identificacao;
					$token = md5(uniqid(""));
					$better_token = md5(uniqid(rand(), true));
					$data = date("d_m_y*H:i:s", time());
					$horario = explode("*",$data);
					$hoje = date("d_m_Y");
					$hora = substr("$horario[1]",0,2);
					$minutos = substr("$horario[1]",3,2);
					$segundos = substr("$horario[1]",6,2);
					$horario = $hora.$minutos.$segundos;
					$identificacao = $better_token."_".$hoje."_".$horario;		
			}
		}									
}
?>