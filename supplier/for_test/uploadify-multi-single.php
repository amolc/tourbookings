
<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.uploadify.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	// $("#fileUpload").fileUpload({
		// 'uploader': 'uploadify/uploader.swf',
		// 'cancelImg': 'uploadify/cancel.png',
		// 'script': 'uploadify/upload.php',
		// 'folder': 'files',
		// 'multi': false,
		// 'displayData': 'speed'
	// });

	$("#fileUpload2").fileUpload({
		'uploader': 'uploadify/uploader.swf',
		'cancelImg': 'uploadify/cancel.png',
		'script': 'uploadify/upload.php',
		'folder': 'files',
		'multi': true,
		'buttonText': 'Select Files',
		'checkScript': 'uploadify/check.php',
		'displayData': 'speed',
		'simUploadLimit': 2
	});

	// $("#fileUpload3").fileUpload({
		// 'uploader': 'uploadify/uploader.swf',
		// 'cancelImg': 'uploadify/cancel.png',
		// 'script': 'uploadify/upload.php',
		// 'folder': 'files',
		// 'fileDesc': 'Image Files',
		// 'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
		// 'multi': true,
		// 'auto': true
	// });
});

</script>


		<h2>Multiple File Upload</h2>
		<p>checkScript, buttonText, simulataneous upload limit</p>
		<div id="fileUpload2">You have a problem with your javascript</div>
		<a href="javascript:$('#fileUpload2').fileUploadStart()">Start Upload</a> |  <a href="javascript:$('#fileUpload2').fileUploadClearQueue()">Clear Queue</a>

