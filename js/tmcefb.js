tinymce.PluginManager.add('tinymce_imgb64', function(editor, url) {
    // Add a button that opens a window
    editor.addButton('tinymce_imgb64', {
        text: 'B64Image',
        icon: false,
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'tinymce_imgb64 plugin',
                body: [
                    {name: 'file', id:'tmcefbpop', type: 'textbox', subtype: 'file', label: 'Upload',onchange:uploadFile},
                    {name:'img',type:'textbox',id:'testimg'}
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                     /*var fReader = new FileReader();
                    fReader.readAsDataURL( document.getElementById("tmcefbpop").files[0] );

                    fReader.onloadend = function(event){
                        //var img = document.getElementById("testimg");
                        console.log(event.target.result);
                         //document.getElementById("tmcefbpop").result = event.target.result;
                        editor.insertContent('YYY<img src="' + event.target.result +'"/>' +event.target.result );
                    }*/
                    
                }
            });
        }
    });

function uploadFile(a){
    var fReader = new FileReader();
    fReader.readAsDataURL( document.getElementById("tmcefbpop").files[0] );

    fReader.onloadend = function(event){
        $.ajax({
            url:'touch/srvc/setImageData.php',
            method:'post',
            data:{raw:event.target.result}
        }).done(function(data) {//Data will be URL of Image
            editor.insertContent('<img src="' + data+'" alt="dddd" />' );
            alert('Image added.');
        })

    // editor.insertContent('YSYS <img src="' + event.target.result +'" alt="dddd" />' );
    
    }
    
}
function getBase64Image(img) {
  var canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);
  var dataURL = canvas.toDataURL("image/png");
  return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}

//var base64 = getBase64Image($("#imageid"));

 
});