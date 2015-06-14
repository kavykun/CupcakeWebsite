<head>
	<script type="text/javascript" src="third.party/jquery-1.7.1.min.js"></script> 
  <title>The Cupcake Factory - Gallery</title>
	<!-- <script type="text/javascript" src="third.party/jquery-1.9.0.min.js"></script> --> 
	<script type="text/javascript" src="./third.party/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="./third.party/transit/jquery.transit.min.js"></script>
	<script type="text/javascript" src="./third.party/hammer.js/hammer.min.js"></script>
	<script type="text/javascript" src="./third.party/imagesloaded/imagesloaded.pkgd.min.js"></script>
	 
	<link href="./css/nanogallery.css" rel="stylesheet" type="text/css">
    
    	<?php
		foreach(glob('./images/cupcakes/*.*') as $filename){
   			 $files[] = $filename;
		
		}
		
 		?>
        
<?php
	echo"<script align=\"center\" type=\"text/javascript\" src=\"./js/jquery.nanogallery.js\"></script>      
	<script>
		$(document).ready(function () {
			
			// Sample1
			myColorScheme = {
				breadcrumb : {
					background : '#000',
					border : '1px dotted #555',
					color : '#ccc',
					colorHover:'#fff'
				},
				thumbnail : {
					background:'#000',
					border:'1px solid #000',
					labelBackground:'transparent',
					labelOpacity:'0.8',
					titleColor:'#fff',
					descriptionColor:'#eee'
				}
			};
			myColorSchemeViewer = {
				background:'rgba(1, 1, 1, 0.75)',
				imageBorder:'12px solid #f8f8f8',
				imageBoxShadow:'#888 0px 0px 20px',
				barBackground:'#222',
				barBorder:'2px solid #111',
				barColor:'#eee',
				barDescriptionColor:'#aaa'
			};
			
			jQuery(\"#nanoGallery1\").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
			items: [
			";
?>
<?php

			foreach ($files as $values) {
				
				echo"
				{
					src: '".$values."',		// image url
					srct: '".$values."',	// thumbnail url
					title: 'Cupcake', 						// thumbnail title
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					title_FR: 'image 2 (fr)',
					description_FR : 'description image 1 (fr)'
				},
				";
			}
			
			
			echo "
				],
				
				
				//thumbnailHoverEffect:'imageFlipHorizontal,borderLighter',
				//thumbnailHoverEffect:'descriptionSlideUp,borderLighter',
				thumbnailHoverEffect:'labelSlideUpTop,borderLighter',
				thumbnailLabel:{display:true,position:'overImageOnBottom'},
        viewerDisplayLogo:true
			});
		});
	</script>
";
?>
</head>
<body>
<br />
<br>
	<div id="nanoGallery1"></div>
	<br>

</body>
</html>

	