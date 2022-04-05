<html lang="en">

<head>
	<title>MathType for Froala | Math & Science</title>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="math,science" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Rich HTML editor to create">
	<meta name="author" content="WIRIS">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <script type="text/javascript">
		if (window.location.search !== '') {
		    var urlParams = window.location.search;
		    if (urlParams[0] == '?') {
		        urlParams = urlParams.substr(1, urlParams.length);
		        urlParams = urlParams.split('&');
		        for (i = 0; i < urlParams.length; i = i + 1) {
		            var paramVariableName = urlParams[i].split('=')[0];
		            if (paramVariableName === 'language') {
		                _wrs_int_langCode = urlParams[i].split('=')[1];
		                break;
		            }
		        }
		    }
		}
    </script>
	<!-- Editor Plugin -->
	<link type="text/css" rel="stylesheet" href="froala/css/froala_editor.pkgd.min.css"/>
	<script type="text/javascript" src="froala/js/froala_editor.pkgd.min.js"></script>
      <script type="text/javascript" src="../froala_wiris/wiris.js"></script>
	<!-- Style for html code -->
	<link type="text/css" rel="stylesheet" href="css/prism.css" />

	 

t
</head>

<body>
	<div id="skiptocontent"><a href="#editorContainer">Skip to EDITOR</a></div>
	<header>
		<div class="wrs_content">
			<div class="wrs_container">
				<div class="wrs_row">
					<div class="wrs_col wrs_s12 wrs_m7 wrs_l8">
						<div class="wrs_col wrs_s12">
							<div class="wrs_col wrs_s3 wrs_m2">
								<a href="http://www.wiris.com/"><img id="w_logo" src="img/w.svg" alt="WIRIS"></a>
							</div>
							<div class="wrs_col wrs_s9 wrs_m10">
								<h1>MathType for Froala</h1></div>
							</div>
						</div>
						<div class="wrs_col wrs_s12 wrs_m5 wrs_l4">
							<div class="wrs_row">
								<div class="wrs_col wrs_s3 wrs_center">
									<a href="http://www.wiris.com/plugins/demo/froala/java" title="Java"><img id="java_logo" class="wrs_tech_logo" src="img/java_white.svg" alt="Java"></a>
								</div>
								<div class="wrs_col wrs_s3 wrs_center">
									<a href="http://www.wiris.com/plugins/demo/froala/php" title="PHP"><img id="php_logo" class="wrs_tech_logo" src="img/php_white.svg" alt="PHP"></a>
								</div>
								<div class="wrs_col wrs_s3 wrs_center">
									<a href="http://www.wiris.com/plugins/demo/froala/aspx" title=".NET"><img id="aspx_logo" class="wrs_tech_logo" src="img/net_white.svg" alt=".NET"></a>
								</div>
								<div class="wrs_col wrs_s3 wrs_center">
									<a href="http://www.wiris.com/plugins/demo/froala/ruby" title="Ruby on Rails"><img id="ruby_logo" class="wrs_tech_logo" src="img/rails_white.svg" alt="Ruby on Rails"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="wrs_content">
			<div class="wrs_container">
				<div class="wrs_row">
					<div class="wrs_col wrs_s12">
						<p>Press the MathType icon <i class="wrs_icon_editor"></i> or the ChemType icon <i class="wrs_icon_chem"></i> to create and edit equations and formulas</p>
					</div>
					<div class="wrs_col wrs_s12">
						<div id="editorContainer">
							<div id="toolbarLocation"></div>
							<div id="example" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
								<p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.</p>
								<p style="text-align: center;"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#x000B1;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>
								<p><b>Water is made from two elements</b> - Hydrogen and Oxygen. If you put the two gases together, along with energy, you can make water.</p>
								<p style="text-align: center;"><math class="wrs_chemistry" xmlns="http://www.w3.org/1998/Math/MathML"><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#x21CC;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>
								<p>The entire formula for the surface area of a cylinder is <math xmlns="http://www.w3.org/1998/Math/MathML"><mn>2</mn><msup><mi>&#x3C0;r</mi><mn>2</mn></msup><mo>+</mo><mn>2</mn><mi>&#x3C0;rh</mi></math></p>
							</div>
						</div>
					</div>
				</div>

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

				<div id="options" style="direction: ltr;">
					<div class="wrs_row wrs_padding">
						<div class="wrs_col wrs_s12 wrs_m6 wrs_option_label">
							<p class="wrs_bold wrs_title_options">Language</p>
							<a target="_blank" href="http://www.wiris.com/editor/languages"><img src="img/info_icon.png" width="16" height="16" title="Language documentation" alt="Language documentation"></a>
						</div>
						<div class="wrs_col wrs_s12 wrs_m6">
							<div class="wrs_row wrs_padding_small">
								<div class="wrs_col wrs_s12">
									<select name="lang_select" id="lang_select" onchange="changeLanguage()">
										<option value="ar">Arabic</option><option value="eu">Basque</option><option value="ca">Catalan</option>
										<option value="zh-tw">Chinese</option><option value="hr">Croatian</option><option value="cs">Czech</option>
										<option value="da">Danish</option><option value="nl">Dutch</option><option value="en" selected="true">English</option>
										<option value="et">Estonian</option><option value="fi">Finnish</option><option value="fr">French</option>
										<option value="gl">Galician</option><option value="de">German</option><option value="he">Hebrew</option>
										<option value="hu">Hungarian</option><option value="it">Italian</option><option value="ja">Japanese</option>
										<option value="ko">Korean</option><option value="no">Norwegian</option><option value="pl">Polish</option>
										<option value="pt">Portuguese</option><option value="ru">Russian</option><option value="es">Spanish</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="wrs_row wrs_padding">
						<div class="wrs_col wrs_s12 wrs_m6 wrs_option_label">
							<p class="wrs_bold wrs_title_options"><label for="advanced_options_checkbox">Show advanced options</label></p>
						</div>

						<div class="wrs_col wrs_s12 wrs_m6">
							<div class="wrs_row wrs_padding_small">
								<div class="wrs_col wrs_xs1"><input type="checkbox" id="advanced_options_checkbox" onclick="advancedOptions()"/></div>
								<div class="wrs_col wrs_xs11">&nbsp;</div>
							</div>
						</div>
					</div>

					<div id="advanced_options" style="display:none">

						<div class="wrs_row wrs_padding" style="display: none;">
							<div class="wrs_col wrs_s12 wrs_m4 wrs_option_label">
								<p class="wrs_bold wrs_title_options">Format</p>
								<a target="_blank" href="http://www.wiris.com/editor/docs/reference/parameters"><img src="img/info_icon.png" width="16" height="16" title="Format documentation" alt="Format documentation"></a>
							</div>

							<div class="wrs_col wrs_s12 wrs_m8">
								<div class="wrs_row wrs_padding_small">
									<div class="wrs_col wrs_xs1">
										<input type='radio' id="png_format_radio" name='format_radio' value='png_format' checked>
									</div>
									<div class="wrs_col wrs_xs11">
										<label for="png_format_radio">PNG.<span>&nbsp;Fixed pixel images.</span></label>
									</div>
								</div>
								<div class="wrs_row wrs_padding_small">
									<div class="wrs_col wrs_xs1">
										<input type='radio' id="svg_format_radio" name='format_radio' value='svg_format'>
									</div>
									<div class="wrs_col wrs_xs11">
										<label for="svg_format_radio">SVG.<span>&nbsp;Scalable images.</span></label>
									</div>
								</div>
							</div>
						</div>

						<div class="wrs_row wrs_padding">
							<div class="wrs_col wrs_s12 wrs_m4 wrs_option_label">
								<p class="wrs_bold wrs_title_options">Editor parameters</p>
								<a target="_blank" href="http://www.wiris.com/editor/docs/reference/parameters"><img src="img/info_icon.png" width="16" height="16" title="Parameters list" alt="Parameters list"></a>
							</div>

							<div class="wrs_col wrs_s12 wrs_m8">
								<div class="wrs_row wrs_padding_small wrs_no_line_height">
									<div class="wrs_col wrs_s12 wrs_m10">
										<textarea wrap="hard" wrap="off" name="editor_parameters" id="editor_parameters" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" cols="30" rows="5">{toolbar:'quizzes',fontsize:'20px',backgroundColor:'#3B653D',color:'#FEFEFE', hand: 'true'}</textarea>
										<div id="notification_set_parameters" class="wrs_display_none"></div>
									</div>
									<div class="wrs_col wrs_s12 wrs_m2 wrs_center">
										<button class="wrs_btn" id="set_parameters" onclick="setParameters()">SET</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<footer>
			<div class="wrs_container">
				<div class="wrs_content">
					<div class="wrs_row">
						<div class="wrs_col wrs_s12 wrs_m3">
							<h3>Language</h3>
							<ul>
								<li><a href="http://www.wiris.com/plugins/demo/froala/java">Java</a></li>
								<li><a href="http://www.wiris.com/plugins/demo/froala/php">PHP</a></li>
								<li><a href="http://www.wiris.com/plugins/demo/froala/aspx">.NET</a></li>
								<li><a href="http://www.wiris.com/plugins/demo/froala/ruby">Ruby</a></li>
							</ul>
						</div>
						<div class="wrs_col wrs_s12 wrs_m3">
							<h3>Links</h3>
							<ul>
								<li><a href="http://www.wiris.com/plugins/editors/download?filter=froala">Download plugin</a></li>
								<li><a href="http://www.wiris.com/plugins/docs/demo-download?filter=froala">Download this demo</a></li>
								<li><a href="http://www.wiris.com/plugins/docs/froala">Documentation</a></li>
							</ul>
						</div>
						<div class="wrs_col wrs_s12 wrs_m3">
							<h3>Editors</h3>
							<ul>
								<li><a href="http://www.wiris.com/solutions/ckeditor">CKeditor</a></li>
								<li><a href="http://www.wiris.com/solutions/tinymce">TinyMCE</a></li>
								<li><a href="http://www.wiris.com/solutions">Other solutions</a></li>
							</ul>
						</div>
						<div class="wrs_col wrs_s12 wrs_m3">
							<h3>Platforms</h3>
							<ul>
								<li><a href="http://www.wiris.com/solutions/canvas">Canvas</a></li>
								<li><a href="http://www.wiris.com/solutions/moodle">Moodle</a></li>
								<li><a href="http://www.wiris.com/solutions/sakai">Sakai</a></li>
							</ul>
						</div>
					</div>
					<hr>
					<div class="wrs_row">
						<div class="wrs_col wrs_s12 wrs_center">
							<p><a target="_blank" href="http://www.wiris.com/">wiris.com</a> | <a target="_blank" href="http://www.wiris.com/en/legal-advice#terms">terms of use</a> | <a target="_blank" href="http://www.wiris.com/en/legal-advice#data">privacy</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

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