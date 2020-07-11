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
$diretorio = $repositorioArquivos;
$conteudo =<<<eof
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//PT_BR" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- <!DOCTYPE MATRICULA [
  <!ELEMENT MATRICULA (IDENTIFICACAO,HORARIO,NOME,SERIE,PROFESSOR,,QUESTAO1,COMENTARIO1,NOTAQUESTAO1,QUESTAO2,COMENTARIO2,NOTAQUESTAO2,QUESTAO3,COMENTARIO3,NOTAQUESTAO3,QUESTAO4,COMENTARIO4,NOTAQUESTAO4,QUESTAO5,COMENTARIO5,NOTAQUESTAO5,QUESTAO6,COMENTARIO6,NOTAQUESTAO6,APROVADO)>
  <!ELEMENT IDENTIFICACAO    (#PCDATA)>
  <!ELEMENT HORARIO    (#PCDATA)>
  <!ELEMENT NOME    (#PCDATA)>
  <!ELEMENT SERIE    (#PCDATA)>
  <!ELEMENT PROFESSOR    (#PCDATA)>
  <!ELEMENT QUESTAO1    (#PCDATA)>
  <!ELEMENT COMENTARIO1    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO1    (#PCDATA)>
  <!ELEMENT QUESTAO2    (#PCDATA)>
  <!ELEMENT COMENTARIO2    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO2    (#PCDATA)>
  <!ELEMENT QUESTAO3    (#PCDATA)>
  <!ELEMENT COMENTARIO3    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO3    (#PCDATA)>  
  <!ELEMENT QUESTAO4    (#PCDATA)>
  <!ELEMENT COMENTARIO4    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO4    (#PCDATA)>  
  <!ELEMENT QUESTAO5    (#PCDATA)>
  <!ELEMENT COMENTARIO5    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO5    (#PCDATA)>  
  <!ELEMENT QUESTAO6    (#PCDATA)>
  <!ELEMENT COMENTARIO6    (#PCDATA)>
  <!ELEMENT NOTAQUESTAO6    (#PCDATA)>  
  <!ELEMENT APROVADO   (#PCDATA)>

]> -->
<MATRICULA>
	<IDENTIFICACAO>$matricula</IDENTIFICACAO>
	<APROVADO>$aprovado</APROVADO>
	<NOME>$nome</NOME>
	<SERIE>$serie</SERIE>
	<PROFESSOR>$professor</PROFESSOR>
	<HORARIO>$horario</HORARIO>
	
	<QUESTAO1>$questaoum</QUESTAO1>
	<COMENTARIO1>$comentario1</COMENTARIO1>
	<NOTAQUESTAO1>$notaquestao1</NOTAQUESTAO1>
	
	<QUESTAO2>$questaodois</QUESTAO2>
	<COMENTARIO2>$comentario2</COMENTARIO2>
	<NOTAQUESTAO2>$notaquestao2</NOTAQUESTAO2>
	<QUESTAO3>$questaotres</QUESTAO3>
	<COMENTARIO3>$comentario3</COMENTARIO3>
	<NOTAQUESTAO3>$notaquestao3</NOTAQUESTAO3>
	<QUESTAO4>$questaoquatro</QUESTAO4>
	<COMENTARIO4>$comentario4</COMENTARIO4>
	<NOTAQUESTAO4>$notaquestao4</NOTAQUESTAO4>
	<QUESTAO5>$questaocinco</QUESTAO5>
	<COMENTARIO5>$comentario5</COMENTARIO5>
	<NOTAQUESTAO5>$notaquestao5</NOTAQUESTAO5>
	<QUESTAO6>$questaoseis</QUESTAO6>
	<COMENTARIO6>$comentario6</COMENTARIO6>
	<NOTAQUESTAO6>$notaquestao6</NOTAQUESTAO6>
</MATRICULA>
<!-- by Oliveira M.J.N [Xamaleon v.0.1][soordle.org][eadgames.com.br] -->
eof;
?>