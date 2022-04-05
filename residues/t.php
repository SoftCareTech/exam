<html>
  <head>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    
  <!-- Editor Plugin -->
  <link type="text/css" rel="stylesheet" href="''"/>
  <script type="text/javascript" src="./ckeditor4/ckeditor.js"></script>

  <!-- Style for html code -->
  <link type="text/css" rel="stylesheet" href="css/prism.css" />

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

     
  </head>
  <body>



 




     <div id="i"></div>
    <div id="toolbar"></div>
    <div id="htmlEditor" contenteditable="true"> Nguemo    </div>

<div class="wrs_row wrs_padding">
          <div class="wrs_col wrs_s12 wrs_center">
            <button id="previewButton" class="wrs_btn wrs_btn_large" onclick="updateFunction()"><img id="refresh_icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDYxMiA3OTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYxMiA3OTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxwYXRoIHN0eWxlPSJzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7IiBkPSJNMjA5LjU5MSwzMzcuMTU0ICAgYzEuNDU3LTIuNDQyLDIuMjU1LTQuNjM3LDIuMjU1LTYuNDVjMC0xODEuMTI4LDkyLjUzLTIyMi44ODYsMTE0Ljc1LTIzNi42NTZjMy44Ni0yLjI2LDMuNjI1LTMuMjAxLTAuOC0zLjIwMSAgIGMtMTQzLjE4NCwwLTIzMS42NDIsMTAyLjg2My0yMzEuNjQyLDIzOS44NTdjMCwyLjIzOSwwLjA2MSw0LjM4NSwwLjE3NSw2LjQ1aC04Mi41NkwxNTMsNTE3Ljk3NmwxNDEuMjMxLTE4MC44MjJIMjA5LjU5MXoiIHN0cm9rZT0iI0ZGRkZGRiIgZmlsbD0iI0ZGRkZGRiIvPgoJPHBhdGggc3R5bGU9InN0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1saW5lam9pbjpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIGQ9Ik02MDAuMjMxLDQ1NC44NDYgICBMNDU5LDI3NC4wMjRMMzE3Ljc2OSw0NTQuODQ2aDg0LjYyNmMtMS40NDgsMi40MzMtMi4yNDEsNC42MTktMi4yNDEsNi40MjZjMCwxODEuMTUyLTkyLjUzLDIyMi44ODYtMTE0Ljc1LDIzNi42NTYgICBjLTMuODYsMi4yODMtMy42MjUsMy4yMjUsMC44LDMuMjI1YzE0My4xODQsMCwyMzEuNjQyLTEwMi44ODcsMjMxLjY0Mi0yMzkuODhjMC0yLjIzMS0wLjA2MS00LjM2OS0wLjE3NC02LjQyNkg2MDAuMjMxeiIgc3Ryb2tlPSIjRkZGRkZGIiBmaWxsPSIjRkZGRkZGIi8+CjwvZz4KPC9zdmc+Cg==" alt="Refresh icon" />UPDATE</button>
          </div>
</div>


<div class="wrs_row wrs_padding">
          <div class="wrs_col wrs_s12">
            <div id="container_tab">
              <input id="tab_1" type="radio" name="tab_group" checked="checked" onclick="displayPreview()" />
              <label for="tab_1">Preview</label>

              <input id="tab_2" type="radio" name="tab_group" onclick="displayHTML()" />
              <label for="tab_2">HTML</label>

              <div id="content_tab">
                <div class="wrs_div_box wrs_preview" id="preview_div"></div>
                <div class="wrs_div_box wrs_preview wrs_code" id="htmlcode_div" style="display:none;">
                  <p>Press the update button to see the HTML</p>
                </div>
              </div>
            </div>
          </div>
        </div>


    <div id="editorContainer">
              <div id="toolbarLocation"></div>
              <div id="example" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">

              </div>
            </div>

    
    <script>
      var genericIntegrationProperties = {};
      genericIntegrationProperties.target = document.getElementById('htmlEditor');
      genericIntegrationProperties.toolbar = document.getElementById('toolbar');
 
      // GenericIntegration instance.
      var genericIntegrationInstance = new WirisPlugin.GenericIntegration(genericIntegrationProperties);
      genericIntegrationInstance.init();
      genericIntegrationInstance.listeners.fire('onTargetReady', {});
    </script> 




    <!-- Prism JS script to beautify the HTML code -->
    <script type="text/javascript" src="js/prism.js"></script>

    <!-- WIRIS script -->
    <script type="text/javascript" src="js/wirislib.js"></script>

    <!-- Google Analytics -->
    <script src="js/google_analytics.js"></script>

    <script>
      if(typeof urlParams !== 'undefined') {
        var selectLang = document.getElementById('lang_select');
        selectLang.value = urlParams[1];
      }
    </script>
  </body>
</html>