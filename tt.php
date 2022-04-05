<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="node_modules/@wiris/mathtype-generic/wirisplugin-generic.js"></script>

</head>
<body>
<div id="toolbar"></div>
       <div id="htmlEditor" contenteditable="true">Try me!</div>









       <script>
     var genericIntegrationProperties = {};
     genericIntegrationProperties.target = document.getElementById('htmlEditor');
     genericIntegrationProperties.toolbar = document.getElementById('toolbar');
   
     // GenericIntegration instance.
     var genericIntegrationInstance = new WirisPlugin.GenericIntegration(genericIntegrationProperties);
     genericIntegrationInstance.init();
     genericIntegrationInstance.listeners.fire('onTargetReady', {});
   </script>


</body>
</html>