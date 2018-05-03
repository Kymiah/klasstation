function download(url, fullName) {
  const anchor = document.createElement('a')
  anchor.href = url
  anchor.setAttribute('download', fullName)

  anchor.click();
}

function screenshot(imgNode, format = 'jpg', quality = 0.97) {
  imgNode = document.getElementById(imgNode);
  const canvas = document.createElement('canvas')
  canvas.width = imgNode.width
  canvas.height = imgNode.height
  
  const context = canvas.getContext('2d')
  context.filter = getComputedStyle(imgNode).filter

  imgNode.setAttribute('crossOrigin', 'anonymous')
  

  context.drawImage(imgNode, 0, 0, canvas.width, canvas.height)
  const imgHair = canvas.toDataURL('image')
  var url = 'scripts/scr_avatar.php';
        $.ajax({ 
            type: "POST", 
            url: url,
            dataType: 'text',
            data: {
                base64data_hair : imgHair
            }
        });

        location.reload();

}
