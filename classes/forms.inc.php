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
class Form{
		
		function abreForm($action,$method,$name,$id,$onSubmit){
				print"<form action=\"$action\" method=\"$method\" name=\"$name\" id=\"$id\" onSubmit=\"$onSubmit\">\n";
			}
		function mostraInput2($type,$size,$nome,$value='',$maxlength='',$classe='',$var1='',$var2='',$var3=''){
				print"<input type=\"$type\" size=\"$size\" name=\"$nome\" value=\"$value\" maxlength=\"$maxlength\" class=\"$classe\" $var1 $var2 $var3></input>\n\t";
			}			
		function mostraBotao($class,$nome,$id,$value){
			print"<input class=\"$class\" id=\"$id\" type=\"submit\" name=\"$nome\" value=\"$value\" onclick=value='AGUARDE!'; color='red';></input>\n\t";

			}
		function fecha_form(){
				print "</form>\n\t";
		}

		function comboBox($nome, $class = "", $dados, $selected = "", $atributos = ""){
			$count = count($dados);
			echo "<select name=\"" . $nome . "\" class=\"" . $class . "\" $atributos>\n";
			$i = 0;
			do {
					echo "\t<option value=\"" . $i . "\" ".(($i == $selected)? "selected":"").">" . $dados[$i] . "</option>\n";
				++$i;
			} while ($i < $count);
			print "</select>\n";
		}
		function comboSIM_NAO($nome,$valorCampo,$UM,$ZERO){
		global $_SELECIONE_OPCAO,$_PERMITE_AUTOCADASTRO,$_NAO_PERMITE_AUTOCADASTRO;					
					print "<select name=\"$nome\"><OPTION VALUE=\"$valorCampo\">$_SELECIONE_OPCAO</OTPTION>";					
   					print "<option value=\"UM\">$UM</option>
   					<option value=\"ZERO\">$ZERO</option>";
					print "</select>";
					
		}
		function comboBox2($nome, $class = "", $dados, $selected = "", $atributos = ""){
			$count = count($dados);
			echo "<select name=\"" . $nome . "\" class=\"" . $class . "\" $atributos>\n<option>\n selecione uma op磯 \n</option>\n";
			$i = 0;
			do {
					echo "\t<option value=\"" . $i . "\" ".(($i == $selected-1)? "selected":"").">\n\t\t\t" . $dados[$i] . "\n</option>\n";
				++$i;
			} while ($i < $count);
			print "</select>\n";
		}
		function textArea($vars1='',$vars2=''){
			echo "<textarea $vars1>$vars2</textarea>";
		} 												
}
class Newform extends montaHtml{
	function input($varTR='',$a1='',$varTD='',$var){
		$this->NTR($varTR);
			print $a1;		
		$this->NTD($varTD);
		print "<input $var></input>\n";
		$this->NCTR();
	}
	function textArea($varTR='',$a1='',$varTD='',$var,$value){
		$this->NTR($varTR.'vAlign="top"');
			print $a1;		
		$this->NTD($varTD);
		print "<textarea $var>$value</textarea>\n";
		$this->NCTR();
	}
	function inputAjax($varTR='',$a1='',$varTD='',$var,$idSpan=''){
		$this->NTR($varTR);
			print $a1;		
		$this->NTD($varTD);
		print "<input $var></input>\n";
		print "<span id=\"$idSpan\"></span>\n";
		$this->NCTR();
	}			
	function inputDica($varTR='',$a1='',$varTD='',$var,$DICA='',$IMAGEM='',$TITULO=''){
		$this->NTR($varTR);
			print $a1;		
		$this->NTD($varTD);
		print "<input $var></input>\n";
		$this->NTD($varTD);
			$this->ajuda2("","","$DICA","$IMAGEM","","$TITULO");
		$this->NCTR();
	}
	function inputSenha($varTR='',$a1='',$varTD='',$value,$texto=''){
		$this->NTR($varTR);
			print $a1;		
		$this->NTD($varTD);
		print "<input type=\"password\" name=\"senha\" id=\"senha\" value=\"$value\" onfocus=this.value=\"\"></input>\n
		<input type=\"checkbox\" id=\"mostra_senha\" onClick=\"MudaTipo(document.getElementById('senha'))\"></input>\n$texto";
		$this->NCTR();
	}
	function inputTD($varTR1='',$varTR='',$a1='',$a2='',$varTD='',$var='',$var2='',$DICA='',$DICA2='',$IMAGEM='',$TITULO='',$TITULO2=''){
		$this->NTR($varTR1);
			$this->NOTB('width="100%" border="0" cellpadding="0" cellspacing="0"');
				$this->NTR($varTR);
				print $a1;		
				$this->NTD($varTD);
				print "<input $var></input>\n";
				$this->NTD($varTD);
				$this->ajuda2("","","$DICA","$IMAGEM","","$TITULO");
				$this->NTD($varTD);
				print $a2;		
				$this->NTD($varTD);
				print "<input $var2></input>\n";
				$this->NTD($varTD);
				$this->ajuda2("","","$DICA2","$IMAGEM","","$TITULO2");
			$this->NCTB();
		$this->NCTR();
	}
/* */
	function comentaQuestoesNotas($nomeCampoComentario,$valorCampoComentario,$nomeRadio,$c){
		global $_NOTA,$COR7,$_COMENTARIO,$notaquestao;
			$this->textArea('class="'.$COR7.'"','<b id="destaque7">*</b><b id="destaqueVerde">'.$_COMENTARIO.'</b>','class="'.$COR7.'"','cols="50" rows="6" name="'.$nomeCampoComentario.'" size="40"',$valorCampoComentario);	
			$this->NTR('class="'.$COR7.'"');
			print('<b id="destaqueVerde">'.$_NOTA.'</b>');
			$this->NTD('class="'.$COR7.'"');
				for($i=0; $i<$c; $i++) {
					if($i == $notaquestao){
						$checked = "checked";
					}else{
						$checked = "";
					}
					print('<input type="radio" value="'.$i.'" '.$checked.' name="'.$nomeRadio.'"></input>'.$i);					
				}
			$this->NCTR();
			$this->NHR('colspan="3" class='.$COR7.'');			
	}		
}	
?>