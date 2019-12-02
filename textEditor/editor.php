
    <script type="text/javascript">
      $(document).ready(function(){

        $('.htmlTextEditor').map(function() {
          var id = $(this).attr('id');
          var panel = "<br><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('Bold', '"+id+"');\" title=\"Bold Highlighted Text\"><i class=\"fas fa-bold\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('Italic', '"+id+"');\" title=\"Italicize Highlighted Text\"><i class=\"fas fa-italic\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('underline', '"+id+"');\" title=\"underline Highlighted Text\"><u>U</u></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('justifyleft', '"+id+"');\" title=\"left Highlighted Text\"><i class=\"fas fa-align-left\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('justifyCenter', '"+id+"');\" title=\"center Highlighted Text\"><i class=\"fas fa-align-center\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('justifyRight', '"+id+"');\" title=\"right Highlighted Text\"><i class=\"fas fa-align-right\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"fontStyle editorButton"+id+"\" onclick=\"execCmd('Delete');\" title=\"delete Highlighted Text\"><i class=\"fas fa-trash-alt\"></i></a></div><div class=\"d-inline ml-3\"><select class=\"form-control-sm editorButton"+id+"\" onchange=\"fontFamily(this[this.selectedIndex].value, '"+id+"')\"><option >Font Family</option><option value=\"Arial\">Arial</option><option value=\"Calibri\">Calibri</option><option value=\"Comic Sans MS\">Comic Sans MS</option><option value=\"poppins\">Poppins</option></select></div><div class=\"d-inline ml-3\"><select class=\"form-control-sm editorButton"+id+"\" onchange=\"fontSize(this[this.selectedIndex].value, '"+id+"')\"><option >Font Size</option><option value=\"1px\">1</option><option value=\"2px\">2</option><option value=\"3px\">3</option><option value=\"4px\">4</option><option value=\"5px\">5</option><option value=\"6px\">6</option><option value=\"7px\">7</option></select></div><div class=\"d-inline ml-3\"><a class=\"editorButton"+id+"\" onclick=\"linkDone('"+id+"')\" ><i class=\"fas fa-link\"></i></a></div><div class=\"d-inline ml-3\"><a class=\"editorButton"+id+"\" onclick=\"addImage('"+id+"')\" ><i  class=\"fas fa-images\"></i></a></div><div class=\"d-inline ml-3\"><a onclick=\"viewSource('"+id+"')\" ><i class=\"fas fa-code\"></i>Source</a></div><hr><iframe style=\"width:100%;height: 50%;\" id=\"boxName"+id+"\" contenteditable=\"true\"></iframe>";

          $('#'+id).parent().prepend(panel);

          document.getElementById('boxName'+id).contentWindow.document.designMode = 'on';

          $(document.getElementById('boxName'+id).contentWindow.document).keypress(function(e){
            updateTextarea(id);
          });

          $('#'+id).on('keyup keypress blur change', function(e) {
            updateFramebox(id);
          });

        });    

      });

      function updateFramebox(id){
        var textareaContent = document.getElementById(id).value;
        document.getElementById('boxName'+id).contentWindow.document.body.innerHTML = textareaContent;
      }

      function updateTextarea(id){
        var frameContent = document.getElementById('boxName'+id).contentWindow.document.body.innerHTML;
        document.getElementById(id).value = frameContent;
      }

      function execCmd (command, id){
        document.getElementById('boxName'+id).contentWindow.document.execCommand(command,false,null);
        updateTextarea(id);
      }

      function fontFamily(fontName, id) {
        document.getElementById('boxName'+id).contentWindow.document.execCommand("fontName", false, fontName);
        updateTextarea(id);
      }

      function fontSize(fontSize, id) {
        document.getElementById('boxName'+id).contentWindow.document.execCommand("fontSize", false, fontSize);
        updateTextarea(id);
      }

      function linkDone(id) {
        var siteURL = prompt('Enter a URL:', 'http://');
        var aName = boxName.getSelection();
        if(siteURL != null){
          document.getElementById('boxName'+id).contentWindow.document.execCommand('insertHTML', false, '<a href="' + siteURL + '" target="_blank">' + aName + '</a>');
        }
        updateTextarea(id);
      }

      function addImage(id) {
        var imgURL = prompt('Enter a URL:', 'http://');
        document.getElementById('boxName'+id).contentWindow.document.execCommand('insertHTML', false, '<img src="' + imgURL + '" />');
        updateTextarea(id);
      }

      function viewSource(id) {

        if(document.getElementById('boxName'+id).style.display == "none"){
          document.getElementById('boxName'+id).style.display = "block";
          $(".editorButton"+id).removeClass("inactiveLink");
        }else{
          document.getElementById('boxName'+id).style.display = "none";
          $(".editorButton"+id).addClass("inactiveLink");
        }

        if(document.getElementById(id).style.display == "block"){
          document.getElementById(id).style.display = "none";
        }else{
          document.getElementById(id).style.display = "block";
        }
        updateTextarea(id);
      }
    </script>
    <style type="text/css">
      .htmlTextEditor{
        width:100%;
        height: 50%;
        display: none;
      }
      .inactiveLink {
         pointer-events: none;
         cursor: default;
         opacity: 0.2;
      }
    </style>

<!-- Add <textarea name="myText" id="htmlTextEditor"></textarea> to use text editor  -->