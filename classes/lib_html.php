<?php
class Tabela {

		function OTB($bg,$border,$cpadding,$cspacing,$bcolor,$wd){
				print"<table bgcolor=\"$bg\" border=\"$border\" cellpadding=\"$cpadding\" cellspacing=\"$cspacing\" bordercolor=\"$bcolor\" width=\"$wd\">";
		}
		function TR($mensagem,$cspan,$wdtd,$bcolortd,$bckgrd,$alg,$valg,$cls,$height,$corlinha,$overlinha){

				print "<tr class=$corlinha  onmouseover=\"this.className='$overlinha'\" onmouseout=\"this.className='$corlinha'\">
						<td colspan=\"$cspan\" width=\"$wdtd\" bordercolor=\"$bcolortd\" background=\"$bckgrd\" align=\"$alg\" valign=\"$valg\" class=\"$cls\" height=\"$height\">$mensagem";
		}
		function TD($mensagem,$cspan,$wdtd,$bcolortd,$alg,$valg,$cls,$height){
			echo "</td><td colspan=\"$cspan\" width=\"$wdtd\" bordercolor=\"$bcolortd\" align=\"$alg\" valign=\"$valg\" class=\"$cls\" height=\"$height\">$mensagem";
		}
		function CTR(){
			print"</td></tr>";
		}
		function CTB(){
			print"</td></tr></table>";
		}		
		function HR(){
			print "<hr></hr>";
		}	
}//fecha classe tabela

class paginacao extends Tabela{
			
	function dadosPaginacao($tamanhoPagina,$NumTotalRegistros,$mostraLinhaTotais,$colsPan){	
			global $total_paginas;
			global $TAMANHO_PAGINA;
			global $inicio;
			global $pagina_menu;
			global $_POR_PAGINA;
			global $_EXIBINDO;
			global $COR3;
			global $_TOTAL;
		$TAMANHO_PAGINA = $tamanhoPagina;
				@$pagina_menu = $_GET["pagina_menu"]; 
					if (!$pagina_menu) { 
								    $inicio = 0; 
								    $pagina_menu=1; 
					}else{ 
    				$inicio = ($pagina_menu - 1) * $TAMANHO_PAGINA; 
					}
					
			$num_total_registros = $NumTotalRegistros;
			$total_paginas = ceil($num_total_registros / $TAMANHO_PAGINA);
						
						if($mostraLinhaTotais != '0'){						
				        $this -> OTB("","0","0","0","#993333","100%");					
							$this -> TR("$_TOTAL: $num_total_registros / $_EXIBINDO  $TAMANHO_PAGINA  $_POR_PAGINA","$colsPan","","#FFFFFF","","right","top","$COR3","","","");
						$this->CTB();
					}
	}/* -- [ fecha dadosPaginacao ] -- */
}
class AvisoDivPop extends Tabela{
	function jsAviso($closeAlertaDiv,$idDiv,$classeDivFlutuante,$tituloAviso,$COR_TITULO,$textoRecado,$COR__CONTEUDO){
	global $_FECHAR;
		print"<script type=\"text/javascript\">";
		print"window.setTimeout(\"$closeAlertaDiv();\", 4000);";	
		print"function $closeAlertaDiv(){
		document.getElementById(\"$idDiv\").style.display=\"none\";
		}
		</script>";
		print "<div id=$idDiv class=\"$classeDivFlutuante\" align=\"center\"><br>";
/**/
				$this -> OTB("","0","2","0","#99333","80%");
					$this -> TR("<b ID='destaque7'>$tituloAviso</b>","","","#000000","","left","top","$COR_TITULO","","$COR_TITULO","$COR_TITULO");
					$this -> CTR();
					$this -> TR("<a class=\"link2\" href=\"#\" onClick=\"closeAlertaDiv();\">$_FECHAR X</a>","","","#000000","","RIGHT","top","$COR__CONTEUDO","","$COR__CONTEUDO","$COR__CONTEUDO");
					$this -> CTR();
					$this -> TR("<b ID='destaque5'>$textoRecado</b>","","","#000000","","left","top","$COR__CONTEUDO","","$COR__CONTEUDO","$COR__CONTEUDO");																
			$this -> CTB();
print "</div>";			
/**/		
	}
/*	function FF(){
		print "</div>";
	}*/
				
}
	
?>