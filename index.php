<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
</head>
<body>
<form method="post" action="up.php" enctype="multipart/form-data" id="uploadForm">
	<input type="file" name="file" id="file">

	<button type="submit">go</button>
</form>
<div id="pesaneror"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function filePreview(input) {
		if(input.files&&input.files[0]){
			var tipefile=/.\.(gif|jpg|png|jpeg)$/i;
			var namafile=input.files[0]['name'];
			var ukuran=input.files[0]['size'];
			if (!tipefile.test(namafile))
				$("#pesaneror").html('Only images are allowed!');
			else if (ukuran > 500000)
                $("#pesaneror").html('Your file is too big! Max allowed size is: 500KB');
            else{
            	var reader = new FileReader();
				reader.onload=function(e){
					$('#uploadForm + img').remove();
					$('#uploadForm').after('<img src="'+e.target.result+'" width="100px" height="100px" />')
				}
				reader.readAsDataURL(input.files[0]);
            }
		}
	}
	$('#file').change(function(){
		filePreview(this);
	});
</script>

</body>
</html>