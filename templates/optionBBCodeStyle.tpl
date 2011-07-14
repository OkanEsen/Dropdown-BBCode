<script type="text/javascript">
	//<![CDATA[
	function goTo(target,selObj,restore){
	  eval(target+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0;
	}
	//]]>
</script>